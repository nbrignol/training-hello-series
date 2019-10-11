<?php 

require_once("entity/User.php");
require_once("entity/Show.php");
require_once("dao/NoteSqlDao.php");
require_once("dao/UserSqlDao.php");
require_once("dao/ShowSqlDao.php");
require_once("template/TemplateManager.php");

session_start();

$controller = 'login';

if (isset($_REQUEST['ctrl'])) {
	$controller = $_REQUEST['ctrl'];

	if (!file_exists("ctrl/$controller.php")){
		$controller = 'error404';
	}

} 

include("ctrl/$controller.php");