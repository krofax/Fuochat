$(document).ready(function(){

	var audioElement = document.createElement('audio');
	audioElement.setAttribute('src', 'sounds/pmsound.mp3');
	audioElement.setAttribute('stop', 'stop');
	
	var audioElement2 = document.createElement('audio');
	audioElement2.setAttribute('src', 'sounds/username.mp3');
	audioElement2.setAttribute('stop', 'stop');
	
	var audioElement3 = document.createElement('audio');
	audioElement3.setAttribute('src', 'sounds/whistle.mp3');
	audioElement3.setAttribute('stop', 'stop');
	
	
	// check if there are bet availaible
	
	reload_data = function()
	{
			$.ajax({
				url: "system/data_update.php",
				dataType: 'json',
				cache: false,
				success: function(response){

					var myPrivate = response.bet4;
					var checkSound = response.bet3;
					var lastWrite = response.bet5;
					var allowAds = response.bet7;
					var adsSelect = response.bet8;
					var checkStop = response.bet9;
					var iconPrivate = response.bet12;
					var checkGsound = response.bet13;
					var iconSet = response.bet14;
					var sfSound = response.bet15;
					var sesCompare = response.bet20;
					var upUsername = response.bet21;
					
					if(upUsername !== my_username){
						my_username = upUsername;
						updateCred();
					}
					
					uSd = checkSound;
					fSd = sfSound;
					
					if(sesCompare != sesid){
						overWrite();
					}
					if(checkGsound !== whistle){
						whistle = checkGsound;
						audioElement3.play();
					}
					if(lastWrite != checkUsername){
						var myName = my_username.toLowerCase();
						if (checkUsername.toLowerCase().indexOf(myName) >= 0 && checkSound > 0){
							audioElement2.play();
						}
						checkUsername = lastWrite;
					}
					if(myPrivate !== user_private && checkSound > 0 && user_private !== "" && myPrivate !== ""){
							audioElement.play();
						user_private = myPrivate;
					}
					else {
						user_private = myPrivate;
					}
					if(iconPrivate != 0){
						$("#private_count p").text(iconPrivate);
						$('#private_count').show();
						$('.icon_new_private').addClass("new_incoming");
					}
					else {
						$('#private_count').hide();
						$('.icon_new_private').removeClass("new_incoming");
					}
					if(allowAds == 1){
						$("#show_chat_ads").show();
						if(checkStop != 0){
							if(adsSelect != selectedAds){
								$( ".myads" ).each(function() {
									$(this).hide();
								});
								selectedAds = adsSelect;
									$(".ads" + adsSelect + "").fadeIn(1000);
							}
							else{
								return false;
							}
						}
						else {
							if(adsSelect != 1){
								selectedAds = 1;
								$(".ads1").fadeIn(1000);
							}
							else{
								$(".ads1").fadeIn(1000);
								return false;
							}
						}
					}
					else {
						$( ".myads" ).each(function() {
							$(this).fadeOut(1000);
						});
						$("#show_chat_ads").hide();
					}

				},
			});
	}	

});