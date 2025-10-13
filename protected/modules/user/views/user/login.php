
<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', "Login");
$this->breadcrumbs = array(
	Yii::t('user', "Login"),
);
?>

	<div id="content" class="dashbord-bg">
		<div class="container">
			<div class="login">
				<div class="login-form">
					<div class="login-top"></div>
					<h3><?php echo Yii::t('user', "Already have an account?"); ?></h3>
					<h1><?php echo Yii::t('user', "Sign in"); ?></h1>

					<div class="content mail-login-box">

						<!--==================================++++++++++++++++++++++++++++++++++++++++++==================================-->
						<?php echo CHtml::beginForm('', 'post', $htmlOptions = array('class' => '','onsubmit'=>'trimInput()')); ?>

						<div class="span8">
							<!--<p class="note"><?php /*echo Yii::t('user','Fields with <span class="required">*</span> are required.'); */?></p>-->

							<?php $t = CHtml::errorSummary($model);if (!empty($t)): ?>
							<div class="alert alert-error fade in" style=" ">
								<a class="close" data-dismiss="alert" href="#">&times;</a><?php echo CHtml::errorSummary($model); ?></div>
							<?php endif;?>

						</div>

						<div class="input-group margin-bottom-sm">
							<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
							<?php echo CHtml::activeTextField($model, 'email', $htmlOptions = array('class' => 'form-control', 'id' => 'icon', 'placeholder' => Yii::t('user', "Email address...."))) ?>
						</div>
						<br />

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
							<!-- <input class="form-control" type="password" placeholder="Password"> -->
							<?php echo CHtml::activePasswordField($model, 'password', $htmlOptions = array('class' => 'form-control', 'id' => 'password', 'placeholder' => Yii::t('user', "Password...."), 'autocomplete' => 'off' )) ?>
						</div>

						<div class="input-group login-button">
							<span class="" style=""><?php echo CHtml::activeCheckBox($model, 'rememberMe', $htmlOptions = array('id' => 'optionsCheckbox')); ?> <?php echo Yii::t('user', "Remember me"); ?>	</span>
							<div class="clearfix"></div><br/>
							<button class="btn btn-success" type="submit"><span class="awe-signin"></span> <?php echo Yii::t('user', "SignIn"); ?></button>
						</div>
						<?php echo CHtml::endForm(); ?>
						<div class="clearfix"></div>

						<!-- <h5>By clicking SignIn, you agree to our <a href="#">License Agreement.</a></h5> -->

						<div class="login-bottom-link">
							<?php echo CHtml::link(Yii::t('user', "Forgot your password?"), Yii::app()->getModule('user')->recoveryUrl); ?><br/>
							<?php echo CHtml::link(Yii::t('user', "New to BDTAX? Create an account."), Yii::app()->getModule('user')->registrationUrl, array('class' => '', "style" => "margin-bottom:15px;")); ?>
						</div>

					</div>

					<div class="clearfix"></div>
				</div>

			</div>



		</div>

	</div>

	<!--==================================++++++++++++++++++++++++++++++++++++++++++==================================-->
<!--/CONTENT AREA-->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="agreeModal" class="modal fade bootstrap-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 id="myModalLabel" class="modal-title">License agreement</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						Terms and condition will be here
					</div>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

<?php
$form = new CForm(array(
	'elements' => array(
		'email' => array(
			'type' => 'text',
			'maxlength' => 32,
		),
		'password' => array(
			'type' => 'password',
			'maxlength' => 32,
		),
		'rememberMe' => array(
			'type' => 'checkbox',
		),
	),

	'buttons' => array(
		'login' => array(
			'type' => 'submit',
			'label' => 'Login',
		),
	),
), $model);
?>
<script type="text/javascript">
	function trimInput(){
		var email = document.getElementById("icon").value;
		// console.log(email);
		var trimmedEmail = email.trim();

		document.getElementById("icon").value = trimmedEmail;

	}
</script>
