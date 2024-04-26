<?php
// Include the database connection file and any other necessary configurations
require_once($_SERVER['DOCUMENT_ROOT'] . '../db/conexion_db.php');

// Check if a session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Get the user ID from the session (assuming the user is already logged in)
$user_id = $_SESSION['user_id'];
// Query to retrieve the rides of the user
$sql = "SELECT * FROM rides WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Initialize an array to store the rides
$rides = [];

// Iterate through the results and store them in the $rides array
while ($row = $result->fetch_assoc()) {
    $rides[] = $row;
}

// Check if a ride ID is submitted for deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete the ride from the database
    $sql = "DELETE FROM rides WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();

    // Check if the deletion was successful and display a message to the user
    if ($stmt->affected_rows > 0) {
        $message = "¡El viaje se eliminó correctamente!";
        $success = true;
    } else {
        $message = "¡No se pudo eliminar el viaje!";
        $success = false;
    }

    // Redirect back to dashboard.php after deletion
    header("Location: dashboard.php");
    exit();
}
