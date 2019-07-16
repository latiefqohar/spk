<?php
  if(isset($_GET['pesan']))
  { 
    if($_GET['pesan'] == "berhasil_input")
      { 
        echo "<div class='alert alert-success'>Data Berhasil ditambah.</div>"; 
      }else if($_GET['pesan'] == "berhasil_edit")
      { 
                          echo "<div class='alert alert-success'>Data Berhasil Diubah.</div>";
      }else if($_GET['pesan'] == "berhasil_hapus")
      { 
          echo "<div class='alert alert-danger'>Data Berhasil dihapus.</div>";
      } else { 
                      echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
                  }
  } 
?>

<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Data wirerod</div>
    <div class="card-body">
  
    <div class="table-responsive">
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>Barcode</th>
        <th>Jenis</th>
        <th>Heat No</th>
        <th>Coil No</th>
        <th>Quantity</th>
        <th>Lokasi</th>
        <th>Tanggal Produksi</th>
        <th>Cetak Barcode</th>

        </tr>
    </thead>
    <tbody>
            <?php $no=1; ?>
        <?php
            foreach ($wirerod_produksi as $d){ 
        
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d->barcode_produksi ?></td>
        <td><?php echo $d->jenis ?></td>
        <td><?php echo $d->heat_no ?></td>
        <td><?php echo $d->coil ?></td>
        <td><?php echo $d->qty ?></td>
        <td><?php echo $d->detail_lokasi ?></td>
        <td><?php echo $d->tanggal_produksi ?></td>
        <td><a href="<?php echo base_url() ?>wirerod/cetak_barcode_produksi/<?php echo $d->barcode_produksi ?>" target="blank" class="btn btn-success">Cetak</a></td>
        </tr>
        <?php
            } 
        ?>
    </tbody>
</table>
</div>
</div>
</div>
