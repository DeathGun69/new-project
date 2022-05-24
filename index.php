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
                    <a class="nav-link active" aria-current="page" href="map.php">Карта</a>
                    <a class="nav-link" href="#">Графики</a>
                    <a class="nav-link" href="#"></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid custome-container">
        <div class="row row-custome">
            <div class="col-2 bg-dark">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#">Показатели</a>
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
                <!-- <div class="row row-cols-auto">
                    <div class="disrict_fed col">
                        <label for="get_federal" class="prefix">Федеральный округ:</label>
                        <select id="get_federal" name="get_federal" class="form-select" aria-label="Default select example">
                            <option value="0">Выберите округ</option>
                            <?php
                            // $sql = "SELECT * FROM `federal_district` ORDER BY `district`";

                            // $result = mysqli_query($connect, $sql);

                            // while ($row = mysqli_fetch_array($result)) {
                            //     echo "<option value = '" . $row["id"] . "'>" . $row["district"] . "</option>";
                            // }
                            ?>
                        </select>
                    </div>
                    <div class="region col" id="sub_region">
                        <label for="get_region" class="prefix">Выберите регион:</label>
                        <select id="get_region" name="get_region" class="form-select" aria-label="Default select example"></select>
                    </div>
                    <div class="raion col" id="sub_raion">
                        <label for="get_raion" class="prefix">Выберите район:</label>
                        <select id="get_raion" name="get_raion" class="form-select" aria-label="Default select example"></select>
                    </div>
                </div> -->

                <!-- Здесь будет выводиться таблица показателей -->

                <div class="table">
                    <br>
                    <div class="label">
                        <label class="prefix">Комплексный показатель пожарной опасности территории</label>
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
                                echo "<th scope='col'>Среднее</th>";
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope='row'>Иркутский</th>
                                <td class="bg-success text-white">4,09</td>
                                <td class="bg-warning text-dark">5,18</td>
                                <td class="bg-success text-white">3,10</td>
                                <td class="bg-success text-white">3,22</td>
                                <td class="bg-success text-white">3,27</td>
                                <td class="bg-success text-white">3,69</td>
                                <td class="bg-success text-white">4,17</td>
                                <td class="bg-success text-white">3,75</td>
                                <td class="bg-success text-white">3,56</td>
                                <td class="bg-success text-white">4,52</td>
                                <td class="bg-success text-white">3,64</td>
                                <th class="bg-success text-white" scope='row' >3,84</th>
                            </tr>
                            <tr>
                                <th scope='row'>Братский</th>
                                <td class="bg-success text-white">4,53</td>
                                <td class="bg-success text-white">4,43</td>
                                <td class="bg-warning text-dark">5,39</td>
                                <td class="bg-warning text-dark">5,07</td>
                                <td class="bg-success text-white">4,72</td>
                                <td class="bg-success text-white">4,66</td>
                                <td class="bg-success text-white">4,64</td>
                                <td class="bg-success text-white">4,87</td>
                                <td class="bg-warning text-dark">5,53</td>
                                <td class="bg-success text-white">4,12</td>
                                <td class="bg-success text-white">4,04</td>
                                <th class="bg-success text-white" scope='row' >4,73</th>
                            </tr>
                            <tr>
                                <th scope='row'>Боханский</th>
                                <td class="bg-success text-white">4,92</td>
                                <td class="bg-success text-white">4,93</td>
                                <td class="bg-success text-white">4,10</td>
                                <td class="bg-warning text-dark">5,41</td>
                                <td class="bg-success text-white">4,30</td>
                                <td class="bg-success text-white">4,07</td>
                                <td class="bg-success text-white">4,75</td>
                                <td class="bg-success text-white">3,72</td>
                                <td class="bg-warning text-dark">7,04</td>
                                <td class="bg-warning text-dark">5,21</td>
                                <td class="bg-success text-white">4,55</td>
                                <th class="bg-success text-white" scope='row' >4,82</th>
                            </tr>					
                            <tr>
                                <th scope='row'>Баяндаевский</th>
                                <td class="bg-success text-white">2,15</td>
                                <td class="bg-success text-white">4,82</td>
                                <td class="bg-success text-white">4,93</td>
                                <td class="bg-warning text-dark">5,82</td>
                                <td class="bg-warning text-dark">6,34</td>
                                <td class="bg-success text-white">2,72</td>
                                <td class="bg-success text-white">4,62</td>
                                <td class="bg-warning text-dark">5,58</td>
                                <td class="bg-success text-white">3,88</td>
                                <td class="bg-warning text-dark">6,17</td>
                                <td class="bg-warning text-dark">6,04</td>
                                <th class="bg-success text-white" scope='row'>4,82</th>
                            </tr>
                            <tr>
                                <th scope='row'></th>
                                <td class="bg-success text-white"></td>
                                <td class="bg-success text-white"></td>
                                <td class="bg-warning text-dark"></td>
                                <td class="bg-warning text-dark"></td>
                                <td class="bg-success text-white"></td>
                                <td class="bg-success text-white"></td>
                                <td class="bg-success text-white"></td>
                                <td class="bg-success text-white"></td>
                                <td class="bg-warning text-dark"></td>
                                <td class="bg-success text-white"></td>
                                <td class="bg-success text-white"></td>
                                <th class="bg-success text-white" scope='row' ></th>
                            </tr>

                            																			
                            <?php
                            //Запрос на вывод районов
                            // $queryR = "SELECT raion_name FROM `raion`";

                            // $resultRaion = mysqli_query($connect, $queryR);
                            // $i = 1;

                            // while ($raion = mysqli_fetch_array($resultRaion)) {

                            //     //Запрос по населению
                            //     // $queryP = "SELECT id_raion, population  FROM `statistics_district` WHERE id_raion = $i";

                            //     // $resultPopul = mysqli_query($connect, $queryP);

                            //     echo "<tr>";
                            //     echo "<th scope='row'>" . $raion["raion_name"] . "</th>";

                            //     // while ($popul = mysqli_fetch_array($resultPopul)) {
                            //     //     echo "<td>" . $popul["population"] . "</td>";
                            //     // }
                            //     // $i++;

                            //     echo "</tr>";
                            // }
                            ?>
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