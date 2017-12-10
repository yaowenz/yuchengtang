<?php
global $wpdb;
//$result = $wpdb->query();
$antiqueId = intval($_GET['id']);
global $antiqueResult;
$antiqueResult = $wpdb->get_row("SELECT * FROM yc_item WHERE ID = '{$antiqueId}'");

if (empty($antiqueResult)) die('');

/**
 * Alter title
 */
add_filter('document_title_parts', 'yct_antique_filter_title_part');
function yct_antique_filter_title_part ($title)
{
	global $antiqueResult;
	return array($antiqueResult->name, $title['title'], $title['site']);
}

// Scan Images
$picFolder = '/m3d/pic/'.$antiqueId.'/s';
$files = scandir(APP_360_MEDIA_PATH . $picFolder);
$thumbs = [];
foreach($files as $f)
{
	if(is_file(APP_360_MEDIA_PATH . $picFolder . '/' . $f))
	{
		$thumbs[] = $picFolder . '/' . $f;
	}
}

/** Has Audio? **/
$hasAudio = file_exists(APP_360_MEDIA_PATH.'/m3d/audio/'.$antiqueId.'.mp3');

/** Has Video **/
$hasVideo = false;
$videoFile = '/m3d/movie/'.$antiqueId.'/640.mp4';
if(is_file(APP_360_MEDIA_PATH . $videoFile)){
	$hasVideo = true;
}

/** Get Cover Image **/
$coverImage = ['', ''];
$v1CoverImage = APP_360_MEDIA_PATH . "/m3d/pic/{$antiqueId}/b/" . $antiqueResult->img_name;
if (file_exists($v1CoverImage)) {
	$coverImage = [
		"/m3d/pic/{$antiqueId}/s/{$antiqueResult->img_name}",
		"/m3d/pic/{$antiqueId}/b/{$antiqueResult->img_name}"
	];
} else {
	if (strpos($antiqueResult->img_name, "cover") !== false) {
		$coverImage = [
			$antiqueResult->img_name,
			$antiqueResult->img_name
		];
	}
}
?>
<?php
get_header();
?>
<div class="primary content">
	<div class="wrapper">
		<div class="cover-img">
			<div class="img-container">
				<img src="<?php echo APP_360_MEDIA_URL . $coverImage[1]; ?>" align="center" />
			</div>
		</div>
		<div class="actions">
			<ul>
				<?php if ($antiqueResult->m_3d):?>
					<?php if (!is_mobile()):?>
				<li class="showcase-360"><a title="360观看 (360 View)" data-remodal-target="modal-360"></a></li>
					<?php else:?>
				<li class="showcase-360"><a title="360观看 (360 View)" href="<?php echo str_replace("#id#", $antiqueId, APP_360_SHOWCASE_URL)?>"></a></li>
					<?php endif;?>
				<?php endif;?>
				<?php if ($hasAudio):?>
				<li class="audio-en"><a data-remodal-target="modal-audio-en" title="Audio Guidance (English)"></a></li>
				<li class="audio-cn"><a data-remodal-target="modal-audio" title="语音导览"></a></li>
				<?php endif;?>
				<?php if ($hasVideo):?>
					<?php if (!is_mobile()):?>
					<li class="video-play"><a data-remodal-target="modal-video" title="视频介绍 Video Intro"></a></li>
					<?php else:?>
					<li class="video-play"><a href="<?php echo APP_360_MEDIA_URL . $videoFile ?>" title="视频介绍 Video Intro"></a></li>
					<?php endif;?>
				<?php endif;?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="thumbs">
			<div class="prev"></div>
			<div class="next"></div>
			<div class="frame" id="frame">
				<ul class="clearfix">
					<li><div data-img="<?php echo $coverImage[1] ?>" style="background-image:url('<?php echo APP_360_MEDIA_URL . $coverImage[0];?>')"></div></li>
					<?php foreach ($thumbs as $t):?>
					<li><div data-img="<?php echo $t?>" style="background-image:url('<?php echo APP_360_MEDIA_URL . $t ?>')"></div></li>
					<?php endforeach; ?>
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
		<div class="title"><?php echo $antiqueResult->name?></div>
		<?php if (!empty($antiqueResult->name_en)):?>
		<div class="title-en"><?php echo $antiqueResult->name_en?></div>
		<?php endif;?>
		<div class="params">
		<?php
			$params = [];
			$params_fields = [
				'height' => '高 Height',
				'weight' => '重 Weight',
				'koujin' => '口 Caliber',
				'dijin' => '底 Bottom Diameter'
			];
			$unit_fields = [
				'height' => 'mm',
				'weight' => 'g',
				'koujin' => 'mm',
				'dijin' => 'mm'
			];
			
			foreach ($params_fields as $k => $v) {
				if (!empty($antiqueResult->$k)) {
					if (!preg_match('/[cm]m$/', $antiqueResult->$k)) {
						$antiqueResult->$k .= $unit_fields[$k];
					}
					$params[] = "<div class=\"d_param\">{$v} : {$antiqueResult->$k}</div>";
				}
			}
			echo implode("", $params);
		?>
		</div>
		<div class="description">
			<?php echo $antiqueResult->note;?>
		</div>
		<div class="description">
			<?php echo $antiqueResult->note_en;?>
		</div>
	</div>
</div>
<?php if (!empty($antiqueResult->m_3d)):?>
<!-- 360 View -->
<div class="remodal" data-remodal-id="modal-360" data-remodal-options="closeOnOutsideClick: false" style="width:400px;height:600px;padding:0px">
	<button data-remodal-action="close" class="remodal-close"></button>
	<iframe src="<?php echo str_replace("#id#", $antiqueId, APP_360_SHOWCASE_URL)?>" frameborder="0" width="405" height="600"></iframe>
</div>
<?php endif;?>
<?php if ($hasAudio):?>
<!-- Audio Guidance -->
<div class="remodal" data-remodal-id="modal-audio-en" data-remodal-options="closeOnOutsideClick: false" style="width:500px;height:100px;padding:0px">
	<button data-remodal-action="close" class="remodal-close"></button>
	<div class="audio-commentary">
		<audio id="commentary-en" src="<?php echo APP_360_MEDIA_URL.'/m3d/audio/'.$antiqueId?>_en.mp3" type="audio/mp3" preload="none" loop="false"></video>
	</div>
</div>
<?php endif;?>
<!-- Audio (CN)-->
<div class="remodal" data-remodal-id="modal-audio" data-remodal-options="closeOnOutsideClick: false" style="width:500px;height:100px;padding:0px">
	<button data-remodal-action="close" class="remodal-close"></button>
	<div class="audio-commentary">
		<audio id="commentary" src="<?php echo APP_360_MEDIA_URL.'/m3d/audio/'.$antiqueId?>.mp3" type="audio/mp3" preload="none" loop="false"></video>
	</div>
</div>
<?php if ($hasVideo):?>
<!-- Video Playback -->
<div class="remodal" data-remodal-id="modal-video" data-remodal-options="closeOnOutsideClick: false" style="width:640px;height:480px;padding:0px;background:black">
	<button data-remodal-action="close" class="remodal-close" style="position:absolute;z-index:10000"></button>
	<video id="video-intro" width="640" height="480" src="<?php echo APP_360_MEDIA_URL . $videoFile ?>" poster="<?php echo APP_360_MEDIA_URL.'/m3d/movie/'.$antiqueId?>/1.jpg" type="video/mp4" controls="controls" preload="none" loop="loop"></video>
</div>
<?php endif;?>
<script>
jQuery(function($) {
	$('#nav .antiques').addClass('active');

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
		prev: $wrap.parent().find('.prev'),
		next: $wrap.parent().find('.next'),
		prevPage: $wrap.find('.prevPage'),
		nextPage: $wrap.find('.nextPage'),
	});

	$frame.sly('on', 'active', function(evt) {
		var srcUrl = $frame.find('li.active div').data('img').replace("/s/", "/b/");
		$('.cover-img img').css('opacity', 0);
		$('.cover-img img').attr('src', '<?php echo APP_360_MEDIA_URL?>' + srcUrl);
		anime({
			targets: '.cover-img img',
		    opacity: 1,
		    easing: 'easeInQuad',
		    duration: 500
		});
	});

	/** action 图标居中  **/
	<?php if (is_mobile()):?>
	$('.wrapper .actions ul').css('width', 57 * $('.wrapper .actions ul li').length);
	<?php else:?>
	$('.wrapper .actions ul').css('width', 67.5 * $('.wrapper .actions ul li').length);
	<?php endif;?>

	/** Audio & Video **/
	var commentaryAudio;
	var commentaryAudioEn;
	var videoIntro = $('video#video-intro');
	
	<?php if ($hasAudio):?>
	audiojs.events.ready(function() {
     	commentaryAudio = audiojs.create(document.getElementById('commentary'));
     	commentaryAudioEn = audiojs.create(document.getElementById('commentary-en'));
	});
	<?php endif;?>

	$(document).on('closed', '.remodal', function (e) {
		if (commentaryAudio != undefined) {
			commentaryAudio.pause();
		}
		if (commentaryAudioEn != undefined) {
			commentaryAudioEn.pause();
		}
		if (videoIntro != undefined) {
			videoIntro[0].pause();
		}
	});
	
});
</script>
<?php
get_footer();
?>
