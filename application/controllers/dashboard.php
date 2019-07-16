<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Dashboard extends CI_Controller {
 
     
     public function __construct()
     {
         parent::__construct();
         $this->load->model('m_crud');
         
     }
      
     public function index()
     {  
         if ($this->session->userdata('login')!=1) {
             
             redirect('login?pesan=belumlogin','refresh');
             
         }
         $data['wirerod']=$this->m_crud->edit_data(array('status'=>0),'wirerod')->num_rows();
         $data['wirerod_produksi']=$this->m_crud->edit_data(array('status'=>0,'lokasi'=>'produksi'),'wirerod_produksi')->num_rows();
         $data['wirerod_finishgood']=$this->m_crud->edit_data(array('status'=>0,'lokasi'=>'finish good'),'wirerod_produksi')->num_rows();
         $data['po']=$this->m_crud->edit_data(array('status'=>0),'po')->num_rows();
         $data['spk']=$this->m_crud->edit_data(array('status'=>0),'spk')->num_rows();
         $data['spb']=$this->m_crud->edit_data(array('status'=>0),'spb')->num_rows();
        //  var_dump($data);die();
        $this->load->view('v_header');
        $this->load->view('v_dashboard',$data);
        $this->load->view('v_footer');
     }
 
 }
 
 /* End of file Dashboard.php */
  
?>