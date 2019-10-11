<?php 

if (! isset($_SESSION['user'])){
	header('Location: index.php?ctrl=login');
	exit;
}

if (! isset($_REQUEST['note'], $_REQUEST['show'])){
	header('Location: index.php?ctrl=list');
	exit;
}

$currentUser = $_SESSION['user'];

$show = new Show();
$show->id = $_REQUEST['show'];

$dao = new NoteSqlDao();
$dao->updateNote($_REQUEST['note'], $show, $currentUser);


header('Location: index.php?ctrl=list');
exit;
?>


