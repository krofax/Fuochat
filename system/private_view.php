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
	$me = $user['user_name'];
	
	$mysqli->query("UPDATE `private` SET `view` = 1 WHERE `target` = '$me'");
		echo 1;
	}
	else {
		die();
	}

?>