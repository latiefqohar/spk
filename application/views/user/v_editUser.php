<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-table"></i>
    Input user</div>
    <div class="card-body">
        <div class="table-responsive">
    <form action="<?php echo base_url() ?>user/edit" method='post'>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <input type="hidden" name="id" value="<?php echo $user['id_user']; ?>">
            <tr>
                <td>NIK</td>
                <td><input type="number" name="nik" class="form-control" value="<?php echo $user['Nik']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" class="form-control" value="<?php echo $user['nama']; ?>" required></td>
            </tr>
            
            <tr>
                <td>departemen</td>
                <td>
                    <select name="departemen" class="form-control">
                        <option value="">-Silahkan Pilih-</option>
                        <option <?php if($user['departemen']=='PPIC'){echo 'selected';} ?> value="PPIC">PPIC</option>
                        <option <?php if($user['departemen']=='Produksi'){echo 'selected';} ?> value="Produksi">Produksi</option>
                        <option <?php if($user['Marketing']=='PPIC'){echo 'selected';} ?> value="Marketing">Marketing</option>
                        <option <?php if($user['departemen']=='FGWH'){echo 'selected';} ?> value="FGWH">Finish Good</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Jabatan</td>
                <td>
                    <select name="jabatan" class="form-control">
                        <option value="">-Silahkan Pilih-</option>
                        <option <?php if($user['jabatan']=='admin'){echo 'selected';} ?> value="admin">Admin</option>
                        <option <?php if($user['jabatan']=='supervisor'){echo 'selected';} ?> value="supervisor">Supervisor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required></td>
            </tr>
            <tr>
            <td>Level</td>
            <td>
                <select name="level" class="form-control">
                    <option value="">-Silahkan Pilih-</option>
                    <option <?php if($user['level']=='admin'){echo 'selected';} ?> value="admin">Admin</option>
                    <option <?php if($user['level']=='Super Admin'){echo 'selected';} ?> value="Super Admin">Super Admin</option>
                </select>
            </td>
            </tr>
            <tr>
            <td colspan='2'>
                <input type="submit" class="btn btn-success float-right" name="update" value="Update">
                <a href="<?php echo base_url() ?>user" class="btn btn-info float-right"> Kembali</a></<input>
            </td>
            </tr>
        </table>
    </form>
        </div>
    </div>
</div>
