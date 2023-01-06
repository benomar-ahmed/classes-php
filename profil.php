<?php
session_start();

require 'Classes/User.php';

if(isset($_POST['delete'])){

    $deleteuser = new User();
    $deleteuser->delete($id);
}

if(isset($_POST['modify'])){

    $login =  $_POST['login'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $modifyuser = new User();
    $modifyuser->update($login,$password,$email,$firstname,$lastname);
    echo $modifyuser->msg_error;

    
}
$connectuser = new User();
$connectuser->isConnected();

$getInfos = new User();
$getInfos->getAllInfos();
$var_return = $getInfos->getAllInfos();
var_dump($var_return);

$getLogin = new User();
$getLogin->getLogin();
$var_return1 = $getLogin->getLogin();
var_dump($var_return1);

$getEmail = new User();
$getEmail->getEmail();
$var_return2 = $getEmail->getEmail();
var_dump($var_return2);

$getFirstname = new User();
$getFirstname ->getFirstname ();
$var_return3 = $getFirstname ->getFirstname ();
var_dump($var_return3);

$getLastname = new User();
$getLastname ->getLastname ();
$var_return4 = $getLastname ->getLastname ();
var_dump($var_return4);








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <header>
        <?php include 'header.php' ?>
    </header>

    <main>
        <form action="" method="post">
            <label for="login">Login :</label>
            <input type="text" name="login" required="required">

            <label for="firstname">Firstname :</label>
            <input type="text" name="firstname" required="required">

            <label for="lastname">Lastname :</label>
            <input type="text" name="lastname" required="required">

            <label for="email">Email :</label>
            <input type="email" name="email" required="required">

            <label for="password">Password :</label>
            <input type="password" name="password" required="required">

            <input type="submit" value="Delete l'utilisateur" name="delete">

            <input type="submit" value="Modifier" name="modify">
        </form>

    </main>

</body>
</html>