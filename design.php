<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E-Journal STIE Pertiba Pangkalpinang</title>
	<link rel="stylesheet" href="public/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="public/img/logo-xs.png"/>
</head>
<body>
	<header></header>
	<section class="wrapper">
		<aside class="sidebar">
			<div class="search-box">
				<input type="text" placeholder="Pencarian...">
			</div>
			<span class="block-heading">Navigartion</span>
			<ul class="menu">
			  <li><a href="index.php" class="nav-link">Home</a></li>
			  <li><a href="#fg" class="nav-link">About</a></li>
			</ul>
			<span class="block-heading">My Account</span>
			<ul class="menu">
			  <li><a href="index.php" class="nav-link">Register</a></li>
			  <li><a href="#fg" class="nav-link">Login</a></li>
			</ul>
		</aside>
		<div class="content">
		<?php  
		switch (@$_GET['p']) :	
			default:
		?>
		<?php for($i=1; $i <=5; $i++) : ?>
			<div class="box-list">
				<img src="public/img/book-1.jpg" alt="">
				<div class="box-content">
					<h2><a href="?p=detail" class="title">Sistem Akuntansi Pertanggung Jawaban</a></h2>
					<p><small><i>Author : <a href="">Amran Rasyid</a></i></small></p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt modi ipsam quod nobis, quidem iure explicabo a nisi illo obcaecati. Hic provident sed magnam, libero quibusdam similique fuga facere. Ut beatae esse odio earum, nulla ab iure ipsa expedita provident?</p>
					<p><a href="" class="read-more">Read more..</a></p>
				</div>
			</div>
			<div style="clear: both;"></div>
		<?php endfor; ?>
		
			<div class="pagination">
			  <a href="#">&laquo; Prev</a>
			  <a href="#">1</a>
			  <a class="active" href="#">2</a>
			  <a href="#">3</a>
			  <a href="#">4</a>
			  <a href="#">5</a>
			  <a href="#">6</a>
			  <a href="#">Next &raquo;</a>
			</div>
		<?php break; case 'detail'; ?>
			<div class="box-list">
				<div class="box-detail">
					<h1>Sistem Akuntansi Pertanggung Jawab2n</h1>
					<p><small>Author : <a href="">Amran Rasyid</a> (<i>STIE Pertiba Pangkalpinang</i>)</small></p>
					<a class="btn default">Download PDF</a>
					<h3>Abstrak</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint quas assumenda repudiandae, est aut ullam doloribus error rerum, neque provident corporis eaque repellendus eum. Autem libero officia vitae eveniet rem, esse illum ipsam. Tempore saepe quis fuga aliquid quae reiciendis, velit, assumenda illo omnis natus, quasi cupiditate hic soluta corporis.</p>
					<p>Soluta, molestiae vero, inventore dolore excepturi quasi suscipit earum voluptas autem accusantium distinctio officia sit eligendi quaerat aspernatur necessitatibus expedita corporis, eveniet ut sequi libero, mollitia adipisci. Suscipit possimus commodi nobis quae aut quia porro necessitatibus maiores sapiente numquam minus minima saepe laborum, laudantium eum consequatur, ad doloremque. Tempore, dolorum.</p>
					<p>Illo voluptas autem in architecto fuga consectetur placeat amet sit nostrum vel debitis pariatur rerum sed porro sint molestias quibusdam, atque veritatis voluptates, vitae quae. A, cum enim harum, nulla dolore tenetur pariatur cupiditate reiciendis necessitatibus ducimus consequatur consequuntur illum dolorum totam, autem adipisci aperiam inventore, quae doloremque possimus. In.</p>
				</div>
			</div>
		<?php break; ?>
		<?php endswitch; ?>
		</div>
	</section>
	<footer>
		<small>Hak Cipta &copy; 2017 E-Journal System <a href="">IT Divisi STIE Pertiba</a> .</small>
	</footer>	
</body>
</html>