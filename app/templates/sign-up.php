<?php $this -> layout('master'); ?>
<body>
	<div id="signup-background"></div>
		<div id="box"> 	
			<div id="create-account"> 
				<h1>Create an account</h1> 
				<form action="index.php?page=home" method="post" id="signin-form">
					<div>
						<input type="text" id="fname" placeholder="First Name"> 
						<span id="fname-message"></span>
					</div>
					<div>
						<input type="text" id="lname" placeholder="Last Name">
						<span id="lname-message"></span>
					</div>
					<div>
						<input type="email" id="email" placeholder="Email"> 
						<span id="email-message"></span>
					</div> 
					<div>
						<input type="password" id="pwd" placeholder="Password">
						<span id="pwd-message"></span>
					</div> 
					<div>
						<input type="password" id="pwd" placeholder="Confirm Password">
						<span id="c-pwd-message"></span>
					</div> 
					<div>
						<input id="submit-bttn" type="submit" name="Create Account" value="Create Account">
					</div> 
				</form> 
				<hr> 
				<p>Have an account? <a href="index.php?page=home">Log in</a></p>
			</div>
		</div>  