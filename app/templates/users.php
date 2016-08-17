<?php 
	$this -> layout('master',[
		'title'=>'Manage users', 
		'desc' => 'Manage site users' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="page-setup">
	<?php $totalUsers = 0; ?>
	<h1>Users</h1>  
		<h3>Admins</h3> 
			<div class="user-table">	
				<?php foreach($allUsers as $item):  ?> 
					<?php if($item['privilege'] == "admin" ): ?>
						<div class="user">
							<span class="uFirstName"><?= $item['first_name'] ?></span> 
							<span class="uLastName"><?= $item['last_name'] ?></span> 
							<span class="uEmail"><?= $item['email'] ?></span> 
							<span class="uClass">
							<form action="index.php?page=users" method="post">
								<select name="change-class">
									<option value="admin<?= $item['id'] ?>">Admin</option> 
									<option value="moderator<?= $item['id'] ?>">Moderator</option> 
									<option value="user<?= $item['id'] ?>">User</option>
								</select> 
								<input type="submit" value="Change Privilege">
							</form>
							</span> 
						</div>	 
						<?php $totalUsers++; ?>
					<?php endif ?> 
				<?php endforeach ?> 
			</div> 
		<h3>Moderators</h3> 
			<div class="user-table">	
				<?php foreach($allUsers as $item):  ?> 
					<?php if($item['privilege'] == "moderator" ): ?>
						<div class="user">
							<span class="uFirstName"><?= $item['first_name'] ?></span> 
							<span class="uLastName"><?= $item['last_name'] ?></span> 
							<span class="uEmail"><?= $item['email'] ?></span> 
							<span class="uClass">
							<form action="index.php?page=users" method="post">
								<select name="change-class">
									<option value="moderator<?= $item['id'] ?>">Moderator</option> 
									<option value="admin<?= $item['id'] ?>">Admin</option> 
									<option value="user<?= $item['id'] ?>">User</option>
								</select> 
								<input type="submit" value="Change Privilege">
							</form>
							</span> 
						</div>	 
						<?php $totalUsers++; ?>
					<?php endif ?>
				<?php endforeach ?> 
			</div> 
		<h3>Users</h3> 
			<div class="user-table">	
				<?php foreach($allUsers as $item):  ?> 
					<?php if($item['privilege'] == "user" ): ?>
						<div class="user">
							<span class="uFirstName"><?= $item['first_name'] ?></span> 
							<span class="uLastName"><?= $item['last_name'] ?></span> 
							<span class="uEmail"><?= $item['email'] ?></span> 
							<span class="uClass">
							<form action="index.php?page=users" method="post">
								<select name="change-class">
									<option value="user<?= $item['id'] ?>">User</option>
									<option value="moderator<?= $item['id'] ?>">Moderator</option> 
									<option value="admin<?= $item['id'] ?>">Admin</option>
								</select> 
								<input type="submit" value="Change Privilege">
							</form>
							</span> 
						</div>	 
						<?php $totalUsers++; ?>
					<?php endif ?>
				<?php endforeach ?> 
			</div>  
		<p>There are <?= $totalUsers ?> users</p>
</div>