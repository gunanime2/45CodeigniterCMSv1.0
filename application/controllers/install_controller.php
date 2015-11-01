<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('install_model');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('form');
		$this->load->helper('text');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('email');
	}
	
	public function index(){
		$this->load->view('install_view');
	}
	
	public function start_install(){
		//start installation return true if success
		if($this->install_model->start_install()){
			$data['host_name'] = $this->input->post('host_name');
			$data['database_name'] = $this->input->post('database_name');
			$data['user_name'] = $this->input->post('user_name');
			$data['password'] = $this->input->post('password');
			$data['install_result'] = TRUE;
		
			$this->load->view('install_result', $data);
		}else{
			$data['install_result'] = FALSE;
		
			$this->load->view('install_result', $data);
		}
	}
}