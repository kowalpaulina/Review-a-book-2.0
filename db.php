<?PHP
	$dbconnection['host']='127.0.0.1'; 
	$dbconnection['login']='root';
	$dbconnection['pass']='';
	$dbconnection['db_name']='review';

	//nawiązujemy polaczenie
	$mysqli=@mysqli_connect($dbconnection['host'], $dbconnection['login'], $dbconnection['pass'], $dbconnection['db_name']);

    $mysqli->set_charset("utf8");

if(!$mysqli){
    echo'err';
}

?>