<?php
// Mengaktifkan session
session_start();

// Menghubungkan dengan koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']); // Fungsi md5 untuk enkripsi password

// Menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

// Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

// Cek jika username dan password yang diinput ditemukan, buat session dan alihkan halaman ke halaman admin
if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/hadmin.php");
} else {
    header("location:index.php?pesan=gagal");
}

