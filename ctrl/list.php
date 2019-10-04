<?php 

$dao = new ShowSqlDao();
$list = $dao->listAll();

$templateManager = new TemplateManager();
$templateManager->render("list", [
	'shows' => $list
]);

?>


