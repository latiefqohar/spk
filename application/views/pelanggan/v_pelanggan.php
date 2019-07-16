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
    Data pelanggan</div>
    <div class="card-body">
    <a href="<?php echo base_url() ?>pelanggan/add" class="btn btn-primary"> Tambah Data</a><br> <br>
    <div class="table-responsive">
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>nama</th>
        <th>alamat</th>
        <th>telpon</th>
        <th>action</th>

        </tr>
    </thead>
    <tbody>
            <?php $no=1; ?>
        <?php
            foreach ($pelanggan as $d){ 
        
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d->nama ?></td>
        <td><?php echo $d->alamat ?></td>
        <td><?php echo $d->telpon ?></td>
        <td>
            <a href="<?php echo base_url() ?>pelanggan/edit/<?php echo $d->id_pelanggan ?>" class="btn btn-primary"> Ubah</a>
            <a href="<?php echo base_url() ?>pelanggan/delete/<?php echo $d->id_pelanggan ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"> Hapus</a>
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
