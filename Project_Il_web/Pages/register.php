<?php
require($_SERVER['DOCUMENT_ROOT'].'../shared/header.php');
require($_SERVER['DOCUMENT_ROOT'].'../models/register_users.php');
 ?>

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
                        <img src="../image/cars.png" class="img" alt="card">
                        <!-- Registration Form -->
                        <form id="registrationForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div>
                                <div class="message"><?php echo $message; ?></div>
                                <!-- Input field for first name -->
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">

                                <!-- Input field for last name -->
                                <label for="lastname" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido">

                                <!-- Input field for phone number -->
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="(XXX) XXX-XXX">

                                <!-- Input field for username -->
                                <label for="username" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de Usuario">

                                <!-- Input field for password -->
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="*******">

                                <!-- Input field for confirming password -->
                                <label for="rpassword" class="form-label">Repita Contraseña</label>
                                <input type="password" class="form-control" id="rpassword" name="confirm_password" placeholder="*******">

                                <!-- Link to login page -->
                                <p class="pUser"> Ya tiene Usuario? <a href="login.php">Iniciar Sesión</a></p>

                                <!-- Button to submit registration -->
                                <button type="submit" class="btn btn-primary btn-block">Registrese</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
