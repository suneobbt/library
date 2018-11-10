<!DOCTYPE html>
<?php
session_cache_limiter ('nocache,private');
session_start();
session_name($_GET['sessionName']);

if	(session_id()!= $_GET['id']){
		header ("Location:http://localhost/library/index.php?mser=801");
	}
?>

<html>
	
	<head>
		<title>The Library - User Page</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
		
	<body>
		<header>
			<h1><a href="index.php">The Library</a></h1>
			<h2>Where knowledge occupies place</h2>
		</header>
		
		<nav>Link1	|	Link2	|	Link3	|	Link4</nav>
		
		<main>
			<!-- Aside 1(left top) for tools acces -->
			<aside id="ad1">
                <?php include('extendedUser_toolsMenu.inc');?>
			</aside>

			<!-- Aside 2(right top) for login -->
            <aside id="ad2">
                <?php include ('loggedInAs.inc') ?>
            </aside>

			<section>
                <?php include('extendedUser_section.inc')?>
			</section>
        </main>
		
		<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>
		
	</body>
	
</html>
