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
require_once("config.php");

	if($user['verified'] == 0){
		if($user['email_count'] <= 3){
			$count = $user['email_count'] + 1;
			$mysqli->query("UPDATE `users` SET `email_count` = $count WHERE `user_name` = '{$user['user_name']}'");
			$who = $user['user_name'];
			$key = $user['valid_key'];
			$email = $user['user_email'];
			$link = $setting['domain'] . "/validator/validate.php?us=$who&val=$key";
			
			$to = "$email";
			$subject = "$active_subject";

			$message = "
					$act_mail_part1 $who \n\n
					$act_mail_part2\n\n
					$act_mail_part3 : $link\n\n
					$act_mail_part4\n\n
			";
			
			$headers = "$siteemail";

			$send_val = mail($to,$subject,$message,$headers);
			if($send_val == false){
				echo 3;
				die();
			}
			echo 1;
		}
		else {
			echo 100;
		}
	}
	else {
		echo 2;
	}

?>