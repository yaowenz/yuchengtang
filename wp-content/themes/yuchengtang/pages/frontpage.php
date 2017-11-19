<div id="slides" style="opacity:0">
	<div class="wrapper">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/banner-1.png" width="850"/>
	</div>
</div>
<div class="content wrapper">
	<div class="news">
		<h2>新闻资讯</h2>
		<h2 class="eng">NEWS</h2>
		<ul>
			<li><a href="#">御承堂博物馆特别展览“御窑遗珍-G20及金砖五国会议官窑瓷器展”开幕</a><span class="date">2017.10.28</span></li>
			<li><a href="#">“小小艺术家”系列童书及《蔡暄民谈收藏》举办签售会</a><span class="date">2016.10.28</span></li>
			<li><a href="#">私人博物馆可持续发展论坛——暨上海御承堂博物馆开馆典礼在沪圆满举行</a><span class="date">2016.10.28</span></li>
		</ul>
		<div class="more">
			<a class="btn">更多</a>
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
			<a class="btn" style="background:#3d5079">预约</a>
		</div>
	</div>
	<div class="antiques">
		<div class="intro">
			<div class="title" style="text-align:center;margin-top:150px">
				<img src="<?php echo get_template_directory_uri()?>/assets/images/title-antiques.png" />
			</div>
			<div class="more" style="text-align:center;margin-top:80px">
				<a class="btn" style="background:#8E5025;font-size:16px">更多</a>
			</div>
		</div>
		<div class="examples">
			<ul class="accordion">
				<li class="item1">
					<div class="name">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1-name.png" />
					</div>
					<div class="mask"></div>
					<div class="pic">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" />
					</div>
				</li>
				<li class="item2">
					<div class="name">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1-name.png" />
					</div>
					<div class="mask"></div>
					<div class="pic">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" />
					</div>
				</li>
				<li class="item3">
					<div class="name">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1-name.png" />
					</div>
					<div class="mask"></div>
					<div class="pic">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" />
					</div>
				</li>
				<li class="item4">
					<div class="name">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1-name.png" />
					</div>
					<div class="mask"></div>
					<div class="pic">
						<img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" />
					</div>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
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