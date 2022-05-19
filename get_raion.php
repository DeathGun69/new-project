<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
 
    require_once("connect_db.php");

    $sql = "SELECT * FROM raion WHERE `id_region` = '".$_POST["region"]."' ";
    $result = mysqli_query($connect, $sql);

        echo"<option value = ''>Выберите район</option>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row["id"]."'>".$row["raion_name"]."</option>";
    }
}
?>