<?php
include "../../config/koneksi.php";
$id_rek = $_GET['id_rek'];
$no_rek = $_POST['no_rekening'];
$namarek = $_POST['nama'];
mysqli_query($con, "update tb_rekening set no_rek = '$no_rek', nama_rek='$namarek' where id_rek ='$id_rek'");
echo "<script>
      alert('data berhasil di edit');location.href='index.php?rekening';
  </script>";
?>
