<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

<!-- 
Jika mau styling selalu ingat :
    Email => name="email"
    Password => name = "pass"
    Submit => name="submit" 
-->

<body>
    <h1>Login Page</h1>

    <?= form_open('login/validator')?>

    <label>Email</label>
    <input type="text" name="email">
    <?= form_error('email','<small style="color:red";>','</small>'); ?>

    <br>
    <label>Password</label>
    <input type="password" name="pass">
    <?= form_error('pass','<small style="color:red";>','</small>'); ?>

    <?= form_error('invalid','<small style="color:red";>','</small>'); ?>

    <br>
    <button type="submit" name="login">Login</button>
    <button type="submit" name="register">Register</button>

    <?= form_close()?>
</body>
</html>