<?php get_header(); ?>
<div class="primary content news">
	<div class="wrapper">
		<div>
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/news-title.jpg" width="100%" />
		</div>
		<div class="section-content" style="margin-top:30px">
			<div class="entry-list">
				<?php $counter = 0;?>
				<?php while ( have_posts() ) : the_post();	?>
				<div class="entry-block <?php echo $counter %2 == 0 ? 'odd' : ''?>">
					<div class="thumb" style="background-image:url('<?php echo the_post_thumbnail_url();?>')">
						<a href="<?php echo get_permalink(); ?>">&nbsp;</a>
					</div>
					<div class="brief">
						<p><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></p>
						<p class="entry-date"><?php echo get_the_date('Y/m/d');?></p>
					</div>
					<div class="clear"></div>
				</div>
				<?php $counter ++; ?>
				<?php endwhile;	?>
				<div class="clear"></div>
			</div>
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