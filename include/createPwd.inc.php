<?php 

if(isset($_POST['createPwd'])) {

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat-password'];

    if ( empty($password) || empty($repeatPassword)) {
        header("Location: ../create-new-password.php?error=emptyPassword&selector=$selector&validator=$validator" );
        exit();
    }
    else if ($password != $repeatPassword) {
        header("Location: ../create-new-password.php?error=passwordNotMatch&selector=$selector&validator=$validator" );
        exit();
    }

    $currentDate = date('U');

    require "dbh.inc.php";

    $sql = "SELECT * FROM recover WHERE recoverSelector=? AND recoverExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);
        
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../create-new-password.php?error=resubmit" );
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, 'ss', $selector, $currentDate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            header("Location: ../create-new-password.php?error=resubmit" );
            exit();
        }
        else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['recoverValidator']);

            if (!$tokenCheck) {
                header("Location: ../create-new-password.php?error=resubmit" );
                exit();
            }
            else {
                $tokenEmail = $row['recoverEmail'];

                $sql = "SELECT * FROM users WHERE email=?;";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../create-new-password.php?error=resubmit" );
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($result)) {
                        header("Location: ../create-new-password.php?error=resubmit" );
                        exit();
                    }
                    else {
                        $sql = "UPDATE users SET pwd=? WHERE email=?;";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../create-new-password.php?error=resubmit" );
                            exit();
                        }
                        else {
                            $hash_password = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, 'ss', $hash_password, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM recover WHERE recoverEmail=?;";
                            $stmt = mysqli_stmt_init($conn);
    
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("Location: ../create-new-password.php?error=resubmit" );
                                exit();
                            }
                            else {
                                mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../index.php?newPwd=passwordUpdated" );
                            }
                        }
                    }
                }
            }
        }
    }


}
else {
    header("Location: ../index.php" );
    exit();
}