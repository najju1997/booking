<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gardening";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$serviceName = $_POST['serviceName'];
$price = $_POST['price'];

$sql = "INSERT INTO services (SERVICE_NAME, PRICE_PER_HOUR) VALUES ('$serviceName', '$price')";

if ($conn->query($sql) === TRUE) {
    echo 'New service created successfully. <a href="booking.html">Now make your booking</a>';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}


$conn->close();
?>
