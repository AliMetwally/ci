<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 public function __construct(){
        parent::__construct();        
        $this->load->model('model_db');
    }

	 
	public function index()
	{
		$this->load->view('home');		
	
	}

	
	public function login()
	{
		$this->load->library('form_validation');
		// ensure the ajax request
		//$this->util_lib->ajaxOnly();

		// $json to be returned
		$json = array();

		// to clear error tag sufix and prefix like <p>
		$this->form_validation->set_error_delimiters('','');

		// set validation rules
		$this->form_validation->set_rules('email', 'E-mail', ['required', 'trim']);
		$this->form_validation->set_rules('password', 'Password', 'require');

		if ($this->form_validation->run() !== FALSE) {
			 // success scenario 
			// get values 
			$input_email = set_value('email');
			$input_password = set_value('password');

			$json['email'] = $input_email;
			$json['password'] = $input_password;
		}
		
		else {
			 // faild scenario 
		}

		echo print_r($json);
		//$this->output->set_content_type('application/json')->set_output(json_encode($json));

		
		
	} // end of login

	
	

	
}
