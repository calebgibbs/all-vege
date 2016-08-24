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

	$('#del-recipe, #no-button').click(function(){
		$('#del-recipe-option').toggle();
	}); 

	$('.recipe-data').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
	
});