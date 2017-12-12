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
			<div><img class="info-title" src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-info-title.png" width="130"></div>
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
							<label for="name">预约人姓名<span class="required">*</span></label>
						</div>
						<div class="input-field col s6">
							<input id="mobile" type="text" name="mobile" class="validate">
							<label for="mobile">手机号码<span class="required">*</span></label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="id_no" type="text" name="id_no" class="validate">
							<label for="id_no">身份证号<span class="required">*</span></label>
						</div>
					</div>
					<div class="row static">
						<div class="col s12 title">
	          				参观类型<span class="required">*</span>
						</div>
						<div class="col s12">
							<label class="checkbox">
						        <input value="group" class="with-gap" name="reserve_type" type="radio"  />
						        <span>团体</span>
						     </label>
						     <label class="checkbox">
						        <input value="individual" class="with-gap" name="reserve_type" type="radio"  />
						        <span>散客</span>
						     </label>
						 </div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="reserve_number" min="1" name="reserve_number" type="number" class="validate">
							<label for="reserve_number">参观人数<span class="required">*</span></label>
						</div>
					</div>
					<div class="row static">
						<div class="col s12 title">
	          				参观时间<span class="required">*</span>
						</div>
						<div class="col s12">
							<label class="checkbox">
						        <input class="with-gap" value="morning" name="reserve_time" type="radio"  />
						        <span>上午</span>
						     </label>
						     <label class="checkbox">
						        <input class="with-gap" value="afternoon" name="reserve_time" type="radio"  />
						        <span>下午</span>
						     </label>
						 </div>
						 <?php $currentDate = current_time('Y-m-d');?>
						 <div class="input-field col s12 reserve-date" style="display:none">
							<select name="reserve_date">
								<?php for ($i = 0; $i <= 30; $i++) :?>
								<?php $dt = date('Y-m-d', strtotime("+{$i} days", strtotime($currentDate)));?>
								<option value="<?php echo $dt;?>"><?php echo $dt;?> 周<?php echo mb_substr("日一二三四五六", date("w", strtotime($dt)), 1);?> (剩余200张)</option>								<
								<?php endfor;?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="_verify_code" type="text" name="_verify_code" class="validate">
							<label for="_verify_code">验证码<span class="required">*</span></label>
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
					<a class="waves-effect waves-light btn" onclick="formSubmit()">预约</a>
				</form>
				<?php endif;?>
			</div>
		</div>
		<div class="notice">
			<div><img class="notice-title" src="<?php echo get_template_directory_uri() ?>/assets/images/tickets-notice-title.png" width="130"></div>
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
