<?php
 Class Pelanggan extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
        
    }
 
    function index() {
        if ($this->session->userdata('login')!=1) {   
            redirect('login?pesan=belumlogin','refresh');  
        }
        $data['pelanggan']=$this->m_crud->get_data('pelanggan')->result();
        $this->load->view('v_header');
        $this->load->view('pelanggan/v_pelanggan', $data);
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
            $this->m_crud->insert_data($data,'pelanggan');
            
            redirect('pelanggan?pesan=berhasil_input');
            
        }else{
            $this->load->view('v_header');
            $this->load->view('pelanggan/v_inputPelanggan');
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
             $where=array('id_pelanggan'=>$idsup);
            //  var_dump($where);die();
             $data['pelanggan']=$this->m_crud->update_data($where,$data,'pelanggan');
             redirect('pelanggan?pesan=berhasil_edit');
        }else{
            $where=array('id_pelanggan'=>$this->uri->segment(3));
            $data['pelanggan']=$this->m_crud->edit_data($where,'pelanggan')->row_array();
            $this->load->view('v_header');
            $this->load->view('pelanggan/v_editPelanggan',$data);
            $this->load->view('v_footer');
        }
       
    }
    public function delete($id){
        $where=array('id_pelanggan'=>$id);
        $this->m_crud->delete_data($where,'pelanggan');
        redirect('pelanggan?pesan=berhasil_hapus');
    }
 
 
} 
?>