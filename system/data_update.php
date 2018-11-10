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
$load_setting = 'timezone, allow_theme, default_theme, language, ads_time, allow_ads, ads_select, ads_delay, ads_count, full_sound, global_sound, allow_private, version, ads_stop';
$load_user = 'user_name, user_theme, user_rank, user_roomid, user_sound, session_id';
require_once("config_lite.php");
		
		$me = $user['user_name'];
		$room = $user['user_roomid'];
		
		$sound = $user['user_sound'];
		$sound = $sound - 0;
		$whistle = 1;
		
		if($setting['version'] >= 4){
			$whistle = $setting['global_sound'];
		}
		$check_session = $user['session_id'];
		$fsound = $setting['full_sound'];
	
		// check ads content & values 
		
		$atime = $setting['ads_time'];
		$aallow = $setting['allow_ads'];
		$aselect = $setting['ads_select'];
		$adelay = $setting['ads_delay'];
		$aacount = $setting['ads_count'];
		$checkdelay = $time - $setting['ads_delay'];
		$stop = $setting['ads_stop'];
		
			if($atime < $checkdelay && $aallow == 1){
				if($aselect < $aacount){
					$aselect = $aselect + 1;
				}
				else {
					$aselect = 1;
				}
				$mysqli->query("UPDATE `setting` SET `ads_select` = '$aselect', `ads_time` = '$time'");
			}

	
		// check for last message on the chat
		
		$log = $mysqli->query("SELECT `post_message` FROM `chat` WHERE 
		`post_message` LIKE '%$me%' AND (`type` = 'public' OR `type` = 'me' OR `type` = 'global') AND ( `post_user` != '$me' AND `post_roomid` = '$room')
		ORDER BY `post_id` DESC LIMIT 1");
		
		if ($log->num_rows > 0){
			$last = $log->fetch_assoc();
			$last = $last['post_message'];
		}
		else{
			$last = "nothing found";
		}
		
		// check if there is new private message
		if($user['user_rank'] >= $setting['allow_private']){
			$last_private = $mysqli->query("SELECT `message` FROM `private` WHERE `target` = '$me' AND `hunter` != '$me' ORDER BY `time` DESC LIMIT 1");
			$new_private = $last_private->fetch_assoc();
			$private = $new_private['message'];
			$private = addslashes($private);
			
			$unique_private = $mysqli->query("SELECT DISTINCT `hunter` FROM `private` WHERE `target` = '$me' AND `hunter` != '$me'  AND `status` = '0' ORDER BY `time` ASC LIMIT 99");
			$icon_result = $unique_private->num_rows;
		}
		else {
			$private = "";
			$icon_result = 0;
		}
		
		
		// return value of data to jquery as a json variable
		echo json_encode(
			array("bet3" => $sound, "bet4" => $private, "bet5" => $last, "bet7" => $aallow, "bet8" => $aselect, "bet9" => $stop, "bet12" => $icon_result, "bet13" => $whistle, "bet14" => $icon_set, "bet15" => $fsound, "bet20" => $check_session, "bet21" => $me));
?>