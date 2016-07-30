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
					<li><a href="#"><i class="fa fa-sign-out"></i> Log out</a></li>
					<li><a href="account.html"><i class="fa fa-user"></i> My Account</a></li>
	<?php if($_SESSION['privilege'] == 'admin'): ?>					
					<li><a href="#"><i class="fa fa-cog"></i> Site Maintenance</a></li> 
					<li><a href="#"><i class="fa fa-info-circle"></i> Help</a></li> 
	<?php endif; ?>
				</ul> 
			</div>
<?php endif; ?>						

	</nav>