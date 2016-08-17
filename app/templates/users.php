<?php 
	$this -> layout('master',[
		'title'=>'Manage users', 
		'desc' => 'Manage site users' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="page-setup">
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
							<form method="post" action="#">
								<select name="change-class">
									<option name="make-admin" value="admin">Admin</option> 
									<option name="make-moderator" value="moderator">Moderator</option> 
									<option name="make-user" value="user">User</option>
								</select> 
								<input type="submit" value="Change Privilege">
							</form>
							</span> 
						</div>	 
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
							<form method="post" action="#">
								<select name="change-class">
									<option name="make-moderator" value="moderator">Moderator</option>
									<option name="make-admin" value="admin">Admin</option>  
									<option name="make-user" value="user">User</option>
								</select> 
								<input type="submit" value="Change Privilege">
							</form>
							</span> 
						</div>	 
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
							<form method="post" action="#">
								<select name="change-class" name="hello">
									<option name="make-user" value="user">User</option>
									<option name="make-moderator" value="moderator">Moderator</option> 
									<option name="make-admin" value="admin">Admin</option>
								</select> 
								<input type="submit" value="Change Privilege">
							</form>
							</span> 
						</div>	 
					<?php endif ?>
				<?php endforeach ?> 
			</div>
</div>