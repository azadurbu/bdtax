<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/review-page.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<?php
$total = 	(double) $this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property") +
(double) $this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans") +
(double) $this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans") +
(double) $this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan");

$total = number_format(round($total, 2),2). Yii::t("income", $this->currency);
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

                        <!--<div class="income-dashbord">
                            <h2><a href="<?//=Yii::app()->baseUrl.'/index.php/expenditure/entry'?>"><?//=Yii::t("common", "Let's Get Started with Expenses")?></a></h2>
                        </div>-->
                        
                    <div class="income-dashbord started-link started-link-margin-bottom">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/expenditure/startup'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Expenses")?></a>
                    </div>

					<div class="home_icon-box home_icon-4"></div>
					<h4><?=Yii::t('dashboard', 'Liabilities')?></h4>
					<!-- <h4><?=Yii::t("liability", "Total Amount") ?> = <?=$total?> </h4> -->

					<div class="clearfix"></div>

					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                        <div class="col-md-11">    
							<h3 class="padding-bottom_reg-form"><?=Yii::t("liability", "Mortgages") ?></h3>
							<p class="result_p"><?=(($this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property")."</span>":$this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property"));?>
								
							<?php 
					            if(utf8_encode($this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property")) != utf8_encode(Yii::t("liability", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property")) != utf8_encode(Yii::t("liability", "You chose No"))){
					                echo Yii::t("income", $this->currency);
					            }
					          ?>
							</p>
                        </div>
                        <div class="col-md-1 edit-button">
							<a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#mortgages_on_property" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>			</div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("liability", "Unsecured Loans")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans")."</span>":$this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans"));?>
                                	
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans")) != utf8_encode(Yii::t("liability", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans")) != utf8_encode(Yii::t("liability", "You chose No"))){
						                echo Yii::t("income", $this->currency);
						            }
						          ?>
                                </p>
                            </div>
                            
                           <div class="col-md-1 edit-button"> 
								<a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#unsecured_loans" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>				</div>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("liability", "Bank Loans")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans")."</span>":$this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans"));?>
                                	
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans")) != utf8_encode(Yii::t("liability", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans")) != utf8_encode(Yii::t("liability", "You chose No"))){
						                echo Yii::t("income", $this->currency);
						            }
						          ?>
                                </p>
							</div>
                            <div class="col-md-1 edit-button">
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#bank_loans" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>				</div>
						</div>
					</div> 
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>                            
                            <div class="col-md-11">
                                <h3 class="padding-bottom_reg-form"><?=Yii::t("liability", "Other Liabilities")?></h3>
                                <p class="result_p"><?=(($this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan")."</span>":$this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan"));?>
                                	
                                <?php 
						            if(utf8_encode($this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan")) != utf8_encode(Yii::t("liability", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan")) != utf8_encode(Yii::t("liability", "You chose No"))){
						                echo Yii::t("income", $this->currency);
						            }
						          ?>
                                </p>
                            </div>

							<div class="col-md-1 edit-button">	
                                <a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#others_loan" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>				</div>
						</div>
					</div>
                     <div class="income-dashbord started-link common-margin-top">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/expenditure/startup'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Expenses")?></a>
                </div>
				</div>

               <!-- <div class="income-dashbord">
                    <h2><a href="<?//=Yii::app()->baseUrl.'/index.php/expenditure/entry'?>"><?//=Yii::t("common", "Let's Get Started with Expenses")?></a></h2>
                </div>-->

				<div class="clearfix"></div>
			</div>


		</div>

	</div>
