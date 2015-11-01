<?php
 class Main_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function database_connect(){
		if( $this->db->get('45cms_posts')){
			return true;
		}else{
			echo 'Unable to connect!';exit;
			return false;
		}
	}
	
	public function get_post($url = false){
		if($url === FALSE){
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('45cms_posts');
			return $query->result_array();
		}
		
		if($this->check_duplicate($url, '45cms_posts', 'url') == 0){
			return False;
		}
	
		$query = $this->db->get_where('45cms_posts', array('url' => $url));
		return $query->row_array();
	}
	
	public function get_where($field, $value, $limit){
		$this->db->where($field, $value);
		$query = $this->db->get('45cms_posts', $limit);
		
		return $query->result_array();
	}
	
	public function get_unique_number(){
		return $this->db->count_all('45cms_posts');
	}
	
	public function create($image = False){
		$post_title = $this->input->post('post_title');
		$post_content = $this->input->post('post_content');
		$post_labels = $this->input->post('post_labels');
		$post_type = $this->input->post('post_type');
		$url = url_title($post_title, 'underscore', TRUE).'_'.$this->get_unique_number();
		
		$duplicate = $this->check_duplicate($url, '45cms_posts', 'url');
		if($duplicate > 0){
			echo 'Title Already Exist!';
			return FALSE;
		}
		
		$data = array(
			'url'	=> $url,
			'title'	=> $post_title,
			'type'	=> $post_type,
			'content'	=> $post_content,
			'image_url'			=> $image,
			'labels'	=> $post_labels,
		);
		$this->db->insert('45cms_posts', $data);
		
		return $url;
	}
	
	public function delete($url){
		//delete photo
		$query = $this->db->get_where('45cms_posts', array('url' => $url));
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 
			$file = $row['image_url'];
			if($file){
				$path = 'images/uploads/'.$file;
				unlink($path);
			}
		}

		//delete database record
		$this->db->delete('45cms_posts', array('url' => $url));
		return TRUE;
	}
	
	public function update_one_field($filter_field, $filter_field_value, $field, $new_value){
		//echo $field.$value;exit;
		$data = array(
			$field => $new_value
		);
		$this->db->where($filter_field, $filter_field_value);
		$this->db->update('45cms_posts', $data);
	}
	
	public function update_post(){
		$post_url = $this->input->post('post_url');
		$new_title = $this->input->post('post_title');
		$new_content = $this->input->post('post_content');
		$new_labels = $this->input->post('post_labels');
		$post_type = $this->input->post('post_type');
		
		$data = array(
			'title' => $new_title,
			'content' => $new_content,
			'labels' => $new_labels,
			'type' => $post_type,
		);
		$this->db->where('url', $post_url);
		$this->db->update('45cms_posts', $data);
		
		return TRUE;
	}
	
	public function delete_image($filename){
		$this->update_one_field('image_url', $filename, 'image_url', '');
		
		$file = $filename;
		$path = 'images/uploads/'.$file;
		unlink($path);
		
		$message = "<success id='delete_result' name='success'>File Deleted!</success>";
		return $message;
	}
	
	public function register(){
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		
		if($this->check_duplicate($username, '45cms_users', 'username') > 0){
			$result['result'] = FALSE;
			$result['message'] = 'Username already exist.';
			return $result;
		}
		
		$data = array(
			'name' => $name,
			'username' => $username,
			'password' => $password,
			'email' => $email
		);
		if($this->db->insert('45cms_users', $data)){
			$result['result'] = TRUE;
			$result['message'] = "You can now login. <input type='text' id='success_signal' value='success' hidden/>";
			return $result;
		}else{
			$result['result'] = FALSE;
			$result['message'] = "Failed to register.<input type='text' id='success_signal' value='failed' hidden/>";
			return $result;
		}
	}
	
	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->db->where('password', $password);
		$this->db->where('username', $username);
		$query = $this->db->get('45cms_users');
		
		if($query->num_rows() == 1)
		{
			$data = array(
				'username'			=> $username,
				'user_validated'	=> TRUE
			);
			$this->session->set_userdata($data);
			
			$result['result'] = TRUE;
			return $result; //username and password confirmed
		}
		
		$result['result'] = FALSE;
		return $result;
	}
	
	public function check_duplicate($value, $table, $field){
		$this->db->where($field, $value);
		$this->db->from($table);
		
		$result = $this->db->count_all_results();
		return $result;
	}
}