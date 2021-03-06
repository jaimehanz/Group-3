<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function index() {
		$this->load->model('Item_model');
		$item = $this->Item_model->getItem();
		$data['items'] = $item;
		$this->load->view('front/home', $data);
	}

	public function about() {
		$this->load->view('front/about');
	}

	public function FAQ() {
		$this->load->view('front/faq');
	}

	public function verify(){
        $this->load->view('front/wait');
    }
	
}