<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input wirerod</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>wirerod/edit" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <input type="hidden" name="barcode" value="<?php echo $wirerod['barcode']; ?>">
            <tr>
                <td>Jenis</td>
                <td><input type="text" name="jenis" class="form-control" value="<?php echo $wirerod['jenis']; ?>" required></td>
            </tr>
            <tr>
                <td>Diameter</td>
                <td><input type="text" name="jenis" class="form-control" value="<?php echo $wirerod['diameter']; ?>" required></td>
            </tr>            
            <tr>
                <td>Suplier</td>
                <td>
                    <select name="suplier" class="form-control">
                        <option value="">-Silahkan Pilih-</option>
                        <?php
                         foreach($suplier as $s){ 
                        ?>
                        <option <?php if($wirerod['suplier']==$s->id_suplier){echo 'selected';} ?> value="<?php echo $s->id_suplier ?>"><?php echo $s->nama; ?></option>
                        <?php
                         } 
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Heat No</td>
                <td><input type="text" name="heat_no" class="form-control" value="<?php echo $wirerod['heat_no']; ?>" required></td>
            </tr>
            <tr>
                <td>Coil No</td>
                <td><input type="text" name="coil_no" class="form-control" value="<?php echo $wirerod['coil_no']; ?>" required></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" name="quantity" class="form-control" value="<?php echo $wirerod['qty']; ?>" required></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>
                    <select name="lokasi" id="" class="form-control">
                        <option <?php if($wirerod['lokasi']=='incoming'){echo 'selected';} ?> value="incoming">INCOMING</option>
                        <option value="produksi" <?php if($wirerod['lokasi']=='produksi'){echo 'selected';} ?>>PRODUKSI</option>
                        <option value="finish good" <?php if($wirerod['lokasi']=='finish good'){echo 'selected';} ?>>FINISH GOOD</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>detail Lokasi</td>
                <td><input type="text" name="detail_lokasi" class="form-control" value="<?php echo $wirerod['detail_lokasi']; ?>" required></td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="update" value="Update">
                <a href="<?php echo base_url() ?>wirerod" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>
        </table>
    </form>
        </div>
    </div>
</div>
