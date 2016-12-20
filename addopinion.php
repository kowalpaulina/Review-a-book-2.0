<?PHP
include('functions.php');
include('db.php');
   
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $now=date('Y-m-d H:i:s'); 
    
    $sql = "INSERT INTO reviews (name, lastname, email, message,date)
    VALUES('".$fname."' ,'".$lname."' ,'".$email."' ,'".$message."','".$now."')";
    
    $result=$mysqli->query($sql);
?>