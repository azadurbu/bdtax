<!-- GAS START-->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function()
{ (i[r].q=i[r].q||[]).push(arguments)}

,i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-68998551-1', 'auto');
ga('send', 'pageview');

</script>

<!-- GAS END-->

<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
/*$this->breadcrumbs=array(
'Contact',
);*/
?>
	<br />
	<div class="container">
		<div class="well">

			<h1><?php echo Yii::t('user', 'Contact Us') ?></h1>


			<?php if (Yii::app()->user->hasFlash('contact')): ?>

				<div class="flash-success">
					<?php echo Yii::app()->user->getFlash('contact'); ?>
				</div>

			<?php else: ?>

				<!-- <p class="label label-success">If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p> -->
				<!-- <br /> -->
				<br />

				<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'contact-form',
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
));?>



						<fieldset class="form-horizontal" >


							<p class="note"><?php echo Yii::t('user', 'Fields with <span class="required">*</span> are required:') ?></p>

							<?php //echo $form->errorSummary($model); ?>
							<br />
							<br />


							<div class="form-group"><?php echo CHtml::activeLabelEx($model, 'name', array('class' => 'col-lg-2')); ?>
								<div class="col-lg-10"><?php echo $form->textField($model, 'name', array('class' => 'form-control', 'maxlength' => 255)); ?>
									<?php echo $form->error($model, 'name'); ?>

								</div>
							</div>

							<div class="form-group"><?php echo CHtml::activeLabelEx($model, 'email', array('class' => 'col-lg-2')); ?>
								<div class="col-lg-10"><?php echo $form->textField($model, 'email', array('class' => 'form-control', 'maxlength' => 255)); ?>
								<!-- <div class="col-lg-9"><?php echo $form->textField($model, 'email', array('class' => 'form-control', 'maxlength' => 255, 'placeholder' => Yii::t('user', 'Email address....'))); ?> -->
									<?php echo $form->error($model, 'email'); ?>

								</div>
							</div>

							<div class="form-group"><?php echo CHtml::activeLabelEx($model, 'subject', array('class' => 'col-lg-2')); ?>
								<div class="col-lg-10"><?php echo $form->textField($model, 'subject', array('class' => 'form-control', 'maxlength' => 255)); ?>
									<?php echo $form->error($model, 'subject'); ?>

								</div>
							</div>

							<div class="form-group">
								<?php echo CHtml::activeLabelEx($model, 'body', array('class' => 'col-lg-2')); ?>
								<div class="col-lg-10"><?php echo $form->textArea($model, 'body', array('class' => 'form-control', 'style' => 'resize:vertical')); ?>
									<?php echo $form->error($model, 'body'); ?>

								</div>
							</div>


							<?php if (CCaptcha::checkRequirements()): ?>

								<div class="form-group">
									<?php echo CHtml::activeLabelEx($model, 'verifyCode', array('class' => 'col-lg-2')); ?>
									<div class="col-sm-5 col-sm-9 form-inline">
										<?php $this->widget('CCaptcha');?>
										<?php echo $form->textField($model, 'verifyCode'); ?>
										<?php echo $form->error($model, 'verifyCode', array('size' => 60, 'maxlength' => 255)); ?>
									</div>
									<div class="hint"><?php echo Yii::t('user', 'Please enter the letters as they are shown in the image above.Letters are not case-sensitive.') ?></div>
									</div>
								<?php endif;?>

								<div class="form-actions">
									<?php echo CHtml::submitButton(Yii::t('user', 'SEND MESSAGE'), array('class' => 'btn btn-primary')); ?>
								</div>

</fieldset>
								<?php $this->endWidget();?>


				<?php endif;?>

							</div><!-- form -->
						</div><!-- form -->