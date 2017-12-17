<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui, user-scalable=no" />
	<meta name="format-detection" content="telephone=no"/>
	<meta name="keywords" content="御承堂" />
	<meta name="description" content="御承堂美术馆藏囊括各年代顶级官窑瓷器，更有华夏古陶瓷科学技术研究院作为研究支持，致力于为藏家提供专业及全方位的顾问服务，涵盖艺术品展示、艺术品鉴赏力培训、中长期收藏、投资、估价、私洽、出售、与艺术相关的房地产规划、美术馆计划、大型艺术活动组织策划、基金会计划等。" />
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
				<a href="<?php echo site_url('archives/category/news')?>" title="资讯"><span class="mobile">资讯&nbsp;&nbsp;NEWS</span></a>
			</li>
			<li class="antiques text">
				<a href="<?php echo site_url('archives/category/antiques')?>" title="藏品"><span class="mobile">藏品&nbsp;&nbsp;ANTIQUE</span></a>
			</li>
			<li class="tickets text">
				<a href="<?php echo site_url('reservation')?>" title="观展"><span class="mobile">观展&nbsp;&nbsp;TICKETS</span></a>
			</li>
			<li class="culture text">
				<a href="<?php echo site_url('reservation')?>" title="文化教育"><span class="mobile">文化教育&nbsp;&nbsp;CLUTURE</span></a>
			</li>
			<li class="support text">
				<a href="<?php echo site_url('reservation')?>" title="支持"><span class="mobile">支持&nbsp;&nbsp;SUPPORT</span></a>
			</li>
			<li class="shop text">
				<a href="<?php echo site_url('reservation')?>" title="商店"><span class="mobile">商店&nbsp;&nbsp;SHOP</span></a>
			</li>
			<li class="about text">
				<a href="<?php echo site_url('about')?>" title="关于"><span class="mobile">关于&nbsp;&nbsp;ABOUT</span></a>
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
				<li><span class="text-cn"><a href="?lang=en">ENG</a></span><span class="text-en"><a href="?lang=cn">中文</a></span></li>
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
				for (var i=1; i <= 7; i++) {
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
			for (var i=1; i <= 4; i++) {
				mobileNavMenuAnime.add({
					targets: '#nav .menu li:nth-child(' + i  + ')',
					translateX: [150, 0],
				    easing: 'easeInQuad',
				    offset: (i-1) * 100,
				    duration: 300
				  });
			}
		} else {
			mobileNavMenuAnime.reset();
		}
	});
});
</script>
<div id="nav-divider"></div>

