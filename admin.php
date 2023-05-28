<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Автосервис Администратор</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<?php
$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'yl';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

// Ругаемся, если соединение установить не удалось
if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}
?>

<body>
    <!-- Это кароче верхняя булка -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <img src="icon.png" style="width: 50px;" alt="icon.png">

            <h4>Администратор</h4>
            <h5>
                |ТаймАвто|
            </h5>
        </div>
    </nav>


    <div class="container my-2">
        <?php
        $sql = "SELECT * FROM blank";
        if ($result = $link->query($sql)) {
            echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Телефон клиента</th>
                    <th scope='col'>Мастер</th>
                    <th scope='col'>Дата</th>
                    <th scope='col'>Услуга</th>
                    <th scope='col'>Управление</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["number"] . "</td>";
                echo "<td>" . $row["master_id"] . "</td>";
                echo "<td>" . $row["date_time_blank"] . "</td>";
                echo "<td>" . $row["service_id"] . "</td>";
                echo "<td scope='col'>
                <a class='btn btn-outline-success' href='update_blank.php?id=" . $row["id"] . "'>Изменить</a>
                <form action='delete_blank.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                    <input type='submit' class='btn btn-outline-danger mx-2 my-1' value='Удалить'>
                </form>
            </td>";
                echo "</tr>";
            }
            echo "
        </table>";
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
        ?>
        
                </tbody>
            </table>
    </div>

    <div class="container my-5">
        <?php
        $sql = "SELECT * FROM services";
        if ($result = $link->query($sql)) {
            echo "<table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Название</th>
                <th scope='col'>Описание</th>
                <th scope='col'>Цена</th>
                <th scope='col'>Время</th>
                <th scope='col'>Управление</th>
            </tr>
        </thead>
        <tbody>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id_services"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["period"] . "</td>";
                echo "<td scope='col'>
                <a class='btn btn-outline-success' href='update_services.php?id_services=" . $row["id_services"] . "'>Изменить</a>
                <form action='delete_services.php' method='post'>
                    <input type='hidden' name='id_services' value='" . $row["id_services"] . "' />
                    <input type='submit' class='btn btn-outline-danger mx-2 my-1' value='Удалить'>
                </form>
            </td>";
                echo "</tr>";
            }
            echo "
        </table>";
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
        ?>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddServices">
            Добавить
        </button>
    </div>

    <!-- Modal добаавления услуг -->
    <div class="modal fade" id="exampleModalAddServices" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddS" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabelAddS">Добавление услуги</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="create_services.php" method="post">

                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Название</span>
                            <input type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1" name="name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">Описание</span>
                            <input type="text" class="form-control" aria-label="description" aria-describedby="basic-addon2" name="description">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Цена</span>
                            <input type="text" class="form-control" aria-label="price" aria-describedby="basic-addon3" name="price">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon4">Время</span>
                            <input type="text" class="form-control" aria-label="time" aria-describedby="basic-addon4" name="time">
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- таблица мастеров -->
    <div class="container my-5">
        <?php
        $sql = "SELECT * FROM masters";
        if ($result = $link->query($sql)) {
            echo "<table class='table table-striped'>
    <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>ФИО</th>
            <th scope='col'>Телфон</th>
            <th scope='col'>Почта</th>
            <th scope='col'>Должность</th>
            <th scope='col'>Управление</th>
        </tr>
    </thead>
    <tbody>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id_master"] . "</td>";
                echo "<td>" . $row["FIO"] . "</td>";
                echo "<td>" . $row["number_master"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td>
                <form action='delete_masters.php' method='post'>
                    <input type='hidden' name='id_master' value='" . $row["id_master"] . "' />
                    <input type='submit' class='btn btn-outline-danger' value='Удалить'>
                </form>
            </td>";
                echo "</tr>";
            }
            echo "
    </table>";
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }

        ?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddMasters">
            Добавить
        </button>
    </div>



    <!-- Modal добаавления местеров -->
    <div class="modal fade" id="exampleModalAddMasters" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddM" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabelAddM">Добавление мастера</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="create_masters.php" method="post">

                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ФИО</span>
                            <input type="text" class="form-control" aria-label="FIO" aria-describedby="basic-addon1" name="FIO">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">Телефон</span>
                            <input type="text" class="form-control" aria-label="phone" aria-describedby="basic-addon2" name="phone">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Почта</span>
                            <input type="text" class="form-control" aria-label="email" aria-describedby="basic-addon3" name="email">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon4">Должность</span>
                            <input type="text" class="form-control" aria-label="role" aria-describedby="basic-addon4" name="role">
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>