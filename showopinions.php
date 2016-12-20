<?php
include('db.php');

$sql = "SELECT * FROM reviews order by id desc";
$result = $mysqli->query($sql);

while($row=mysqli_fetch_array($result)){
    echo "<article>";
    echo "<ul>";
    echo "<li>".$row['name']." ".$row['lastname']."</li>";
    echo "<li>".$row['date']."</li>";
    echo "</ul>";
    echo "<div>".$row['message']."</div>";
    echo "</article>";
}
?>