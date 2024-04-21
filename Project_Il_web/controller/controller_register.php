<?php
if (!empty($_POST["REQUEST_METHOD"])) {
    if (empty($_POST["name"]) || empty($_POST["lastname"]) || empty($_POST["phone"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["rpassword"])) {
        echo '<div class="alert alert-danger">Uno de los campos está vacío</div>';
    } else {
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $rpassword = $_POST["rpassword"];

        if ($password !== $rpassword) {
            echo '<div class="alert alert-danger">Las contraseñas no coinciden</div>';
        } else {
            // Aquí puedes realizar cualquier otra acción, como almacenar en la base de datos.
            // Por ejemplo, puedes usar los valores $name, $lastname, $phone, $username y $password.
            echo '<div class="alert alert-success">¡Registro exitoso!</div>';
        }
    }
}
?>
