<?php 
	$this -> layout('master',[
		'title'=>'Manage users', 
		'desc' => 'Manage site users' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="page-setup">
	<?php $totalUsers = 0; $totalAdmins = 0; $totalMod = 0; $totalUser = 0; ?>
	<h1>Users</h1>   	
<table id="users-table"> 
	<tr>
		<th>First Name</th>
		<th>Last Name</th> 
		<th>Email</th>
		<th>Privilege</th>
	</tr> 
	
	<?php foreach($allUsers as $user):  ?> 
		<?php if($user['privilege'] == "admin" ): ?>
			<tr>
				<td><?= $user['first_name'] ?></td>
				<td><?= $user['last_name'] ?></td>
				<td><?= $user['email'] ?></td> 
				<td align="right">
					<form action="index.php?page=users" method="post">
						<select name="change-class">
						<option value="admin<?= $user['id'] ?>">Admin</option>
						<option value="moderator<?= $user['id'] ?>">Moderator</option> 
						<option value="user<?= $user['id'] ?>">User</option>
						</select> 
						<input type="submit" value="Change Privilege">
					</form>
				</td> 
			</tr>
			<?php $totalUsers++; $totalAdmins++ ?>
		<?php endif ?> 
	<?php endforeach ?>

	<?php foreach($allUsers as $user):  ?> 
		<?php if($user['privilege'] == "moderator" ): ?>
			<tr>
				<td><?= $user['first_name'] ?></td>
				<td><?= $user['last_name'] ?></td>
				<td><?= $user['email'] ?></td> 
				<td align="right">
					<form action="index.php?page=users" method="post">
						<select name="change-class">
						<option value="moderator<?= $user['id'] ?>">Moderator</option>
						<option value="admin<?= $user['id'] ?>">Admin</option>
						<option value="user<?= $user['id'] ?>">User</option>
						</select> 
						<input type="submit" value="Change Privilege">
					</form>
				</td> 
			</tr>
			<?php $totalUsers++; $totalMod++ ?>
		<?php endif ?> 
	<?php endforeach ?> 
	
	<?php foreach($allUsers as $user):  ?> 
		<?php if($user['privilege'] == "user" ): ?>
			<tr>
				<td><?= $user['first_name'] ?></td>
				<td><?= $user['last_name'] ?></td>
				<td><?= $user['email'] ?></td> 
				<td align="right">
					<form action="index.php?page=users" method="post">
						<select name="change-class">
						<option value="user<?= $user['id'] ?>">User</option>
						<option value="moderator<?= $user['id'] ?>">Moderator</option> 
						<option value="admin<?= $user['id'] ?>">Admin</option>
						</select> 
						<input type="submit" value="Change Privilege">
					</form>
				</td> 
			</tr>
			<?php $totalUsers++; $totalUser++ ?>
		<?php endif ?>
	<?php endforeach ?>  
	<p>There are <b><?= $totalUsers ?></b> total users; <i><?= $totalAdmins ?> Admin<?php if( $totalAdmins > 1):?>s<?php endif; ?>,
		<?= $totalMod ?> Moderator<?php if( $totalMod > 1):?>s<?php endif; ?>,
		<?= $totalUser ?> registered user<?php if( $totalUser > 1):?>s<?php endif; ?>.</i> </p>
	<?php if($totalAdmins == 0): ?> 
		<p style="color:red"><b>Warning!</b> you cannot remove all Admins from this website. Please change 
			<i>your</i> account privilege back to an amdin or select another user to take your place.</p> 
	<?php endif; ?>	 
	<?php if( $totalMod == 0 ): ?>
	<p style="color:#FFD700">The site will run alot more smoothly if you assign a user to be a moderator for the website</p>
<?php endif; ?>
</table>
</div>