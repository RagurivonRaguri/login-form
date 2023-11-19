<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $password, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    if (InvalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (!isValidUsername($username)) {
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    if (pwdMatch($password, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (usernameExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernameExists");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);
    
}
else {
    header("location: ../signup.php");
}

?>