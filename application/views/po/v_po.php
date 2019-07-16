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
    Data po</div>
    <div class="card-body">
    <?php
     if($this->session->userdata('departemen')=='marketing'|| $this->session->userdata('level')=='Super Admin'){?>
    <a href="<?php echo base_url() ?>po/add" class="btn btn-primary"> Tambah Data</a>
    <?php }
    ?>
<br> <br>
    <div class="table-responsive">
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>No PO</th>
        <th>Jenis</th>
        <th>diameter</th>
        <th>Berat</th>
        <th>Tanggal</th>
        <th>no_spk</th>
        <th>pelanggan</th>
        <th>action</th>
        <th>SPK</th>

        </tr>
    </thead>
    <tbody>
            <?php $no=1; ?>
        <?php
            foreach ($po as $d){ 
        
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d->kode_po,$d->id_po ?></td>
        <td><?php echo $d->jenis ?></td>
        <td><?php echo $d->diameter ?></td>
        <td><?php echo $d->berat ?> KG</td>
        <td><?php echo $d->tanggal ?></td>
        <td><?php echo $d->no_spk ?></td>
        <td><?php echo $d->nama ?></td>
        <td style="width:145px">
            <a href="<?php echo base_url() ?>po/edit/<?php echo $d->id_po ?>" class="btn btn-primary btn-xs float-left " > Ubah</a>
            <a href="<?php echo base_url() ?>po/delete/<?php echo $d->id_po ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-xs"> Hapus</a>
        </td>
        <td style="width:100px">
        <?php
         if(($d->no_spk===NULL&&$this->session->userdata('departemen')=='PPIC')||$this->session->userdata('level')=='Super Admin'){ 
        ?>
            <a href="<?php echo base_url() ?>po/buat_spk/<?php echo $d->id_po ?>" class="btn btn-success"> Buat Spk</a>
        <?php
         }elseif(($d->status==1&&$this->session->userdata('marketing')=='PPIC')||$this->session->userdata('level')=='Super Admin'){ ?>
             <a href="<?php echo base_url() ?>po/buat_spb/<?php echo $d->id_po ?>" class="btn btn-info"> Buat SPB</a>
        <?php }elseif($d->status==2){ 
            echo "SPB selesai";
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
