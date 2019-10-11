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
			<!--p class="note"><?php echo $show->note; ?></p-->

			<div class="noteComponent">
				<p>note : 
					<?php for($n=0; $n<=3; $n++): ?>
						<?php 
						$class = ($n == $show->note) ? 'selected' : '';

						$params = [
							'ctrl' => 'note',
							'show' => $show->id,
							'note' => $n
						]; ?>

						<a class="<?php echo $class ?>" href="index.php?<?php echo http_build_query($params) ?>"><?php echo $n; ?></a>
					<?php endfor; ?>
				</p>
			</div>

		</article>
	<?php endforeach; ?>
	</section>

	<p>&copy; 2019</p>

	<script type="text/javascript" src="module-note.js"></script>
</body>
</html>