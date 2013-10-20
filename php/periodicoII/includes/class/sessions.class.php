<?php
	require_once("bdaccess.class.php");

	class Session{
		function connect($user, $passwd) {
			if(strpos($user, '@')) $to_search=DB_USERS_TB_EMAIL;
			else $to_search=DB_USERS_TB_USERNAME;
			$rows = DataBase::realizar("SELECT * FROM " . DB_USERS_TB . " WHERE " . $to_search . " = '" . $user . "' AND password = UNHEX(SHA1('" . $passwd . "'))");
			if (count($rows)!=0){
				session_start();
				$_SESSION['user']=$rows[0]['UserName'];
				$_SESSION['LAST_ACTIVITY'] = time();
				$_SESSION['CREATED'] = time();
				return true;
			} else {
				return false;
			}
		}
		
		function verifyUser(){
			session_start();
			
			if (isset($_SESSION['user'])){
				if (isset($_SESSION['LAST_ACTIVITY']) && !(time() - $_SESSION['LAST_ACTIVITY'] > 600)){	// Unlog session after 10 minutes
					$_SESSION['LAST_ACTIVITY'] = time();
					
					if (time() - $_SESSION['CREATED'] > 1800) {	// Renews session after 30 minutes
						session_regenerate_id(true);
						$_SESSION['CREATED'] = time();
					}
					
					return true;
				}
				else{
					echo '<script type="text/javascript">alert(¡EL tiempo de sesión ha expirado!)</script>';
				}
			}
			else return false;
		}
		
		function getUser(){
			return $_SESSION['user'];
		}
		
		function isAdmin(){
			if(Session::verifyUser()) return ($_SESSION['user'] == "admin");
			else return false;
		}
		
		function disconnect(){
			if(Session::verifyUser()){
				session_unset();
				session_destroy();
			}
		}
}
?>
