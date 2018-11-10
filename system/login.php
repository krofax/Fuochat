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

$count_online = $mysqli->query("SELECT user_id FROM users WHERE user_status < '3'");
$online_count = $count_online->num_rows;
echo "<div id=\"login_error\"><div class=\"error\" id=\"login_error_inside\"></div></div>";
echo "<div id=\"content_login_left\">";
echo "<form class=\"login_form\" autocomplete=\"off\">
			<input style=\"display:none\">
			<input type=\"password\" style=\"display:none\">
			<p class=\"login_label\">$lang_username</p>
			<input id=\"user_username\" class=\"input_data background_box\" type=\"text\" maxlength=\"50\" name=\"username\">
			<p class=\"login_label\">$lang_password</p>
			<input id=\"user_password\" class=\"input_data background_box\" maxlength=\"30\" type=\"password\" name=\"password\"><br />
			<p class=\"login_label sub_color forgot_password\">$lang_forgot</p>
			<div id=\"login_button\" class=\"sub_button hover_element\"><p>$lang_login</p></div>";
			
			if($setting['registration'] == 1)
			{
				echo "<div id=\"login_register\"><p>$lang_register</p></div>";
			}
			echo "<div class=\"clear\"></div>";
			if($setting['allow_guest'] == 1){
				echo "<div class=\"sub_button hover_element\" id=\"guest_button\"><p>$guest_button</p></div>";
			}
			echo "</form>";
echo "</div>";
echo "<div id=\"content_login_right\">";
echo "<div id=\"login_welcome\" class=\"bottom_separator\">
				<h3 class=\"sub_color\">" . $setting['welcome_login_title'] . "</h3>
				<p>" . $setting['welcome_login'] . "</p>
			</div>
			<div id=\"login_member_online\" class=\"top_separator\">
				<h3 class=\"member_login\">$online_count<span class=\"sub_color\"> $lang_memberin</span></h3>
			</div>";
echo "</div>";

?>