<div id="panel">
	<div id="panel-menu">
		<ul>
			<li><a href="index.php?page=add-recipe"><i class="fa fa-plus"></i> Add a Recipe</a></li>
			<li><a href="index.php?page=all-recipes"><i class="fa fa-book"></i> My Recipes</a></li>
			<?php if($_SESSION['privilege'] == 'admin'): ?>
				<li><a href="index.php?page=users"><i class="fa fa-users"></i> Manage Users</a></li> 
			<?php endif; ?>

		</ul>
	</div>
</div>