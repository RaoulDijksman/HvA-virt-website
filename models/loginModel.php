<?php

/**
* 
*/
class loginModel extends baseModel
{
	
	function __construct()
	{
		parent::__construct();
		echo"ik doe het wel maar ook niet";
	}

	public function run()
	{
		$username = $_POST['login'];
		echo"ik ben een hondelul";
		$sth = $this->db->prepare("SELECT id FROM users WHERE 
				login = :login AND password = :password");
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => $_POST['password']
		));
		
		$data = $sth->fetchAll();
		//print_r($data);

		
		$count =  $sth->rowCount();
		if ($count > 0) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			Session::set('gebruikersnaam', $username);
			header('location: ../account');
		} else {
			header('location: ../login');
		}
		
	}
}

?>