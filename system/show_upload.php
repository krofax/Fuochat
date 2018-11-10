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
$load_setting = 'timezone, allow_theme, default_theme, language, domain';
$load_user = 'user_name, user_theme, user_access, user_roomid';
require_once("config_lite.php");

if($access == "off"){
	die();
}
$dirname = $user['user_name'];
$filename = "../upload/" . $dirname . "/";

// check if user directory exist if not create it

if(!file_exists($filename)){
	$oldmask = umask(0);
	mkdir("../upload/" . $dirname, 0755);
	umask($oldmask); 
}


$picturepath = "../upload/$dirname/";
$filepath = "upload/$dirname/";
define('IMAGEPATH', $picturepath);

// scan directory for files if  not empty sort and display

$files_in_directory = scandir(IMAGEPATH);
$items_count = count($files_in_directory);
if ($items_count <= 2)
{
    $empty = 1;
}
else {
    $empty = 0;
}
	if($empty < 1){
		foreach(glob(IMAGEPATH.'*') as $filename){
		  $files[filemtime($filename)] = $filename;
		}

		krsort($files);
		foreach($files as $filename) {
		$filesizepath = filesize("$filename");
		$filesizepath = $filesizepath / 1024;
		$filesizepath = round($filesizepath);
		$fileshowname = basename($filename);
		$filenameonly = str_replace(array('.jpg','.png','.gif'),'',basename($filename));
						echo "<div class=\"image_container sub_element hover_element\">";
								echo  "<div class=\"view_image\"><a href=\"{$setting['domain']}/$filepath" . "$fileshowname\" class=\"icon_photo see_image fancybox\"><i class=\"icon_photo fa fa-2x fa-search\"></i></a></div>";
								echo  "<div class=\"copy_image\"><i value=\"{$setting['domain']}/$filepath" . "$fileshowname\" class=\"icon_photo copy_link fa fa-2x fa-scissors\"></i></div>";
								echo  "<div class=\"link_image\"><p>$filenameonly</p></div>";
								echo "<div class=\"delete_image\"><i value=\"$fileshowname\" class=\"remove_element close_room remove_image fa fa-2x fa-close\"></i></div>";
						echo "</div>";
		}
	}
	else {
		echo "$no_images";
	}
?> 