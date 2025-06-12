<?php
session_start(); // Start session if not already started

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "opos_db";
$conn = new mysqli($servername, $username, $password, $dbname);

function check_new()
{
    global $conn;

    // Query to get the count of new orders
    $result = $conn->query("SELECT COUNT(*) AS new_order_count FROM orders");
    $row = $result->fetch_assoc();
    $newOrderCount = $row['new_order_count'];

    if ($newOrderCount > $_SESSION['Order_count']) {
        $new = $newOrderCount - $_SESSION['Order_count'];
        $_SESSION['Order_count'] = $newOrderCount; // Update session variable
        return $new;
    }
}

$conn->close();
?>
