<?php

require_once("system/config.php");
require_once("system/exclusion/exclude_username.php");

$name = $user['user_name'];
$room = $user['user_roomid'];
$post_time = date("H:i", $time);

if(isset($_POST['new_name']) && $user['user_access'] == 4 && $user['user_rank'] >= $setting['allow_username']){

	$new_name = $mysqli->real_escape_string(trim($_POST['new_name']));
	$new_name_lower = strtolower($new_name);

	$nicktest = $mysqli->query("SELECT `user_name` FROM `users` WHERE `user_name` = '$new_name' OR `old_name` = '$new_name' AND `user_name` != '$name'");
	if($nicktest->num_rows < 1){
		if (preg_match("/^[a-zA-Z]{2,}[_-]?[a-zA-Z0-9]{2,}$/", $new_name) && strlen($new_name) < $setting['max_username'] && !ctype_digit($new_name) && excluded($exclude_in_username, $new_name_lower) !== true && $new_name !== $lang_system && strlen($new_name) >= 4){
			if(file_exists('upload/' . $user['user_name'])){
				rename('upload/' . $user['user_name'], 'upload/' . $new_name);
			}
			$message_nick = "$name $name_it $new_name";
			setcookie("username","$new_name",time()+ (1000 * 1000 * 100));
			$mysqli->query("UPDATE `users` SET `user_name` = '$new_name', `old_name` = '$name', `join_chat` = '2' WHERE `user_name` = '$name'");
			$mysqli->query("UPDATE `chat` SET `post_user` = '$new_name' WHERE `post_user` = '$name'");
			$mysqli->query("UPDATE `private` SET `hunter` = '$new_name' WHERE `hunter` = '$name'");
			$mysqli->query("UPDATE `private` SET `target` = '$new_name' WHERE `target` = '$name'");
			$mysqli->query("UPDATE `friends` SET `target` = '$new_name' WHERE `target` = '$name'");
			$mysqli->query("UPDATE `friends` SET `hunter` = '$new_name' WHERE `hunter` = '$name'");
			$mysqli->query("INSERT INTO `chat` (post_date, post_time, user_id, post_user, post_message, post_roomid, post_color, type, avatar) VALUES ('$time', '$post_time', '999999', '$lang_system', '$message_nick', $room, 'bold', 'system', 'default_system_tumb.png')");
			echo 4;
			die();
		}
		else{
			// this name is invalid
			echo 3;
			die();
		}
	}
	else {
		// this name already exist
		echo 2;
		die();
	}
}
else {
	// name not provided via post
	echo 1;
}
?>
