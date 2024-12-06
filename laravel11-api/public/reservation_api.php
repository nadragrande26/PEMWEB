<?php
// Konfigurasi koneksi database
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "makeup_reservations";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["message" => "Database connection failed"]);
    exit;
}

// Mendapatkan metode HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Operasi CRUD berdasarkan metode HTTP
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM reservations WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_assoc());
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Reservation not found"]);
            }
        } else {
            $sql = "SELECT * FROM reservations ORDER BY created_at DESC";
            $result = $conn->query($sql);
            $reservations = [];
            while ($row = $result->fetch_assoc()) {
                $reservations[] = $row;
            }
            echo json_encode($reservations);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (
            isset($data['name'], $data['email'], $data['phone'], $data['service'], $data['date'])
        ) {
            $name = $conn->real_escape_string($data['name']);
            $email = $conn->real_escape_string($data['email']);
            $phone = $conn->real_escape_string($data['phone']);
            $service = $conn->real_escape_string($data['service']);
            $date = $conn->real_escape_string($data['date']);

            $sql = "INSERT INTO reservations (name, email, phone, service, date) 
                    VALUES ('$name', '$email', '$phone', '$service', '$date')";
            if ($conn->query($sql)) {
                http_response_code(201);
                echo json_encode(["message" => "Reservation created successfully"]);
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Failed to create reservation"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Invalid input"]);
        }
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $data = json_decode(file_get_contents('php://input'), true);
            if (
                isset($data['name'], $data['email'], $data['phone'], $data['service'], $data['date'])
            ) {
                $name = $conn->real_escape_string($data['name']);
                $email = $conn->real_escape_string($data['email']);
                $phone = $conn->real_escape_string($data['phone']);
                $service = $conn->real_escape_string($data['service']);
                $date = $conn->real_escape_string($data['date']);

                $sql = "UPDATE reservations SET 
                        name='$name', email='$email', phone='$phone', service='$service', date='$date' 
                        WHERE id = $id";
                if ($conn->query($sql)) {
                    echo json_encode(["message" => "Reservation updated successfully"]);
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "Failed to update reservation"]);
                }
            } else {
                http_response_code(400);
                echo json_encode(["message" => "Invalid input"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Reservation ID is required"]);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "DELETE FROM reservations WHERE id = $id";
            if ($conn->query($sql)) {
                echo json_encode(["message" => "Reservation deleted successfully"]);
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Failed to delete reservation"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Reservation ID is required"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed"]);
        break;
}

// Tutup koneksi
$conn->close();
?>
