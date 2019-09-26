<?php 
require_once("entity/User.php");
require_once("dao/UserSqlDao.php");
require_once("template/TemplateManager.php");

session_start();

$message = NULL;
if ( isset($_REQUEST['email'], $_REQUEST['password']) ) {

	$userDao = new UserSqlDao();
	$user = new User();

	$user->email = $_REQUEST['email'];
	$user->password = $_REQUEST['password'];

	//print_r($user);

	$loginResult = $userDao->checkLogin($user);

	//print_r($user);

	if ( ! $loginResult) {
		$message = "Erreur de login, merci de réessayer ";
	} else {
		$_SESSION['user'] = $user;
		header('Location: list.php');
	}
	
}

$templateManager = new TemplateManager();
$templateManager->render("login", [
	'message' => $message
]);

?>
