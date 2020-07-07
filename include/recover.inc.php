<?php

if (isset($_POST['recover'])) {
    
    require 'dbh.inc.php';

    $email = $_POST['email'];
    $expire = date('U') + 600;
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "localhost/login-test/create-new-password.php?selector=$selector&validator=" . bin2hex($token);

    if (empty($email)) {
        header("Location: ../recover.php?error=emptyEmail" );
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../recover.php?error=databaseError" );
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (!$row = mysqli_fetch_assoc($result)) {
                header("Location: ../recover.php?error=noUser" );
                exit();
            }
            else {
                $sql = "INSERT INTO recover (recoverEmail, recoverSelector, recoverValidator, recoverExpires) VALUES (?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../recover.php?error=databaseError" );
                    exit();
                }
                else {
                    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, 'ssss', $email, $selector, $hashedToken, $expire);
                    mysqli_stmt_execute($stmt);
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close();

    require 'mailServer.inc.php';

    //Recipients
    $mailServer->addAddress($email);

    //content
    $mailServer->isHTML(true);
    $mailServer->Subject = 'Reset your password on Test.com';
    $mailServer->Body    = '<p>This is your link to your password recovery:</p><br/>';
    $mailServer->Body    .= '<a href="'. $url . '">'. $url .'</a>';
    $mailServer->AltBody = "This is your link to your password recovery: $url";



    //send the message, check for errors
    if (!$mailServer->send()) {
        header("Location: ../recover.php?error=" . $mailServer->ErrorInfo );
    } else {
        header("Location: ../index.php?recover=success" );
    }
    
    exit();
}
else {
    header("Location: ../recover.php" );
}