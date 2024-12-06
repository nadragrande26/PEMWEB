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

// Query untuk mengambil data reservasi
$sql = "SELECT * FROM reservations ORDER BY created_at DESC";
$result = $conn->query($sql);

// Menampilkan data reservasi
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Makeover</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>reservation list Makeover</h1>
    </header>

    <main>
        <h2>Data Reservasi</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>E-mail</th><th>phone number</th><th>Our Service</th><th>date</th><th>reservation time</th><th>action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['service'] . "</td>
                        <td>" . $row['date'] . "</td>
                        <td>" . $row['created_at'] . "</td>
                        <td>
                            <a href='update_reservation.php?id=" . $row['id'] . "'>Update</a> | 
                            <a href='delete_reservation.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this reservation?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Belum ada reservasi.</p>";
        }
        ?>
    </main>

    <footer>
        <p>Soekarno Hatta housing complex, block c.</p>
    </footer>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
