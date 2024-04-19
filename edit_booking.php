<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gardening";

if(isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT bookings.BOOKING_ID, customers.CUSTOMER_ID, customers.CUSTOMER_NAME, services.SERVICE_ID, services.SERVICE_NAME, bookings.DATE, bookings.TIME_WORKED 
            FROM bookings 
            INNER JOIN customers ON bookings.CUSTOMER_ID = customers.CUSTOMER_ID 
            INNER JOIN services ON bookings.SERVICE_ID = services.SERVICE_ID 
            WHERE bookings.BOOKING_ID = $booking_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $booking = $result->fetch_assoc();
    } else {
        echo "Booking not found.";
        exit();
    }

    // Fetch all customers and services for dropdowns
    $sql_customers = "SELECT * FROM customers";
    $sql_services = "SELECT * FROM services";

    $result_customers = $conn->query($sql_customers);
    $result_services = $conn->query($sql_services);

    $customers = [];
    $services = [];

    if ($result_customers->num_rows > 0) {
        while($row = $result_customers->fetch_assoc()) {
            $customers[] = $row;
        }
    }

    if ($result_services->num_rows > 0) {
        while($row = $result_services->fetch_assoc()) {
            $services[] = $row;
        }
    }

    $conn->close();
} else {
    // Redirect the user back to the displaybookings.php page if no booking ID is provided.
    header("Location: displaybookings.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST["customer"];
    $service_id = $_POST["service"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE bookings SET CUSTOMER_ID='$customer_id', SERVICE_ID='$service_id', DATE='$date', TIME_WORKED='$time' WHERE BOOKING_ID = $booking_id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking updated successfully!";
        header("Location: displaybookings.php");
        exit();
    } else {
        echo "Error updating booking: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Edit Booking</h1>

<form action="" method="post">
    <label for="customer">Customer:</label>
    <select name="customer" id="customer">
        <?php foreach ($customers as $customer): ?>
            <option value="<?php echo $customer['CUSTOMER_ID']; ?>" <?php if($customer['CUSTOMER_ID'] == $booking['CUSTOMER_ID']) echo "selected"; ?>><?php echo $customer['CUSTOMER_NAME']; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="service">Service:</label>
    <select name="service" id="service">
        <?php foreach ($services as $service): ?>
            <option value="<?php echo $service['SERVICE_ID']; ?>" <?php if($service['SERVICE_ID'] == $booking['SERVICE_ID']) echo "selected"; ?>><?php echo $service['SERVICE_NAME']; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="date">Date:</label>
    <input type="date" name="date" id="date" value="<?php echo $booking['DATE']; ?>" required><br><br>

    <label for="time">Time Worked:</label>
    <input type="time" name="time" id="time" value="<?php echo $booking['TIME_WORKED']; ?>" required><br><br>

    <input type="submit" value="Update">
</form>
<div id="footer">
    <a>Developed by Uzzan</a>
    <a href="https://github.com/najju1997/">Source Code</a>
</div>
</body>
</html>
