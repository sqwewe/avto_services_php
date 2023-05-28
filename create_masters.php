<?php
if (isset($_POST["FIO"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["role"])) {

    $conn = new mysqli("localhost", "root", "", "yl");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $fio = $conn->real_escape_string($_POST["FIO"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $emial = $conn->real_escape_string($_POST["email"]);
    $role = $conn->real_escape_string($_POST["role"]);
    $sql = "INSERT INTO masters (FIO, number_master, email, role) VALUES ('$fio', '$phone', '$emial', '$role')";
    if ($conn->query($sql)) {
        header('Location: admin.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
