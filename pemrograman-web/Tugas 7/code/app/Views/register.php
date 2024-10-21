<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form method="post" action="/auth/registerAction">
        <label>NPM:</label>
        <input type="text" name="npm" required>
        <br>
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Register</button>
    </form>
    <br>
    <a href="/login">Sudah punya akun? Login di sini</a>
</body>
</html>
