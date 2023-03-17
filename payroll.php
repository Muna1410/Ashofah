<?php
session_start();
error_reporting(0);
include "config/timeout.php";
include "config/koneksi.php";
include "config/fungsi_ago.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_masakerja.php";

$nav				= "";
$ambil				= "home.php";
$ambilcss1			= "";
$ambilcss2			= "";
$ambilcss3			= "";
$ambilcss4			= "";
$ambilcss5			= "";
$ambilcss6			= "";
$ambilcss7			= "";
$ambilcss8			= "";
$ambilcss9			= "";
$ambilcss10			= "";

$ambiljs0			= "";
$ambiljs1			= "";
$ambiljs2			= "";
$ambiljs3			= "";
$ambiljs4			= "";
$ambiljs5			= "";
$ambiljs6			= "";
$ambiljs7			= "";
$ambiljs8			= "";
$ambiljs9			= "";
$ambiljs10			= "";
$ambiljs11			= "";
$ambiljs12			= "";
$ambilfungsi		= "";
$ambilfungsi2		= "";



$id 				= isset($_GET['id']) ? $_GET['id'] : "";
if ($id == "") {
	$nav 				= "Dashboard";
	$ambil 				= "home.php";
	$ambilcss2			= "";
	$ambiljs0			= "assets/js/jquery.2.1.1.min.js";
	$ambiljs1			= "assets/js/hm.js";
	$ambiljs2			= "assets/js/highcharts.js";
	$ambiljs3           = "exporting.js";
	$ambilfungsi		= "config/fungsihome.php";
} elseif ($id == "msg") {
	$nav 				= "Inbox";
	$ambil 				= "inbox/inbox.php";
	$ambiljs0			= "assets/js/jquery-1.8.3.min.js";
	$ambiljs1			= "assets/js/inbox.js";
} elseif ($id == "profil") {
	$nav 				= "Profile Pegawai";
	$ambil 				= "pegawai/profile.php";
	$ambilcss1			= "assets/css/jquery-ui.custom.min.css";
	$ambilcss2			= "assets/css/jquery.gritter.css";
	$ambilcss3			= "assets/css/select2.css";
	$ambilcss4			= "assets/css/datepicker.css";
	$ambilcss5			= "assets/css/bootstrap-editable.css";
	$ambilcss6			= "";
	$ambiljs0			= "assets/js/jquery.2.1.1.min.js";
	$ambiljs1			= "";
	$ambiljs2			= "assets/js/jquery.gritter.min.js";
	$ambiljs3			= "assets/js/bootbox.min.js";
	$ambiljs4			= "assets/js/jquery.easypiechart.min.js";
	$ambiljs5			= "assets/js/date-time/bootstrap-datepicker.min.js";
	$ambiljs6			= "assets/js/jquery.hotkeys.min.js";
	$ambiljs7			= "assets/js/bootstrap-wysiwyg.min.js";
	$ambiljs8			= "assets/js/select2.min.js";
	$ambiljs9			= "assets/js/fuelux/fuelux.spinner.min.js";
	$ambiljs10			= "assets/js/x-editable/bootstrap-editable.min.js";
	$ambiljs11			= "assets/js/x-editable/ace-editable.min.js";
	$ambiljs12			= "assets/js/jquery.maskedinput.min.js";
	$ambilfungsi		= "config/fungsi_profil.php";
} elseif ($id == "set") {
	$nav 				= "Setting";
	$ambil 				= "setting.php";
	$ambiljs0			= "assets/js/jquery.2.1.1.min.js";
} elseif ($id == "cari") {
	$nav 				= "Cari Pegawai";
	$ambil 				= "pegawai/caripegawai.php";
	$ambiljs0			= "assets/js/jquery.2.1.1.min.js";
} else {
	$nav 				= "Dashboard";
	$ambil 				= "home.php";
	$ambilcss2			= "";
	$ambiljs0			= "assets/js/jquery.2.1.1.min.js";
	$ambiljs1			= "assets/js/hm.js";
	$ambiljs2			= "assets/js/highcharts.js";
	$ambiljs3           = "exporting.js";
	$ambilfungsi		= "config/fungsihome.php";
}



$id_user = $_SESSION['kode'];
$nip = $_SESSION['nip'];
$nm_user = $_SESSION['namauser'];
$iduser = $_SESSION['id_daftar'];
$sesi_username			= isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) || $_SESSION['leveluser'] == '4') {
	if (!login_check()) {
		echo "
  <script>alert('Expired, Anda Harus login lagi');document.location='logout.php';</script>";

		exit(0);
	} else {

		?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Dashboard - Admin</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="shortcut icon" href="favicon.ico" />
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.1.0/css/font-awesome.min.css" />

	<link rel="stylesheet" href="<?php echo $ambilcss1; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss2; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss3; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss4; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss5; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss6; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss7; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss8; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss9; ?>" />
	<link rel="stylesheet" href="<?php echo $ambilcss10; ?>" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/ace.min.css" id="main-ace-style" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
	<![endif]-->
	<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="assets/js/ace-extra.min.js"></script>
	<script src="assets/js/time.js" type="text/javascript"></script>
	<script src="<?php echo $ambiljs0; ?>"></script>
	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
	<?php include $ambilfungsi2; ?>
	<!--[if lte IE 8]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<?php
		$queryskin = mysqli_query($mysqli, "select skin from master");
		$rowskin = mysqli_fetch_array($queryskin);
		echo "<body class='" . $rowskin[0] . "'>";
		?>
<!-- Preloader -->

<div id="navbar" class="navbar navbar-default">
	<script type="text/javascript">
		try {
			ace.settings.check('navbar', 'fixed')
		} catch (e) {}
	</script>

	<div class="navbar-container" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="#" class="navbar-brand">
				<small>
					<i class="fa fa-eye"></i>
					Admin
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">




				<li class="green">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
						<?php
								$data = mysqli_query($mysqli, "select count(sudahbaca)as jum2 from tabel_pesan where sudahbaca='N' and kepada='$nm_user'");
								while ($b = mysqli_fetch_array($data)) {
									echo "<span class='badge badge-success'>" . $b['jum2'] . "</span>";
								}
								?>



					</a>

					<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<?php

									$count = mysqli_query($mysqli, "select count(kepada)as jum from tabel_pesan where kepada='$nm_user' and sudahbaca='N'");
									while ($row4 = mysqli_fetch_array($count)) {
										echo "<span class='ace-icon fa fa-envelope-o'> " . $row4['jum'] . " Pesan</span>";
									}
									?>

							<?php
									$pesan = mysqli_query($mysqli, "select tabel_pesan.waktu,dari,kepada,pesan,tbl_user.photo, sudahbaca,subject from tabel_pesan,tbl_user
                where kepada='$nm_user'
                and tabel_pesan.dari=tbl_user.username
                and tabel_pesan.sudahbaca='N'
                GROUP BY dari order by waktu asc ");
									while ($row3 = mysqli_fetch_array($pesan)) {

										?>
						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar">
								<li>
									<a href="?id=msg">
										<img src='<?php echo $row3['photo']; ?>' class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue"><?php echo $row3['dari']; ?>:</span>
												<?php echo $row3['subject']; ?>
											</span>

											<span class="msg-time">
												<i class="ace-icon fa fa-clock-o"></i>
												<span><?php echo relative_format($row3['waktu']); ?></span>
											</span>
										</span>
									</a>
								</li>

							</ul>
						</li>
						<?php
								}
								?>
						<li class="dropdown-footer">
							<a href="?id=msg">
								See all messages
								<i class="ace-icon fa fa-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<?php

								$user = mysqli_query($mysqli, "select * from tbl_user where id_user=$id_user");
								while ($rowuser = mysqli_fetch_array($user)) {
									echo "<img class='nav-user-photo' src='" . $rowuser['photo'] . "' alt='Jason's Photo' />";
									echo "<span class='user-info'>";
									echo "<small>Welcome,</small>";
									echo "" . $rowuser['username'] . "";
									echo "</span>";
								}
								?>


						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="?id=set">
								<i class="ace-icon fa fa-cog"></i>
								Settings
							</a>
						</li>

						<li>
							<a href="?id=profil">
								<i class="ace-icon fa fa-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<button class="btn btn-minier btn-danger" id="bootbox-confirm"><i class="ace-icon glyphicon glyphicon-off"></i>logout</button>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>

<div class="main-container" id="main-container">
	<script type="text/javascript">
		try {
			ace.settings.check('main-container', 'fixed')
		} catch (e) {}
	</script>

	<div id="sidebar" class="sidebar responsive">
		<script type="text/javascript">
			try {
				ace.settings.check('sidebar', 'fixed')
			} catch (e) {}
		</script>

		<div class="sidebar-shortcuts" id="sidebar-shortcuts">
			<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				<button class="btn btn-success">
					<i class="ace-icon fa fa-signal"></i>
				</button>

				<button class="btn btn-info">
					<i class="ace-icon fa fa-pencil"></i>
				</button>



				<a href="?id=list_user" class="btn btn-warning">
					<i class="ace-icon fa fa-users"></i>
				</a>


				<button class="btn btn-danger">
					<i class="ace-icon fa fa-cogs"></i>
				</button>
			</div>

			<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
				<span class="btn btn-success"></span>

				<span class="btn btn-info"></span>

				<span class="btn btn-warning"></span>

				<span class="btn btn-danger"></span>
			</div>
		</div><!-- /.sidebar-shortcuts -->

		<ul class="nav nav-list">
			<li class="active">
				<a href="?id=home">
					<i class="menu-icon fa fa-tachometer"></i>
					<span class="menu-text"> Dashboard </span>
				</a>

				<b class="arrow"></b>
			</li>


			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-credit-card"></i>
					<span class="menu-text"> Payroll </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-caret-right"></i>
							Gaji Pokok
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-caret-right"></i>
							Lembur
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-caret-right"></i>
							Potongan
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-caret-right"></i>
							Pajak
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-caret-right"></i>
							Proses Payroll
						</a>

						<b class="arrow"></b>
					</li>

				</ul>
			</li>


			<li class="">
				<a href="#">
					<i class="menu-icon fa fa-calendar"></i>

					<span class="menu-text">
						Calendar

						<span class="badge badge-transparent tooltip-error" title="2 Important Events">
							<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
						</span>
					</span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="#">
					<i class="menu-icon fa fa-picture-o"></i>
					<span class="menu-text"> Gallery </span>
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-tag"></i>
					<span class="menu-text"> More Pages </span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">


					<li class="">
						<a href="#">
							<i class="menu-icon fa fa-caret-right"></i>
							Setting
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="logout.php" id="logout" onclick="return confirm('Apakah Anda yakin?')">
							<i class="menu-icon fa fa-caret-right"></i>
							Logout
						</a>

						<b class="arrow"></b>
					</li>

				</ul>
			</li>


		</ul><!-- /.nav-list -->

		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>

		<script type="text/javascript">
			try {
				ace.settings.check('sidebar', 'collapsed')
			} catch (e) {}
		</script>
	</div>

	<div class="main-content">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try {
					ace.settings.check('breadcrumbs', 'fixed')
				} catch (e) {}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active"><?php echo $nav; ?></li>
			</ul><!-- /.breadcrumb -->

			<small>
				<i class="icon-double-angle-right"></i>
				<span id="dates"><span id="the-day">Hari, 00 Bulan 0000</span> <span id="the-time">00:00:00</span> </span>
			</small>



			<div class="nav-search" id="nav-search">
				<form class="form-search" action="?id=cari" method="POST">
					Cari Pegawai
					<span class="input-icon">
						<input type="text" placeholder="Ketikan Nip/Nama" name="q" class="nav-search-input" id="nama" required />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			<div class="ace-settings-container" id="ace-settings-container">
				<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
					<i class="ace-icon fa  fa-bullhorn   bigger-150"></i>
				</div>

				<div class="ace-settings-box clearfix" id="ace-settings-box">
					<div class="pull-left width-50">

					</div><!-- /.pull-left -->
					<?php
							$querypeng = mysqli_query($mysqli, "SELECT * FROM tbl_peng where id_pes=(select max(id_pes) from tbl_peng)");
							$datapeng = mysqli_fetch_array($querypeng);
							$header = $datapeng['header'];
							$body 	= $datapeng['body'];
							$footer = $datapeng['footer'];

							echo "
			<div class='pull-left width-50'>
			<div class='ace-settings-item'>

				<label class='lbl' for='ace-settings-hover'><strong>" . $header . "</strong></label>
			</div>

			<div class='ace-settings-item'>
				<label class='lbl' for='ace-settings-compact'>" . $body . "</label>
			</div>

			<div class='ace-settings-item'>
				<label class='lbl' for='ace-settings-highlight'>" . $footer . "</label>
			</div>
		</div>
			
			";

							?>

				</div><!-- /.ace-settings-box -->
			</div><!-- /.ace-settings-container -->
			<div class="page-content-area">


				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<?php include $ambil; ?>

						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content-area -->
		</div><!-- /.page-content -->
	</div><!-- /.main-content -->

	<div class="footer">
		<div class="footer-inner">
			<div class="footer-content">
				<span class="bigger-120">
					<span class="blue bolder">Pengadilan Agama</span>
					&copy; 2015-2016 <?php
												$q_nm_pt	    = mysqli_query($mysqli, "SELECT nm_pt FROM master WHERE id='1'");
												$a_nm_pt	    = mysqli_fetch_array($q_nm_pt);
	echo "<span class='blue'>$a_nm_pt[0] | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a></span>";
												?>
				</span>

				<span class="action-buttons">
					<a href="https://twitter.com/portgazandez">
						<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
					</a>

					<a href="http://www.facebook.com/andeztea">
						<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
					</a>

					<a href="#">
						<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
					</a>
				</span>
			</div>
		</div>
	</div>

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->




<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

<!--[if IE]>
<script type="text/javascript">
	window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="<?php echo $ambiljs1; ?>"></script>
<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>

<script src="<?php echo $ambiljs2; ?>"></script>
<script src="<?php echo $ambiljs3; ?>"></script>
<script src="<?php echo $ambiljs4; ?>"></script>
<script src="<?php echo $ambiljs5; ?>"></script>
<script src="<?php echo $ambiljs6; ?>"></script>
<script src="<?php echo $ambiljs7; ?>"></script>
<script src="<?php echo $ambiljs8; ?>"></script>
<script src="<?php echo $ambiljs9; ?>"></script>
<script src="<?php echo $ambiljs10; ?>"></script>
<script src="<?php echo $ambiljs11; ?>"></script>
<script src="<?php echo $ambiljs12; ?>"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<?php include $ambilfungsi; ?>
<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {


		$("#bootbox-confirm").on(ace.click_event, function() {
			bootbox.confirm("Apakah anda yakin ingin keluar?", function(result) {
				if (result) {
					window.location = 'logout.php';
				}
			});
		});


	});
</script>
</body>

</html>
<?php
	}
} else {
	session_destroy();
	header('Location:index.php?status=Silahkan Login');
}
?>