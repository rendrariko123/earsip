 <?php
include('koneksi.php');

$nmr_srt = $_POST['nomor_surat'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$waktu_pengarsipan=date('Y-m-d H:i:s');


$direktori = "file_pdf/";
$file_name = $_FILES['NamaFile']['name'];
move_uploaded_file($_FILES['NamaFile']['tmp_name'], $direktori . $file_name);

$action = $_POST['action'];

function tambah_data($kon, $nmr_srt, $kategori, $judul, $waktu_pengarsipan, $file_name)
{
    $ins = "INSERT INTO arsip(nomor_surat, kategori, judul, waktu_pengarsipan, file) VALUES('$nmr_srt', '$kategori', '$judul', '$waktu_pengarsipan','$file_name')";
    return $kon->query($ins);
}

function edit_data($kon, $nmr, $ktgr, $jdl)
{
    $upd = "UPDATE arsip
            SET
                    kategori = '$ktgr' ,
                    judul = '$jdl'
            WHERE   nomor_surat = '$nmr_srt' ";
    return $koneksi->query($upd);
}

if (strtolower($action) == 'tambah') {
    $check = tambah_data($kon, $nmr_srt, $kategori, $judul, $waktu_pengarsipan, $file_name);
    if ($check) {
        echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
    } else {
        echo 'Data gagal ditambah';
    }
}

if (strtolower($action) == 'edit') {
    $nmr_srt = $_GET['nomor_surat'];

    $check = edit_data($kon, $nmr_srt, $kategori, $judul);
    if ($check) {
        echo 'Data berhasil diedit';
    } else {
        echo 'Data gagal diedit';
    }
}

?>

<a href="index.php"> Kembali </a>
