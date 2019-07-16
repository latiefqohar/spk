<div class="container">
    <div class="card  mx-auto mt-5">
      <div class="card-header">Create SPK</div>
      <div class="card-body">
      <div class="form-group">
        <div class="form-label-group">
        Barcode
            <input type="number" name="inputBarcode" id="barcode" class="form-control" placeholder="Scan Barcode" autofocus="autofocus" >
        </div>
        </div>
      <form action="<?php echo base_url() ?>spk/add" method="post">
        Data PO
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <input type="hidden" value="<?php echo $po['id_po'] ?>" name="id_po">
               <input type="text" value="<?php echo $po['kode_po'],$po['id_po'] ?>" class="form-control" required="required" readonly>
                  <label for="firstName">No PO</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control" value="<?php echo $po['jenis'] ?>" readonly>
                  <label for="lastName">Jenis</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control"  value="<?php echo $po['diameter'] ?>" readonly>
                  <label for="firstName">Diameter Output</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" class="form-control"  value="<?php echo $po['berat'] ?>" readonly>
                  <label for="lastName">Berat</label>
                </div>
              </div>
            </div>
          </div>
          Data Wirerod
          
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="nobarcode" name="barcode" class="form-control" readonly>
                  <label for="inputPassword">Barcode</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="jenis" class="form-control" readonly>
                  <label for="confirmPassword">jenis Wirerod</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="diameter" class="form-control" readonly>
                  <label for="inputPassword">Diameter Input</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="lokasi" id="lokasi" class="form-control" readonly>
                  <label for="confirmPassword">Lokasi</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="heat" class="form-control" readonly>
                  <label for="inputPassword">Heat No</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="lokasi" id="coil" class="form-control" readonly>
                  <label for="confirmPassword">Coil no</label>
                </div>
              </div>
            </div>
          </div>
          
          <!-- <a class="btn btn-success btn-block" href="<?php echo base_url() ?>spk/add">Register</a> -->
          <button type="submit" class="btn btn-success btn-block" name="simpan" >simpan</button>
        </form>
      </div>
    </div>
  </div>
<script>

  var input = document.getElementById("barcode");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   var angka=$('#barcode').val();
   $.ajax({
        type:'POST',
        url:'<?php echo base_url()."po/get_wirerod" ?>',
        data:{barcode:angka},
        dataType:'json',
        success:function(data){
            console.log(data)
            if(data==null){
              alert ("Data Barcode Tidak Ada!!");
              $('#barcode').val('');
            }else{
              $('#nobarcode').val(data.barcode);
              $('#jenis').val(data.barcode);
              $('#diameter').val(data.diameter);
              $('#lokasi').val(data.lokasi);
              $('#coil').val(data.coil_no);
              $('#heat').val(data.heat_no);
              $('#barcode').val('');
            }
           
           
        }
    })
  }
});
</script>