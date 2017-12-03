<div id="slides" style="opacity:0">
	<div class="wrapper">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/banner-1.png" width="850"/>
	</div>
</div>
<div class="bg">
	<div class="content wrapper">
		<div class="news">
			<h2>新闻资讯</h2>
			<h2 class="eng">NEWS</h2>
			<ul>
				<?php
					$the_query = new WP_Query(['category_name' => 'news', 'post_type' => 'post', 'posts_per_page' => 3] );
					if ( $the_query->have_posts() ) :
						$count = $the_query->post_count;
						while ( $the_query->have_posts() ) :
							$the_query->the_post();
				?>
				<li><span class="title"><a href="<?php the_permalink()?>" title="<?php the_title();?>"><?php echo wp_trim_words(get_the_title(), 40, '...');?></a></span><span class="date"><?php the_date();?></span></li>
				<?php
						endwhile;
					endif;
				?>
			</ul>
			<div class="more">
				<a class="btn" href="<?php echo site_url('archives/category/news');?>">更多</a>
			</div>
		</div>
		<div class="tickets">
			<h2>预约观展</h2>
			<h2 class="eng">TICKETS</h2>
			<p style="color:#A57239;margin-top:25px;margin-bottom:5px;font-size:18px;font-weight:bold">周二 ~ 周六<p>
			<p style="color:#A57239;font-size:40px;font-family:Impact,Arial">10:00 ~ 16:30</p>
			<p style="margin-top:5px;font-size:14px">（周日、周一闭馆 ）</p>
			<p style="color:#3d5079;font-size:18px;margin-top:20px;border-top:1px dotted #999;padding-top:10px">上海市浦三路21弄55-56号银亿滨江中心17楼</p>
			<div class="more">
				<a class="btn" style="background:#3d5079" href="<?php echo site_url('tickets');?>">预约</a>
			</div>
		</div>
		<div class="antiques">
			<div class="intro">
				<div class="title" style="text-align:center;margin-top:150px">
					<img src="<?php echo get_template_directory_uri()?>/assets/images/title-antiques.png" width="60%" />
				</div>
				<div class="more" style="text-align:center;margin-top:80px">
					<a class="btn" style="background:#8E5025;font-size:16px" href="<?php echo site_url('archives/category/antiques');?>">更多</a>
				</div>
			</div>
			<div class="examples">
				<ul class="accordion">
					<li class="item1">
						<div class="name">
							<a href="<?php echo site_url('antique?id=146')?>" title="清乾隆珐琅彩九龙盘"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1-name.png" width="65" /></a>
						</div>
						<div class="mask"></div>
						<div class="pic">
							<a href="<?php echo site_url('antique?id=146')?>" title="清乾隆珐琅彩九龙盘"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" width="100%"/></a>
						</div>
					</li>
					<li class="item2">
						<div class="name">
							<a href="<?php echo site_url('antique?id=158')?>" title="明宣德青花缠枝纹梅瓶"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-2-name.png" width="65" /></a>
						</div>
						<div class="mask"></div>
						<div class="pic">
							<a href="<?php echo site_url('antique?id=158')?>" title="明宣德青花缠枝纹梅瓶"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-2.jpg" width="100%" /></a>
						</div>
					</li>
					<li class="item3">
						<div class="name">
							<a href="<?php echo site_url('antique?id=148')?>" title="元龙泉窑荷叶盖罐"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-3-name.png" width="65" /></a>
						</div>
						<div class="mask"></div>
						<div class="pic">
							<a href="<?php echo site_url('antique?id=148')?>" title="元龙泉窑荷叶盖罐"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-3.jpg" width="100%" /></a>
						</div>
					</li>
					<li class="item4">
						<div class="name">
							<a href="<?php echo site_url('antique?id=150')?>" title="宋汝窑鼓钉洗"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-4-name.png" width="65" /></a>
						</div>
						<div class="mask"></div>
						<div class="pic">
							<a href="<?php echo site_url('antique?id=150')?>" title="宋汝窑鼓钉洗"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-4.jpg" width="100%" /></a>
						</div>
					</li>
					
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(function($) {
	$(".antiques .examples .accordion").zAccordion({
		startingSlide: 0,
		auto: false,
		slideWidth: 330,
		//tabWidth: "15%",
		width: 650,
		slideClass: "slider",
		height: 500,
		trigger: "mouseover",
		speed: 300
	});

	// Animation
	var bannerAnimation = anime.timeline({
        loop: false,
        autoplay: true
    });
	bannerAnimation.add({
      targets: '#slides',
      opacity: 1,
      scale: 1.05,
      easing: 'linear',
      duration: 2500,
    });
})
</script>