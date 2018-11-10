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
	$load_setting = 'orientation, maintenance, chat_history, allow_link, timezone, allow_theme, default_theme, language';
	$load_user = 'user_access, user_rank, first_check, user_roomid, join_chat, user_name, user_ignore, user_theme';
	require_once("config_lite.php");
	require_once("content_process.php");
	if($access == 'off'){
		echo 1;
		die();
	}
	$clogs = "";
	// check for information sent by user
	if(isset($_GET['rank']) && isset($_GET['access']) && isset($_GET['room']) && isset($_GET['bottom'])){
		if($setting['orientation'] !== $_GET['bottom']){
			echo 1000;
			die();
		}
		$room = htmlspecialchars($_GET['room']);
		$rank = htmlspecialchars($_GET['rank']);
		$access = htmlspecialchars($_GET['access']);
		if($user['user_rank'] == $rank && $user['user_access'] == $access && $setting['maintenance'] == 1 && $user['user_access'] > 0 || $user['user_rank'] == $rank && $user['user_access'] == $access && $user['user_rank'] >= 3 && $user['user_access'] > 0){

			$user_check = $user['first_check'];
			$new_logs = $mysqli->query("SELECT * FROM `chat` WHERE  `post_date` > '$user_check' && `post_roomid` = '{$user['user_roomid']}'");
			if($new_logs->num_rows > 0 || $user['join_chat'] < 5 || $_GET['rlc'] == 1){


				if($user['user_roomid'] == $_GET['room']){
				
					$history_chat = $setting['chat_history'];
					$join = $user['join_chat'] + 1;
					$me = $user['user_name'];
					$me2 = strtolower($me);
					$logs = 1;
					
						if($setting['orientation'] == 1){		
							$log = $mysqli->query("SELECT * FROM `chat` WHERE `post_roomid` = '$room' AND `type` = 'public' OR `type` = 'system' AND `post_roomid` = '$room' OR `post_roomid` =  '$room' AND `type` = 'seen' AND `post_target` = '$me' OR `type` = 'private' AND `post_target` = '$me' AND `post_roomid` = '$room'  OR `type` = 'private' AND `post_user` = '$me' AND `post_roomid` = '$room' OR `post_roomid` = '$room' AND `type` = 'me' OR `post_roomid` = '$room' AND `type` = 'global' ORDER BY `post_id` DESC LIMIT $history_chat");
						}
						else {
							$log = $mysqli->query("SELECT * FROM ( SELECT * FROM `chat` WHERE `post_roomid` = '$room' AND `type` = 'public' OR `type` = 'system' AND `post_roomid` = '$room' OR `post_roomid` = '$room' AND `type` = 'seen' AND `post_target` = '$me' OR `type` = 'private' AND `post_target` = '$me' AND `post_roomid` = '$room'  OR `type` = 'private' AND `post_user` = '$me' AND `post_roomid` = '$room' OR `post_roomid` = '$room' AND `type` = 'me' OR `post_roomid` = '$room' AND `type` = 'global' ORDER BY `post_id` DESC LIMIT $history_chat) AS log ORDER BY `post_date` ASC");
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
								if($chat['type'] == 'system'){
									$avatar_path = "$icon_path";
								}
								else if( $chat['user_id'] == '999999'){
									$avatar_path = 'addons_icon';
								}
								else if( $chat['post_user'] == $lang_system){
									$avatar_path = "$icon_path";
								}
								else{
									$avatar_path = 'avatar';
								}
								$uavatar = $chat['avatar'];
								if($uavatar == '' || $uavatar == 'default_avatar_tumb.png'){
									$uavatar = 'default_avatar_tumb.png';
									$avatar_path = "$icon_path";
								}
								$avatar = "<img class=\"avatar_chat\" src=\"$avatar_path/$uavatar\"/>";
								$message = emoprocess(uprocess($me,$me2,$chat['post_message']));
								if($setting['allow_link'] == 1){
									$message = emoticon(linking($message, $icon_set));
								}
								else{
									$message = emoticon($message);
								}
									if(!strpos(strtolower($user['user_ignore']), strtolower($chat['post_user']))){
										if($user['user_rank'] >= 3){
												if( strtolower($chat['post_target']) == strtolower($user['user_name']) && $chat['post_user'] != "$lang_system"){
													$clogs .= "<li class=\"ch_logs $lcolor " . $chat['type'] . "\"><div value=\"" . $chat['post_user'] . "\" class=\"my_avatar chat_avatar_wrap\">$avatar</div><div class=\"my_text\"><p><span class=\"username " . $chat['post_color'] . "\">" . $chat['post_user'] . "</span> : $message<span class=\"private_reply\" value=\"" . $chat['post_user'] . "\">reply</span><span class=\"logs_date\">" . date("M j G:i", $chat['post_date']) . "</span></p></div><div class=\"clear\"></div></li>\n";								
												}
												else{
													if($chat['type'] == 'me'){
														$clogs .="<li class=\"ch_logs $lcolor " . $chat['type'] . "\"><div value=\"" . $chat['post_user'] . "\" class=\"my_avatar chat_avatar_wrap\">$avatar</div><div class=\"my_text\"><p><span class=\"username " . $chat['post_color'] . "\">" . $chat['post_user'] . "</span> $message<span class=\"logs_date\">" . date("M j G:i", $chat['post_date']) . "</span><span class=\"delete_log\" value=\"" . $chat['post_id'] . "\">x</span></p></div><div class=\"clear\"></div></li>\n";								
													}
													else {
														$clogs .= "<li class=\"ch_logs $lcolor " . $chat['type'] . "\"><div value=\"" . $chat['post_user'] . "\" class=\"my_avatar chat_avatar_wrap\">$avatar</div><div class=\"my_text\"><p><span class=\"username " . $chat['post_color'] . "\">" . $chat['post_user'] . "</span> : $message<span class=\"logs_date\">" . date("M j G:i", $chat['post_date']) . "</span><span class=\"delete_log\" value=\"" . $chat['post_id'] . "\">x</span></p></div><div class=\"clear\"></div></li>\n";								
													}
												}
										}
										else {
												if( strtolower($chat['post_target']) == strtolower($user['user_name']) && $chat['post_user'] != "$lang_system"){
													$clogs .= "<li class=\"ch_logs $lcolor " . $chat['type'] . "\"><div value=\"" . $chat['post_user'] . "\" class=\"my_avatar chat_avatar_wrap\">$avatar</div><div class=\"my_text\"><p><span class=\"username " . $chat['post_color'] . "\">" . $chat['post_user'] . "</span> : $message<span class=\"private_reply\" value=\"" . $chat['post_user'] . "\">reply</span><span class=\"logs_date\">" . date("M j G:i", $chat['post_date']) . "</span></p></div><div class=\"clear\"></div></li>\n";								
												}
												else{
													if($chat['type'] == 'me'){
														$clogs .= "<li class=\"ch_logs $lcolor " . $chat['type'] . "\"><div value=\"" . $chat['post_user'] . "\" class=\"my_avatar chat_avatar_wrap\">$avatar</div><div class=\"my_text\"><p><span class=\"username " . $chat['post_color'] . "\">" . $chat['post_user'] . "</span> $message<span class=\"logs_date\">" . date("M j G:i", $chat['post_date']) . "</span></p></div><div class=\"clear\"></div></li>\n";								

													}
													else {
														$clogs .= "<li class=\"ch_logs $lcolor " . $chat['type'] . "\"><div value=\"" . $chat['post_user'] . "\" class=\"my_avatar chat_avatar_wrap\">$avatar</div><div class=\"my_text\"><p><span class=\"username " . $chat['post_color'] . "\">" . $chat['post_user'] . "</span> : $message<span class=\"logs_date\">" . date("M j G:i", $chat['post_date']) . "</span></p></div><div class=\"clear\"></div></li>\n";								
													}
												}
										}
										if($logs == 1){
											$logs = 2;
										}
										else {
											$logs = 1;
										}
									}
							}
							
						}
						else {
							$clogs .= "<li class=\"ch_logs system\"><div class=\"my_avatar chat_avatar_wrap zzzTTmmm \"><img class=\"avatar_chat\" src=\"$icon_path/default_system_tumb.png\"/></div><div class=\"my_text\"><p><span class=\"username csystem\">$lang_system</span> : $notext<span class=\"logs_date\">" . date("M j G:i", $time) . "</span></p></div><div class=\"clear\"></div></li>\n";
						}
				}
				else {
					echo 2;
				}
				echo $clogs;
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