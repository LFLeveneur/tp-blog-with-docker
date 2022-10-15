

<?php
if (isset($_POST['submit'])) {

    $userPseudo = $_POST['userPseudo'];
    $userMail = $_POST['userMail'];
    $userPassword = $_POST['userPassword'];
    $userPasswordRepeat = $_POST['userPasswordRepeat'];
    echo $userPseudo;

    // Check if user exist
    require_once '../entity/db.php';
    require '../entity/user.php';


    if (verifyEntry($userPseudo, $userMail, $userPassword) !== false) {
        echo "<script>window.location.href='../templates/register.php?error=emptyfields'</script>";
        exit();
    }

    if (invalidMail($userMail) !== false) {
        echo "<script>window.location.href='../templates/register.php?error=invalidmail'</script>";
        exit();
    }

    if (invalidPseudo($userPseudo) !== false) {
        echo "<script>window.location.href='../templates/register.php?error=invalidpseudo'</script>";
        exit();
    }

    if (verifyPassword($userPassword, $userPasswordRepeat) !== false) {
        echo "<script>window.location.href='../templates/register.php?error=passwordsdontmatch'</script>";
        exit();
    }

    if (userExist($userPseudo) !== false) {
        echo "<script>window.location.href='../templates/register.php?error=useralreadyexist'</script>";
        exit();
    }


    $user->createUser($userPseudo, $userMail, $userPassword);

    echo "<script>window.location.href='../templates/login.php'</script>";

}
