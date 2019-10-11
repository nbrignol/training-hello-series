<?php 

if (! isset($_SESSION['user'])){
	header('Location: index.php?ctrl=login');
	exit;
}

$currentUser = $_SESSION['user'];

$dao = new ShowSqlDao();
//$list = $dao->listAll();
//$list = $dao->listReco($currentUser);
$list = $dao->listMyShows($currentUser);


$templateManager = new TemplateManager();
$templateManager->render("list", [
	'shows' => $list
]);

?>


