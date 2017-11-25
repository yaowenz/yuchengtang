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
	<div class="intro">
		<p>御承堂美术馆坐落于国际化大都市上海，沿黄浦江而立，与陆家嘴金融中心一线之隔，毗邻中华艺术宫。</p>
		<p>美术馆藏囊括各年代顶级官窑瓷器，更有华夏古陶瓷科学技术研究院作为研究支持，致力于为藏家提供专业及全方位的顾问服务，涵盖艺术品展示、艺术品鉴赏力培训、中长期收藏、投资、估价、私洽、出售、与艺术相关的房地产规划、美术馆计划、大型艺术活动组织策划、基金会计划等。除藏家外，御承堂也为艺术家提供定制服务。</p>
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
