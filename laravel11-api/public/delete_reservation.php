<?php
// Konfigurasi koneksi database
$servername = "localhost";  // Ganti dengan host database Anda jika perlu
$username = "root";         // Ganti dengan username database Anda
$password = "";             // Ganti dengan password database Anda
$dbname = "makeup_reservations";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil ID dari URL
$id = $_GET['id'];

// Query untuk menghapus data berdasarkan ID
$sql = "DELETE FROM reservations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect ke halaman daftar reservasi setelah penghapusan
header("Location: view_reservations.php");
exit();

// Tutup koneksi
$conn->close();
?>
