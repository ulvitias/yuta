<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/asset/css/login/form-style.css" />
	<!-- Javascript -->
	<script type="text/javascript" src="/asset/javascript/color.js"></script>
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<!-- Jquery -->
	<script type="text/javascript" src="/asset/plugin/jquery/jquery.js"></script>
</head>
<!--  -->

<body>
	<header>
		<div class="kep1">

		</div>
		<div class="kep2">
			<div class="bad1"></div>

			<div class="bad2">
				<label class="switch" for="checkbox">
					<input type="checkbox" id="checkbox" onclick="toggleTheme()" />
					<div class="slider round"></div>
				</label>
			</div>

			<div class="bad3"></div>
		</div>
	</header>

	<div class="kotak1">
		<div class="kotak2">
			<div class="gambar">
				<img src="asset/img/Logo.png" />
			</div>
		</div>
		<!-- INI -->
		<div class="kotak21">
			<div class="form-time">
				<div class="kata">
					<h3>Masuk</h3>
				</div>
				<form action="Login/auth" method="post" id="form-noe">
					<div class="ussr">
						<input type="text" id="user" name="username" placeholder="Masukan ID" autocomplete="off">
					</div>
					<div class="ussr">
						<input type="password" id="pass" name="password" placeholder="Masukan Password">
					</div>
					<div class="btn">
						<input type="Submit" value="Masuk" id="submit">
					</div>
				</form>
			</div>
		</div>
		<!--INI -->
	</div>

	<footer>
		<div class="kaki1">

		</div>
		<div class="kaki21">
			<p>© 2020 All Right Reserved Yuta Project</p>
		</div>
	</footer>
</body>

</html>