<?php
 Class Spb extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->library('session');
        
    }
 
    function index() {
        if ($this->session->userdata('login')!=1) {   
            redirect('login?pesan=belumlogin','refresh');  
        }
        $data['spb']=$this->m_crud->spb()->get()->result();
        $this->load->view('v_header');
        $this->load->view('spb/v_spb',$data);
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

    public function add_barcode(){
        $barcode=$this->input->post('barcode');
        $spb=$this->input->post('spb');
        $tanggal=$this->input->post('tanggal_kirim');
        // var_dump($tanggal);die();
        $w=array("barcode_produksi"=>$barcode,'status'=>'0');
        $databarcode=$this->m_crud->edit_data($w,'wirerod_produksi')->row_array();
        if ($databarcode==null) {
         echo json_encode($databarcode);
        }else{
            $input = array(
                'barcode_produksi' =>$databarcode['barcode_produksi'] ,
                'spb'=>$spb,
                'jenis'=>$databarcode['jenis'],
                'diameter'=>$databarcode['diameter'],
                'berat'=>$databarcode['berat'],
                'heat_no'=>$databarcode['heat_no'],
                'coil_no'=>$databarcode['coil'],
                'qty'=>$databarcode['qty'],
                'lokasi'=>$databarcode['lokasi'],
                'tanggal_produksi'=>$databarcode['tanggal_produksi'],
                'tanggal_kirim' =>$tanggal
            );
            $this->m_crud->insert_data($input,'wirehouse_entry');
            $this->m_crud->update_data(array('barcode_produksi'=>$databarcode['barcode_produksi']),array('status'=>'1'),'wirerod_produksi');
            echo json_encode($input);
        }
    }
   
    public function input_warehouse(){
     
            $id=$this->uri->segment(3);
            
            $w1=array(
                'no_spb'=>$id
            );
            $data['spb']=$this->m_crud->get_spb($id)->get()->row_array();
            // var_dump($data);die();
            $w=array(
                'status'=>'0',
                'spb'=>$id
            );
            $data['warehouse']=$this->m_crud->edit_data($w,'wirehouse_entry')->result();
            // var_dump($data);die();
            $this->load->view('v_header');
            $this->load->view('spb/v_inputWarehouse',$data);
            $this->load->view('v_footer');

       
    }
    public function kirim(){
            $spb=$this->input->post('no_spb');
            $no_mobil=$this->input->post('vihicle');
            $tanggal_kirim=$this->input->post('tanggal');
            $qty=$this->input->post('qty');

            //cek spb apakah ada
            $w=array('no_spb'=>$spb,'status'=>'0');
            $cek_spb=$this->m_crud->edit_data($w,'spb')->row_array();
            if($cek_spb==null){
                echo $this->session->set_flashdata('message', '<script>alert("SPB salah!!")</script>');
                redirect('spb/input_warehouse');
            }else{
                //edit data spb
                $where=array('status'=>'0');
                $data = array('no_spb' => $spb,
                'status' => '1',
                'vihicle' => $no_mobil,
                'tanggal_kirim'=>$tanggal_kirim
                );
                $this->m_crud->update_data($where,$data,'wirehouse_entry');
                //update status SPB
                $w=array('no_spb'=>$spb);
                $data_update=array('status'=>'1');
                $this->m_crud->update_data($w,$data_update,'spb');
                $this->session->set_flashdata('message', '<script>Barang berhasil dikirim</script>');
                redirect('spb/input_warehouse');
            }
           
        // var_dump($data);die();
            
            
            
            
    }
   
    public function add(){
        if (isset($_POST['simpan'])) {
      
        $id_po=$this->input->post('no_po');
        $berat=$this->input->post('berat');
        $tanggal_kirim=$this->input->post('tanggal_kirim');
        $kode_spb='SPB'.date('ymd');
        
        $data = array('id_po' =>$id_po,'kode_spb'=>$kode_spb, 'berat'=>$berat, 'tanggal_kirim'=>$tanggal_kirim );
        $this->m_crud->insert_data($data,'spb');
        $dataupdate=array('status'=>2);
        $whereupdate = array('id_po' =>$id_po );
        $this->m_crud->update_data($whereupdate,$dataupdate,'po');
        redirect('po');
            }
        
        
        
    }
    public function get_po(){
        $po=$this->input->post('po');
        // $data = array('lokasi' =>'finish good' );
        $where = array('id_po' => $po);
        $get=$this->m_crud->edit_data($where,'po')->row_array();
        
            echo json_encode($get);
    }

    public function delete_hasil(){
        $id=$this->input->post('id');
        $this->m_crud->delete_data(array('id'=>$id),'wirehouse_entry');
            }

        public function kirim_barang(){
            $spb=$this->input->post('no_spb');
            $vihicle=$this->input->post('vihicle');
            $this->m_crud-> update_data(array('spb'=>$spb),array('vihicle'=>$vihicle),'wirehouse_entry');
            $this->m_crud-> update_data(array('no_spb'=>$spb),array('status'=>'1'),'spb');
            
            redirect('spb');
            
        }
     public function detail_spb($id){
        $data['wirehouse_entry']=$this->m_crud->edit_data(array('spb'=>$id),'wirehouse_entry')->result();
        $this->load->view('v_header');
        $this->load->view('spb/v_detailspb', $data);
        $this->load->view('v_footer');
        
        
        
     }
     public function packing_list($id){
        $data['wirehouse_entry']=$this->m_crud->edit_data(array('spb'=>$id),'wirehouse_entry')->result();
        $data['header']=$this->m_crud->get_header($id)->get()->row_array();
        $this->load->view('spb/v_print_detailspb', $data);

     }
     public function print_sj($id){
        $data['wirehouse_entry']=$this->m_crud->edit_data(array('spb'=>$id),'wirehouse_entry')->result();
        $data['header']=$this->m_crud->get_header($id)->get()->row_array();
        $this->load->view('spb/v_print_suratjalan', $data);

     }
 
} 
?>