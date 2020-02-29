<?php
defined('BASEPATH') or exit('No direct script access allowed');
require "App.php";
class Mentoring_mutabaahAnggota extends App
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
            "table" => 'mutabaah',
            "column_order" => [
                'mutabaah.idmutabaah',
                'pertemuan.idpertemuan',
                null
            ],
            "column_search" => [
                'pertemuan.waktu_pertemuan',
                'kelompok.kode_kelompok'
            ],
            "order" => [
                'mutabaah.idmutabaah' => 'desc'
            ],
            "where" => [
                'mutabaah.user_iduser' => $sess['idanggota']
            ],
            "select" => "*",
            "join" => [
                'pertemuan' => 'pertemuan.idpertemuan = mutabaah.pertemuan_idpertemuan ',
                'mentoring' => 'mentoring.idmentoring = pertemuan.mentoring_idmentoring ' 
                                . 'AND mentoring.role_mentoring = "mutarobi"',
                'kelompok' => 'kelompok.idkelompok = mentoring.Kelompok_idkelompok'
            ]
        ]);
    }
    public function index()
    {
        $sess = $this->session->userdata('ses_mentoring');
        $this->load->view('mtr_mutabaah/layout.php', [
            "content" => [
                "pertemuan" => $this->ModelMentoring->select("CONCAT(kode_kelompok,' - ',waktu_pertemuan) AS absen, idpertemuan",
                                                         "pertemuan,mentoring,kelompok",
                                                         "pertemuan.mentoring_idmentoring =" 
                                                            . "mentoring.idmentoring AND kelompok.idkelompok =" 
                                                            . " mentoring.Kelompok_idkelompok"),
                "namaAnggota" => $sess['namaAnggota'],
                "back_url"=>$sess['back_url']
            ],
            "page" => "anggotaMutabaah",
            "user_iduser" => $sess['id']
        ]);
    }
    public function ajax_list()
    {
        $list = $this->ModelMentoring->get_datatables();
        $data = [];
        $no   = $_POST['start'];
        foreach ($list as $user_mutabaah) {
            $no++;
            $data[] =[
                $no,
                $user_mutabaah->kode_kelompok,
                $user_mutabaah->waktu_pertemuan,
                '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="view_mutabaah(' 
                . "'" . $user_mutabaah->idmutabaah . "'" . ')"><i class="glyphicon glyphicon-eye-open"></i>Detail</a>'
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

    public function mutabaah_by_id($id){
        if($this->ModelMentoring->hitung('mutabaah', [
            'idmutabaah' => $id,
        ])!=0){
            $mutabaah = $this->ModelMentoring->select("*","mutabaah","idmutabaah=$id");
            $pertemuan = $this->ModelMentoring->select("CONCAT(kode_kelompok,' - ',waktu_pertemuan)"
                                        ." AS absen, idpertemuan",
                                        "pertemuan,mentoring,kelompok",
                                        "pertemuan.mentoring_idmentoring =" 
                                        . "mentoring.idmentoring AND kelompok.idkelompok =" 
                                        . " mentoring.Kelompok_idkelompok AND idpertemuan = ".$mutabaah[0]['pertemuan_idpertemuan']);
            $data = [
                'pertemuan_idpertemuan' =>[
                    "id" => $pertemuan[0]['idpertemuan'],
                    "absen" => $pertemuan[0]["absen"],
                ],
                'mutabaah'=> $mutabaah[0],
            ];
            echo json_encode(["status" => TRUE, "data" => $data]);
        }
        else {
            echo json_encode(["status" => FALSE]);

        } 
    }
    
}