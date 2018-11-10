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
$load_user = 'user_name, user_theme, upload_access';
require_once("config_lite.php");

if($user['upload_access'] != 1){ die(); }
?>
<?php
$uppath = $user["user_name"];
$picturepath = "upload/$uppath/";
define('IMAGEPATH', $picturepath);

if(isset($_POST['del_image'])) { 
	$filedelete = $_POST['del_image']; 
	if (strpos($filedelete,'..')){
		die();
	}
	else{
		$filedelete = str_replace(array('..'),array(''),$filedelete);
		$unlinklink = "../upload/$uppath/$filedelete";
		unlink($unlinklink);
		$mysqli->query("UPDATE `users` SET `upload_count` = `upload_count` - 1 WHERE `user_name` = '{$user["user_name"]}'");
		echo 1;
	}
}






?>