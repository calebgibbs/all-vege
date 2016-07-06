$(document).ready(function(){
	$('#search-control').click(function(){
		$('#search-s').toggle({"display" : "none"}); 
		$('#search-bar').toggle({"display" : "block"}); 
	});  

	$('#account').click(function(){
		$('#login').toggle({"display" : "block"});
	});
	
});