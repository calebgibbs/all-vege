<?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= $title ?></title> 								
		<meta name="description" content="<?= $desc ?>"> 		
		<link rel="stylesheet" href="css/styles.css">
		<link rel="icon" href="images/logo.png">
		<script src="https://use.fontawesome.com/228e8d7980.js"></script>
	</head> 
	
	<?php if($page != 'search'): ?>
	<body>
	<?php endif; ?>

	<?php if($page != 'login' && $page != 'register' && $page != 'search'): ?>
		<?= $this->insert('nav') ?> 
	<?php endif; ?>

	<?= $this->section('content') ?>

	<footer>
		<?php if($page != 'login' && $page != 'register'): ?>
			<p>Copyright &copy; <?php echo date('Y') ?></p>
		<?php endif; ?>
	</footer>    
	 
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script> 
	<script type="text/javascript" src="js/animation.js"></script> 
	<script type="text/javascript" src="js/accountValidation.js"></script> 
	</body>
</html> 
