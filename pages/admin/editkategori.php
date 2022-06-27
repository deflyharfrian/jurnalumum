<?php
include "../../config/koneksi.php";
$kd = $_GET['kode_kategori'];
$b = $_POST['nama'];
mysqli_query($con, "UPDATE tb_kategori SET nama='$b' WHERE kode_kategori='$kd'");
echo "<script>
      alert('data berhasil di edit');location.href='index.php?kategori';
  </script>";
?>