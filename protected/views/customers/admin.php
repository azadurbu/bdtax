<?php
$this->breadcrumbs = array(
	'Personal Informations' => array('index'),
	'Manage',
);

$this->menu = array(
	array('label' => 'List PersonalInformation', 'url' => array('index')),
	array('label' => 'Create PersonalInformation', 'url' => array('create')),
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


	<?php
	  if(Yii::app()->user->hasFlash('success')) {
	?>
	    <div class="flash_alert"><div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
	    <?=Yii::app()->user->getFlash('success')?></div></div>
	<?php
	    } else if(Yii::app()->user->hasFlash('error')) {
	?>
	    <div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('error')?></div></div>
	<?php
	    }
	?>




<div class="panel panel-success filterable sticky-min-height3">
	<div class="panel-heading">

		<div class="row">
			<div class="col-lg-6">
				<h3 class="panel-title"><strong><?php echo Yii::t('customers', "Manage Clients") ?></strong></h3>
			</div>
			<div class="col-lg-6">
				<a data-toggle="modal" data-target="#addClient" href="#" class="btn btn-success pull-right"><?=Yii::t("customers", "Add Client") ?></a>
				<?php
					//echo CHtml::link(Yii::t('customers', "Add Client"), array('../index.php/PersonalInformation/companyEntry/id/new'), array('class' => 'btn btn-success pull-right'));
				if (Yii::app()->user->role == 'companyAdmin' || Yii::app()->user->role == 'superAdmin') {

                    
          
					echo '<button style="margin-left:10px;margin-right:10px" class="btn btn-success pull-right" data-target="#transferModal" data-toggle="modal" type="button">' . Yii::t('customers', "Transfer Client") . '</button>';
					echo CHtml::link(Yii::t('user','Import Client'), array('/Customer/Import/'), array('class' => 'btn btn-success pull-right'));
				}
				?>
				
			</div>
		</div>
	</div>

	
	<!-- <div>
      <?php $form=$this->beginWidget('CActiveForm', array(
          'id'=>'page-form',
          'enableAjaxValidation'=>true,
      )); ?>
	  </br>
      <b style="padding-left: 13px;"><?=Yii::t('common', "From")?> : </b>
      <?php
      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
          'name'=>'from_date',  // name of post parameter
          'value'=>isset(Yii::app()->request->cookies['from_date']) ? Yii::app()->request->cookies['from_date']->value : '',  // value comes from cookie after submittion
          'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'yy-mm-dd',
          ),
          'htmlOptions'=>array(

          ),

      ));
      ?>
      <b><?=Yii::t('common', "To")?> : </b>
      <?php
      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
          'name'=>'to_date',
          'value'=>isset(Yii::app()->request->cookies['to_date']) ? Yii::app()->request->cookies['to_date']->value : '',
          'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'yy-mm-dd',

          ),
          'htmlOptions'=>array(

          ),
      ));
      ?>
      <?php echo CHtml::submitButton(Yii::t('common', "Go"), array('class' => 'btn btn-success btn-xl')); ?>


      <?php $this->endWidget(); ?>

	</div> -->



	<?php 
	$this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'personal-information-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'Name',
		array(
			'name' => 'OrgUserFirstName',
			'value' => 'CHtml::encode(@$data->orgUser->first_name)'),
		array(
			'name' => 'NationalId',
			'value' => 'NIDPadding(Yii::app()->controller->_decode($data->NationalId))',
			'type' => 'raw',
			'filter'=>false,
		),
		array(
			'name' => 'ETIN',
			'value' => 'etinPadding(Yii::app()->controller->_decode($data->ETIN))',
			'type' => 'raw',
			'filter'=>false,
		),
		array(
			'name' => 'progress',
			'value' => 'getProgress($data->CPIId)',
			'type' => 'raw',
			'filter'=>false,
		),
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
			// 'template' => '{pdf} {update} {delete}',
			'template' => '{update} {delete}',
			'buttons' => array(
				// 'pdf' => array(
				// 	'label' => 'PDF',
				// 	'icon' => 'fa fa-file-pdf-o fa-lg',
				// 	'url' => 'Yii::app()->createUrl("finalReview/taxPdf/id/".$data->CPIId)',
				// 	'options' => array('target' => "_blank"),
				// ),
				'update' => array(
					'label' => 'Update Data',
					'icon' => 'fa fa-edit fa-lg',
					'url' => 'Yii::app()->createUrl("PersonalInformation/companyEntry/id/".$data->CPIId)',
				),
				'delete' => array(
					'label' => 'Delete',
					'icon' => 'fa fa-remove fa-lg',
					'url' => 'Yii::app()->createUrl("customers/delete/id/".$data->CPIId)',
				),
			),
		),
	),
));?>
</div>

<?php
// 		echo "<pre>";
// print_r($this->client_personalInformationStatusBar(21));
// echo "</pre>";
// exit;

function getProgress($id) {

	if ($id > 0) {
		// $valueNow = Yii::app()->controller->client_personalInformationStatusBar($id)+Yii::app()->controller->client_income($id);
		// $valueNow = (( Yii::app()->controller->client_personalInformationStatusBar($id)+Yii::app()->controller->client_incomeStatusBar($id)+Yii::app()->controller->client_expenseStatusBar($id)+Yii::app()->controller->client_assetsStatusBar($id)+Yii::app()->controller->client_liabilityStatusBar($id) )/5);
		$valueNow = ((Yii::app()->controller->client_personalInformationStatusBar($id) + Yii::app()->controller->client_incomeStatusBar($id) + Yii::app()->controller->client_expenseStatusBar($id) + Yii::app()->controller->client_assetsStatusBar($id) + Yii::app()->controller->client_liabilityStatusBar($id)) / 5);
		if ($valueNow == 100) {
			$class1 = 'progress-bar progress-bar-success';
		} else {
			$class1 = 'progress-bar progress-bar-danger';
		}

	} else {
		$valueNow = 0;
	}

	$ud = "<div class='progress' style='margin-right:15px;'>
	<div class='" . $class1 . "' role='progressbar' aria-valuenow='" . $valueNow . "' aria-valuemin='0' aria-valuemax='100' style='min-width: 2em; width: " . $valueNow . "%;'>
		<b>" . $valueNow . "%</b>
	</div>
</div>";

	return $ud;
}

function etinPadding($value) {

	if ($value != null) {
		$data = substr($value, -4);
		return str_pad($data, 17, "*", STR_PAD_LEFT);
	} else {
		return $value;
	}
}

function NIDPadding($value) {
	if ($value != null) {
		$data = substr($value, -4);
		return str_pad($data, 17, "*", STR_PAD_LEFT);
	} else {
		return $value;
	}
}

?>

<script type="text/javascript">
	$('.summary').hide();
	$('#PersonalInformation_NationalId').hide();
	$('#PersonalInformation_ETIN').hide();
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

<?php //--------------------------------------------------------------------------------------------------------------//  ?>


<?php
//print_r( $this->client_personalInformationStatusBar(21) );
?>


<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="transferModal" class="modal fade bootstrap-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header label-success">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<div id="myModalLabel" class="modal-title"><?php echo Yii::t('customers', "Transfer Client"); ?></div>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-md-12">

						<?php if (isset($assignedUser) && isset($assignedCustomer)) {?>

						<form method="post" action="<?=Yii::app()->baseUrl;?>/index.php/customers/alterUser" id="registration-form" class="appnitro" enctype="multipart/form-data">


							<div class="input-box">
								<?php echo CHtml::dropDownList('customer', '', $assignedCustomer, array('empty' => Yii::t('customers', "Select Client"), 'class' => 'form-control','required'=>'required', 'onchange' => 'getSubCat(this.value, "")')); ?>
							</div>
							<br/>

							<div class="input-box">
								<?php echo CHtml::dropDownList('assignedUser', '', $assignedUser, array('empty' => Yii::t('customers', "Select Assigned User"), 'class' => 'form-control','required'=>'required', 'onchange' => 'getSubCat(this.value, "")')); ?>
							</div>
							<br/>


							<div class="input-box">
								<input id="alter" type="submit" value="<?php echo Yii::t('customers', "Transfer Client"); ?>" name="yt0" class="btn btn-success">
							</div>

							<div class="clearfix"></div>

						</form>
						<?php } else {
	echo "<H2>" . Yii::t('customers', "No user created yet.") . "<h2/>";
}
?>
					</div>
				</div>

			</div>

			<div class="modal-footer label-success">

			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel2"><strong><?=Yii::t("customers", "Add Client") ?></strong></h3>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-lg-6">
      			<input id="client_email" class="form-control" placeholder="<?=Yii::t("customers", "E-mail Address") ?>" value="" type="email">
      		</div>
      		<div class="col-lg-6">
      			<button type="button" onclick="chkEmail()" class="btn btn-success"><?=Yii::t("customers", "Create Client") ?></button>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=Yii::t("customers", "Close") ?></button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var newClientURL = "<?=$this->createAbsoluteUrl('/PersonalInformation/companyEntry/id/new')?>";
	$(document).ready(function() {
		$("#alter").click(function(event) {
			if( !confirm('Are you sure you want to transfer the client?') )
				event.preventDefault();
		});




	});

	function chkEmail() {
		var email = $("#client_email").val();
		if (validateEmail(email) == false ) {
			bootbox.alert("Invalid Email Address.");
		}
		else {
			location.href = newClientURL+"?e="+email;
		}
	}

	function validateEmail(email) {
	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	}
</script>

<style type="text/css">
	.grid-view .button-column {
		text-align: center;
		width: 120px;
	}
</style>


