<?php
session_start();
$_SESSION['verify_code'] = mt_rand(1000, 9999);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, user-scalable=0,minimum-scale=1.0, maximum-scale=1.0">
	<meta name="screen-orientation" content="portrait">
	<meta name="x5-orientation" content="portrait">
	<meta name="msapplication-tap-highlight" content="no">
	<title>御承堂</title>
	<link rel="stylesheet" href="http://m.360antique.com/files/assets/agile/css/agile.layout.css" />
	<link rel="stylesheet" href="http://m.360antique.com/files/assets/agile/css/flat/flat.component.css" />
	<link rel="stylesheet" href="http://m.360antique.com/files/assets/agile/css/flat/flat.color.css" />
	<link rel="stylesheet" href="http://m.360antique.com/files/assets/agile/css/flat/iconline.css" />
	<link rel="stylesheet" href="http://m.360antique.com/files/m3d/d_1.css?v=52" />
	<script type="text/javascript" src="<?php echo home_url('wp-includes/js/jquery/jquery.js?ver=1.12.4')?>"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/simple-calendar.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/assets/js/moment.js"></script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/assets/css/simple-calendar.css" />
	<script type="text/javascript" src="<?php echo home_url('wp-includes/js/jquery/jquery.js?ver=1.12.4')?>"></script>
	<style>
		table.reservation-confirm {color:#666;padding-right:5px}
        table.reservation-confirm td {line-height:30px}
        table.reservation-confirm td.label {width:100px}
        table.form-reservation td.label {width:100px;color:#666;padding-right:5px}
        table.form-reservation td {line-height:45px}
        table.form-reservation input {height:35px}
        input[type="radio"] {-webkit-appearance:radio;width:15px;height:15px;margin-right:5px;background:none!important;border:none!important;outline:none!important}
        input[type="radio"]::after {content:''!important}
        input[type="radio"]:checked::after {content:''!important}
        input {padding:0px!important}
        span.required {color:red}
        .notice h2 {color:#896527;margin-top:15px;margin-bottom:5px;font-size:16px;font-weight:normal}
        .notice p {line-height:1.6;color:#666;font-size:12px}
    </style>
</head>
<body style="width:100%;-ms-touch-action:none;position:absolute;" class="bsy">
	<div id="calendar-container" style="z-index:100;display:none;position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:white;padding:15px">
		<div id="calendar" style="width:100%;margin-top:5px">
		</div>
	</div>
	<div class="imx">
		<div><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/header-reservation.jpg" width="100%" /></div>
		<ul class="listitem wp100">
			<!-- 表单 -->
			<li>
				<table class="y1">
					<tr class="tp"><td class="lt"></td><td class="ce"></td><td class="rt"></td></tr>
					<tr class="mi">
						<td class="lt"></td>
						<td class="ce" id="sw1">
							<?php if ($_GET['success'] == 1):?>
							<div class="notice">
								<h2 style="text-align:center;margin-top:0px;border-bottom:1px dotted #999;padding-bottom:15px">预约成功!</h2>
								<table class="reservation-confirm">
									<tr>
										<td class="label">联系人姓名：</td>
										<td>周</td>
									</tr>
									<tr>
										<td class="label">联系人手机：</td>
										<td>13355225565</td>
									</tr>
									<tr>
										<td class="label">参观时间：</td>
										<td>2017-10-29</td>
									</tr>
									<tr>
										<td class="label">参观类型：</td>
										<td>团体/8人</td>
									</tr>
								</table>
							</div>
							<?php else:?>
							<div class="swd" style="background-image:url('<?php echo get_stylesheet_directory_uri()?>/assets/images/reservation-title.png')"></div>
							<form>
							<table class="form-reservation">
								<tr>
									<td class="label">联系人姓名<span class="required">*</span>：</td>
									<td><input type="text" name="name" /></td>
								</tr>
								<tr>
									<td class="label">联系人手机<span class="required">*</span>：</td>
									<td><input type="text" name="mobile" /></td>
								</tr>
								<tr>
									<td class="label">参观时间<span class="required">*</span>：</td>
									<td><input type="text" readonly="readonly" name="reserve_at" style="width:120px" /></td>
								</tr>
								<tr>
									<td class="label">参观类型<span class="required">*</span>：</td>
									<td>
										<input type="radio" name="reserve_type" value="group" />团体
										<input type="radio" name="reserve_type" value="individual" />散客
									</td>
								</tr>
								<tr>
									<td class="label">参观人数<span class="required">*</span>：</td>
									<td><input type="number" name="reserve_number" min="1" /></td>
								</tr>
								<tr>
									<td class="label">验证码<span class="required">*</span>：</td>
									<?php
                                    $captcha = new \Gregwar\Captcha\CaptchaBuilder();
                                    $captcha->setDistortion(true);
                                    $captcha->setPhrase($_SESSION['verify_code']);
                                    $captcha->buildAgainstOCR(80,30);
                                    $captchaData = $captcha->inline(70);
                                    ?>
									<td>
										<input type="text" name="_code" style="width:100px" />
										<img src="<?php echo $captchaData; ?>" valign="middle" width="80" height="30" />
									</td>
								</tr>
							</table>
							<div style="text-align:center;margin-top:20px">
								<img onclick="formSubmit()" src="<?php echo get_stylesheet_directory_uri()?>/assets/images/reservation-btn.jpg" />
							</div>
							</form>
							<div class="notice" style="border-top:1px dotted #666;margin-top:15px">
								<h2>购票须知</h2>
								<p style="margin-bottom:5px"><strong>票价：</strong><br/>168元/张</p>
            					<p style="margin-bottom:5px"><strong>场馆地址：</strong><br/>上海市浦东新区浦三路21弄55-56号银亿滨江中心17楼（和颐酒店旁右转）</p>
            					<p style="margin-bottom:5px"><strong>场馆电话：</strong><br/>021-61553566</p>
            					<p><strong>开馆时间：</strong><br/>周二至周日 10:00-17:30（16:30停止入场）；周一闭馆。</p>
            					<h2>参观须知</h2>
            					<p>1. 为了不妨碍、影响他人参观及展品安全，请勿在馆内拍照；</p>
                                <p>2. 为了您和他人的健康，请勿在馆内吸烟、乱扔垃圾、随地吐痰；</p>
                                <p>3. 请勿携带宠物进馆参观。</p>
                                <h2>优惠信息</h2>
                                <p>1. 大、中、小学学生（不含成人教育、研究生），可凭学生证或学校介绍信购买学生票，每张20元/人。</p>
                                <p>2.  60岁以上（含60岁）老年人凭有效证件，门票半价优惠。</p>
                                <p>3. 身高1.2米以下儿童随监护人参观，门票半价优惠。</p>
                                <p>4. 残疾人凭残疾人证件，免费参观。</p>
                                <p>5. 随团导游凭本人导游证，免费参观。</p>
                                <p>6. “三八”妇女节，女性观众享受门票半价优惠。</p>
                                <p>7. “六一”儿童节，14周岁以下儿童（含14周岁），免费参观。随同家长一人，享受半价优惠。</p>
                                <p>8. “八一”建军节，现役军人凭有效证件，免费参观。</p>
							</div>
							<?php endif;?>
						</td>
						<td class="rt"></td>
					</tr>
					<tr class="bn"><td class="lt"></td><td class="ce"></td><td class="rt"></td></tr>
				</table>
			</li>
			<li class="ttp" style="background-position:top center;border-top:none;height:50px;margin-top:5px;" onclick="location.href='http://m.360antique.com'"></li>
		</ul>
	</div>
	<script type="text/javascript">
	    var calendar = new SimpleCalendar('#calendar', {
	    	showFestival: false,
	    	onSelect: function(date) {
		    	jQuery('#calendar-container').hide();
		    	jQuery('input[name=reserve_at]').val(moment(date).format('YYYY-MM-DD'));
	    	},
		});

	    jQuery(function ($) {
		    $('input[name=reserve_at]').click(function () {
			    $(this).blur(); // leave input box
			    $('#calendar-container').show();
		    });
	    });

		function formSubmit() {
			var formValid = true;
			jQuery('form input').each(function(index, ele) {
				if(jQuery(ele).val().length == 0) {
					alert('请填写所有带*的项目');
					formValid = false;
					return false;
				}
			});
			if (formValid) {
// 				 $.ajax({
//                     type: "POST",
//                     dataType: "json",
//                     url: AjaxURL + '?Action=' + 'SubmitHandlingFee' + '&OrderNumber=' + $.trim($("#<%=this.txtOrderNumber.ClientID %>").val()),
//                     data: $('#formAddHandlingFee').serialize(),
//                     success: function (result) {
//                         var strresult=result;
//                         alert(strresult);
//                         //加载最大可退金额
//                         $("#spanMaxAmount").html(strresult);
//                     	location.href = location.href + '?success=1&post_id=' + reponse.data.post_id;
            			
//                     },
//                     error: function(data) {
//                         alert("保存失败，请稍候再试!");
// 	                }
				
				 //data: $('#formAddHandlingFee').serialize(),
			}
		}
	</script>
</body>
</html>