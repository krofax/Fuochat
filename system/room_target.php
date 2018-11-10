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
$load_setting = 'allow_theme, default_theme, language, timezone';
$load_user = 'user_name, user_theme, user_access, user_rank, user_roomid';
require_once("config_lite.php");

// set user account to new room id
if (isset($_POST["room_target"])){

	$roomtarget = $_POST["room_target"];
	$roomfinal = trim(str_replace('room', '', $roomtarget));
	$access = $mysqli->query("SELECT * FROM `rooms` WHERE `room_id` = '$roomfinal'");
	$check = $access->fetch_array(MYSQLI_BOTH);
	
	if($check['access'] <= $user['user_rank']){
		if($user['user_roomid'] != $roomfinal){
			$mysqli->query("UPDATE `users` SET `user_roomid` = '$roomfinal', `first_check` = '1',`join_chat` = '1' WHERE `user_name` = '{$user["user_name"]}'");
		}
		else {
			$mysqli->query("UPDATE `users` SET `first_check` = '1',`join_chat` = '1' WHERE `user_name` = '{$user["user_name"]}'");
			echo 1;
		}
	}
	else {
		echo 2;
	}
}
else {
	echo "$lang_error";
}



?>