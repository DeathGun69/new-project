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
                        <label class="prefix">Объекты техносферы по территориям, включая города</label>
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

                                //Запрос по объектам техносферы
                                $queryTO = "SELECT id_raion, technosphere_objects  FROM `statistics_district` WHERE id_raion = $i";

                                $resultTechno = mysqli_query($connect, $queryTO);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($technoObj = mysqli_fetch_array($resultTechno)) {
                                    echo "<td>" . $technoObj["technosphere_objects"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">Всего объектов:</th>
                                    <?php

                                    $querySum = "SELECT date, SUM(technosphere_objects) as sumTO FROM `statistics_district` GROUP BY date";

                                    $resultSum = mysqli_query($connect, $querySum);

                                    while ($technoSum = mysqli_fetch_array($resultSum)) {
                                        echo "<th scope='col'>" . $technoSum["sumTO"] . "</th>";
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
                        <label class="prefix">Rвп - возникновения пожара в единицу времени на территории АТО [пожар/(объект * год)]</label>
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

                                //Запрос по Rвп
                                $queryTO = "SELECT ROUND((fire/technosphere_objects),5) AS rvp_TO FROM `statistics_district` WHERE id_raion = $i";

                                $resultTO = mysqli_query($connect, $queryTO);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($fire = mysqli_fetch_array($resultTO)) {
                                    echo "<td>" . $fire["rvp_TO"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">По области:</th>
                                    <?php

                                    $queryRvp_TO = "SELECT ROUND(SUM(fire)/SUM(technosphere_objects),5) AS sumRvp_TO FROM `statistics_district` GROUP BY date";

                                    $resultRvp_TO = mysqli_query($connect, $queryRvp_TO);

                                    while ($r1_fire = mysqli_fetch_array($resultRvp_TO)) {
                                        echo "<th scope='col'>" . $r1_fire["sumRvp_TO"] . "</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                        </tbody>
                    </table>
                </div>
                <div class="label">
                    <label class="prefix">Здесь должна быть диаграмма Rвп</label>
                </div>
                <div class="table">
                    <br>
                    <div class="label">
                        <label class="prefix">Пвп - парный интегральный пожарный риск возникновения пожара в единицу времени на территории = Rвп(АТ)/Rвп(область)</label>
                    </div>
                    <!-- <br> -->
                    <!-- Сломался, не могу понять как посчитать элементы и вывести -->
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
                            // $queryRvp_TO = "SELECT ROUND(SUM(fire)/SUM(technosphere_objects),5) AS sumRvp_TO FROM `statistics_district` GROUP BY date";

                            // $resultSumTO = mysqli_query($connect, $queryRvp_TO);
                            // $sumTO = array();

                            // while ($pvpSumTO = mysqli_fetch_array($resultSumTO)) {
                            //     $sumTO[] = array_values($pvpSumTO);
                            // }

                            $queryR = "SELECT raion_name FROM `raion`";

                            $resultRaion = mysqli_query($connect, $queryR);
                            $a = 1;

                            while ($raion = mysqli_fetch_array($resultRaion)) {

                                //Запрос по Rвп
                                $queryTO = "SELECT ROUND((fire/technosphere_objects),5) AS rvp_TO FROM `statistics_district` WHERE id_raion = $a";

                                $resultTO = mysqli_query($connect, $queryTO);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                //$arr = array();
                                while ($fire = mysqli_fetch_array($resultTO)) {

                                    //$arr[] = array_values($fire);
                                    echo "<td>" . $arr["rvp_TO"] . "</td>";
                                }
                                $a++;

                                // for ($i=0, $size = count($arr); $i < $size; $i++) { 
                                //     # code...
                                // }

                                // print_r($arr);

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>