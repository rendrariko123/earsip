<?php
include('koneksi.php');

$nomor_surat = $_GET['nomor_surat'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];

$direktori = "file_pdf/";
$file_name = $_FILES['NamaFileEdit']['name'];
move_uploaded_file($_FILES['NamaFileEdit']['tmp_name'],$direktori.$file_name);

$action = $_POST['action'];

function edit_data($kon, $nomor_surat, $kategori, $judul, $file_name){
    $upd = "UPDATE arsip
            SET     kategori = '$kategori',
                    judul = '$judul',
                    file = '$file_name'
            WHERE   nomor_surat = '$nomor_surat' ";
    return $kon->query($upd);
}

function edit_data_kosong($kon, $nomor_surat, $kategori, $judul){
    $upd = "UPDATE arsip
            SET     kategori = '$kategori',
                    judul = '$judul'
            WHERE   nomor_surat = '$nomor_surat' ";
    return $kon->query($upd);
}

if(strtolower($action) == 'edit'){
    
    if(!empty($file_name)){
        $check = edit_data($kon, $nomor_surat, $kategori, $judul, $file_name);
        if($check){
            echo 'Data berhasil diedit';
        }
        else{
            echo 'Data gagal diedit';
            echo mysqli_error($kon);
        }    
    } else {
        $check = edit_data_kosong($kon, $nomor_surat, $kategori, $judul);
        if($check){
            echo 'Data berhasil diedit';
        }
        else{
            echo 'Data gagal diedit';
            echo mysqli_error($kon);
        }    
    }
}
?>

<a href="index.php"> Kembali </a>