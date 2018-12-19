<?php get_header(); ?>

	<div class="card">
		<div class="cardtitle"><h1>404: Page not found</h1></div>
		<div class="cardtext full"></div>
	</div>

	<div class="error">
		<span id="shruggie">¯\_(ツ)_/¯</span>
		<p>Uh oh, we can't find that page.</p>
		<a href="<?php bloginfo( 'url' ); ?>" class="button raised">Home</a>
	</div>

<?php get_footer(); ?>
