<?php
require_once("connect_db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.22.2/dist/apexcharts.js" defer></script>
    <script src="js/script.js" defer></script>

    <title>Риски</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Риски</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Пожары</a>
                    <a class="nav-link" href="#">Графики</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid custome-container">
        <div class="row row-custome">
            <div class="col-2 bg-dark">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="index.php">Показатели</a>
                    <a class="nav-link" href="population.php">Население</a>
                    <a class="nav-link" href="fires.php">Пожары</a>
                    <a class="nav-link" href="techno_objects.php">Объекты техносферы</a>
                    <a class="nav-link" href="damage.php">Ущерб</a>
                    <a class="nav-link" href="died.php">Погибло</a>
                    <a class="nav-link" href="traumatized.php">Травмировано</a>
                    <a class="nav-link" href="objects_destroyed.php">Уничтожено объектов</a>
                </nav>
            </div>
            <div class="col-10 content">
                <div class="table">
                    <br>
                    <div class="label">
                        <label class="prefix">Динамика населения Иркутской области по территориям, включая города</label>
                    </div>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <?php
                                $query = "SELECT DISTINCT `date` FROM `statistics_district`";

                                $resultDate = mysqli_query($connect, $query);

                                while ($date = mysqli_fetch_array($resultDate)) {
                                    echo "<th scope='col'>" . $date["date"] . "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //Запрос на вывод районов
                            $queryR = "SELECT raion_name FROM `raion`";

                            $resultRaion = mysqli_query($connect, $queryR);
                            $i = 1;

                            while ($raion = mysqli_fetch_array($resultRaion)) {

                                //Запрос по травмированым
                                $queryT = "SELECT id_raion, traumatized  FROM `statistics_district` WHERE id_raion = $i";

                                $resultTraum = mysqli_query($connect, $queryT);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($traum = mysqli_fetch_array($resultTraum)) {
                                    echo "<td>" . $traum["traumatized"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">Всего травмировано:</th>
                                    <?php

                                    $querySum = "SELECT date, SUM(traumatized) as sumTraum FROM `statistics_district` GROUP BY date";

                                    $resultSum = mysqli_query($connect, $querySum);

                                    while ($traumSum = mysqli_fetch_array($resultSum)) {
                                        echo "<th scope='col'>" . $traumSum["sumTraum"] . "</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                        </tbody>
                    </table>
                </div>
                <div class="label">
                    <label class="prefix">Здесь должна быть диаграмма</label>
                </div>
                <div class="table">
                    <br>
                    <div class="label">
                        <label class="prefix">Rтр - интегральный территориальный риск для человека получить травму в результате пожара [жертва/(чел*год)]</label>
                    </div>
                    <br>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <?php
                                $query = "SELECT DISTINCT `date` FROM `statistics_district`";

                                $resultDate = mysqli_query($connect, $query);

                                while ($date = mysqli_fetch_array($resultDate)) {
                                    echo "<th scope='col'>" . $date["date"] . "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //Запрос на вывод районов
                            $queryR = "SELECT raion_name FROM `raion`";

                            $resultRaion = mysqli_query($connect, $queryR);
                            $i = 1;

                            while ($raion = mysqli_fetch_array($resultRaion)) {

                                //Запрос по Rтр
                                $queryF = "SELECT ROUND(traumatized/(population*1000),5) AS rtr_traum FROM `statistics_district` WHERE id_raion = $i";

                                $resultFire = mysqli_query($connect, $queryF);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($fire = mysqli_fetch_array($resultFire)) {
                                    echo "<td>" . $fire["rtr_traum"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">По области:</th>
                                    <?php

                                    $queryR1_F = "SELECT ROUND(SUM(traumatized)/(ROUND(SUM(population),2)*1000), 5) AS sumRtr_traum FROM `statistics_district` GROUP BY date";

                                    $resultR1_F = mysqli_query($connect, $queryR1_F);

                                    while ($r1_fire = mysqli_fetch_array($resultR1_F)) {
                                        echo "<th scope='col'>" . $r1_fire["sumRtr_traum"] . "</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                        </tbody>
                    </table>
                </div>
                <div class="label">
                    <label class="prefix">Здесь должна быть диаграмма</label>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>