<?php
/**
* Boomchat
*
* @package Boomchat
* @author www.myboomchat.com
* @copyright 2015
* @terms any use of this script without a legal license is prohibited
* all the content of Boomchat is the propriety of BoomCoding and Cannot be 
* used for another project.
*/
require_once("config.php");

$name = $user['user_name'];

if(isset($_POST['new_email']) && $access == 'on'){

	$my_email = $mysqli->real_escape_string(trim($_POST['new_email']));
	
	if (filter_var($my_email, FILTER_VALIDATE_EMAIL) && !empty( $_POST['new_email'])){
		$my_email = $my_email;
		$mysqli->query("UPDATE `users` SET `user_email` = '$my_email' WHERE `user_name` = '$name'");
		echo 2;
	}
	else {
		echo 1;
	}
}
else {
	die();
}
?>