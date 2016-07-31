<nav> 
	<div id="nav-text">
		<a href="index.html">
			<i class="fa fa-home" aria-hidden="true"></i> Home
		</a>  
								
		<span id="search">
			<span id="search-control" >
				<i class="fa fa-search" aria-hidden="true"></i> 
				<span id="search-s">Search</span> 
			</span>
				<span id="search-bar"><input type="text" name="search" placeholder="Search" id="search"></span>
		</span> 
		<?php if(isset($_SESSION['id'])): ?>
		<span id="account" >
			<img src="http://placehold.it/40x40"> <span id="acc-name" class="clicked">User</span>
		</span> 
	</div> 
	<div class="mod-nav" id="acc-box"> 
		<ul>
			<li><a href="index.php?page=logout"><i class="fa fa-sign-out"></i> Log out</a></li>
			<li><a href="index.php?page=account"><i class="fa fa-user"></i> My Account</a></li>
	<?php if($_SESSION['privilege'] == 'admin'): ?>					
			
			<li><a href="#"><i class="fa fa-cog"></i> Site Maintenance</a></li> 
			<li><a href="#"><i class="fa fa-info-circle"></i> Help</a></li> 
		</ul> 

	<?php endif; ?> 
		<?php else: ?> 
		<span id="v-account" class="clicked">
			<i class="fa fa-user" aria-hidden="true"></i> <span class="smallT" >Log in/Sign up</span>
		</span> 
	</div> 
	<div class="v-acc-box" id="acc-box"> 
		<div id="acc-box-content">
			<div id="log-bttm">
						
						<p>Have an account?</p> 
						<a id="sign-up" href="index.php?page=login">Log in</a>
						<p>Don't have an account?</p> 
						<a id="sign-up" href="index.php?page=register">Sign up</a> 
					</div>
		</div>
	</div> 
	<?php ; ?>
	 
	</div>
	<?php endif; ?>						
</nav> 
