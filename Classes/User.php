<?php

class User{
    
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $base_de_donnee;
    public $msg_error;
    public $verify_password;

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

        $resultat2 = mysqli_query($this->base_de_donnee,"SELECT login FROM utilisateurs WHERE login='$login';");
        $row1 = $resultat2->fetch_all();

        if($row1 == true){  
            echo "L'utilisateur existe déjà";
        }

        else {
            $sql = mysqli_query($this->base_de_donnee,"INSERT INTO utilisateurs (`login`,`password`,`email`,`firstname`,`lastname`) VALUES ('$login','$password','$email','$firstname','$lastname')");
            header('Location: connexion.php');
        }
        


        return array($login,$password,$email,$firstname,$lastname);

    }

    public function connect($login,$password)
    {
        $this->msg_error = [];
        $this->login = $login;
        $this->password = $password;
        

        $requete = mysqli_query($this->base_de_donnee,"SELECT id,login,password FROM utilisateurs WHERE login='$login' and password='$password';");
        $row = $requete->fetch_all();

        if($row == true) {
            $_SESSION['id'] = $row[0][0];
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            $msg_error[]="Bonjour ".$_SESSION['login'];
        }
        
    
        else {
            $msg_error[]="Le login et/ou le mot de passe est incorrect !";
        }
        return $msg_error;
    }


    public function disconnect()
    {
        session_destroy();
        header("Location: connexion.php");
    }

    public function delete()
    {

        $requete = mysqli_query($this->base_de_donnee,"DELETE FROM utilisateurs WHERE id = '".$_SESSION['id']."'");
        session_destroy();
        header("Location: connexion.php");

    }

    public function update($login,$password,$email,$firstname,$lastname)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email =  $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $requete = mysqli_query($this->base_de_donnee,"UPDATE utilisateurs SET login='$login',password = '$password',email='$email',firstname='$firstname',lastname='$lastname' WHERE login='".$_SESSION['login']."'");
        echo "Votre profil a été mis à jour";
    }

    public function isConnected()
    {

        if(isset($_SESSION['id']) == true){
            echo "Vous êtes connectés";
            return True;
        }
        
        else{
            echo "Vous êtes déconnectés";
            return False;
        }
    }
}






?>