<?php $this -> layout('master'); ?>
<div id="page"> 
	<div id="account-overview"> 
		<img src="http://placehold.it/250x250"> 
		<span id="users-name">User's Name</span>
	</div>  

	<div id="account-settings">  
						
		<h2 class="controller">
			<span>Change profile picture</span><span class="edit">Edit</span>
		</h2> 
			<p class="content">Change profile</p>	 
		<h2 class="controller">
			<span>First Name</span><span>First Name</span><span class="edit">Edit</span>
		</h2> 
			<p class="content">
				<input type="text" placeholder="Edit First Name">  
				<input type="submit" value="Save">
			</p> 
		<h2 class="controller">
			<span>Last Name</span><span>Last Name</span><span class="edit">Edit</span>
		</h2> 
			<p class="content">
				<input type="text" placeholder="Edit Last Name">  
				<input type="submit" value="Save">
			</p> 
		<h2 class="controller">
			<span>Email</span><span>users email</span><span class="edit">Edit</span>
		</h2> 
			<p class="content">
				<input type="text" placeholder="change email">  
				<input type="submit" value="Save">
			</p>
		<h2 class="controller">
			<span>Password</span><span class="edit">Edit</span>
		</h2> 
			<p class="content">
				<label>Current Password:</label> 
				<input type="password" placeholder="Current password"> 
							 
				<label>New Password:</label> 
				<input type="password" placeholder="Current password">  
							
				<label>Re-type new Password:</label> 
				<input type="password" placeholder="Current password"> 
							
				<input type="submit" value="Save">
			</p> 
		<h2 class="controller"> 
			<span>Deactivate account</span><span class="edit">Edit</span>
		</h2> 
			<p class="content">
				<span>I wish to deactivate my account <input type="checkbox"></span> 
				<span>Please enter your password to confirm: </span>
				<input type="password" placeholder="Password"> 
				<input type="submit" value="Confirm">
			</p>
	</div>  