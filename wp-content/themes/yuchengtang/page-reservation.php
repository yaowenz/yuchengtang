<?php
use Gregwar\Captcha\CaptchaBuilder;
?>
这是看展页面
<?php
$captcha = new CaptchaBuilder();
$captcha->setDistortion(true);
$captcha->setPhrase(rand(1000,9999));
$captcha->buildAgainstOCR(150,50);
$captchaData = $captcha->inline(70);
?>
<img src="<?php echo $captchaData; ?>" width="150" height="50" />