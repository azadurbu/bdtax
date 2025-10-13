<div id="home-mid" class="reg-form income-dashbord">

<h2>View CalculationDataSource #<?php echo $model->CalculationId; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ConveynceWaiverLevel',
		'HouseRentWaiverPercent',
		'CommercialRentPercent',
		'HouseRentCompareValue',
		'MedicalWaiverPercent',
		'MedicalCompareValue',
		'ProvidentFoundInterest',
		'ProvidentFoundportion',
		'ResidentialRentPercent',
		'CommercialRentPercent',
		'NormalTaxWaiverAmount',
		'FemaleTaxWaiverAmount',
		'DisableTaxWaiverAmount',
		'FreedomFighterTaxWaiverAmount',
		'AgricultureTaxWaiverAmount',
		'NRBStatusPercent',
		'MaxInvestPercent',
		'MaxDepositeValue',
		'TaxRebatePercent',
		'CreateAt',
		'LastvisitAt',
		'EntryYear',
),
'htmlOptions'=>array('style'=>'width: 50%;')
)); ?>
</div>