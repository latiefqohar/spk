<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Data wirerod</div>
    <div class="card-body">
    <a href="<?php echo base_url() ?>spb/packing_list/<?php echo $this->uri->segment(3)
     ?>" class="btn btn-info" target="blank">Cetak Packing list</a>&nbsp;
    <a href="<?php echo base_url() ?>spb/print_sj/<?php echo $this->uri->segment(3)
     ?>" class="btn btn-success" target="blank">Cetak Surat Jalan</a><br><br>
    <div class="table-responsive">
    
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
        <th>Barcode</th>
        <th>Jenis</th>
        <th>Heat No</th>
        <th>Coil No</th>
        <th>Quantity</th>
        <th>No Mobil/th>
        <th>Tanggal produksi</th>
        <th>Cetak Barcode</th>

        </tr>
    </thead>
    <tbody>
            <?php $no=1; ?>
        <?php
            foreach ($wirehouse_entry as $d){ 
        
        ?>
        <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d->barcode_produksi ?></td>
        <td><?php echo $d->jenis ?></td>
        <td><?php echo $d->heat_no ?></td>
        <td><?php echo $d->coil_no ?></td>
        <td><?php echo $d->qty ?></td>
        <td><?php echo $d->vihicle ?></td>
        <td><?php echo $d->tanggal_produksi ?></td>
        <td><a href="<?php echo base_url() ?>wirerod/cetak_barcode_produksi/<?php echo $d->barcode_produksi ?>" target="blank" class="btn btn-success">Cetak</a></td>
        </tr>
        <?php
            } 
        ?>
    </tbody>
</table>
</div>
</div>
</div>
