<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrder extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');		
		$this->load->helper('form');
		$this->load->view('layout/header2');			
		$this->load->view('layout/nav_menu');
		$dbconnect = $this->load->database();
		
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

    }

	public function create()
	{
		$this->load->view('PurchaseOrder/add_purchase_order');
	}
	public function company(){
		$this->load->view('PurchaseOrder/formdesign');
	}

}