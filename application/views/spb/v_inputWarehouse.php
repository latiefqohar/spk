<?php  echo $this->session->flashdata('message')?>


<div class="card  mx-auto ">
	<div class="card-header">Input Warehouse</div>
	<div class="card-body">
		<div class="table-responsive">
		<div class="card text-white mb-3">
        	<div class="card-header bg-primary">No SPB</div>
			<form action="<?php echo base_url() ?>spb/kirim_barang" method="post">
				<div class="card-body text-dark">
				<div class="form-group">
					<label for="no_spb">No SPB</label>
					<input type="hidden" name="no_spb" value="<?php echo $spb['no_spb'] ?>" readonly><input type="text" class="form-control" id="spb"  value="<?php echo $spb['kode_spb'],$spb['no_spb'] ?>" placeholder="silahkan masukkan No SPB" readonly>
				</div>
					
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="vihicle">Jenis</label>
								<input type="text" class="form-control" value="<?php echo $spb['jenis'] ?>" name="vihicle" id="jenis" placeholder="silahkan masukkan No Mobil" readonly>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="tanggal">Diameter</label>
								<input type="text" name="tanggal" class="form-control" value="<?php echo $spb['diameter'] ?>" name="tanggal" readonly >
							</div>
						</div>	
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="vihicle">Jumlah</label></label>
								<input type="text" class="form-control" value="<?php echo $spb['jumlah'] ?>" name="vihicle" placeholder="silahkan masukkan No Mobil" readonly>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="tanggal">Berat</label>
								<input type="text" name="tanggal" class="form-control" value="<?php echo $spb['berat'] ?>" name="tanggal" readonly >
							</div>
						</div>	
					</div>
					
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="vihicle">No Mobil</label>
								<input type="text" class="form-control" id="vihicle" name="vihicle" placeholder="silahkan masukkan No Mobil">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="tanggal">Tanggal Kirim</label>
								<input type="text" name="tanggal" id="tanggal_kirim" class="form-control" value="<?php echo $spb['tanggal_kirim'] ?>" name="tanggal" readonly >
							</div>
						</div>	
					</div>
					<input type="submit" value="Kirim" class="btn btn-success">
					</form>
					<!-- <input type="submit" name="simpan" value="Entry Data barang" class="btn btn-info float-right"> -->
				</div>
			</div>
			

				<div class="card  mx-auto mb-3 mt-2">
					<div class="card-header">Input Barcode</div>
					<div class="card-body">
						<div class="form-group">
							<div class="form-label-group">
								<input type="number" id="barcode" name="barcode" class="form-control" placeholder="Scan Barcode"
									autofocus="autofocus">
							</div>
							<!-- <input type="submit" class="btn btn-success float-right" name="add" value="ADD"> -->
						</div>
					</div>
				</div>
				</div>

			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>barcode_produksi</th>
						<th>jenis</th>
						<th>diameter</th>
						<th>Heat nomor</th>
						<th>Coil nomor</th>
						<th>qty</th>
						<th>lokasi</th>
						<th>Tanggal produksi</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php 
					$no=1; 
					$qty=0;
					?>
					<?php
		foreach ($warehouse as $d){ 
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $d->barcode_produksi ?></td>
						<td><?php echo $d->jenis ?></td>
						<td><?php echo $d->diameter ?></td>
						<td><?php echo $d->heat_no ?></td>
						<td><?php echo $d->coil_no ?></td>
						<td><?php echo $d->qty ?></td>
						<td><?php echo $d->lokasi ?></td>
						<td><?php echo $d->tanggal_produksi ?></td>
						<td> <button id="myBtn" class="btn btn-danger" value="<?php echo $d->id ?>" onclick="myFunction() ">Hapus</button></td>
						<?php $qty+=$d->qty; ?>
					</tr>
					
		<?php
		} 
		?>		
				<tr>
				<td colspan="6">Total</td>
					<td colspan="3"><input type="text" name="qty" value="<?php echo $qty; ?>" readonly></td>
				</tr>
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
        url:'<?php echo base_url()."spb/delete_hasil" ?>',
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

var input=document.getElementById("barcode");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    var barcode=$('#barcode').val();
    var spb=$('#spb').val();
	var vihicle=$('#vihicle').val();
	var tanggal_kirim=$('#tanggal_kirim').val();

   $.ajax({
        type:'POST',
        url:'<?php echo base_url()."spb/add_barcode" ?>',
        data:{
            barcode:barcode,
            spb:spb,
			tanggal_kirim:tanggal_kirim
            },
        dataType:'json',
        success:function(data){
            console.log(data)
            if(data==null){

				alert('Barcode tidak ada');
				
			}else{
				
				alert('Barcode Berhasil Diambil');
				 location.reload(true); 
			}
            $('#barcode').val('');
    }
   });
  


  }
});




</script>