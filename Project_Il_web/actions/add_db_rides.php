<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../db/conexion_db.php');

// Inicializar la variable $user_id
$user_id = null;

// Verificar si la sesión de usuario está configurada y obtener el ID de usuario
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $ridename = $_POST['ridename'];
    $startfrom = $_POST['startfrom']; // Cambiar el nombre del campo a startfrom
    $endto = $_POST['endto']; // Agregar el campo endto
    $description = $_POST['description'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $days = isset($_POST['day']) ? implode(", ", $_POST['day']) : ""; // Convertir el array de días en una cadena

    // Validar los datos (puedes agregar más validaciones según sea necesario)
    if (empty($ridename) || empty($startfrom) || empty($endto) || empty($description) || empty($departure) || empty($arrival) || empty($days)) {
        $message = "Please fill out all fields.";
        $success = false; // Agregar una variable para indicar que ha ocurrido un error
    } else {
        // Insertar los datos en la tabla rides con el ID de usuario
        $sql = "INSERT INTO rides (ride_name, start_from, end_to, description, departure_time, arrival_time, days, user_id) VALUES ('$ridename', '$startfrom', '$endto', '$description', '$departure', '$arrival', '$days', $user_id)";

        if ($conn->query($sql) === TRUE) {
            $message = "Ride added successfully.";
            $success = true; // Agregar una variable para indicar que el viaje se ha agregado correctamente
        } else {
            $message = "Error adding ride: " . $conn->error;
            $success = false; // Agregar una variable para indicar que ha ocurrido un error
        }
    }
}
?>
