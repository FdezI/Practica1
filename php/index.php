<?php
	require_once("config.php");
	require_once("includes/class/bdaccess.class.php");
	include_once("includes/class/sessions.class.php");
	include_once("includes/functions.inc.php");
	if(isset($_POST['op'])) include_once("operations/" . $_POST['op'] . ".php");
	if(isset($_POST['username']) && isset($_POST['password'])){
		Session::connect($_POST['username'], $_POST['password']);
	}
	else if(isset($_POST['logout'])) Session::disconnect();
?>

<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Periódico Digital</title>
		<meta name="author" CONTENT="Iñaki Fernández Janssens de Varebeke"/>
		<link rel="STYLESHEET" href="MyCss.css">
		<script src="functions.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head>
	<body>
		<header id="wrap-module-top">
			<img src="adds/bannertop.jpg" />
		</header>
		<aside id="wrap-module-left">
			<?php
				if($_GET['view'] != "registration"){
					echo '<div class="module">';
					include_once("includes/modules/session_mod.inc.php");
					echo '</div>';
				}
			?>
			<div class="module">
				<img src="adds/bannerleft.gif" />
			</div>
		</aside>
		<aside id="wrap-module-right">
			<div class="module">
				<img src="adds/bannerright.jpg" />
			</div>
		</aside>
		
		<div id="mainsite">
			<?php include_once("includes/title.inc.html"); ?>
			<?php include_once("includes/menu.inc.html"); ?>
			<div id="mainbody">
				<?php
					if(isset($_GET['view'])) include_once("views/" . $_GET['view'] . ".php");
					else
						include_once("views/home.php");
				?>
			</div>
			<?php include_once("includes/feet.inc.html"); ?>
			<?php include("includes/bdaccess.inc.php"); ?>
		</div>
	</body>

</html>
