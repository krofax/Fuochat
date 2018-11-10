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
$load_setting = 'timezone, allow_theme, default_theme, language, flood_delay, mute_delay';
$load_user = 'user_name, user_theme';
require_once("config_lite.php");

$floodtime = $time - $setting['flood_delay'];
$unmute = $time - $setting['mute_delay'];

if ($setting['mute_delay'] != 0){
	$mysqli->query("UPDATE `users` SET `user_access` = 4, `user_flood` = '0', `user_mute` = '', `mute_time` = '' WHERE `user_access` = 1 AND `mute_time` < '$unmute' AND `user_mute` != 'flood' ");
}


$mysqli->query("UPDATE `users` SET `user_access` = 4, `user_flood` = '0', `user_mute` = '' WHERE `user_access` = 1 AND `user_mute` = 'flood' AND `last_action` < $floodtime");

?>
