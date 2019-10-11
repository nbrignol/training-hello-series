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

	public function listMyShows(User $user) {
		$sql = "SELECT id, label, show_user_note.note 
				FROM `show` 
				LEFT JOIN show_user_note ON `show`.id = show_user_note.id_show AND show_user_note.id_user = :user_id
				WHERE show_user_note.note is not null
				ORDER BY show_user_note.note DESC";

		$query = $this->pdo->prepare($sql);
		$query->bindParam(':user_id', $user->id);
		$queryResult = $query->execute();
		
		$result = [];

		if (! $queryResult) {
			return $result;
		}

		while($line = $query->fetch(PDO::FETCH_ASSOC)){
			$show = new Show();
			$show->id = $line['id'];
			$show->label = $line['label'];
			$show->note = $line['note'];
			//

			$result[] = $show;			
		}

		return $result;
	}

	public function listReco(User $user) {
		$sql = "select `show`.id, `show`.label, 
sum(notation_tag.notation_tag_note) as show_note
from `show`
left join show_tag  on show_tag.id_show = `show`.id 
left join show_user_note on show_user_note.id_show = `show`.id and  show_user_note.id_user = :user_id  
left join (
        select 
        tag.id as notation_tag_id,
        sum(show_user_note.note) as notation_tag_note
        from show_user_note
        left join `show` on `show`.id = show_user_note.id_show         
        left join show_tag on show_tag.id_show = `show`.id
        left join tag on tag.id = show_tag.id_tag
        where id_user = :user_id
        group by tag.id
        order by notation_tag_note DESC
) as notation_tag on show_tag.id_tag = notation_tag.notation_tag_id
where show_user_note.id_show is  null
group by `show`.id
order by show_note DESC";

		$query = $this->pdo->prepare($sql);
		$query->bindParam(':user_id', $user->id);
		$queryResult = $query->execute();
		
		$result = [];

		if (! $queryResult) {
			return $result;
		}

		while($line = $query->fetch(PDO::FETCH_ASSOC)){
			$show = new Show();
			$show->id = $line['id'];
			$show->label = $line['label'];
			
			$result[] = $show;			
		}

		return $result;
	}
}

