<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i>Hasil Produksi</div>
	<div class="card-body">
        <div class="table-responsive">
          
        <table class="table table-bordered">
            <tr>
                <th>Nomor Barcode</th>
                <th>Jenis</th>
                <th>Diameter</th>
                <th>Coil No</th>
                <th>Heat_no</th>
                <th>Quantity</th>
                <th>lokasi</th>
                <th>Tanggal Produksi</th>
            </tr> 
            <?php
             foreach($prod as $p){ 
            ?>  
            <tr>
                <td><?php echo $p->barcode_produksi ?></td>
                <td><?php echo $p->jenis ?></td>
                <td><?php echo $p->diameter ?></td>
                <td><?php echo $p->coil ?></td>
                <td><?php echo $p->heat_no ?></td>
                <td><?php echo $p->qty ?></td>
                <td><?php echo $p->detail_lokasi ?></td>
                <td><?php echo $p->tanggal_produksi ?></td>
            </tr>
            <?php
             } 
            ?>
       

        </table>
        <a href="<?php echo base_url() ?>spk" class="btn btn-primary foat-right">Kembali</a>
        
        </div>
	</div>
</div>