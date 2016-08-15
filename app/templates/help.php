<?php 
	$this -> layout('master',[
		'title'=>'Help', 
		'desc' => 'Site managment instructions' 
	]); 
?> 
<div id="page-setup"> 
	<h1>Site Instructions</h1> 
	<?php if($_SESSION['privilege'] == 'admin'): ?> 
		<p>You are an Admin on this website. 
			That means you have full control of all the users and recipes on this website. 
			This page is for you to refer to if you get stuck on how to manage the site. 
			below are instructions on how to; add a recipe, how to: view, manage and edit all the 
			recipes which you have published, how to view, mage and edit all the recipes on the website and how 
			to manage all of the users on the website.</p>
	<?php endif; ?> 

	<?php if($_SESSION['privilege'] == 'moderator'): ?> 
		<p>You are a moderator on this website. 
			That means that you are able to add a recipe and edit all recipes that you have added. 
			This page is for you to refer to if you get stuck on how to manage your account. 
			Below are instruction on how to; add a recipe and how to view, 
			manage and edit all the recipes which you have published.  </p>
	<?php endif; ?> 
	
	<article> 
		<h2>Adding a Recipe</h2> 
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</article> 

	<article>
		<h2>Managing all recipes you have added</h2> 
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</article> 

	<?php if($_SESSION['privilege'] == 'admin'): ?>  
	<article>
		<h2>Managing All Recipes on the website</h2> 
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</article> 

	<article>
		<h2>Managing all users on the website</h2> 
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</article>

	<?php endif; ?>
</div>