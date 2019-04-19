<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Import extends CI_Controller {  
 
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('session');		
		$this->load->helper('form');
        $this->load->database();
        $this->load->model('import_model');

        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->lang->load('auth');

        if (!$this->ion_auth->logged_in())
        {
          // redirect them to the login page
          redirect('auth/login', 'refresh');
        }
    
    }
      
 	public function index(){
 		$this->load->view('import/upload');
 	}
  
  public function uploadData(){
 
  if ($this->input->post('submit')) {
            
            $path = 'uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);            
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                $flag = true;
                $i=0;
                foreach ($allDataInSheet as $value) {
                  if($flag){
                    $flag =false;
                    continue;
                  }
                  $inserdata[$i]['org_name'] = $value['A'];
                  $inserdata[$i]['org_code'] = $value['B'];
                  $inserdata[$i]['gst_no'] = $value['C'];
                  $inserdata[$i]['org_type'] = $value['D'];
                  $inserdata[$i]['Address'] = $value['E'];
                  $i++;
                }               
                $result = $this->import->importdata($inserdata);   
                if($result){
                  echo "Imported successfully";
                }else{
                  echo "ERROR !";
                }             
 
          } catch (Exception $e) {
               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' .$e->getMessage());
            }
          }else{
              echo $error['error'];
            }
            
            
    }
    $this->load->view('upload');
  }
}
?>