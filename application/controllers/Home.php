<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['pageTitle'] = 'accueil';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/footer');
		$this->load->view('templates/footer2');
	}
}