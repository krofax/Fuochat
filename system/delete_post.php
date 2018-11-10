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
$load_setting = 'timezone, allow_theme, default_theme, language';
$load_user = 'user_name, user_theme, user_rank, user_access, user_roomid';
require_once("config_lite.php");

// delete a specific post in the database
if(isset($_POST['del_post']) && $user['user_rank'] >= 3 && $user['user_access'] == 4){

	 $post = $mysqli->real_escape_string(trim($_POST['del_post']));
	 $findpost = $mysqli->query("SELECT `post_id` FROM `chat` WHERE `post_id` = '$post'");
	 $room = $user['user_roomid'];
	 
	 if($findpost->num_rows > 0 ){
		$post_time = date("H:i", $time);
		$log_notice = "$post_notice " . $user['user_name'];
		$mysqli->query("DELETE FROM `chat` WHERE `post_id` = '$post'");
		$mysqli->query("UPDATE `users` SET `first_check` = 1, `user_join` = '1' WHERE `user_roomid` = '$room'");
	}
	 else{
		die();
	 }
}
else{
	die();
}
?>