<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config/koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

/// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($con, "select * from tb_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
$data = mysqli_fetch_array($login);
// cek apakah username dan password di temukan pada database
if ($cek == 1) {



    // cek jika user login sebagai admin
    if ($data['level'] == "admin") {

        // buat session login dan username
        $_SESSION['id_user'] = $data['$id_user'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['username'] = $username;
        // alihkan ke halaman dashboard admin
        header("location:pages/admin/index.php");

    
    } else {

        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
