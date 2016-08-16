$(document).ready(function(){
	$('#search-control').click(function(){
		$('#search-s').toggle({"display" : "none"}); 
		$('#search-bar').toggle({"display" : "inline-block"}); 
	});  

	$('.clicked').click(function(){
		$(this).toggleClass('clicked');
	}); 	

	$('#account').click(function(){
		$('#acc-box').slideToggle({"display" : "block"});
	});

	$('#v-account').click(function(){
		$('#acc-box').slideToggle({"display" : "block"});
	});   

	$('.controller').click(function(){
		$(this).next('.content').slideToggle({"display" : "block"});
	}); 

	
});