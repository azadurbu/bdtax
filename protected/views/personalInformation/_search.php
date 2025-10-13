<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'CPIId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>80)); ?>

		<?php echo $form->textFieldRow($model,'ETIN',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NationalId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TaxesCircle',array('class'=>'span5','maxlength'=>80)); ?>

		<?php echo $form->textFieldRow($model,'TaxesZone',array('class'=>'span5','maxlength'=>80)); ?>

		<?php echo $form->textFieldRow($model,'AssesmentYearId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ResidentialStatus',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'BusinessName',array('class'=>'span5','maxlength'=>80)); ?>

		<?php echo $form->textFieldRow($model,'SpouseName',array('class'=>'span5','maxlength'=>80)); ?>

		<?php echo $form->textFieldRow($model,'FathersName',array('class'=>'span5','maxlength'=>80)); ?>

		<?php echo $form->textFieldRow($model,'MothersName',array('class'=>'span5','maxlength'=>80)); ?>

		<?php echo $form->datepickerRow($model,'DOB',array('options'=>array(),'htmlOptions'=>array('class'=>'span5')),array('prepend'=>'<i class="icon-calendar"></i>','append'=>'Click on Month/Year at top to select a different year or type in (mm/dd/yyyy).')); ?>

		<?php echo $form->textAreaRow($model,'PresentAddress',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'PermanentAddress',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'PhoneOffice',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'PhoneBusiness',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'PhoneResidential',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'VatNumber',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NoOfAdultInFamily',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NoOfChildInFamily',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'UserId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CreateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastvisitAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'trash',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
