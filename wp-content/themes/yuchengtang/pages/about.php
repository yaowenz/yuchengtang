<div class="content wrapper">
	<div style="width:170px;margin:auto;padding-top:30px">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/about-title.png" width="100%">
	</div>
	<div style="width:30px;margin:auto;padding-top:50px;margin-bottom:30px">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/dot-divider.png" width="100%">
	</div>
	<div class="intro">
		<p>御承堂美术馆坐落于国际化大都市上海，沿黄浦江而立，与陆家嘴金融中心一线之隔，毗邻中华艺术宫。</p>
		<p>美术馆藏囊括各年代顶级官窑瓷器，更有华夏古陶瓷科学技术研究院作为研究支持，致力于为藏家提供专业及全方位的顾问服务，涵盖艺术品展示、艺术品鉴赏力培训、中长期收藏、投资、估价、私洽、出售、与艺术相关的房地产规划、美术馆计划、大型艺术活动组织策划、基金会计划等。除藏家外，御承堂也为艺术家提供定制服务。</p>
	</div>
	<div class="features">
		<img src="<?php echo get_template_directory_uri()?>/assets/images/about-features.png" width="100%">
	</div>
	<div style="margin:80px 0px 50px 0px;border-bottom:1px solid #ccc"></div>
	<div class="contact">
		<div class="map" id="about-map"></div>
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