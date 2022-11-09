<?php
include('koneksi.php');
?>
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
				<li class="active">Arsip</li>
			</ol>
		</div><!--/.row-->
     <div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Arsip Surat</h1>
		</div>
	</div>
    <div class="panel panel-default">
					<div class="panel-heading">Lihat Arsip Surat</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
                            <section class="content">

<?php
if (isset($_GET['nomor_surat'])) {
  $nomor_surat  = $_GET['nomor_surat'];
} else {
  die("Error. No ID Selected!");
}
include "koneksi.php";
$query  = mysqli_query($kon, "SELECT * FROM arsip WHERE nomor_surat='$nomor_surat'");
$result  = mysqli_fetch_array($query);
?>

<body>

  <table border="0" cellpadding="4">
    <tr>
      <td size="90"><h5>Nomor</h5></td>
      <td><h5>: <?php echo $result['nomor_surat'] ?></h5></td>
    </tr>
    <tr>
      <td><h5>Kategori</h5></td>
      <td><h5>: <?php echo $result['kategori'] ?></h5></td>
    </tr>
    <tr>
      <td><h5>Judul</h5></td>
      <td><h5>: <?php echo $result['judul'] ?></h5></td>
    </tr>
    <tr>
      <td><h5>Waktu Unggah</h5></td>
      <td><h5>: <?php echo $result['waktu_pengarsipan'] ?></h5></td>
    </tr>
  </table>
</body>
<br></br>
<!-- Default box -->
<form method="post" action="simpan_data.php?nomor_surat=<?php echo $nomor_surat ?>">
  <div class="card">
    <div class="card-header">

      <?php

      $nomor_surat = $_GET['nomor_surat'];
      $sql = $kon->query("SELECT * FROM arsip WHERE nomor_surat='$nomor_surat'");
      $result = $sql->fetch_assoc();
      ?>

      <title>Preview PDF</title>



      <embed src="file_pdf/<?= $result['file']; ?>" type="application/pdf" width="200%" height="500px"></embed>

        </div>
						</div>
                <br></br>
                <div class="card-body">
              <a href="index.php" class="btn btn-primary"> Kembali </a>
              <a href="download.php?filename=<?php echo $result['file']?>" 
                class="btn btn-warning" role="button">Unduh</a>
              <!-- <a href="download.php?nomor_surat=<?php echo $dt['nomor_surat'] ?>" class="btn btn-warning"> Unduh </a> -->
              <a href="edit_data.php?nomor_surat=<?php echo $nomor_surat; ?>" class="btn btn-danger"> Edit / Ganti File </a>
            </div>
							</form>
						</div>
					</div>
</body>
</html>
<?php include("layout/footer.php"); ?>