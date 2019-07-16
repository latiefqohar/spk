<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input pelanggan</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>pelanggan/edit" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <input type="hidden" name="id" value="<?php echo $pelanggan['id_pelanggan']; ?>">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" class="form-control" value="<?php echo $pelanggan['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" class="form-control" value="<?php echo $pelanggan['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>Nomor Telpon</td>
                <td><input type="number" name="no_telpon" class="form-control" value="<?php echo $pelanggan['telpon']; ?>" ></td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="update" value="Update">
                <a href="<?php echo base_url() ?>/pelanggan" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>

        </table>
    </form>
        </div>
    </div>
</div>
