</main>

<footer id="footer">
	<div class="footertext">&copy; Arnon Erba <?php echo date('Y'); ?></div>
</footer>

</div>

<?php wp_footer(); ?>

<script>$(document).ready(function(){$("i.shownav").click(function(e){$("#navdrawer").toggleClass("navdraweropen"),$("#wrapper").toggleClass("siteshifted"),e.stopPropagation()}),$("#wrapper").click(function(e){$("#navdrawer").removeClass("navdraweropen"),$("#wrapper").removeClass("siteshifted")})}),$(window).scroll(function(){$(document).scrollTop()>0?$("#header").addClass("scrolled"):$("#header").removeClass("scrolled")});</script>

</body>

</html>