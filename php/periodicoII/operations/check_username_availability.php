<?php
require_once("../config.php");
require_once("../includes/class/bdaccess.class.php");
require_once("../includes/class/sessions.class.php");
if($_REQUEST) {
    $username = $_REQUEST['username'];
    $rows = DataBase::realizar("SELECT * FROM " . DB_USERS_TB . " WHERE " . DB_USERS_TB_USERNAME . "='" . $username . "'");

    if(count($rows) > 0)
        echo 'no';
    else
        echo 'si';
}
?>
