<?php
if(isset($_POST['submit'])) {

    $userPseudo = $_POST['userPseudo'];
    $userPassword = $_POST['userPassword'];

    // Login user
    require_once '../entity/user.php';
    $user->loginUser($userPseudo, $userPassword);

} else {
    echo "<script>window.location.href='../templates/login.php'</script>";
    exit();
}