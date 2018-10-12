</main>

<footer id="footer">
	<div class="footertext">&copy; Arnon Erba <?php echo date('Y'); ?></div>
</footer>

</div>

<div id="scrim"></div>

<?php wp_footer(); ?>

<script>jQuery(document).ready(function(){jQuery("i.shownav").click(function(e){jQuery("#navdrawer").toggleClass("navdraweropen"),jQuery("#scrim").toggleClass("visible"),jQuery(document.body).toggleClass("noscroll"),e.stopPropagation()}),jQuery("#scrim").click(function(e){jQuery("#navdrawer").removeClass("navdraweropen"),jQuery("#scrim").removeClass("visible"),jQuery(document.body).removeClass("noscroll")})}),jQuery(window).scroll(function(){jQuery(document).scrollTop()>0?jQuery("#header").addClass("scrolled"):jQuery("#header").removeClass("scrolled")});</script>

</body>

</html>