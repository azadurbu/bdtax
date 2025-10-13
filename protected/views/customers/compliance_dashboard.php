<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/client-dashbord.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

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

<div class="panel panel-success filterable">

	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-6">
				<h3 class="panel-title"><strong><?php echo Yii::t('customers', "Compliance Dashboard") ?></strong></h3>
			</div>
		</div>
	</div>
	
	<div>
	<div class="col-lg-12 client-dashbord-space">
		<div class="row filter-box">
			<div class="col-lg-6">
	        	<h2 style="color:#3c763d;margin-top:0px;"><?php if($filed){ echo number_format(($filed/$numberOfClients)*100,2);}else{ echo '0';} ?>% Employees are in compliance</h2>
	        </div>
			<div class="col-lg-4">
				<p style="font-size: 18px;padding-top: 5px;text-align: right;"><strong>Select Tax Year</strong></p>
			</div>
			<div class="col-lg-2">
				<select onchange="changeToTaxYear(this.value)" class="form-control">
				<?php $taxyears = TaxYears::model()->findAll();
		              foreach($taxyears as $ty){?>
		              	 <option <?php if($tax_year==$ty->tax_year){ echo 'selected';}?> value="<?php echo $ty->tax_year;?>"><?php echo $ty->tax_year;?></option>
		              <?php } ?>
		        </select>
	        </div>
	        
        </div>
		<div class="row">
			
			<div class="col-lg-3 number-of-client1">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo Yii::t('customers', "Total Employees") ?></div>
					<div class="panel-body">
						<p><?php echo $numberOfClients; ?></p>
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/downloademployee?type=1&taxyear=<?php echo $tax_year;?>" class="btn btn-danger btn-download">Download</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 number-of-client1">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo Yii::t('customers', "Return Filed") ?></div>
					<div class="panel-body">
						<p><?php echo $filed; ?></p>
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/downloademployee?type=2&taxyear=<?php echo $tax_year;?>" class="btn btn-danger btn-download">Download</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 number-of-client1">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo Yii::t('customers', "Return Not Filed") ?> </div>
					<div class="panel-body" >
						<p><?php echo ($numberOfClients-$filed); ?></p>
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/downloademployee?type=3&taxyear=<?php echo $tax_year;?>" class="btn btn-danger btn-download">Download</a>
						<p >
						<a class="btn btn-warning btn-reminder" style="font-size: 8px;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/sendremainder/taxyear/<?php echo $tax_year;?>">Send Reminder</a></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 number-of-client1">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo Yii::t('customers', "Tax Compliance 108A") ?></div>
					<div class="panel-body">
						<p><?php echo $filed ?></p>
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/downloademployee?type=4&taxyear=<?php echo $tax_year;?>" class="btn btn-danger btn-download">Download Compliance 108A</a>
					</div>
				</div>
			</div>
			
			
			<div class="clearfix"></div>
		</div>
	</div>	
	<div class="col-lg-12">
	<a class="btn btn-success" style="float: right" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/import"><?php echo Yii::t('customers', "Import Employees") ?></a>
    <a class="btn btn-success" style="float: right; margin-right: 10px;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/employee"><?php echo Yii::t('customers', "Add Employees") ?></a>
	
    </div>
	<div class="col-lg-12 client-dashbord-space">

			<div class="panel  panel-default">
				<div class="panel-heading"><?php echo Yii::t('customers', "Employee List") ?>
					
				</div>
				<div class="panel-body">

						<?php 
	$this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'personal-information-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
			'name' => 'Name',
			'value' => '$data->Name',
			'type' => 'raw',
		),
		'Email',
		'designation',
		 array(
			'name' => 'ETIN',
			'value' => 'etinPadding(Yii::app()->controller->_decode($data->ETIN))',
			'type' => 'raw',
			'filter'=>false,
		),
		array(
			'name' => 'status',
			'value' => 'userStatus($data->UserId)',
			'type' => 'raw',
			'filter'=>false,
		),

		array(
			'name' => 'notification',
			'value' => '$data->notification',
			'type' => 'raw',
			'filter'=>false,
		),
		
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
			// 'template' => '{pdf} {update} {delete}',
			'template' => '{edit} {update} {delete}',
			'buttons' => array(
				// 'pdf' => array(
				// 	'label' => 'PDF',
				// 	'icon' => 'fa fa-file-pdf-o fa-lg',
				// 	'url' => 'Yii::app()->createUrl("finalReview/taxPdf/id/".$data->CPIId)',
				// 	'options' => array('target' => "_blank"),
				// ),
				'edit' => array(
					'label' => 'Edit',
					'icon' => 'fa fa-pencil-square-o fa-lg',
					'url' => 'Yii::app()->createUrl("customers/editEmployee/id/".$data->UserId)',
				),'update' => array(
					'label' => 'Send Notification',
					'icon' => 'fa fa-paper-plane fa-lg',
					'url' => 'Yii::app()->createUrl("customers/sendnotification/id/".$data->UserId)',
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
			</div>
	</div>	
		
		
		</div>
		
	</div>

</div>

<?php
// 		echo "<pre>";
// print_r($this->client_personalInformationStatusBar(21));
// echo "</pre>";
// exit;



function etinPadding($value) {

	if ($value != null) {
		$data = substr($value, -4);
		return str_pad($data, 17, "*", STR_PAD_LEFT);
	} else {
		return $value;
	}
}

function userStatus($userid){
		$user = User::model()->findByPk($userid);
		if(isset($user->status) && $user->status==1){
			return 'Active';
		}else{
			return 'Inactive';
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
	function changeToTaxYear(year){
		//alert(year);

		window.location = '<?php echo Yii::app()->request->baseUrl; ?>/index.php/customers/compliancedashboard?tax_year='+year;

	}
</script>

<style type="text/css">
	.filter-box{padding: 10px 0 30px;}
	.number-of-client1 .panel-body {
    height: 160px;
    text-align: CENTER;
    }
    .number-of-client1 .panel-body p{font-weight: bold;}
    .client-dashbord-space .panel-default>.panel-heading, .client-dashbord-space th{text-align: center;}
    .btn-download{margin-top: 57px;}
    .btn-reminder{font-size: 10px;margin-top: 4px;padding: 3px 5px;}
    #personal-information-grid_c4{color:#428bca !important;}
</style>








