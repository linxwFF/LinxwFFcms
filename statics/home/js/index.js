$(document).ready(function(e) {
	$('#slider li').eq(0).show();
	var lenThumb = $('#slider li').length;
	for(var i=1;i<=lenThumb;i++){
		$('#num').append('<span>'+i+'</span>');
	}
	$('#num span').eq(0).addClass('on');
	var len = $('#num span').length;
	var index = 1;

	$('#num span').click(function(){
		index = $('#num span').index(this);
		picShow(index);
	});
	var playPic = setInterval(function(){
		picShow(index);
		index++;
		if(index==len){index=0}
	},6000);
	function picShow(i){
		$('#slider li').eq(i).stop(true,true).fadeIn().siblings().fadeOut();
		$('#num > span').eq(i).addClass('on').siblings().removeClass('on');
	}
	
	$('#left_arrow').click(function(){
		picShow(index);
		
		index--;
		if(index==len){index=0}
		clearInterval(playPic);
		playPic = setInterval(function(){
			picShow(index);
			index++;
			if(index==len){index=0}
		},6000);
	});
	$('#right_arrow').click(function(){
		picShow(index);
		index++;
		if(index==len){index=0}
		clearInterval(playPic);
		playPic = setInterval(function(){
			picShow(index);
			index++;
			if(index==len){index=0}
		},6000);
	});


	$('.inshow_pb').hover(function(){
		$(this).find('.inshow_bg').css({'height':0, 'opacity':0}).stop(true,true).animate({'height':'100%', 'opacity':1}, 300);
		$(this).find('.ins_text').css({'top':250, 'opacity':0}).stop(true,true).animate({'top':0, 'opacity':1}, 300);
	}, function(){
		$(this).find('.inshow_bg').stop(true,true).animate({'height':0, 'opacity':0}, 300);
		$(this).find('.ins_text').stop(true,true).animate({'top':250, 'opacity':0}, 300);
	});
	
	
	$('.inshow_3block').hover(function(){
		$(this).find('.inshow_bg').css({'width':0, 'opacity':0}).stop(true,true).animate({'width':'100%', 'opacity':1}, 300);
		$(this).find('.ins_text').css({'left':500, 'opacity':0}).stop(true,true).animate({'left':0, 'opacity':1}, 300);
	}, function(){
		$(this).find('.inshow_bg').stop(true,true).animate({'width':0, 'opacity':0}, 300);
		$(this).find('.ins_text').stop(true,true).animate({'left':500, 'opacity':0}, 300);
	});
	
});