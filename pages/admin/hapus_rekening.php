<?php
include "../../config/koneksi.php";
$x = $_GET['id_rek'];
mysqli_query($con, "DELETE FROM tb_rekening WHERE id_rek='$x'");
echo "<script>alert('data berhasil dihapus');location.href='index.php?rekening';</script>";
