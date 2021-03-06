<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="card">
			<div class="cardimage" style="background-image:url(<?php echo ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url() ) : esc_url( home_url( '/wp-content/uploads/default_thumbnail.png' ) ); ?>)"></div>
			<div class="cardtitle">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="cardsubtitle">
				<?php
				$posted_date_w3c = get_the_date( DATE_W3C );
				$posted_date_ymd = get_the_date( 'Y-m-d' );
				$posted_date = get_the_date();
				$modified_date_w3c = get_the_modified_date( DATE_W3C );
				$modified_date_ymd = get_the_modified_date( 'Y-m-d' );
				$modified_date = get_the_modified_date();
				$categories = get_the_category();
				$first_category = $categories[0];
				$first_category_link = get_category_link( $first_category );
				$first_category_name = $first_category->name
				?>
				<?php if ($modified_date_ymd > $posted_date_ymd) { ?><span class="modified-date">Updated <time datetime="<?php echo $modified_date_w3c; ?>"><?php echo $modified_date; ?></time></span><?php } ?>
				<span>Posted by <?php the_author_link(); ?> in <a href="<?php echo $first_category_link; ?>"><?php echo $first_category_name ?></a> on <time datetime="<?php echo $posted_date_w3c; ?>"><?php echo $posted_date; ?></time>.</span>
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
