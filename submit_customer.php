<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gardening";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$customerName = $_POST['customerName'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "INSERT INTO customers (CUSTOMER_NAME, ADDRESS, PHONE) VALUES ('$customerName', '$address', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo 'New customer created successfully. <a href="service.html">Next, Create the service you want</a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
