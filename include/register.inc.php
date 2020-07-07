<?php

if(isset($_POST['register'])) {

    require "dbh.inc.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat-password'];


    if (empty($name) || empty($email) || empty($password) || empty($repeatPassword)) {
        header("Location: ../register.php?error=empty&email=$email" );
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=invalidEmail" );
        exit();
    }
    else if ($password != $repeatPassword) {
        header("Location: ../register.php?error=invalidPassword&email=$email" );
        exit();
    }
    else {
        $sql = "SELECT email FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlError" );
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $result_check = mysqli_stmt_num_rows($stmt);

            if ($result_check > 0) {
                header("Location: ../register.php?error=userTaken&email=$email" );
                exit();
            }
            else {
                $sql = "INSERT INTO users ( name, email, pwd) VALUES (?,?,?);";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=sqlError" );
                    exit();
                }
                else {
                    $hash_password = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hash_password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success" );
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header("Location: ../register.php" );
    exit();
}

