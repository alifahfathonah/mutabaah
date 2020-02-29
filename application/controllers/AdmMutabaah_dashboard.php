<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Super.php";
class AdmMutabaah_dashboard extends Super {
    public function index()
    {
         $this->load->view('adm_mutabaah/layout.php', 
            [
                "content" => [
                    "mutarobi" => count($this->database->select("idmentoring",
                                                    "mentoring", [
                                                        "status_mentoring"=>"1",
                                                        "role_mentoring"=>"mutarobi"
                                                    ])),
                    "murobi" => count($this->database->select("idmentoring",
                                                    "mentoring", [
                                                        "status_mentoring"=>"1",
                                                        "role_mentoring"=>"murobi"
                                            ])),
                    "non_aktif" => count($this->database->select("idmentoring",
                                                    "mentoring", [
                                                        "status_mentoring"=>"0"
                                            ])),
                    "total" => 1 - count($this->database->select("iduser","user","1 = 1")),
                ],
                "page" => "dashboard"
            ]
        );
    }
}