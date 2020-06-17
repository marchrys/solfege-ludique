<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function index()
	{
        $pageId = $this->input->post('pageId');

        $this->form_validation->set_rules('name', 'nom', 'required');
        $this->form_validation->set_rules('comment', 'commentaire', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->keep_flashdata('errors');

            $author = $this->input->post('name');
            $this->session->set_flashdata('name', $author);
            $this->session->keep_flashdata('name');

            $content = $this->input->post('comment');
            $this->session->set_flashdata('comment', $content);
            $this->session->keep_flashdata('comment');

            redirect('games/showPage/' . $pageId);
        }
        else
        {
            $author = $this->input->post('name');
            $content = $this->input->post('comment');
            $now = date('Y-m-d H:i:s');

            $this->comments_model->insertComment($pageId, $author, $content, $now);

            $this->session->set_flashdata('success', 'Votre commentaire est en attente de vérification par un administrateur. Il sera ensuite publié.');
            $this->session->keep_flashdata('success');

            redirect('games/showPage/' . $pageId);
        }
    }

}