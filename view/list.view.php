<!DOCTYPE html>
<html>
<head>
	<title>Liste des séries - HelloSeries</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>HelloSeries</h1>

	<section class="showList">
	<?php foreach($shows as $show): ?>
		<article class="show">
			<h2 class="title"><?php echo $show->label; ?></h2>
			<p class="note"><?php echo $show->note; ?></p>
		</article>
	<?php endforeach; ?>
	</section>

	<p>&copy; 2019</p>

</body>
</html>