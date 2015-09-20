<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
//------ Home Page -----
	function index()
	{
		
		$this->load->view('index');
	}
//--------- Log In & Off-----------
	function sign_in_page()
	{
		$this->load->view('sign_in');
	}

	function login()
	{
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);

		$this->load->model('user');
		$user = $this->user->get_user_by_email($email);
		// var_dump($user);
		if ($user && $user['password'] == $password)
		{
			$user_info = array('user_id' => $user['user_id'],
								'first_name' => $user['first_name'],
								'last_name' => $user['last_name'],
								'email' => $user['email'],
								'password' => $user['password'],
								'userlevel' => $user['userlevel'],
								'created_at' => $user['created_at'],
								'description' => $user['description']);
			$this->session->set_userdata($user_info);
			redirect('/user_profile/'.$user['user_id']);
		}
		else
		{
			$this->session->set_flashdata('login error', "Incorrect email or password");
			redirect('/sign_in');
		}
	}

	function logoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

//-------- Create new users -----------
	function register_page()
	{
		$this->load->view('register_page');
	}

	function add_new_user_page()
	{
		$this->load->view('add_new_user_page');
	}

	function create_new()
	{
		$this->load->model('user');
		$user_details = array(
								'first_name' => $this->input->post('first_name', TRUE),
								'last_name' => $this->input->post('last_name', TRUE),
								'email' => $this->input->post('user_email', TRUE),
								'password' => $this->input->post('user_password', TRUE),
								'userlevel' => $this->input->post('userlevel', TRUE),
								'description' =>$this->input->post('description', TRUE));
        //------- VALIDATIONS -----------------
		$this->load->library("form_validation");
		$this->form_validation->set_rules('first_name', 'First name', 'required');
		$this->form_validation->set_rules('last_name', 'Last name', 'required');
		$this->form_validation->set_rules('user_email', 'Email','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('user_password', 'Password', "required|matches[confirm_password]|min_length[8]");
		$this->form_validation->set_rules('confirm_password', 'Confirmation Password', "required");
		$this->form_validation->set_rules('userlevel', 'userlevel', 'less_than[10]');

		if($this->form_validation->run() === FALSE)
		{
			$errors = validation_errors();
			$this->session->set_userdata('errors', $errors);
			redirect('/register');
		}
		else
		{
			$this->user->insert_new($user_details);
			$user = $this->user->get_user_by_email($user_details['email']);
			$this->session->set_userdata($user);
			redirect('/user_profile/'. $user['user_id']);
		}
	}

//--------- User dashboard and Remove --------
	function user_dashboard()
	{
		$this->load->model('user');
		$userlist = $this->user->show_all_users();
		$this->load->view('user_dashboard', array('list' => $userlist));
	}

	function remove_user($id)
	{
		$this->load->model('user');
		$this->user->remove_user($id);
		redirect('/user_dashboard');
	}

//------ User Profile -----------
	function edit_profile_page($user_id)
	{
		$this->load->model('user');
		$user = $this->user->get_user($user_id);
		$this->load->view('edit_profile_page', array('user' => $user));
	}

	function update_profile_info()
	{
		$this->load->model('user');
		$this->user->get_user($this->input->post('user_id'));
		$user_update = array('user_id' => $this->input->post('user_id', TRUE),
							  'first_name' => $this->input->post('first_name', TRUE),
							  'last_name' => $this->input->post('last_name', TRUE),
							  'email' => $this->input->post('user_email', TRUE),
							  'userlevel' => $this->input->post('userlevel', TRUE));

		$this->load->library("form_validation");
		if ($this->input->post('update') == 'info')
		{
			$this->form_validation->set_rules('first_name', 'First name', 'required');
			$this->form_validation->set_rules('last_name', 'Last name', 'required');
			$this->form_validation->set_rules('user_email', 'Email','required|valid_email');
			$this->form_validation->set_rules('userlevel', 'userlevel', 'less_than[10]');

			if($this->form_validation->run() === FALSE)
			{
				$errors = validation_errors();
				$this->session->set_userdata('errors', $errors);
				redirect('/edit_profile/'.$user_update["user_id"]);
			}
			else
			{
				$update_user = $this->user->update_user($user_update);
				redirect('/user_dashboard');	
			}
		}
	}
	function update_profile_password()
	{
			$this->load->model('user');
			$this->user->get_user($this->input->post('user_id'));
			$user_update = array('password' => $this->input->post('password', TRUE),
								 'confirm_password' => $this->input->post('confirm_password', TRUE),
								  'user_id' => $this->input->post('user_id', TRUE));

			$this->load->library("form_validation");
			if ($this->input->post('update') == 'password')
			{
				$this->form_validation->set_rules('password', 'Password', "required|matches[confirm_password]|min_length[8]");
				$this->form_validation->set_rules('confirm_password', 'Confirmation Password', "required");

					if($this->form_validation->run() === FALSE)
					{
						$errors = validation_errors();
						$this->session->set_userdata('errors', $errors);
						redirect('/edit_profile/'.$user_update["user_id"]);
					}
					else
					{
						$update_user = $this->user->update_password($user_update);
						redirect('/user_dashboard');	
					}
			}
	}
		function update_profile_description()
		{
			$this->load->model('user');
			$user = $this->user->get_user($this->input->post('user_id'));
			$user_update = array('description' => $this->input->post('description', TRUE),
								'user_id' => $this->input->post('user_id', TRUE));
				$this->user->update_description($user_update);
				redirect('/user_dashboard');	
		}
}
