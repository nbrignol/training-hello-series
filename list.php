<?php 
session_start();

if (isset($_SESSION['user_id'], $_SESSION['user_email'])) {
	$id = $_SESSION['user_id'];
	$email = $_SESSION['user_email'];
	echo "Vous êtes connecté en tant que $email (#$id)";
} else {
	echo "Vous n'êtes pas connecté";
}

?>


