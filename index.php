<?php get_header(); ?>

	<?php if ( is_category() ) { ?>
		<div class="card">
			<div class="cardtitle"><h1>Category: <?php single_cat_title(); ?></h1></div>
			<div class="cardtext full"><?php the_archive_description(); ?></div>
		</div>
	<?php } ?>

	<?php if ( is_tag() ) { ?>
		<div class="card">
			<div class="cardtitle"><h1>Posts Tagged #<?php single_tag_title(); ?></h1></div>
			<div class="cardtext full"><?php the_archive_description(); ?></div>
		</div>
	<?php } ?>

	<?php if ( is_date() ) { ?>
		<div class="card">
			<div class="cardtitle"><h1><?php the_archive_title(); ?></h1></div>
			<div class="cardtext full"><?php the_archive_description(); ?></div>
		</div>
	<?php } ?>

	<?php if ( is_search() ) { ?>
		<div class="card">
			<div class="cardtitle"><h1>Search Results for "<?php the_search_query(); ?>"</h1></div>
			<div class="cardtext full"><?php the_archive_description(); ?></div>
		</div>
	<?php } ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="card">
			<div class="cardimage" style="background-image:url(<?php echo ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url() ) : esc_url( home_url( '/wp-content/uploads/default_thumbnail.png' ) ); ?>)"></div>
			<div class="cardtitle">
				<h1><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
			</div>
			<div class="cardsubtitle">
				<h2>Posted on <time datetime="<?php echo get_the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time> by <?php the_author_link(); ?> in <?php $categories = get_the_category(); $cat = $categories[0]; echo '<a href="'.get_category_link( $cat ).'">'.$cat->name.'</a>'; ?></h2>
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
			<p>No posts found.</p>
			<a href="<?php bloginfo( 'url' ); ?>" class="button raised">Home</a>
		</div>
	<?php endif; ?>

	<nav id="page_navigation">
		<?php posts_nav_link( ' ', 'Previous Page', 'Next Page' ); ?>
	</nav>

<?php get_footer(); ?>
