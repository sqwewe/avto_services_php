<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Автосервис Клиент</title>
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

            <h4>Автосервис</h4>
            <h5>
                |ТаймАвто|
            </h5>
            <form class="d-flex">
                <!-- Button trigger modal -->
                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Оставить заявку</button>
                <div class="mx-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalMaster">
                        мастера
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalServices">
                        услуги
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalBlanks">
                        заказы
                    </button>
                </div>
            </form>

            <!-- Это окно заявки -->
            <!-- Modal blank -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="create.php" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Заявка</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Ваш Телефон:
                                    <input type="text" name="phone" />
                                </p>
                                <p>Дата и время заявки:
                                    <input type="text" name="date" readonly value="<?php echo date("d.m.y H:i"); ?>">

                                </p>

                            </div>
                            <p>После, вам позвонят для уточнения</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Это три окна таблиц  -->





        </div>
    </nav>



    <!-- Это кароче мясо -->
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h3>В случае чего, у вас есть необходимость посетить наш автосервис</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Причина 1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Вы не знаете что происходит в машине</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Причина 2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Вы знаете что происходит с машиной</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Причина 3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">У машины давно не было тех.обслуживания</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Это карусель фотографий -->
            <div class="col">
                <div class="container my-3 ">
                    <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel" style="width: 1000px;">
                        <div class="carousel-inner rounded-5">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="1.jpg" class="d-block w-100" alt="1.jpg">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="2.jpg" class="d-block w-100" alt="2.jpg">
                            </div>
                            <div class="carousel-item">
                                <img src="3.jpg" class="d-block w-100" alt="3.jpg">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Назад</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Далее</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Ну это кнопки отчётов -->
            <div class="d-grid gap-2" my-5>
                <h3 class="text-start">Вы можете скачать отчёт</h3>



                <form method="post" action="export.php">
                    <input type="submit" name="export" class="btn btn-danger" value="Наши Заявки" />
                </form>
                <form method="post" action="export_master.php">
                    <input type="submit" name="export" class="btn btn-danger" value="Наши Мастера" />
                </form>
                <form method="post" action="export_services.php">
                    <input type="submit" name="export" class="btn btn-danger" value="Наши Услуги" />
                </form>

            </div>
        </div>
    </div>

    <!-- Нижней булки нет -->


    <!-- Modal masster -->
    <div class="modal fade" id="exampleModalMaster" tabindex="-1" aria-labelledby="exampleModalLabelMaster" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabelMaster">Таблица мастеров</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <?php
                    $sqlm = "SELECT * FROM masters";
                    if ($result = $link->query($sqlm)) {
                        $rowsCount = $result->num_rows; // количество полученных строк
                        echo "<p>Получено объектов: $rowsCount</p>";
                    ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ФИО</th>
                                    <th scope="col">Телфон</th>
                                    <th scope="col">Почта</th>
                                    <th scope="col">Должность</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["id_master"] . "</td>";
                                echo "<td>" . $row["FIO"] . "</td>";
                                echo "<td>" . $row["number_master"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["role"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            $result->free();
                        } else {
                            echo "Ошибка: " . $link->error;
                        }
                            ?>
                            </tbody>
                        </table>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal services -->
    <div class="modal fade" id="exampleModalServices" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Таблица услуг</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $sql = "SELECT * FROM services";
                    if ($result = $link->query($sql)) {
                        $rowsCount = $result->num_rows; // количество полученных строк
                        echo "<p>Получено объектов: $rowsCount</p>";
                    ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Время</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["id_services"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["description"] . "</td>";
                                echo "<td>" . $row["price"] . "</td>";
                                echo "<td>" . $row["period"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            $result->free();
                        } else {
                            echo "Ошибка: " . $link->error;
                        }
                            ?>
                            </tbody>
                        </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal zayavok -->
    <div class="modal fade" id="exampleModalBlanks" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel3">Таблица заявок</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $sqlb = "SELECT * FROM blank INNER join masters ON blank.master_id = masters.id_master join services ON blank.service_id = services.id_services;";
                    if ($result = $link->query($sqlb)) {
                        $rowsCount = $result->num_rows; // количество полученных строк
                        echo "<p>Получено объектов: $rowsCount</p>";
                    ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Телефон клиента</th>
                                    <th scope="col">Мастер</th>
                                    <th scope="col">Дата</th>
                                    <th scope="col">Услуга</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["number"] . "</td>";
                                echo "<td>" . $row["FIO"] . "</td>";
                                echo "<td>" . $row["date_time_blank"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            $result->free();
                        } else {
                            echo "Ошибка: " . $link->error;
                        }
                            ?>
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>













</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>