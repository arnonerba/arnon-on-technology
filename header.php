<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if ( is_front_page() ) { ?>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<?php } else if ( is_category() ) { ?>
<meta name="description" content="<?php echo esc_html( sanitize_text_field( strip_tags( category_description() ) ) ); ?>">
<?php } else if ( is_tag() ) { ?>
<meta name="description" content="<?php echo esc_html( sanitize_text_field( strip_tags( tag_description() ) ) ); ?>">
<?php } else if ( is_single() ) { if ( has_excerpt() ) { ?>
<meta name="description" content="<?php echo esc_html( sanitize_text_field( strip_tags( get_the_excerpt() ) ) ); ?>">
<?php } } ?>
<?php wp_head(); ?>
<!-- Google Search Console -->
<meta name="google-site-verification" content="0opVnIXqhd-1DCNoneerJcu0x4-ZhgDNVmVH9dPAjhw" />
<!-- Bing Webmaster Tools -->
<meta name="msvalidate.01" content="4D1A52C1785709ECB11FD36363E94E84" />
</head>

<body>

<nav id="navdrawer">
	<i id="navmenubutton" class="shownav material-icons">close</i>
	<?php get_search_form(); ?>
	<hr>
	<ul>
		<li><i class="material-icons">home</i><a href="<?php bloginfo( 'url' ); ?>">Home</a></li>
		<li><i class="material-icons">chat</i><a href="https://www.arnonerba.com/contact">Contact Me</a></li>
	</ul>
	<hr>
	<span>Categories</span>
	<ul>
		<?php foreach( get_categories() as $cat ) { echo '<li><i class="material-icons">label</i><a href="'.get_category_link( $cat ).'">'.$cat->name.'</a></li>'; } ?>
	</ul>
	<hr>
	<span>Archives</span>
	<ul>
		<?php wp_get_archives( array( 'format' => 'custom', 'before' => '<li><i class="material-icons">folder</i>', 'after' => '</li>' )); ?>
	</ul>
</nav>

<div id="wrapper">

<i id="menubutton" class="shownav material-icons">menu</i>

<header id="header">
	<div class="headerpic">
	<img alt="Arnon Erba" src="/wp-content/uploads/arnon.png">
	</div>
	<div class="headertitle">
		<span><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></span>
	</div>
	<div class="headertext">
		<span>Life, the Universe, and Computing</span>
	</div>
</header>

<main class="container">
