<?php
$load_setting = 'id, timezone, allow_theme, default_theme, language';
$load_user = 'user_name, user_theme, user_rank, facebook, pinterest, google, instagram, flickr, tumblr, youtube, twitter, linkedin';
require_once("config_lite.php");

$soerror = 0;
$me = $user['user_name'];
if( isset($_POST['set_facebook']) && isset($_POST['set_twitter']) 
&& isset($_POST['set_pinterest']) && isset($_POST['set_google']) 
&& isset($_POST['set_youtube']) && isset($_POST['set_linkedin']) 
&& isset($_POST['set_tumblr']) && isset($_POST['set_instagram']) 
&& isset($_POST['set_flickr'])){


	$facebook = $mysqli->real_escape_string(trim($_POST['set_facebook']));
	$twitter = $mysqli->real_escape_string(trim($_POST['set_twitter']));
	$google = $mysqli->real_escape_string(trim($_POST['set_google']));
	$instagram = $mysqli->real_escape_string(trim($_POST['set_instagram']));
	$youtube = $mysqli->real_escape_string(trim($_POST['set_youtube']));
	$tumblr = $mysqli->real_escape_string(trim($_POST['set_tumblr']));
	$flickr = $mysqli->real_escape_string(trim($_POST['set_flickr']));
	$linkedin = $mysqli->real_escape_string(trim($_POST['set_linkedin']));
	$pinterest = $mysqli->real_escape_string(trim($_POST['set_pinterest']));
	
	if($facebook == $user['facebook'] && $twitter == $user['twitter'] && $google == $user['google'] && $instagram == $user['instagram'] 
	&& $youtube == $user['youtube'] && $tumblr == $user['tumblr'] && $flickr == $user['flickr'] && $linkedin == $user['linkedin'] && $pinterest == $user['pinterest']){
		echo 99;
		die();
	}
	
	function validLink($tsocial, $sotype) {
		switch ($sotype) {
			case 'facebook': $socheck= 'facebook.com'; break;
			case 'twitter': $socheck= 'twitter.com'; break;
			case 'youtube': $socheck= 'youtube.com'; break;
			case 'instagram': $socheck= 'instagram.com'; break;
			case 'google': $socheck= 'plus.google.com'; break;
			case 'flickr': $socheck= 'flickr.com'; break;
			case 'tumblr': $socheck= 'tumblr.com'; break;
			case 'pinterest': $socheck= 'pinterest.com'; break;
			case 'linkedin': $socheck= 'linkedin.com'; break;
		}
		if($tsocial !== ''){
			if( strpos(' ' .  $tsocial, 'http://' . $socheck) || strpos(' ' .  $tsocial, 'https://' . $socheck) || strpos(' ' .  $tsocial, 'http://www.' . $socheck) || strpos(' ' .  $tsocial, 'https://www.' . $socheck)){
				return $tsocial;
			}
			else {
				return 'bad';
			}
		}
		else {
			return '';
		}
	}
	$facebook = validLink($facebook, 'facebook');
	$youtube = validLink($youtube, 'youtube');
	$linkedin = validLink($linkedin, 'linkedin');
	$google = validLink($google, 'google');
	$instagram = validLink($instagram, 'instagram');
	$flickr = validLink($flickr, 'flickr');
	$tumblr = validLink($tumblr, 'tumblr');
	$pinterest = validLink($pinterest, 'pinterest');
	$twitter = validLink($twitter, 'twitter');
	
	if($facebook == 'bad' || $youtube == 'bad' || $linkedin == 'bad' || $google == 'bad' || $instagram == 'bad' || $flickr == 'bad' || $tumblr == 'bad' || $pinterest == 'bad' || $twitter == 'bad'){
		$soerror = 1;
	}
	if($soerror < 1){
		$mysqli->query("UPDATE users SET facebook = '$facebook', youtube = '$youtube', linkedin = '$linkedin'
		, google = '$google', instagram = '$instagram', flickr = '$flickr', tumblr = '$tumblr', pinterest = '$pinterest', twitter = '$twitter' WHERE user_name = '$me'");
		echo 1;
	}
	else {
		echo 2;
	}
}

?>