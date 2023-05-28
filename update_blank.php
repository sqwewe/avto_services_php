<?php
$conn = new mysqli("localhost", "root", "", "yl");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Изменение</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <?php
    // если запрос GET
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
        $id = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT * FROM blank WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $number = $row["number"];
                    $master_id = $row["master_id"];
                    $date_time_blank = $row["date_time_blank"];
                    $service_id = $row["service_id"];
                }
                echo "<div class='cintainer my-2 mx-2'><h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='id' value='$id' readonly />
                    <p>Номер телефона:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='number' value='$number' readonly /></p>
                    <p>id Мастера:
                    <input type='number' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='master_id' value='$master_id' /></p>
                    <input type='hidden'  name='date_time_blank' value='$date_time_blank' /></p>
                    <p>id Услуги:
                    <input type='number' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='service_id' value='$service_id' /></p>
                    <input type='submit' class='btn btn-outline-success' value='Сохранить'>
            </form></div>";
            } else {
                echo "<div>Заявка не найдена</div>";
            }
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } elseif (isset($_POST["id"]) && isset($_POST["number"]) && isset($_POST["master_id"]) && isset($_POST["date_time_blank"]) && isset($_POST["service_id"])) {

        $id = $conn->real_escape_string($_POST["id"]);
        $number = $conn->real_escape_string($_POST["number"]);
        $master_id = $conn->real_escape_string($_POST["master_id"]);
        $date_time_blank = $conn->real_escape_string($_POST["date_time_blank"]);
        $service_id = $conn->real_escape_string($_POST["service_id"]);
        $sqls = "UPDATE blank SET number = '$number', master_id = '$master_id', date_time_blank = '$date_time_blank', service_id = '$service_id' WHERE id = '$id'";
        if ($result = $conn->query($sqls)) {

            header("Location: admin.php");
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } else {
        echo "Некорректные данные";
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>