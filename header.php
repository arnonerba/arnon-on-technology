<?php ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (is_front_page()): ?><meta name="description" content="<?php bloginfo('description'); ?>">
<?php endif ?>
<?php wp_head();?>
<!-- Meta tag for Bing Webmaster Tools -->
<meta name="msvalidate.01" content="4D1A52C1785709ECB11FD36363E94E84" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-72396631-3"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-72396631-3');
</script>
</head>

<body>

<nav id="navdrawer">
	<div class="logo">
		<i id="navmenubutton" class="shownav material-icons">close</i>
	</div>
	<?php get_search_form(); ?>
		<ul>
			<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
			<li><a href="https://www.arnonerba.com/contact">Contact Me</a></li>
			<li><a>Categories</a></li>
			<li>
				<ul>
					<?php wp_list_categories(array('title_li' => '' )); ?>
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
	<img alt="Arnon Erba" src="/wp-content/uploads/profilepic.png">
	</div>
	<div class="headertitle">
		<span><a href="<?php bloginfo('url'); ?>"><?php bloginfo($show = 'name'); ?></a></span>
	</div>
	<div class="headertext">
		<span>Life, the Universe, and Computing</span>
	</div>
</header>

<main class="container">