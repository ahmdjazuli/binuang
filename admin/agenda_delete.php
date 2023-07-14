<?php
	require_once("../koneksi.php");
	$id = $_REQUEST['id'];
	$query = mysqli_query($kon, "SELECT * FROM berita WHERE id='$id'");
	$data = mysqli_fetch_array($query);
	unlink('../'.$data['gambar']);
	mysqli_query($kon, "DELETE FROM berita WHERE id='$id'");
	?> <script>window.location='agenda.php?m=hapus';</script> <?php
?>