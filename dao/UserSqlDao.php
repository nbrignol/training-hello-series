<?php 

class UserSqlDao {
	
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

	public function checkLogin(User $user) {
		$email = $user->email;
		$password = $user->password;
		
		$sql = "SELECT id FROM user WHERE email='$email' AND password = '$password'";

		$queryResult = $this->pdo->query($sql);
		$line = $queryResult->fetch(PDO::FETCH_ASSOC);

		if ( ! $line) {
			return false;
		}

		$user->id = $line['id'];
		$user->password = null;
		
		return true;

	}
}

