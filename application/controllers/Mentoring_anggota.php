<?php
defined('BASEPATH') or exit('No direct script access allowed');
require "App.php";
class Mentoring_anggota extends App
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
        // echo "=====================".$idkelompok;
        $this->ModelMentoring->init([
            "table" => 'user',
            "column_order" => [
                'nama_user',
                'email_user',
                null
            ],
            "column_search" => [
                'nama_user',
                'email_user',
                'hp_user'
            ],
            "order" => [
                'nama_user' => "desc"
            ],
            "where" => [
                'role_mentoring' => 'mutarobi',
                'status_mentoring' => 'enabled',
            ],
            "select" => "*",
            "join" => [
                'mentoring' => 'User_iduser = iduser',
                'kelompok' => 'idkelompok = '.$sess['idkelompok']
            ]
        ]);
    }

    public function index()
    {
        $sess = $this->session->userdata('ses_mentoring');
        $this->load->view('mtr_mutabaah/layout.php', [
            "content" => [
                "back_url" =>$sess['back_url'],
            ],
            "page" => "anggota",
            "user_iduser" => $sess['id']
        ]);
    }
    public function ajax_list()
    {
        $no   = $_POST['start'];
        $list = $this->ModelMentoring->get_datatables();
        $data = [];
        foreach ($list as $kelompok_anggota) {
            $no++;
            $data[] = [
                $no,
                $kelompok_anggota->kode_kelompok,
                $kelompok_anggota->nama_user,
                $kelompok_anggota->email_user,
                $kelompok_anggota->hp_user,
                '<a class="btn btn-sm btn-success" href="'.base_url('Mentoring_anggota/view_mutabaah/'
                .$kelompok_anggota->User_iduser.'/'.$kelompok_anggota->nama_user).'" title="Lihat"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>'
            ];
        }
       
        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModelMentoring->count_all(),
            "recordsFiltered" => $this->ModelMentoring->count_filtered(),
            "data" => $data
        ]);
    }
    
    public function view_mutabaah($id,$nama){
        $sess = $this->session->userdata('ses_mentoring');
        $sess['idanggota'] = $id;
        $sess['namaAnggota'] = $nama;
        $sess['back_url'] = base_url('Mentoring_kelompok/view_kelompok/'. $sess['idmentoring'].'/'.$sess['idkelompok']);
        $this->session->set_userdata("ses_mentoring", $sess);
        redirect('/Mentoring_mutabaahAnggota/');
    }
}