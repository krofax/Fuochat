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
$load_user = 'user_name, user_theme, user_access';
require_once("config_lite.php");
		
if(isset($_POST['delete_friend']) && $user['user_access'] == 4){
	$remove = $mysqli->real_escape_string(trim($_POST['delete_friend']));
	$me = $user['user_name'];
	$mysqli->query("DELETE FROM friends WHERE hunter = '$me' AND target = '$remove' OR hunter = '$remove' AND target = '$me'");
	echo 1;
}
else{
	echo 2;
	die();
}
?>