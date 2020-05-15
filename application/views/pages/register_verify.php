<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="<?=base_url('assets/css/foundation.css')?>" />
	<link rel="stylesheet" href="<?=base_url('assets/css/main.scss')?>" />

</head>

<body>
	<div class="bg">
		<?= form_open('register/validator')?>
		<div class="grid-container login fluid">
			<form>
				<div class="login-form">
					<h2 class="text-center">Register</h2>

                    <?php if(!isset($role)):?>
					<label>Role</label>
					<select class="roles" name="role">
						<option value='Admin'>Admin</option>
						<option value='Teacher'>Teacher</option>
						<option value='Student'>Student</option>
					</select>
                    <?php endif;?>

					<?php if(isset($role)):?>

					<div class="grid-x">
						<div class="medium-6 cell">
							<label>First Name
								<input type="text" placeholder="First Name">
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Last Name
								<input type="text" placeholder="Last Name">
							</label>
						</div>
					</div>
                    <?= form_error('firstname','<p class="help-text" style="color:red">','</p>') ?>

					<!-- <label>Username</label>
					<div class="input-group">
						<input class="input-group-field" type="text" name="username" placeholder="Username">
						<span class="input-group-label" id="spanemail" style="color: grey">@school.admin.com</span>
					</div>
					<?= form_error('username','<p class="help-text" style="color:red">','</p>') ?>


					<label>Password</label>
					<input type="password" name="pass" placeholder="Password">

					<label>Confirm Password</label>
					<input type="password" name="confpass" placeholder="Confirm Password">

					<?= form_error('pass','<p class="help-text" style="color:red">','</p>') ?> -->
                    <?php endif;?>

					<div class="expanded button-group center">
						<button type="submit" class="button" name="next">Next</button>
						<button type="submit" class="alert button" name="cancel">Cancel</button>
					</div>

				</div>
			</form>
		</div>
	</div>

	<!-- <script type="text/javascript" href="<?= base_url('assets/js/vendor/jquery.js')?>"></script>
	<script type="text/javascript" href="<?= base_url('assets/js/vendor/what-input.js')?>"></script>
    <script type="text/javascript" href="<?= base_url('assets/js/vendor/foundation.min.js')?>"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/what-input/4.2.0/what-input.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.1/js/foundation.min.js"></script>
	<script>
		$(document).foundation();
		$(document).ready(function () {
			$("select.roles").change(function () {
				var selRole = $(this).children("option:selected").val();
				if (selRole == 'Admin') {
					$("#spanemail").text('@school.admin.com');
				} else if (selRole == 'Teacher') {
					$("#spanemail").text('@school.teacher.com');
				} else $("#spanemail").text('@school.student.com');
			});
		});

	</script>

</body>

</html>
