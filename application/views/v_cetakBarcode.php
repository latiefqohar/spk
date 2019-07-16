<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>
</head>
<body>
    <table border="0">
        <tr>
            <td colspan="5" ><center>PT. MPF</center></td>
        </tr>
        <tr>
            <td colspan="5"><center><img src="<?php echo site_url() ?>wirerod/print_barcode/<?php echo $data_barcode['barcode']; ?>" ></center></td>
        </tr>
        <tr>
            <td width="30px">Wire Code</td>
            <td width="30px">:<?php echo $data_barcode['barcode'] ?></td>
            <td width="30px">&nbsp;&nbsp;</td>
            <td width="30px">Date</td>
            <td width="100px">:<?php echo $data_barcode['tanggal_masuk'] ?></td>
        </tr>
        <tr>
            <td>Size</td>
            <td>:<?php echo $data_barcode['diameter'] ?></td>
            <td>&nbsp;&nbsp;</td>
            <td>Vendor</td>
            <td>:<?php echo $data_barcode['suplier'] ?></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td>:<?php echo $data_barcode['qty'] ?></td>
            <td>&nbsp;&nbsp;</td>
            <td>Heat No</td>
            <td>:<?php echo $data_barcode['heat_no'] ?></td>
        </tr>
        <tr>
            <td>Coil_no</td>
            <td>:<?php echo $data_barcode['coil_no'] ?></td>
            <td>&nbsp;&nbsp;</td>
            <td>Lokasi</td>
            <td>:<?php echo $data_barcode['detail_lokasi'] ?></td>
        </tr>
    </table>
</body>
</html>
<script>
window.print();
</script>