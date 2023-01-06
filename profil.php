<?php
session_start();

require 'Classes/User.php';

if(isset($_POST['delete'])){

    $deleteuser = new User();
    $deleteuser->delete($id);
}




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
            <input type="text" name="login">

            <label for="firstname">Firstname :</label>
            <input type="text" name="firstname" id="">

            <label for="lastname">Lastname :</label>
            <input type="text" name="lastname" id="">

            <label for="email">Email :</label>
            <input type="email" name="email">

            <label for="password">Password :</label>
            <input type="password" name="password">

            <input type="submit" value="Delete l'utilisateur" name="delete">

            <input type="submit" value="Modifier"name="submit">
        </form>

    </main>

</body>
</html>