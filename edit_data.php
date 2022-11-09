<!DOCTYPE html>
<head>
<title>Form Data Arsip</title>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

<?php include("layout/header.php"); ?>
</head>

<body>
<?php include("layout/sidebar.php"); ?>
<?php include("layout/topbar.php"); ?>
    <div class="container col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
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
        <?php
            // var_dump($_GET);
            $nomor_surat = $_GET['nomor_surat'];

            $sql = $kon->query("SELECT nomor_surat, kategori, judul, file FROM arsip WHERE nomor_surat = '$nomor_surat'");

            if($sql->num_rows == 1){
                $sql = $sql->fetch_assoc();
            
        ?>
    <h2>Edit Data Arsip</h2>
   

    <form method="post" action="simpan_edit.php?nomor_surat=<?php echo $sql['nomor_surat']; ?>" enctype="multipart/form-data">

            <div class="form-group">
            <label>Nomor Surat </label>
            <input type="text" name="nomor_surat" class="form-control" value="<?php echo $sql['nomor_surat']?>" disabled>

        </div>

        <div class="form-group">
            <label>Kategori</label>          
             <select name = "kategori" class="form-control">
             <option value="<?php echo $sql['kategori']?>"><?php echo $sql['kategori']?></option>
                <option>Undangan</option>
                <option>Pengumuman</option>
                <option>Nota Dinas</option>
                <option>Pemberitahuan</option>
             </select>
        </div>
        <div class="form-group">
                <label> Judul </label>
                <input required type="text" name="judul" class="form-control" placeholder="Judul" value="<?php echo $sql['judul']?>">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label"> File Surat (PDF) </label>
                <div class="col">
                  <object data="berkas/<?php echo $sql['file'] ?>" width="100%" height="700px"></object>
                  <input type="file" name="NamaFileEdit" accept="application/pdf" class="form-control-file">
                </div>
            </div>
            <a href="index.php" class="btn btn-warning"> Kembali </a>
            <button type="submit" name="action" value="edit" class="btn btn-primary">Submit</button>
    </form>

     <?php
            } else{
                echo 'Data tidak ditemukan.';
            }
        ?>
    </div>    
</body>
<?php include("layout/footer.php"); ?>
</html>