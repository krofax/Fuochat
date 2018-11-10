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
$load_setting = 'timezone, allow_theme, default_theme, language, file_weight, max_host';
$load_user = 'user_name, user_theme, user_access, upload_access, upload_count';
require_once("config_lite.php");
if($user['upload_access'] != 1){ die(); }
?>
<?php
$uppath = $user["user_name"];
$picturepath = "../upload/$uppath/";
define('IMAGEPATH', $picturepath);
$ratio = $user["upload_count"];
$messageerreur = "";
$max = $setting['file_weight'];

if (isset($_FILES["file"])){
$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$size = round((($_FILES["file"]["size"] / 1024) / 1024), 2);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
|| ($_FILES["file"]["type"] == "image/JPG")
&& in_array($extension, $allowedExts))
  {
	if ($_FILES["file"]["error"] > 0)
	{
				echo 6;
	}
	else
	{
		$tempname = $_FILES["file"]["tmp_name"];
		$imginfo = getimagesize($tempname);
		if ($imginfo !== false) {
	
		if (file_exists("../upload/$uppath/" . str_replace(str_split('\\/:*?"<>_$-@&%|'), '' , preg_replace('/\s+/', '', $_FILES["file"]["name"]))))
								  {
								  echo 4; 
								  }
								  
		else if ($ratio >= $setting['max_host']){
								echo 3;
		
		
		}
		else if ((($_FILES["file"]["size"] / 1024)/1024) > $max){
		
							echo 2;
		
		}
								else
								  {
									$ext = explode('.',$_FILES['file']['name']);
									$extension = $ext[1];
									if($extension == 'jpg' || $extension == 'png' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'pjpeg' || $extension == 'x-png'){
										$extension = $extension;
									}
									else {
										echo 1;
										die();
									}
									$upfile = preg_replace("/[^A-Za-z0-9 ]/", '', $ext[0]);
									$finalup = $upfile . "." . $extension;
								  $file_name = str_replace(str_split('\\/:*?"<>_$-@&%|'), '' , preg_replace('/\s+/', '', $finalup));
								  $file_name = str_replace('php', '',$file_name);
								  move_uploaded_file(preg_replace('/\s+/', '', $_FILES["file"]["tmp_name"]),
								  "../upload/$uppath/" . $file_name);
								  $mysqli->query("UPDATE `users` SET `upload_count` = `upload_count` + 1 WHERE `user_name` = '{$user["user_name"]}'");
								  echo 5;
								  
		}
		
		}
		else {
			echo 290347850;
			die();
		}
		
}
}
else
  {
		echo 1;
  }
}






?> 