<?php

require 'Classes/User.php';




if(isset($_POST['submit'])){

    $login =  $_POST['login'];
    $password = $_POST['password'];
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['email'];

    $newuser = new User();
    $newuser->register($login,$password,$email,$firstname,$lastname);
    $var_return = $newuser->register($login,$password,$email,$firstname,$lastname);
    var_dump($var_return);
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <main>
        <form action="" method="post">

            <label for="login">Login :</label>
            <input type="text" name="login" id="">

            <label for="firstname">Firstname :</label>
            <input type="text" name="Firstname" id="">

            <label for="lastname">Lastname :</label>
            <input type="text" name="Lastname" id="">

            <label for="email">Email :</label>
            <input type="email" name="email" id="">

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="">

            <input type="submit" value="Envoyez" name="submit">
        </form>
    </main>
</body>
</html>