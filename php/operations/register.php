<?php
	if(!empty($_POST['username']) && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['password']) && !empty($_POST['email'])){
		$consultaSQL = "INSERT INTO " . DB_USERS_TB  . " VALUES ('" . $_POST['username'] .  "', '"
                                                  . $_POST['name'] . "', '"
                                                  . $_POST['surname'] . "', "
                                                  . "UNHEX(SHA1('" . $_POST['surname'] . "')), '"
                                                  . $_POST['email'];
                                                  
                                                  if(!empty($_POST['phone'])) $consultaSQL .= "', '" . $_POST['phone']; else $consultaSQL .= "', 'null";
                                                  
                                                  if(!empty($_POST['address'])) $consultaSQL .= "', '" . $_POST['address']; else $consultaSQL .= "', 'null";
                                                  
                                                  if(!empty($_POST['zip'])) $consultaSQL .= "', '" . $_POST['zip']; else $consultaSQL .= "', 'null";
                                                  
                                                  if(!empty($_POST['birthday'])) $consultaSQL .= "', '" . $_POST['birthday']; else $consultaSQL .= "', 'null";
                                                  
                                                  $consultaSQL .= "');";
	}
	else{
		echo "Access denied";
	}
	
	DataBase::realizar($consultaSQL);
	//Session::connect($_POST['username'], $_POST['password']);

?>
