<?php
get_header();
?>
<div class="primary content reservation">
	<div class="wrapper">
		<div style="margin-bottom:30px">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-title.jpg" width="100%" />
		</div>
		<div class="info">
			<div><img src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-info-title.png" width="130"></div>
		</div>
		<div class="notice">
			<div><img src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-notice-title.png" width="130"></div>
			<p style="margin-bottom:15px;margin-top:10px"><strong>票价：</strong><br>128元/张</p>
			<p style="margin-bottom:15px"><strong>场馆地址：</strong><br>上海市浦东新区浦三路21弄55-56号银亿滨江中心17楼（和颐酒店旁右转）</p>
			<p style="margin-bottom:15px"><strong>场馆电话：</strong><br>021-61553566</p>
			<p><strong>开馆时间：</strong><br>周二至周六 10:00-16:30，周一、周日闭馆。</p>
			<h2>参观须知</h2>
			<p>1. 为了不妨碍、影响他人参观及展品安全，请勿在馆内拍照；</p>
			<p>2. 为了您和他人的健康，请勿在馆内吸烟、乱扔垃圾、随地吐痰；</p>
			<p>3. 请勿携带宠物进馆参观。</p>
			<h2>优惠信息</h2>
			<p>1. 70岁以上（含70岁）老年人凭有效证件，免费参观。</p>
			<p>2. 身高1.2米以下儿童随监护人参观，门票半价优惠。</p>
			<p>3. 残疾人凭残疾人证件，免费参观。</p>
			<p>4. 随团导游凭本人导游证，免费参观。</p>
		</div>
		<div class="clear"></div>
		
	</div>
</div>
<script>
jQuery(function($) {
	$('#nav .tickets').addClass('active');
});
</script>
<?php
get_footer();
?>
