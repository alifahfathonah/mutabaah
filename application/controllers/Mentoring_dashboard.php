<?php
defined('BASEPATH') or exit('No direct script access allowed');
require "App.php";
class Mentoring_dashboard extends App
{
    public function index(){
        $sess = $this->session->userdata('ses_mentoring');
        $this->load->view('mtr_mutabaah/layout.php',[
            'content' => NULL,
            "page" => "dashboard",
            "user_iduser" => $sess['id'],
            "box" => [
                "sholat" => "",
                "ngaji" => "",
                "mentoring" => "",
            ]
        ]);
    }

}
