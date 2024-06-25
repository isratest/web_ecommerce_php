<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp | Page.</title>
</head>
<body>
    <h1>This is SignUp | Page 🦾</h1>
    <form action="/dashboard" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="name">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname" placeholder="lastname">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password">
        <label for="birth">Birthday</label>
        <input type="date" name="birth" id="birth">
        <label for="address">address</label>
        <input type="text" name="address" id="address">
        <label for="phone">phone</label>
        <input type="number" name="phone" id="phone">

        <input type="text" name="creation" value="<?= date("Y-m-d H:i:s") ?>" hidden>
        <input type="hidden" value="post" name="method">

        <button type="submit">Send!</button>
    </form>
</body>
</html>