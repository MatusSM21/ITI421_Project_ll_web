<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to custom styles -->
    <link rel="stylesheet" href="styles.css/styles_rides.css">
    <title>Tico Rides</title>

    <!-- Script to define showMessage function -->
    <script>
        function showMessage(message) {
            // Displays an alert with the given message
            alert(message);
        }
    </script>
</head>

<body>
    <div class="container">
        <!-- Row for content alignment -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <!-- Image for the card -->
                <img src="image/cars.png" class="img" alt="card">
                <div class="card">
                    <!-- Row for buttons -->
                    <div class="row align-items-start ml-1">
                        <div class="col">
                            <!-- Button to show Dashboard message -->
                            <button class="dashboard" onclick="showMessage('Dashboard')">Dashboard</button>
                        </div>
                        <div class="col">
                            <!-- Button to show Rides message -->
                            <button class="Rides" onclick="showMessage('Rides')">Rides</button>
                        </div>
                        <div class="col">
                            <!-- Button to show Settings message -->
                            <button class="Settings" onclick="showMessage('Settings')">Settings</button>
                        </div>
                    </div>
                </div>
                <!-- Welcome message with username -->
                <div class="welcome-user">
                    <span>Welcome</span>
                    <a class="username">barroyo</a>
                    <img src="image/user.png" alt="User Icon" class="user-icon">
                    <h2 class="title">Dashboard</h2>
                </div>
                <!-- Navigation links -->
                <div class="dashboard-link">
                    <a href="#">Dashboard</a>
                    <span class="arrow">></span>
                    <a href="#">Rides</a>
                    <span class="arrow">> Edit</span>
                </div>
                <!-- Form for ride information -->
                <div class="info">
                    <label for="ridename" class="form-label">Nombre del Viaje</label>
                    <input type="text" class="form-control" id="ridename" placeholder="Brete">
                    <label for="startfrom" class="form-label">Lugar de Salida</label>
                    <input type="text" class="form-control" id="startfrom"
                        placeholder="Barrio Los Angeles, Ciudad Quesada">
                    <label for="description" class="form-label">Descripción</label>
                    <div class="description">
                        <!-- Textarea for ride description -->
                        <textarea id="description"
                            placeholder="This is my everyday ride, from Barrio Los Angles to my job´s office in Second Floor of Cooperservidores Building"></textarea>
                        <h3>Cuando</h3>
                        <!-- Row for time and day selection -->
                        <div class="row align-items-start ml-3">
                            <div class="col">
                                <label for="departure" class="form-label">Hora de Salida</label>
                                <!-- Input field for departure time -->
                                <input type="time" class="form-control" id="departure" value="06:45">
                                <label for="arrival" class="form-label">Hora Estimada de Llegada</label>
                                <!-- Input field for estimated arrival time -->
                                <input type="time" class="form-control" id="arrival" value="07:05">
                                <!-- Link to cancel action -->
                                <a class="cancel" href="dashboard.html">Cancelar</a>
                            </div>
                            <div class="col">
                                <label for="days" class="form-label">Seleccione los Dias</label>
                                <div id="days">
                                    <!-- Checkboxes for selecting days -->
                                    <input type="checkbox" id="monday" name="day" value="Monday">
                                    <label for="monday">Monday</label><br>
                                    <input type="checkbox" id="tuesday" name="day" value="Tuesday">
                                    <label for="tuesday">Tuesday</label><br>
                                    <input type="checkbox" id="wednesday" name="day" value="Wednesday">
                                    <label for="wednesday">Wednesday</label><br>
                                    <input type="checkbox" id="thursday" name="day" value="Thursday">
                                    <label for="thursday">Thursday</label><br>
                                    <input type="checkbox" id="friday" name="day" value="Friday">
                                    <label for="friday">Friday</label><br>
                                    <input type="checkbox" id="saturday" name="day" value="Saturday">
                                    <label for="saturday">Saturday</label><br>
                                    <input type="checkbox" id="sunday" name="day" value="Sunday">
                                    <label for="sunday">Sunday</label><br>
                                    <!-- Button to save information -->
                                    <button class="save" onclick="showMessage('Guardado')">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>