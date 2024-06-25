<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Page.</title>
</head>
<body>
    <h1>This is Login | Page 🦾</h1>
    <?php if(isset($_SESSION["name"])): ?>
        <form action="/dashboard/logout" method="post">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $_SESSION["email"]?>" disabled>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="*********" disabled>
            <button type="submit">¡Log out!</button>
        </form>
    <?php else:?>
        <form action="/dashboard" method="post">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="password">
            <input type="hidden" value="user_post" name="method">
            <button type="submit" >¡Log in!</button>
        </form>
    <?php endif; ?>



</body>
</html>