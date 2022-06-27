<?php
include "../../config/koneksi.php";
$kode_transkasi = $_GET['id_transaksi'];
$ket = $_POST['keterangan'];
$kat = $_POST['kategori'];
mysqli_query($con, "update tb_transaksi set keterangan = '$ket', id_kategori='$kat' where id_transaksi ='$kode_transkasi'");
echo "<script>
      alert('data berhasil di edit');location.href='index.php?transaksi';
  </script>";
?>
