<?php 

class TemplateManager {

	public function render($templateName, $data){
		extract($data);
		include("view/$templateName.view.php");
	}

}