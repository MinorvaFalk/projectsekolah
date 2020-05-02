<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<!-- 

-->
<body>
    
    <h1>Register Page</h1>
    <?= form_open('register/validator')?>

    <label>Email</label>
    <input type="text" name="email">
    <?= form_error('email','<small style="color:red";>','</small>') ?>

    <br>
    <label>Role</label>
    <select name="role">
        <?php foreach($roles as $row){?>

        <option value='<?=$row['roleid']?>'><?=$row['description']?></option>
        
        <?php }?>
    </select>

    <br>
    <label>Password</label>
    <input type="password" name="pass">
    <?= form_error('pass','<small style="color:red";>','</small>') ?>

    <br>
    <label>Confirm Password</label>
    <input type="password" name="confpass">
    <?= form_error('cpass','<small style="color:red";>','</small>') ?>

    <br>
    <button type="submit" name="submit">Submit</button>
    <button type="submit" name="cancel">Cancel</button>

</body>
</html>