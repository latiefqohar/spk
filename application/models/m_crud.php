<?php
class M_crud extends CI_Model{
function cek_login($table,$where){
return $this->db->get_where($table,$where);
}
// Fungsi CRUD
// fungsi untuk mengambil data dari database
function get_data($table){
return $this->db->get($table);
}
// fungsi untuk menginput data ke database
function insert_data($data,$table){
$this->db->insert($table,$data);
}
// fungsi untuk mengedit data
function edit_data($where,$table){
return $this->db->get_where($table,$where);

}
// fungsi untuk menghapus data dari database
function delete_data($where,$table){
$this->db->delete($table,$where);
}
// fungsi untuk mengupdate atau mengubah data di database
function update_data($where,$data,$table){
$this->db->where($where);
$this->db->update($table,$data);

}



// Akhir fungsi CRUD

//join spk
public function join_spk(){
    return $this->db->select('
    a.no_spk,a.kode_spk,a.id_po,a.status,a.barcode,b.jenis,b.kode_po,b.diameter,b.jumlah
    ')->from('spk a')->join('po b','a.id_po=b.id_po')->get()->result();
}
//join produksi
public function produksi($id){
    return $this->db->select('
    a.kode_spk,a.no_spk,a.barcode,b.jenis,b.diameter,b.coil_no,b.detail_lokasi,b.heat_no,b.suplier,b.detail_lokasi,b.berat, c.diameter as diameter_in,d.nama 
    ')->from('spk a')->join('wirerod b','a.barcode=b.barcode')->join('po c','a.id_po=c.id_po')->join('suplier d','b.suplier=d.id_suplier')->where('a.no_spk',$id)->get()->row_array();
}
public function spb(){
    return $this->db->select('
        a.*,
        b.kode_po,
        b.jenis,
        b.diameter,
        b.jumlah,
        c.nama
    ')->from('spb a')->join('po b','a.id_po=b.id_po')->join('pelanggan c','b.pelanggan=c.id_pelanggan');
}

//get data po
public function po(){
    return $this->db->select('
        a.*,
        b.nama
    ')->from('po a')->join('pelanggan b','a.pelanggan=b.id_pelanggan');
}

public function get_spb($id){
    return $this->db->select('
        a.*,
        b.*
    ')->from('spb a')->join('po b','a.id_po=b.id_po')->where('no_spb',$id);
}

public function data_spk_pending(){
    return $this->db->select('
        a.*,
        b.jenis,b.diameter as diameter_out,
        c.*,
        d.nama
    ')->from('spk a')->join('po b','a.id_po=b.id_po')->join('wirerod c','a.barcode=c.barcode')->join('pelanggan d','b.pelanggan=d.id_pelanggan')->where('a.status','0'); 
}
public function get_header($id){
    return $this->db->select('
    a.*,
    b.id_po,b.berat,
    c.kode_po
')->from('wirehouse_entry a')->join('spb b','a.spb=b.no_spb')->join('po c','b.id_po=c.id_po')->where('a.spb',$id); 
}
}
?>