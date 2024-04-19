<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gardening";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT bookings.BOOKING_ID, customers.CUSTOMER_NAME, services.SERVICE_NAME, bookings.DATE, bookings.TIME_WORKED 
        FROM bookings 
        INNER JOIN customers ON bookings.CUSTOMER_ID = customers.CUSTOMER_ID 
        INNER JOIN services ON bookings.SERVICE_ID = services.SERVICE_ID";

$result = $conn->query($sql);
$bookings = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Bookings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1 style="text-align:center;">Hamro Bagaicha</h1>
    <div class="navbar">
        <a href="index.html">Hamro Bagaicha</a>
        <a href="booking.html">Booking Form</a>
        <a href="customer.html">Customer Form</a>
        <a href="service.html">Service Form</a>
        <a class="active" href="displaybookings.php">All Bookings</a>
    </div>
<h3>All Bookings</h3>

<table>
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Service Name</th>
            <th>Date</th>
            <th>Time Worked</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo $booking['BOOKING_ID']; ?></td>
                <td><?php echo $booking['CUSTOMER_NAME']; ?></td>
                <td><?php echo $booking['SERVICE_NAME']; ?></td>
                <td><?php echo $booking['DATE']; ?></td>
                <td><?php echo $booking['TIME_WORKED']; ?></td>
                <td>
                    <a href="edit_booking.php?id=<?php echo $booking['BOOKING_ID']; ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div id="footer">
    <a>Developed by Uzzan</a>
    <a href="https://github.com/najju1997/">Source Code</a>
</div>
</body>
</html>
