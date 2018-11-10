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
$load_setting = 'timezone, allow_theme, default_theme, language, orientation, maintenance, chat_history, allow_link';
$load_user = 'user_name, user_theme, user_rank, user_access, first_check, join_chat';
require_once("config_lite.php");
require_once("content_process.php");

	if ($access == 'off'){
		echo 4;
		die();
	}
	if($access == 'on' && $setting['allow_theme'] == 1){
		$use_theme =  $user['user_theme']; 
	} 
	else { 
		$use_theme = $setting['default_theme'];
	} 
	// check for information sent by user
	if(isset($_GET['rank']) && isset($_GET['access']) && isset($_GET['room']) && isset($_GET['bottom']) && isset($_GET['target'])){
		if($setting['orientation'] !== $_GET['bottom']){
			echo 1000;
			die();
		}
		$room = htmlspecialchars($_GET['room']);
		$target = htmlspecialchars($_GET['target']);
		$rank = htmlspecialchars($_GET['rank']);
		$access = htmlspecialchars($_GET['access']);
		if($user['user_rank'] == $rank && $user['user_access'] == $access && $setting['maintenance'] == 1 && $user['user_access'] > 0 || $user['user_rank'] == $rank && $user['user_access'] == $access && $user['user_rank'] >= 3 && $user['user_access'] > 0){

			$user_check = $user['first_check'];
			$new_logs = $mysqli->query("SELECT * FROM `private` WHERE  `time` >= '$user_check'");
			if($new_logs->num_rows > 0 || $user['join_chat'] < 4){
			

					$history_chat = $setting['chat_history'];
					$join = $user['join_chat'] + 1;
					$me = $user['user_name'];
					$me2 = strtolower($me);
					$mysqli->query("UPDATE `private` SET `status` = 1 WHERE `hunter` = '$target' AND `target` = '$me'");
					$logs = 1;
					
						if($setting['orientation'] == 1){		
							$log = $mysqli->query("SELECT * FROM `private` WHERE `hunter` = '$me' AND `target` = '$target' OR `target` = '$me' AND `hunter` = '$target' ORDER BY `id` DESC LIMIT $history_chat");
						}
						else {
							$log = $mysqli->query("SELECT * FROM ( SELECT * FROM `private` WHERE `hunter` = '$me' AND `target` = '$target' OR `target` = '$me' AND `hunter` = '$target' ORDER BY `id` DESC LIMIT $history_chat) AS log ORDER BY `time` ASC");
						}
						
						if ($log->num_rows > 0){
							$mysqli->query("UPDATE `users` SET `first_check` = '$time', `join_chat` = '$join' WHERE `user_name` = '$me'");
							while ($chat = $log->fetch_assoc()){
								if($logs == 1){
									$lcolor = 'log1';
								}
								else {
									$lcolor = 'log2';
								}
								$uavatar = $chat['avatar'];
								if($chat['hunter_color'] == 'system'){
									$avatar_path = "$icon_path";
									$uavatar = 'default_system_tumb.png';
								}
								else{
									$avatar_path = 'avatar';
								}
								if($uavatar == '' || $uavatar == 'default_avatar_tumb.png'){
									$uavatar = 'default_avatar_tumb.png';
									$avatar_path = "$icon_path";
								}
								$avatar = "<img class=\"avatar_chat\" src=\"$avatar_path/$uavatar\"/>";
								$message = emoprocess(uprocess($me,$me2,$chat['message']));									
								if($setting['allow_link'] == 1){
									$message = emoticon(linking($message, $use_theme));
								}
								else{
									$message = emoticon($message);
								}
								echo "<li class=\"ch_logs $lcolor\"><div class=\"my_avatar chat_avatar_wrap2\">$avatar</div><div class=\"my_text\"><p><span class=\"username " . $chat['hunter_color'] . "\">" . $chat['hunter'] . "</span> : $message<span class=\"logs_date\">" . date("M j G:i", $chat['time']) . "</span></p></div><div class=\"clear\"></div></li>\n";								

								if($logs == 1){
									$logs = 2;
								}
								else {
									$logs = 1;
								}
							}
							
						}
						else {
							echo "<li class=\"ch_logs system\"><div class=\"my_avatar chat_avatar_wrap2\"><img class=\"avatar_chat\" src=\"$icon_path/default_system_tumb.png\"/></div><div class=\"my_text\"><p><span class=\"username csystem\">$lang_system</span> : $emptyprivate<span class=\"logs_date\">" . date("M j G:i", $time) . "</span></p></div><div class=\"clear\"></div></li>\n";
						}
			}
			else{
				echo 99;
			}
		}
		else {
			echo 1;
		}
	}
	else{
		echo "$lang_error";
	}
?>