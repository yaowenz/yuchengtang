<?php get_header(); ?>
<div class="primary content news">
	<div class="wrapper">
		<div>
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/news-title.jpg" width="100%" />
		</div>
		<div class="section-content" style="margin-top:30px">
			<ul class="entry-list">
			<?php while ( have_posts() ) : the_post();	?>
				<li>
					<div class="thumb">
						<a href="<?php echo get_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url();?>" width="100%" /></a>
					</div>
					<div class="brief">
						<p><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></p>
						<p class="entry-date"><?php echo get_the_date('Y/m/d');?></p>
					</div>
					<div class="clear"></div>
				</li>
			<?php endwhile;	?>
			</ul>
		</div>
		<?php
			the_posts_pagination(array(
				'screen_reader_text' => ' ',
				'prev_text'          => '上一页',
				'next_text'			 => '下一页',
			));
		?>
	</div>
</div>
<script>
jQuery(function($) {
	$('#nav .news').addClass('active');
});
</script>
<?php get_footer();