<?php 
	$this -> layout('master',[
		'title'=>'Account', 
		'desc' => 'view and edit your account information' 

	]); 
?> 
<div id="page"> 
	
	<div id="account-overview"> 
		
		<?php if( $_SESSION['profile_picture'] == '' ): ?>
		<img src="images/uploads/account-profiles/account/default.png" alt=""> 
		<?php endif; ?> 
		
		<?php if( $_SESSION['profile_picture'] != '' ): ?> 
		<img src="images/uploads/account-profiles/account/<?= $_SESSION['profile_picture'] ?>" alt=""> 
		<?php endif; ?>
		
		<span id="users-name"><?= $_SESSION['first_name'] ?> <?= $_SESSION['last_name'] ?></span> 
		<div id="account-message">
		
			<?php if( isset($contactMessage) ): ?>
        	<p> <?= $contactMessage ?> </p>
        	<?php endif; ?>	
	</div>
	</div>  

	 

	<div id="account-settings">  
						
		<h2 class="controller">
			<span>Change profile picture</span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post" enctype="multipart/form-data">
				<label>Upload a new profile picture: </label>
				<input type="file" name="image" id="image">
  				<input type="submit" name="image" value="Save" name="update-profile-picture">
  			</form>	  

		<h2 class="controller">
			<span>First Name</span><span><?= $_SESSION['first_name'] ?></span><span class="edit">Edit</span>
		</h2> 
			<form id="first-name" class="content" action="index.php?page=account" method="post">
				<input type="text" id="first-name" name="first-name" placeholder="Edit First Name">  
				<input type="submit" value="Save" id="button" name="update-first-name">   	
			</form> 

		<h2 class="controller">
			<span>Last Name</span><span><?= $_SESSION['last_name'] ?></span><span class="edit">Edit</span>
		</h2> 
			<form id="last-name" class="content" action="index.php?page=account" method="post">
				<input type="text" name="last-name" placeholder="Edit Last Name">  
				<input type="submit" value="Save" name="update-last-name">
			</form> 

		<h2 class="controller">
			<span>Email</span><span><?= $_SESSION['email'] ?></span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<input type="text" name="email" placeholder="change email">  
				<input type="submit" value="Save" name="update-email">
			</form>

		<h2 class="controller">
			<span>Password</span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<label>Current Password:</label> 
				<input type="password" name="current-password" placeholder="Current password"> 
							 
				<label>New Password:</label> 
				<input type="password" name="new-password" placeholder="New password">  
							
				<label>Re-type new Password:</label> 
				<input type="password" name="new-password-again" placeholder="New password again"> 
							
				<input type="submit" value="Save" name="update-password">
			</form> 

		<h2 class="controller"> 
			<span>Deactivate account</span><span class="edit">Edit</span>
		</h2> 
			<form class="content" action="index.php?page=account" method="post">
				<span>I wish to deactivate my account <input name="yes" type="checkbox"></span> 
				<span>Please enter your password to confirm: </span>
				<input name="password" type="password" placeholder="Password"> 
				<input type="submit" value="Confirm" name="deactivate-account">
			</form> 

	</div>  
</div> 


