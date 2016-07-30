<?php 
	$this -> layout('master',[
		'title'=>'Sign up', 
		'desc' => 'Create an account' 
	]); 
?>
<body>
	<div id="signup-background"></div>
		<div id="box"> 	
			<div id="create-account"> 
				<h1>Create an account</h1> 
				<form action="#" method="post" id="signup-form">
					<div>
						<input type="text" id="fname" name="first-name" placeholder="First Name"> 
						<?php if( isset($firstNameMessage) ) : ?>
            			<p> <?= $firstNameMessage ?> </p>
            			<?php endif; ?>
					</div>
					<div>
						<input type="text" id="lname" name="last-name" placeholder="Last Name">
						<?php if( isset($lastNameMessage) ) : ?>
            			<p> <?= $lastNameMessage ?> </p>
            			<?php endif; ?>
					</div>
					<div>
						<input type="email" id="email" name="email" placeholder="Email"> 
						<?php if( isset($emailMessage) ) : ?>
            			<p> <?= $emailMessage ?> </p>
            			<?php endif; ?>
					</div> 
					<div>
						<input type="password" id="pwd" name="password" placeholder="Password">
						<?php if( isset($passwordMessage) ) : ?>
            			<p> <?= $passwordMessage ?> </p>
            			<?php endif; ?>
					</div> 
				<!-- 	<div>
						<input type="password" id="pwd" placeholder="Confirm Password">
						<span id="c-pwd-message"></span>
					</div>  -->
					<div>
						<input id="submit-bttn" type="submit" name="new-account" value="Create Account">
					</div> 
				</form> 
				<hr> 
				<p>Have an account? <a href="index.php?page=home">Log in</a></p>
			</div>
		</div>  