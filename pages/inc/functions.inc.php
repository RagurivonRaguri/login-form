<?php

function emptyInputSignup($name, $email, $username, $password, $pwdrepeat){
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($pwdrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
};

function isValidUsername($username) {
    return preg_match("/^[a-zA-Z0-9]*$/", $username);
}

function InvalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password, $pwdrepeat) {
    if ($password !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=usernameExists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultsData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }
}

function createUser($conn, $name, $email, $username, $password) {
    // Insert user into the database
    $sql = "INSERT INTO users (usersName, usersEmail, usersUsername, usersPassword) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?signup=success");
    exit();
}

function emptyInputLogin($username, $password){
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password){
     $usernameExists = usernameExists($conn, $username, $username);

     if ($usernameExists === false) {
        header("location: ../login.php?error=wronglogindetails");
        exit();
     }

     $pwdHashed = $usernameExists["usersPassword"];
     $checkPassword = password_verify($password, $pwdHashed);

     if ($checkPassword === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
     } else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"]= $usernameExists["usersId"];
        $_SESSION["username"]= $usernameExists["usersUsername"];

        header("location: ../home.php?error=none");
        exit();
     }
}


