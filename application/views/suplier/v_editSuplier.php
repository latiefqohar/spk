<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input Suplier</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>suplier/edit" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <input type="hidden" name="id" value="<?php echo $suplier['id_suplier']; ?>">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" class="form-control" value="<?php echo $suplier['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" class="form-control" value="<?php echo $suplier['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>Nomor Telpon</td>
                <td><input type="number" name="no_telpon" class="form-control" value="<?php echo $suplier['telpon']; ?>" ></td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="update" value="Update">
                <a href="<?php echo base_url() ?>/suplier" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>

        </table>
    </form>
        </div>
    </div>
</div>
