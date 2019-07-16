<?php
 Class Suplier extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
        
    }
 
    function index() {
        if ($this->session->userdata('login')!=1) {   
            redirect('login?pesan=belumlogin','refresh');  
        }
        $data['suplier']=$this->m_crud->get_data('suplier')->result();
        $this->load->view('v_header');
        $this->load->view('suplier/v_suplier', $data);
        $this->load->view('v_footer');
    }

    public function add()
    {
        if (isset($_POST['simpan'])) {
           $nama=$this->input->post('nama');
           $alamat=$this->input->post('alamat');
           $no_telp=$this->input->post('no_telpon');
            $data = array(
                'nama' =>$nama ,
                'alamat'=>$alamat,
                'telpon'=>$no_telp 
            );
            $this->m_crud->insert_data($data,'suplier');
            
            redirect('suplier?pesan=berhasil_input');
            
        }else{
            $this->load->view('v_header');
            $this->load->view('suplier/v_inputSuplier');
            $this->load->view('v_footer');
        }
    }

    public function edit(){
        if (isset($_POST['update'])) {
            $idsup=$this->input->post('id');
            $nama=$this->input->post('nama');
            $alamat=$this->input->post('alamat');
            $no_telp=$this->input->post('no_telpon');
             $data = array(
                 'nama' =>$nama ,
                 'alamat'=>$alamat,
                 'telpon'=>$no_telp 
             );
             $where=array('id_suplier'=>$idsup);
             $data['suplier']=$this->m_crud->update_data($where,$data,'suplier');
             redirect('suplier?pesan=berhasil_edit');
        }else{
            $where=array('id_suplier'=>$this->uri->segment(3));
            $data['suplier']=$this->m_crud->edit_data($where,'suplier')->row_array();
            $this->load->view('v_header');
            $this->load->view('suplier/v_editSuplier',$data);
            $this->load->view('v_footer');
        }
       
    }
    public function delete($id){
        $where=array('id_suplier'=>$id);
        $this->m_crud->delete_data($where,'suplier');
        redirect('suplier?pesan=berhasil_hapus');
    }
    
 
 
} 
?>