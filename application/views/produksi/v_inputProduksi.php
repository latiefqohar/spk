<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>Produksi</div>
	<div class="card-body">
        <div class="table-responsive">
            <form action="<?php echo base_url() ?>spk/selesai_produksi" method="post">
        <table class="table table-bordered">
            <tr>
                <th colspan='2'>Data SPK</th>
                
                <th colspan='2'>Data Barcode</th>
                
            </tr>
            <tr>
                <td>No SPK</td>
                <td><?php echo $spk['kode_spk'] ?><input type="text" name="no_spk" id="no_spk" class="form-control" value="<?php echo $spk['no_spk'] ?>" readonly></td>
                <td>No Barcode</td>
                <td><input type="text" name="barcode" class="form-control" value="<?php echo $spk['barcode'] ?>" readonly></td>
            </tr>
            <tr>
                <td>jenis</td>
                <td><input type="text" name="jenis" id="jenis" class="form-control" value="<?php echo $spk['jenis'] ?>" readonly></td>
                <td>No Heat</td>
                <td><input type="text" name="heat_no" id="heat_no" class="form-control" value="<?php echo $spk['heat_no'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Diameter Out</td>
                <td><input type="text" id="diameter" class="form-control" value="<?php echo $spk['diameter'] ?>" readonly></td>
                <td>Diameter in</td>
                <td><input type="text" name="diameter" class="form-control" value="<?php echo $spk['diameter_in'] ?>" readonly></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Berat Awal</td>
                <td><input type="text" name="berat_awal" class="form-control" value="<?php echo $spk['berat'] ?>" readonly></td>
            </tr>
            <tr>
                <th colspan="4" style="text-align:center;">Data Produksi</th>
                
            </tr>
            <tr>
                <td>Coil No</td>
                <input type="hidden" name="coil_awal" id="coil_awal" value="<?php echo $spk['coil_no'] ?>" >
                <td><input type="text" name="coil_akhir" id="coil_akhir" class="form-control"   ></td>
                <td>No Mesin</td>
                <td><input type="text" id="no_mesin" class="form-control"  ></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" name="qty" id="qty" class="form-control" ></td>
                <td>Lokasi</td>
                <td><input type="text" name="lokasi" id="lokasi" class="form-control"  ></td>
            </tr>
            <tr>
                <td>shift</td>
                <td>
                    <select name="shift" id="shift" class="form-control"  >
                        <option value="">--Silahkan Pilih--</option>
                        <option value="1">1 (satu)</option>
                        <option value="2">2 (dua)</option>
                        <option value="3">3 (tiga)</option>
                    </select>
                </td>
                <td>Berat</td>
                <td><input type="text" id="berat" class="form-control"  ></td>
            </tr>
            
        </table>
        <!-- <input type="submit" class="btn btn-success" value="New Prod" name="baru"> -->
        <a href="#" id="tombol" class="btn btn-success">Tambah Data</a>
        <input type="submit" class="btn btn-danger" value="Selesai" name="selesai">
        <a href="<?php echo base_url() ?>spk" class="btn btn-primary foat-right">Kembali</a>
        </form>
        
        </div>
	</div>
</div>
<div id="dataprod"></div>
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>Hasil Produksi</div>
	<div class="card-body">
        <div class="table-responsive" >
          
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nomor Barcode</th>
                <th>Jenis</th>
                <th>Diameter</th>
                <th>Coil No</th>
                <th>Heat_no</th>
                <th>Quantity</th>
                <th>lokasi</th>
                <th>Tanggal Produksi</th>
                <th>action</th>
            </tr>
            </thead id="show_data">
            <tbody> 
            <?php
             foreach($prod as $p){ 
            ?>  
            <tr>
                <td><?php echo $p->barcode_produksi ?></td>
                <td><?php echo $p->jenis ?></td>
                <td><?php echo $p->diameter ?></td>
                <td><?php echo $p->coil ?></td>
                <td><?php echo $p->heat_no ?></td>
                <td><?php echo $p->qty ?></td>
                <td><?php echo $p->detail_lokasi ?></td>
                <td><?php echo $p->tanggal_produksi ?></td>
                <td>
                <!-- <a href="<?php echo base_url() ?>spk/delete_hasil/<?php echo $p->barcode_produksi ?>/<?php echo $p->no_spk ?>" class="btn btn-danger">hapus</a> -->
                <button id="myBtn" class="btn btn-danger" value="<?php echo $p->barcode_produksi ?>" onclick="myFunction() ">Hapus</button>
                </td> 
            </tr>
            <?php
             } 
            ?>
            </tbody>
        </table>
       
        </div>
	</div>
</div>
<script>
function myFunction() {
    var yakin=confirm("Apakah anda yakin akan menghapus?");
    if (yakin) {
        var x = document.getElementById("myBtn").value;
    $.ajax({
        type:'POST',
        url:'<?php echo base_url()."spk/delete_hasil" ?>',
        data:{
            id:x
            },
        success:function(){
            location.reload(true); 
            alert('DATA BERHASIL DIHAPUS');
            
    }
   })
        } else {
           
        }
    
}


var input = document.getElementById("tombol");
input.addEventListener("click", function() {
    var no_spk=$('#no_spk').val();
    var jenis=$('#jenis').val();
    var diameter=$('#diameter').val();
   var coil_awal=$('#coil_awal').val();
   var coil_akhir=$('#coil_akhir').val();
   var heat_no=$('#heat_no').val();
   var no_mesin=$('#no_mesin').val();
   var qty=$('#qty').val();
   var detail_lokasi=$('#lokasi').val();
   var shift=$('#shift').val();
   var berat=$('#berat').val();
//    console.log(coil_awal+"/"+coil_akhir);
   $.ajax({
        type:'POST',
        url:'<?php echo base_url()."spk/hasil_produksi" ?>',
        data:{
            no_spk:no_spk,
            jenis:jenis,
            diameter:diameter,
            berat:berat,
            heat_no:heat_no,
            coil_awal:coil_awal,
            coil_akhir:coil_akhir,
            no_mesin:no_mesin,
            qty:qty,
            detail_lokasi:detail_lokasi,
            shift:shift
            },
        dataType:'json',
        success:function(data){
            console.log(data)
            $('#coil_akhir').val('');
            $('#no_mesin').val('');
            $('#qty').val('');
            $('#lokasi').val('');
            $('#berat').val('');
            alert('DATA BERHASIL DITAMBAH');
            location.reload(true);
    }
   })
  
});


</script>
