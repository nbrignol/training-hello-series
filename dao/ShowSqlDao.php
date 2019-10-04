<?php 

class ShowSqlDao {
	
	protected $pdo;

	public function __construct() {

		$user = 'root';
		$pass = 'root';

		$host = 'localhost';
		$db   = 'hello_series';
		$charset = 'utf8';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

		$this->pdo = new PDO($dsn, $user, $pass);
	}	

	public function listAll() {
		
		$sql = "SELECT id, label FROM `show` ORDER BY label ASC";
		$queryResult = $this->pdo->query($sql);
		
		$result = [];

		if (! $queryResult) {
			return $result;
		}

		while($line = $queryResult->fetch(PDO::FETCH_ASSOC)){
			$show = new Show();
			$show->id = $line['id'];
			$show->label = $line['label'];
			//

			$result[] = $show;			
		}

		return $result;

	}
}

