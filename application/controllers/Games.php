<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	public function index()
	{
                
    }

    public function showPage($pageId){
        $page = $this->pages_model->getById($pageId);

        $data['pageId'] = $pageId;
        $data['pageTitle'] = $page->title;
        $data['comments'] = formattedComments($this->comments_model->getByPage($pageId));

        $this->load->view('templates/header', $data);
        $this->load->view('games/html_view');
        $this->load->view('comments/comments', $data);
        $this->load->view('comments/comment_form', $data);
        $this->load->view('templates/footer');
        $this->load->view($page->js_view);
        $this->load->view('templates/footer2');
    }
}