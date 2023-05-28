<?php
// if (isset($_POST["id_master"])) {
//     $conn = new mysqli("localhost", "root", "", "yl");
//     if ($conn->connect_error) {
//         die("Ошибка: " . $conn->connect_error);
//     }
//     $mid = $conn->real_escape_string($_POST["id_master"]);
//     $sql = "DELETE FROM masters WHERE id_master = $mid";
//     if ($conn->query($sql)) {

//         header("Location: admin.php");
//     } else {
//         echo "Ошибка: " . $conn->error;
//     }

// }
?>

<?php
if (isset($_POST["id_services"])) {
    $conn = new mysqli("localhost", "root", "", "yl");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $serid = $conn->real_escape_string($_POST["id_services"]);
    $sql = "DELETE FROM services WHERE id_services  = '$serid'";
    if ($conn->query($sql)) {

        header("Location: admin.php");
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
?>
