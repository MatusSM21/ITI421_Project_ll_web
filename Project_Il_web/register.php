<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata specifying character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to Bootstrap CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom stylesheet -->
    <link rel="stylesheet" href="styles.css/styles_register.css">
    <!-- Title of the webpage -->
    <title>TicoRides</title>
</head>

<body>
    <!-- Background image container -->
    <div class="background-image"></div>
    <div class="container">
        <!-- Row for content alignment -->
        <div class="row justify-content-left mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- Image -->
                        <img src="image/cars.png" class="img" alt="card">
                        <!-- Registration Form -->
                        <form id="registrationForm">
                            <div class="padre">
                                <!-- Input fields for user registration -->
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="password" class="form-control" id="lastname" placeholder="Last Name">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="(XXX) XXX-XXX">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="*******">
                                <label for="rpassword" class="form-label">Repeat Password</label>
                                <input type="password" class="form-control" id="rpassword" placeholder="*******">
                                <!-- Link to login page -->
                                <p class="pUser">Already have an account? <a href="login.html">Log in</a></p>
                                <!-- Submit button for registration -->
                                <button type="submit" class="">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listener to the registration form submission
        document.getElementById("registrationForm").addEventListener("submit", function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get values from form inputs
            var name = document.getElementById("name").value;
            var lastname = document.getElementById("lastname").value;
            var phone = document.getElementById("phone").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            // Save values to localStorage
            localStorage.setItem("name", name);
            localStorage.setItem("lastname", lastname);
            localStorage.setItem("phone", phone);
            localStorage.setItem("username", username);
            localStorage.setItem("password", password);

            // Display a success message to the user
            alert("Registration successful!");

            // Redirect the user to the main page
            window.location.href = "";
        });
    </script>
</body>
<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu base de datos no está en localhost
$username = "tu_usuario"; // Cambia esto por tu nombre de usuario de la base de datos
$password = "tu_contraseña"; // Cambia esto por tu contraseña de la base de datos
$database = "tu_base_de_datos"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Sentencia SQL para crear la tabla 'users'
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

// Ejecutar la sentencia SQL
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'users' creada exitosamente";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>


</html>