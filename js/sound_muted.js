$(document).ready(function(){

	
	var audioElement2 = document.createElement('audio');
	audioElement2.setAttribute('src', 'sounds/username.mp3');
	audioElement2.setAttribute('stop', 'stop');
	
	
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
					
					if(lastWrite != checkUsername){
						var myName = my_username.toLowerCase();
						if (checkUsername.toLowerCase().indexOf(myName) >= 0 && checkSound > 0){
							audioElement2.play();
						}
						checkUsername = lastWrite;
					}
					if(allowAds == 1){
						$("#show_chat_ads").show();
						if(checkStop != 0){
							if(adsSelect != selectedAds){
								$( ".myads" ).each(function() {
									$(this).hide();
								});
								selectedAds = adsSelect;
								if(adsSelect == 1){
									$(".ads1").fadeIn(1000);
								}
								if(adsSelect == 2){
									$(".ads2").fadeIn(1000);
								}
								if(adsSelect == 3){
									$(".ads3").fadeIn(1000);
								}
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