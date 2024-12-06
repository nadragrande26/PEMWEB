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

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$date = $_POST['date'];

// Query untuk memasukkan data ke dalam tabel reservations
$sql = "INSERT INTO reservations (name, email, phone, service, date) 
        VALUES ('$name', '$email', '$phone', '$service', '$date')";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman yang menampilkan data reservasi
    header("Location: view_reservations.php");
    exit(); // Menghentikan script lebih lanjut agar tidak terjadi eksekusi ganda
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
