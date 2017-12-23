<div class="content wrapper">
	<div class="page-title">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/about-title.png" width="100%">
	</div>
	<div style="width:30px;margin:auto;padding-top:40px;margin-bottom:30px">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/dot-divider.png" width="100%">
	</div>
	<div class="intro">
		<p>御承堂美术馆坐落于国际化大都市上海，沿黄浦江而立，与陆家嘴金融中心一线之隔，毗邻中华艺术宫。</p>
		<p>御承堂是著名大藏家蔡暄民和其他几位藏家继2002年杭州东明白庐艺术馆后在上海建立的另一家顶级传统艺术馆，收藏囊括各年代顶级官窑瓷器，书画，家具和杂项，长期致力于中国传统文化艺术的在全球范围内的收藏，研究，展览，教育和传播，与各国各大博物馆和艺术院校合作及华夏古陶瓷科学技术研究院作为研究支持, 辅以专业课程及艺术类出版物衍生品，以传播和传承中国传统文化为使命，打造世界级的私立美术馆。</p>
	</div>
	<div class="features">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/about-features.png" width="100%">
	</div>
	<div css="desktop" style="margin:80px 0px 50px 0px;border-bottom:1px solid #ccc"></div>
	<div class="contact" id="contactus">
		<div class="info">
			<img src="<?php echo get_template_directory_uri()?>/assets/images/about-contactus-title.png" width="120">
			<div style="margin:10px 0px;border-bottom:1px solid #B27B42"></div>
			<ul>
				<li><strong>地址：</strong>上海市浦三路21弄55-56号银亿滨江中心17楼</li>
				<li><strong>电话：021-61553566</strong></li>
				<li><strong>开馆时间：</strong>周二~周六 10:00 ~ 16:30</li>
			</ul>
			<ul>
				<li><strong>Address：</strong>17th Floor, Yinyi Bingjiang Center, No 55-56, Lane 21, Pusan Road, Shanghai</li>
				<li><strong>Phone：</strong>021-61553566</li>
				<li><strong>Opening Hours：</strong>Tue. ~ Sat. 10:00 ~ 16:30</li>
			</ul>
		</div>
		<div class="map" id="about-map"></div>
		<div class="clear"></div>
	</div>
</div>
<script src="http://api.map.baidu.com/api?v=2.0&ak=GMTqmIMbnh4zWGphjFlZCThwLrUMD87j"></script>
<script type="text/javascript">
jQuery(function($) {
	$('#nav .about').addClass('active');
	
	var map = new BMap.Map("about-map");
	map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);
	map.addControl(new BMap.NavigationControl());
	map.addControl(new BMap.ScaleControl());
	var myGeo = new BMap.Geocoder();
	myGeo.getPoint("上海市浦三路55号银亿诚品中心", function(point){
	    if (point) {
	        map.centerAndZoom(point, 16);
	        map.addOverlay(new BMap.Marker(point));
	    }
	 }, "上海市");
	
})
</script>