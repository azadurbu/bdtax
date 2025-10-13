<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'ExpenditureId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PersonalFoodingExpenses',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TotalTaxPaidLastYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'AccommodationExpenses',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TransportExpenses',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ResidenceElectricityBill',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ResidenceWasaBill',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ResidenceGasBill',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ResidenceTelephoneBill',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ChildrenEducationExpenses',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PersonalForeignTravelExpenses',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'FestivalNOtherSpecialExpenses',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TotalExpenditure',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CerateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastUpdateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CPIId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EntryYear',array('class'=>'span5','maxlength'=>4)); ?>

		<?php echo $form->textFieldRow($model,'trash',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
