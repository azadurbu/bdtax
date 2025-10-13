<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/review-page.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<style type="text/css">
a.btn {
	color: #fff !important;
}

a.btn:hover {
	/*color: #f00 !important;*/
}

</style>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>
<!-- FLASH MESSAGE -->
<div class="flash_alert">
    <?php if(Yii::app()->user->hasFlash('alert_success')) : ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=Yii::app()->user->getFlash('alert_success')?>
        </div>
    <?php endif; ?>
</div>
<!-- END - FLASH MESSAGE -->
<div id="content" class="dashbord-bg for-pdd">
		<div class="registration">

			<div class="dashboard-box"> 

				<div id="home-mid" class="reg-form">
                 
                    <?php 
			            if ($this->personalInformationStatusBar() >= 93) : 
			            //93% is to continue without ETIN
			        ?>
                    <div class="income-dashbord started-link started-link-margin-bottom">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/income/startup'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Income")?></a>
                    </div>
                    <?php endif?>
                    
					<div class="home_icon-box home_icon-1"></div>
					<h4><?=Yii::t('p_info',"Personal Information")?></h4>

					<div class="clearfix"></div>

					<div class="panel panel panel-success pannel-top ">
						<!-- Default panel contents -->
						<div class="panel-heading"><?=Yii::t('p_info',"E-TIN")?></div>
						<div class="panel-body">
                        <div class="col-md-11 personal_info">
							<h3 class="padding-bottom_reg-form"><?=Yii::t('p_info',"Your E-TIN")?></h3>
							<p class="result_p"><?php echo @$this->_decode($model->ETIN); ?></p>
                        </div>
                        <div class="col-md-1 edit-button">
                            <div id="btn-right">
								<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#etin" type="button" class="btn btn-success pull-right"><?=Yii::t('p_info',"Edit")?></a>		  </div>
							</div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<!-- Default panel contents -->
						<div class="panel-heading"><?=Yii::t('p_info',"Personal Information")?></div>
						<div class="panel-body">
                        <div class="col-md-11"> 
							<h3 class="padding-bottom_reg-form"><?=Yii::t('p_info',"Your full name")?></h3>
							<p class="result_p"><?php echo @$model->Name; ?></p>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your birth day")?></h3>
							<p class="result_p"> 
								<?php 
									if (isset($model->DOB) & $model->DOB != "0000-00-00") {
										echo date('d-m-Y',strtotime(@$model->DOB)); 
									}
									else {
										
									}
								?>
								
							</p>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your marital status")?></h3>

							<?php if (@$model->Status=='Married'){ ?>
							<div class="user_2"></div>

							<?php } else { ?>
							<div class="user_1"></div>
							<?php }  ?>
							<p class="result_p"> <?php echo Yii::t('p_info', @$model->Status); ?></p>
							<?php if($model->SpouseName!=null){ ?>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your spouse's name")?></h3>
							<p class="result_p"> <?php echo @$model->SpouseName; ?></p>
							<?php } ?>

							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your gender")?></h3>
							<p class="result_p"> <?php echo Yii::t('p_info',@$model->Gender); ?></p>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your residential status")?></h3>
							<p class="result_p"> <?php echo (@$model->ResidentialStatus=='Y')?'Resident':'Non-Resident'?></p>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info', "Your National ID")?></h3>
							<p class="result_p"><?php echo $this->_decode(@$model->NationalId); ?></p>
                       </div>   
                       <div class="col-md-1 edit-button">  
                            <div id="btn-right">
								<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#PIDetails-1" type="button" class="btn btn-success pull-right"><?=Yii::t('p_info',"Edit")?></a>
							</div>
                       </div>
						</div>
					</div>

					<div class="panel panel panel-success pannel-top ">
						<!-- Default panel contents -->
						<div class="panel-heading"><?=Yii::t('p_info',"Additional Personal Information")?></div>
						<div class="panel-body">
						<div class="col-md-11">  	
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your physical disability status")?></h3>
							<p class="result_p"> <?php echo Yii::t('p_info',@$model->Disability); ?></p>
							<?php if($model->FathersName!=null){ ?>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your father's name")?></h3>
							<p class="result_p"> <?php echo @$model->FathersName; ?></p>
							<?php } ?>

							<?php if($model->MothersName!=null){ ?>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your mother's name")?></h3>
							<p class="result_p"> <?php echo @$model->MothersName; ?></p>
							<?php } ?>

							<?php if($model->NoOfAdultInFamily!=null || $model->NoOfChildInFamily!=null){ ?>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Number of dependant children of the family")?></h3>
							<p class="result_p"><b><?=Yii::t('p_info',"Adult")?>:</b> <?php echo (($model->NoOfAdultInFamily != null) ? @$model->NoOfAdultInFamily : '0'); ?></p>
							<p class="result_p"><b><?=Yii::t('p_info',"Children")?>:</b> <?php echo (($model->NoOfChildInFamily != null) ?  @$model->NoOfChildInFamily: '0'); ?></p>
							<?php }?>

							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your employer's name and address")?></h3>
							<p class="result_p"> <?=($model->EmployerName!=null)?htmlentities(strip_tags($model->EmployerName)) : '<span class="muted">(empty)</span>' ; ?></p>
							<p class="result_p"> <?=($model->EmployerAddress!=null)?htmlentities(strip_tags($model->EmployerAddress)) : '<span class="muted">(empty)</span>' ; ?></p>
							<p class="result_p"> <?=($model->BusinessIdentificationNumber!=null)?htmlentities(strip_tags($model->BusinessIdentificationNumber)) : '<span class="muted">(empty)</span>' ; ?></p>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your Freedom Fighter status")?></h3>
							<p class="result_p"> <?php echo (@$model->FreedomFighter == 'Y') ? Yii::t('p_info',"YES"):Yii::t('p_info',"NO"); ?></p>

							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your government employee status")?></h3>
							<p class="result_p"> <?php echo (@$model->GovernmentEmployee == 'Y') ? Yii::t('p_info',"YES"):Yii::t('p_info',"NO"); ?></p>

							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your residential area")?></h3>
							<p class="result_p"> <?php echo ((@$model->AreaOfResidence == '1') ? Yii::t('p_info',"City Corporation Areas"):((@$model->AreaOfResidence == '2') ? 'District Town Areas':((@$model->AreaOfResidence == '3') ? 'Other Areas':''))); ?></p>

							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your tax zone")?></h3>
							<!-- <p class="result_p"> <b><?=Yii::t('p_info',"Circle code")?>:</b> <span id="CircleCode"><?=@$model->TaxZoneCircle->CircleCode?> -->
							<p class="result_p"> <b><?=Yii::t('p_info',"Circle code")?>:</b> <span id="CircleCode"><?=htmlentities(strip_tags(@$model->TaxesCircle))?>
							</p>
<!-- 							<p class="result_p"> 
								<b><?=Yii::t('p_info',"Circle name")?>:</b> <span id="CircleName"><?=@$model->TaxZoneCircle->CircleName?>
							</p> -->
							<p class="result_p"> 
								<!-- <b><?=Yii::t('p_info',"Zone code")?>:</b> <span id="ZoneName"><?=@$model->TaxZoneCircle->ZoneName?> -->
								<b><?=Yii::t('p_info',"Zone code")?>:</b> <span id="ZoneName"><?= htmlentities(strip_tags(@$model->TaxesZone))?>
							</p>
							<!-- <p class="result_p"> 
								<b><?=Yii::t('p_info',"Circle address")?>:</b> <span id="CircleAddress"><?=@$model->TaxZoneCircle->CircleAddress?>
							</p> -->

							<h3 class="padding-bottom_reg-form padding_top">
								<?php
								if(@$model->AddressSame == 0) {
									echo Yii::t('p_info',"Your present address");
								} else {
									echo Yii::t('p_info',"Your present and permanent address");
								}
								?>
							</h3>
							<p class="result_p">
								<?php echo htmlentities(strip_tags(@$model->PresentAddress)); ?>
								<?php 
								if($model->DivisionId != '') {
									echo ', ', Divisions::model()->findByPK($model->DivisionId)->Name;
								}
								if($model->DistrictId != '') {
									echo ', ', Districts::model()->findByPK($model->DistrictId)->name;
								}
								if($model->ZipCode != '') {
									echo ' - ', htmlentities(strip_tags(@$model->ZipCode));
								}
								?>
							</p>

							<?php if(@$model->AddressSame == 0) { ?>
							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your permanent address")?></h3>
							<p class="result_p">
								<?php echo htmlentities(strip_tags(@$model->PermanentAddress)); ?>
							</p>
							<?php } ?>

							<h3 class="padding-bottom_reg-form padding_top"><?=Yii::t('p_info',"Your Contact Details")?></h3>
							<p class="result_p"><b><?=Yii::t('p_info',"Contact No.")?>:</b>  <?=($model->Contact!=null)?htmlentities(strip_tags($model->Contact)) : '<span class="muted">(empty)</span>' ; ?></p>
							<p class="result_p"><b><?=Yii::t('p_info',"Email Address")?>:</b> <?=($model->Email!=null)?htmlentities(strip_tags($model->Email)) : '<span class="muted">(empty)</span>' ; ?></p>
                         </div>   
                            
                         <div class="col-md-1 edit-button">     
                         	<div id="btn-right">
								<a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#PIDetails-2" type="button" class="btn btn-success pull-right"><?=Yii::t('p_info',"Edit")?></a>
							</div>
                         </div>   
                            
						</div>
					</div>
                 	<?php 
			            if ($this->personalInformationStatusBar() >= 93) : 
			            //93% is to continue without ETIN
			        ?>
                    <div class="income-dashbord started-link common-margin-top">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/income/startup'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Income")?></a>
                    </div>
                    <?php endif?>
                    
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	<script type="text/javascript">
	var pi_url = "<?php echo Yii::app()->request->baseUrl; ?>/index.php/personalInformation/"
	</script>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/pi/pi.js?v=<?=$this->v?>"></script>