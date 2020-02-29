<?php
defined('BASEPATH') or exit('No direct script access allowed');
require "App.php";
class Mentoring_pertemuan extends App
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelMentoring');
        $this->init();
    }
    public function init()
    {
        $sess = $this->session->userdata('ses_mentoring');
        $this->ModelMentoring->init([
            "table" => 'pertemuan',
            "column_order" => [
                'pertemuan.waktu_pertemuan',
                'pertemuan.idpertemuan',
                null
            ],
            "column_search" => [
                'pertemuan.waktu_pertemuan',
                'kelompok.kode_kelompok',
                'pertemuan.materi_pertemuan'
            ],
            "order" => [
                'pertemuan.waktu_pertemuan' => 'desc'
            ],
            "where" => [
                'kelompok.idkelompok' => $sess['idkelompok']
            ],
            "select" => "*",
            "join" => [
                'mentoring' => 'mentoring.idmentoring = pertemuan.mentoring_idmentoring ',
                'kelompok' => 'kelompok.idkelompok = '.$sess['idkelompok'] 
            ]
        ]);
    }
    public function index()
    {
        $sess = $this->session->userdata('ses_mentoring');
        $this->load->view('mtr_mutabaah/layout.php', [
            "content" => [
                "idmentoring" => $sess['idmentoring'],
                "back_url" =>$sess['back_url'],
            ],
            "page" => "pertemuan",
            "user_iduser" => $sess['id']
        ]);
    }
    public function ajax_list()
    {
        $list = $this->ModelMentoring->get_datatables();
        $data = [];
        $no   = $_POST['start'];
        foreach ($list as $user_pertemuan) {
            $no++;
            $data[] =[
                $no,
                $user_pertemuan->kode_kelompok,
                $user_pertemuan->waktu_pertemuan,
                $user_pertemuan->materi_pertemuan,
                '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pertemuan(' 
                . "'" . $user_pertemuan->idpertemuan . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>'
            ];
        }
        //output to json format
        
        echo json_encode([
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->ModelMentoring->count_all(),
                "recordsFiltered" => $this->ModelMentoring->count_filtered(),
                "data" => $data
        ]);
    }

    public function input_pertemuan(){
        $sess = $this->session->userdata('ses_mentoring');
        // echo json_encode($_POST);
        if($this->ModelMentoring->hitung("pertemuan",[
                "mentoring_idmentoring" => $this->input->post('mentoring_idmentoring'),
                "waktu_pertemuan" =>  $this->input->post('waktu_pertemuan')
        ])==0){
            $data = $this->input->post();
            $this->ModelMentoring->create("pertemuan",$data);
            echo json_encode(["status" => TRUE, $data]);
        }else{
            echo json_encode(["status" => FALSE,"message"=>"Data tidak ditambahkan"]);
        }
    }

    public function edit_mutabaah($id){
        $sess = $this->session->userdata('ses_mentoring');
        echo json_encode($id);
        if($this->ModelMentoring->hitung("pertemuan",[
                "idpertemuan" => $id
        ])!=0){
            $data = $this->input->post();
            $this->ModelMentoring->update(["idpertemuan"=>$id],$data);
            echo json_encode(["status" => TRUE, $data]);
        }else{
            echo json_encode(["status" => FALSE,"message"=>"Tidak ketemu!"]);
        }
    }

    public function pertemuan_by_id($id){
        if($this->ModelMentoring->hitung('pertemuan', [
            'idpertemuan' => $id,
        ])!=0){
            $pertemuan = $this->ModelMentoring->select("*","pertemuan","idpertemuan=$id");
            $data = [
                'pertemuan'=> $pertemuan[0],
            ];
            echo json_encode(["status" => TRUE, "data" => $data]);
        }
        else {
            echo json_encode(["status" => FALSE]);

        } 
    }

}