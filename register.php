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
    <title>Inspiration - Register</title>
</head>
<body>
    <a href="index.php">Go back</a>
    <form action="include/register.inc.php" method="post">
        <h1>Sign up</h1>
        <input type="text" name="name" id="name" placeholder="Full Name"><br/>
        <input type="email" name="email" id="email" placeholder="Email"><br/>
        <input type="password" name="password" id="password" placeholder="Password"><br/>
        <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat password"><br/>
        <input type="submit" value="register" name="register">
    </form>
    <a href="login.php">Do you have an account?</a>
</body>
</html>