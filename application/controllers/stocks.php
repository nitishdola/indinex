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
		$this->load->model('stock_items_model');
		$data['all_stock_items'] = $this->stock_items_model->fetchAlldata();
		var_dump($data['all_stock_items'] );
		$this->load->view('stock/current_stock');
	}
	
}

?>