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
$load_user = 'user_name, user_theme, user_access, user_roomid';
require_once("config_lite.php");

// show the topic for current room
$myroom = $user['user_roomid'];
if($user["user_access"] >= 1){
	$room_topic = $mysqli->query("SELECT `room_name`, `topic` FROM `rooms` WHERE `room_id` = '$myroom'");
	if ($room_topic->num_rows > 0)
	{
		$topic = $room_topic->fetch_array(MYSQLI_BOTH);
		if ($topic['topic'] != ''){
			$finaltopic = $topic['topic'];
			$finalroom = $topic['room_name'];
			echo "<span class=\"topic sub_color\">$topicname</span> : $finaltopic";
		}
		else {
			echo "<span class=\"topic sub_color\">$topicname</span> : $msgtopic";
		}
	}
}
else {
	echo "<span class=\"topic sub_color\">$topicname</span> : $msgtopic";
}
?>