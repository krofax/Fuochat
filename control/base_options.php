<?php 
	if($user['upload_access'] == 1 && $user['user_rank'] >= $setting['allow_image'] && $user['guest'] != 1){
		echo "<div id=\"open_video\" value=\"image_panel\" class=\"addon_options other_panels\">
			<img value=\"$icoupload\" src=\"./$icon_path/image.png\"/>
		</div>";
	}
?>
<?php if($setting['allow_history'] == 1){
echo "<div id=\"open_history\" value=\"history_panel\" class=\"addon_options other_panels\">
		<img value=\"$icohistory\" src=\"./$icon_path/history.png\"/>
	</div>";
	}	
?>
<?php
	if($setting['allow_theme'] == 1){
		echo "<div id=\"open_theme\" value=\"theme_panel\"  class=\"addon_options other_panels\">
			<img  value=\"$icotheme\" src=\"./$icon_path/theme.png\"/>
	</div>";
	}
?>
<div id="open_help" value="help_panel" class="addon_options other_panels">
		<img value="<?php echo "$icohelp"; ?>" src="./<?php echo $icon_path; ?>/help.png"/>
</div>
<?php
	if($user['guest'] !== 1 && $user['user_access'] == 4){
		echo "<div id=\"open_ignore\" value=\"ignore_panel\" class=\"addon_options other_panels\">
				<img value=\"$icoignore\" src=\"./$icon_path/ignore.png\"/>
		</div>";
	}
?>