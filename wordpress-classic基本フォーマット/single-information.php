<?php get_header(); ?>
<div class="wrapper">
	<main>
		<section class="">
			<div class="">
				<?php if(have_posts()): while(have_posts()):the_post(); ?>
				<div class="">
					<p class=""><?php the_time('Y.m.d'); ?></p>
					<h3><?php the_title(); ?></h3>
				</div>
				<div class="">
					<p><?php the_content(); ?></p>
				</div>
				<?php endwhile; endif; ?>
				<div class="">
					<a class="" href="javascript:history.back()">戻る</a>
				</div>
			</div>
		</section>	
	</main>
		
		<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>


		
</body>
</html>