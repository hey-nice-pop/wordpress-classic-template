<?php get_header(); ?>
<div class="wrapper">
	<main>
		<section class="">
		<div class="">
			<h2 class="">トピックス</h2>
			
			<dl class="">
				
				<?php
  					$args = array(
    				'post_type' => 'topics', //カスタム投稿タイプ名
    				'posts_per_page' => 3, //取得する投稿の件数
					'orderby' => 'date', //日付で並び替え
    				'order' => 'DESC' // 降順 or 昇順
  					);
 
  					$my_posts = get_posts($args);
				?>
 
				<?php foreach ($my_posts as $post) : setup_postdata($post); ?>
				
				<div class="">
				<a href="<?php the_permalink(); ?>" class="">
					<dt class=""><?php the_time('Y.m.d') ?></dt>
					<dd class=""><?php the_title(); ?></dd>
				</a>
				</div>
				
				<?php endforeach; ?>
 
				<?php wp_reset_postdata(); ?>
				
			</dl>
			
			<div class="">
				<a class="" href="<?php echo get_post_type_archive_link( 'topics' ); ?>">一覧はこちら</a>
			</div>
		</div>
		</section>
	
	
		<section class="">
		<div class="">
			<h2 class="">新着情報/Information</h2>
			
			<dl class="">
				
				<?php
  					$args = array(
    				'post_type' => 'information', //カスタム投稿タイプ名
    				'posts_per_page' => 3, //取得する投稿の件数
					'orderby' => 'date', //日付で並び替え
    				'order' => 'DESC' // 降順 or 昇順
  					);
 
  					$my_posts = get_posts($args);
				?>
 
				<?php foreach ($my_posts as $post) : setup_postdata($post); ?>
				
				<div class="">
				<a href="<?php the_permalink(); ?>" class="">
					<dt class=""><?php the_time('Y.m.d') ?></dt>
					<dd class=""><?php the_title(); ?></dd>
				</a>
				</div>
				
				<?php endforeach; ?>
 
				<?php wp_reset_postdata(); ?>
				
			</dl>
			
			<div class="">
				<a class="" href="<?php echo get_post_type_archive_link( 'information' ); ?>">一覧はこちら</a>
			</div>
		</div>
		</section>
	</main>
		
		<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>


		
</body>
</html>