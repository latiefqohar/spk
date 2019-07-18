<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input user</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>user/add" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>NIK</td>
                <td><input type="number" name="nik" class="form-control" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" class="form-control" required></td>
            </tr>
            
            <tr>
                <td>departemen</td>
                <td>
                    <select name="departemen" class="form-control">
                        <option value="">-Silahkan Pilih-</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="Marketing">Marketing</option>
                        <option value="FGWH">Finish Good</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="jabatan" class="form-control">
                        <option value="">-Silahkan Pilih-</option>
                        <option value="admin">Admin</option>
                        <option value="supervisor">Supervisor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="form-control" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="form-control" required></td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="simpan" value="simpan">
                <a href="<?php echo base_url() ?>/user" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>
            
        </table>
    </form>
        </div>
    </div>
</div>
