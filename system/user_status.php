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
$load_setting = 'timezone, allow_theme, default_theme, language, away, gone';
$load_user = 'user_name, user_theme, user_access';
require_once("config_lite.php");
		
// generate the user list of current room and set user away, gone or active depending on action time
$away = $time - $setting['away'];

if($setting['gone'] == 0){
$gone = $time - ($time - 1);
}
else{
	$gone = $time - $setting['gone'];
}
if($user['user_access'] == 4){
	$mysqli->query("UPDATE `users` SET `user_status` = 3 WHERE `last_action` < '$gone' AND `user_status` != 4");
	$mysqli->query("UPDATE `users` SET `user_status` = 2 WHERE `last_action` < '$away' AND `last_action` > '$gone' AND `user_status` != 3 AND `user_status` != 4 ");
	echo 1;
}
else {
	echo 2;
}
		
?>