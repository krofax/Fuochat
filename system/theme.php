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

$theme = $mysqli->query("SELECT * FROM `theme` WHERE `id` >=  1");
if ($theme->num_rows > 0)
{
	echo "<div id=\"theme_title\"><p>$availtheme</p></div>";
	echo "<div id=\"container_user_room\">";
		while ($themes = $theme->fetch_assoc())
		{
			$theme_name = $themes["name"];
			$theme_name = str_replace("_", " ", $theme_name);
			if ( $user['user_theme'] == $themes["name"] ) {
				echo "<div class=\"theme_button selected_theme selected_element  hover_element\" value=\"{$themes["name"]}\"><p>$theme_name</p></div>";
			}
			else {
				echo "<div class=\"theme_button new_theme sub_element hover_element\" value=\"{$themes["name"]}\"><p>$theme_name</p></div>";
			}
		}
	echo "</div>";
}
else {
	die();
}



?>