<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input po</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>po/add" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>jenis</td>
                <td><input type="text" name="jenis" class="form-control" required></td>
            </tr>
            <tr>
                <td>diameter</td>
                <td><input type="number" name="diameter" class="form-control" required></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td><input type="number" name="berat" class="form-control" required ></td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="pelanggan" class="form-control" required>
                        <option value="">--pilih pelanggan-- </option>
                        <?php
                         foreach($pelanggan as $p){
                        ?>
                        <option value="<?php echo $p->id_pelanggan ?>" ><?php echo $p->nama ?></option>
                        <?php
                         } 
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="simpan" value="simpan">
                <a href="<?php echo base_url() ?>/po" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>

        </table>
    </form>
        </div>
    </div>
</div>
