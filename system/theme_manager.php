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
$load_user = 'user_name, user_theme, user_id, user_access';
require_once("config_lite.php");

// set user account to theme selected
if (isset($_POST['theme']) && $user['user_access'] == 4 && $setting['allow_theme'] == 1){
	
	$target = $user['user_id'];
	$theme= $mysqli->real_escape_string(trim($_POST['theme']));
	$mysqli->query("UPDATE `users` SET `user_theme` = '$theme' WHERE `user_id` = $target");
}
else{
	echo 1;
}

?>