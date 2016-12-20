<?php
include("functions.php");

    $fname='';
    $lname = '';
    $email = '';
    $message = '';
    $gender = '';
    $error = array();
           
    //fname validation
    if(isset($_POST['fname'])){
        if(trim($_POST['fname'])==''){
            $error['fname'] = "Uzupełnij imię!";    
        }else{
             $fname = $_POST['fname'];
        }
    }

    //lname validation
    if(isset($_POST['lname'])){
        if(trim($_POST['lname'])==''){
            $error['lname'] = "Uzupełnij nazwisko!";
        }else{
            $lname = $_POST['lname'];
        }
    }
    
    //mail validation
    if(isset($_POST['email'])){
        if(!validateTypes("email",$_POST['email'])){
            $error['email'] = "Uzupełnij adres email!";
        }else{
            $email = $_POST['email'];
        }
    }

    if(isset($_POST['message'])){
        if(trim($_POST['message'])==''){
            $error['message'] = "Wpisz swoją opinię!";
        }elseif(!trim($_POST['message'])==''){
            if(strlen(trim($_POST['message']))<10){
                $error['message'] = "Daj z siebie więcej ;)";}
        }else{
            $message = $_POST['message'];

        }
    }
echo json_encode($error);
?>