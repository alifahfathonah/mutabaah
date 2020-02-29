<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "Super.php";
class  Mentoring extends CI_Controller  {

    public function index(){
		if ($this->session->userdata('ses_mentoring') == true){
			redirect(base_url('Mentoring_dashboard'));
		}
		else{
			$this->login();
		}
	}
	public function login(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == TRUE){
			$user = $this->database->login_user('user',$this->input->post('username'),$this->input->post('password'));
			// var_dump($user);
			// print_r($user);
			if(count($user)>=1){
				$this->session->set_userdata('ses_mentoring', array('id' => $user[0]['iduser'], 'username' => $user[0]['nama_user']));
				redirect(base_url('Mentoring_dashboard'));
			}
		}
		else $this->load->view('mtr_mutabaah/login.php');		
	}
	public function logout(){
		$this->session->sess_destroy(); 
		redirect(base_url());
	}
}

?>