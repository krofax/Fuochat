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
$load_user = 'user_name, user_theme, user_access';
require_once("config_lite.php");
?>

<?php 
	if ($user["user_access"] == 4){
		$target = $mysqli->real_escape_string(trim($_POST['target']));
		$me = $user["user_name"];
		$mysqli->query("UPDATE `private` SET `status` = 3, `view` = 1  WHERE `hunter` = '$target' AND `target` = '$me'");
		echo 1;
	}
	else {
		die();
	}

?>