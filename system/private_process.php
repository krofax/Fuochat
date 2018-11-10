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
$load_setting = 'timezone, allow_theme, default_theme, language, allow_private';
$load_user = 'user_name, user_theme, user_access, user_ignore, user_color, guest, user_id, user_tumb, user_rank';
require_once("config_lite.php");
require_once("content_process.php");

if($user['user_rank'] < $setting['allow_private']){
	die();
}
if (isset($_POST['target']) && isset($_POST['content']) && isset($_POST['bold']) 
	&& isset($_POST['italic']) && isset($_POST['underline']) 
	&& isset($_POST['color']) && isset($_POST['high'])){
	
	$bold = $mysqli->real_escape_string(trim($_POST['bold']));
	$italic = $mysqli->real_escape_string(trim($_POST['italic']));
	$underline = $mysqli->real_escape_string(trim($_POST['underline']));
	$chigh = $mysqli->real_escape_string(trim($_POST['high']));
	$ccolor = $mysqli->real_escape_string(trim($_POST['color']));
	
	$target = $mysqli->real_escape_string(trim($_POST['target']));
	$content = $mysqli->real_escape_string(trim($_POST['content']));
	$content2 = $mysqli->real_escape_string(trim(htmlspecialchars($_POST['content'])));
	$content = htmlspecialchars($content);
	$content = "$content ";

	$finduser = $mysqli->query("SELECT `user_color`, `guest`, `user_ignore` FROM `users` WHERE `user_name` = '$target'");
	if ($finduser->num_rows > 0){
	
			$targetfound = $finduser->fetch_array(MYSQLI_BOTH);
			if(!strpos(strtolower($targetfound['user_ignore']), strtolower($user['user_name']))){
				$mycolor = $user["user_color"];
				$target_color = $targetfound["user_color"];
				$guest_post = $targetfound["guest"];
				$hunterid = $user["user_id"];
				$hunter = $user["user_name"];
				$avatar = $user['user_tumb'];
				if($guest_post == 1 || $user['guest'] == 1){
					$gupost = 1;
				}
				else {
					$gupost = 0;
				}
				if($content2 == '/clear'){
					$mysqli->query("DELETE FROM private WHERE hunter = '$hunter' AND target = '$target' OR hunter = '$target' AND target = '$hunter'");
					$mysqli->query("UPDATE `users` SET `first_check` = '1' WHERE `user_name` = '$hunter'");
				}
				else {
					$content = styling($chigh, $bold, $italic, $ccolor, $underline, $content);
					$mysqli->query("INSERT INTO `private` (time, target, hunter, message, target_color, hunter_color, hunter_guest, avatar) VALUES ('$time', '$target', '$hunter', '$content', '$target_color', '$mycolor', '$gupost', '$avatar')");
				}
			}
			else {
				die();
			}
	}
	else{
		echo 2;
	}
}
else {
	echo 4;
}



?>