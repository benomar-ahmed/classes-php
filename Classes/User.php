<?php

class User{
    
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $base_de_donnee;

    // CONSTRUCTEUR
    public function __construct()
    {
        $this->base_de_donnee = mysqli_connect("localhost","root","","classes");
    }


    // MÉTHODES


    // Méthode pour créer un utilisateur dans la base de donnée
    public function register($login,$password,$email,$firstname,$lastname)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email =  $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $sql = mysqli_query($this->base_de_donnee,"INSERT INTO utilisateurs (`login`,`password`,`email`,`firstname`,`lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')");

        return array($login,$password,$email,$firstname,$lastname);

    }

    public function connect($login,$password)
    {

        $this->login = $login;
        $this->password = $password;
        $msg = [];

        $requete = mysqli_query($this->base_de_donnee,"SELECT id,login,password FROM utilisateurs WHERE login='$login' and password='$password';");
        $row = $requete->fetch_all();
        var_dump($row);

        // if($row == true) {
        //     $_SESSION['id'] = $row[0][0];
        //     $_SESSION['login'] = $row[0][0];
        //     $_SESSION['password'] = $row[0][0];

        // }
    }





}






?>