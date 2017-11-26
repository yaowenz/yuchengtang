<?php
if (!is_mobile()) {
	wp_enqueue_script( 'pagepiling',  get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.js', ['jquery']);
	wp_enqueue_style( 'pagepiling-style', get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.css' );
}
?>
<?php get_header(); ?>
<div id="pagepiling" style="height:1000px">
	<div class="section categories">
		<table>
			<tr>
				<td>
					<div class="mask"></div>
					<a href="#dyn-qing"><img src="<?php echo get_template_directory_uri()?>/assets/images/category-dyn-qing.png" /></a>
				</td>
				<td>
					<div class="mask"></div>
					<a href="#dyn-ming"><img src="<?php echo get_template_directory_uri()?>/assets/images/category-dyn-ming.png" /></a></td>
				<td><div class="mask"></div><a href="#dyn-yuan"><img src="<?php echo get_template_directory_uri()?>/assets/images/category-dyn-yuan.png" /></a></td>
				<td><div class="mask"></div><a href="#dyn-song"><img src="<?php echo get_template_directory_uri()?>/assets/images/category-dyn-song.png" /></a></td>
			</tr>
			<tr>
				<td><div class="mask"></div><a href="#exb-g20"><img src="<?php echo get_template_directory_uri()?>/assets/images/category-exb-g20.png" /></a></td>
				<td><div class="mask"></div><a href="#exb-b5"><img src="<?php echo get_template_directory_uri()?>/assets/images/category-exb-b5.png" /></a></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>
	<div class="section">
		<div class="wrap sly">
			<h2>清代 <small>Qing Dynasty</small></h2>
			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
			<div class="frame" id="frame">
				<ul class="clearfix">
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" width="100%"/></div>
						<div class="name">清乾隆珐琅彩九龙盘 </div>
						<div class="name-en">WELL ENAMELED PLATE WITH DESIGN OF NINE DRAGONS</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-2.jpg" width="100%"/></div>
						<div class="name">明宣德青花缠枝纹梅瓶</div>
						<div class="name-en">BLUE AND WHITE MEIPING VASE WITH INTERLOCKING FLOWERS</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-3.jpg" width="100%"/></div>
						<div class="name">元龙泉窑荷叶盖罐</div>
						<div class="name-en">A LONGQUAN CELADON JAR WITH LOTUS LEAF SHAPED COVER</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-4.jpg" width="100%"/></div>
						<div class="name">宋汝窑鼓钉洗</div>
						<div class="name-en">Brush-Washer with Drum screws decoration, Ru Kiln</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" width="100%"/></div>
						<div class="name">清乾隆珐琅彩九龙盘 </div>
						<div class="name-en">WELL ENAMELED PLATE WITH DESIGN OF NINE DRAGONS</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-2.jpg" width="100%"/></div>
						<div class="name">明宣德青花缠枝纹梅瓶</div>
						<div class="name-en">BLUE AND WHITE MEIPING VASE WITH INTERLOCKING FLOWERS</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-3.jpg" width="100%"/></div>
						<div class="name">元龙泉窑荷叶盖罐</div>
						<div class="name-en">A LONGQUAN CELADON JAR WITH LOTUS LEAF SHAPED COVER</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-4.jpg" width="100%"/></div>
						<div class="name">宋汝窑鼓钉洗</div>
						<div class="name-en">Brush-Washer with Drum screws decoration, Ru Kiln</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-1.jpg" width="100%"/></div>
						<div class="name">清乾隆珐琅彩九龙盘 </div>
						<div class="name-en">WELL ENAMELED PLATE WITH DESIGN OF NINE DRAGONS</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-2.jpg" width="100%"/></div>
						<div class="name">明宣德青花缠枝纹梅瓶</div>
						<div class="name-en">BLUE AND WHITE MEIPING VASE WITH INTERLOCKING FLOWERS</div>
					</li>
					<li>
						<div class="cover"><img src="<?php echo get_template_directory_uri()?>/assets/images/examples/example-3.jpg" width="100%"/></div>
						<div class="name">元龙泉窑荷叶盖罐</div>
						<div class="name-en">A LONGQUAN CELADON JAR WITH LOTUS LEAF SHAPED COVER</div>
					</li>
				</ul>
			</div>
			<ul class="pages"></ul>
			<!--
			<div class="controls center">
				<button class="btn prevPage"><i class="icon-chevron-left"></i><i class="icon-chevron-left"></i> page</button>
				<button class="btn prev"><i class="icon-chevron-left"></i> item</button>
				<button class="btn backward"><i class="icon-chevron-left"></i> move</button>
				<div class="btn-group">
					<button class="btn toStart" data-item="10"><strong>10</strong> toStart</button>
					<button class="btn toCenter" data-item="10"><strong>10</strong> toCenter</button>
					<button class="btn toEnd" data-item="10"><strong>10</strong> toEnd</button>
				</div>
				<button class="btn forward">move <i class="icon-chevron-right"></i></button>
				<button class="btn next">item <i class="icon-chevron-right"></i></button>
				<button class="btn nextPage">page <i class="icon-chevron-right"></i><i class="icon-chevron-right"></i></button>
			</div>
			 -->
		</div>
	</div>
	<div class="section">
		<div class="wrap sly">
			<h2>明代 <small>Ming Dynasty</small></h2>
		</div>
	</div>
	<div class="section">
		<div class="wrap sly">
			<h2>元代 <small>Yuan Dynasty</small></h2>
		</div>
	</div>
	<div class="section">
		<div class="wrap sly">
			<h2>宋代 <small>Soong Dynasty</small></h2>
		</div>
	</div>
	<div class="section">
		<div class="wrap sly">
			<h2>G20会议官窑瓷器</h2>
		</div>
	</div>
	<div class="section">
		<div class="wrap sly">
			<h2>金砖五国会议官窑瓷器</h2>
		</div>
	</div>
</div>
<script>
jQuery(function($) {
	var $frame = $('#frame');
	var $slidee = $frame.children('ul').eq(0);
	var $wrap   = $frame.parent();

	// Call Sly on frame
	$frame.sly({
		horizontal: 1,
		itemNav: 'basic',
		smart: 1,
		//activateOn: 'click',
		mouseDragging: 1,
		touchDragging: 1,
		releaseSwing: 1,
		startAt: 0,
		scrollBar: $wrap.find('.scrollbar'),
		scrollBy: 0,
		pagesBar: $wrap.find('.pages'),
		activatePageOn: 'click',
		speed: 300,
		elasticBounds: 1,
		//easing: 'easeOutExpo',
		dragHandle: 1,
		dynamicHandle: 1,
		clickBar: 1,

		// Buttons
		forward: $wrap.find('.forward'),
		backward: $wrap.find('.backward'),
		prev: $wrap.find('.prev'),
		next: $wrap.find('.next'),
		prevPage: $wrap.find('.prevPage'),
		nextPage: $wrap.find('.nextPage')
	});
	
	
	$('#pagepiling').pagepiling({
	    menu: null,
        direction: 'vertical',
        verticalCentered: true,
        sectionsColor: [],
        anchors: ['all-cates', 'dyn-qing', 'dyn-ming', 'dyn-yuan', 'dyn-song', 'exb-g20', 'exb-b5'],
        scrollingSpeed: 700,
        easing: 'swing',
        loopBottom: false,
        loopTop: false,
        css3: true,
        navigation: {
            'textColor': '#000',
            'bulletsColor': '#666',
            'position': 'right',
            'tooltips': ['藏品分类 All Categories', '清代 Qing Dynasty', '明代 Ming Dynasty', '元代 Yuan Dynasty', '宋代 Song Dynasty', 'G20会议官窑瓷器', '金砖五国会议官窑瓷器']
        },
       	normalScrollElements: null,
        normalScrollElementTouchThreshold: 5,
        touchSensitivity: 5,
        keyboardScrolling: true,
        sectionSelector: '.section',
        animateAnchor: false,

		//events
		onLeave: function(index, nextIndex, direction) {
			$('#pagepiling .section').css('visibility', 'hidden');
			$('#pagepiling .section.active').css('visibility', 'visible');
		},
		afterLoad: function(anchorLink, index) {
		},
		afterRender: function(){
			$('#pagepiling .section').css('visibility', 'hidden');
			$('#pagepiling .section.active').css('visibility', 'visible');
		},
	});
	
});
</script>
<?php
get_footer();