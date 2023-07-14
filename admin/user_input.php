<?php require('header-admin.php'); error_reporting(0); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data User</li>
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
          <div class="col-6">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl">
                  </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                  </div>
                  <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" class="form-control" placeholder="Telepon" name="telp">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" cols="30" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto Profil</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                      <option value="admin">Admin</option>
                      <option value="karyawan">Karyawan</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                  <button type="button" class="btn btn-default float-right"><a href="user.php">Cancel</a></button>
                </div>
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

<?php 
  require('../koneksi.php');
  if (isset($_POST['simpan'])) {
    $username = $_REQUEST['username'];
    $nama     = $_REQUEST['nama'];
    $pass     = $_REQUEST['password'];
    $level    = $_REQUEST['level'];
    $alamat   = $_REQUEST['alamat'];
    $telp     = $_REQUEST['telp'];
    $tgl      = $_REQUEST['tgl'];
    $jabatan  = $_REQUEST['jabatan'];

    $namafile       = $_FILES['file']['tmp_name'];
    $namafoto       = $_FILES['file']['name'];
    $lokasi         = "foto/".$_FILES['file']['name'];
    $cekformat      = array('png','jpg','jpeg');
    $x              = explode('.', $namafoto);
    $ekstensi       = strtolower(end($x));

    if(in_array($ekstensi, $cekformat) === true){
        move_uploaded_file($namafile, '../'.$lokasi);
        list($lebar, $tinggi) = getimagesize('../'.$lokasi);
        $warna_baru = imagecreatetruecolor(300, 300);

        if(in_array($ekstensi, array('jpg','jpeg'))){
            $file_baru = imagecreatefromjpeg('../'.$lokasi);
            
        }else if(in_array($ekstensi, array('png'))){
            $file_baru = imagecreatefrompng('../'.$lokasi);
        }
        
        imagecopyresampled($warna_baru, $file_baru, 0, 0, 0, 0, 300, 300, $lebar, $tinggi);

        if(in_array($ekstensi, array('jpg','jpeg'))){
            imagejpeg($warna_baru, '../'.$lokasi, 100);
            
        }else if(in_array($ekstensi, array('png'))){
            imagepng($warna_baru, '../'.$lokasi, 9);
        }

        $cek = mysqli_query($kon, "SELECT * FROM user WHERE username='$username'");

        if(mysqli_num_rows($cek)>0){
            ?> <script>window.location='user_input.php?m=sama';</script> <?php
        }else{
            $tambah = mysqli_query($kon,"INSERT INTO user(username,password,level,alamat,telp,tgl,jabatan,nama,foto) VALUES ('$username','$pass','$level','$alamat','$telp','$tgl','$jabatan','$nama','$lokasi')");
            if($tambah){
              ?> <script>window.location='user.php?m=simpan';</script> <?php
            }else{
              ?> <script>window.location='user_input.php?m=gagal';</script> <?php
            }
        }
    }else{ 
      ?> <script>window.location = 'user.php?m=info'</script> <?php
    }
  }
 ?>