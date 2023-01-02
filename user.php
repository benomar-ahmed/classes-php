<?php

class User{
    
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;

    // CONSTRUCTEUR
    public function __construct()
    {
        session_start();
        $mysqli= new mysqli("localhost","root","","classes");
    }


    // MÉTHODES


    // Méthode pour créer un utilisateur dans la base de donnée
    public function register($login,$password,$email,$firstname,$lastname)
    {
        $requete = mysqli_query(,"INSERT INTO utilisateurs (`login`,`password`,`email`,`firstname`,`lastname`) VALUES (`$login`,`$password`,`$email`,`$firstname`,`$lastname`)");
    }





}

$test = new User();


?>