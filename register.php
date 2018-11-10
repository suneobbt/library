<!DOCTYPE html>
<html>
	
	<head>
		<title>The Library</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	
	<body>
		<header>
			<h1>The Library</h1>
			<h2>Where knowledge occupies place</h2>
		</header>
		
		<nav>Link1	|	Link2	|	Link3	|	Link4</nav>
		
		<main>
            <!-- Aside 1(left top) for notes -->
            <aside id="ad1">
                aside 1
            </aside>

            <!-- Aside 2(right top) for login -->
			<aside id="ad2">
                aside 2
			</aside>
			
			<section>
                <?php include('registerForm.php');?>
			</section>

			
		</main>
		<footer class="nofloat">@2018 The Library. \/ Design by A.Babot</footer>
	</body>
</html>
