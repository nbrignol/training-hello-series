<?php 

$isFromAjax = isset($_SERVER['HTTP_IS_FROM_AJAX']);

if (! isset($_SESSION['user'])){

	if ($isFromAjax) {
		echo "NOK";
		exit;
	} else {
		header('Location: index.php?ctrl=login');
		exit;
	}
}

if (! isset($_REQUEST['note'], $_REQUEST['show'])){

	if ($isFromAjax) {
		echo "NOK";
		exit;
	} else {
		header('Location: index.php?ctrl=list');
		exit;
	}

}

$currentUser = $_SESSION['user'];

$show = new Show();
$show->id = $_REQUEST['show'];

$dao = new NoteSqlDao();
$dao->updateNote($_REQUEST['note'], $show, $currentUser);


if ($isFromAjax) {
	echo "OK";
} else {
	header('Location: index.php?ctrl=list');
	exit;
}


?>


