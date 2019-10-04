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

	public function listMyShows() {
		$sql = "SELECT id, label, show_user_note.note 
				FROM `show` 
				LEFT JOIN show_user_note ON `show`.id = show_user_note.id_show AND show_user_note.id_user = 1
				WHERE show_user_note.note is not null
				ORDER BY show_user_note.note DESC";

		$queryResult = $this->pdo->query($sql);
		
		$result = [];

		if (! $queryResult) {
			return $result;
		}

		while($line = $queryResult->fetch(PDO::FETCH_ASSOC)){
			$show = new Show();
			$show->id = $line['id'];
			$show->label = $line['label'];
			$show->note = $line['note'];
			//

			$result[] = $show;			
		}

		return $result;
	}
}

