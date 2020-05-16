<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/semantic.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/main.scss')?>">

</head>

<body class="bg">
	<div class="ui raised segment login">
		<?= form_open('register/validator',array('class' => 'ui error form'))?>

		<h1 class="ui center aligned header">REGISTER</h1>

		<div class="two fields">
			<div class="field">
				<label>First Name</label>
				<input type="text" id="firstname" name="fname" placeholder="First Name">
			</div>
			<div class="field">
				<label>Last Name</label>
				<input type="text" id="lastname" name="lname" placeholder="Last Name">
			</div>
		</div>

		<div class="field disabled">
			<label>Email</label>
			<input type="text" id="email" placeholder="Email Address" name="email">
		</div>

		<div class="field">
			<label>Password</label>
			<input type="password" placeholder="Password" name="pass">
		</div>

		<div class="field">
			<label>Contact</label>
			<div class="ui labeled input">
				<div class="ui label">
					+62
				</div>
				<input type="text" name="contact" placeholder="Phone Number">
			</div>
		</div>

		<div class="field">
			<label>Address</label>
			<textarea name="address" rows="2"></textarea>
		</div>

		<div class="ui error message"></div>

		<div class="ui center aligned container">
			<div class="ui buttons">
				<button type="submit" class="ui positive button" name="submit">Next</button>
				<div class="or"></div>
				<?=anchor(base_url(), 'Back',array('class' => 'ui red button'))?>
			</div>
		</div>
		<?= form_close()?>
	</div>

	<!-- Modal -->
	<div class="ui mini modal">
		<div class="header">
			Select Role
		</div>
		<div class="content">
			<?= form_open('',array('class' => 'ui error form'))?>
			<div class="ui center aligned container">
				<div class="field">
					<label>Role</label>
					<select id="select" class="roles" name="role">
						<option value=''>Select Role</option>
						<option value='Admin'>Admin</option>
						<option value='Teacher'>Teacher</option>
						<option value='Student'>Student</option>
					</select>
				</div>
				<div class="ui close yellow fluid button">Next</div>
				<h3 class="ui center aligned header">Already Registered ? Check
					<?=anchor('register/register_user', 'Here')?></h3>
				<!-- <?=anchor(base_url(),'Back to Login',array('class' => 'ui yellow fluid button'))?> -->
			</div>
			<?= form_close()?>
		</div>
	</div>
	<!-- Modal -->

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="<?=base_url('/assets/js/semantic.js')?>"></script>
	<script>
		$(document).ready(function () {
			$("#select").change(function () {
				$('.ui.mini.modal').modal('attach events', '.ui.close.yellow', 'hide')
				var selRole = $(this).children("option:selected").val();
				if (selRole == 'Admin') {
					var email = '@admin.school.com';
				} else if (selRole == 'Teacher') {
					var email = '@teacher.school.com';
				} else var email = '@student.school.com';

				$("#email").val(email);
				$("#firstname").keyup(function () {
					var txt = $(this).val().toLowerCase();
					$("#email").val(txt + email);
					$("#lastname").keyup(function () {
						var txt1 = $(this).val().toLowerCase();
						var lname = txt1.replace(/ .*/, '');
						if (txt1 === '') {
							$("#email").val(txt + email);
						} else $("#email").val(txt + '.' + lname + email);
					})
				})
			});
		});
		$('#select')
			.dropdown();
		$('.ui.form')
			.form({
				fields: {
					role: 'empty',
					fname: 'empty',
					pass: ['empty', 'minLength[8]'],
					contact: ['minLength[10]', 'maxLength[11]', 'number', 'empty'],
					address: 'empty'
				}
			});
		$('.ui.mini.modal')
			.modal({
				closable: false,
				blurring: true
			})
			.modal('show')

		$('.ui.raised.segment.login')
			.transition({
				animation: 'fade in',
				duration: '1s'
			})

	</script>

</body>

</html>
