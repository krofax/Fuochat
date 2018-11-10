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
$load_setting = 'allow_avatar, allow_private, allow_theme, default_theme, language, timezone, allow_ignore, allow_friend';
$load_user = 'user_access, user_rank, user_roomid, user_name, user_theme, guest';
require_once("config_lite.php");


if($user["user_access"] >= 1 && $access == 'on'){
	$user_list = $mysqli->query("SELECT user_name, user_color, user_rank, alt_name, user_tumb, user_status, user_access FROM `users` WHERE `user_roomid` = {$user["user_roomid"]}  AND `user_status` <= 2 AND `user_access` != 2 AND `user_access` != 0 ORDER BY `user_status` ASC, `user_rank` DESC, `user_name` ASC ");
	if ($user_list->num_rows > 0)
	{
		echo "<div id=\"container_user\">";
		echo "<ul>";
		while ($list = $user_list->fetch_assoc())
		{
			if($list["alt_name"] == ""){
				$alt = "$notsetyet";
			}
			else{
			
				$alt = $list["alt_name"];
			}
			$uavatar = $list['user_tumb'];
			if($uavatar == "default_avatar_tumb.png" || $list['user_rank'] < $setting['allow_avatar']){
				$avatar_path = "$icon_path";
				$uavatar = "default_avatar_tumb.png";
			}
			else {
				$avatar_path = "avatar";
			}
			$avatar = "<img class=\"avatar_userlist\" src=\"$avatar_path/$uavatar\"/>";
			if($list['user_status'] == 1){
				$away = $list['user_color'];
			}
			else {
				$away = "away";
			}
				if($list['user_access'] == 1){
					echo "<li class=\"users_option\">
							<div class=\"open_user  hover_element sub_element\">
								$avatar<p title=\"$alt\" class=\"$away usertarget\" id=\"{$list["user_name"]}\"><s>{$list["user_name"]}</s></p>
							</div>
							<div class=\"option_list\">
								<ul class=\"user_option_list\">";
									echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_info\" value=\"{$list["user_name"]}\">$usinfo</p></li>";
									if($list['user_name'] !== $user['user_name']){ 
										if($user['user_rank'] >= 3){
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_unmute\" value=\"{$list["user_name"]}\">$usunmute</p></li>";
										}
										if($user['user_rank'] > 4){
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_kill\" value=\"{$list["user_name"]}\">$usdelete</p></li>";
										}
									}
								echo "</ul>
							</div>
						</li>";	
				}
				else {
					echo "<li class=\"users_option\">
							<div class=\"open_user  hover_element sub_element\">
								$avatar<p title=\"$alt\" class=\"$away usertarget\" id=\"{$list["user_name"]}\">{$list["user_name"]}</p>
							</div>
							<div class=\"option_list\">
								<ul class=\"user_option_list\">";
									echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_info\" value=\"{$list["user_name"]}\">$usinfo</p></li>";
									if($list['user_name'] !== $user['user_name']){ 
										if($list['user_rank'] >= $setting['allow_private'] && $user['user_rank'] >= $setting['allow_private']){ 
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"send_private\" value=\"{$list["user_name"]}\">$usprivate</p></li>"; 
										}
										if( $list['user_rank'] < 3 && $user['guest'] != 1 && $user['user_rank'] >= $setting['allow_ignore']){
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_ignore\" value=\"{$list["user_name"]}\">$usignore</p></li>";
										}
										if( $user['guest'] != 1 && $user['user_rank'] >= $setting['allow_friend']){
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_friends\" value=\"{$list["user_name"]}\">$usfriends</p></li>";
										}
										if($user['user_rank'] >= 3){
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_mute\" value=\"{$list["user_name"]}\">$usmute</p></li>";
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_kick\" value=\"{$list["user_name"]}\">$uskick</p></li>";
										}
										if($user['user_rank'] > 3){
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_ban\" value=\"{$list["user_name"]}\">$usban</p></li>";
										}
										if($user['user_rank'] > 4){
											echo "<li class=\"sel_user user_option_separator hover_element\"><p class=\"get_kill\" value=\"{$list["user_name"]}\">$usdelete</p></li>";
										}
									}
								echo "</ul>
							</div>
						</li>";						
				}
		}	
		echo "</ul><div class=\"clear\"></div></div>";
	}
}
else {
	echo "<ul>
			<li>Room empty</li>
		</ul>";
}


?>