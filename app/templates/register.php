<?php 
	$this -> layout('master',[
		'title'=>'Sign up', 
		'desc' => 'Create an account' 
	]); 
?>
	<div id="signup-background"></div>
		<div id="box"> 	
		<a href="index.php?page=home" class="home-button"><i class="fa fa-home" aria-hidden="true"></i></a>
			<div id="create-account"> 
				<h1>Create an account</h1> 
				<form action="#" method="post" id="signup-form">
					<div>
						<input type="text" id="fname" name="first-name" placeholder="First Name" value="<?= isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>"> 
						<?php if( isset($firstNameMessage) ) : ?>
            			<p> <?= $firstNameMessage ?> </p>
            			<?php endif; ?>
					</div>
					<div>
						<input type="text" id="lname" name="last-name" placeholder="Last Name" value="<?= isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>">
						<?php if( isset($lastNameMessage) ) : ?>
            			<p> <?= $lastNameMessage ?> </p>
            			<?php endif; ?>
					</div>
					<div>
						<input type="email" id="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"> 
						<?php if( isset($emailMessage) ) : ?>
            			<p> <?= $emailMessage ?> </p>
            			<?php endif; ?>
					</div> 
					<div>
						<input type="password" id="pwd" name="password" placeholder="Password">
					</div> 
					<div>
						<input type="password" id="pwd" name="password2" placeholder="Confirm Password">
						<?php if( isset($passwordMessage) ) : ?>
            			<p> <?= $passwordMessage ?> </p>
            			<?php endif; ?>
					</div> 
					<div>
						<input id="submit-bttn" type="submit" name="new-account" value="Create Account">
					</div> 
				</form> 
				<hr> 
				<p>Have an account? <a href="index.php?page=login">Log in</a></p>
			</div>
		</div>  