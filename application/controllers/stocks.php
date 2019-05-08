<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Controller {
	public function __construct() {
       parent::__construct();	
		$this->load->helper('form');	
		$dbconnect = $this->load->database();

		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->lang->load('auth');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
    }

	public function current_stock()
	{
		$this->load->view('layout/admin/header');			
		$this->load->view('layout/admin/nav_menu');	

		$this->load->model('product_master_model');
		$data['results'] = $this->product_master_model->select()->result();
		$this->load->view('stock/current_stock', $data);

		$this->load->view('layout/admin/footer');	
	}
	
}

?>