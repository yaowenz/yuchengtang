<div class="content wrapper">
	<div class="page-title">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/books-title.png" width="100%">
	</div>
	<div style="width:30px;margin:auto;padding-top:50px;margin-bottom:30px">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/dot-divider.png" width="100%">
	</div>
	<div class="intro">
		<?php the_post();?>
		<?php the_content();?>
		<div class="clear"></div>
	</div>
</div>
</script>