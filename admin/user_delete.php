<?php
	require_once("../koneksi.php");
	$id = $_REQUEST['id'];
	mysqli_query($kon, "DELETE FROM user WHERE id='$id'");
	$query = mysqli_query($kon, "SELECT * FROM user WHERE id='$id'");
	$data = mysqli_fetch_array($query);
	unlink('../'.$data['foto']);
	?> <script>window.location='user.php?m=hapus';</script> <?php
?>