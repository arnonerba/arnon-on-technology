<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="card">
			<div class="cardimage" style="background-image:url(<?php echo ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url() ) : esc_url( home_url( '/wp-content/uploads/default_thumbnail.png' ) ); ?>)"></div>
			<div class="cardtitle">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="cardsubtitle">
				<h2>Posted on <time datetime="<?php echo get_the_date( DATE_W3C ); ?>"><?php echo get_the_date(); ?></time> by <?php the_author_link(); ?> in <?php $categories = get_the_category(); $cat = $categories[0]; echo '<a href="'.get_category_link( $cat ).'">'.$cat->name.'</a>'; ?></h2>
			</div>
			<div class="cardtext full">
				<?php the_content(); ?>
			</div>
			<div class="cardactions">
				<div class="cardtags">Tagged: <?php foreach( get_the_tags() as $tag ) { echo '<a href="'.get_tag_link( $tag ).'">'.'#'.str_replace( " ", "-", strtolower( $tag->name ) ).'</a>'. ' '; } ?></div>
			</div>
		</article>
		<section class="card">
			<div class="cardtext full smallfont">
				<?php comments_template(); ?>
			</div>
		</section>
	<?php endwhile; ?>
	<?php endif; ?>

	<nav id="page_navigation">
		<?php next_post_link( '%link', 'Newer Post', FALSE ); ?>
		<a href="<?php bloginfo( 'url' ); ?>">Home</a>
		<?php previous_post_link( '%link', 'Older Post', FALSE ); ?>
	</nav>

<?php get_footer(); ?>
