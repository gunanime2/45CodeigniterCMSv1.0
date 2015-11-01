<?php
 class Install_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->load->helper('url');
	}

	public function start_install_old(){
		$database_name = $this->input->post('database_name');
		$host_name = $this->input->post('host_name');
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		
		//dont display PHP errors
		error_reporting(0);
		ini_set('display_errors', 0);
		
		$conn = $this->connect($host_name, $user_name, $password);
		if($conn){
			if($this->create_database($database_name, $conn)){
				if($this->create_table($database_name, $conn)){
					mysql_close($conn);
					return true;
				}
			}
		}
		
		return false;
	}
	
	public function start_install(){
		$database_name = $this->input->post('database_name');
		$host_name = $this->input->post('host_name');
		$user_name = $this->input->post('user_name');
		$password = $this->input->post('password');
		
		//dont display PHP errors
		error_reporting(0);
		ini_set('display_errors', 0);
		
		$conn = $this->connect($host_name, $user_name, $password);
		if($conn){
			if($this->create_table($database_name, $conn)){
				mysql_close($conn);
				return true;
			}
		}
		
		return false;
	}
	
	public function connect($host_name, $user_name, $password){
		$conn = mysql_connect($host_name, $user_name, $password);
		if(! $conn && mysql_error())
		{
			die('Could not connect: 31' . mysql_error());
		}
		
		return $conn;
	}
	
	public function create_database($database_name, $conn){
		$sql = 'CREATE Database '.$database_name.'';
		if(mysql_query($sql, $conn)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function create_table($database_name, $conn){
		$sql = 	'CREATE TABLE 45cms_posts('.
				'url TEXT,'.
				'id INT NOT NULL AUTO_INCREMENT,'.
				'date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,'.
				'type TEXT NOT NULL,'.
				'author TEXT NOT NULL,'.
				'image_url TEXT,'.
				'content TEXT NOT NULL,'.
				'views INT,'.
				'labels TEXT,'.
				'title TEXT,'.
				'primary key (id))';
		
		mysql_select_db($database_name);
		$retval = mysql_query($sql, $conn);
		if(! $retval )
		{
		  die('Could not create table: 65' . mysql_error());
		}
		
		$sql = 	'CREATE TABLE 45cms_users('.
				'id INT NOT NULL AUTO_INCREMENT,'.
				'username VARCHAR(20) NOT NULL UNIQUE,'.
				'password VARCHAR(50) NOT NULL,'.
				'date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,'.
				'name TEXT NOT NULL,'.
				'email TEXT NOT NULL,'.
				'primary key (id, username))';
		
		mysql_select_db($database_name);
		$retval = mysql_query($sql, $conn);
		if(! $retval )
		{
		  die('Could not create table: 65' . mysql_error());
		}
		
		//make sample page
		$data = array(
			'title' => 'Sample Page',
			'content' => 'This is a sample page',
			'type'	=> 'Featured',
			'labels' => 'sample',
			'url' => 'sample_post_1'
		);
		$this->db->insert('45cms_posts', $data);
		
		//register the administrator account
		$admin_username = $this->input->post('admin_username');
		$admin_password = $this->input->post('admin_password');
		$admin_email = $this->input->post('admin_email');
		$admin_name = $this->input->post('admin_name');
		
		$data = array(
			'username' => $admin_username,
			'password' => $admin_password,
			'email' => $admin_email,
			'name' => $admin_name
		);
		$this->db->insert('45cms_users', $data);
		
		return true;
	}
	
	public function close(){
		
	}
}