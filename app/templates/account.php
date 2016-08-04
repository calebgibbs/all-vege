<?php 
	$this -> layout('master',[
		'title'=>'Account', 
		'desc' => 'view and edit your account information' 

	]); 
?> 
<div id="page"> 
	<div id="account-overview"> 
		<img src="http://placehold.it/250x250"> 
		<span id="users-name"><?= $_SESSION['first_name'] ?> <?= $_SESSION['last_name'] ?></span>
	</div>  

	<div id="account-settings">  
						
		<h2 class="controller">
			<span>Change profile picture</span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post" >
				<input type="file" name="pic" accept="image/*">
  				<input type="submit" value="Save" name="update-profile-picture">
  			</form>	  

		<h2 class="controller">
			<span>First Name</span><span><?= $_SESSION['first_name'] ?></span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<input type="text" placeholder="Edit First Name">  
				<input type="submit" value="Save" name="update-first-name"> 	
			</form> 

		<h2 class="controller">
			<span>Last Name</span><span><?= $_SESSION['last_name'] ?></span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<input type="text" placeholder="Edit Last Name">  
				<input type="submit" value="Save" name="update-last-name">
			</form> 

		<h2 class="controller">
			<span>Email</span><span><?= $_SESSION['email'] ?></span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<input type="text" placeholder="change email">  
				<input type="submit" value="Save" name="update-email">
			</form>

		<h2 class="controller">
			<span>Password</span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<label>Current Password:</label> 
				<input type="password" placeholder="Current password"> 
							 
				<label>New Password:</label> 
				<input type="password" placeholder="Current password">  
							
				<label>Re-type new Password:</label> 
				<input type="password" placeholder="Current password"> 
							
				<input type="submit" value="Save" name="update-password">
			</form> 

		<h2 class="controller"> 
			<span>Deactivate account</span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<span>I wish to deactivate my account <input type="checkbox"></span> 
				<span>Please enter your password to confirm: </span>
				<input type="password" placeholder="Password"> 
				<input type="submit" value="Confirm" name="deactivate-account">
			</form>
	</div>  