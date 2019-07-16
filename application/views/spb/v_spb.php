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
    <div class="table-responsive">
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>NO Spb</th>
        <th>No PO</th>
        <th>Pelanggan</th>
        <th>Jenis</th>
        <th>Diameter</th>
        <th>Jumlah</th>
        <th>Berat</th>
        <th>Tanggal Kirim</th>

        <th>Warehouse</th>
        </tr>
    </thead>
    <tbody>
            <?php $no=1; ?>
        <?php
            foreach ($spb as $d){ 
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d->kode_spb,$d->no_spb ?></td>
        <td><?php echo $d->kode_po,$d->id_po ?></td>
        <td><?php echo $d->nama ?></td>
        <td><?php echo $d->jenis ?></td>
        <td><?php echo $d->diameter ?></td>
        <td><?php echo $d->jumlah ?></td>
        <td><?php echo $d->berat ?></td>
        <td><?php echo $d->tanggal_kirim ?></td>
        <td><?php 
        if($d->status==1){
            echo '<span class="badge badge-success">SPB selesai</span>&nbsp<a href="'.base_url().'spb/detail_spb/'.$d->no_spb.'" class="btn btn-info">Detail</a>';
        }else{ ?>
           <a href="<?php echo base_url() ?>spb/input_warehouse/<?php echo $d->no_spb ?>" class="btn btn-danger">input</a>
        <?php }
        ?></td>
        
        </tr>
        <?php
            } 
        ?>
    </tbody>
</table>
</div>
</div>
</div>
