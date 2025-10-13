<div style="text-align:center; padding-bottom:10px;font-size:16px;"><?php echo Yii::t('common', "OR") ?></div>
<?php if (Yii::app()->user->isGuest): ?>
	<!-- <div class="btn btn-success" id="<?php echo $this->fbLoginButtonId; ?>"><?php //echo $this->facebookButtonTitle; ?></div> -->
	<div class="btn btn-facebook btn-block" id="<?php echo $this->fbLoginButtonId; ?>"><i class="fa fa-facebook-square fa-lg"></i>&nbsp;&nbsp;<?php echo Yii::t('user', 'SIGN IN WITH FACEBOOK'); ?></div>
<?php endif;?>

<style type="text/css">

	.btn-facebook {
  background-color: #4862a1;
  border-radius: 5px;
  color: #fff;
  margin-right: 20px;
  padding: 10px 30px;
  text-decoration: none;
}

.btn-facebook:hover, .btn-facebook:focus {
    color: white;
    text-decoration: none;
}
</style>