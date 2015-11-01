<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_controller extends CI_Controller{

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
		$this->is_admin();
	}
	
	public function is_admin(){
		if(!$this->session->userdata('username')){
			redirect(base_url().'login');
		}
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
		$data['featured'] = $this->main_model->get_where('type', 'Featured');
		$data['posts'] = $this->main_model->get_post();
		$data['body'] = $this->load->view('default_views/home', $data, true);
		$this->load->view('template/main_template', $data);
	}
	
	//default CRUD controller functions
	
	public function create(){
		$data['title'] = 'Admin/Create';
		$data['body'] = $this->load->view('default_views/create', '', true);
		$this->load->view('template/main_template', $data);
	}
	
	public function process_create(){
		print_r($_POST);
		//EXIT;
		$file = $_FILES['post_image']['name'];
		if(!empty($file)){
			$image_name = $this->input->post('post_title').'_'.$this->main_model->get_unique_number();
			
			$result = $this->do_upload($image_name, 'post_image');

			if($result['result'] == 'success'){
				$image_name = $result['file_name'];
				$url = $this->main_model->create($image_name);
				if($url){
					//Successful
					$data['url'] = $url;
					$data['message'] = "You have successfuly published a new post!";
					$this->load->view('success', $data);
				}
			}
		}else{
			$url = $this->main_model->create();
			if($url){
				//Successful
				$data['url'] = $url;
				$data['message'] = "You have successfuly published a new post!";
				$this->load->view('success', $data);
			}
		}
		
		return FALSE;
	}
	
	public function do_upload($file_name, $file){
		$config['upload_path'] = './images/uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG';
		$config['file_name'] = $file_name;
		$config['max_size'] = '1000';
		$config['max_width'] = '2000';
		$config['max_height'] = '1000';
		
		$this->load->library('upload', $config);
		
		if(!$this->upload->do_upload($file)){
			//if the upload has failed
			$title = 'Image Upload Error';
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('error', $error);
			
			$result['result'] = 'failed';
			
			return $result;
		}else{
			//if the upload was successful
			$image_data = $this->upload->data();
			$image_name = $image_data['file_name'];
			
			$result['file_name'] = $image_name;
			$result['result'] = 'success';
			
			return $result;
		}
	}
	
	public function read($url){
		$data['title'] = 'Admin/Read';
		$data['brand'] = 'Sample';
		$data['post'] = $this->main_model->get_post($url);
		$data['body'] = $this->load->view('default_views/read', $data, true);
		$this->load->view('template/main_template', $data);
	}
	
	public function update($url){
		$data['title'] = 'Update';
		
		$data['post'] = $this->main_model->get_post($url);
		$data['body'] = $this->load->view('default_views/update', $data, true);
		$this->load->view('template/main_template', $data);
	}
	
	public function image_remove(){
		$image = $this->input->post('image');
		
		$result = $this->main_model->delete_image($image);
		
		$data['message'] = $result;
		$this->load->view('success', $data);
	}
	
	public function update_new_image(){
		$field_filter_value = $this->input->post('url');

		$result = $this->do_upload($field_filter_value, 'image_update');
		$new_value = $result['file_name'];
		
		if($result['result'] == 'success'){
			$this->main_model->update_one_field('url', $field_filter_value, 'image_url', $new_value);
			$data['message'] = "Upload Success! <input id='new_image' style='visibility:hidden;' value='".base_url()."images/uploads/".$new_value."'/>";
			$data['title'] = 'Success';
		}else{
			$data['title'] = 'Failed';
			$data['message'] = 'Upload Failed!';
		}
		
		$this->load->view('system_message', $data);
	}
	
	public function update_post(){
		if($this->main_model->update_post()){
			$data['message'] = 'Update Successful';
			$this->load->view('success', $data);
		}else{
			echo 'Update Failed!';
		}
	}
	
	public function delete($url){
		if($this->main_model->delete($url)){
			$data['title'] = 'Delete Success!';
			$data['message'] = 'You have successfully deleted the post.';
			$data['url'] = '../';
			$data['body'] = $this->load->view('success', $data, true);
		}else{
			$data['title'] = 'Delete Error';
			$data['message'] = 'There was a problem deleting the post.';
			$data['url'] = $url;
			$data['body'] = $this->load->view('error', $data, true);
		}
		
		$this->load->view('system_message', $data);
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
	
	public function logout(){
		//destroy sessions then refirect to login page
		$this->session->sess_destroy('username');
		$this->session->sess_destroy('user_validated');
		redirect(base_url().'login');
	}
	
	public function dashboard(){
		$data['title'] = 'Admin Dashboard';
		$data['posts'] = $this->main_model->get_post();
		$data['body'] = $this->load->view('dashboard', $data, true);
		$this->load->view('template/main_template', $data);
	}
}