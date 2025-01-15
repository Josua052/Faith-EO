<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "event_reservation";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $package = $conn->real_escape_string($_POST['package']);
    $event_date = $conn->real_escape_string($_POST['event_date']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO reservations (name, email, phone, package, event_date, message) 
            VALUES ('$name', '$email', '$phone', '$package', '$event_date', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
