<?php

class Userpdo{
    
    private $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public $pdo;
    public $msg_error;
    public $verify_password;

    // CONSTRUCTEUR
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=classes;charset=utf8','root','');
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

        $resultat2 = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login=:login");
        $resultat2->execute(array('login' => $login));
        $new_var = $resultat2->fetchall(PDO::FETCH_ASSOC);
        

        if($new_var == true){  
            echo "L'utilisateur existe déjà";
        }

        else {
            $sql = $this->pdo->prepare("INSERT INTO utilisateurs (`login`,`password`,`email`,`firstname`,`lastname`) VALUES (?,?,?,?,?)");
            $sql->execute(array('$login','$password','$email','$firstname','$lastname'));
            header('Location: connexion.php');
        }
        


        return array($login,$password,$email,$firstname,$lastname);

    }

    public function connect($login,$password)
    {
        $this->msg_error = [];
        $this->login = $login;
        $this->password = $password;
        

        $requete = $this->pdo->prepare("SELECT id,login,password,email,firstname,lastname FROM utilisateurs WHERE login=:login and password=:password");
        $requete->execute(array(':login' => $login,':password' => $password));
        $row = $requete->fetchall(PDO::FETCH_ASSOC);
        

        if($row == true) {
            $_SESSION['id'] = $row[0]['id'];
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['email'] = $row[0]['email'];
            $_SESSION['firstname'] = $row[0]['firstname'];
            $_SESSION['lastname'] = $row[0]['lastname'];
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
        $requete = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id = :id");
        $requete->bindParam(':id',$_SESSION['id']);
        $requete->execute();
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

        $requete = $this->pdo->prepare("UPDATE utilisateurs SET login=:login,password =:password,email=:email,firstname=:firstname,lastname=:lastname WHERE login=:login2");
        $requete->bindParam(':login',$login);
        $requete->bindParam(':password',$password);
        $requete->bindParam(':email',$email);
        $requete->bindParam(':firstname',$firstname);
        $requete->bindParam(':lastname',$lastname);
        $requete->bindParam(':login2',$_SESSION['login']);
        $requete->execute();
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

    public function getAllInfos()
    {
        
        $requete = $this->pdo->prepare("SELECT * from utilisateurs WHERE id = :id");
        $requete->bindParam(':id',$_SESSION['id']);
        $requete->execute();
        $row = $requete->fetchall(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getLogin()
    {
        return $_SESSION['login'];
    }

    public function getEmail()
    {
        return $_SESSION['email'];
    }

    public function getFirstname()
    {
        return $_SESSION['firstname'];

    }

    public function getLastname()
    {
        return $_SESSION['lastname'];
    }
}



?>