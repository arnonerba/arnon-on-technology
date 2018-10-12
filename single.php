<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="card">
			<div class="cardimage">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} else { ?><img src="/wp-content/uploads/default_thumbnail.png" alt=""><?php } ?>
			</div>
			<div class="cardtitle">
				<?php the_title(); ?>
			</div>
			<div class="cardsubtitle">
				<?php the_date(); ?>
			</div>
			<div class="cardtext full">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
	<?php endif; ?>

<div id="page_navigation">
	<?php next_post_link( '%link', 'Newer Post', FALSE ); ?>
	<a href="/">Home</a>
	<?php previous_post_link( '%link', 'Older Post', FALSE ); ?>
</div>

<?php get_footer(); ?>