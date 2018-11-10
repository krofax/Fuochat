<?php
	if($user['user_access'] == 4 && $user['guest'] != 1 || $user['guest'] == 1 && $setting['allow_guest'] == 1 && $setting['guest_chat'] == 1 && $user['user_access'] == 4 || $user['guest'] != 1 && $user['verified'] == 1 && $user['user_access'] == 4){
		echo "<input class=\"background_box\" type=\"text\" name=\"content\" maxlength=\"{$setting['max_message']}\" id=\"content\" autocomplete=\"off\"/>
		<button type=\"submit\" class=\"sub_button\" id=\"submit_button\">$lang_submit</button>";

	}
	else {
		echo "<input class=\"background_box\" type=\"text\" name=\"content\" maxlength=\"{$setting['max_message']}\" id=\"content\" autocomplete=\"off\" disabled/>
		<button type=\"submit\" class=\"sub_button\" id=\"submit_button\" disabled >$lang_submit</button>";
	}
?>