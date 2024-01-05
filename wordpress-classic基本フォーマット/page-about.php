<?php get_header(); ?>
<div class="wrapper">
	<main>
		<?php
		 if (have_posts()):
		  while (have_posts()) : the_post();
		   the_content(); // 本文を出力
		  endwhile;
		 endif;
		?>
	</main>
		
		<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>


		
</body>
</html>