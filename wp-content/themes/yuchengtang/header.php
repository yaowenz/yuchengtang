<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui, user-scalable=no" />
	<meta name="format-detection" content="telephone=no"/>
	<meta name="keywords" content="御承堂" />
	<meta name="description" content="美术馆藏囊括各年代顶级官窑瓷器，更有华夏古陶瓷科学技术研究院作为研究支持，致力于为藏家提供专业及全方位的顾问服务，涵盖艺术品展示、艺术品鉴赏力培训、中长期收藏、投资、估价、私洽、出售、与艺术相关的房地产规划、美术馆计划、大型艺术活动组织策划、基金会计划等。" />
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
<?php
	if(is_mobile()) {
		include 'header-mobile.php';
	}
	else {
		include 'header-desktop.php';
	}
?>
