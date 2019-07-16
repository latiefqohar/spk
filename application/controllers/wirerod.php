<?php
 Class Wirerod extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->library('Zend');
        
        
    }
 
    function index() {
        if ($this->session->userdata('login')!=1) {   
            redirect('login?pesan=belumlogin','refresh');  
        }
        $where = array('status' =>'0' );
        $data['wirerod']=$this->m_crud->edit_data($where,'wirerod')->result();
        $this->load->view('v_header');
        $this->load->view('wirerod/v_wirerod', $data);
        $this->load->view('v_footer');
    }
    public function print_barcode($kode){
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128','image',array('text'=>$kode));
    }
    public function cetak_barcode($kode){
        $data['data_barcode']=$this->m_crud->edit_data(array('barcode'=>$kode),'wirerod')->row_array();
       $this->load->view('v_cetakBarcode', $data);
       
    }
    public function cetak_barcode_produksi($kode){
        $data['data_barcode']=$this->m_crud->edit_data(array('barcode_produksi'=>$kode),'wirerod_produksi')->row_array();
       $this->load->view('v_cetakBarcodeProduksi', $data);
       
    }

    
    public function add()
    {
        if (isset($_POST['simpan'])) {
           $jenis=$this->input->post('jenis');
           $diameter=$this->input->post('diameter');
           $berat=$this->input->post('berat');
           $suplier=$this->input->post('suplier');
           $heat_no=$this->input->post('heat_no');
           $coil_no=$this->input->post('coil_no');
           $qty=$this->input->post('qty');
           $detaillokasi=$this->input->post('detaillokasi');
           $tanggal=date('Y-m-d H:i:s');
           
            $data = array(
                'jenis' =>$jenis ,
                'suplier'=>$suplier,
                'diameter'=>$diameter,
                'berat'=>$berat,
                'heat_no'=>$heat_no,
                'coil_no'=>$coil_no,
                'qty'=>$qty,
                'lokasi'=>'incoming',
                'detail_lokasi'=>$detaillokasi,
                'tanggal_masuk'=>$tanggal

            );
            $this->m_crud->insert_data($data,'wirerod');
            
            redirect('wirerod?pesan=berhasil_input');
            
        }else{
            $data['suplier']=$this->m_crud->get_data('suplier')->result();
            $this->load->view('v_header');
            $this->load->view('wirerod/v_inputWirerod', $data);
            $this->load->view('v_footer');
        }
    }

    public function edit(){
        if (isset($_POST['update'])) {
           $jenis=$this->input->post('jenis');
            $suplier=$this->input->post('suplier');
            $diameter=$this->input->post('diameter');
            $heat_no=$this->input->post('heat_no');
            $coil_no=$this->input->post('coil_no');
            $quantity=$this->input->post('quantity');
            $lokasi=$this->input->post('lokasi');
            $detail_lokasi=$this->input->post('detail_lokasi');
            
             $data = array(
                 'jenis' =>$jenis ,
                 'suplier'=>$suplier,
                 'diameter'=>$diameter,
                 'heat_no'=>$heat_no,
                 'coil_no'=>$coil_no,
                 'qty'=>$quantity,
                 'lokasi'=>$lokasi,
                 'detail_lokasi'=>$detail_lokasi
             );
             $where=array('barcode'=>$this->input->post('barcode')
             );
             $data['wirerod']=$this->m_crud->update_data($where,$data,'wirerod');
             redirect('wirerod?pesan=berhasil_edit');
        }else{
            $where=array('barcode'=>$this->uri->segment(3));
            $data['suplier']=$this->m_crud->get_data('suplier')->result();
            $data['wirerod']=$this->m_crud->edit_data($where,'wirerod')->row_array();
            $this->load->view('v_header');
            $this->load->view('wirerod/v_editwirerod',$data);
            $this->load->view('v_footer');
        }
       
    }
    public function delete($id){
        $where=array('barcode'=>$id);
        $this->m_crud->delete_data($where,'wirerod');
        redirect('wirerod?pesan=berhasil_hapus');
    }

    public function produksi(){
        $where = array('lokasi' =>'produksi' );
        $data['wirerod_produksi']=$this->m_crud->edit_data($where,'wirerod_produksi')->result();
        $this->load->view('v_header');
        $this->load->view('produksi/v_wirerod', $data);
        $this->load->view('v_footer');
    }
    public function warehouse(){
        $where = array('lokasi' =>'finish good' );
        $data['wirerod_produksi']=$this->m_crud->edit_data($where,'wirerod_produksi')->result();
        $this->load->view('v_header');
        $this->load->view('produksi/v_wirerod', $data);
        $this->load->view('v_footer');
    }
 
 
} 
?>