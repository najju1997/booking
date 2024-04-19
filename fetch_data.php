<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gardening";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Customers
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
$customers = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
}

// Fetch Services
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
$services = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}

$data = [
    'customers' => $customers,
    'services' => $services
];

echo json_encode($data);

$conn->close();
?>
