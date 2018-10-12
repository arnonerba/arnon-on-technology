<?php ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (is_front_page()): ?><meta name="description" content="<?php bloginfo('description'); ?>">
<?php endif ?>
<?php wp_head();?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-72396631-3', 'auto');
ga('send', 'pageview');
</script>
</head>

<body>

<nav id="navdrawer">
	<div class="logo">
		<i id="navmenubutton" class="shownav material-icons">close</i>
	</div>
	<?php get_search_form(); ?>
		<ul>
			<li><a href="/">Blog Home</a></li>
			<li><a href="https://www.arnonerba.com/">My Website</a></li>
			<li><a href="https://www.arnonerba.com/about">About Me</a></li>
			<li><a>Categories</a></li>
			<li>
				<ul>
					<?php wp_list_categories(array( 'title_li' => '' ) ); ?>
				</ul>
			</li>
			<li><a>Blog Archives</a></li>
			<li>
				<ul>
					<?php wp_get_archives(); ?>
				</ul>
			</li>
		</ul>
</nav>

<div id="wrapper">

<i id="menubutton" class="shownav material-icons">menu</i>

<header id="header">
	<div class="headerpic">
	<img alt="Profile pic" src="/wp-content/uploads/profilepic.png">
	</div>
	<div class="headertitle">
		<h1><a href="/"><?php bloginfo($show = 'name'); ?></a></h1>
	</div>
	<div class="headertext">
		<h2>Artist. IT Tech. Web Designer. Musician. Creator.</h2>
	</div>
</header>

<main class="container">