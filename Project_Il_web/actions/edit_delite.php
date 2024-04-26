<?php
require($_SERVER['DOCUMENT_ROOT'] . '../models/dashboard_models.php');

// Verificar si se ha enviado el ID del viaje a editar
if (isset($_GET['id'])) {
    $ride_id = $_GET['id'];
} else {
    // Si no se ha enviado el ID, redirigir a la página de dashboard o mostrar un mensaje de error
    header("Location: dashboard.php");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '../models/dashboard_models.php');

// Check if the ride ID to edit has been submitted
if (isset($_GET['id'])) {
    $ride_id = $_GET['id'];
} else {
    // If the ID is not submitted, redirect to the dashboard page or show an error message
    header("Location: dashboard.php");
    exit();
}

// Get the details of the ride to be edited from the database
$sql = "SELECT ride_name, start_from, end_to, description, departure_time, arrival_time, days FROM rides WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ride_id);
$stmt->execute();
$stmt->bind_result($ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days);
$stmt->fetch();
$stmt->close();

// Convert the days string into an array
$selected_days = explode(',', $days);

// Check if the form to update ride details has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $ride_name = $_POST['ridename'];
    $start_from = $_POST['startfrom'];
    $end_to = $_POST['endto'];
    $description = $_POST['description'];
    $departure_time = $_POST['departure'];
    $arrival_time = $_POST['arrival'];
    $days = implode(',', $_POST['day']);

    // Update ride details in the database
    $sql_update = "UPDATE rides SET ride_name=?, start_from=?, end_to=?, description=?, departure_time=?, arrival_time=?, days=? WHERE id=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssssssi", $ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days, $ride_id);
    $stmt_update->execute();

    // Check if the update was successful and show a message to the user
    if ($stmt_update->affected_rows > 0) {
        $message = "Detalles del viaje actualizados exitosamente!";
        $success = true;
    } else {
        $message = "No se pudieron actualizar los detalles del viaje!";
        $success = false;
    }

    $stmt_update->close();

    // Get the updated ride details from the database
    $sql_get_details = "SELECT ride_name, start_from, end_to, description, departure_time, arrival_time, days FROM rides WHERE id = ?";
    $stmt_get_details = $conn->prepare($sql_get_details);
    $stmt_get_details->bind_param("i", $ride_id);
    $stmt_get_details->execute();
    $stmt_get_details->bind_result($ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days);
    $stmt_get_details->fetch();
    $stmt_get_details->close();

    // Convert the days string into an array
    $selected_days = explode(',', $days);
}

// Obtener los detalles del viaje que se va a editar de la base de datos
$sql = "SELECT ride_name, start_from, end_to, description, departure_time, arrival_time, days FROM rides WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ride_id);
$stmt->execute();
$stmt->bind_result($ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days);
$stmt->fetch();
$stmt->close();

// Convertir la cadena de días en un array
$selected_days = explode(',', $days);

// Verificar si se ha enviado el formulario para actualizar los detalles del viaje
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $ride_name = $_POST['ridename'];
    $start_from = $_POST['startfrom'];
    $end_to = $_POST['endto'];
    $description = $_POST['description'];
    $departure_time = $_POST['departure'];
    $arrival_time = $_POST['arrival'];
    $days = implode(',', $_POST['day']);

    // Actualizar los detalles del viaje en la base de datos
    $sql_update = "UPDATE rides SET ride_name=?, start_from=?, end_to=?, description=?, departure_time=?, arrival_time=?, days=? WHERE id=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssssssi", $ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days, $ride_id);
    $stmt_update->execute();

    // Verificar si la actualización fue exitosa y mostrar un mensaje al usuario
    if ($stmt_update->affected_rows > 0) {
        $message = "¡No se pudo actualizar los detalles del viaje!";
        $success = true;
    } else {
        $message = "¡Los detalles del viaje se actualizaron correctamente!";
        $success = false;
    }

    $stmt_update->close();

    // Obtener los detalles actualizados del viaje de la base de datos
    $sql_get_details = "SELECT ride_name, start_from, end_to, description, departure_time, arrival_time, days FROM rides WHERE id = ?";
    $stmt_get_details = $conn->prepare($sql_get_details);
    $stmt_get_details->bind_param("i", $ride_id);
    $stmt_get_details->execute();
    $stmt_get_details->bind_result($ride_name, $start_from, $end_to, $description, $departure_time, $arrival_time, $days);
    $stmt_get_details->fetch();
    $stmt_get_details->close();

    // Convertir la cadena de días en un array
    $selected_days = explode(',', $days);
}
