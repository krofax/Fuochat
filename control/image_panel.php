<div class="panels top_panels panelone"  id="image_panel">
	<div class="top_option bottom_separator">
		<div class="close_option">
			<i value="image_panel" class="fa fa-2x fa-close top_icon_close close_panel"></i>
		</div>
		<div class="inner_top_option">
		</div>
	</div>
	<div class="panel_element top_separator">
		<div class="bottom_separator" id="upload_top">
				<div id="introupload">
					<div id="warnupload"><p class="error"></p></div>
					<h2><?php echo $upnewimage; ?></h2>
				</div>
				<div id="formupload">
					<form action="system/file_test.php" method="post" enctype="multipart/form-data">
						<input type="file" name="file" id="file_image"><br>
						<button class="submit_image sub_button hover_element" type="submit" name="image_submit"><?php echo $submitimage; ?></button>
					</form>
				</div>
		</div>
		<div class="top_separator" id="upload_bottom">
		</div>
	</div>
	<div class="clear_panel">
	</div>
</div>