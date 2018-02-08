<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui, user-scalable=no" />
	<meta name="format-detection" content="telephone=no"/>
	<meta name="keywords" content="御承堂" />
	<meta name="description" content="御承堂是著名大藏家蔡暄民和其他几位藏家继2002年杭州东明白庐艺术馆后在上海建立的另一家顶级传统艺术馆，收藏囊括各年代顶级官窑瓷器，书画，家具和杂项，长期致力于中国传统文化艺术的在全球范围内的收藏，研究，展览，教育和传播，与各国各大博物馆和艺术院校合作及华夏古陶瓷科学技术研究院作为研究支持, 辅以专业课程及艺术类出版物衍生品，以传播和传承中国传统文化为使命，打造世界级的私立美术馆。" />
	<meta name="author" content="" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<?php endif; ?>
	<?php wp_head(); ?>
	<script>
		var _hmt = _hmt || [];
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?b690ee2295a4ff15acf1bf0080cb0dd1";
		  var s = document.getElementsByTagName("script")[0];
		  s.parentNode.insertBefore(hm, s);
		})();
	</script>
</head>
<body <?php body_class(); ?>>
<!-- Nav -->
<div id="nav">
	<div class="header wrapper">
		<div class="logo">
			<span><a href="<?php echo site_url()?>" title="首页"><img src="<?php echo get_template_directory_uri()?>/assets/images/logo-yct.png" valign="middle" /></a></span>
		</div>
		<div class="menu-link mobile"><span class="menu-icon"></span><div>菜单 Menu</div></div>
		<ul class="menu noshow">
			<li class="news text">
				<a href="<?php echo site_url('archives/category/news')?>" title="资讯"><span class="mobile"><span class="text-cn">资讯</span><span class="text-en">NEWS</span></span></a>
			</li>
			<li class="antiques text">
				<a href="<?php echo site_url('archives/category/antiques')?>" title="藏品"><span class="mobile"><span class="text-cn">藏品</span><span class="text-en">COLLECTIONS</span></span></a>
			</li>
			<li class="tickets text">
				<a href="javascript:;" title="观展"><span class="mobile"><span class="text-cn">观展</span><span class="text-en">EXBITIONS</span></span></a>
				<ul class="sub-menu">
					<li><a href="<?php echo site_url('reservation')?>"><span class="text-cn">预约购票</span><span class="text-en">Reservation</span></a></li>
					<li><a href="http://720yun.com/t/504j5zkmsk2" target="_blank"><span class="text-cn">360全景展厅</span><span class="text-en">Panoramic Exhibition</span></a></li>
				</ul>
			</li>
			<li class="culture text">
				<a href="javascript:;" title="文化教育"><span class="mobile"><span class="text-cn">文化教育</span><span class="text-en">CLUTURE</span></span></a>
				<ul class="sub-menu">
					<li><a href="<?php echo site_url('books')?>"><span class="text-cn">图书出版</span><span class="text-en">Press Releases</span></a></li>
					<li><a href="javascript:;"><span class="text-cn">讲座课程</span><span class="text-en">Lectures  & Courses</span></a></li>
				</ul>
			</li>
			<li class="support text">
				<a href="javascript:;" title="支持"><span class="mobile"><span class="text-cn">支持</span><span class="text-en">SUPPORT US</span></span></a>
				<ul class="sub-menu">
					<li><a href="javascript:;"><span class="text-cn">品牌活动</span><span class="text-en">Brand Activities</span></a></li>
					<li><a href="javascript:;"><span class="text-cn">赞助</span><span class="text-en">Sponsor Us</span></a></li>
				</ul>
			</li>
			<li class="shop text">
				<a href="https://weidian.com/?userid=581132515&ifr=shopdetail&wfr=c" title="商店"><span class="mobile"><span class="text-cn">商店</span><span class="text-en">SHOP</span></span></a>
			</li>
			<li class="about text">
				<a href="<?php echo site_url('about')?>" title="关于"><span class="mobile"><span class="text-cn">关于</span><span class="text-en">ABOUT</span></span></a>
			</li>
			<li class="mobile joinus text">
				<a href="<?php echo site_url('joinus')?>" title="加入我们"><span class="mobile"><span class="text-cn">加入我们</span><span class="text-en">JOIN US</span></span></a>
			</li>
			<li class="mobile joinus text">
				<a href="<?php echo site_url('about')?>#contactus" title="联系我们"><span class="mobile"><span class="text-cn">联系我们</span><span class="text-en">CONTACT US</span></span></a>
			</li>
			<li class="language text mobile text-cn">
				<a href="<?php echo site_url()?>?lang=en" title="ENGLISH">ENGLISH</a>
			</li>
			<li class="language text mobile text-en">
				<a href="<?php echo site_url()?>?lang=cn" title="中文">中文</a>
			</li>
			<!--
			<li class="search">
				<a href="javascript:void;" title="search">&nbsp;</a>
			</li>
			 -->
		</ul>
		<div class="desktop menu-shortcut">
			<ul>
				<li><a href="<?php echo site_url('joinus');?>"><span class="text-cn">加入我们</span><span class="text-en">JOIN US</span></a></li>
				<li><a href="<?php echo site_url('about#contactus');?>"><span class="text-cn">联系我们</span><span class="text-en">CONTACT US</span></a></li>
				<li><span class="text-cn"><a href="<?php echo site_url();?>?lang=en">ENG</a></span><span class="text-en"><a href="<?php echo site_url();?>?lang=cn">中文</a></span></li>
			</ul>
		</div>
	</div>
</div>
<script>
jQuery(function($) {
	// Logo Animation for vertical layout
	var navMenuAnime;
	$('.category-antiques #nav, .page.antique #nav').hover(
		function() {
			if (navMenuAnime == undefined) {
				navMenuAnime = anime.timeline();
				for (var i=1; i <= 9; i++) {
					navMenuAnime.add({
						targets: '#nav .menu li:nth-child(' + i  + ')',
					    opacity: 1,
					    easing: 'easeInQuad',
					    offset: (i-1) * 100,
					    duration: 300
					  });
				}
			} else {
				navMenuAnime.restart();
			}
		},
		function() {
			navMenuAnime.reverse();
		}
	);

	$('.device-mobile #nav .menu > li, .category-antiques #nav .menu > li, .page.antique #nav .menu > li').click(function() {
		$(this).parent().children('li').removeClass('active');
		$(this).addClass('active');
	});

	var mobileNavMenuAnime;
	$('.menu-link.mobile').click(function() {
		$(this).toggleClass('closable');
		$(this).find('.menu-icon').prop('style', '');
		$('#nav .menu').toggleClass('noshow');
		if ($(this).hasClass('closable')) {
			anime({
				targets: '#nav .menu-link .menu-icon',
				rotate: 360
			});

			mobileNavMenuAnime = anime.timeline();
			for (var i=1; i <= 11; i++) {
				mobileNavMenuAnime.add({
					targets: '#nav .menu li:nth-child(' + i  + ')',
					translateX: [150, 0],
				    easing: 'easeInQuad',
				    offset: (i-1) * 50,
				    duration: 150
				  });
			}
		} else {
			mobileNavMenuAnime.reset();
		}
	});
});
</script>
<div id="nav-divider"></div>

