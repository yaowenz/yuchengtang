<!-- Nav -->
<div id="nav">
	<div class="header wrapper">
		<div class="logo">
			<span><a href="<?php echo site_url()?>" title="首页"><img src="<?php echo get_template_directory_uri()?>/assets/images/logo-yct.png" valign="middle" /></a></span>
		</div>
		<ul class="menu">
			<li class="news text">
				<a href="<?php echo site_url('archives/category/news')?>" title="资讯">&nbsp;</a>
			</li>
			<li class="antiques text">
				<a href="<?php echo site_url('archives/category/antiques')?>" title="藏品">&nbsp;</a>
			</li>
			<li class="tickets text">
				<a href="<?php echo site_url('tickets')?>" title="观展">&nbsp;</a>
			</li>
			<li class="about text">
				<a href="<?php echo site_url('about')?>" title="关于">&nbsp;</a>
			</li>
			<li class="search">
				<a href="javascript:void;" title="search">&nbsp;</a>
			</li>
		</ul>
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
				for (var i=1; i <= 4; i++) {
					navMenuAnime.add({
						targets: '#nav .menu li:nth-child(' + i  + ')',
					    opacity: 1,
					    easing: 'easeInQuad',
					    offset: (i-1) * 150,
					    duration: 500
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
});
</script>
<div id="nav-divider"></div>

