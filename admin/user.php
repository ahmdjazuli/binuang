<?php require('header-admin.php'); require('../koneksi.php'); require('../tgl_indo.php'); error_reporting(0); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button class="btn btn-success" type="button"><a href="user_input.php" class="text-white">+</a></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="julikoding" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="juli-imut">Foto Profil</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Telepon</th>
                        <th>Jabatan</th>
                        <th>Level</th>
                        <th class="juli-imut"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT * FROM user ORDER BY nama ASC");
                      while($data = mysqli_fetch_array($query)){
                        ?>
                          <tr class="text-center">
                          <td><?= $no++ ?></td>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['username'] ?></td>
                          <td><?= $data['password'] ?></td>
                          <td><?php 
                          if($data['foto']){
                            ?> <img src="<?= '../'.$data['foto'] ?>" width="80px"> <?php
                          }else{
                            echo "";
                          } ?></td>
                          <td><?= $data['alamat'] ?></td>
                          <td><?= $data['jk'] ?></td>
                          <td><?= tgl_indo($data['tgl']) ?></td>
                          <td><?= $data['telp'] ?></td>
                          <td><?= $data['jabatan'] ?></td>
                          <td><?= $data['level'] ?></td>
                          <td>
                            <button class="btn btn-warning" type="button"><a href="user_edit.php?id=<?= $data['id'] ?>" class="text-white"><i class="far fa-edit"></i></a></button>
                            
                            <button class="btn btn-danger" type="button"><a href="user_delete.php?id=<?= $data['id'] ?>" class="text-white"><i class="far fa-trash-alt"></i></a></button>
                          </td>
                        <?php 
                      }
                    ?>
                  </tbody>
                  <tfoot>
                      <tr class="text-center">
                          <th>No</th>
                          <th>Nama Lengkap</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th class="juli-imut">Foto Profil</th>
                          <th>Alamat</th>
                          <th>Jenis Kelamin</th>
                          <th>Tanggal Lahir</th>
                          <th>Telepon</th>
                          <th>Jabatan</th>
                          <th>Level</th>
                          <th class="juli-imut"></th>
                      </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require('footer-admin.php') ?>