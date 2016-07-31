<?php 
	$this -> layout('master',[
		'title'=>'Log in', 
		'desc' => 'Sign in to view your account' 
	]); 
?>
<body>
	<div id="signup-background"></div>
	<div id="box"> 	
		<div id="create-account"> 
			<h1>Log in</h1> 
			<form action="index.php?page=login" method="post" id="login-form">
				<div>
					<input name="email" type="email" placeholder="Email" value="<?= isset($_POST['login']) ? $_POST['email'] : '' ?>"> 
						<?php if(isset($emailMessage)): ?>
							<p><?= $emailMessage ?></p>
						<?php endif; ?>
				</div>
				
				<div>
					<input name="password" type="password" placeholder="Password"> 
						<?php if(isset($passwordMessage)): ?>
							<p><?= $passwordMessage ?></p>
						<?php endif; ?> 

						<?php if(isset($loginMessage)): ?>
							<p><?= $loginMessage ?></p>
						<?php endif; ?>
				</div> 
				
				<div>
					<input id="login-button" type="submit" name="login" value="Log in">
				</div>
			</form>
			<hr> 
			<p>Don't have an Account? <a href="index.php?page=register">Sign up</a></p>
		</div>
	</div>