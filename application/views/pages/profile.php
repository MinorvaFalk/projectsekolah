<?php
function checkEdit(){
	if($_SESSION['role'] == 'G'){
		echo site_url('teacher/menu/editprofile');
	}else echo site_url('student/menu/editprofile');
}
?>

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

		/* a {
			text-decoration: none;
			font-size: 20px;
			color: black;
		} */

		button:hover,
		a:hover {
			opacity: 0.7;
		}

	</style>
	<?=$js?>
</head>
<?=$nav?>

<br>
<div class="card">
	<img src="https://www.booksie.com/files/profiles/22/mr-anonymous.png" alt="John" style="width:100%">
	<br>
	<h4><?=$info['first_name']." ".$info['last_name']?></h4>

	<?php if($_SESSION['role'] == 'S'){?>
	
	<p class="title">Student</p>
	<p>NIS : <?=$info['id_siswa']?></p>
	<p>Kelas : <?=$info['id_kelas']?></p>

	<?php }else{?>

	<p class="title">Teacher</p>
	<p>NIS : <?=$info['id_pengajar']?></p>
	<p>Wali Kelas : <?=$info['nama_kelas'].' '.$info['id_kelas']?></p>

	<?php } ?>
	<a href="<?php checkEdit()?>"><button>Edit Profile</button></a>
</div>
