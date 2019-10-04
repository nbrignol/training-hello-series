<?php 

$dao = new ShowSqlDao();
$list = $dao->listMyShows();

$templateManager = new TemplateManager();
$templateManager->render("list", [
	'shows' => $list
]);

?>


