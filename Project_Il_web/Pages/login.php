<?php
require($_SERVER['DOCUMENT_ROOT'].'../shared/header.php');
?>

<body>
    <!-- Container for the entire page -->
    <div class="container">
        <!-- Row to justify content in the center -->
        <div class="row justify-content-center mt-5">
            <!-- Column for medium devices, expanded from 4 to 8 -->
            <div class="col-md-8">
                <!-- Card for login form -->
                <div class="card">
                    <div class="card-body">
                        <!-- Image for illustrative purposes -->
                        <img src="../image/cars.png" class="img" alt="For Illustrative Purposes">
                        <!-- Form for user login -->
                        <form>
                            <div>
                                <!-- Username input field -->
                                <label for="fromLocation" class="form-label">Username</label>
                                <input type="text" class="form-control" id="fromLocation" placeholder="Username">
                                <!-- Password input field -->
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password">
                                <!-- Link to register if user doesn't have an account -->
                                <p class="pUser">Don't have an account? <a href="register.php">Register Here</a></p>
                                <!-- Button to submit login form -->
                                <a href="dashboard.php" class="btn btn-primary btn-block">Log In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function login() {
        // Obtener el valor del campo de correo electrónico
        var email = document.getElementById('fromLocation').value;

        // Extraer el nombre de usuario del correo electrónico
        var username = email.split('@')[0]; // Suponiendo que el nombre de usuario está antes del '@'

        // Almacenar el nombre de usuario en localStorage
        localStorage.setItem('username', username);
    }
</script>

</html>