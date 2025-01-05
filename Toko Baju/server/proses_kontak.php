<?php
// Konfigurasi koneksi database
$servername = "localhost";  // Ganti dengan host database Anda
$username = "root";         // Ganti dengan username database Anda
$password = "";             // Ganti dengan password database Anda
$dbname = "shirtski";      // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangkap data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// Menyimpan data ke tabel kontak
$sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

if ($conn->query($sql) === TRUE) {
  // Redirect ke halaman index.html dalam folder toko-baju setelah pemesanan berhasil
  header("Location: /toko baju/index.html");
  exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
