<?php
// if (isset($_POST["number"]) && isset($_POST["date_time_blank"])) {

//     $conn = new mysqli("localhost", "root", "", "yl");
//     if ($conn->connect_error) {
//         die("Ошибка: " . $conn->connect_error);
//     }
//     $number = $conn->real_escape_string($_POST["number"]);
//     $date_time_blank = $conn->real_escape_string($_POST["date_time_blank"]);
//     $sql = "INSERT INTO blank (number, date_time_blank) VALUES ('$number', $date_time_blank)";
//     if ($conn->query($sql)) {
//         echo "Данные успешно добавлены";
//     } else {
//         echo "Ошибка: " . $conn->error;
//     }
//     $conn->close();
// }
?>

<?php
if (isset($_POST["phone"]) && isset($_POST["date"])) {

    $conn = new mysqli("localhost", "root", "", "yl");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $phone = $conn->real_escape_string($_POST["phone"]);
    $date = $conn->real_escape_string($_POST["date"]);
    $sql = "INSERT INTO blank (number, date_time_blank) VALUES ('$phone', '$date')";
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>