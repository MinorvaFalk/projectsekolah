<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/foundation.css')?>" />
	<link rel="stylesheet" href="<?=base_url('assets/css/main.scss')?>" />

</head>

<!-- 
Jika mau styling selalu ingat :
    Email => name="email"
    Password => name = "pass"
    Submit => name="submit" 
-->

<body>

	<?= form_open('login/validator')?>
    <img src="https://images.pexels.com/photos/373488/pexels-photo-373488.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
	<div class="grid-container login fluid">
		<form>
			<h2 class="text-center">Login</h2><hr>
			<label>Email</label>
			<input type="text" name="email" placeholder="example@school.com">
			<?= form_error('email','<p class="help-text"','</small>'); ?>

			<label>Password</label>
			<input type="password" name="pass" placeholder="Password">
			<?= form_error('pass','<small style="color:red";>','</small>'); ?>

			<?= form_error('invalid','<small style="color:red";>','</small>'); ?>

			<button type="submit" class="button expanded" name="login">Login</button>

			<p class="text-center">Not a user ? <?=anchor('register', 'Register Here')?></p>
			<!-- <button type="submit" class="button" name="register">Register</button> -->
		</form>
	</div>
    <?= form_close()?>
    
    <footer></footer>

	<script type="text/javascript" href="<?= base_url('assets/js/vendor/jquery.js')?>"></script>
	<script type="text/javascript" href="<?= base_url('assets/js/vendor/what-input.js')?>"></script>
	<script type="text/javascript" href="<?= base_url('assets/js/vendor/foundation.min.js')?>"></script>
	<script>
		$(document).foundation();

	</script>
</body>

</html>
