<?php
if (isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["time"])) {

    $conn = new mysqli("localhost", "root", "", "yl");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $fio = $conn->real_escape_string($_POST["name"]);
    $phone = $conn->real_escape_string($_POST["description"]);
    $emial = $conn->real_escape_string($_POST["price"]);
    $role = $conn->real_escape_string($_POST["time"]);
    $sql = "INSERT INTO services (name, description, price, period) VALUES ('$fio', '$phone', '$emial', '$role')";
    if ($conn->query($sql)) {
        header('Location: admin.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
