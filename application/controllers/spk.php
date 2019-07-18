<?php
 Class Spk extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('m_crud');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
        
        
    }
 
    function index() {
        if ($this->session->userdata('login')!=1) {   
            redirect('login?pesan=belumlogin','refresh');  
        }
        $data['po']=$this->m_crud->join_spk();
        $this->load->view('v_header');
        $this->load->view('spk/v_spk', $data);
        $this->load->view('v_footer');
    }

    
    public function add()
    {
           $id_po=$this->input->post('id_po');
           $barcode=$this->input->post('barcode');
           $date=date('Y-m-d H:i:s');
           $kode_spk=date('ymd');
            $data = array(
                'kode_spk'=>'SPK'.$kode_spk,
                'id_po' =>$id_po ,
                'barcode'=>$barcode,
                'tanggal'=>$date  
            );
            $this->m_crud->insert_data($data,'spk');
            $hasil=$this->db->query('SELECT * FROM spk ORDER BY id_po DESC LIMIT 0, 1 ')->row_array();
            //update po
            $datapo=array(
                'no_spk'=>$hasil['no_spk'],
                'status'=>'1'
            );
            $wherepo=array('id_po'=>$id_po);
            $this->m_crud->update_data($wherepo,$datapo,'po');
            $this->m_crud->update_data(array('barcode'=>$barcode),array('status'=>'1'),'wirerod');
            redirect('po');
    }

    // public function edit(){
    //     if (isset($_POST['update'])) {
    //         $id=$this->input->post('id');
    //         $jenis=$this->input->post('jenis');
    //        $diameter=$this->input->post('diameter');
    //        $jumlah=$this->input->post('jumlah');
    //          $data = array(
    //             'jenis' =>$jenis ,
    //             'diameter'=>$diameter,
    //             'jumlah'=>$jumlah
    //          );
    //          $where=array('id_po'=>$id);
    //         //  var_dump($where);die();
    //          $data['po']=$this->m_crud->update_data($where,$data,'po');
    //          redirect('po?pesan=berhasil_edit');
    //     }else{
    //         $where=array('id_po'=>$this->uri->segment(3));
    //         $data['po']=$this->m_crud->edit_data($where,'po')->row_array();
    //         $this->load->view('v_header');
    //         $this->load->view('po/v_editpo',$data);
    //         $this->load->view('v_footer');
    //     }
       
    // }
    public function delete($id){
        $where=array('id_po'=>$id);
        $this->m_crud->delete_data($where,'po');
        redirect('po?pesan=berhasil_hapus');
    }
    public function produksi($id){
        $where=array('no_spk'=>$id);
        $data['prod']=$this->m_crud->edit_data($where,'wirerod_produksi')->result();
        $data['spk']=$this->m_crud->produksi($id);
        $this->load->view('v_header');
        $this->load->view('produksi/v_inputProduksi',$data);
        $this->load->view('v_footer');
    }
    public function hasil_produksi(){
        $no_spk=$this->input->post('no_spk');
        $jenis=$this->input->post('jenis');
        $diameter=$this->input->post('diameter');
        $berat=$this->input->post('berat');
        $heat_no=$this->input->post('heat_no');
        $coil_awal=$this->input->post('coil_awal');
        $no_mesin=$this->input->post('no_mesin');
        $coil_akhir=$this->input->post('coil_akhir');
        $qty=$this->input->post('qty');
        $detail_lokasi=$this->input->post('detail_lokasi');
        $lokasi='produksi';
        $shift=$this->input->post('shift');
        $tanggal=date('Y-m-d H:i:s');
        $coil_no=$coil_awal.'/'.$coil_akhir;
        // var_dump($coil_no);die();
        $data = array(
            'no_spk' => $no_spk,
            'jenis'=> $jenis,
            'berat'=> $berat,
            'diameter'=>$diameter,
            'heat_no'=>$heat_no,
            'coil'=>$coil_no,
            'no_mesin'=>$no_mesin,
            'qty'=>$qty,
            'lokasi'=>$lokasi,
            'detail_lokasi'=>$detail_lokasi,
            'tanggal_produksi'=>$tanggal
     );
     $this->m_crud->insert_data($data,'wirerod_produksi');
     $data_produksi=$this->m_crud->edit_data(array('no_spk'=>$no_spk),'wirerod_produksi')->result();
     echo json_encode($data_produksi);
    }
    public function delete_hasil(){
        $id=$this->input->post('id');

        
        // $id=$this->uri->segment(3);
        // $spk=$this->uri->segment(4);
        $this->m_crud->delete_data(array('barcode_produksi'=>$id),'wirerod_produksi');        
        // redirect('spk/produksi/'.$spk.'');
    }
    public function selesai_produksi(){
        if (isset($_POST['selesai'])) {
        //update status spk
        $data = array('status' => '1' );
        $where=array('no_spk'=>$this->input->post('no_spk'));
        $this->m_crud->update_data($where,$data,'spk');
        //update status wirerod
        $data1 = array('status' => '1' );
        $where1=array('barcode'=>$this->input->post('barcode'));
        $this->m_crud->update_data($where1,$data1,'wirerod');
        redirect('spk','refresh');
        }    
    }
    public function detail($id){
        $where=array('no_spk'=>$id);
        $data['prod']=$this->m_crud->edit_data($where,'wirerod_produksi')->result();
        $this->load->view('v_header');
        $this->load->view('produksi/v_detailProduksi',$data);
        $this->load->view('v_footer');
    }
    public function spk_pending(){
        $data['spk']=$this->m_crud->data_spk_pending()->get()->result();
        $this->load->view('spk/v_cetak_spk',$data);
        
    }
 
 
} 
?>