<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="card">
			<div class="cardimage">
				<?php if (has_post_thumbnail()) {
					the_post_thumbnail();
				} else { ?><img src="/wp-content/uploads/default_thumbnail.png" alt=""><?php } ?>
			</div>
			<div class="cardtitle">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="cardsubtitle">
				<h2><?php the_date(); ?> by <?php the_author_link(); ?></h2>
			</div>
			<div class="cardtext full">
				<?php the_content(); ?>
			</div>
			<div class="cardactions">
				<div class="cardtags">Tagged: <?php foreach( get_the_category() as $cat ) { echo '<a href="'.get_category_link($cat).'">'.'#'.str_replace(" ", "-", strtolower($cat->name)).'</a>'. ' '; } ?></div>
			</div>
		</article>
	<?php endwhile; ?>
	<?php endif; ?>

<div id="page_navigation">
	<?php next_post_link('%link', 'Newer Post', FALSE); ?>
	<a href="<?php bloginfo('url'); ?>">Home</a>
	<?php previous_post_link('%link', 'Older Post', FALSE); ?>
</div>

<?php get_footer(); ?>