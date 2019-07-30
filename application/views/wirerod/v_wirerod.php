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

<div class="container bg-light border pb-2">
<nav class="navbar navbar-light ">
  <form class="form-inline">
    <input class="form-control mr-sm-2 srch" type="text" placeholder="Поиск">
  </form>
</nav>
<div id="accordion" role="tablist">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <span class="badge badge-primary badge-pill incat-count">0</span>
        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Отдел КНО
        </a>
    </div>
    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-body p-0">
        <ul class="list-group cat-list">
         <li class="list-group-item">Иванов Петр Иванович</li>
         <li class="list-group-item">Петров Дмитрий Егорович</li>
         <li class="list-group-item">Сидорова Галина Олеговна</li>
         <li class="list-group-item">Масичкина Люблюка Зайковна</li>
         <li class="list-group-item">Галкин Максим Иванович</li>
         <li class="list-group-item">Егоров Роман Юрьевич</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <span class="badge badge-primary badge-pill incat-count">0</span>
        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Отдел ФО
        </a>
      
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-body p-0">
        <ul class="list-group cat-list">
         <li class="list-group-item">Юрьев Олег Петрович</li>
         <li class="list-group-item">Максимов Юрий Сидорович</li>
         <li class="list-group-item">Андреев Егор Анатольевич</li>
         <li class="list-group-item">Сергеев Иван Вадимович</li>
         <li class="list-group-item">Вадимов Анатолий Владимирович</li>
         <li class="list-group-item">Медвепутов Владимир Михайлович</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<script>
$(document).ready(function(){
    $('.cat-list li').addClass('fnd');
    function counter_set()
    {
        $('.cat-list').each(function() {
        var cnt = $(this).children('.cat-list li.fnd').length;
      
        $(this).parent().parent().parent().find('.incat-count').text(cnt);
                                        });
    }
    
    counter_set();
    
    $('.srch').keyup(function(){
        var txt = $(this).val().toLowerCase();
        $('.cat-list li').filter(function(){
            var mt = $(this).text().toLowerCase().indexOf(txt) > -1;
            $(this).toggle(mt);
            $(this).toggleClass('fnd', mt);
        });
        counter_set();
  });
 
    
    
});

</script>
