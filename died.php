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
                        <label class="prefix">Количество погибших в административно-территориальных образованиях Иркутской област</label>
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

                                //Запрос по погибших
                                $queryDid = "SELECT id_raion, died  FROM `statistics_district` WHERE id_raion = $i";

                                $resultDied = mysqli_query($connect, $queryDid);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($died = mysqli_fetch_array($resultDied)) {
                                    echo "<td>" . $died["died"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">Всего погибло:</th>
                                    <?php

                                    $querySum = "SELECT date, SUM(died) as sumDied FROM `statistics_district` GROUP BY date";

                                    $resultSum = mysqli_query($connect, $querySum);

                                    while ($diedSum = mysqli_fetch_array($resultSum)) {
                                        echo "<th scope='col'>" . $diedSum["sumDied"] . "</th>";
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
                        <label class="prefix">R2 - интегральный территориальный риск для человека погибнуть на одном пожаре [жертва/(пожар * год)]</label>
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

                                //Запрос по R2
                                $queryTO = "SELECT ROUND((died/fire), 5) AS r2_Died FROM `statistics_district` WHERE id_raion = $i";

                                $resultTO = mysqli_query($connect, $queryTO);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($fire = mysqli_fetch_array($resultTO)) {
                                    echo "<td>" . $fire["r2_Died"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                            <thead>
                                <tr>
                                    <th scope="col">По области:</th>
                                    <?php

                                    $queryRvp_TO = "SELECT ROUND(SUM(died)/SUM(fire), 5) AS sumR2_Died FROM `statistics_district` GROUP BY date";

                                    $resultRvp_TO = mysqli_query($connect, $queryRvp_TO);

                                    while ($r1_fire = mysqli_fetch_array($resultRvp_TO)) {
                                        echo "<th scope='col'>" . $r1_fire["sumR2_Died"] . "</th>";
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
                        <label class="prefix">R3 - интегральный территориальный риск для человека погибнуть от опасных факторов пожара [жертва/(чел. * год)]</label>
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

                                //Запрос по R3
                                $queryTO = "SELECT ROUND((died/(population*1000)), 5) AS r3_Died FROM `statistics_district` WHERE id_raion = $i";

                                $resultTO = mysqli_query($connect, $queryTO);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($fire = mysqli_fetch_array($resultTO)) {
                                    echo "<td>" . $fire["r3_Died"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col">По области:</th>
                                <?php

                                $queryRvp_TO = "SELECT ROUND((SUM(died)/SUM((population*1000))), 5) AS sumR3_Died FROM `statistics_district` GROUP BY date";

                                $resultRvp_TO = mysqli_query($connect, $queryRvp_TO);

                                while ($r1_fire = mysqli_fetch_array($resultRvp_TO)) {
                                    echo "<th scope='col'>" . $r1_fire["sumR3_Died"] . "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="label">
                    <label class="prefix">Здесь должна быть диаграмма</label>
                </div>
                <div class="table">
                    <br>
                    <div class="label">
                        <label class="prefix">R3 - он же, но как R1*R2 [жертва/(чел. * год)]</label>
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

                                //Запрос по R3 R1*R2
                                $queryTO = "SELECT ROUND(((fire/(population*1000)) * (died/fire)), 5) AS r3_Died FROM `statistics_district` WHERE id_raion = $i";

                                $resultTO = mysqli_query($connect, $queryTO);

                                echo "<tr>";
                                echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                                while ($fire = mysqli_fetch_array($resultTO)) {
                                    echo "<td>" . $fire["r3_Died"] . "</td>";
                                }
                                $i++;

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col">По области:</th>
                                <?php

                                $queryRvp_TO = "SELECT ROUND((SUM(died)/SUM((population*1000))), 5) AS sumR3_Died FROM `statistics_district` GROUP BY date";

                                $resultRvp_TO = mysqli_query($connect, $queryRvp_TO);

                                while ($r1_fire = mysqli_fetch_array($resultRvp_TO)) {
                                    echo "<th scope='col'>" . $r1_fire["sumR3_Died"] . "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
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