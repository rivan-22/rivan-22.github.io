<?php
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $file = fopen("../users.txt", "a");
    fwrite($file, $username . "," . $password . "\n");
    fclose($file);

    $_SESSION['user'] = $username;
    header("Location: dashboard.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="register" value="Register">
        </form>
        <a href="login.php">Sudah punya akun? klik disini untuk login</a>
    </div>
</body>
</html>