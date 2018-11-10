<div id="wrap_options" class="option_add background_menu_footer">
	<div id="option_title">
		<p></p>
	</div>
	<div id="addon_container" class="top_separator">
		<?php include('base_options.php'); ?>
		<?php
			if($setting['version'] >= 4){
				$load_icon = $mysqli->query("SELECT `name` FROM `addons` WHERE `id` > 0");
				if($load_icon->num_rows > 0){
					while ($list_icon = $load_icon->fetch_assoc()){
						include("addons/" . $list_icon['name'] . "/data/icon.php");
					}
				}	
			}
		?>
		<div class="clear">
		</div>
	</div>
	<div class="clear">
	</div>
</div>