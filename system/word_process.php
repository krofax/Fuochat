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
$load_user = 'user_name, user_theme, user_access, user_rank';
require_once("config_lite.php");

// add bad word to the database 
if(isset($_POST['word']) && $user['user_rank'] >= 4 && $user['user_access'] > 3){
	
	$word = $mysqli->real_escape_string(trim($_POST['word']));
	$mysqli->query("INSERT INTO `filter` (word) VALUES ('$word')");

}
// delete badword from the database
if(isset($_POST['delete_word']) && $user['user_rank'] >= 4){
	
	$word = $mysqli->real_escape_string(trim($_POST['delete_word']));
	$mysqli->query("DELETE FROM `filter` WHERE `word` = '$word'");

}


?>