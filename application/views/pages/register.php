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

					<label>Role</label>
					<select class="roles" name="role">
                        <option value=''>Select Role</option>
						<option value='Admin'>Admin</option>
						<option value='Teacher'>Teacher</option>
						<option value='Student'>Student</option>
					</select>

					<div class="grid-x">
						<div class="medium-6 cell">
							<label>First Name
								<input type="text" name="fname" placeholder="First Name">
							</label>
						</div>
						<div class="medium-6 cell">
							<label>Last Name
								<input type="text" name="lname" placeholder="Last Name">
							</label>
						</div>
					</div>
					<?= form_error('fname','<p class="help-text" style="color:red">','</p>') ?>

					<label>Contact</label>
					<div class="input-group">
						<span class="input-group-label" style="color: grey">+62</span>
						<input class="input-group-field" type="text" name="contact" placeholder="8xxxxxx">
					</div>
					<?= form_error('contact','<p class="help-text" style="color:red">','</p>') ?>

					<label>Address</label>
					<textarea name="address" placeholder="Address"></textarea>
					<?= form_error('address','<p class="help-text" style="color:red">','</p>') ?>

					<?php if(isset($invalid)):?>
					<p class="text-center" style="color:red">Invalid Email or Password </p>
					<?php endif;?>

					<div class="expanded button-group center">
						<button type="submit" class="button" name="submit">Next</button>
						<button type="submit" class="alert button" name="cancel">Cancel</button>
					</div>
				</div>
			</form>
			<?= form_close()?>

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
					$("#spanemail").text('@admin.school.com');
				} else if (selRole == 'Teacher') {
					$("#spanemail").text('@teacher.school.com');
				} else $("#spanemail").text('@student.school.com');
			});
		});

		// function hideElements() {
		// 	var x = document.getElementById("hidden");
		// 	if (x.style.display === "none") {
		// 		x.style.display = "block";
		// 	} else {
		// 		x.style.display = "none";
		// 	}
		// }

	</script>

</body>

</html>
