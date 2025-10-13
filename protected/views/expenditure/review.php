<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/review-page.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<?php
if($model->TotalTaxPaidLastYearConfirm == "Yes") {
	$TotalTaxPaid = $model->TotalTaxPaidLastYear;
}
elseif($model->TotalTaxPaidLastYearConfirm == "No") {
	$TotalTaxPaid = Yii::t("expense", "You chose No");
}
else {
	$TotalTaxPaid = Yii::t("expense", "Not answered yet");
}


$total = (double) $this->sum_of_particular_field($model, "PersonalFooding", "exp_personal_fooding") +
		// (double) $TotalTaxPaid +
		(double) $this->sum_of_particular_field($model, "Accommodation", "exp_accommodation") +
		(double) $this->sum_of_particular_field($model, "Transport", "exp_transport") +
		(double) $this->sum_of_particular_field($model, "OtherTransport", "exp_other_transport") +
		(double) $this->sum_of_particular_field($model, "ElectricityBill", "exp_electricity_bill") +
		(double) $this->sum_of_particular_field($model, "WasaBill", "exp_wasa_bill") +
		(double) $this->sum_of_particular_field($model, "GasBill", "exp_gas_bill") +
		(double) $this->sum_of_particular_field($model, "TelephoneBill", "exp_telephone_bill") +
		(double) $this->sum_of_particular_field($model, "OtherHousehold", "exp_other_household") +
		(double) $this->sum_of_particular_field($model, "ChildrenEducation", "exp_children_education") +
		(double) $this->sum_of_particular_field($model, "PersonalForeignTravel", "exp_personal_foreign_travel") +
		(double) $this->sum_of_particular_field($model, "FestivalOtherSpecial", "exp_festival_other_special")+
		(double) $this->sum_of_particular_field($model, "Donation", "exp_donation") +
		(double) $this->sum_of_particular_field($model, "OtherSpecial", "exp_other_special") +
		(double) $this->sum_of_particular_field($model, "Other", "exp_other") +
		(double) $this->sum_of_particular_field($model, "TaxAtSource", "exp_tax_at_source") +
		(double) $this->sum_of_particular_field($model, "SurchargeOther", "exp_surcharge_other")+
		(double) $this->sum_of_particular_field($model, "LossDeductions", "exp_loss_deductions")+
		(double) $this->sum_of_particular_field($model, "GiftDonationContribution", "exp_gift_donation_contribution");

$total = number_format(round($total, 2),2). Yii::t("expense", $this->currency);
?>
<style>
a.btn {
	color: #fff !important;
}

a.btn:hover {
	/*color: #f00 !important;*/
}

</style>
<div id="content" class="dashbord-bg for-pdd">


		<div class="registration">

			<div class="dashboard-box"> 

				<div id="home-mid" class="reg-form">

                   <!-- <div class="income-dashbord">
                        <h2><a href="<?//=Yii::app()->baseUrl.'/index.php/finalReview'?>"><?//=Yii::t("common", "Let's Get Started with Final Review")?></a></h2>
                    </div>-->
                    <div class="income-dashbord started-link started-link-margin-bottom">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/finalReview'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Final Review")?></a>
                    </div>
                    
					<div class="home_icon-box home_icon-4"></div>
					<h4><?=Yii::t("expense", "Expenses")?></h4>
					<!-- <h4><?=Yii::t("expense", "Total Amount")?> = <?=$total?> </h4> -->

					<div class="clearfix"></div>

					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Personal Or Food Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "PersonalFooding", "exp_personal_fooding") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "PersonalFooding", "exp_personal_fooding")."</span>":$this->sum_of_particular_field($model, "PersonalFooding", "exp_personal_fooding"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "PersonalFooding", "exp_personal_fooding")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "PersonalFooding", "exp_personal_fooding")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            
                          <div class="col-md-1 edit-button">  
							<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#personal_food_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
						</div>
					</div>
					<!-- <div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Total Tax Paid Last Year")?></h3>
                                <p class="result_p"><?=(($TotalTaxPaid == 'Not answered yet') ? "<span style='color:red'>".$TotalTaxPaid."</span>":$TotalTaxPaid.Yii::t("expense", $this->currency));?></p>
                            </div>
                          <div class="col-md-1 edit-button">
							<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#total_tax_paid_last_year" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                          </div>
						</div>
					</div> -->
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Accommodation Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "Accommodation", "exp_accommodation") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "Accommodation", "exp_accommodation")."</span>":$this->sum_of_particular_field($model, "Accommodation", "exp_accommodation"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "Accommodation", "exp_accommodation")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "Accommodation", "exp_accommodation")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
							</div>
                          <div class="col-md-1 edit-button">  
                            <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#accommodation_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                          </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Transport Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "Transport", "exp_transport") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "Transport", "exp_transport")."</span>":$this->sum_of_particular_field($model, "Transport", "exp_transport"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "Transport", "exp_transport")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "Transport", "exp_transport")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
							</div>
                          <div class="col-md-1 edit-button"> 
                            <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#transportation_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                          </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Other Transport Expneses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "OtherTransport", "exp_other_transport") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "OtherTransport", "exp_other_transport")."</span>":$this->sum_of_particular_field($model, "OtherTransport", "exp_other_transport"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "OtherTransport", "exp_other_transport")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "OtherTransport", "exp_other_transport")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>    
                        <div class="col-md-1 edit-button">
							<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#other_transportation_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                         </div>   
						</div>
					</div> 
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Electricity Bill")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "ElectricityBill", "exp_electricity_bill") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "ElectricityBill", "exp_electricity_bill")."</span>":$this->sum_of_particular_field($model, "ElectricityBill", "exp_electricity_bill"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "ElectricityBill", "exp_electricity_bill")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "ElectricityBill", "exp_electricity_bill")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
							</div>
                           <div class="col-md-1 edit-button">
                            <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#electricity_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                            </div>
						</div>
					</div> 
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Water Bill")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "WasaBill", "exp_wasa_bill") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "WasaBill", "exp_wasa_bill")."</span>":$this->sum_of_particular_field($model, "WasaBill", "exp_wasa_bill"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "WasaBill", "exp_wasa_bill")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "WasaBill", "exp_wasa_bill")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                           <div class="col-md-1 edit-button">     
								<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#water_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                           </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Gas Bill")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "GasBill", "exp_gas_bill") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "GasBill", "exp_gas_bill")."</span>":$this->sum_of_particular_field($model, "GasBill", "exp_gas_bill"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "GasBill", "exp_gas_bill")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "GasBill", "exp_gas_bill")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                          <div class="col-md-1 edit-button"> 
							<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#gas_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                          </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Telephone Bill")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "TelephoneBill", "exp_telephone_bill") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "TelephoneBill", "exp_telephone_bill")."</span>":$this->sum_of_particular_field($model, "TelephoneBill", "exp_telephone_bill"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "TelephoneBill", "exp_telephone_bill")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "TelephoneBill", "exp_telephone_bill")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                           <div class="col-md-1 edit-button">
							<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#telephone_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                           </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Other Household Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "OtherHousehold", "exp_other_household") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "OtherHousehold", "exp_other_household")."</span>":$this->sum_of_particular_field($model, "OtherHousehold", "exp_other_household"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "OtherHousehold", "exp_other_household")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "OtherHousehold", "exp_other_household")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                           <div class="col-md-1 edit-button">
							<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#other_household_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                           </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Education Expenses for Children")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "ChildrenEducation", "exp_children_education") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "ChildrenEducation", "exp_children_education")."</span>":$this->sum_of_particular_field($model, "ChildrenEducation", "exp_children_education"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "ChildrenEducation", "exp_children_education")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "ChildrenEducation", "exp_children_education")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                           <div class="col-md-1 edit-button"> 
								<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#child_edu_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                            </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Personal Foreign Travel Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "PersonalForeignTravel", "exp_personal_foreign_travel") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "PersonalForeignTravel", "exp_personal_foreign_travel")."</span>":$this->sum_of_particular_field($model, "PersonalForeignTravel", "exp_personal_foreign_travel"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "PersonalForeignTravel", "exp_personal_foreign_travel")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "PersonalForeignTravel", "exp_personal_foreign_travel")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>    
                        <div class="col-md-1 edit-button">
							<a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#foreign_travel_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
                         </div>   
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Festival Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "FestivalOtherSpecial", "exp_festival_other_special") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "FestivalOtherSpecial", "exp_festival_other_special")."</span>":$this->sum_of_particular_field($model, "FestivalOtherSpecial", "exp_festival_other_special"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "FestivalOtherSpecial", "exp_festival_other_special")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "FestivalOtherSpecial", "exp_festival_other_special")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#festival_other_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Donation")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "Donation", "exp_donation") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "Donation", "exp_donation")."</span>":$this->sum_of_particular_field($model, "Donation", "exp_donation"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "Donation", "exp_donation")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "Donation", "exp_donation")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#donation_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Other Special Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "OtherSpecial", "exp_other_special") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "OtherSpecial", "exp_other_special")."</span>":$this->sum_of_particular_field($model, "OtherSpecial", "exp_other_special"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "OtherSpecial", "exp_other_special")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "OtherSpecial", "exp_other_special")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#donation_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Other Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "Other", "exp_other") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "Other", "exp_other")."</span>":$this->sum_of_particular_field($model, "Other", "exp_other"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "Other", "exp_other")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "Other", "exp_other")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#other_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Tax At Source Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "TaxAtSource", "exp_tax_at_source") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "TaxAtSource", "exp_tax_at_source")."</span>":$this->sum_of_particular_field($model, "TaxAtSource", "exp_tax_at_source"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "TaxAtSource", "exp_tax_at_source")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "TaxAtSource", "exp_tax_at_source")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#tax_at_source_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Surcharge And Other Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "SurchargeOther", "exp_surcharge_other") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "SurchargeOther", "exp_surcharge_other")."</span>":$this->sum_of_particular_field($model, "SurchargeOther", "exp_surcharge_other"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "SurchargeOther", "exp_surcharge_other")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "SurchargeOther", "exp_surcharge_other")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#surcharge_other_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Loss, Deductions, Expenses")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "LossDeductions", "exp_loss_deductions") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "LossDeductions", "exp_loss_deductions")."</span>":$this->sum_of_particular_field($model, "LossDeductions", "exp_loss_deductions"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "LossDeductions", "exp_loss_deductions")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "LossDeductions", "exp_loss_deductions")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#loss_deductions_expenses" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">   
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Gift, donation and contribution")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "GiftDonationContribution", "exp_gift_donation_contribution") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "GiftDonationContribution", "exp_gift_donation_contribution")."</span>":$this->sum_of_particular_field($model, "GiftDonationContribution", "exp_gift_donation_contribution"));?>
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "GiftDonationContribution", "exp_gift_donation_contribution")) != utf8_encode(Yii::t("expense", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "GiftDonationContribution", "exp_gift_donation_contribution")) != utf8_encode(Yii::t("expense", "You chose No"))){
						                echo Yii::t("expense", $this->currency);
						            }
						          ?>

                                </p>
                            </div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/entry#gift_donation_contribution" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>		
                             </div>
						</div>
					</div>

                      <!--  <div class="income-dashbord">
                            <h2><a href="<?//=Yii::app()->baseUrl.'/index.php/finalReview'?>"><?//=Yii::t("common", "Let's Get Started with Final Review")?></a></h2>
                        </div>-->
				</div>
                <div class="income-dashbord started-link common-margin-top">
                        	<a href="<?=Yii::app()->baseUrl.'/index.php/finalReview'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Final Review")?></a>
                </div>
				<div class="clearfix"></div>
			</div>


		</div>

	</div>

<script>
	expenditure_url="<?php echo Yii::app()->request->baseUrl; ?>/index.php/expenditure/";
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/expenditure/create.js?v=<?=$this->v?>"></script>