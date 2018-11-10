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
$load_user = 'user_name, user_theme, user_access, user_ignore';
require_once("config_lite.php");
		
if(isset($_POST['delete_ignore']) && $user['user_access'] == 4){
	$remove = $mysqli->real_escape_string(trim($_POST['delete_ignore']));
	$me = $user['user_name'];
	$list = $user['user_ignore'];
	$new_list = str_replace(" $remove ", " ", $list);
	$mysqli->query("UPDATE `users` SET `user_ignore` = '$new_list', `first_check` = '1' WHERE `user_name` = '$me'");
	echo 1;
}
else{
	echo 2;
	die();
}
?>