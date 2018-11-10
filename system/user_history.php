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
$load_setting = 'timezone, allow_theme, default_theme, language, log_history';
$load_user = 'user_name, user_theme, user_access, user_roomid';
require_once("config_lite.php");
require_once("content_process.php");

$me = $user['user_name'];
$history_lenght = $setting['log_history'];
echo "<ul id=\"ul_history\" class=\"background_box\">";
	if($user['user_access'] == 1 || $user['user_access'] == 4 ){
		$user_room = $user['user_roomid'];
		$history = $mysqli->query("SELECT * FROM `chat` WHERE `post_message` LIKE '%$me%' AND `post_roomid` = $user_room AND `post_user` != '$me' OR `post_target` = '$me' 
		AND `type` = 'private' ORDER BY `post_id` DESC LIMIT 50");
		
		while ($log = $history->fetch_assoc()){
			$myself = $user['user_name'];
			$myself2 = strtolower($myself);
			$message = emoprocess(uprocess($myself,$myself2,$log['post_message']));
			$message = emoticon(linking($message, $icon_set));
			if ($log['type'] == 'me'){
				echo "<li class=\"{$log["type"]}\"><span class='datechat'>{$log["post_time"]} </span> <span class='username {$log["post_color"]}'>{$log["post_user"]}</span> $message</li>\n";
			}
			else{
				echo "<li class=\"{$log["type"]}\"><span class='datechat'>{$log["post_time"]} </span> <span class='username {$log["post_color"]}'>{$log["post_user"]}</span> : $message</li>\n";
			}
			
		}
	}
	else{
		echo "$lang_error";
	}
echo "</ul>";
?>