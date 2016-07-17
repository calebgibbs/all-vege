$(document).ready(function(){
	$('#search-control').click(function(){
		$('#search-s').toggle({"display" : "none"}); 
		$('#search-bar').toggle({"display" : "block"}); 
	});  

	$('#account').click(function(){
		$('#acc-box').slideToggle({"display" : "block"});
	}); 

	$('.edit-controller').click(function(){
		$(this).next('.setting-edit').slideToggle({"display" : "block"});
	}); 

});