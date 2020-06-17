<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$method = $this->router->fetch_method();

		if(!$this->session->userdata('adminLoggedIn') && $method != 'show_login'){
			redirect('home');
		}
	}
  

	public function index()
	{
		redirect('admin/show_login');
	}

	public function show_login()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/login_form');
		$this->load->view('templates/footer');
        $this->load->view('templates/footer2');
	}

	public function login()
	{
		$this->form_validation->set_rules('pass', 'mot de passe', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('errors', validation_errors());
            $this->session->keep_flashdata('errors');

            redirect('admin/show_login');
		}
		else{
			$admin = $this->admin_model->getAdmin();
			
			$userPass = $this->input->post('pass');

			if(password_verify($userPass, $admin->pass)) {
				$this->session->set_userdata('adminLoggedIn', true);

				redirect('admin/dashboard');
			} 
			else{
				$this->session->set_flashdata('errors', 'Le mot de passe est incorrect.');
            	$this->session->keep_flashdata('errors');

            	redirect('admin/show_login');
			}
		}
	}

	public function dashboard()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer');
		$this->load->view('templates/footer2');
	 
	}

	public function showPending()
	{
		$data['comments'] = $this->comments_model->getPending();
		foreach($data['comments'] as $comment){
			$page = $this->pages_model->getById($comment->page_id);
			$comment->page_title = $page->title;
		}
		
		$dta['comments'] = formattedComments($data['comments']);

		$this->load->view('templates/header');
		$this->load->view('admin/pending_comments', $data);
		$this->load->view('templates/footer');
		$this->load->view('admin/pending_comments_footer');
        $this->load->view('templates/footer2');
	}

	public function approveComment($id){
		$this->comments_model->approveComment($id);
	}
}