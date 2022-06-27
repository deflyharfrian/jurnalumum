<?php
include "../../config/koneksi.php";
$x = $_GET['kode_kategori'];
mysqli_query($con, "DELETE FROM tb_kategori WHERE kode_kategori='$x'");
echo "<script>alert('data berhasil dihapus');location.href='index.php?kategori';</script>";
