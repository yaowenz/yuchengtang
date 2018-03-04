<?php
/** Materialize UI **/
wp_enqueue_script( 'materialize',  get_template_directory_uri() . '/assets/materialize/js/materialize.min.js', ['jquery']);
wp_enqueue_style( 'materialize',  get_template_directory_uri() . '/assets/materialize/css/materialize.min.css' );

/** Verify Code **/
session_start();
$_SESSION['verify_code'] = mt_rand(1000, 9999);

get_header();
?>
<div class="primary content reservation">
	<div class="wrapper">
		<div style="margin-bottom:30px" class="desktop">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-title.jpg" width="100%" />
		</div>
		<!--
		<div class="mobile page-title">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-title-mobile.png" width="150" />
		</div>
		 -->
		<div class="info">
			<div class="text-cn"><img class="info-title" src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-info-title.png" width="130"></div>
			<div class="text-en" style="font-size:20px;font-weight:bold;color:#AA773E;padding-left:10px">Reservation Information</div>
			<div class="form row">
				<?php if ($_GET['success'] == 1 && !empty(intval($_GET['post_id'])) && $post = get_post(intval($_GET['post_id']))):?>
				<?php $reservation = json_decode($post->post_content, true)?>
				<div class="row">
					<div class="col s12" style="color:#4db6ac;font-size:18px">预约成功!</div>
					<div class="input-field col s12">
						<span class="helper-text" data-error="wrong" data-success="right">以下是您的预约信息：</span>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input disabled="" value="<?php echo $reservation['name'];?>" id="disabled" type="text" class="validate disabled">
						<label for="disabled" class="active">预约人姓名</label>
						
					</div>
					<div class="input-field col s6">
						<input disabled="" value="<?php echo $reservation['mobile'];?>" id="disabled" type="text" class="validate disabled">
						<label for="disabled" class="active">手机号码</label>
					</div>
					<div class="input-field col s12">
						<input disabled="" value="<?php echo $reservation['reserve_date'];?>" id="disabled" type="text" class="validate disabled">
						<label for="disabled" class="active">参观日期</label>
					</div>
					<div class="input-field col s12">
						<input disabled="" value="<?php echo $reservation['reserve_number'];?>" id="disabled" type="text" class="validate disabled">
						<label for="disabled" class="active">参观人数</label>
					</div>
				</div>
				<?php $reservation = json_decode($post->post_content, true)?>
				<?php else: ?>
				<form class="col s12">
					<div class="row">
						<div class="input-field col s6">
							<input id="name" type="text" name="name" class="validate">
							<label for="name"><span class="text-cn">预约人姓名</span><span class="text-en">Name</span><span class="required">*</span></label>
						</div>
						<div class="input-field col s6">
							<input id="mobile" type="text" name="mobile" class="validate">
							<label for="mobile"><span class="text-cn">手机号码</span><span class="text-en">Tel</span><span class="required">*</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="id_no" type="text" name="id_no" class="validate">
							<label for="id_no"><span class="text-cn">身份证号</span><span class="text-en">ID No</span><span class="required">*</span></label>
						</div>
					</div>
					<div class="row static">
						<div class="col s12 title">
	          				<span class="text-cn">参观类型</span><span class="text-en"></span>Visitor(s)<span class="required">*</span>
						</div>
						<div class="col s12">
							<label class="checkbox">
						        <input value="group" class="with-gap" name="reserve_type" type="radio"  />
						        <span><span class="text-cn">团体</span><span class="text-en">Group</span></span>
						     </label>
						     <label class="checkbox">
						        <input value="individual" class="with-gap" name="reserve_type" type="radio"  />
						        <span><span class="text-cn">散客</span><span class="text-en">Individual</span></span>
						     </label>
						 </div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="reserve_number" min="1" name="reserve_number" type="number" class="validate">
							<label for="reserve_number"><span class="text-cn">参观人数</span><span class="text-en">Number of Visitor</span><span class="required">*</span></label>
						</div>
					</div>
					<div class="row static">
						<div class="col s12 title">
	          				<span class="text-cn">参观时间</span><span class="text-en">Reservation Time<span class="required">*</span>
						</div>
						<div class="col s12">
							<label class="checkbox">
						        <input class="with-gap" value="morning" name="reserve_time" type="radio"  />
						        <span><span class="text-cn">上午</span><span class="text-en">Morning</span></span>
						     </label>
						     <label class="checkbox">
						        <input class="with-gap" value="afternoon" name="reserve_time" type="radio"  />
						        <span><span class="text-cn">下午</span><span class="text-en">Afternoon</span></span>
						     </label>
						 </div>
						 <?php
						 // 获取剩余票数
						 $currentDate = current_time('Y-m-d');
						 $endDate = date('Y-m-d', strtotime("+30 days", strtotime($currentDate)));
						 global $wpdb, $table_prefix;
						 $reserveStats = $wpdb->get_results("SELECT * FROM {$table_prefix}yct_reserve_stats
						 	WHERE reserve_date >= '{$currentDate}' AND reserve_date <= '{$endDate}'");
						 $reserveStats = array_column($reserveStats, null, 'reserve_date');
						 ?>
						 <div class="input-field col s12 reserve-date" style="display:none">
							<select name="reserve_date">
								<?php
									for ($i = 0; $i <= 30; $i++) :
										$dtTs = strtotime("+{$i} days", strtotime($currentDate));
										if (in_array(date('w', $dtTs), [0,1])) { // 周日、周一闭馆
											continue;
										}
										$dt = date('Y-m-d', $dtTs);
										$left = YCT_RESERVE_DAILY_MAX;
										if (isset($reserveStats[$dt])) {
											$left -= $reserveStats[$dt]->reserve_count;
										}
								?>
								<option value="<?php echo $dt;?>"><?php echo $dt;?> 周<?php echo mb_substr("日一二三四五六", date("w", strtotime($dt)), 1);?> (剩余<?php echo $left;?>张)</option>								<
								<?php endfor;?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="_verify_code" type="text" name="_verify_code" class="validate">
							<label for="_verify_code"><span class="text-cn">验证码</span><span class="text-en">Verification Code</span><span class="required">*</span></label>
						</div>
						<div class="col s6 verify-code">
						<?php
                            $captcha = new \Gregwar\Captcha\CaptchaBuilder();
                            $captcha->setDistortion(true);
                            $captcha->setPhrase($_SESSION['verify_code']);
                            $captcha->buildAgainstOCR(150,50);
                            $captchaData = $captcha->inline(70);
                        ?>
						<img src="<?php echo $captchaData; ?>" valign="middle" width="80%" />
						</div>
					</div>
					<a class="waves-effect waves-light btn" onclick="formSubmit()"><span class="text-cn">预约</span><span class="text-en">Submit</span></a>
				</form>
				<?php endif;?>
			</div>
		</div>
		<div class="notice">
			<div class="text-cn"><img class="notice-title" src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-notice-title.png" width="130"></div>
			<div class="text-en" style="font-size:20px;font-weight:bold;color:#AA773E">Ticketing Notice</div>
			<p style="margin-bottom:15px;margin-top:10px"><strong><span class="text-cn">票价：</span><span class="text-en">Price:</span></strong><br><span class="text-cn">128元/张</span><span class="text-en">128 RMB/Visitor</span></p>
			<p style="margin-bottom:15px"><strong><span class="text-cn">场馆地址：</span><span class="text-en">Address:</span></strong><br>Address: 17 Floor, Yinyi Bingjiang Center, No. 55-56, Lane 21, Pu San Road, Pudong New District, Shanghai, P. R. China. (Turn Right at He Yi Hotel)</p>
			<p style="margin-bottom:15px"><strong><span class="text-cn">场馆电话：</span><span class="text-en">Tel:</span></strong><br>021-61553566</p>
			<p><strong><span class="text-cn">开馆时间：</span><span class="text-en">Opening Time:</span></strong><br><span class="text-cn">周二至周六 10:00-16:30，周一、周日闭馆。</span><span class="text-en">OPEN Tuesday - Saturday 10:00-16:30，<br/>CLOSED Sunday & Monday</span></p>
			<h2><span class="text-cn">参观须知</span><span class="text-en">Visiting Notice</span></h2>
			<p>1. <span class="text-cn">为了不妨碍、影响他人参观及展品安全，请勿在馆内拍照；</span><span class="text-en">No photography.</span></p>
			<p>2. <span class="text-cn">为了您和他人的健康，请勿在馆内吸烟、乱扔垃圾、随地吐痰；</span><span class="text-en">Smoking, littering and spitting is strictly forbidden inside the exhibition hall. </span></p>
			<p>3. <span class="text-cn">请勿携带宠物进馆参观。</span><span class="text-en">No pets.</span></p>
			<h2><span class="text-cn">优惠信息</span><span class="text-en">Concessional Terms</span></h2>
			<p>1. <span class="text-cn">70岁以上（含70岁）老年人凭有效证件，免费参观。</span><span class="text-en">Free admission for seniors 70 years old and older with valid certificate or proof of age (passport, ID, etc.)</span></p>
			<p>2. <span class="text-cn">身高1.2米以下儿童随监护人参观，门票半价优惠。</span><span class="text-en">50% discount on concessions for children under 1.2 meters in height.</span></p>
			<p>3. <span class="text-cn">残疾人凭残疾人证件，免费参观。</span><span class="text-en">Free admission for disabled visitors with personal disability certificate.</span></p>
			<p>4. <span class="text-cn">随团导游凭本人导游证，免费参观。</span><span class="text-en">Free admission for accompanying guides with personal tourist certificate.</span></p>
		</div>
		<div class="clear"></div>
		
	</div>
</div>
<script>
jQuery(function($) {
	$('#nav .tickets').addClass('active');
	$('select').select();

	$('input[name=reserve_time]').change(function() {
		$('.reserve-date').css('display', 'block');
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
		 jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: '<?php echo admin_url( 'admin-ajax.php' )?>' + '?action=reservation_create',
            data: jQuery('form').serialize(),
            success: function (response) {
                if (response.err != 0) {
                    alert(response.msg);
                    return;
                }
				var appendQuery = '?';
				if (location.href.indexOf('?') > 0) {
				    appendQuery = '&';
				}
                //console.log(response);
            	location.href = location.href + appendQuery + 'success=1&post_id=' + response.data.post_id;
            },
            error: function(data) {
                alert("保存失败，请稍候再试!");
            }
		 });
	}
}

</script>
<?php
get_footer();
?>
