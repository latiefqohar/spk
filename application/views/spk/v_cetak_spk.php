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
  <center><h3>Data SPK Menunggu Pengerjaan</h3></center><br><br>
  <table  class="table table-striped">
  <thead>
    <tr>
      <th scope="col">NO SPK</th>
      <th scope="col">nama_pelanggan</th>
      <th scope="col">Jenis</th>
      <th scope="col">Diameter In</th>
      <th scope="col">Diameter out</th>
      <th scope="col">Quantity</th>
      <th scope="col">Berat</th>
      <th scope="col">Barcode In</th>
    </tr>
  </thead>
  <tbody>
  <?php $berat=0;$qty=0; ?>
  <?php
   foreach ($spk as $s) { ?>

  
    <tr>
  
      <td><?php echo $s->no_spk ?></td>
      <td><?php echo $s->nama ?></td>
      <td><?php echo $s->jenis ?></td>
      <td><?php echo $s->diameter_out ?></td>
      <td><?php echo $s->diameter ?></td>
      <td><?php echo $s->qty ?></td>
      <td><?php echo $s->berat ?></td>
      <td><img src="<?php echo site_url() ?>wirerod/print_barcode/<?php echo $s->barcode; ?>" ></td>
      <?php $berat=$berat+$s->berat; $qty=$qty+$s->qty ?>
    </tr>
    <?php } 
  ?>
    <tr>
        <td colspan="5" style="text-align:right;">Total</td>
        <td ><?php echo $qty ?></td>
        <td ><?php echo $berat ?></td>
    </tr>
  </tbody>
</table>
<script>window.print()</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>