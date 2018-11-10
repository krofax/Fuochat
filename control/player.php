<?php if($player['player_status'] == 1){
	$def_player = 'fa-pause';
	$def_player_value = '1';
}
else {
	$def_player = 'fa-play';
	$def_player_value = '0';
}
?>
<div id="playbtn" value="<?php echo $def_player_value; ?>" class="load_option">
	<i id="control_button" value="0" class="fa ic_play fa-2x <?php echo $def_player; ?> icon_player icon_bottom"></i>
</div>
<div id="sound_control" value="2" class="load_option">
	<i id="control_volume" class="fa fa-2x fa-volume-down ic_vol icon_player icon_bottom"></i>
</div>