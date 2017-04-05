<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<?php  
	/*
	*  Meta Tags
	*/
	echo $this->meta_tags->generate_meta_tags();
	/*
	*	Meta Social
	*/
	echo $this->meta_tags->generate_meta_social();
	?>
	<link rel="stylesheet" href="<?php echo base_url('public/css/style.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/img/logo-xs.png') ?>"/>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>
<body>
	<header></header>
	<section class="wrapper">
		<aside class="sidebar">
			<form action="main" method="get">
			<div class="search-box">
				<input type="text" name="query" value="<?php echo $this->input->get('query') ?>" placeholder="Search...">
				<input type="hidden" name="filter" value="true">
			</div>
			</form>
			<span class="block-heading">Navigartion</span>
			<ul class="menu">
			  <li><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
			  <li><a href="<?php echo site_url('?filter=true'); ?>" class="nav-link">Journal Archive</a></li>
			  <li><a href="" class="nav-link">About</a></li>
			<?php 
				if($this->session->userdata('is_login') == FALSE) : 
			?>
			  <li><a href="<?php echo base_url("register"); ?>" class="nav-link">Register</a></li>
			  <li><a href="<?php echo base_url("login"); ?>" class="nav-link">Login</a></li>
			<?php else : 
				if($this->session->userdata('account')->user_type == 'admin') :
			?>
			  <li><a href="<?php echo base_url("journal/create"); ?>" class="nav-link">Create Journal</a></li>
			  <li><a href="" class="nav-link">Category</a></li>
			  <li><a href="" class="nav-link">Users</a></li>
				<?php endif; ?>
			  <li><a href="<?php echo base_url("account"); ?>" class="nav-link">My Account</a></li>
			  <li><a href="<?php echo base_url("main/signout"); ?>" class="nav-link">Sign Out</a></li>
			<?php endif; ?>
			</ul>
		</aside>
		<div class="content">
