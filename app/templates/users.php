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
				<?php foreach($allUsers as $user):  ?> 
					<?php if($user['privilege'] == "admin" ): ?>
						<div class="user">
							<span class="uFirstName"><?= $user['first_name'] ?></span> 
							<span class="uLastName"><?= $user['last_name'] ?></span> 
							<span class="uEmail"><?= $user['email'] ?></span> 
							<span class="uClass">
							<form action="index.php?page=users" method="post">
								<select name="change-class">
									<option value="admin<?= $user['id'] ?>">Admin</option> 
									<option value="moderator<?= $user['id'] ?>">Moderator</option> 
									<option value="user<?= $user['id'] ?>">User</option>
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
				<?php foreach($allUsers as $user):  ?> 
					<?php if($user['privilege'] == "moderator" ): ?>
						<div class="user">
							<span class="uFirstName"><?= $user['first_name'] ?></span> 
							<span class="uLastName"><?= $user['last_name'] ?></span> 
							<span class="uEmail"><?= $user['email'] ?></span> 
							<span class="uClass">
							<form action="index.php?page=users" method="post">
								<select name="change-class">
									<option value="moderator<?= $user['id'] ?>">Moderator</option> 
									<option value="admin<?= $user['id'] ?>">Admin</option> 
									<option value="user<?= $user['id'] ?>">User</option>
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
				<?php foreach($allUsers as $user):  ?> 
					<?php if($user['privilege'] == "user" ): ?>
						<div class="user">
							<span class="uFirstName"><?= $user['first_name'] ?></span> 
							<span class="uLastName"><?= $user['last_name'] ?></span> 
							<span class="uEmail"><?= $user['email'] ?></span> 
							<span class="uClass">
							<form action="index.php?page=users" method="post">
								<select name="change-class">
									<option value="user<?= $user['id'] ?>">User</option>
									<option value="moderator<?= $user['id'] ?>">Moderator</option> 
									<option value="admin<?= $user['id'] ?>">Admin</option>
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