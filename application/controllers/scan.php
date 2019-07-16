<?php
 Class Scan extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
        
    }
 
    function index() {
        if ($this->session->userdata('login')!=1) {   
            redirect('login?pesan=belumlogin','refresh');  
        }
        $this->load->view('v_header');
        $this->load->view('scan/v_scan');
        $this->load->view('v_footer');
    }
    public function get_wirerod(){
       //$barcode='2';
        $barcode=$this->input->post('barcode');
        $data = array('lokasi' =>'finish good' );
        $where = array('barcode_produksi' => $barcode);
        $get=$this->m_crud->edit_data($where,'wirerod_produksi');
        // var_dump($get->num_rows());die();
        if($get->num_rows()>0){   
            $this->m_crud->update_data($where,$data,'wirerod_produksi');
            $datahasil=$this->m_crud-> edit_data($where,'wirerod_produksi')->row_array();
            echo json_encode($datahasil);
        }else{
            echo json_encode($get->row_array());
        }
 
    }

 
} 
?>