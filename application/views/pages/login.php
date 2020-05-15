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
	<div class="bg">
		<?= form_open('login/validator')?>
		<div class="grid-container login fluid">
			<form>
			<div class="login-form">
				<h2 class="text-center">Login</h2>
				
				<label>Email / Username</label>
				<input type="text" name="email" placeholder="example@school.com">
				<?= form_error('email','<p class="help-text" style="color:red">','</p>'); ?>

				<label>Password</label>
				<input type="password" name="pass" placeholder="Password">
				<?= form_error('pass','<p class="help-text" style="color:red">','</p>'); ?>

				<?php if(isset($invalid)):?>
				<p class="text-center" style="color:red">Invalid Email or Password </p>
				<?php endif;?>

				<button type="submit" class="button expanded" name="login">Login</button>
				<p class="text-center">Not a user ? <?=anchor('register', 'Register Here')?></p>
				</div>
			</form>
		</div>
		<?= form_close()?>
	</div>

	<footer>
		
	</footer>

	<script type="text/javascript" href="<?= base_url('assets/js/vendor/jquery.js')?>"></script>
	<script type="text/javascript" href="<?= base_url('assets/js/vendor/what-input.js')?>"></script>
	<script type="text/javascript" href="<?= base_url('assets/js/vendor/foundation.min.js')?>"></script>
	<script>
		$(document).foundation();

	</script>
</body>

</html>
