<?php
if (!is_mobile()) {
	wp_enqueue_script( 'pagepiling',  get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.js', ['jquery']);
	wp_enqueue_style( 'pagepiling-style', get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.css' );
}

/** 获取各个分类的藏品 **/
global $wpdb;
$cateQing = $wpdb->get_results("SELECT * FROM yc_item WHERE niandai LIKE '清%' AND state = 1");
$cateMing = $wpdb->get_results("SELECT * FROM yc_item WHERE niandai LIKE '明%' AND state = 1");
$cateYuan = $wpdb->get_results("SELECT * FROM yc_item WHERE niandai LIKE '元%' AND state = 1");
$cateSong = $wpdb->get_results("SELECT * FROM yc_item WHERE niandai LIKE '宋%' AND state = 1");
$cateG20 = $wpdb->get_results("SELECT * FROM yc_item WHERE id IN (146, 147, 148, 149);");
$cateB5 = $wpdb->get_results("SELECT * FROM yc_item WHERE id IN (150,151,152,153,154,155,156,157,158,159,160)");

$categories = [
	'cateQing' => ['清代', 'Qing Dynasty'],
	'cateMing' => ['明代', 'Ming Dynasty'],
	'cateYuan' => ['元代', 'Yuan Dynasty'],
	'cateSong' => ['宋代', 'Song Dynasty'],
	'cateG20' => ['G20会议官窑瓷器', ''],
	'cateB5' => ['金砖五国会议官窑瓷器', ''],
];

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
	<?php foreach ($categories as $k => $v):?>
	<div class="section">
		<div class="wrap sly">
			<h2><?php echo $v[0]?>&nbsp;<small><?php echo $v[1]?></small></h2>
			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
			<div class="frame" id="frame">
				<ul class="clearfix">
					<?php foreach ($$k as $item):?>
					<li>
						<?php
						$coverImageUrl = $item->img_name;
						if (!preg_match("/^\/m3d\//", $coverImageUrl)) {
							$coverImageUrl = '/m3d/pic/' . $item->id . '/s/' . $item->img_name;
						}
						$coverImageUrl = APP_360_MEDIA_URL . $coverImageUrl;
						?>
						<div class="cover" style="background-image:url('<?php echo $coverImageUrl?>')">
							<a href="<?php echo site_url('antique?id=' . $item->id)?>"></a>
						</div>
						<div class="name"><a href="<?php echo site_url('antique?id=' . $item->id)?>"><?php echo $item->name?></a></div>
						<div class="name-en"><a href="<?php echo site_url('antique?id=' . $item->id)?>"><?php echo $item->name_en;?></a></div>
					</li>
					<?php endforeach;?>
				</ul>
			</div>
			<ul class="pages"></ul>
		</div>
	</div>
	<?php endforeach;?>
</div>
<script>
jQuery(function($) {

	$('#nav .antiques').addClass('active');
	
	var $frames = $('.frame');
	$frames.each(function (i) {
		var $frame = $($frames[i]);
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