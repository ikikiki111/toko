<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shirtski";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangkap data dari form
$nama_pemesan = $_POST['name'];
$nomor_whatsapp = $_POST['phone'];

// Menyimpan data ke tabel pemesanan
$sql = "INSERT INTO orders (nama_pemesan, nomor_whatsapp) VALUES ('$nama_pemesan', '$nomor_whatsapp')";

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
