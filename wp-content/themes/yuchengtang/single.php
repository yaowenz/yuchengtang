<?php
get_header();
?>
<div class="primary content single wrapper">
	<?php
		$post = get_queried_object();
		the_post();
	?>
	<h3><?php the_title();?></h3>
	<p class="post-date"><?php echo the_date();?></p>
	<div style="width:30px;margin:auto;padding-top:50px;margin-bottom:30px">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/dot-divider.png" width="100%">
	</div>
	<div class="post">
		<?php the_content();?>
	</div>
</div>
<script type="text/javascript">
jQuery(function($) {
	$('#nav .news').addClass('active');
})
</script>
<?php get_footer(); ?>
