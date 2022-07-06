<?php 
include "../../config/koneksi.php";
if (isset($_POST['ok'])) {
    $a = $_POST['kode_kategori'];
    $b = $_POST['nama'];
    $c = $_POST['tanggal_post'];

    mysqli_query($con, "insert into tb_kategori values('$a','$b','$c')");
echo "<script>
    alert('data berhasil di Tambah');location.href='index.php?kategori';
</script>";
}
?>
