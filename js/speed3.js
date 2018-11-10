$(document).ready(function(){

	// reload room data
	topic_reload();
	user_reload();
	statusReload();
	chat_reload();
	adjustHeight();
	reload_data();
	
	
	//determine elapse time between room data refresh
   
	var userroom = setInterval(showRooms, 60000);
	var reload_topic = setInterval(topic_reload, 60000);
	var userlist = setInterval(user_reload, 8000);
	var privateLog = setInterval(privateReload, 6000);
	var privateList = setInterval(privateOpen, 6500);
	var reloadStatus = setInterval(statusReload, 45000);
	var chatLog = setInterval(chat_reload, 2500);
	var reloadAds = setInterval(adsMargin, 15000);
	var dataReload = setInterval(reload_data, 7000);
	var friendlis = setInterval(reloadFriends, 30000);
   
   
   
});