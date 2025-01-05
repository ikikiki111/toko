<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shirtski";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap nama produk dari URL
if (isset($_GET['product'])) 
    $product = $conn->real_escape_string($_GET['product']);

    // Masukkan produk ke tabel "keranjang"
    $sql = "INSERT INTO keranjang (nama_produk) VALUES ('$product')";

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
