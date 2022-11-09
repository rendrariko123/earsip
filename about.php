<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <?php include("layout/header.php"); ?>
   
</head>
<body>
    <?php include("layout/sidebar.php"); ?>
    <?php include("layout/topbar.php"); ?>
    
    <div class="container col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">About</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">About</h1>
			</div>
		</div>
        <div class="panel panel-default">
					<div class="panel-heading">Tentang Saya</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
                            <div class="row  fs-5 justify-content-center">
          <div class="col-md-4">
          <div class="image">
          <img src="foto/pas foto 2.jpg" class="elevation-2" alt="User Image" width="150">
          </div>
          </div>
          <div class="col-md-8">
            <p><h4>Aplikasi ini dibuat oleh: </h4>
            <h6>NAMA : Riko Rendragraha</h6>
            <h6>NIM  : 2031730087</h6>
            <h6>TANGGAL : 09 NOVEMBER 2022</h6>
        </p>
          </div>
        </div>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
</body>
</html>
<?php include("layout/footer.php"); ?>