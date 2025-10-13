<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'IncomeAgricultureId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeId',array('class'=>'span5')); ?>

		<?php echo $form->dropDownListRow($model,'Type',array("Bond"=>"Bond","Debenture"=>"Debenture","Securities"=>"Securities",),array('class'=>'input-large')); ?>

		<?php echo $form->textAreaRow($model,'LandInBigha',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'CorpseType',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'TotalRevenue',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ProductionCost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CerateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastUpdateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CPIId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EntryYear',array('class'=>'span5','maxlength'=>9)); ?>

		<?php echo $form->textFieldRow($model,'trash',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
