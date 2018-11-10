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
$load_setting = 'timezone, allow_theme, default_theme, language, allow_ignore';
$load_user = 'user_name, user_theme, user_ignore, user_access, user_rank';
require_once("config_lite.php");

// show rooms list
if($user['user_rank'] < $setting['allow_ignore']){
	echo '<p class="sub_color centered_element">' . $feature_block . '</p><br/>';
}
if($user["user_access"] >= 1){
	$list = trim($user['user_ignore']);
	if($list !== ""){
		$ignore = explode(' ',trim($user['user_ignore']));
		foreach($ignore as $result) {
			echo "<div class=\"container_element sub_element hover_element\"><div class=\"wrap_element\"><div class=\"element_name\"><p>$result</p></div><div class=\"delete_element delete_ignore\"><button value=\"$result\" type=\"button\"><img class=\"close_room\" src=\"./$icon_path/erase.png\"/></button></div></div></div>";
		}
	}
	else {
		echo '<p class="centered_element">' . $ignore_empty . '</p>';
	}
}
else {
	echo '<p class="centered_element">' . $lang_error . '</p>';
}
?>