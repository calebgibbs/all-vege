<?php 
	$this -> layout('master',[
		'title'=>'Help', 
		'desc' => 'Site managment instructions' 
	]); 
?> 
<div id="page-setup"> 
<?php
	$user_agent = getenv("HTTP_USER_AGENT");
	if(strpos($user_agent, "Win") !== FALSE){
		$os = "Ctrl + F";
	} elseif(strpos($user_agent, "Mac") !== FALSE) {
		$os = "Cmd + F";
	} 
?>
	<h1>Site Instructions</h1> 
	<?php if($_SESSION['privilege'] == 'admin'): ?> 
		<p>You are an admin on this website. This means that you have full control of the recipes, 
			comments, and user privileges on this site. 
			<br>
		This page is guide you through the <a href="index.php?page=settings">Site Maintenance</a> page if you get stuck. </p>
	<?php endif; ?> 

	<?php if($_SESSION['privilege'] == 'moderator'): ?> 
		<p>You are a moderator on this website. This means that you are able to add and manage recipes on this site.
		<br> 
		This page is to guide you through the <a href="index.php?page=settings">Manage Recipes</a> page if you get stuck.</p>
	<?php endif; ?> 
	
	<article> 
		<h2>Adding a Recipe</h2> 
		<?php if( $_SESSION['privilege'] == 'admin' ): ?>
		<span><b>Site Maintenance / Add a Recipe</b></span>
		<?php endif; ?>

		<?php if( $_SESSION['privilege'] == 'moderator' ): ?>
		<span><b>Manage Recipes / Add a Recipe</b></span>
		<?php endif; ?>

		<p>To add a recipe go to the <a href="index.php?page=addRecipe">Add a Recipe</a> tab on the 
			<?php if( $_SESSION['privilege'] == 'admin' ): ?><a href="index.php?page=settings">Site Maintenance</a><?php endif; ?>
			<?php if( $_SESSION['privilege'] == 'moderator' ): ?><a href="index.php?page=settings">Manage Recipes</a><?php endif; ?> 
			page.
			<br><br>
			<i>Before you start filling out the from make sure you have an image ready because you will not be able to add a recipe without an image</i>
			<br><br>
			Fill out the Title and the Description. 
			<br> 
			To add the ingredients and the method you will have to add some basic HTML markup: 
			<br>
			<ul> 
				<li><p>
					For the ingredients you will have to add in an unordered list<br> 
					<?= htmlspecialchars('<ul>') ?><br><?= htmlspecialchars('<li></li>') ?><br><?= htmlspecialchars('</ul>') ?><br> 
					You should add a list item (<?= htmlspecialchars('<li></li>') ?>) for each ingredient you wish to add.
				</p></li>  
				<li><p>
					To the method list you will have to add an orderd list<br>
					<?= htmlspecialchars('<ol>') ?><br><?= htmlspecialchars('<li></li>') ?><br><?= htmlspecialchars('<br>') ?><br><?= htmlspecialchars('</ol>') ?><br>
					Once again you will have to add a list item for each method your recipe requires but each list item will be 
					followed by a break tage (<?= htmlspecialchars('<br>') ?>)<br> 
					if you have any <i>tips</i> you wish to add after the methods you can do this by adding it after the closing ordered list tag (<?= htmlspecialchars('</ol>') ?>)
					<br>If you want to add more than one <i>tip</i> you will need to place two break tags after each tip (<?= htmlspecialchars('<br><br>') ?>).
				</p></li>
			</ul> 
			You then need to select the category and serving size for your recipe. After this point you can upload your image and add your recipe.
		</p>

	</article> 

	<article>
		<h2>Managing all recipes you have added</h2> 
		<?php if( $_SESSION['privilege'] == 'admin' ): ?>
		<span><b>Site Maintenance / My Recipes</b></span>
		<?php endif; ?>

		<?php if( $_SESSION['privilege'] == 'moderator' ): ?>
		<span><b>Manage Recipes / My Recipes</b></span>
		<?php endif; ?>
		<p>To edit or delete the recipes you have added to the side you must go to the 
			<a href="index.php?page=myRecipes">My Recipes</a> tab on the 
			<?php if( $_SESSION['privilege'] == 'admin' ): ?><a href="index.php?page=settings">Site Maintenance</a><?php endif; ?>
			<?php if( $_SESSION['privilege'] == 'moderator' ): ?><a href="index.php?page=settings">Manage Recipes</a><?php endif; ?> 
			page.
			<br><br>
			Click on the recipe you want to edit or delete from the table of recipes. 
			This will take you to the recipe itself with extra options at the top of the page. 
			<br><br>
			If you want to delete the recipe click delete and then yes. 
			<br><br>
			If you wish to edit the recipe click on the edit button. This will take you to the edit page 
			from here you can simply make any changes you need and then save the recipe.   
			<?php if ($_SESSION['privilege'] == 'moderator'): ?> 
			<br><br>
			<i><u>Note:</u> you can only edit and delete recipes that you have added.</i>
			<?php endif ?>
		</p>
	</article> 

	<?php if($_SESSION['privilege'] == 'admin'): ?>  
	<article>
		<h2>Managing All Recipes on the website</h2> 
		<b>Site Maintenance / All Recipes</b>
		<p>You can edit or delete any recipe on the site the same way as you would manage your own recipe. 
			But you must go to the <a href="index.php?page=allRecipes">All Recipes</a> tab on the <a href="index.php?page=settings">Site Maintenance</a> page 
			to view the table of all recipes on the website. </p>
	</article> 

	<article>
		<h2>Managing all users on the website</h2> 
		<b>Site Maintenance / Manage Users</b>
		<p>To change a users privilege on the website you must go to the <a href="index.php?page=users">Manage Users</a> tab on the <a href="index.php?page=settings">Site Maintenance</a> page.
			<br>
		This will show you a table of every user account on the website 
		<br> 
		Find a user and and select the privilege you wish to change them to from the dropdown menu next to the users 
		email address and click ‘change privilege’	
		<br><br>
		<i>If there are multiple users on the website you can hold the keys <?= $os ?> 
			at the same time to bring up a search bar. you can search for a user by first name, last name or email address.</i>
		</p>
	</article>

	<?php endif; ?>
</div>