<?php
$this->breadcrumbs=array(
	'Personal Informations'=>array('index'),
	'Manage',
	);

$this->menu=array(
	array('label'=>'List PersonalInformation','url'=>array('index')),
	array('label'=>'Create PersonalInformation','url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('personal-information-grid', {
		data: $(this).serialize()
	});
return false;
});
");
?>




<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!-- <div class="search-form" style="display:none">
	<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div> -->
<!-- search-form -->




<div class="panel panel-success filterable">
	<div class="panel-heading">

		<div class="row">
			<div class="col-lg-6">
				<h3 class="panel-title"><strong><?php echo Yii::t('customers',"Manage Clients") ?></strong></h3>
			</div>
			<div class="col-lg-6">
				<?php
				// echo '&nbsp;&nbsp;';
				echo CHtml::link( Yii::t('customers',"Add Client"), array('../index.php/PersonalInformation/companyEntry/id/new'), array('class' => 'btn btn-success pull-right'));
				//echo CHtml::link('Client Transfer', array('#'), array('class' => 'btn btn-success pull-right', 'style'=>'margin-right:10px'));
				if (Yii::app()->user->role=='companyAdmin' || Yii::app()->user->role=='superAdmin') {
					echo '<button style="margin-right:10px" class="btn btn-success pull-right" data-target="#transferModal" data-toggle="modal" type="button">'.Yii::t('customers',"Transfer Client").'</button>';
				}
				?>
				<!-- <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button> -->
			</div>
		</div>
	</div>



	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'personal-information-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
/*			array(
				'name'=>'Org',
				'value'=>'CHtml::encode($data->org->organization_name)'),*/
			// array(
			// 	'name'=>'OrgUserLastName',
			// 	'value'=>'CHtml::encode($data->orUser->last_name)'),
/*			array(
				'type'=>'raw',
				'name'=>'School',
                        // 'visible' => '(Yii::app()->user->role=="superAdmin")',
				'value'=>'findSchool($data->id)'),
			array(
				'name'=>'Role',
				'value'=>'CHtml::encode(@$data->userRole->role)'),
			'last_name',
			'first_name',
			array(
				'name'=>'email',
				'type'=>'raw',
				'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
				),*/
		// 'CPIId',
'Name',
array(
	'name'=>'OrgUserFirstName',
	'value'=>'CHtml::encode($data->orgUser->first_name)'),
array(
	'name' => 'NationalId',
	'value' => 'NIDPadding($data->NationalId)',
	'type' => 'raw',
	),
array(
	'name' => 'ETIN',
	'value' => 'etinPadding($data->ETIN)',
	'type' => 'raw',
	),
/*'ETIN',
'NationalId',*/
			// 'TaxesCircle',
			// 'TaxesZone',
// 'AssesmentYearId',
array(
	'name' => 'progress',
	'value' => 'getProgress($data->CPIId)',
	'type' => 'raw',
	),
			         //    array(
            //     'class' => 'bootstrap.widgets.TbToggleColumn',
            //     'toggleAction' => 'organizations/toggle',
            //     'name' => 'Status',
            //     'htmlOptions'=>array('title'=>'Status'),
            //     'header' => 'Status'
            // ),
		/*
		'ResidentialStatus',
		'Status',
		'BusinessName',
		'SpouseName',
		'FathersName',
		'MothersName',
		'DOB',
		'PresentAddress',
		'PermanentAddress',
		'PhoneOffice',
		'PhoneBusiness',
		'PhoneResidential',
		'VatNumber',
		'NoOfAdultInFamily',
		'NoOfChildInFamily',
		'UserId',
		'CreateAt',
		'LastvisitAt',
		'trash',
		*/
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'template' => '{pdf} {print} {update} {delete}',
			'buttons' => array(
				'pdf' => array(
					'label' => 'PDF',
					'icon' => 'fa fa-file-pdf-o fa-lg',
                            // 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
					'url' => 'Yii::app()->createUrl("finalReview/taxPdf/id/".$data->CPIId)',
					'options' =>array('target'=>"_blank"),
					),
				'print' => array(
					'label' => 'Print Data',
					'icon' => 'fa fa-print fa-lg',
                            // 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
					'url' => 'Yii::app()->createUrl("finalReview/taxPrint/id/".$data->CPIId)',
					'options' =>array('target'=>"_blank"),
					),
				'update' => array(
					'label' => 'Update Data',
					'icon' => 'fa fa-edit fa-lg',
                            // 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
					'url' => 'Yii::app()->createUrl("PersonalInformation/companyEntry/id/".$data->CPIId)',
					),
				'delete' => array(
					'label' => 'Delete',
					'icon' => 'fa fa-remove fa-lg',
                            // 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
					'url' => 'Yii::app()->createUrl("customers/delete/id/".$data->CPIId)',
					),
				),
),
),
)); ?>
</div>

<?php 
			// 		echo "<pre>";
			// print_r($this->client_personalInformationStatusBar(21));
			// echo "</pre>";
			// exit;


function getProgress($id){




	if($id > 0 ){
			// $valueNow = Yii::app()->controller->client_personalInformationStatusBar($id)+Yii::app()->controller->client_income($id);
		$valueNow = (( Yii::app()->controller->client_personalInformationStatusBar($id)+Yii::app()->controller->client_incomeStatusBar($id)+Yii::app()->controller->client_expenseStatusBar($id)+Yii::app()->controller->client_assetsStatusBar($id)+Yii::app()->controller->client_liabilityStatusBar($id) )/5);
		if ($valueNow==100) {
			$class1 ='progress-bar progress-bar-success';
		} else {
			$class1 ='progress-bar progress-bar-danger';
		}

	}
	else{
		$valueNow = 0;
	}
	

	$ud = "<div class='progress' style='margin-right:15px;'>
	<div class='".$class1."' role='progressbar' aria-valuenow='".$valueNow."' aria-valuemin='0' aria-valuemax='100' style='min-width: 2em; width: ".$valueNow."%;'>
		<b>".$valueNow."%</b>
	</div>
</div>" ;

return $ud;
} 


function etinPadding($value){

	if ($value!=null) {
		# code...

		$data = substr($value,8);
// (string)$value;
		return str_pad($data,17,"*",STR_PAD_LEFT);
	} else {
		return $value;
	}
}

function NIDPadding($value){

	if ($value!=null) {

		$data = substr($value,8);
// (string)$value;
		return str_pad($data,12,"*",STR_PAD_LEFT);

	} else {
		return $value;
	}
}


?>

<script type="text/javascript">
	$('.summary').hide();
	$('#PersonalInformation_progress').hide();
</script>

<style type="text/css">

	#personal-information-grid_c5 {
		width:100px;
	}

	.grid-view {
		padding-top: 5px !important;
	}

	a {
		color: #5cb85c;
		text-decoration: none;
	}
</style>

<?php   //--------------------------------------------------------------------------------------------------------------//  ?>


<?php 
//print_r( $this->client_personalInformationStatusBar(21) );
?>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="transferModal" class="modal fade bootstrap-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header label-success">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<div id="myModalLabel" class="modal-title"><?php echo Yii::t('customers',"Transfer Client"); ?></div>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-md-12">

						<?php if ( isset($assignedUser) && isset($assignedCustomer) ){ ?>
						
						<form method="post" action="<?=Yii::app()->baseUrl; ?>/index.php/customers/alterUser" id="registration-form" class="appnitro" enctype="multipart/form-data">


							<div class="input-box">
								<?php echo CHtml::dropDownList('customer', '', $assignedCustomer , array('empty' => 'Select Client', 'class' => 'form-control', 'onchange' => 'getSubCat(this.value, "")'));  ?>                            
							</div>
							<br/>

							<div class="input-box">
								<?php echo CHtml::dropDownList('assignedUser', '', $assignedUser , array('empty' => 'Select Assigned User', 'class' => 'form-control', 'onchange' => 'getSubCat(this.value, "")'));  ?>                            
							</div>
							<br/>


							<div class="input-box">
								<input id="alter" type="submit" value="<?php echo Yii::t('customers',"Transfer Client"); ?>" name="yt0" class="btn btn-success"> 
							</div>

							<div class="clearfix"></div>

						</form>
						<?php } else {
							echo "<H2>".Yii::t('customers',"No user created yet.")."<h2/>";
						} ?>
					</div>
				</div>

			</div> 

			<div class="modal-footer label-success">

			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
		$("#alter").click(function(event) {
			if( !confirm('Are You Sure You want to Transfer the  Client') ) 
				event.preventDefault();
		});
	});
</script>

<style type="text/css">
	.grid-view .button-column {
		text-align: center;
		width: 120px;
	}
</style>


