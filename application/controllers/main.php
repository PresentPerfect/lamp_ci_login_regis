<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("America/Los_Angeles");
	
	class Main extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->output->enable_profiler(TRUE);
			$this->output->enable_profiler(TRUE);
			$this->output->set_header("HTTP/1.0 200 OK");
			$this->output->set_header("HTTP/1.1 200 OK");
			$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
			$this->output->set_header("Pragma: no-cache");			
			$this->load->model('User');
		}

		public function index()
		{
			if(!$this->session->userdata('login'))
			{
				$this->load->view('view_main');
			}
			else
			{
				$this->load->view('view_user');
			}
		}

		public function register()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('first_name','First Name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules('email','Email','valid_email|required');
			$this->form_validation->set_rules('password','Password','min_length[8]|required');
			$this->form_validation->set_rules('confirm_password','Confirm Password','matches[password]');

			if ($this->form_validation->run()==FALSE)
			{
				$this->view_data['errors'] = validation_errors();
				$this->session->set_flashdata('error_msg',$this->view_data['errors']);
				redirect('/');
			}
			else
			{
				$this->User->add_user($this->input->post());
				die();
			}
		}

		public function login()
		{
			$user_by_email = $this->User->login($this->input->post('email'));
			if ($user_by_email)
			{
				if ($this->input->post('password') == $user_by_email['password'])
				{
					$this->session->set_userdata('login',TRUE);
					$this->session->set_userdata('user_info',$user_by_email);
					redirect('/');
				}
				else
				{
					$this->session->set_flashdata('login_error_msg','Login failed');
					redirect('/');
				}
			}
			else
			{
				$this->session->set_flashdata('login_error_msg','Login failed');
				redirect('/');
			}
		}

		public function logoff()
		{
			$this->session->sess_destroy();
			redirect('/');
		}
	}

?>