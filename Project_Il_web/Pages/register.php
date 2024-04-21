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
                        <form id="registrationForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <?php
                            include("modelo/conexion_bd.php");
                            include("controller/controller_register.php");
                            ?>
                            <div class="padre">
                               <div class="name">
                                <label for=""> Nombre</label>
                                <input type="text" name="nombre">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="(XXX) XXX-XXX">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                                <label for="rpassword" class="form-label">Repeat Password</label>
                                <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="*******">
                                <!-- Link to login page -->
                                <p class="pUser">Already have an account? <a href="login.html">Log in</a></p>
                                <!-- Submit button for registration -->
                                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listener to the registration form submission
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
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

</html>
