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
include "koneksi.php";
error_reporting(0);
$current_timezone = date_default_timezone_get();
date_default_timezone_set('Asia/Jakarta');
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    

}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nmr_srt=input($_POST["nomor_surat"]);
    $kategori=input($_POST["kategori"]);
    $judul = input($_POST["judul"]);
    // $wkt_arsip=input($_POST["waktu_pengarsipan"]);
    $waktu_pengarsipan=date('Y-m-d H:i:s');
    // $harga=input($_POST["harga"]);
    // $stok = input($_POST["stok"]);
    $direktori = "file_pdf/";
    $file_name = $_FILES['NamaFile']['name'];
    move_uploaded_file($_FILES['NamaFile']['tmp_name'], $direktori . $file_name);
    $action = $_POST['action'];

    
    $sql="insert into arsip (nomor_surat, kategori, judul, waktu_pengarsipan, file) values
    ('$nmr_srt','$kategori', '$judul','$waktu_pengarsipan', '$file_name')";

    $hasil=mysqli_query($kon,$sql);

    if ($hasil) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
    }else{
        echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
    }

}
?> 
    <h2>Input Data Arsip</h2>
   
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST"  enctype="multipart/form-data">
        <div class="form-group">
            <label>Nomor Surat </label>
            <input type="text" name="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat" required />

        </div>
        <div class="form-group">
            <label>Kategori</label>          
             <select name = "kategori" class="form-control">
                <option selected>Masukkan Kategori</option>
                <option>Undangan</option>
                <option>Pengumuman</option>
                <option>Nota Dinas</option>
                <option>Pemberitahuan</option>
             </select>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required />

        </div>
        <div class="form-group ">
                <label> File Surat (PDF) </label>
                  <input type="file" name="NamaFile" accept="application/pdf" class="form-control-file">
                </div>
              

        <!-- <div class="form-group">
            <label>Waktu Pengarsipan</label>
            <input type="date" name="waktu_pengarsipan" class="form-control" placeholder="Masukkan Waktu Pemgarsipan" required />

        </div> -->
        <!-- <div class="form-group">
            <label>Foto : </label>
            <input type="file" name="foto" accept="image/*" placeholder="Masukkan Gambar" required />
            <form name="menu.php" enctype="multipart/form-data"
            action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        </div>
        <div class="form-group">
            <label>Jenis Barang : </label>
            <label><input type="radio" name="jenis_menu" value="Makanan">Makanan</label>
            <label><input type="radio" name="jenis_menu" value="Minuman"> Minuman</label>
            <label><input type="radio" name="jenis_menu" value="Snack"> Snack</label>
        </div>
        <div class="form-group">
            <label>Harga </label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Barang" required />
            <label>Stok </label>
            <input type="text" name="stok" class="form-control" placeholder="Masukkan Stok" required />
        </div> -->
        <div class=""></div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>    
</body>
<?php include("layout/footer.php"); ?>
</html>