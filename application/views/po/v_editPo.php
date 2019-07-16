<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Edit po</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>po/edit" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <input type="hidden" name="id" value="<?php echo $po['id_po']; ?>">
            <tr>
                <td>Jenis</td>
                <td><input type="text" name="jenis" class="form-control" value="<?php echo $po['jenis']; ?>"></td>
            </tr>
            <tr>
                <td>diameter</td>
                <td><input type="number" name="diameter" class="form-control" value="<?php echo $po['diameter']; ?>"></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td><input type="number" name="berat" class="form-control" value="<?php echo $po['berat']; ?>" ></td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>
                    <select name="pelanggan" class="form-control">
                    <?php
                     foreach($pelanggan as $p){ 
                    ?>
                        <option <?php if($p->id_pelanggan==$po['pelanggan']){echo 'selected';} ?> value="<?php echo $p->id_pelanggan ?>" ><?php echo $p->nama ?></option>
                    <?php
                     } 
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="update" value="Update">
                <a href="<?php echo base_url() ?>/po" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>
         

        </table>
    </form>
        </div>
    </div>
</div>
