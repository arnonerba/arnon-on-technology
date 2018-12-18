<?php ?>

	<form id="searchform" role="search" method="get" action="<?php bloginfo( 'url' ); ?>">
		<input type="search" placeholder="Search this blog" value="<?php the_search_query(); ?>" name="s">
		<button class="button iconbutton" type="submit"><i class="material-icons">search</i></button>
	</form>
