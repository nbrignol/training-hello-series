<?php 
header("HTTP/1.0 404 Not Found");

$templateManager = new TemplateManager();
$templateManager->render("error404", []);

?>


