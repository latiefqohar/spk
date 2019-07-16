<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <center><h1>PT. MEGA PRATAMA FERINDO</h1></center>  <br><br>
    <center><h1>packing list</h1></center>
    <table>
        <tr>
            <td>Vehicle No</td>
            <td>:<?php echo $header['vihicle']; ?></td>
        </tr>
        <tr>
            <td>No PO</td>
            <td>:<?php echo $header['kode_po'],$header['id_po']; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:<?php echo $header['tanggal_kirim']; ?></td>
        </tr>
        <tr>
            <td>Berat</td>
            <td>:<?php echo $header['berat']; ?>KG</td>
        </tr>
    </table><br><hr><br>
    
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>Barcode</th>
        <th>Jenis</th>
        <th>diameter</th>
        <th>Heat No</th>
        <th>Coil No</th>
        <th>Quantity</th>
        <th>Tanggal produksi</th>


        </tr>
    </thead>
    <tbody>
    <?php
     $qty=0; 
    ?>
            <?php $no=1; ?>
        <?php
            foreach ($wirehouse_entry as $d){ 
        
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d->barcode_produksi ?></td>
        <td><?php echo $d->jenis ?></td>
        <td><?php echo $d->diameter ?></td>
        <td><?php echo $d->heat_no ?></td>
        <td><?php echo $d->coil_no ?></td>
        <td><?php echo $qty+ $d->qty ?></td>
        <td><?php echo $d->tanggal_produksi ?></td>
            <?php $qty=$qty+ $d->qty ?>
        </tr>
        <?php
            } 
        ?>
        <tr>
        <td colspan="5"></td>
        <td > Total </td>
        <td > <?php echo $qty ?></td>
        <td></td>
        </tr>
        <script>window.print()</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>