<?php


$total = 	(double) $this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property") +
(double) $this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans") +
(double) $this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans") +
(double) $this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan");

$total = round($total, 2);
?>
<style>
a.btn {
	color: #fff !important;
}

a.btn:hover {
	color: #f00 !important;
}

</style>
<div id="content" class="dashbord-bg for-pdd">

		<div class="registration">

			<div class="dashboard-box"> 

				<div id="home-mid" class="reg-form">

					<div class="home_icon-box home_icon-4"></div>
					<h4>Liabilities</h4>
					<h4>Total Amount = <?=$total?> </h4>

					<div class="clearfix"></div>

					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
							<h3 class="padding-bottom_reg-form"><?=Yii::t("expense", " Mortgages")?></h3>
							<p class="result_p"><?=$this->sum_of_particular_field($model, "MortgagesOnProperty", "lia_mortgages_on_property")?></p>
							<a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#mortgages_on_property" type="button" class="btn btn-success pull-right">Edit</a>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
							<h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Unsecured Loans")?></h3>
							<p class="result_p"><?=$this->sum_of_particular_field($model, "UnsecuredLoans", "lia_unsecured_loans")?></p>
							<a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#unsecured_loans" type="button" class="btn btn-success pull-right">Edit</a>
						</div>
					</div>
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
							<h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Bank Loans")?></h3>
							<p class="result_p"><?=$this->sum_of_particular_field($model, "BankLoans", "lia_bank_loans")?></p>
							<a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#bank_loans" type="button" class="btn btn-success pull-right">Edit</a>
						</div>
					</div> 
					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
							<h3 class="padding-bottom_reg-form"><?=Yii::t("expense", "Others Liabilities")?></h3>
							<p class="result_p"><?=$this->sum_of_particular_field($model, "OthersLoan", "lia_others_loan")?></p>
							<a href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/entry#others_loan" type="button" class="btn btn-success pull-right">Edit</a>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>


		</div>

	</div>
