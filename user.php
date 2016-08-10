<?php 
class User{
	function __construct($db_conn){
		$this->DB = $db_conn;
		session_start();
	}

	function login($username,$password){
		try {
			$data = $this->DB->show("SELECT * FROM user WHERE username=? AND password=?", [$username,$password]);
			if ($data) {
				$_SESSION['user_session'] = $data['id'];
				$_SESSION['level'] = $data['level'];
				return TRUE;
			}else{
				return FALSE;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
			return FALSE;
		}
	}

	function register($username,$email,$password,$level){
		if ($this->DB->show("SELECT username FROM user WHERE username=?", [$username])) {
			return FALSE;
		}else{
			$this->DB->exec("INSERT INTO user (username,email, password, level) VALUES (?,?,?,?)",[$username,$email,$password,$level]);
			return TRUE;
		}
	}

}


 ?>