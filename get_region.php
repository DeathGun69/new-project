<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
 
    require_once("connect_db.php");

    $sql = "SELECT * FROM region WHERE `id_district` = '".$_POST["federal_district"]."' ";
    $result = mysqli_query($connect, $sql);

        echo"<option value = ''>Выберите регион</option>";
    
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value = '".$row["id"]."'>".$row["region_name"]."</option>";
    }
}
?>