<?php 
session_start();

$user = 'root';
$pass = 'root';

$host = 'localhost';
$db   = 'hello_series';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$pdo = new PDO($dsn, $user, $pass);

if ( isset($_REQUEST['email'], $_REQUEST['password']) ) {


	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];

	$sql = "SELECT id FROM user WHERE email='$email' AND password = '$password'";

	$queryResult = $pdo->query($sql);
	$line = $queryResult->fetch(PDO::FETCH_ASSOC);

	if ( ! $line) {
		$message = "Erreur de login, merci de réessayer ";
	} else {
		$id = $line['id'];
		
		$_SESSION['user_id'] = $id;
		$_SESSION['user_email'] = $email;

		header('Location: list.php');
		
	}
	
}

?>

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