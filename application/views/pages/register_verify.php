<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/semantic.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('/assets/css/main.scss')?>">

</head>

<body class="bg">
	<!-- Modal -->
	<div class="ui modal">
		<div class="header">
			Search Approval
		</div>
		<div class="content">
		<?= form_open('',array('class' => 'ui error form'))?>
			<div class="ui center aligned container">
				<div class="field">
					<div class="ui action input">
						<input id="search_text" name="search_text" type="text" placeholder="Search name...">
						<div class="ui button">Search</div>
					</div>
				</div>
				<div id="result" class='ui center aligned container'></div>
			<div>

			</div>
			<?=anchor(base_url(),'Back to Login',array('class' => 'ui yellow fluid button'))?>
			</div>
		<?= form_close()?>
		</div>
	</div>
	<!-- Modal -->

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="<?=base_url('/assets/js/semantic.js')?>"></script>
	<script>
		$('#example1').progress();
		$('.ui.form')
			.form({
				fields: {
					role: 'empty',
					fname: 'empty',
					contact: ['minLength[10]', 'maxLength[11]', 'number', 'empty'],
					address: 'empty'
				}
			});
		$('.ui.modal')
			.modal({
				closable: false,
				blurring: true
			})
			.modal('show')

	</script>
	<script>
		$(document).ready(function () {

			load_data();
			function load_data(query){
				$.ajax({
					url:"<?=base_url('index.php/register/search')?>",
					method : "POST",
					data:{query,query},
					success:function(data){
						$('#result').html(data);
					}
				})
			}

			$('#search_text').keyup(function(){
				var search = $(this).val();
				if(search != ''){
					load_data(search);
				}else{
					load_data();
				}
			})
		});

	</script>

</body>

</html>
