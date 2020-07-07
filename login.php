<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Inspiration - Sign in</title>
</head>
<body>
    <a href="index.php">Go back</a>

    <form action="include/login.inc.php" method="post">
        <h1>Sign in</h1>
        <input type="email" name="email" id="email" placeholder="Email"><br/>
        <input type="password" name="password" id="password" placeholder="Password"><br/>
        <input type="submit" value="Login" name="login">
    </form>

    <a href="recover.php">Forgot your password?</a>
    
    <a href="register.php">Sign up</a>

    <script src="./assets/js/index.js"></script>
</body>
</html>