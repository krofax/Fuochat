<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/manual.css" />
</head>
<body>
<div id="wrap_manual">
	<img class="logo_manual" src="../Default_logo/Default.png"/>
	<h1></h1>
	<h2>Table of content</h2>
	<div class="section top_separator">
		<ul>
			<li><a href="#part1">Commands</a></li>
			<li><a href="#part2">Ranking</a></li>
			<li><a href="#part3">Private chat</a></li>
			<li><a href="#part4">Rooms</a></li>
			<li><a href="#part5">Avatar system</a></li>
			<li><a href="#part8">Themes</a></li>
			<li><a href="#part10">Flood</a></li>
			<li><a href="#part44">Addons</a></li>
		</ul>
		<ul>
			<li><a href="#part11">Settings</a></li>
			<li><a href="#part12">Emoticons</a></li>
			<li><a href="#part13">Hidden options</a></li>
			<li><a href="#part6">Private notification</a></li>
			<li><a href="#part7">User profile</a></li>
			<li><a href="#part14">Delete a post</a></li>
			<li><a href="#part15">Credits</a></li>
			<li><a href="#part45">Whistle</a></li>
			
		</ul>
		<ul>
			<li><a href="#part16">Copyright</a></li>
			<li><a href="#part27">Welcome message</a></li>
			<li><a href="#part28">Ads feature</a></li>		
			<li><a href="#part29">Chat orientation</a></li>
			<li><a href="#part30">Change avatar</a></li>
			<li><a href="#part31">Guest access</a></li>
			<li><a href="#part32">Ban by cookie</a></li>
			<li><a href="#part43">Silent mode</a></li>
		</ul>
		<ul>
			<li><a href="#part33">Email verification</a></li>
			<li><a href="#part34">Duplicate email block</a></li>
			<li><a href="#part35">Ignore feature</a></li>
			<li><a href="#part40">Chat speed</a></li>
			<li><a href="#part41">Invisibility mode</a></li>
			<li><a href="#part42">Room access</a></li>
			<li><a href="#part46">Friends list</a></li>
			<li><a href="#part49">Radio stream</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<a name="part1"></a>
	<h2>List of commands available with Boomchat</h2>
	<div class="section top_separator">
		<p>Note : Higher rank can use commands of lower rank.
			<h2 class="setting_title">User & VIP commands level 1-2</h2>
				<table>
					<tr><td class="title">/me</td><td class="description">Send a special message on the chat. The message will appear in a different 
						colour to the normal post<br /><span class="note">Syntax : /me text</span></td></tr>
					<tr><td class="title">/msg </td><td class="description">Send a private message directly to the cat. Private message you send or receive can not be viewed by other users, only you and target can view these messages<br /><span class="note">Syntax : /msg username text</span></td></tr>
					<tr><td class="title">/seen</td><td class="description">Lets you know the time and date on which a user has been seen on the chat for the last time. Must be followed by a valid username.<br /><span class="note">Syntax : /seen username</span></td></tr>
					<tr><td class="title">/away </td><td class="description">Change the status of your account to away<br /><span class="note">Syntax : /away</span></td></tr>
					<tr><td class="title">/ignore</td><td class="description"> Hide chat and private content from the specified user<br /><span class="note">Syntax : /ignore username</span></li>
					<tr><td class="title">/ignoreclear</td><td class="description">Reset and remove all users from your ignore list<br /><span class="note">Syntax : /ignoreclear</span></li>
					<tr><td class="title">/friend</td><td class="description">Add a user to your user friends list<br /><span class="note">Syntax : /friend username</span></li>
					<tr><td class="title">/clear</td><td class="description">This command can only be used in private chat by users that will clear the conversation and reset the private log data refer to level 3 to know more about other function for moderator and admin with the /clear command <br /><span class="note">Syntax : /clear</span></li>
				</table>
			<h2 class="setting_title">Moderator commands level 3</h2>
				<table>
					<tr><td class="title">/clear</td><td class="description">use the /clear command to clear the current room chat history<br /><span class="note">Syntax : /clear</span></td></tr>
					<tr><td class="title">/kick</td><td class="description">Kick a user out of the chat forcing him/her to relog to be able to chat again<br /><span class="note">Syntax : /kick username (optional message)</span></td></tr>
					<tr><td class="title">/mute</td><td class="description">Block user from writing in both private and main chat but will 
						allow him/her to see main chat.<br /><span class="note">Syntax : /mute username</span></td></tr>
					<tr><td class="title">/unmute</td><td class="description">Gives back writing 
						privileges to a user. Moderator can only unmute their own muted user.<br /><span class="note">Syntax : /unmute username</span></td></tr>
					<tr><td class="title">/topic</td><td class="description">Change the current room topic.<br /><span class="note">Syntax : /topic text</span></li>
					<tr><td class="title">/setvip</td><td class="description">Gives 
						VIP status to a user.<br /><span class="note">Syntax : /setvip username</span></li>
				</table>
			<h2 class="setting_title">Administrator commands level 4</h2>
				<table>
					<tr><td class="title">/clear all</td><td class="description">use the "/clear all" command to clear all rooms log at the same time.<br /><span class="note">Syntax : /clear all</span></td></tr>
					<tr><td class="title">/ban</td><td class="description">Ban the user from the chat and the user can not reconnect.<br /><span class="note">Syntax : /ban username</span></td></tr>
					<tr><td class="title">/rename</td><td class="description">Change the name of the current room. The room name must contain less than 30 
						characters to be valid. <br /><span class="note">Syntax : /rename roomname</span></td></tr>
					<tr><td class="title">/global</td><td class="description">Send a message to all rooms at the same time.<br /><span class="note">Syntax : /global text</span></td></tr>
					<tr><td class="title">/setuser</td><td class="description">Demote a user to the user rank.<br /><span class="note">Syntax : /setuser username</span></td></tr>
					<tr><td class="title">/setmod</td><td class="description">Gives moderator 
						privileges to specified user.<br /><span class="note">Syntax : /setmod username</span></td></tr>
					<tr><td class="title">/upon</td><td class="description">Give back 
						privilege to a specific user of uploading file to server<br /><span class="note">Syntax : /upon username</span></td></tr>
					<tr><td class="title">/manual</td><td class="description"> Show the chat manual<br /><span class="note">Syntax : /manual</span></li>
					<tr><td class="title">/upoff</td><td class="description">Remove 
						privilege to a specific user of uploading file to server<br /><span class="note">Syntax : /upoff username</span></td></tr>
					<tr><td class="title">/invisible</td><td class="description">Hide yourself from all the rest of the chat 
						so they wont know you are online<br /><span class="note">Syntax : /invisible</span></td></tr>
					<tr><td class="title">/visible</td><td class="description">Remove the invisibility on yourself 
						and then people will now be able to see you online<br /><span class="note">Syntax : /visible</span></td></tr>
				</table>
			<h2 class="setting_title">SuperAdmin commands level 5</h2>
				<table>
					<tr><td class="title">/setadmin</td><td class="description">Gives Admin 
						privileges to specified user.<br /><span class="note">Syntax : /setadmin username</span></td></tr>
					<tr><td class="title">/addtheme</td><td class="description">Once your new 
						CSS theme file created and placed in theme folder you can add theme by using this command without file 
						extension<br /><span class="note">Syntax : /addtheme themename</span></td></tr>
					<tr><td class="title">/deltheme</td><td class="description">Remove a theme from the theme list<br /><span class="note">Syntax : /deltheme themename</span></td></tr>
					<tr><td class="title">/gsound</td><td class="description">Send a sound notification to all members<br /><span class="note">Syntax : /gsound</span></td></tr>
					<tr><td class="title">/install</td><td class="description">This command is used when installing a addon to chat<br /><span class="note">Syntax : /install addons_name</span></td></tr>
					<tr><td class="title">/update</td><td class="description">This command will be used in release after 
						Boomchat 4.0 to update the chat.<br /><span class="note">Syntax : /update</span></td></tr>
					<tr><td class="title">/silent</td><td class="description">
						Put the chat in silent mode can be turned on or off by 
						using<br /><span class="note">Syntax : /silent on/off</span></td></tr>
					<tr><td class="title">/setsuperadmin</td><td class="description">Give superadmin status to a user. 
						This command must be reversed manually in the database<br /><span class="note">Syntax : /setsuperadmin username</span></td></tr>
				</table>
	</div>
	<a name="part2"></a>
	<h2>Users ranking</h2>
	<div class="section top_separator">
			<table>
				<tr><td class="title guest">Guest</td><td class="description">Rank level 1 given to all new guest, cannot kick, mute or ban.</td></tr>
				<tr><td class="title user">User</td><td class="description">Rank level 1 given to all new members, cannot kick, mute or ban.</td></tr>
				<tr><td class="title vip">VIP</td><td class="description">Rank level 2 given 
					to a member so they have the same privileges as a normal user but have different 
					colours</td></tr>
				<tr><td class="title modo">Moderator</td><td class="description">Rank level 3, moderator cannot be muted by 
					another moderator, but can be demoted by admin and superadmin</td></tr>
				<tr><td class="title admin">Admin</td><td class="description">Rank level 4. Can do almost everything 
					except changing site settings and cannot set user to admin. This rank cannot be kicked, banned 
					or muted by lower or equal rank.</td></tr>
				<tr><td class="title sadmin">SuperAdmin</td><td class="description">Rank level 5, cannot be banned, kicked or muted and is not affected by any of 
					the chat settings. This rank has the ultimate access to everything and the power to demote any of other rank user.</td></tr>
			</table>
	</div>
	<a name="part3"></a>
	<h2>Private chat</h2>
	<div class="section top_separator">
		<h3>Private message in main chat</h3>
		<p>With the command <span class="note">/msg</span> followed by a valid username, you can send a private message directly to the main chat window. Private message sent in the main chat window cannot be viewed by other users.</p><br />
		<h3>Private chat window</h3>
		<p>To open a private chat with a user, click on a username in the user list, then on the slide down menu click on private chat</p>
	</div>
	
	<a name="part4"></a>
	<h2>Managing rooms</h2>
	<div class="section top_separator">
		<h3>Add room</h3>
		<p>In<span class="note"> settings</span> panel, to create a new room, 
		click on room icon at the top.<span class="note"> Name must be under 30 
		characters.<span></p>
		<h3>Delete a room</h3>
		<p>In <span class="note">settings</span> panel, to delete a room, click 
		on room icon at the top, and simply click the X icon on side of room name you want to remove</p>
		<h3>Rename room</h3>
		<p>You can rename a room using the <span class="note">/rename</span> Command<span class="note">Room name must be under 30 
		characters.<span></p>
	</div>
	<a name="part46"></a>
	<h2>Friends list</h2>
	<div class="section top_separator">
		<h3>Adding a friend</h3>
		<p>In Boomchat you can now add users to your friends list in 3 different ways 1- 
		Click on a username in the user list, then select option add to friend 2- 
		Type the /friend command in chat followed by username you desire to add to your friends list 3- 
		Click on add friends icon located on top of the private window.</p>
		<h3>Pending friend request</h3>
		<p>Once someone send you a friend request you will see it apear in your pending friend section you will have choice to accept or decline the friend request. You can view friend request profile by clicking the avatar on the request box.</p>
		<h3>Removing friend</h3>
		<p>In the drop down menu of your friends you will have option to delete friend from your list. When removing a user from your friend list it will automaticly remove yourself from his/her friend list.</p>
		<h3>Friends status</h3>
		<table>
			<tr><td class="title"><img style="height:40px; width:auto;" src="../Default_logo/online.png"/></td><td class="description">Online</td></tr>
			<tr><td class="title"><img style="height:40px; width:auto;" src="../Default_logo/away.png"/></td><td class="description">Away</td></tr>
			<tr><td class="title"><img style="height:40px; width:auto;" src="../Default_logo/gone.png"/></td><td class="description">Offline</td></tr>
		</table>
	</div>
	<a name="part44"></a>
	<h2>Addons</h2>
	<div class="section top_separator">
		<h3>Where you can find addons</h3>
		<p>Addons is a brand new feature in <span class="note">Boomchat 4.0. You can add 
		different addons to your current Boomchat site. To learn more about addons 
		please visit us at our live demo.</p>
		<h3>Adding addons to Boomchat</h3>
		<p>Adding addons to Boomchat is very easy. All you have to do is put the addon inside the addons folder 
		on your server, then go into your chat room and type <span class="note">/install addons_name</span> 
		.Boomchat will then check if that addons exists and will then install it for 
		you to your current chat. <span class="note">Important note:</span> When adding addons 
		its important to put your chat on maintenance mode to stop any PHP 
		errors.</p>
		<h3>Removing a addons</h3>
		<p>Removing an addons from your chat is almost the same process as installing it. 
		All you have to do is simply type <span class="note">/uninstall addons_name</span> in your main chat window. After uninstalling addons 
		we strongly suggest you to remove the specific addon folder from the addons directory of boomchat. Important note: When adding addons 
		its important to put your chat on maintenance mode again to stop any PHP 
		errors.</p>
	</div>
	<a name="part43"></a>
	<h2>Silent mode</h2>
	<div class="section top_separator">
		<h3>Activate the silent mode</h3>
		<p>The silent mode is a new tool for admins to put chat into silent 
		mode. This is very useful if you want to talk to all members in the chat 
		without any interruptions. To activate the silent mode you have to type <span class="note">/silent on<span> in the main chat window. then all members that are not moderator, admin , superadmin 
		will not be able to type during silent mode.</p>
		<h3>Removing the silent mode</h3>
		<p>To remove the silent mode from your chat, simply type <span class="note"> /silent off</span> in main chat window. that will put the chat back to normal and allow all members to talk.</p>
	</div>
	<a name="part5"></a>
	<h2>Avatar system</h2>
	<div class="section top_separator">
		<p>Boomchat comes with a built in avatar system that allow user to set their own avatars. You can set the maximum size of allowed avatar, by going in 
		your settings panel then selecting the maximum size from the select menu, 
		after you have done this, press the update settings button. When updating
		a new avatar to your account, the old avatar is automatically replaced by the new one.</p>
	</div>
	<a name="part45"></a>
	<h2>Whistle</h2>
	<div class="section top_separator">
		<p>Another brand new feature is the whistle function. Why not send a sound notification to all chat members at same time by using the <span class="note">/gsound</span> 
		in the main chat window. Once the command has been sent, it will whistle 
		to all members who are online.</p>
	</div>
	<a name="part40"></a>
	<h2>Setting your chat speed</h2>
	<div class="section top_separator">
		<p>You can now set your chat speed in Boomchat 3.0 by selecting the desired speed in your setting panel. there are 4 different speeds 
		to choose from. slow, moderate, fast, maximum you can choose between these 4 different
		setting to optimise the chat to your needs. All changes made to the 
		speed will take effect on your next refresh to prevent server load.</p>
	</div>	
	<a name="part49"></a>
	<h2>Stream radio feature</h2>
	<div class="section top_separator">
		<p>Boomchat include a build in stream player that allow you to add internet stream music to your chat. This option is available from your admin panel you can activate it or not that is up to you</p>
	<h3>Music source</h3>
	<p>In your setting panel in advance options you can set your Music source url this build in stream do not support pls url stream.</p>
	<h3>Autoplay</h3>
	<p>You can set the music to autoplay mode or not. When autoplay is activated the music stream will start automaticly when the user enter the chat.</p>
	</div>	
	
	<a name="part6"></a>
	<h2>Private notification</h2>
	<div class="section top_separator">
		<h3>Receiving a new private message</h3>
		<p>When you receive a new private message, the private icon will change 
		colour and if users have their sound enabled in their profile settings, 
		they will receive a sound private message notification. Unread messages will automatically be on top and have a different 
		colour than the other icons.</p>
	</div>
	<a name="part33"></a>
	<h2>Email verification</h2>
	<div class="section top_separator">
		<h3>Activate email verification feature</h3>
		<p>When a new user registers on your site, you can choose to ask him or 
		her to verify their account by clicking a verified email link. All users 
		must activate their account before they can enter into your chat site. 
		Please note: Guests are not be affected by the email verification system.</p>
	</div>
	<a name="part34"></a>
	<h2>Duplicate email registration</h2>
	<div class="section top_separator">
		<p>By turning this feature to NO in your settings panel, this will 
		prevent users from creating multiple accounts with the same email 
		address. Please note: This is function has been set to ON by default.</p>
	</div>
	
	<a name="part7"></a>
	<h2>User profile</h2>
	<div class="section top_separator">
		<h3>View a profile</h3>
		<p>For viewing a users profile click on a username in userlist, then from the drop down menu click on 
		the info profile panel, You can also click on the user avatar in the chat
		that will also open the user profile <span class='note'>Added in 
		Boomchat 2.2</span></p>
		<h3>Edit your profile</h3>
		<p>To edit your profile, click on user profile icon, here you will be 
		able to edit your information and select your own avatar. If you don't want to select an avatar you will be 
		attributed the default avatar.</p>
	</div>
	<a name="part41"></a>
	<h2>Invisibility mode for staff</h2>
	<div class="section top_separator">
		<h3>Hiding from chat users</h3>
		<p>New in Boomchat 3.0 the invisibility which allows you to manage your chat without anybody know that you are online. You can set yourself to invisibility mode by using the  <span class='note'>/invisible</span> command in the chat,
		you will instantly disappear out of a room where you can continue your 
		admin work.</p>
		<h3>Removing invisibility</h3>
		<p>To remove your invisibility and come back as an online users just 
		type /visible to the main chat input.</p>
	</div>
	<a name="part42"></a>
	<h2>Room access</h2>
	<div class="section top_separator">
		<h3>Create a room access</h3>
		<p>New in Boomchat 3.0. The room access allows you to create rooms and block users from accessing them . Example if you create a room in your setting panel with the rank staff only moderator and admins
		will be able to enter that room. there is 4 different setting that you can put for the room access . 
		VIP , Staff, Admin, Public.</p>
	</div>
	<a name="part27"></a>
	<h2>Welcome message</h2>
	<div class="section top_separator">
		<h3>Turning on default welcome message</h3>
		<p>Boomchat includes a feature that allows you to send a system message to all new registered members, you can turn that option on/off in your admin setting panel. You can edit your own welcome message by editing the text between ' ' in
		the <span class="note">system/language/language.php</span> file under the <span class="note">$welcome 
		message</span> variable. Please note: be careful to never remove ' ' from the variable that may cause Boomchat to not work 
		properly.</p>
	</div>
	
	<a name="part28"></a>
	<h2>Ads feature</h2>
	<div class="section top_separator">
		<h3>Adding your own ads</h3>
		<p>Boomchat includes an ads feature that allows you to show up to 5 
		different banner or text ads on your chat. Boomchat ads support ads size of <span class="note">728px by 90px</span> only. You can edit premade ads by editing ads files located in <span class="note">ads</span>
		folder. Please note that if you are using 1 ads only you need to edit ads1.php if you are using 2 ads you have to edit ads1.php and ads2.php for ads feature to work correctly. If you 
		don't know how works affiliate ads please refer to someone that can help 
		you about ads html structure or you can also come on Boomchat live demo 
		where I will more than happy to help you.</p>
		<h3>Activate ads</h3>
		<p>You can turn on the ads feature in your admin settings panel at&nbsp; 
		the bottom where it says: Activate ads feature.</p>
		<h3>Number of ads</h3>
		<p>You can determine how many ads you want to display by choosing 
		between 1 and 5 ads in the admin setting panel under the <span class="note">Number of ads used options</span>.</p>
		<h3>Ads delay</h3>
		<p>If you use more than 1 ad on your chat, you can set the delay between ads 
		by going into your admin setting panel under and choosing the ads delay.</p>
	</div>
	<a name="part35"></a>
	<h2>Ignore feature</h2>
	<div class="section top_separator">
		<h3>Ignore a user</h3>
		<p>In Boomchat there is 2 ways to ignore a user, you can simply type <span class="note">/ignore username</span> 
		or you can click on a username in the list that will open a dropdown 
		menu, where you will see the ignore option. Please note: that when you 
		ignore a user you will not be able to receive private or chat content for that user.</p>
		<h3>Ignore restriction</h3>
		<p>Super Admin, Admin and Moderators cannot be ignored, only users can 
		ignore other users.</p>
		<h3>Clear ignore list</h3>
		<p>You can clear your ignore list by typing <span class="note">/ignoreclear</span> in the chat, that will reset your complete ignore list 
		instantly.</p>
		<h3>Ignore panel</h3>
		<p>You can view all users you have in your ignore list. You have the 
		option to click the X on side of the ignored username to un-ignore them. </p>
	</div>
	<a name="part31"></a>
	<h2>Guest access</h2>
	<div class="section top_separator">
		<h3>Allowing guess access</h3>
		<p>In Boomchat you can allow guests to access your chat by selecting the option yes in your settings panel, under <span class="note">Allow guest in chat. 
		Please note:</span> that guests are randomly generated and if
		a user wants to have a personal account they must register and choose a username. Guest accounts are 
		temporarily in the database and will be deleted automatically by the system to prevent Database overload.</p>
		<h3>Guess talk or not</h3>
		<p>You can also decide to only allow guest on your chat to view the chat 
		or let them talk, click on Allow guest chat in your setting panel.</p>
		<h3>Guest delete</h3>
		<p>The system is configured to delete automatically all guests that have been not active for the given time that you can set in your admin panel under <span class="note">Clear 
		inactive guest after</span> option.</p>
	</div>
	
	<a name="part29"></a>
	<h2>Swap chat orientation</h2>
	<div class="section top_separator">
		<h3>Changing input and chat direction</h3>
		<p>You can change the orientation of your Boomchat input box in your admin setting panel under the <span class="note">Input box orientation option</span>. 
		If you choose to display the input box on the bottom, then the chat log will display from 
		the bottom also. The input box is set to the top by default. If you are using ads on your chat, 
		they will be displayed to fit your chat orientation box input.</p>
	</div>
	<a name="part30"></a>
	<h2>Changing your chat avatar</h2>
	<div class="section top_separator">
		<p>You can change your chat avatar by changing your Profile avatar, this 
		avatar will automatically be resized and then saved to your profile, 
		this will also show as a mini icon in main chat rooms.</p>
	</div>
	<a name="part8"></a>
	<h2>Themes</h2>
	<div class="section top_separator">
		<h3>settings your default theme</h3>
		<p>Boomchat comes with a number of themes that can be changed easily 
		from the admin panel. Select themes and then click on update settings. <span class="note">By default users cannot toggle theme</span></p>
		<h3>Allow theme toggle</h3>
		<p>You can turn on/off theme toggle in the <span class="note">settings</span> panel, 
		if you turn it on users will be able to switch to any theme as they wish. <span class="note"> When users switch 
		their current theme it will does not effect other users.</span></p>
		<h3>Creating a new theme</h3>
		<p>to create a theme you can edit existing theme ( suggested to create your own one to not lose work during update ) or can create your own theme by following the theme file structure then add the theme to your chat by typing
		<span class="note">/addtheme</span> followed by the name of the theme you just created.ex: </span class="note">/addtheme mytheme</span></p>
		<h3>Deleting a theme from the theme panel</h3>
		<p>If you want to remove a theme from the theme panel you simply have to type /deltheme followed by the theme name you want to remove. Example <span class="note">/deltheme themename</span></p>
	</div>
	<a name="part32"></a>
	<h2>Ban by cookie option</h2>
	<div class="section top_separator">
		<h3>Activate the Cookie ban</h3>
		<p>You can decide if you want to allow the optional cookie ban in your setting panel under <span class="note">Activate ban by cookie.</span> 
		If you activate this feature users will need to clear the cookie set for the ban in his 
		or her browser.</p>
	</div>
	<a name="part52"></a>
	<h2>Administrator users management search</h2>
	<div class="section top_separator">
		<h3>Search a user</h3>
		<p>Admins and superadmins can view a special icon located on top of the userlist to search users. This module will allow you to change name, remove avatar, change password, change email, kick, ban, mute or delete account of a specified user.
		Please note that you wont be able to edit your own profile or the profile of a equal or higher ranked member from that panel. To edit your profile please refer to the profile panel.</p>
	</div>
	<a name="part53"></a>
	<h2>Social medias</h2>
	<div class="section top_separator">
		<p>New in boomchat 6.0 you can now add up to 9 of the most popular social media link to your profile. Only valid field will apear in your profile for other users to view</p>
	</div>
	<a name="part54"></a>
	<h2>Username change</h2>
	<div class="section top_separator">
		<p>New in boomchat 6.0 you can allow or not your members to change their username from their profile. When a member change his/her name the system will notify all other user in the current room of the change. Also note
		that the last name used by the user will be reserved and noone will be able to use the reserved name until the user change his name again. This feature can be limited for a specific user rank.</p>
	</div>
	<a name="part10"></a>
	<h2>Flood protection</h2>
	<div class="section top_separator">
		<p>Boomchat have an integrated  flood detector. When a user type 5 or more lines within a preset given time the system will automatically mute 
		a user for a specific time that you can set in the settings panel.
	</div>
	
	<a name="part11"></a>
	<h2>Settings options</h2>
	<div class="section top_separator">
		<h3>settings panel</h3>
		<h2 class="setting_title">Site main settings</h2>
		<table>
			<tr><td class="title">Site title</td><td class="description">Change your site title that will appear on the top of the browser page</td></tr>
			<tr><td class="title">Index path</td><td class="description">This option must be set correctly to allow file uploads to your server, if you have installed boomchat in the root of your host, simply enter your domain name<span class="note"> ex: www.boomchat.ca</span><br />If you have installed boomchat in a sub-directory of your host, you must set that option like this<span class="note"> ex: www.boomchat.ca/mychat</span></td></tr>
			<tr><td class="title">Timezone</td><td class="description">Set the current time of message in chat.</td></tr>
			<tr><td class="title">Turn on/off site maintenance</td><td class="description">Can be turned <span class="note">on/off</span> this option will let only moderator/admin/superadmin enter the chat other will see a maintenance message.</td></tr>
			<tr><td class="title">Turn on/off user registration</td><td class="description">You can turn registration on or off for new users on your chat, when off no new user will be allowed to register at your site.</td></tr>
			<tr><td class="title">News title</td><td class="description">Change the title of the news of your login / registration page.</td></tr>
			<tr><td class="title">News message</td><td class="description">Change the message of your login / registration page.</td></tr>
		</table>
		<h2 class="setting_title">Registration</h2>
		<table>
			<tr><td class="title">Min age to register</td><td class="description"> Set the mimimum age required to register to your chat ( full form must be activated ).</td></tr>
			<tr><td class="title">Use full registration form</td><td class="description">Allow you to use the normal or extended registration form for your chat.</td></tr>
			<tr><td class="title">Display rules/agreements</td><td class="description">You can choose to display agreement / rules in your registration... note that this feature can affect both extended or regular registration form</td></tr>
			<tr><td class="title">Ask confirmation mail</td><td class="description"> Allows new users to confirm their account by clicking an activation link in their email <a href="#part33">Read more</a></td></tr>
			<tr><td class="title">Allow multi account email</td><td class="description"> Allow or do not allow users to create more than one account with the same email address.</td></tr>
			<tr><td class="title">Welcome message</td><td class="description">New in boomchat 5.0 this message can now be changed directly from the admin panel this is the message that new registered user receive after registration.</td></tr>
			<tr><td class="title">Turn on/off welcome message</td><td class="description">Can be turned <span class="note">on/off</span> this option if turned on will display a welcome message to new registered users. <a href="#part27">learn more</a></td></tr>		
		</table>
		<h2 class="setting_title">Chat options</h2>
		<table>
			<tr><td class="title">Flood mute time</td><td class="description"> Choose how long users should be muted for after a flood attempt.</td></tr>
			<tr><td class="title">Automatic unmute delay</td><td class="description">Select a <span class="note">specific time a user will become unmute</span></p></li>
			<tr><td class="title">Set max message characters</td><td class="description">Set the maximum message length that a user can write by post.</td></tr>
			<tr><td class="title">Show emoticon bar</td><td class="description"> Choose to show or hide the emoticon bar</td></tr>
			<tr><td class="title">Display avatar in chat</td><td class="description">Display or not avatar in chat once turned off users will need to refresh page to see change.</td></tr>
			<tr><td class="title">Show topic in chat</td><td class="description">Display or not the topic in your chat rooms.</td></tr>
			<tr><td class="title">Allow hyperlink in chat</td><td class="description">Can be turned on/off to allow or not clickable links in the chat.</td></tr>
			<tr><td class="title">Allow text colors</td><td class="description">Allow you to disable or not the color option from the text tools bar</td></tr>
			<tr><td class="title">Sound on every post</td><td class="description">By turning this on there will be a notification sound after everypost in the chat ... remember that users can disable this sound in their profile.</td></tr>
			<tr><td class="title">Display user log message</td><td class="description">display system message when user log and leave the chat.</td></tr>
			<tr><td class="title">Chat history length</td><td class="description">Set the amount of lines that are displayed in the main chat window, by <span class="note">lowering this number of lines will increase server performance and lower bandwidth.</span></p></li>
			<tr><td class="title">Allow chat history</td><td class="description">Can be turned on/off if turned off history feature will be hidden</td></tr>
			<tr><td class="title">History log length</td><td class="description">Set the amount of lines that will be display in the history.</td></tr>
		</table>
		<h2 class="setting_title">Upload options</h2>
		<table>
			<tr><td class="title">Max hosting images</td><td class="description">Set the maximum images that a user can upload to your server</td></tr>
			<tr><td class="title">Set max image size</td><td class="description">Set the maximum images size allowed for uploads</td></tr>
			<tr><td class="title">Set max avatar size</td><td class="description">Set the maximum avatar size allowed</td></tr>
		</table>
		<h2 class="setting_title">Limit options</h2>
		<table>
			<tr><td class="title">Allow private chat</td><td class="description">Set level required by user to access private chat feature</td></tr>
			<tr><td class="title">Allow username change to</td><td class="description">Set level required by user to access username change feature</td></tr>
			<tr><td class="title">Allow avatar upload to</td><td class="description">Set level required by user to access avatar feature</td></tr>
			<tr><td class="title">Allow user upload to</td><td class="description">Set level required by user to access upload feature</td></tr>
			<tr><td class="title">Limit friend feature to</td><td class="description">Set level required by user to access friend feature</td></tr>
			<tr><td class="title">Limit ignore feature to</td><td class="description">Set level required by user to access ignore feature</td></tr>
		</table>
		<h2 class="setting_title">User options</h2>
		<table>
			<tr><td class="title">Set max username length</td><td class="description">Set the max characters that you want for new username registration.</td></tr>
			<tr><td class="title">Set user to away after</td><td class="description">Users will be automatically set to away after the given time.</td></tr>
			<tr><td class="title">Set user to offline after</td><td class="description">Users will be automatically set to offline after the given time.</td></tr>
			<tr><td class="title">Allow guest in chat</td><td class="description"> Turn Guest access on/off. <a href="#part31">Read more</a></td></tr>
			<tr><td class="title">Allow guest talk in chat</td><td class="description">You can choose to allow guest to talk or not in your chat by changing this option <a href="#part31">Read more</a></td></tr>
			<tr><td class="title">Clear inactive guest after</td><td class="description">Set the time when you want Boomchat to autoclean your database from inactive guests <a href="#part31">Read more</a></td></tr>
			<tr><td class="title">How many used custom fields</td><td class="description">Set the number of custom field you wish to use for user profile</td></tr>
			<tr><td class="title">Title of custom field 1-2</td><td class="description">Set the desired name of your custom fields. ex: city , job etc...</td></tr>
		</table>
		<h2 class="setting_title">Ads options</h2>
		<table>
			<tr><td class="title">Activate ads feature</td><td class="description">That option when turned on will activate ads feature. <a href="#part28">Read more</a></td></tr>
			<tr><td class="title">Numbers of ads used</td><td class="description">Determine the number of ads used if feature is activated.<a href="#part28"> Read more</a></td></tr>
			<tr><td class="title">Delay between ads in sec</td><td class="description">Set the time delay between ads change. <a href="#part28">Read more</a></td></tr>
		</table>
		<h2 class="setting_title">Advance settings</h2>
		<table>
			<tr><td class="title">Input box orientation</td><td class="description">Change orientation of chat from top to bottom. <a href="#part29">Read more</a></td></tr>
			<tr><td class="title">Display private mode</td><td class="description">Set the private to corner boxed or even full chat sized mode.</td></tr>
			<tr><td class="title">Use full width chat</td><td class="description">By turning this on the chat will now be displayed as fullscreen mode.</td></tr>
			<tr><td class="title">Select chat language</td><td class="description">Set the chat language use custom option to build your own language</td></tr>
			<tr><td class="title">Set chat to rtl</td><td class="description">Change the current chat view to right to left</td></tr>
			<tr><td class="title">Auto clean DB data</td><td class="description"> The system will delete all records that are older than the specified date.<span class="note"> Lower that value to keep a clean and fast database responding time</span></td></tr>
			<tr><td class="title">Activate ban by cookie</td><td class="description">Put a cookie in users browser to increase your chat protection against spammers and people breaking your chat rules <a href="#part32"> Read more</a></td></tr>
			<tr><td class="title">Set chat speed to</td><td class="description">Change your refresh delay, this option can be increased or decreased and will take effect on refresh <a href="#part41">Read more</a></td></tr>
			<tr><td class="title">Allow users theme</td><td class="description">Allow user to toggle theme, if turned off user will not be able to toggle theme.</td></tr>
			<tr><td class="title">Set chat default theme</td><td class="description">Choose from the select menu the default theme you want for your chat.</td></tr>
			<tr><td class="title">Show music player on chat</td><td class="description">Activate or not the build in stream music player.</td></tr>
			<tr><td class="title">Set player to autoplay</td><td class="description">Autoplay music or not when user enter the chat room.</td></tr>
			<tr><td class="title">Player source</td><td class="description">Set the source of your music stream.</td></tr>
		</table>
	</div>
	<a name="part12"></a>
	<h2>Add your own emoticons</h2>
	<div class="section top_separator">
		<p>Boomchat comes with 42 emoticons under an extended license from <a href="http://emoticonshd.com">Emoticons hd</a>. You can add your own emoticons simply by putting them in the Emoticons folder. 
		If you create your own emoticons they will need to be in gif  or png format to work other than that will not show on chat.</p>
		<p><span class="note">All emoticon included in this script cannot be used in other product and cannot be sold all rights are reserved to <a href="http://emoticonshd.com">Emoticons hd</a>.</span></p>
	</div>
	<a name="part14"></a>
	<h2>Delete a post</h2>
	<div class="section top_separator">
		<p>SuperAdmin and admin can see a little <span class="note">X</span> on side of every post. Clicking the X will remove permanently the line from the database.</p>
	</div>
	<a name="part13"></a>
	<h2>Hidden options</h2>
	<div class="section top_separator">
		<h3>Clickable name</h3>
		<p>You can click on a username in the main chat window and it will write 
		it for you in the user input box.</p>
		<h3>Clickable commands</h3>
		<p>You can click on commands in the Help tab, by clicking these command, 
		they will appear already post in the user input box for you.</p>
		<h3>Highlight</h3>
		<p>When someone writes your username in main chat it will appear yellow highlighted.</p>
	</div>
	<a name="part15"></a>
	<h2>Credits</h2>
	<div class="section top_separator">
		<h3>Coding</h3>
		<p>Javascript:<span class="note"> BoomCoding - jni_viens</span></p>
		<p>Php:<span class="note"> BoomCoding - jni_viens</span></p>
		<p>Css:<span class="note"> BoomCoding</span></p>
		<p>Html:<span class="note"> BoomCoding</span></p>
		<p>Designer:<span class="note"> BoomCoding</span></p>
		<h3>Specials thanks</h3>
		<p>Thank to <span class="note">jni_viens</span> who have solve some PHP and 
		JavaScript bug and improved some of the functionality of the script</p>
		<p>Thank to our tester that have use the chat and found bug <span class="note">Komb, Foxgirl, jni_viens, Raoul, DiGG, gareauson</span> and all  others that have participate to the good working of the script</p>
	</div>
	<a name="part16"></a>
	<h2>Copyright</h2>
	<div class="section top_separator">
		<p>This script cannot be distributed without BoomCoding approbation, This product may be used only once per license. All content of BoomChat is the property of BoomCoding and cannot be copied or 
		redistributed in any way. Graphic, Emoticon are the property of <a href="http://emoticonshd.com">Emoticons hd</a> and cannot be used in other project or redistributed without their agreement.</p>
	</div>
</div>
</body>
</html>