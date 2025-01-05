<?php
// Koneksi ke database
$host = 'localhost';  // Nama host database
$user = 'root';       // Username database
$password = '';       // Password database
$dbname = 'shirtski'; // Nama database

$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Validasi email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
            alert('Format email tidak valid. Silakan coba lagi.');
            window.location.href = 'toko baju/langganan.html';
          </script>";
    exit();
}

// Simpan data ke database
$sql = "INSERT INTO langganan (email) VALUES ('$email')";

if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman index.html dalam folder toko-baju setelah pemesanan berhasil
    header("Location: /toko baju/index.html");
    exit();
} else {
    // Jika ada error, tampilkan pesan
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
