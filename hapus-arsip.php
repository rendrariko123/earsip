<?php
include('koneksi.php');

$nmr_srt = $_GET['nomor_surat'];

$queryShow = "SELECT * FROM arsip WHERE nomor_surat = '$nmr_srt';";
$sqlShow = mysqli_query($kon, $queryShow);
$result = mysqli_fetch_assoc($sqlShow);

unlink("file_pdf/".$result['file']);

function hapus_data($kon, $nmr_srt){
    $del = "DELETE FROM arsip WHERE nomor_surat = '$nmr_srt' ";
    return $kon->query($del);
}

$check = hapus_data($kon, $nmr_srt);

if($check){
    echo 'Data Berhasil dihapus' . header("Location:index.php");
}
else{
    echo 'Data gagal dihapus';
}
?>
