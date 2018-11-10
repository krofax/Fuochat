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

if ($user["user_access"] == 4){
	$mysqli->query("UPDATE `users` SET `first_check` = '1',`join_chat` = '1' WHERE `user_name` = '{$user["user_name"]}'");
	echo 1;
}
else{
	echo 22;
}

?>