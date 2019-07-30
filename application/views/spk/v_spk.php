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
    Data SPK</div>
    <div class="card-body">
    <!-- <a href="<?php echo base_url() ?>po/add" class="btn btn-primary"> Tambah Data</a><br> <br> -->
    <a href="<?php echo base_url() ?>spk/spk_pending" class="btn btn-primary" targer="blank"> Cetak SPK menunggu</a>
    <br> <br>
    <div class="table-responsive">
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>No SPK</th>
        <th>No PO</th>
        <th>Jenis</th>
        <th>diameter</th>
        <th>jumlah</th>
        <th>Barcode</th>
        <th>status</th>
        <th>action</th>


        </tr>
    </thead>
    <tbody>
            <?php $no=1; ?>
        <?php
            foreach ($po as $d){ 
        
        ?>
        <tr>
        <td><?php echo $no++ ?></td>

        <td><?php echo $d->no_spk ?></td>
        <td><?php echo $d->kode_po,$d->id_po ?></td>
        <td><?php echo $d->jenis ?></td>
        <td><?php echo $d->diameter ?></td>
        <td><?php echo $d->jumlah ?></td>
        <td><?php echo $d->barcode ?></td>
        <td>
            <?php
            if ($d->status=='1') {
                echo "SPK SELESAI";
            } 
            ?>
        </td>
        <td>
            <?php
            if ($d->status=='1') { ?>
             <a href="<?php echo base_url() ?>spk/detail/<?php echo $d->no_spk ?>" class="btn btn-success"> Detail</a>
           <?php 
            }else if($this->session->userdata('departemen')=='Produksi'|| $this->session->userdata('level')=='Super Admin'){
            ?>
            <a href="<?php echo base_url() ?>spk/produksi/<?php echo $d->no_spk ?>" class="btn btn-primary"> Kerjakan</a>
            <?php
             } else{
                 echo 'no action';
             }
            ?>
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
