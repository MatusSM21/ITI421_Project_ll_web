<?php
require($_SERVER['DOCUMENT_ROOT'].'../shared/header.php');
?>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <!-- Logo -->
                <img src="../image/cars.png" class="img" alt="Illustrative Cars">
                <!-- Main Navigation -->
                <div class="card">
                    <div class="row align-items-start ml-1">
                        <div class="col">
                            <a href="dashboard.php" class="buttonmain">Dashboard</a>
                        </div>
                        <div class="col">
                            <a href="rides.php" class="buttonmain">Rides</a>
                        </div>
                        <div class="col">
                            <a href="settings.php" class="buttonmain">Settings</a>
                        </div>
                    </div>
                </div>
                <!-- User Welcome Section -->
                <div class="welcome-user">
                    <span>Welcome</span>
                    <span class="username" id="username"></span>
                    <img src="../image/user.png" alt="User Icon" class="user-icon">
                    <h2 class="title">Dashboard</h2>
                </div>

                <!-- Dashboard Navigation -->
                <div class="dashboard-link">
                    <a href="dashboard.php">Dashboard</a>
                    <span class="arrow">></span>
                </div>

                <!-- Title for My Rides Section -->
                <p class="title">My Rides</p>
                <!-- Rides Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Title for Rides List -->
                        <p class="title">Your current list of Rides</p>
                        <!-- Button to Add Ride -->
                        <div class="buttonplus" onclick="location.href='styles_principal.php'">
                            <div class="plus horizontal"></div>
                            <div class="plus vertical"></div>
                        </div>
                        <!-- Rides Table -->
                        <div class="table">
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    Name
                                </div>
                                <div class="col">
                                    Start
                                </div>
                                <div class="col">
                                    End
                                </div>
                                <div class="col">
                                    Actions
                                </div>
                            </div>
                            <!-- Sample Ride Entry -->
                            <div class="row align-items-start ml-3">
                                <div class="col ride-name">
                                    Brete
                                </div>
                                <div class="col ride-start">
                                    Barrio Los Angeles
                                </div>
                                <div class="col ride-end">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    <!-- Edit and Delete Buttons -->
                                    <button onclick="editRide(this)">Edit</button>
                                    <button onclick="deleteRide(this)">Delete</button>
                                </div>
                            </div>
                            <!-- Another Sample Ride Entry -->
                            <div class="row align-items-start ml-3">
                                <div class="col ride-name">
                                    Casa
                                </div>
                                <div class="col ride-start">
                                    Ciudad Quesada
                                </div>
                                <div class="col ride-end">
                                    Los Angeles
                                </div>
                                <div class="col">
                                    <!-- Edit and Delete Buttons -->
                                    <button onclick="editRide(this)">Edit</button>
                                    <button onclick="deleteRide(this)">Delete</button>
                                </div>
                            </div>
                            <!-- Another Sample Ride Entry -->
                            <div class="row align-items-start ml-3">
                                <div class="col ride-name">
                                    Oficina Chepe
                                </div>
                                <div class="col ride-start">
                                    Ciudad Quesada
                                </div>
                                <div class="col ride-end">
                                    San Pedro
                                </div>
                                <div class="col">
                                    <!-- Edit and Delete Buttons -->
                                    <button onclick="editRide(this)">Edit</button>
                                    <button onclick="deleteRide(this)">Delete</button>
                                </div>
                            </div>
                        </div>
                        <!-- Button to Add Ride -->
                        <div class="buttonplus2" onclick="location.href=''">
                            <div class="plus horizontal"></div>
                            <div class="plus vertical"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Recuperar el nombre de usuario almacenado en localStorage
        var username = localStorage.getItem('username');

        // Mostrar el nombre de usuario en el lugar deseado
        document.getElementById('username').innerText = username;
    </script>

    <!-- JavaScript Function to Show Message -->
    <script>
        function editRide(button) {
            var row = button.parentElement.parentElement;
            var name = row.querySelector('.ride-name').innerText;
            var start = row.querySelector('.ride-start').innerText;
            var end = row.querySelector('.ride-end').innerText;

            var newName = prompt("Enter new name:", name);
            var newStart = prompt("Enter new start:", start);
            var newEnd = prompt("Enter new end:", end);

            if (newName && newStart && newEnd) {
                row.querySelector('.ride-name').innerText = newName;
                row.querySelector('.ride-start').innerText = newStart;
                row.querySelector('.ride-end').innerText = newEnd;
            }
        }

        function deleteRide(button) {
            var row = button.parentElement.parentElement;
            row.remove();
        }
        <!-- En el área donde el usuario inicia sesión correctamente -->
        // Suponiendo que "username" es el nombre de usuario que el usuario ha ingresado
        localStorage.setItem('username', username.split('@')[0]);
    </script>
</body>
