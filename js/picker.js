$(document).ready(function(){

	var pickSelect = "";
	var picktwo = 0;
	
	$(".picker").click(function() {
		var pickPos = $(this).position();
		var pickHeight = $(this).height();
		var pickWidth = $(this).width();
		var pickBox = $("#picker_box").outerHeight();
		pickSelect = $(this).attr('value');
		
		if ($('#picker_box:visible').length){
			$("#picker_box").hide();
		}
		else {
			$("#list_emoticon").hide();
			if(boxZone == 1){
				$("#picker_box").css({
					position: "absolute",
					top: pickPos.top + pickHeight + "px",
					left: (pickPos.left - (pickWidth * 3)) + "px"
				}).show();
			}
			else{
				$("#picker_box").css({
					position: "absolute",
					top: pickPos.top - pickBox + "px",
					left: (pickPos.left - (pickWidth * 3)) + "px"
				}).show();
			}
		}
	});
	
	$(".pick_color").click(function() {
		var color = $(this).attr('value');
		$('#'+ pickSelect).css("background",color)
		$('#'+ pickSelect).css("background-size","100% 100%")
		$("#picker_box").hide();
	});
	
	$(".text_item").click(function() {
		var checkItem = $(this).attr('value');
		if(checkItem == 0){
			$(this).addClass('sel_item');
			$(this).attr('value','1');
		}
		else {
			$(this).removeClass('sel_item');
			$(this).attr('value','0');
		}
	});
	
	$("#emo_item").click(function() {
		var emoPos = $(this).position();
		var emoHeight = $(this).height();
		var emoWidth = $(this).width();
		var emoBox = $("#list_emoticon").outerHeight();
		
		if ($('#list_emoticon:visible').length){
			$("#list_emoticon").hide();
		}
		else {
			if(boxZone == 1){
				$("#picker_box").hide();
				$("#list_emoticon").css({
					position: "absolute",
					top: emoPos.top + emoHeight + "px",
					left: (emoPos.left + 10) + "px"
				}).show();
			}
			else {
				$("#picker_box").hide();
				$("#list_emoticon").css({
					position: "absolute",
					top: emoPos.top - emoBox + "px",
					left: (emoPos.left + 10) + "px"
				}).show();	
			}
		}
	});
	
	// hide the emoticon box ...
	
	$('#list_emoticon').on('click', '.closesmilies', function(){
		$('#list_emoticon').hide();
	});	
	
	
	// close smilie and picker if click somwhere else on the page 	

	$(document).mouseup(function (e)
	{
		var clicked = $("#list_emoticon");
		var clicked2 = $("#picker_box");
		var clicked3 = $("#text_pick");
		var clicked4 = $("#high_pick");
		var clicked5 = $("#zoom_emo");
		var clicked6 = $(".opt_open");
		var clicked7 = $("#wrap_options");
		var clicked8 = $(".option_add");
		

		if (!clicked.is(e.target) && !clicked2.is(e.target) && !clicked3.is(e.target) 
		&& !clicked4.is(e.target) && !clicked5.is(e.target) && !clicked6.is(e.target) && !clicked7.is(e.target))
		{
			clicked.hide();
			clicked2.hide();
			clicked8.hide();
		}
	});
	
	$("#open_option").click(function() {
		var optPos = $(this).offset();
		var menuPos = $("#menu_container").offset(); 
		var optHeight = $(this).height();
		var optWidth = $(this).width();
		var optBox = $("#wrap_options").outerHeight();
		var widthAddon = $("#wrap_options").outerWidth();
		
		if ($('#wrap_options:visible').length){
			$("#option_title p").text('');
			$("#wrap_options").fadeOut(200);
		}
		else {
			$("#list_emoticon").hide();
			$("#picker_box").hide();
			$("#wrap_options").css({
				position: "absolute",
				top: menuPos.top - optBox + "px",
				left: (optPos.left - ((widthAddon / 2) - (optWidth / 2))) + "px"
			}).fadeIn(200);
		}
	});

	$(".addon_options").click(function() {
		$("#wrap_options").fadeOut(200);
	});
	
	
	$("#addon_container img").hover(function() {
		var addonSelected = $(this).attr('value');
		$("#option_title p").text(addonSelected);
	});
	$("#addon_container .addon_options").mouseout(function() {
		$("#option_title p").text("");
	});
	
	
	
	
	
	
});

// displaying emoticon in the chat room
function emoticon(target, data){
	if (document.selection) {
		sel.text = data;
		target.focus();
		sel = document.selection.createRange();
	} 
	else if (target.selectionStart || target.selectionStart == '0') {
		var start = target.selectionStart;
		var end = target.selectionEnd;
		target.value = target.value.substring(0, start) + data + target.value.substring(end, target.value.length);
	} 
	else {
		target.value += data;
	}
   setTimeout(function() { $(target).focus(); }, 0);
};

