<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/semantic.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/main.scss')?>">
</head>

<body class="bg">
	<div class="ui raised segment login">
		<?= form_open('login/validator',array('class' => 'ui error form'))?>

		<h1 class="ui center aligned header">LOGIN</h1>

		<div class="field">
			<label>Email / Username</label>
			<input type="text" name="email" placeholder="example@school.com">
		</div>
		<!-- <?= form_error('email','<label style="color:red">','</label>'); ?> -->

		<div class="field">
			<label>Password</label>
			<input type="password" name="pass" placeholder="Password">
		</div>

		<!-- <?= form_error('pass','<p class="help-text" style="color:red">','</p>'); ?> -->

		<div class="ui error message"></div>

		<?php if(isset($invalid)):?>
		<div class="ui error message">
			<div class="header">Invalid Username or Password</div>
		</div>
		<?php endif;?>

		<button class="fluid green ui button" name="login" type="submit">Login</button>
		<h3 class="ui center aligned header">Not a user ? <?=anchor('register', 'Register Here')?></h3>

		<?= form_close()?>

		</>

		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="<?=base_url('/assets/js/semantic.js')?>"></script>
		<script>
			$('.ui.form')
				.form({
					fields: {
						email: 'empty',
						pass: 'empty'
					}
				});
			$('.ui.raised.segment.login')
				.transition({
					animation: 'fade in',
					duration: '1s'
				})

		</script>
</body>

</html>
