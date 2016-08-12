<?php 
	$this -> layout('master',[
		'title'=>'Search', 
		'desc' => 'view your search results' 

	]); 
?>  
<body id="search-bg"> 
	<?= $this->insert('nav') ?>  
	<div id="search-results">

		<h1>Search results for <i>"title"</i></h1>

		<a href="index.php?page=home">
			<div class="result">
				<div class="result-content">
					<div class="result-img"> 
						<img src="http://placehold.it/150x150">
					</div> 
					<div class="result-decs">
						<article>
							<h3>Title</h3> 
							<p><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</i> </p>
						</article>
					</div> 
				</div>
			</div> 
		</a>


	</div>

