<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gardening";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data from booking form
$customerId = $_POST['customer'];
$serviceId = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];

// Insert booking
$sql = "INSERT INTO bookings (CUSTOMER_ID, SERVICE_ID, DATE, TIME_WORKED) VALUES ('$customerId', '$serviceId', '$date', '$time')";

if ($conn->query($sql) === TRUE) {
    echo 'New booking created successfully.<a href="index.html">Congrats Murga. Tero Paisa Gayo. Go Back Home</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
