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
    <a href="<?php echo base_url() ?>wirerod/add" class="btn btn-primary"> Tambah Data</a><br> <br>
    <div class="table-responsive">
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>Barcode</th>
        <th>Diameter</th>
        <th>Berat</th>
        <th>Jenis</th>
        <th>Suplier</th>
        <th>Heat No</th>
        <th>Coil No</th>
        <th>Quantity</th>
        <th>Lokasi</th>
        
        <th>action</th>

        </tr>
    </thead>
    <tbody>
            <?php $no=1; ?>
        <?php
            foreach ($wirerod as $d){ 
        
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d->barcode ?></td>
        <td><?php echo $d->diameter ?></td>
        <td><?php echo $d->berat ?></td>
        <td><?php echo $d->jenis ?></td>
        <td><?php echo $d->suplier ?></td>
        <td><?php echo $d->heat_no ?></td>
        <td><?php echo $d->coil_no ?></td>
        <td><?php echo $d->qty ?></td>
        <td><?php echo $d->detail_lokasi ?></td>
        
        <td>
            <a href="<?php echo base_url() ?>wirerod/edit/<?php echo $d->barcode ?>" class="btn btn-primary"> Ubah</a>
            <a href="<?php echo base_url() ?>wirerod/delete/<?php echo $d->barcode ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"> Hapus</a>
            <a href="<?php echo base_url() ?>wirerod/cetak_barcode/<?php echo $d->barcode ?>" target="blank" class="btn btn-success">Cetak</a>
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
