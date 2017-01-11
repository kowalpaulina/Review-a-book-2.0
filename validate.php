<?php
include("functions.php");

$fname = $lname = $email = $message = '';
$error = array();
$dataPerson = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);
    $pregmatchName = "[^[a-zA-Z -]{3,16}$]";
    $pregmatchLastName = "[^[a-zA-Z ,.'-]{3,25}$]";
       
    
        if($fname==''){
            $error['fnameError'] = "Uzupełnij imię!"; 
        }elseif(!(preg_match($pregmatchName,$fname))){
             $error['fnameError'] = "Wpisz poprawne imię"; 
        }else{
            $dataPerson['fname'] = $fname;
        }
    
        if($lname==''){
                $error['lnameError'] = "Uzupełnij nazwisko!"; 
            }elseif(!(preg_match($pregmatchLastName,$lname))){
                 $error['lnameError'] = "Wpisz poprawne nazwisko"; 
            }else{
                $dataPerson['lname'] = $lname;
            }
    
        if(!validateTypes("mail",$email)){
            $error['emailError'] = "Uzupełnij adres email!";
        }else{
            $dataPerson['email'] = $email;
        }

        if($message==''){
            $error['messageError'] = "Wpisz swoją opinię!";
        }elseif(strlen($message)<10){
                $error['messageError'] = "Daj z siebie więcej ;)";}
        else{
            $dataPerson['message'] = $message;
        }
}
echo json_encode(array('error' => $error,'dataPerson' => $dataPerson));
?>