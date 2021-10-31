<section class="content">
  <div class="container-fluid">
    <div class="block-header" id="konten">
      <?php if($this->session->flashdata('status')!= ""){
        echo $this->session->flashdata('status');
      } ?>
      <table class="table table-hover display" id="table-datatable">
        <thead>
          <tr>
            <th style="vertical-align: middle;">No</th>
            <th style="vertical-align: middle;">Nama Lengkap</th>
            <th style="vertical-align: middle;">Email (Username)</th>
            <th style="text-align: center;">Jabatan</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Hapus</th>
            <th style="text-align: center;">Reset Password</th>
          </tr>

        </thead>
        <tbody>
          <?php $i=1; foreach ($user as $user) : ?>
            <tr>
              <td><?=$i ?>.</td>
              <td><?= $user['nama_lengkap']?></td>
              <td><?= $user['username'] ?></td>
              <td><?= $user['nama_role'] ?></td>
              <td><?php if($user['status'] == 1){echo "Aktif"; $user['status'] = 0;}else {echo 'Non Aktif';$user['status'] = 1;} ?></td>
              <td><a href="<?=base_url() ?>dashboard/user_nonaktif/aktor/<?= $user['id_user'] ?>/<?= $user['status'] ?>" class="btn btn-warnin"> <button class="text-white"><?php if($user['status'] == 1){echo "Aktifkan"; }else {echo 'Non Aktifkan';} ?></button></a></td>
              <td><a href="<?=base_url() ?>dashboard/reset_password_user/<?= $user['id_user'] ?>" class="btn btn-warnin"> <button class="text-white">Reset Password</button></a></td>
            </tr>

          <?php $i++;endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</section>
