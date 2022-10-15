<?php
include '../include/user.inc.php';

class User
{
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function createUser($userPseudo, $userMail, $userPassword)
    {
        $request = $this->bdd->prepare("INSERT INTO user (user_name, user_email, user_password) VALUES (?, ?, ?)");
        $hashedPassword = hashPassword($userPassword);
        $request->execute([$userPseudo, $userMail, $hashedPassword]);
    }

    public function loginUser($userPseudo, $userPassword)
    {
        $userExited = userExist($userPseudo);
        if($userExited === false){
            echo "<script>window.location.href='../templates/login.php?error=wronglogin'</script>";
            exit();
        }

        $checkPassword = password_verify($userPassword, $userExited['user_password']);

        if($checkPassword === false){
            echo "<script>window.location.href='../templates/login.php?error=badpassword'</script>";
            exit();
        } else if($checkPassword === true){
            session_start();
            $_SESSION["userID"] = $userExited["id"];
            $_SESSION["userPseudo"] = $userExited["user_name"];
            $_SESSION["userStatus"] = $userExited["user_status"];
            echo "<script>window.location.href='../index.php'</script>";
            exit();
        }
    }
}

$db = new DB();
$bdd = $db->connect_db();
$user = new User($bdd);