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
$load_setting = 'timezone, allow_theme, default_theme, language, allow_friend';
$load_user = 'user_name, user_theme, user_rank';
require_once("config_lite.php");
require_once("content_process.php");

$me = $user['user_name'];
$fpending = $mysqli->query("SELECT * FROM friends WHERE target = '$me' AND status = '0' ORDER BY hunter ASC, Target ASC");
$fpend = "";
if($user['user_rank'] < $setting['allow_friend']){
	echo '<p class="sub_color centered_element">' . $feature_block . '</p><br/>';
}
if($fpending->num_rows > 0){
	while($pendf = $fpending->fetch_assoc()){
		$pf = $pendf['hunter'];
		$fpend .=  friends_pending($pf, $icon_path, $friend_accept, $friend_decline, $user['user_rank'], $setting['allow_friend']);
	}
	echo $fpend;
}
else {
	echo '<p class="centered_element">' . $lang_request_empty . '</p>';
}
?>