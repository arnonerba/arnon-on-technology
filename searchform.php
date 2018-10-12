<?php ?>

<form id="searchform" role="search" method="get" action="<?php echo esc_url(bloginfo('url')); ?>">
	<input class="textfield" type="search" placeholder="Search this blog" name="s">
	<button class="button iconbutton" type="submit"><i class="material-icons">search</i></button>
</form>