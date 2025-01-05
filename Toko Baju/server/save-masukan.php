<?php
$servername = "localhost"; // Ganti dengan server Anda
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$dbname = "shirtski"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangkap data dari form
$user_id = 1; // Ganti dengan ID pengguna yang valid
$kategori = $_POST['kategori'];
$rating = $_POST['rating'];
$isi_masukan = $_POST['isi_masukan'];

// Menyimpan masukan ke dalam database
$sql = "INSERT INTO masukan (user_id, kategori, isi_masukan, rating)
        VALUES ('$user_id', '$kategori', '$isi_masukan', '$rating')";

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
