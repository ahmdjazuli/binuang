<?php require('header-admin.php'); error_reporting(0); require('../koneksi.php'); 
  $id = $_GET['id'];
  $query = mysqli_query($kon, "SELECT * FROM berita WHERE id = '$id'");
  $data = mysqli_fetch_array($query);
?>

<!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Data Agenda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Agenda</li>
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
          <div class="col-8">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="<?= $data['kategori'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea class="textarea" name="konten" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?= $data['konten'] ?> </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                      <input type="hidden" name="fileLama" value="<?= '../'.$data['gambar'] ?>">
                    </div>
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

  <!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<?php 
  require('../koneksi.php');
  if (isset($_POST['simpan'])) {
    $kategori = $_REQUEST['kategori'];
    $judul    = $_REQUEST['judul'];
    $konten    = $_REQUEST['konten'];

    $namafile       = $_FILES['file']['tmp_name'];
    $namafoto       = $_FILES['file']['name'];
    $lokasi         = "foto/".$_FILES['file']['name'];
    $cekformat      = array('png','jpg','jpeg');
    $x              = explode('.', $namafoto);
    $ekstensi       = strtolower(end($x));

    if(in_array($ekstensi, $cekformat) === true){
        unlink($fileLama);
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

        $query = mysqli_query($kon, "UPDATE berita SET gambar = '$lokasi' WHERE id = '$id'");

      ?> <script>window.location = 'agenda.php?m=ubah'</script> <?php
    }else{ 
      ?> <script>window.location = 'agenda.php?m=info'</script> <?php
    }

    $ubah = mysqli_query($kon,"UPDATE berita SET judul = '$judul', kategori = '$kategori', konten = '$konten' WHERE id = '$id'");
    if($ubah){
      ?> <script>window.location = 'agenda.php?m=ubah'</script> <?php
    }else{
      ?> <script>window.location = 'agenda_edit.php?id=<?= $id ?>&m=gagal'</script> <?php
    }
  }
 ?>