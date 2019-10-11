<?php 

class NoteSqlDao {
	
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

	public function updateNote($noteValue, Show $show, User $user) {
		$sql = "replace show_user_note (id_show, id_user, note) VALUES (:show_id, :user_id, :note) ";

		$query = $this->pdo->prepare($sql);
		$query->bindParam(':user_id', $user->id);
		$query->bindParam(':show_id', $show->id);
		$query->bindParam(':note', $noteValue);

		$queryResult = $query->execute();
		
		return $queryResult ? true : false;
	}
}

