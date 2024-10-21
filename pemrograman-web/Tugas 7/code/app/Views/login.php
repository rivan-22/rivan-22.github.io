<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form method="post" action="/auth/loginAction">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="/register">Belum punya akun? Register di sini</a> <!-- Tombol Register -->
</body>
</html>
