<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input SPB</div>
    <div class="card-body">
      
        <div class="table-responsive mt-5">
    <form action="<?php echo base_url() ?>spb/add" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>Nomor PO</td>
                <td><input type="text" name="no_po" id="no_po" class="form-control" value="<?php echo $po['id_po'] ?>" required readonly></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td><input type="text" name="jenis" id="jenis" class="form-control" value="<?php echo $po['jenis'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Diameter</td>
                <td><input type="number" name="diameter" id="diameter" class="form-control" value="<?php echo $po['diameter'] ?>" readonly></td>
            </tr>
            <tr>
                <td>jumlah</td>
                <td><input type="number" name="jumlah" id="jumlah" class="form-control" value="<?php echo $po['jumlah'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td><input type="number" name="berat" class="form-control" required ></td>
            </tr>
            <tr>
                <td>tanggal Kirim</td>
                <td><input type="date" name="tanggal_kirim" class="form-control" required ></td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="simpan" value="simpan">
                <a href="<?php echo base_url() ?>/suplier" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>

        </table>
    </form>
        </div>
    </div>
</div>
<script>
  var input = document.getElementById("po");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   var angka=$('#po').val();
   $.ajax({
        type:'POST',
        url:'<?php echo base_url()."spb/get_po" ?>',
        data:{po:angka},
        dataType:'json',
        success:function(data){
            console.log(data)
            if(data===null){
                alert ("Data Po Tidak ada");
            }else{
                $('#no_po').val(data.id_po);
                $('#jenis').val(data.jenis);
                $('#diameter').val(data.diameter);
                $('#jumlah').val(data.jumlah);
                $('#po').val();
            }
            
            
           
        }
    })
  }
});
</script>

