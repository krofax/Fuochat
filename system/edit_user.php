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
$load_setting = 'timezone, allow_theme, default_theme, language, max_username';
$load_user = 'user_name, user_theme, user_access, user_rank, user_roomid, user_id';
require_once("config_lite.php");
require_once("content_process.php");
require_once("exclusion/exclude_username.php");


$me = $user['user_name'];
$room = $user['user_roomid'];
$user_id = $user["user_id"];
$post_time = date("H:i", $time);

if($user['user_rank'] > 3 && $access == 'on'){

	if(isset($_POST['target']) && isset($_POST['targetid']) && isset($_POST['effect'])){
		
		$target = $mysqli->real_escape_string(trim($_POST['target']));
		$targetid = $mysqli->real_escape_string(trim($_POST['targetid']));
		$effect = $mysqli->real_escape_string(trim($_POST['effect']));
		
		$find_user = $mysqli->query("SELECT user_rank, user_name, user_avatar, user_tumb, user_ip FROM users WHERE user_name =  '$target' AND user_id = '$targetid'");
		
		if ($find_user->num_rows > 0){
		
			$info = $find_user->fetch_array(MYSQLI_BOTH);

			if($user['user_rank'] > $info['user_rank'] && $user['user_name'] !== $info['user_name']){
			
				
				// change user password 
				
				if($effect == 'password' && isset($_POST['newpass'])){
					$new_password = $mysqli->real_escape_string(trim($_POST['newpass']));
					if(strlen($new_password) > 5 && $new_password != ''){
						$password_set = sha1(str_rot13($new_password . $encryption));
						$mysqli->query("UPDATE users SET user_password = '$password_set' WHERE user_name = '$target' AND user_id = '$targetid'");
						echo 1;
						die();
					}
					else {
						echo 10;
						die();
					}
				}
				
				// change user name
				
				if($effect == 'name' && isset($_POST['newMname'])){
					$nname = $mysqli->real_escape_string(trim($_POST['newMname']));
					
					$check_avail = $mysqli->query("SELECT user_name FROM users WHERE user_name =  '$nname'");
					if($check_avail->num_rows < 1){
					
						$nname_lower = strtolower($nname);
						
						if (preg_match("/^[a-zA-Z]{2,}[_-]?[a-zA-Z0-9]{2,}$/", $nname) && strlen($nname) < $setting['max_username'] && !ctype_digit($nname) && excluded($exclude_in_username, $nname_lower) !== true && $nname !== $lang_system && strlen($nname) >= 4){
							
							if(file_exists('../upload/' . $target)){
								rename('../upload/' . $target, '../upload/' . $nname);
							}
							$message_nick = "$target $name_it $nname";
							$mysqli->query("UPDATE users SET user_name = '$nname', old_name = '$target' WHERE user_name = '$target' AND user_id = '$targetid'");
							$mysqli->query("UPDATE `chat` SET `post_user` = '$nname' WHERE `post_user` = '$target'");
							$mysqli->query("UPDATE `private` SET `hunter` = '$nname' WHERE `hunter` = '$target'");
							$mysqli->query("UPDATE `private` SET `target` = '$nname' WHERE `target` = '$target'");
							$mysqli->query("UPDATE `friends` SET `target` = '$nname' WHERE `target` = '$target'");
							$mysqli->query("UPDATE `friends` SET `hunter` = '$nname' WHERE `hunter` = '$target'");
							$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$message_nick', $room, 'bold', 'system', 'default_system_tumb.png')");
							echo "$nname ok1000";
							die();
						}
						else {
							echo 8;
							die();
						}
					}
					else {
						echo 9;
						die();
					}

				}
				
				// remove user avatar from system and clear it to default one
				
				else if($effect == 'avatar'){
					$tumb = '../avatar/' . $info['user_tumb'];
					$avt = '../avatar/' . $info['user_avatar'];
					if($info['user_avatar'] != 'default_avatar.png' && file_exists($avt)){
						unlink($avt);
					}
					if($info['user_tumb'] != 'default_avatar_tumb.png' && file_exists($tumb)){
						unlink($tumb);
					}
					$mysqli->query("UPDATE users SET user_avatar = 'default_avatar.png', user_tumb = 'default_avatar_tumb.png' WHERE user_name = '$target' AND user_id = '$targetid'");
					$mysqli->query("UPDATE `chat` SET `avatar` = 'default_avatar_tumb.png'  WHERE `post_user` = '$target'");
					$mysqli->query("UPDATE `private` SET `avatar` = 'default_avatar_tumb.png'  WHERE `hunter` = '$target'");
					echo 1;
					die();
				}
				
				// change user email 
				
				else if($effect == 'email' && isset($_POST['newmail'])){
					$new_email= $mysqli->real_escape_string(trim($_POST['newmail']));
					if(filter_var($new_email, FILTER_VALIDATE_EMAIL)){
						$mysqli->query("UPDATE users SET user_email = '$new_email' WHERE user_name = '$target' AND user_id = '$targetid'");
						echo 1;
						die();
					}
					else {
						echo 10;
						die();
					}
				}
				
				// ban user
				
				else if($effect == 'ban' && $user['user_name'] != $info['user_name'] && $user['user_id'] != $targetid){
					$target_ip = $info['user_ip'];
					$bannotice = "$target $msgban $me";
					$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$bannotice', $room, 'bold', 'system', 'default_system_tumb.png')");
					$mysqli->query("UPDATE users SET user_access = 0 WHERE user_name = '$target' AND user_id = '$targetid'");
					$mysqli->query("INSERT INTO `banned` (ip) VALUES ('0')");				
				}
				
				// kick user
				
				else if($effect == 'kick'){
					$displaykick = $quickkick;
							
					$kicknotice = "$target $msgkick " . $me . " ( $displaykick )";
					$mysqli->query("UPDATE `users` SET user_access = 2, user_kick = '$displaykick', user_status = '3' WHERE user_name = '$target' AND user_id = '$targetid'");
					$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$kicknotice', $room, 'csystem', 'system', 'default_system_tumb.png')");
				}
				
				// mute user
				
				else if($effect == 'mute'){
					$mutenotice = "$target $msgmute $me";
					$mysqli->query("UPDATE users SET user_access = 1, user_mute = '$me', mute_time = '$time' WHERE user_name = '$target' AND user_id = '$targetid'");
					$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$mutenotice', $room, 'bold', 'system', 'default_system_tumb.png')");
				}
				
				// delete user account 
				
				else if($effect == 'delete'){
				
					$kill_notice = "$target $msgkill $me";
					$mysqli->query("DELETE FROM `users` WHERE `user_name` = '$target' AND `user_id` = '$targetid'");
					$mysqli->query("DELETE FROM `chat` WHERE `post_user` = '$target'");
					$mysqli->query("DELETE FROM `private` WHERE `hunter` = '$target'");
					$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$kill_notice', '$room', 'bold', 'system', 'default_system_tumb.png')");
					$path_user_file = "../upload/$target";
					
					if (file_exists($path_user_file)) {
						$clean_user = delete_files($path_user_file);
					}
					
					$tumb = '../avatar/' . $info['user_tumb'];
					$avt = '../avatar/' . $info['user_avatar'];
					if($info['user_avatar'] !== 'default_avatar.png' && file_exists($avt)){
						unlink($avt);
					}
					if($info['user_tumb'] !== 'default_avatar_tumb.png' && file_exists($tumb)){
						unlink($tumb);
					}
					echo 2;
					die();
				}
				else {
					echo 10;
					die();
				}
			}
			else{
				echo 10;
				die();
			}
		}
		else {
			echo 10;
			die();
		}
	}
	else {
		echo 10;
		die();
	}
}
else {
	echo 10;
	die();
}


?>