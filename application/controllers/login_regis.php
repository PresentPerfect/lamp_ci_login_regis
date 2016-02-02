<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("America/Los_Angeles");
	
	class Login_regis extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			// $this->output->enable_profiler(TRUE);
			$this->output->set_header("HTTP/1.0 200 OK");
			$this->output->set_header("HTTP/1.1 200 OK");
			$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
			$this->output->set_header("Pragma: no-cache");
			$this->load->model('login_model');
		}

		public function index()
		{
			// $this->session->set_userdata('login',0);
			// die("login is equal to false");

			if ($this->session->userdata('login')) 
			{
				$this->load->view('user_page');
			}
			else
			{
				$this->load->view('login_page');				
			}

		}

		public function regis()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('first_name','First Name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules('email','Email Address','valid_email|required|is_unique[users.email]');
			$this->form_validation->set_rules('password','Password','min_length[8]|required');
			$this->form_validation->set_rules('password_confirm','Confirm Password','matches[password]|required');


			if ($this->form_validation->run() == FALSE) 
			{
				$validation['errors'] = validation_errors();				
				$this->session->set_flashdata('regis_error_msg',$validation['errors']);
				redirect('/');
			}
			else
			{
				// $first_name = $this->input->post('first_name');
				// $last_name = $this->input->post('last_name');
				// $email = $this->input->post('email');
				// $password = $this->input->post('password');

				$regis_success = $this->login_model->add_user($this->input->post());
				$this->session->set_userdata('login',$regis_success);
				$user_by_email = $this->login_model->login($this->input->post('email'));
				$this->session->set_userdata('user_info',$user_by_email);
				redirect('/');
			}			
		}

		public function logoff()
		{
			$this->session->sess_destroy();
			redirect('/');
		}

		public function login()
		{
			$user_by_email = $this->login_model->login($this->input->post('email'));

			if (!$user_by_email)
			{
				$this->session->set_flashdata('login_error_msg','<p>Email is not registered in the system. Please register to login.</p>');
				redirect('/');
			}

			if($this->input->post('password') == $user_by_email['password'])
			{
				$this->session->set_userdata('login',TRUE);
				$this->session->set_userdata('user_info',$user_by_email);
				redirect('/');
			}
			else
			{
				$this->session->set_flashdata('login_error_msg','<p>Password is incorrect.</p>');
				redirect('/');
			}
		}
	}

?>