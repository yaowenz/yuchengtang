<?php
if (!is_mobile()) {
	wp_enqueue_script( 'pagepiling',  get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.js', ['jquery']);
	wp_enqueue_style( 'pagepiling-style', get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.css' );
}
?>
<?php get_header(); ?>
<style>
#pagepiling {
	width:1000px;margin:auto
}
#pagepiling .section {
	width:1000px;margin:auto
}
</style>
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
		<div class="wrap" style="width:1000px">
			<h2>Basic <small>- with all the navigation options enabled</small></h2>
			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
			<div class="frame" id="frame">
				<ul class="clearfix">
					<li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li>
					<li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li>
					<li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li>
					<li>28</li><li>29</li>
				</ul>
			</div>
			<ul class="pages"></ul>
			<div class="controls center">
				<button class="btn prevPage"><i class="icon-chevron-left"></i><i class="icon-chevron-left"></i> page</button>
				<button class="btn prev"><i class="icon-chevron-left"></i> item</button>
				<button class="btn backward"><i class="icon-chevron-left"></i> move</button>

				<div class="btn-group">
					<button class="btn toStart">toStart</button>
					<button class="btn toCenter">toCenter</button>
					<button class="btn toEnd">toEnd</button>
				</div>

				<div class="btn-group">
					<button class="btn toStart" data-item="10"><strong>10</strong> toStart</button>
					<button class="btn toCenter" data-item="10"><strong>10</strong> toCenter</button>
					<button class="btn toEnd" data-item="10"><strong>10</strong> toEnd</button>
				</div>

				<div class="btn-group">
					<button class="btn add"><i class="icon-plus-sign"></i></button>
					<button class="btn remove"><i class="icon-minus-sign"></i></button>
				</div>

				<button class="btn forward">move <i class="icon-chevron-right"></i></button>
				<button class="btn next">item <i class="icon-chevron-right"></i></button>
				<button class="btn nextPage">page <i class="icon-chevron-right"></i><i class="icon-chevron-right"></i></button>
			</div>
		</div>
	</div>
	<div class="section">Some section</div>
	<div class="section">Some section</div>
	<div class="section">Some section</div>
	<div class="section">Some section</div>
	<div class="section">Some section</div>
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
		activateOn: 'click',
		mouseDragging: 1,
		touchDragging: 1,
		releaseSwing: 1,
		startAt: 3,
		scrollBar: $wrap.find('.scrollbar'),
		scrollBy: 0,
		pagesBar: $wrap.find('.pages'),
		activatePageOn: 'click',
		speed: 300,
		//elasticBounds: 1,
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

	// To Start button
	$wrap.find('.toStart').on('click', function () {
		var item = $(this).data('item');
		// Animate a particular item to the start of the frame.
		// If no item is provided, the whole content will be animated.
		$frame.sly('toStart', item);
	});

	// To Center button
	$wrap.find('.toCenter').on('click', function () {
		var item = $(this).data('item');
		// Animate a particular item to the center of the frame.
		// If no item is provided, the whole content will be animated.
		$frame.sly('toCenter', item);
	});

	// To End button
	$wrap.find('.toEnd').on('click', function () {
		var item = $(this).data('item');
		// Animate a particular item to the end of the frame.
		// If no item is provided, the whole content will be animated.
		$frame.sly('toEnd', item);
	});

	// Add item
	$wrap.find('.add').on('click', function () {
		$frame.sly('add', '<li>' + $slidee.children().length + '</li>');
	});

	// Remove item
	$wrap.find('.remove').on('click', function () {
		$frame.sly('remove', -1);
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
            'tooltips': ['藏品分类 All Categories', '清朝 Qing Dynasty', '明朝 Ming Dynasty', '元朝 Yuan Dynasty', '宋朝 Song Dynasty', 'G20会议官窑瓷器', '金砖五国会议官窑瓷器']
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

<style>

.pp-tooltip {
	color: #666;font-size:16px;padding-right:10px
}
#pp-nav li {
	margin:10px;height:15px;width:15px
}
#pp-nav span {
	width:12px;height:12px;border-color:#999
}
/* Example wrapper */
.wrap {
	position: relative;
	margin: 3em 0;
}

/* Frame */
.frame {
	height: 250px;
	line-height: 250px;
	overflow: hidden;
}
.frame ul {
	list-style: none;
	margin: 0;
	padding: 0;
	height: 100%;
	font-size: 50px;
}
.frame ul li {
	float: left;
	width: 227px;
	height: 100%;
	margin: 0 1px 0 0;
	padding: 0;
	background: #333;
	color: #ddd;
	text-align: center;
	cursor: pointer;
}
.frame ul li.active {
	color: #fff;
	background: #a03232;
}

/* Scrollbar */
.scrollbar {
	margin: 0 0 1em 0;
	height: 2px;
	background: #ccc;
	line-height: 0;
}
.scrollbar .handle {
	width: 100px;
	height: 100%;
	background: #292a33;
	cursor: pointer;
}
.scrollbar .handle .mousearea {
	position: absolute;
	top: -9px;
	left: 0;
	width: 100%;
	height: 20px;
}

/* Pages */
.pages {
	list-style: none;
	margin: 20px 0;
	padding: 0;
	text-align: center;
}
.pages li {
	display: inline-block;
	width: 14px;
	height: 14px;
	margin: 0 4px;
	text-indent: -999px;
	border-radius: 10px;
	cursor: pointer;
	overflow: hidden;
	background: #fff;
	box-shadow: inset 0 0 0 1px rgba(0,0,0,.2);
}
.pages li:hover {
	background: #aaa;
}
.pages li.active {
	background: #666;
}

/* Controls */
.controls { margin: 25px 0; text-align: center; }



</style>

<?php
get_footer();