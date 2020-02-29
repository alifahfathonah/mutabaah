<?php
defined('BASEPATH') or exit('No direct script access allowed');
require "App.php";
class Mentoring_kelompok extends App
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
            "table" => 'mentoring',
            "column_order" => [
                'kode_kelompok',
                'hari_kelompok',
                null
            ],
            "column_search" => [
                'kode_kelompok',
                'hari_kelompok',
            ],
            "order" => [
                'idmentoring' => "desc"
            ],
            "where" => [
                'role_mentoring' => 'murobi',
                'User_iduser' => $sess['id'],
                'status_mentoring' => 'enabled'
            ],
            "select" => "*",
            "join" => [
                'kelompok' => 'Kelompok_idkelompok = idkelompok'
            ]
        ]);
    }
    public function index()
    {
        $sess = $this->session->userdata('ses_mentoring');
        $this->load->view('mtr_mutabaah/layout.php', [
            "content" => NULL,
            "page" => "kelompok",
            "user_iduser" => $sess['id']
        ]);
    }
    public function ajax_list()
    {
        $no   = $_POST['start'];
        $list = $this->ModelMentoring->get_datatables();
        $data = [];
        foreach ($list as $user_kelompok) {
            $no++;
            $data[] = [
                $no,
                $user_kelompok->kode_kelompok,
                $user_kelompok->hari_kelompok,
                '<a class="btn btn-sm btn-success" href="'.base_url('Mentoring_kelompok/view_kelompok/'
                .$user_kelompok->idmentoring."/".$user_kelompok->idkelompok."/").'" title="Edit"><i class="glyphicon glyphicon-eye-open"></i>Anggota</a>'
                .' <a class="btn btn-sm btn-info" href="'.base_url('Mentoring_kelompok/view_pertemuan/'
                .$user_kelompok->idmentoring."/".$user_kelompok->idkelompok."/").'" title="Edit"><i class="glyphicon glyphicon-eye-open"></i>Pertemuan</a>'
            ];
        }
       
        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModelMentoring->count_all(),
            "recordsFiltered" => $this->ModelMentoring->count_filtered(),
            "data" => $data
        ]);
    }
    
    public function view_kelompok($idmentoring,$idkelompok){
        $sess = $this->session->userdata('ses_mentoring');
        $sess['idmentoring'] = $idmentoring;
        $sess['idkelompok'] = $idkelompok;
        $sess['back_url'] = base_url('Mentoring_kelompok');
        $this->session->set_userdata("ses_mentoring", $sess);
        redirect('/Mentoring_anggota/');
    }
    public function view_pertemuan($idmentoring,$idkelompok){
        $sess = $this->session->userdata('ses_mentoring');
        $sess['idmentoring'] = $idmentoring;
        $sess['idkelompok'] = $idkelompok;
        $sess['back_url'] = base_url('Mentoring_kelompok');
        $this->session->set_userdata("ses_mentoring", $sess);
        redirect('/Mentoring_pertemuan/');
    }
}