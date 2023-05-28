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
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id_services"])) {
        $id_services = $conn->real_escape_string($_GET["id_services"]);
        $sql = "SELECT * FROM services WHERE id_services = '$id_services'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $name = $row["name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $period = $row["period"];
                }
                echo "<div class='cintainer my-2 mx-2'><h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id_services' value='$id_services' />
                    <p>Имя:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='name' value='$name' /></p>
                    <p>Описание:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='description' value='$description' /></p>
                    <p>Цена:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='price' value='$price' /></p>
                    <p>Продолжительность:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='period' value='$period' /></p>
                    <input type='submit' class='btn btn-outline-success' value='Сохранить'>
            </form></div>";
            } else {
                echo "<div>Услуга не найдена</div>";
            }
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } elseif (isset($_POST["id_services"]) && isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["period"])) {

        $id_services = $conn->real_escape_string($_POST["id_services"]);
        $name = $conn->real_escape_string($_POST["name"]);
        $description = $conn->real_escape_string($_POST["description"]);
        $price = $conn->real_escape_string($_POST["price"]);
        $period = $conn->real_escape_string($_POST["period"]);
        $sqls = "UPDATE services SET name = '$name', description = '$description', price = '$price', period = '$period' WHERE id_services = '$id_services'";
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