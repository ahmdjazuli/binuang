<?php
require "koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <title>PT. Binuang Mitra Bersama</title>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/images/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/images/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/images/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/images/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="assets/images/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="assets/images/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="assets/images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/images/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="assets/images/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="assets/images/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="assets/images/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="assets/images/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="assets/images/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="assets/images/mstile-310x310.png" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style-index.css">
</head>
<body>
<div id="formWrapper">

<?php
?> <script src="assets/js/sweetalert2.all.min.js"></script> <?php
if ($_GET['m'] == "gagal") {?>
					<script type="text/javascript">
						Swal.fire({
							type: 'error',
							title: 'Oops...',
							text: 'Username/Password Tidak Sesuai!',
						})
					</script>
			<?php }
?>

<div id="form">
<div class="logo">
	<a href="/binuang/"><img src="assets/images/apple-touch-icon-120x120.png"></a>
</div><br>
		<div class="row">
				<div class="col">
					<form action="cek_login.php" method="post">
						<div class="row" style="margin: 0 auto;">
							<div class="input-group input-group-mb" style="max-width: 300px; margin:0 auto;">
								<div class="input-group-prepend">
									<span class="input-group-text"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#000000" d="M12,3A4,4 0 0,1 16,7A4,4 0 0,1 12,11A4,4 0 0,1 8,7A4,4 0 0,1 12,3M16,13.54C16,14.6 15.72,17.07 13.81,19.83L13,15L13.94,13.12C13.32,13.05 12.67,13 12,13C11.33,13 10.68,13.05 10.06,13.12L11,15L10.19,19.83C8.28,17.07 8,14.6 8,13.54C5.61,14.24 4,15.5 4,17V21H10L11.09,21H12.91L14,21H20V17C20,15.5 18.4,14.24 16,13.54Z" /></svg></span>
								</div>
								<input type="text" name="username" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  placeholder="username" required autocomplete="off">
							</div>
						</div>
						<div class="row" style="margin: 0 auto; margin-top: 10px;">
							<div class="input-group input-group-mb" style="max-width: 300px; margin:0 auto;">
								<div class="input-group-prepend">
									<span class="input-group-text"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#000000" d="M7,14A2,2 0 0,1 5,12A2,2 0 0,1 7,10A2,2 0 0,1 9,12A2,2 0 0,1 7,14M12.65,10C11.83,7.67 9.61,6 7,6A6,6 0 0,0 1,12A6,6 0 0,0 7,18C9.61,18 11.83,16.33 12.65,14H17V18H21V14H23V10H12.65Z" /></svg></span>
								</div>
								<input type="password" name="password" class="form-control" aria-label="Default"  aria-describedby="inputGroup-sizing-default" placeholder="password" autocomplete="off" required>
							</div>
						</div>
						<div class="text-center">
						<input style="margin-top: 10px;" type="submit" class="btn btn-dark btn-md" value="MASUK">
						</div>
					</form>
				</div>
			</div>
</div>
</div>
</body>

<!-- script awal -->
<script src="assets/js/jquery.js"></script>
<script>
	$(document).ready(function(){
	var formInputs = $('input[type="text"],input[type="password"]');
	formInputs.focus(function() {
       $(this).parent().children('p.formLabel').addClass('formTop');
       $('div#formWrapper').addClass('darken-bg');
       $('div.logo').addClass('logo-active');
       $('div.logo').removeClass('logo');
	});
	formInputs.focusout(function() {
		if ($.trim($(this).val()).length == 0){
		$(this).parent().children('p.formLabel').removeClass('formTop');
		}
		$('div#formWrapper').removeClass('darken-bg');
		$('div.logo-active').addClass('logo');
		$('div.logo').removeClass('logo-active');

	});
	$('p.formLabel').click(function(){
		 $(this).parent().children('.form-style').focus();
	});
});
</script>
<!-- script akhir -->
</html>