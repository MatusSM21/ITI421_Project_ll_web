<?php
require($_SERVER['DOCUMENT_ROOT'] . '../shared/header.php');
?>

<body>
    <!-- Main container -->
    <div class="container">
        <!-- Row for layout -->
        <div class="row justify-content-center mt-5">
            <!-- Column for layout -->
            <div class="col-md-8">
                <!-- Card for content -->
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Link to login page -->
                        <a href="login.php" class="btn">Login</a>
                        <!-- Image with alt text -->
                        <img src="../image/cars.png" class="img" alt="For Illustrative Purposes">
                        <!-- Main title -->
                        <h5 class="title">Welcome to TicoRides.com</h5>
                        <!-- Subtitle -->
                        <p class="title">Search for a Ride</p>
                        <!-- Input form for ride search -->
                        <div class="box">
                            <!-- Text indicating "From" -->
                            <span>From</span>
                            <!-- Input field for starting location -->
                            <input type="text" id="fromInput" class="input-text" placeholder="From">
                            <!-- Text indicating "To" -->
                            <span>To</span>
                            <!-- Input field for destination -->
                            <input type="text" id="toInput" class="input-text" placeholder="To">
                            <!-- Button to initiate ride search -->
                            <button class="my-button" onclick="findRide()">Find my Ride!</button>
                        </div>
                        <!-- Section for displaying ride search results -->
                        <p class="title">Results for Rides that match your criteria:</p>
                        <!-- Table for displaying ride results -->
                        <div class="table">
                            <!-- Row for table header -->
                            <div class="row align-items-start ml-3">
                                <!-- Column for displaying user -->
                                <div class="col">
                                    User
                                </div>
                                <!-- Column for displaying starting point -->
                                <div class="col">
                                    Start
                                </div>
                                <!-- Column for displaying destination -->
                                <div class="col">
                                    End
                                </div>
                                <!-- Column for actions (e.g., view details) -->
                                <div class="col">
                                </div>
                                <!-- Sample row for displaying ride results -->
                                <div class="row align-items-start ml-3">
                                    <!-- User -->
                                    <div class="col">
                                        barroyo
                                    </div>
                                    <!-- Starting point -->
                                    <div class="col">
                                        Barrio Los Angeles
                                    </div>
                                    <!-- Destination -->
                                    <div class="col">
                                        Ciudad Quesada
                                    </div>
                                    <!-- Link to view ride details -->
                                    <div class="col">
                                        <a href="" class="button">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    barroyo
                                </div>
                                <div class="col">
                                    Barrio Los Angeles
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    <a href="" class="button">View</a>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    barroyo
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    Los Angeles
                                </div>
                                <div class="col">
                                    <a href="" class="button">View</a>
                                </div>
                            </div>
                            <div class="row align-items-start ml-3">
                                <div class="col">
                                    yluna
                                </div>
                                <div class="col">
                                    Ciudad Quesada
                                </div>
                                <div class="col">
                                    San Pedro
                                </div>
                                <div class="col">
                                    <a href="" class="button">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript section -->
    <script>
        // Function executed when the "Find my Ride!" button is clicked
        function findRide() {
            // Retrieve values from input fields
            var from = document.getElementById("fromInput").value;
            var to = document.getElementById("toInput").value;

            // Check if input fields are empty
            if (from.trim() === "" || to.trim() === "") {
                // Alert user to fill in both fields
                alert("Please fill in both 'From' and 'To' fields.");
                return;
            }

            // Create a new row in the results table
            var newRow = document.createElement("div");
            newRow.classList.add("row", "align-items-start", "ml-3");

            // Populate the row with input values and current user
            newRow.innerHTML = `
            <div class="col">
                ${getCurrentUser()}
            </div>
            <div class="col">
                ${from}
            </div>
            <div class="col">
                ${to}
            </div>
            <div class="col">
                <button class="button" onclick="viewRide('${from}', '${to}')">View</button>
            </div>
            `;

            // Add the new row to the results table in the main page
            document.querySelector(".table").appendChild(newRow);

            // Store the new ride in local storage
            var rides = JSON.parse(localStorage.getItem("rides")) || [];
            rides.push({
                from: from,
                to: to,
                user: getCurrentUser()
            });
            localStorage.setItem("rides", JSON.stringify(rides));

            // Show a message indicating ride found
            alert("Ride found!");
        }

        // Function to view ride details
        function viewRide(from, to) {
            alert("Viewing ride from " + from + " to " + to);
        }

        // Function to populate rides table on dashboard
        function populateRidesTable() {
            var rides = JSON.parse(localStorage.getItem("rides")) || [];
            var table = document.querySelector(".dashboard-table");

            // Clear existing table rows
            table.innerHTML = "";

            // Populate table with rides
            rides.forEach(function(ride) {
                var row = document.createElement("div");
                row.classList.add("row", "align-items-start", "ml-3");
                row.innerHTML = `
            <div class="col">${ride.user}</div>
            <div class="col">${ride.from}</div>
            <div class="col">${ride.to}</div>
            <div class="col">
                <button class="button" onclick="editRide('${ride.from}', '${ride.to}')">Edit</button>
                <button class="button" onclick="deleteRide('${ride.from}', '${ride.to}')">Delete</button>
            </div>
            `;
                table.appendChild(row);
            });
        }

        // Function to edit ride
        function editRide(from, to) {
            var rides = JSON.parse(localStorage.getItem("rides")) || [];
            var updatedFrom = prompt("Enter updated starting point:", from);
            var updatedTo = prompt("Enter updated destination:", to);

            // Update ride details
            rides.forEach(function(ride) {
                if (ride.from === from && ride.to === to) {
                    ride.from = updatedFrom || ride.from;
                    ride.to = updatedTo || ride.to;
                }
            });

            // Update local storage
            localStorage.setItem("rides", JSON.stringify(rides));

            // Update both tables
            populateRidesTable();
            showMainPageRides();
        }

        // Function to delete ride
        function deleteRide(from, to) {
            var rides = JSON.parse(localStorage.getItem("rides")) || [];

            // Remove the ride
            rides = rides.filter(function(ride) {
                return !(ride.from === from && ride.to === to);
            });

            // Update local storage
            localStorage.setItem("rides", JSON.stringify(rides));

            // Update both tables
            populateRidesTable();
            showMainPageRides();
        }

        // Function to show rides on main page
        function showMainPageRides() {
            var rides = JSON.parse(localStorage.getItem("rides")) || [];
            var mainPageTable = document.querySelector(".table");

            // Clear existing rows
            mainPageTable.innerHTML = "";

            // Populate main page table with rides
            rides.forEach(function(ride) {
                var row = document.createElement("div");
                row.classList.add("row", "align-items-start", "ml-3");
                row.innerHTML = `
            <div class="col">${ride.user}</div>
            <div class="col">${ride.from}</div>
            <div class="col">${ride.to}</div>
            <div class="col">
                <button class="button" onclick="viewRide('${ride.from}', '${ride.to}')">View</button>
            </div>
            `;
                mainPageTable.appendChild(row);
            });
        }

        // Function simulating retrieval of current user
        function getCurrentUser() {
            return "barroyo";
        }

        // Initialize the dashboard table on page load
        window.onload = function() {
            populateRidesTable();
            showMainPageRides();
        };
    </script>
</body>

</html>