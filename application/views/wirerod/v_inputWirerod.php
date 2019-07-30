<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input Wirerod</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>wirerod/add" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>jenis</td>
                <td><input type="text" name="jenis" class="form-control" required></td>
            </tr>
            <tr>
                <td>Diameter</td>
                <td><input type="number" name="diameter"  required>milimeter</td>
            </tr>
            
            <tr>
                <td>Suplier</td>
                <td>
                    <select name="suplier" class="form-control">

                        <option value="">-Silahkan Pilih-</option>
                        <?php
                        foreach($suplier as $s){ 
                        ?>
                        <option value="<?php echo $s->id_suplier ?>"><?php echo $s->nama ?></option>
                        <?php
                        } 
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Heat No</td>
                <td><input type="text" name="heat_no" class="form-control" required></td>
            </tr>
            <tr>
                <td>Coil No</td>
                <td><input type="text" name="coil_no" class="form-control" required></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="number" name="qty" class="form-control" required></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td><input type="number" name="berat" class="form-control" required></td>
            </tr>
            <tr>
                <td>Detail Lokasi</td>
                <td><input type="text" name="detaillokasi" class="form-control" required></td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="simpan" value="simpan">
                <a href="<?php echo base_url() ?>/wirerod" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>

        </table>
    </form>
        </div>
    </div>
</div>
