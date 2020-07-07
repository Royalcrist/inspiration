<?php

if(isset($_POST['login'])) {

    require 'dbh.inc.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../login.php?error=empty&email=$email" );
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login.php?error=invalidEmail" );
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlError" );
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $hashPwd = password_verify($password, $row['pwd']);

                if($hashPwd == false) {
                    header("Location: ../login.php?error=wrongPassword" );
                    exit();
                }
                else if ($hashPwd == true){
                    session_start();
                    $_SESSION['email'] = $row['email'];

                    header("Location: ../index.php" );
                    exit();
                }
                else {
                    header("Location: ../login.php?error=wrongPassword" );
                    exit();
                }
            }
            else {
                header("Location: ../login.php?error=noUser" );
                exit();
            }
        }
    }

}

else {
    header("Location: ../login.php" );
}