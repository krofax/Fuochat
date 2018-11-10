<div id="my_menu">
	<div id="menu">
		<?php if( $user['user_rank'] > 4 ){
			echo '<div title="' . $tipsettings . '" id="open_setting" value="main_option"  class="other_panels">
					<i class="fa ic_setting fa-2x fa-cogs icon_bottom"></i>
				</div>';
			}
		?>
		<?php if($user['guest'] < 1){
			echo '<div title="' . $tipprofile . '" class="account_button other_panels" value="tools_panel"  id="open_tools">
				<i class="fa fa-2x ic_profile fa-pencil-square icon_bottom"></i>
			</div>';
			}
		?>
		<div title="<?php echo $tipchat; ?>" class="addon_button" style="position:relative;" value="chat_panel"  id="open_chat">
			<i class="icon_new_private ic_userlist fa fa-2x fa-comments icon_bottom"></i>
			<div id="private_count"><p style="padding-top:3px;">45</p></div>
		</div>
		<?php if($user['guest'] < 1){
			echo '<div id="open_option" value="option_tab" class="load_option">
					<i class="fa fa-2x ic_plus fa-plus-circle opt_open icon_bottom"></i>
			</div>';
			}	
		?>
		<?php 
		if($player['use_player'] == 1){
			include('player.php');
		}
		?>
		<div title="<?php echo $tipquit; ?>" class="logout_button">
			<i class="fa ic_logout fa-2x fa-sign-out icon_bottom_out"></i>
		</div>

	</div>
</div>