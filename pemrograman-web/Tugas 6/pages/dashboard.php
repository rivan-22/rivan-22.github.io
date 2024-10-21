<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Selamat datang, <?php echo $_SESSION['user']; ?>!</h1>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>