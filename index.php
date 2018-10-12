<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="card">
			<div class="cardimage">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				} else { ?><img src="/wp-content/uploads/default_thumbnail.png" alt=""><?php } ?>
			</div>
			<div class="cardtitle">
				<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
			</div>
			<div class="cardsubtitle">
				<?php the_date(); ?>
			</div>
			<div class="cardtext">
				<?php the_content(); ?>
			</div>
			<div class="cardactions">
				<a href="<?php echo get_permalink(); ?>" class="button">View Full Post</a>
			</div>
		</article>
	<?php endwhile; else : ?>
	<div class="error">
		<span id="shruggie">¯\_(ツ)_/¯</span>
		<p>No posts found</p>
		<a href="/" class="button">Home</a>
	</div>
	<?php endif; ?>

<div id="page_navigation">
	<?php posts_nav_link( ' ', 'Previous Page', 'Next Page' ); ?>
</div>

<?php get_footer(); ?>