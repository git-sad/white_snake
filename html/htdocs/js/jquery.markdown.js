jQuery(function($){
	$("a[href^='http']:not([href*='" + location.hostname + "'])").attr('target', '_blank');
	$('.more_div').hide();
	$('.more_a').click(function() {
		if($(this).text() == '<<閉じる'){
			$(this).text('...続きを読む');
		}else{
			$(this).text('<<閉じる');
		}
		$(this).prev().slideToggle();
	});
});
