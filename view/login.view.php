<!DOCTYPE html>
<html>
<head>
	<title>Login - HelloSeries</title>
</head>
<body>
	<h1>Login HelloSeries</h1>

	<form method="POST" action="">
		<p><label>Votre E-mail</label><input type="text" name="email" /></p>

		<p><label>Votre mot de passe</label><input type="password" name="password" /></p>

		<p><input type="submit"></p>
	</form>

	<?php if (isset($message)): ?>
	<p><?php echo $message; ?></p>
	<?php endif; ?>

	<p>&copy; 2019</p>

</body>
</html>