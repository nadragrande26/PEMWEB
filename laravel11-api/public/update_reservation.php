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

// Query untuk mengambil data berdasarkan ID
$sql = "SELECT * FROM reservations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$reservation = $result->fetch_assoc();

// Proses Update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];

    $update_sql = "UPDATE reservations SET name=?, email=?, phone=?, service=?, date=? WHERE id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssi", $name, $email, $phone, $service, $date, $id);
    $update_stmt->execute();

    // Redirect ke halaman daftar reservasi setelah update
    header("Location: view_reservations.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservasi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #5a5959;
            color: white;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        main {
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #5a5959;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #e91e63;
        }

        .footer {
            background-color: #5a5959;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<header>
    <h1>Update Reservasi</h1>
</header>

<main>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($reservation['name']); ?>" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($reservation['email']); ?>" required>

        <label for="phone">phone number:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($reservation['phone']); ?>" required>

        <label for="service">Our Service:</label>
        <select id="service" name="service" required>
            <option value="Bridal Makeup" <?php echo $reservation['service'] == 'Bridal Makeup' ? 'selected' : ''; ?>>Bridal Makeup</option>
            <option value="Photoshoot Makeup" <?php echo $reservation['service'] == 'Photoshoot Makeup' ? 'selected' : ''; ?>>Photoshoot Makeup</option>
            <option value="Casual Makeup" <?php echo $reservation['service'] == 'Casual Makeup' ? 'selected' : ''; ?>>Casual Makeup</option>
            <option value="Makeup Classes" <?php echo $reservation['service'] == 'Makeup Classes' ? 'selected' : ''; ?>>Makeup Classes</option>
        </select>

        <label for="date">reservation date:</label>
        <input type="date" id="date" name="date" value="<?php echo $reservation['date']; ?>" required>

        <button type="submit">Update Reservasi</button>
    </form>
</main>

<div class="footer">
    <p>Soekarno Hatta housing complex, block c.</p>
</div>

</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
