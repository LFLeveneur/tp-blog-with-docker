<?php
require_once '../entity/db.php';

function verifyEntry($userPseudo, $userMail, $userPassword){
    if(empty($userPseudo) || empty($userMail) || empty($userPassword)){
        $returnResult = true;
    } else {
        $returnResult = false;
    }
    return $returnResult;

}

function invalidMail($userMail){
    if(!filter_var($userMail, FILTER_VALIDATE_EMAIL)){
        $returnResult = true;
    } else {
        $returnResult = false;
    }
    return $returnResult;
}

function invalidPseudo($userPseudo){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $userPseudo)){
        $returnResult = true;
    } else {
        $returnResult = false;
    }
    return $returnResult;
}

function verifyPassword($userPassword, $userPasswordRepeat){
    if($userPassword !== $userPasswordRepeat){
        $returnResult = true;
    } else {
        $returnResult = false;
    }
    return $returnResult;
}

function hashPassword($userPassword){
    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    return $hashedPassword;
}

function userExist($userPseudo){
    $db = new DB();
    $request = $db->connect_db()->prepare("SELECT * FROM user WHERE user_name = ?");
    $request->execute([$userPseudo]);
    $result = $request->fetch(PDO::FETCH_ASSOC);
    if($result){
        return $result;
    } else {
        return false;
    }
}