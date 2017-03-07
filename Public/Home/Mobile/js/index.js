$('.nav-toggle').click(function(){
	$('.nav-display-box').slideToggle();
})

$('.article .fade button').click(function(){
	$(this).parents('.fade').fadeOut(1000);
})

function shou(obj){
	$(this).siblings('.more').show();
	$(this).hide();
	$(obj).slideToggle();
}
$('.hot-art .close').click(function(){
//	$(this).parents('.border').fadeOut(1000);
	$(this).parents('.border').slideUp();
})
