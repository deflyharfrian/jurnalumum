<?php
include "../../config/koneksi.php";
$dbt = 0;
$krdt= 0;
#menambahkan data transaksi 
if (isset($_POST['ok'])) {
    #variabel transaksi
    $a = $_POST['tanggal'];
    $b = $_POST['keterangan'];
    $c = $_POST['kategori'];
    $d = $_POST['rekening'];
    $e = $_POST['saldo_awal'];
    $g = $_POST['tanggal_post'];
    #$h = $_SESSION['id_user'];

    #logika debit dan kredit 
    $kr_db = $_POST['debit_kredit'];
    if($kr_db == 'debit'){
        $dbt = $_POST['saldo_akhir'];
        $total_saldo = $e + $dbt; 
        mysqli_query($con, "update tb_rekening set nominal = '$total_saldo' where id_rek='$d'");
    }else if($kr_db == 'kredit'){
        $krdt= $_POST['saldo_akhir'];
        $total_saldo = $e - $krdt;
        mysqli_query($con, "update tb_rekening set nominal = '$total_saldo' where id_rek='$d'");
    } else {
     $dbt = 0;
     $krdt= 0;
    }

    mysqli_query($con, "insert into tb_transaksi values('','$a','$b', '$c','$d','$dbt','$krdt','$e','$total_saldo','$g','1')");
    echo "<script>
    alert('data berhasil disimpan');
    location.href='index.php?transaksi';
    </script>";
}
?>
