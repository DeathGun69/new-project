<?php

function getFederalDis() {
   
    include "db.php";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name); 

    if(mysqli_connect_error())
    {
        print mysqli_connect_error();
        exit();
    } echo("ok");

    $sql = "SELECT * FROM `federal_district` ORDER BY `district`";
	
	$query = $conn->query($sql) or die ( $conn->error );

    echo($query);
	
	// Поместим данные, которые будет возвращать функция, в массив
	// Пока что он будет пустым
	$array = array();
	
	// Инициализируем счетчик
	$i = 0;
	
	while ( $row = mysqli_fetch_assoc( $query ) ) {
		
		$array[ $i ][ 'id' ] = $row[ 'id' ];				// Идентификатор округа
		$array[ $i ][ 'district' ] = $row[ 'district' ];	// Имя округа
		
		// После каждой итерации цикла увеличиваем счетчик
		$i++;
		
	}

    
	
	// Возвращаем вызову функции массив с данными
	return $array;
}

?>
