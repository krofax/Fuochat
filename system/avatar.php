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
$load_user = 'user_name, user_theme, user_access, user_avatar';
require_once("config_lite.php");

// show and reload user avatar
if($user['user_access'] == 4 && $access == 'on'){

	echo "<img class=\"profile_avatar\" src=\"avatar/" . $user['user_avatar'] . "\"/>";
}
else {
	die();
}
?>