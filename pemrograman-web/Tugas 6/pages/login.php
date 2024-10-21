<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $is_valid = false;
    
    $file = fopen("../users.txt", "r");
    while (($line = fgets($file)) !== false) {
        list($stored_user, $stored_pass) = explode(",", trim($line));
        if ($username == $stored_user && $password == $stored_pass) {
            $is_valid = true;
            break;
        }
    }
    fclose($file);

    if ($is_valid) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <a href="register.php">Don't have an account? Register</a>
    </div>
</body>
</html>