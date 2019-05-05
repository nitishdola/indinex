<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		
	}

	public function reports_sub()
	{
		$this->load->view('Reports/reports_sub');
	}

	public function ledger_report() {

		$this->load->view('layout/admin/header');			
		$this->load->view('layout/admin/nav_menu');	
		$this->load->model('ledger_model'); 
		$data['results'] = $this->ledger_model->fetchAllLedger();
		$this->load->view('Reports/ledger/ledger_report', $data);

		if($this->input->get('search')) {

		}

		$this->load->view('layout/admin/footer');	
	}
	

}