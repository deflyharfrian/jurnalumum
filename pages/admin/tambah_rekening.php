<?php
include "../../config/koneksi.php";
if (isset($_POST['ok'])) {
    $norek = $_POST['no_rek'];
    $nama_rek = $_POST['nama_rek'];
    $saldo = $_POST['saldo'];
    $tgl_post = $_POST['tanggal_post'];

    mysqli_query($con, "insert into tb_rekening values('','$norek','$nama_rek', '$saldo', '$tgl_post')");
    echo "<script>alert('data berhasil disimpan');location.href='index.php?rekening';</script>";
}


?>