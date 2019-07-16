<?php
 Class Po extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
        date_default_timezone_set('Asia/Jakarta');
        
    }
 
    function index() {
        if ($this->session->userdata('login')!=1) {   
            redirect('login?pesan=belumlogin','refresh');  
        }
        $data['po']=$this->m_crud->po()->get()->result();
        
        $this->load->view('v_header');
        $this->load->view('po/v_po', $data);
        $this->load->view('v_footer');
    }

    
    public function add()
    {
        if (isset($_POST['simpan'])) {
           $jenis=$this->input->post('jenis');
           $pelanggan=$this->input->post('pelanggan');
           $diameter=$this->input->post('diameter');
           $berat=$this->input->post('berat');
           $date=date('Y-m-d H:i:s');
           $kode_po=date('ymd');
        //    var_dump($kode_po);die();
            $data = array(
                'kode_po'=>'PO'.$kode_po,
                'pelanggan'=>$pelanggan,
                'jenis' =>$jenis ,
                'diameter'=>$diameter,
                'jumlah'=>'1',
                'berat'=>$berat,
                'tanggal'=>$date  
            );
            $this->m_crud->insert_data($data,'po');
            
            redirect('po?pesan=berhasil_input');
            
        }else{
            $data['pelanggan']=$this->m_crud->get_data('pelanggan')->result();
            $this->load->view('v_header');
            $this->load->view('po/v_inputPo',$data);
            $this->load->view('v_footer');
        }
    }

    public function edit(){
        if (isset($_POST['update'])) {
            $id=$this->input->post('id');
            $jenis=$this->input->post('jenis');
           $diameter=$this->input->post('diameter');
           $berat=$this->input->post('berat');
           $pelanggan=$this->input->post('pelanggan');
        //    var_dump($berat);die();
             $data = array(
                'jenis' =>$jenis ,
                'diameter'=>$diameter,
                'berat'=>$berat,
                'pelanggan'=>$pelanggan
             );
             $where=array('id_po'=>$id);
            //  var_dump($where);die();
             $data['po']=$this->m_crud->update_data($where,$data,'po');
             redirect('po?pesan=berhasil_edit');
        }else{
            $where=array('id_po'=>$this->uri->segment(3));
            $data['pelanggan']=$this->m_crud->get_data('pelanggan')->result();
            $data['po']=$this->m_crud->edit_data($where,'po')->row_array();
            $this->load->view('v_header');
            $this->load->view('po/v_editpo',$data);
            $this->load->view('v_footer');
        }
       
    }
    public function delete($id){
        $where=array('id_po'=>$id);
        $this->m_crud->delete_data($where,'po');
        redirect('po?pesan=berhasil_hapus');
    }

    public function buat_spk($id){
        $where = array('id_po' =>$id );
        $data['po']=$this->m_crud-> edit_data($where,'po')->row_array();
        $this->load->view('v_header');
        $this->load->view('spk/v_inputSpk', $data);
        $this->load->view('v_footer');
        
    }

    public function buat_spb($id){
        $where = array('id_po' =>$id );
        $data['po']=$this->m_crud-> edit_data($where,'po')->row_array();
        $this->load->view('v_header');
        $this->load->view('spb/v_inputSpb', $data);
        $this->load->view('v_footer');
    }

    public function get_wirerod(){
        
        $barcode=$this->input->post('barcode');
        $where = array('barcode' => $barcode, 'status'=>0 );
        $data=$this->m_crud-> edit_data($where,'wirerod')->row_array();
        echo json_encode($data);

        
    }
 
 
} 
?>