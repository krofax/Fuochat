<div id="wrap_login">
	<div id="container_login" class="background_login">
		<div id="header_login" class="bottom_separator">
		</div>
		<div id="content_login" class="top_separator">
			<div id="login_error"><div class="error" id="login_error_inside"></div></div>
			<div id="content_login_left">
				<form class="login_form" autocomplete="off">
					<input style="display:none">
					<input type="password" style="display:none">
					<p class="login_label"><?php echo $lang_username; ?></p>
					<input id="user_username" class="input_data background_box" type="text" maxlength="50" name="username">
					<p class="login_label"><?php echo $lang_password; ?></p>
					<input id="user_password" class="input_data background_box" maxlength="30" type="password" name="password"><br />
					<p class="login_label sub_color forgot_password"><?php echo $lang_forgot; ?></p>
					<div id="login_control">
						<div class="sub_button hover_element" id="login_button"><p><?php echo $lang_login; ?></p></div>
						<?php if($setting['registration'] == 1){
						echo "<div id=\"login_register\"><p>$lang_register</p></div>";
						}
						echo "<div class=\"clear\"></div>";
						if($setting['allow_guest'] == 1){
							echo "<div class=\"sub_button hover_element\" id=\"guest_button\"><p>$guest_button</p></div>";
						}
						?>
					</div>
				</form>
			</div>
			<div id="content_login_right">
				<div id="login_welcome" class="bottom_separator">
					<h3 class="sub_color"><?php echo $setting['welcome_login_title']; ?></h3>
					<p><?php echo $setting['welcome_login']; ?></p>
				</div>
				<?php 
					$count_online = $mysqli->query("SELECT user_id FROM users WHERE user_status < '3'");
					$online_count = $count_online->num_rows;			
				?>
				<div id="login_member_online" class="top_separator">
					<h3 class="member_login"><?php echo $online_count; ?><span class="sub_color"> <?php echo $lang_memberin; ?></span></h3>
				</div>
				
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php 
	if($setting['rules'] == 1){
		include('rules_panel.php'); 
	}
	?>
</div>
<script type="text/javascript" src="js/login.js"></script>