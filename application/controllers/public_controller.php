<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('main_model');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('form');
		$this->load->helper('text');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->library('image_lib');
	}
	
	public function install(){
		if($this->main_model->database_connect()){
			echo 'Connected!';
		}else{
			redirect('/install');
		}
	}
	
	public function index(){
		$data['title'] = 'Home';
		$data['sticky'] = $this->main_model->get_where('type', 'Sticky', 4);
		$data['featured'] = $this->main_model->get_where('type', 'Featured', 3);
		$data['posts'] = $this->main_model->get_post();
		$data['body'] = $this->load->view('default_views/home', $data, true);
		$this->load->view('template/main_template', $data);
	}
	
	public function read($url){
		$data['brand'] = 'Sample';
		$data['post'] = $this->main_model->get_post($url);
		if($data['post'] == false){
			redirect(base_url().'not_found');
		}
		$data['body'] = $this->load->view('default_views/read', $data, true);
		$this->load->view('template/main_template', $data);
	}
	
	public function login(){
		if(!$this->session->userdata('user_validated')){
			if(!empty($_POST)){
				//came from login form
				$result = $this->main_model->login();
				
				if($result['result'] == true){
					//login success
					$data['title'] = 'Login Success.';
					$data['message'] = 'You have successfully logged in.
						<p>Click on the button bellow to proceed to the dashboard.<br/>
							<a class="btn btn-info" href="'.base_url().'dashboard">Dashboard</a>
						</p>';
					echo 'Hello '.$this->session->userdata('username');
				}else{
					//login failed
					$data['title'] = 'Login Failed.';
					$data['message'] = 'Please check you inputs.';
				}
				$this->load->view('system_message', $data);
			}else{
				//came from login link
				$data['title'] = 'Login';
				$data['body'] = $this->load->view('login', $data, TRUE);
				
				$this->load->view('template/main_template', $data);
			}
		}else{
			redirect(base_url().'dashboard');
		}
	}
	
	public function register(){
		$data['title'] = 'Register';

		$data['body'] = $this->load->view('register', $data, true);
		$this->load->view('template/main_template', $data);
	}
	
	public function process_register(){
		$result = $this->main_model->register();
		if($result['result']){
			$data['title'] = 'Success';
			$data['message'] = $result['message'];
			$this->load->view('system_message', $data);
		}else{
			$data['title'] = 'Failed';
			$data['message'] = $result['message'];
			$this->load->view('system_message', $data);
		}
	}
	
	public function not_found(){
		echo "ERROR 404";
	}
}