<head>
	<title>Profile - Project Sekolah</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?=$css?>

	<style>
		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 300px;
			margin: auto;
			text-align: center;
			font-family: arial;
		}

		.title {
			color: grey;
			font-size: 18px;
		}

		button {
			border: none;
			outline: 0;
			display: inline-block;
			padding: 8px;
			color: white;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
		}

		a {
			text-decoration: none;
			font-size: 22px;
			color: black;
		}

		button:hover,
		a:hover {
			opacity: 0.7;
		}

	</style>
	<?=$js?>
</head>
<?=$nav?>


<div class="card">
	<img src="https://www.blackxperience.com/assets/img-bx-technews/9336-420-facebook-ceo-mark-zuckerberg-600x600.jpg"
		alt="John" style="width:100%">
		
	<h1><?= ucfirst(strtok($_SESSION['uid'],'.'))?></h1>
	<p class="title">Student</p>
	<p>Sekolah UAS</p>
	<div style="margin: 24px 0;">
		<!-- <a href="#"><i class="fa fa-dribbble"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-facebook"></i></a> -->
	</div>
	<p><button>Edit Profile</button></p>
</div>
