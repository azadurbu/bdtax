    <style type="text/css">
    	* {
    		font-family:"Times New Roman";
    	}
    	body {
    		/*font-style:normal;*/
    		font-weight:bold;
    		font-size:13px;
    		font-family:"Times New Roman";
    	}
    	.page2_table1 {
    		font-weight:bold;
    		font-size:11px;
    		font-family:"Times New Roman";
    		line-height:5px;
    	}

    	tr, tr td {
    		padding:4px 1px;
    		margin-top:0px;
    		margin-bottom:0px;
       /* margin-left:100px;
       margin-right:60px;*/
       line-height:5px;
   }

   tr td {
   	line-height:5px;
   }

   .FOOTER{
   	text-align:center;
   	font-weight:bold;
   	font-size:large;
   	color: #61331C;
   	position:relative;
     /* bottom: -10 px;
     right: -10 px;*/
 }



  /* #temp_id
  {
     border-collapse:collapse;
  }
  #temp_id td
  {
     border: 1px solid red;
     outline:none;
 }*/
</style>

<?php
Yii::import('application.controllers.AssetsController');
Yii::import('application.controllers.ExpenditureController');
Yii::import('application.controllers.LiabilitiesController');
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-family:'Times New Roman';">
	<tbody><tr>
		<td valign="top" align="center">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td width="85%" valign="middle" align="center">
						<strong><b>FORM OF RETURN OF INCOME UNDER THE INCOME TAX<br>
							ORDINANCE, 1984 (XXXVI OF 1984)</b></strong>
						</td>
						<td width="15%" valign="middle" align="right">
							<table width="80" cellpadding="5" border="1" align="right">
								<tbody><tr>
									<td valign="middle" align="center"><strong>IT-11GA</strong></td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="middle" align="center">
			<table width="350" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td valign="top" align="center" style="color:#FFFFFF; background-color:#000000;">
						FOR INDIVIDUAL AND OTHER TAXPAYERS<br>
						<strong>(OTHER THAN COMPANY)</strong>
					</td>
				</tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td valign="top" align="left">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td width="80%" align="left">
						<table width="210" cellspacing="0" cellpadding="0" border="1">
							<tbody><tr>
								<td width="216" valign="top" align="center">
									<strong>Be a Respectable Taxpayer<br>
										Submit return in due time<br>Avoid penalty</strong>
									</td>
								</tr>
							</tbody></table>
							<br>Put the tick (<img border="0" src="<?php echo Yii::app()->baseUrl ?>/img/tick.gif">) mark wherever applicable<br>
							<table width="300" cellspacing="5" cellpadding="4" border="0" height="30">
								<tbody>
									<tr>
										<td width="28%" valign="middle" align="center" style="border:1px solid #000"><strong>Self</strong></td>
										<td width="41%" valign="middle" align="center" style="border:1px solid #000"><strong>Universal Self</strong></td>
										<td width="31%" valign="middle" align="center" style="border:1px solid #000"><strong>Normal</strong></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td width="20%" valign="top" align="left">
							<table width="125" cellspacing="0" cellpadding="0" border="1" height="110">
								<tbody>
									<tr>
										<td valign="top" align="center"><br><br><strong>Photograph of the Assessee</strong><br>[to be attested on the photograph]<br></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody></table>

			</td>
		</tr>
	</tbody>
</table>
<!-- #####################Table Start############################# -->

<table width="100%" cellspacing="0" cellpadding="0" border="1">
	<tbody>
		<tr border="1">
			<td valign="top" align="center" >
				<table  style="border:1px #000 solid; padding:0px 0px 0px 0px;" width="100%" cellspacing="0" cellpadding="br6">
					<tbody><tr>
						<td valign="middle" align="left">1. Name of the Assessee: <u><?php echo @$personal_info_model->Name; ?></u></td>
					</tr>
					<tr>
						<td valign="middle" align="left">2. National ID No (if any): <?php if(@$personal_info_model->NationalId != 0){echo @$this->_decode($personal_info_model->NationalId);} ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
							<tbody><tr>
								<td width="25%" valign="middle" align="left">3. UTIN (if any):</td>
								<td width="75%" valign="middle" align="left"></td>
							</tr>
						</tbody></table>
					</td>
				</tr>
				<?php $etin = str_split(@$personal_info_model->ETIN);?>
				<tr>
					<td valign="middle" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody>
							<tr>
								<td width="10%" valign="middle" align="left">4. Tin:</td>
								<td width="53%" valign="middle" align="left"><table width="290" cellspacing="0" cellpadding="2" border="1"><tbody><tr>
									<td valign="middle" align="center"><?php echo @$etin[0]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[1]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[2]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[3]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[4]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[5]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[6]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[7]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[8]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[9]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[10]; ?></td>
									<td valign="middle" align="center"><?php echo @$etin[11]; ?></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody></table>
		</td>
	</tr>

	<tr>
		<td valign="middle" align="left">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td width="45%">5. (a) Circle: <u><?php echo @$personal_info_model->TaxesCircle; ?></u></td>
					<td width="45%">   (b) Taxes Zone: <u><?php echo @$personal_info_model->TaxesZone; ?></u></td>
				</tr>
				<tr>
					<td width="45%">6. Assessment Year: <u><?php echo $this->taxYear(); ?></u></td>
					<td width="45%">&nbsp;7. Residential Status: <u><?php echo (@$personal_info_model->ResidentialStatus == 'Y') ? 'Resident' : 'Non-resident'; ?></u></td>
				</tr>
			</tbody></table>
		</td>
	</tr>
	<tr>
		<td valign="middle" align="left">8. Status: <u>Individual</u></td>
	</tr>
	<tr>
		<td valign="middle" align="left">9. Name of the employer/business (where applicable): <u><?php echo @$personal_info_model->EmployerName ?></u></td>
	</tr>
	<tr>
		<td valign="middle" align="left">10. Wife/Husbands Name (if assessee, please mention TIN): <u><?php echo @$personal_info_model->SpouseName ?>, <?php echo @$personal_info_model->SpouseETIN ?></u></td>
	</tr>
	<tr>
		<td valign="middle" align="left">11. Fathers Name: <u><?php echo @$personal_info_model->FathersName ?></u></td>
	</tr>
	<tr>
		<td valign="middle" align="left">12. Mothers Name: <u><?php echo @$personal_info_model->MothersName ?></u></td>
	</tr>
	<tr>
		<td valign="middle" align="left">
			<?php
$dob = $personal_info_model->DOB;
$dateList = explode('-', $dob);
$year = str_split($dateList[0]);
$month = str_split($dateList[1]);
$day = str_split($dateList[2]);
?>
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody>
					<tr>
						<td width="47%" valign="middle" align="left">13. Date of Birth (in case of individual):</td>
						<td width="53%" valign="middle" align="left"><table width="290" cellspacing="0" cellpadding="2" border="1"><tbody><tr>
							<td valign="middle" align="center"><?php echo @$day[0] ?></td>
							<td valign="middle" align="center"><?php echo @$day[1] ?></td>
							<td valign="middle" align="center"><?php echo @$month[0] ?></td>
							<td valign="middle" align="center"><?php echo @$month[1] ?></td>
							<td valign="middle" align="center"><?php echo @$year[0] ?></td>
							<td valign="middle" align="center"><?php echo @$year[1] ?></td>
							<td valign="middle" align="center"><?php echo @$year[2] ?></td>
							<td valign="middle" align="center"><?php echo @$year[3] ?></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody></table>
</td>
</tr>
<tr>
	<td valign="middle" align="left" height="255">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody><tr>
				<td width="30%" valign="top" align="left">14. Address (a) Present:</td>
				<td width="70%" valign="top" align="left">
					<strong>
						<?php echo @$personal_info_model->PresentAddress; ?><br/>
						<?php echo @$personal_info_model->Area; ?><br/>
					</strong>
					<strong>
						<?php if (@$personal_info_model->ZipCode) {echo 'Post Code: ' . @$personal_info_model->ZipCode;} else {echo "<br>";}
?>
					</strong>
				</td>
			</tr>
			<tr>
				<td width="30%" valign="top" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(b) Permanent:</td>
				<td width="70%" valign="top" align="left"><strong>
					<?php if ($personal_info_model->AddressSame == '1') {
	?>
						<strong>
							<?php echo @$personal_info_model->PresentAddress; ?><br/>
							<?php echo @$personal_info_model->Area; ?><br/>
						</strong>
						<strong>
							<?php if (@$personal_info_model->ZipCode) {echo 'Post Code: ' . @$personal_info_model->ZipCode;}
	?>
						</strong>
						<?php } else {?>
						<strong>
							<?php echo @$personal_info_model->PermanentAddress; ?>
						</strong>
						<?php }
?>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
<tr>
	<td valign="middle" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody>
			<tr>
				<td width="58%" valign="top" align="left">15. Telephone: Office/Business <u><?php echo @$personal_info_model->PhoneBusiness ?></u></td>
				<td width="42%" valign="top" align="left">Residential: <u><?php echo @$personal_info_model->PhoneResidential ?></u></td>
			</tr>
		</tbody>
	</table>
</td>
</tr>
<tr>
	<td valign="middle" align="left">16. VAT Registration Number (if any): </td>
</tr>
</tbody></table>
</td>
</tr>

<br />
<br />
</tbody>
</table>
<!--############################PPPHHHPPP###CCCOOODDDEEE##################################################-->
<?php
$totalIncomeSalaries = IncomeSalaries::model()->find(array('select' => ' SUM(NetTaxableIncome) as SumTaxableIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));
$totalTaxWaiver = IncomeSalaries::model()->find(array('select' => ' SUM(NetTaxWaiver) as NetTaxWaiver', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));
$totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array('select' => ' SUM(NetIncome) as SumRentalIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));
$totalIncomeShareProfit = IncomeShareProfit::model()->find(array('select' => ' SUM(NetValueOfShare) as SumValueOfShare', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));

$IncomeOtherSourceData = IncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$income_model->IncomeId));
$TotalIncomeOtherSource = (@$IncomeOtherSourceData->InterestIncome+@$IncomeOtherSourceData->DividendIncome+@$IncomeOtherSourceData->WinningsIncome+@$IncomeOtherSourceData->OthersIncome);

?>

<?php
$IncomeTaxRebateData = IncomeTaxRebate::model()->find('IncomeId=:data', array(':data' => @$income_model->IncomeId));

$TotalIncomeTaxRebate = (@$IncomeTaxRebateData->LifeInsurancePremium + @$IncomeTaxRebateData->ProvidentFund + @$IncomeTaxRebateData->SCECProvidentFund + @$IncomeTaxRebateData->SuperAnnuationFund + @$IncomeTaxRebateData->InvestInStockOrShare + @$IncomeTaxRebateData->DepositPensionScheme + @$IncomeTaxRebateData->BenevolentFund + @$IncomeTaxRebateData->ZakatFund + @$IncomeTaxRebateData->Computer + @$IncomeTaxRebateData->Laptop + @$IncomeTaxRebateData->SavingsCertificates + @$IncomeTaxRebateData->BangladeshGovtTreasuryBond + @$IncomeTaxRebateData->DonationNLInstitutionFON + @$IncomeTaxRebateData->DonationCharityHospitalNBR + @$IncomeTaxRebateData->DonationOrganizationRetardPeople + @$IncomeTaxRebateData->ContributionNLInstituionLW + @$IncomeTaxRebateData->ContributionLiberationWarMuseum + @$IncomeTaxRebateData->ContributionAgaKhanDN + @$IncomeTaxRebateData->ContributionAsiaticSocietyBd + @$IncomeTaxRebateData->DonationICDDRB + @$IncomeTaxRebateData->DotationCRP + @$IncomeTaxRebateData->DonationEduInstitutionGov + @$IncomeTaxRebateData->ContributionAhsaniaMissionCancerHospital);

?>

<!--  -->
<?php //$html2pdf->WriteHTML('<pagebreak/>'); ?>
<!-- #####################Second Page Start############################# -->

<table width="635" cellspacing="0" cellpadding="0" border="0" >
	<tbody>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
<!--<tr>
      <td valign="top" align="center">&nbsp;</td>
    </tr>
     <tr>
      <td valign="top" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" align="center">&nbsp;</td>
  </tr> -->
  <tr>
  	<td valign="top" align="center">
  		<u><strong>Statement of income of the Assessee</strong></u><br>Statement of income during the income year ended on 30th June, <?php $Endyear = explode('-', $this->taxYear());
echo $Endyear[0];?>.
  	</td>
  </tr>
  <tr>
  	<td valign="top" align="center">
  		<table cellspacing="0" cellpadding="0" border="1" style="font-family:'Times New Roman';">
  			<tbody><tr>
  				<td width="15%" valign="top" align="center"><strong>Serial no.</strong></td>
  				<td width="68%" valign="top" align="center"><strong>Heads of Income</strong></td>
  				<td width="17%" valign="top" align="center"><strong>Amount in Taka</strong></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">1</td>
  				<td valign="middle" align="left">Salaries : u/s 21 (as per schedule 1)</td>
  				<td valign="middle" align="right"><?php echo ($totalIncomeSalaries->SumTaxableIncome == NULL) ? "" : $totalIncomeSalaries->SumTaxableIncome; ?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">2</td>
  				<td valign="middle" align="left">Interest on Securities : u/s 22</td>
  				<td valign="middle" align="right"><?php echo @$this->totalOutputMain('InterestOnSecurities'); ?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">3</td>
  				<td valign="middle" align="left">Income from house property : u/s 24 (as per schedule 2) </td>
  				<td valign="middle" align="right"><?php echo ($totalIncomeHouseProperties->SumRentalIncome == NULL) ? "" : $totalIncomeHouseProperties->SumRentalIncome; ?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">4</td>
  				<td valign="middle" align="left">Agricultural income : u/s 26</td>
  				<td valign="middle" align="right"><?php echo @$this->totalOutputMain('IncomeAgriculture'); ?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">5</td>
  				<td valign="middle" align="left">Income from business or profession : u/s 28</td>
  				<td valign="middle" align="right">
  				<?php 
  					$Business82CTotal = @$income_82c->ContractorIncome_1 + @$income_82c->ClearingAndForwardingIncome_1 + @$income_82c->TravelAgentIncome_1 + @$income_82c->ImporterTaxCollection_1 + @$income_82c->KnitWovenExportIncome_1 + @$income_82c->OtherThanKnitWovenExportIncome_1;
  					echo (@$this->totalOutputMain('IncomeBusinessOrProfession') + $Business82CTotal); 

  				?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">6</td>
  				<td valign="middle" align="left">Share of profit in a firm : </td>
  				<td valign="middle" align="right">
	  				<?php 
	  					/*echo ($totalIncomeShareProfit->SumValueOfShare == NULL) ? "" : $totalIncomeShareProfit->SumValueOfShare;*/ 
	  					echo @$this->totalOutputMain('IncomeShareProfit');
	  				?>
  				</td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">7</td>
  				<td valign="middle" align="left">Income of the spouse or minor child as applicable : u/s 43(4)</td>
  				<td valign="middle" align="right"><?php echo @$this->totalOutputMain('IncomeSpouseOrChild'); ?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">8</td>
  				<td valign="middle" align="left">Capital Gains : u/s 31</td>
  				<td valign="middle" align="right"><?php echo (@$this->totalOutputMain('IncomeCapitalGains') + @$income_82c->PropertySaleIncome_1); ?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">9</td>
  				<td valign="middle" align="left">Income from other source : u/s 33</td>
  				<td valign="middle" align="right">
  					<?php 
  						$OtherSource82CTotal = @$income_82c->RoyaltyIncome_1 + @$income_82c->SavingInstrumentInterestIncome_1 + @$income_82c->ExportCashSubsidyIncome_1 + @$income_82c->SavingAndFixedDepositInterestIncome_1 + @$income_82c->LotteryIncome_1;
  						echo (@$this->totalOutputMain('IncomeOtherSource') + $OtherSource82CTotal); 
  					?>
  				</td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">10</td>
  				<td valign="middle" align="left">Total (serial no. 1 to 9)</td>
  				<td valign="middle" align="right"><?php echo $totalIncome = $this->totalIncome(Yii::app()->user->CPIId); ?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">11</td>
  				<td valign="middle" align="left">Foreign Income:</td>
  				<td valign="middle" align="right">
  					<?php 
  						//echo ($income_model->ForeignIncome == NULL) ? "" : $income_model->ForeignIncome; 
  						echo @$this->totalOutputMain('ForeignIncome');
  					?>
  				</td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">12</td>
  				<td valign="middle" align="left">Total income (serial no. 10 and 11)</td>
  				<td valign="middle" align="right"><?php echo ($totalIncome = $this->totalIncome(Yii::app()->user->CPIId) + @$this->totalOutputMain('ForeignIncome')); ?></td>
  			</tr>
  			<tr>
  				<?php 
  					$PayableTax = $this->PayableTax(Yii::app()->user->CPIId);
  				?>
  				<td valign="middle" align="center">13</td>
  				<td valign="middle" align="left">Tax leviable on total income</td>
  				<td valign="middle" align="right"><?=$PayableTax?></td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">14</td>
  				<td valign="middle" align="left">Tax rebate: u/s 44(2)(b)(as per schedule 3)</td>
  				<td valign="middle" align="right">
	  				<?php 
	  					echo round($this->RebateAmount()); 
	  					//echo round (@$income_model->IncomeTaxRebateTotal) ;
	  				?>
  				</td>
  			</tr>
  			<tr>
  				<?php
  					$surCharge = $this->surCharge(($PayableTax - $this->RebateAmount()));
  				?>
  				<td valign="middle" align="center">15</td>
  				<td valign="middle" align="left">Tax payable (difference between serial no. 13 and 14 + Surcharge = <?=$surCharge['surchargeAmount']?>) </td>
  				<td valign="middle" align="right">
  					<?php
						echo $GrandTotalPayableTax = round($this->netPayableTax(Yii::app()->user->CPIId));

						// if ($GrandTotalPayableTax <= 0) {
						// 	$CPIInfo = $this->loadCPIInfo(Yii::app()->user->CPIId);

						// 	if ($CPIInfo->AreaOfResidence == 1) {
						// 		$GrandTotalPayableTax = 3000;
						// 	} elseif ($CPIInfo->AreaOfResidence == 2) {

						// 		$GrandTotalPayableTax = 2000;
						// 	} elseif ($CPIInfo->AreaOfResidence == 1) {

						// 		$GrandTotalPayableTax = 1000;
						// 	}

						// }

						// echo ($GrandTotalPayableTax > 0) ? $GrandTotalPayableTax : '';

						?>
  				</td>
  			</tr>
  			<tr>
  				<td valign="middle" align="center">16</td>
  				<td valign="middle" align="left" >


  					<table cellspacing="0" cellpadding="0" width="100%" height="100%" border="1">

  						<tr>
  							<td width="100%" colspan="2">Tax Payments:</td>

  						</tr>
  						<tr>
  							<td width="85%">(a)  Tax deducted/collected at source <br />
  								(Please attach supporting documents/statement)</td>
  								<td width="15%">Tk
  									<?php
  										// echo 'dsafasdfgsdafadsfadgfasdgufgasdfgsadfdsagfasdgfads';
  									 // var_dump($income_model);die; //echo ($income_model->IncomeTaxDeductedAtSource >0) ? $income_model->IncomeTaxDeductedAtSource : ''; ?>
  									<?php 
  										// echo ($this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource') == NULL) ? "" : $this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource'); 
  										echo @$this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource');
  									?>
  								</td>
  							</tr>
  							<tr>
  								<td width="85%">(b)  Advance tax u/s 64/68 (Please attach challan )</td>
  								<td width="15%">Tk 
  									<?php
  										// echo ($income_model->IncomeTaxInAdvance == NULL) ? "" : $income_model->IncomeTaxInAdvance; 
  										echo @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance');
  									?>
  								</td>
  							</tr>
  							<tr>
  								<td width="85%">(c)  Tax paid on the basis of this return (u/s 74)<br />
  									(Please attach challan/pay order/bank draft/cheque)</td>
  									<td width="15%">Tk 
  										<?php
  											// echo ($income_model->TaxPaidOnReturn > 0) ? $income_model->TaxPaidOnReturn : '';
  											echo $total16c = ($GrandTotalPayableTax - (@$this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource') + @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance') + @$income_model->AdjustmentTaxRefund));
  										?>
  									</td>
  								</tr>
  								<tr>
  									<td width="85%">(d)  Adjustment of Tax Refund (if any)</td>
  									<td width="15%">Tk 
	  									<?php 
	  										// echo ($income_model->AdjustmentTaxRefund > 0) ? $income_model->AdjustmentTaxRefund : ''; 
	  										echo @$income_model->AdjustmentTaxRefund;
	  									?>
  									</td>
  								</tr>
  								<?php $totalAdjustment = ($this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource') + $income_model->IncomeTaxInAdvance + $income_model->TaxPaidOnReturn + $income_model->AdjustmentTaxRefund);?>

  								<tr>
  									<td width="100%" align="right" colspan="2">Total of (a) (b) (c) (d)</td>
  								</tr>

  							</table>

  						</td>
  						<td valign="bottom" align="right" border="1" >
  						<?php 
  							// echo ($totalAdjustment > 0) ? $totalAdjustment : '';
  							echo $total16 = (
	  							@$this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource')+
	  							@$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance')+
	  							@$total16c+
	  							@$income_model->AdjustmentTaxRefund
  							);
  						?></td>
  					</tr>

  					<tr>
  						<td valign="middle" align="center">17</td>
  						<td valign="middle" align="left">Difference between serial no. 15 and 16 (if any)</td>
  						<td valign="middle" align="right">
  						<?php
							// echo ($GrandTotalPayableTax - $totalAdjustment);
							echo ($total16-$GrandTotalPayableTax);
						?>
  						</td>
  					</tr>
  					<tr>
  						<td valign="middle" align="center">18</td>
  						<td valign="middle" align="left">Tax exempted and Tax free income</td>
  						<td valign="middle" align="right">
  							<?php 
  								// echo ($totalTaxWaiver->NetTaxWaiver == NULL) ? "" : $totalTaxWaiver->NetTaxWaiver;
  								echo $this->totalExemptedValue();
  							?>
  						</td>
  					</tr>
  					<tr>
  						<td valign="middle" align="center">19</td>
  						<td valign="middle" align="left">Income tax paid in the last assessment year </td>
  						<td valign="middle" align="right"><?php //echo ($GrandTotalPayableTax >0)? $GrandTotalPayableTax : ''; ?>
  						</td>

  					</tr>
  				</tbody></table>
  			</td>
  		</tr>
  		<tr>
  			<td valign="top" align="left">
  				<table width="100%" cellspacing="0" cellpadding="0" border="0">
  					<tbody><tr>
  						<td valign="top" align="left" style="width:40%;"><strong><em>*If  needed, please use separate sheet</em></strong></td>
  						<td valign="top" align="right" style="width:60%;"><strong></strong></td>
  					</tr>
  				</tbody></table>
  			</td>
  		</tr>
<!--     <tr>
      <td valign="top" align="center">&nbsp;</td>
  </tr> -->
  <tr>
  	<td valign="top" align="center"><u><strong>Verification</strong></u></td>
  </tr>
  <tr>
  	<td valign="top" align="left">I  <?php echo @$personal_info_model->Name; ?>   father/husband  <?php echo @$personal_info_model->FathersName ?>                    UTIN/TIN:   <?php echo @$personal_info_model->ETIN; ?> solemnly   declare that to the best of my knowledge and                  belief the information given in this return and statements   and documents annexed herewith is correct and complete.<br><br>
  		Place: .........................<br>
  		Date : <?php echo date('d-m-Y'); ?></td>
  	</tr>
<!--       <tr>
        <td valign="top" align="center">&nbsp;</td>
    </tr> -->
    <tr>
    	<td valign="top" align="right">
    		Signature<br>
    		<?php echo @$personal_info_model->Name; ?><br>
    		(Name in block letters)<br>
    		Designation and<br>
    		Seal (for other than individual)
    	</td>
    </tr>
    <tr>
    	<td valign="top" align="center">&nbsp;</td>
    </tr>

</tbody>
</table>
<br />
<br />
<br />
<br />
<!-- #####################Third Page Start############################# -->

<table width="635" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td valign="top" align="center"><strong>SCHEDULES SHOWING DETAILS OF INCOME</strong></td>
		</tr>
		<tr>
			<td valign="top" align="center">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody><tr>
						<td width="60%" valign="middle" align="left" style="font-size: 12px;"><strong>Name of the Assessee:</strong> <?php echo @$personal_info_model->Name; ?></td>
						<td width="40%" valign="middle" align="right">
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody><tr>
									<td width="15%" valign="middle" align="left"><strong>TIN: </strong></td>
									<td width="85%" valign="middle" align="right">
										<table width="290" cellspacing="0" cellpadding="2" border="1"><tbody><tr>
											<td valign="middle" align="center"><?php echo @$etin[0]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[1]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[2]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[3]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[4]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[5]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[6]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[7]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[8]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[9]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[10]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[11]; ?></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
		</tbody></table>
	</td>
</tr>
<tr>
	<td valign="top" align="center"><strong><u>Schedule-1 (Salaries)</u></strong></td>
</tr>
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
<tr>
	<td valign="top" align="center">

		<?php if ($personal_info_model->GovernmentEmployee == 'Y') {

	$this->renderPartial('_incomeSalaries_public_PDF', array('income_salaries_model' => $income_salaries_model));
} else {
	$this->renderPartial('_incomeSalaries_private_PDF', array('income_salaries_model' => $income_salaries_model));
}
?>

	</td>
</tr>
<tr>
	<td valign="top" align="center"><br><br></td>
</tr>
<tr>
	<td valign="top" align="center"><strong><u>Schedule-2 (House Property income)</u></strong></td>
</tr>
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
<tr>
	<td valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="2" border="1">
		<tbody><tr>
			<td width="35%" valign="top" align="center">Location and description of property</td>
			<td width="35%" valign="top" align="center">Particulars</td>
			<td width="15%" valign="top" align="center"></td>
			<td width="15%" valign="top" align="center"></td>
		</tr>
		<tr>
			<td valign="top" align="left" rowspan="11"></td>
			<td valign="middle" align="left" colspan="2">1. Annual rental income</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->AnnualRentalIncome ?></td>
		</tr>
		<tr>
			<td valign="middle" align="left" colspan="3">2. Claimed Expenses :</td>
		</tr>
		<tr>
			<td valign="middle" align="left">&nbsp;&nbsp;&nbsp; Repair, Collection, etc.</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->Repair ?></td>
			<td valign="top" rowspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td valign="middle" align="left">&nbsp;&nbsp;&nbsp; Municipal or Local Tax</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->MunicipalOrLocalTax ?></td>
		</tr>
		<tr>
			<td valign="middle" align="left">&nbsp;&nbsp;&nbsp;&nbsp; Land Revenue</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->LandRevenue ?></td>
		</tr>
		<tr>
			<td valign="middle" align="left" style="font-size: 11px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Interest on Loan/Mortgage/Capital Charge</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->LoanInterestOrMorgageOrCapitalCrg ?></td>
		</tr>
		<tr>
			<td valign="middle" align="left">&nbsp;&nbsp;&nbsp; Insurance Premium</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->InsurancePremium ?></td>
		</tr>
		<tr>
			<td valign="middle" align="left">&nbsp;&nbsp;&nbsp; Vacancy Allowance</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->VacancyAllowence ?></td>
		</tr>
		<tr>
			<td valign="middle" align="left">&nbsp;&nbsp;&nbsp; Other, if any</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->Others ?></td>
		</tr>
		<tr>
			<td valign="top" align="right" colspan="2">Total =</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->ClaimedExpensesTotal ?></td>
		</tr>
		<tr>
			<td valign="top" align="left" colspan="2">3. Net income ( difference between item 1 and 2)</td>
			<td valign="middle" align="right"><?php echo @$income_house_model->NetIncome ?></td>
		</tr>

	</tbody></table></td>
</tr>
<tr>
	<td valign="top" align="center"></td>
</tr>
</tbody>
</table>

<!-- #####################forth Page Start############################# -->

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td valign="top" align="center"><strong><u>Schedule-3 (Investment tax credit)</u></strong></td>
		</tr>
		<tr>
			<td valign="top" align="center">(Section 44(2) read with part `B` of Sixth Schedule)</td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">
				<table width="100%" cellspacing="0" cellpadding="2" border="1">
					<tbody><tr>
						<td width="75%" valign="middle" align="left">1. Life insurance premium</td>
						<td width="25%" valign="middle" align="right"><?php echo @$income_rebate_model->LifeInsurancePremium ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">2. Contribution to Provident Fund to which Provident Fund Act, 1925 applies</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->ProvidentFund ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">3. Self contribution and employers contribution to Recognized Provident Fund</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->SCECProvidentFund ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">4. Contribution to Super Annuation Fund</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->SuperAnnuationFund ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">5. Investment in approved debenture or debenture stock, Stock or Shares</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->InvestInStockOrShare ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">6. Contribution to deposit pension scheme</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->DepositPensionScheme ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">7. Contribution to Benevolent Fund and Group Insurance premium </td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->BenevolentFund ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">8. Contribution to Zakat Fund</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->ZakatFund ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">9. Investment in Savings Certificates</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->SavingsCertificates ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">10. Investment in Bangladesh Govt. Treasury Bond</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->BangladeshGovtTreasuryBond ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">11. Donation to National Level Institution set up in the memory of Father of the Nation</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->DonationNLInstitutionFON ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">12. Donation to a Charitable Hospital recognized by NBR</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->DonationCharityHospitalNBR ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">13. Donation to Organizations set up for the welfare of retarded people</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->DonationOrganizationRetardPeople ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">14. Contribution to national level institution set up in memory of Liberation war

</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->ContributionNLInstituionLW ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">15. IContribution to Liberation war Museum</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->ContributionLiberationWarMuseum ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">16. Contribution to Aga Khan Development Network</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->ContributionAgaKhanDN ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">17. Contribution to Asiatic Society, Bangladesh</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->ContributionAsiaticSocietyBd ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">18. Donation to ICDDRB (The International Centre for Diarrhoeal Disease Research Bangladesh)</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->DonationICDDRB ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">19. Donation to Centre for the Rehabilitation of the Paralysed (CRP)</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->DotationCRP ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">20. Donation to Educational Institution recognized by Government</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->DonationEduInstitutionGov ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">21. Contribution to Ahsania Mission Cancer Hospital</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->ContributionAhsaniaMissionCancerHospital ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">22. Computer</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->Computer ?></td>
					</tr>
					<tr>
						<td valign="middle" align="left">23. Laptop</td>
						<td valign="middle" align="right"><?php echo @$income_rebate_model->Laptop ?></td>
					</tr>
					<tr>
						<td valign="middle" align="right">Total = </td>
						<td valign="middle" align="right">
							<?php /*echo (@$income_rebate_model->LifeInsurancePremium + @$income_rebate_model->ProvidentFund + @$income_rebate_model->SCECProvidentFund + @$income_rebate_model->SuperAnnuationFund + @$income_rebate_model->InvestInStockOrShare + @$income_rebate_model->DepositPensionScheme + @$income_rebate_model->BenevolentFund + @$income_rebate_model->ZakatFund + @$income_rebate_model->Computer + @$income_rebate_model->Laptop + @$income_rebate_model->SavingsCertificates + @$income_rebate_model->BangladeshGovtTreasuryBond + @$income_rebate_model->DonationNLInstitutionFON + @$income_rebate_model->DonationCharityHospitalNBR + @$income_rebate_model->DonationOrganizationRetardPeople + @$income_rebate_model->ContributionNLInstituionLW + @$income_rebate_model->ContributionLiberationWarMuseum + @$income_rebate_model->ContributionAgaKhanDN + @$income_rebate_model->ContributionAsiaticSocietyBd + @$income_rebate_model->DonationICDDRB + @$income_rebate_model->DotationCRP + @$income_rebate_model->DonationEduInstitutionGov + @$income_rebate_model->ContributionAhsaniaMissionCancerHospital);*/ 
								echo @$income_model->IncomeTaxRebateTotal ;
							?>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>
		<tr>
			<td valign="top" align="left"><strong><em>*Please attach  certificates/documents of investment.</em></strong></td>
		</tr>

		<tr>
			<td valign="top" align="center"><u><strong>List of documents furnished</strong></u></td>
		</tr>
		<tr>
			<td valign="top" align="center">
				<div style="border: 1px #000 solid;">
					<table width="100%" cellspacing="0" cellpadding="10" border="1">
						<tbody><tr>
							<td valign="top" height="455" align="left">
								<ul><li>Salary Statement.</li><li>Statement of accounts.</li><li>Statement of accounts in case of Share of business.</li>
									<li>Tax paid by P.O. No........................................ Date......................... Bank................................. Branch..............................</li>
								</ul>
							</td>
						</tr>
					</tbody></table>
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top" align="left"><strong><em>*Incomplete return is not acceptable</em></strong></td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
	</tbody>
</table>

<!-- #####################Fifth Page Start############################# -->

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td valign="top" align="right"><strong><em>IT-10B</em></strong></td>
		</tr>
		<tr>
			<td valign="top" align="center"><strong>Statement of Assets and Liabilities (as on 30th June, <?php $Endyear = explode('-', $this->taxYear());
echo $Endyear[0];?>)</strong></td>
			</tr>
			<tr>
				<td valign="top" align="center">
					<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody><tr>
							<td width="60%" valign="middle" align="left" style="font-size: 12px;"><strong>Name of the Assessee:</strong> <?php echo @$personal_info_model->Name; ?> </td>
							<td width="40%" valign="middle" align="right">
								<table width="100%" cellspacing="0" cellpadding="0" border="0">
									<tbody><tr>
										<td width="15%" valign="middle" align="left"><strong>TIN: </strong></td>
										<td width="85%" valign="middle" align="right">
											<table width="290" cellspacing="0" cellpadding="2" border="1"><tbody><tr>
												<td valign="middle" align="center"><?php echo @$etin[0]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[1]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[2]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[3]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[4]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[5]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[6]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[7]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[8]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[9]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[10]; ?></td>
												<td valign="middle" align="center"><?php echo @$etin[11]; ?></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
			</tbody></table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td width="70%" valign="top" height="110" align="left"><strong>1. </strong>(a) <strong>Business  Capital</strong> (Closing balance)<br>
						&nbsp;&nbsp;(b) <strong>Directors Shareholdings in Limited Companies (at cost)</strong><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<table width="300" cellspacing="0" cellpadding="0">
							<tbody><tr>
								<td><u>Name of Companies</u></td>
								<td><u>Number of shares</u></td>
							</tr>
							<?php
$shareholdingCompanyList = AssetsShareholdingCompanyList::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
if (!empty($shareholdingCompanyList)) {
	?>
								<tr>
									<td colspan="22" style="padding:10px;">
										<table width="700" border="0" cellspacing="0">
											<thead>
<!--               <tr>
                <th>Company Name</th>
                <th>Number of Shares</th>
                 <th>Each Share Cost</th>
                <th>Company Asset Value</th>
            </tr> -->
        </thead>
        <tbody>
        	<?php
foreach ($shareholdingCompanyList as $value) {
		echo "<tr>";
		echo "<td>" . $value->CompanyName . "</td>";
		echo "<td>" . $value->NumberOfShares . "</td>";
		// echo "<td>".$value->EachShareCost."</td>";
		// echo "<td>".$value->CompanyAssetValue."</td>";
		echo '</tr>';
	}
	?>
        </tbody>
    </table>
</td>
</tr>
<?php }
?>
</tbody></table>
</td>
<td width="30%" valign="top" align="right"><?php echo (AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") > 0) ? AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") : ''; ?><br>
	<?php echo (AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") > 0) ? AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") : ''; ?>
</td>
</tr>
<tr>
	<td valign="top" align="left"><strong>2. Non-Agricultural Property (at cost with legal expenses ) :</strong><br>
		&nbsp;&nbsp;Land/House  property (Description and location of property)</td>
		<td valign="top" align="right">
			<?php echo (AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") > 0) ? AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") : ''; ?>
		</td>
	</tr>
	<?php
$NonAgriculturePropertyList = AssetsNonAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
if (!empty($NonAgriculturePropertyList)) {
	?>
		<tr>
			<td colspan="0" style="padding:5px;">
				<table width="300" border="0" cellspacing="0">
					<tbody>
						<tr>
							<td valign="top" align="left"><u>Property Description</u></td>
							<td  valign="top" align="left"><u>Property Value</u></td>
						</tr>
						<?php
foreach ($NonAgriculturePropertyList as $value) {
		echo "<tr>";
		echo "<td>" . $value->Description . "</td>";
		echo "<td>" . $value->Cost . "</td>";
		echo '</tr>';
	}
	?>
					</tbody>
				</table>
			</td>
		</tr>
		<?php }
?>

		<tr>
			<td valign="top" align="left"><strong>3. Agricultural Property (at cost with legal  expenses ) :</strong><br>
				&nbsp;&nbsp;Land (Total land and location of land property)</td>
				<td valign="top" align="right">
					<?php echo (AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") > 0) ? AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") : ''; ?>
				</td>
			</tr>
			<!-- %%%%%%%%%%%%%%%%%%%%%%LIST%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
			<?php
$AgriculturePropertyList = AssetsAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
if (!empty($AgriculturePropertyList)) {
	?>
				<tr>
					<td colspan="0" style="padding:5px;">
						<table width="300" border="0" cellspacing="0">
							<tbody>
								<tr>
									<td valign="top" align="left"><u>Property Description</u></td>
									<td  valign="top" align="left"><u>Property Value</u></td>
								</tr>
								<?php
foreach ($AgriculturePropertyList as $value) {
		echo "<tr>";
		echo "<td>" . $value->Description . "</td>";
		echo "<td>" . $value->Cost . "</td>";
		echo '</tr>';
	}
	?>
							</tbody>
						</table>
					</td>
				</tr>
				<?php
}
?>
			<!-- %%%%%%%%%%%%%%%%%%%%%%LIST%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

			<tr>
				<td valign="top" height="50" align="left">
					&nbsp;&nbsp;
				</td>
				<td valign="top" align="left">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top" height="118" align="left"><strong>4. Investments:</strong><br>
					&nbsp;&nbsp;(a) Shares/Debentures <br>
					&nbsp;&nbsp;(b) Saving Certificate/Unit Certificate/Bond <br>
					&nbsp;&nbsp;(c) Prize bond/Savings Scheme <br>
					&nbsp;&nbsp;(d) Loans given<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					&nbsp;&nbsp;(e) Other Investment<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
					<td valign="top" align="left"><br>
						<?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Shares/Debentures', 'assets_investment') : @$asset_model->InvestShareDebenturesTotal; ?>
						<br>
						<?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Saving Certificate/Unit Certificate/Bond', 'assets_investment') : @$asset_model->InvestSavingUnitCertBondTotal; ?>
						<br>
						<?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Prize Bond/Saving Scheme', 'assets_investment') : @$asset_model->InvestPrizeBondSavingsSchemeTotal; ?>
						<br>
						<?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Loans Given', 'assets_investment') : @$asset_model->InvestLoansGivenTotal; ?>
						<br><br>
						<?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Other Investment', 'assets_investment') : @$asset_model->InvestOtherTotal; ?>
						<br>
					</td>
				</tr>
				<tr>
					<td valign="middle" align="right"><strong>Total =</strong></td>
					<td valign="middle" align="right"><strong>
						<?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_investment') : (@$asset_model->InvestShareDebenturesTotal+@$asset_model->InvestSavingUnitCertBondTotal+@$asset_model->InvestPrizeBondSavingsSchemeTotal+@$asset_model->InvestLoansGivenTotal+@$asset_model->InvestOtherTotal); ?>
					</strong></td>
				</tr>
				<tr>
					<td valign="top" align="left"><strong>5. Motor Vehicles</strong> <strong>(at cost) :</strong><br>
						&nbsp;&nbsp;Type of motor vehicle and Registration number<br>
						&nbsp;&nbsp;
					</td>
					<td valign="top" align="right">
						<?php echo (@$asset_model->MotorVehicleFOrT == 'Fraction') ? $this->sum_of_motor(@$asset_model->AssetsId, 'assets_motor_vehicles') : @$asset_model->MotorVehicleTotal; ?>
					</td>
				</tr>
				<tr>
					<td valign="middle" align="left"><strong>6. Jewellery (quantity and cost) :</strong><br>
						&nbsp;&nbsp;
					</td>
					<td valign="middle" align="right">
						<?php $jewelleryValue = (@$asset_model->JewelryFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_jewelry') : @$asset_model->JewelryTotal;
if ($jewelleryValue == 0 && $jewelleryValue != null) {
	echo 'Unknown Value';
} else {
	echo $jewelleryValue;
}
?>
					</td>
				</tr>
				<tr>
					<td valign="middle" align="left"><strong>7. Furniture (at cost) :</strong><br>
						&nbsp;&nbsp;
					</td>
					<td valign="middle" align="right">
						<?php $furnitureValue = (@$asset_model->FurnitureFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_furniture') : @$asset_model->FurnitureTotal;
if ($furnitureValue == 0 && $furnitureValue != null) {
	echo 'Unknown Value';
} else {
	echo $furnitureValue;
}
?>
					</td>
				</tr>
				<tr>
					<td valign="middle" align="left"><strong>8. Electronic Equipment (at cost) :</strong><br>
						&nbsp;&nbsp;
					</td>
					<td valign="middle" align="right">
						<?php $electricValue = (@$asset_model->ElectronicEquipmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_electronic_equipment') : @$asset_model->ElectronicEquipmentTotal;
if ($electricValue == 0 && $electricValue != null) {
	echo 'Unknown Value';
} else {
	echo $electricValue;
}
?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="left"><strong>9. Cash Asset Business:</strong><br>
						&nbsp;&nbsp;(a) Cash in hand<br>
						&nbsp;&nbsp;(b) Cash at bank<br>
						&nbsp;&nbsp;(c) Other deposits<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td valign="top" align="left"><br><br>
							<?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash on hand', 'assets_outside_business') : @$asset_model->OutsideBusinessCashInHandTotal; ?>
							<br>
							<?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash at Bank', 'assets_outside_business') : @$asset_model->OutsideBusinessCashAtBankTotal; ?>
							<br>
							<?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Other Deposits', 'assets_outside_business') : @$asset_model->OutsideBusinessOtherdepositsTotal; ?>
							<br>
						</td>
					</tr>
					<tr>
						<td valign="top" align="right"><strong>Total =</strong></td>
						<td valign="top" align="right"><strong>
							<?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, '', 'assets_outside_business') : (@$asset_model->OutsideBusinessCashInHandTotal+@$asset_model->OutsideBusinessCashAtBankTotal+@$asset_model->OutsideBusinessOtherdepositsTotal); ?>
						</strong></td>
					</tr>
				</tbody></table>
			</td>
		</tr>
		<tr>
			<td valign="top" align="center"><br><br></td>
		</tr>
<!--   <tr>
    <td valign="top" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" align="center">&nbsp;</td>
</tr>  -->
</tbody>
</table>

<!-- #####################Sixth Page Start############################# -->

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td valign="top" align="center">
				<table width="100%" cellspacing="0" cellpadding="4" border="0">
					<tbody><tr>
            <td width="70%" valign="top" height="75" align="left"><strong>10. Any other assets</strong> <!-- ( Last Year Balance of Schedule-3 = <?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, '', 'assets_outside_business') : (@$asset_model->OutsideBusinessCashInHandTotal+@$asset_model->OutsideBusinessCashAtBankTotal+@$asset_model->OutsideBusinessOtherdepositsTotal); ?>
            	) --><br>
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(With  details) <br>
            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td width="30%" valign="top" align="right">
            	<?php echo (@$asset_model->AnyOtherAssetsFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_any_other') : @$asset_model->AnyOtherAssetsTotal; ?>
            </td>
        </tr>
        <?php
$AnyOtherAssetsList = AssetsAnyOther::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
if (!empty($AnyOtherAssetsList)) {
	?>
        	<tr>
        		<td colspan="22" style="padding:10px;">
        			<table width="300" border="0" cellspacing="0">
        				<tbody>
        					<tr>
        						<td><u>Asset Description<u></td>
        						<td><u>Asset Value<u></td>
        					</tr>
        					<?php
foreach ($AnyOtherAssetsList as $value) {
		echo "<tr>";
		echo "<td>" . $value->Description . "</td>";
		echo "<td>" . $value->Cost . "</td>";
		echo '</tr>';
	}
	?>
        				</tbody>
        			</table>
        		</td>
        	</tr>
        	<?php
}
?>
        <?php
$totalAssets = (double) AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") +
(double) AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") +
(double) AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") +
(double) AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") +
(double) AssetsController::sum_of_particular_field($asset_model, "Investment", "assets_investment") +
(double) AssetsController::sum_of_particular_field($asset_model, "MotorVehicle", "assets_motor_vehicles") +
(double) AssetsController::sum_of_particular_field($asset_model, "Jewelry", "assets_jewelry") +
(double) AssetsController::sum_of_particular_field($asset_model, "Furniture", "assets_furniture") +
(double) AssetsController::sum_of_particular_field($asset_model, "ElectronicEquipment", "assets_electronic_equipment") +
(double) AssetsController::sum_of_particular_field($asset_model, "OutsideBusiness", "assets_outside_business") +
(double) AssetsController::sum_of_particular_field($asset_model, "AnyOtherAssets", "assets_any_other");

$totalAssets = round($totalAssets, 2);
?>
        <tr>
        	<td valign="top" align="right"><strong>Total Assets =</strong></td>
        	<td valign="top" align="right"><strong>
        		<?php echo ($totalAssets != 0) ? $totalAssets : ''; ?>
        	</strong></td>
        </tr>
        <tr>
        	<td valign="top" height="100" align="left"><strong>11. Less Liabilities:</strong><br>
        		&nbsp;&nbsp;&nbsp;&nbsp;(a) Mortgages secured on property or land <br>
        		&nbsp;&nbsp;&nbsp;&nbsp;(b) Unsecured loans <br>
        		&nbsp;&nbsp;&nbsp;&nbsp;(c) Bank loan <br>
        		&nbsp;&nbsp;&nbsp;&nbsp;(d) Others </td>
        		<td valign="top" align="left"><br><br>
        			<br>
        			<br>
        			<br>
        		</td>
        	</tr>
        	<?php
$totalLiabilities = (double) LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property") +
(double) LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans") +
(double) LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans") +
(double) LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan");

$totalLiabilities = round($totalLiabilities, 2);
?>

        	<tr>
        		<td valign="middle" align="right"><strong>Total Liabilities =</strong></td>
        		<td valign="middle" align="right"><strong><?php echo $totalLiabilities; ?></strong></td>
        	</tr>
        	<tr>
        		<td valign="top" align="left"><strong>12. Net wealth as on last date of this income year</strong><br>
        			&nbsp;&nbsp;&nbsp;&nbsp;(Difference between total assets  and total liabilities)</td>
        			<td valign="top" align="right"><?php echo $netWealth_12 = ($totalAssets - $totalLiabilities); ?></td>
        		</tr>
        		<tr>
        			<td valign="middle" align="left"><strong>13. Net wealth as on last date of previous income year</strong></td>
        			<td valign="middle" align="right">
        				<?php
$TotalNetWealth = (@$asset_model->NetWealthFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_other_receipts') : @$asset_model->NetWealthTotal;
echo $TotalNetWealth;
?>
        			</td>
        		</tr>

        		<?php
if (@$expence_model->TotalTaxPaidLastYearConfirm == "Yes") {
	$TotalTaxPaid = $expence_model->TotalTaxPaidLastYear;
} elseif (@$expence_model->TotalTaxPaidLastYearConfirm == "No") {
	$TotalTaxPaid = Yii::t("expense", "You chose No");
} else {
	$TotalTaxPaid = Yii::t("expense", "Not answered yet");
}

$totalExpence = (double) ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") +
(double) $TotalTaxPaid +
(double) ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special");

$totalExpence = round($totalExpence, 2);

// $totalExpence = @$expence_model->TotalExpenditure;

$netWealth_lastyear_13 = $TotalNetWealth;

$accretionWealth_14 = ($netWealth_12 - $netWealth_lastyear_13);

$totalAccretion_16 = ($totalExpence + $accretionWealth_14);

?>
        		<tr>
        			<td valign="middle" align="left"><strong>14. Accretion in wealth</strong><br>
        				&nbsp;&nbsp;&nbsp;&nbsp;(Difference between serial no. 12 and 13)</td>
        				<td valign="middle" align="right"><?php echo $accretionWealth_14; ?></td>
        			</tr>
        			<tr>
        				<td valign="top" align="left">
        					<strong>15. </strong>(a) Family Expenditure: (Total expenditure as per Form IT 10 BB)
        					<?php echo $totalExpence; ?><br>
        					&nbsp;&nbsp;&nbsp;&nbsp;(b) Number of dependant children of the family: <br>
        					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table width="150" cellspacing="5" cellpadding="2" border="0">
        					<tbody><tr>
        						<td width="75" valign="top" align="center" style="border: 1px solid #000;"><?php echo (($personal_info_model->NoOfAdultInFamily != null) ? @$personal_info_model->NoOfAdultInFamily : '0'); ?></td>
        						<td width="75" valign="top" align="center" style="border: 1px solid #000;"><?php echo (($personal_info_model->NoOfChildInFamily != null) ? @$personal_info_model->NoOfChildInFamily : '0'); ?></td>
        					</tr>
        					<tr>
        						<td valign="top" align="center">Adult</td>
        						<td valign="top" align="center">Child</td>
        					</tr>
        				</tbody></table>
        			</td>
        			<td valign="top" align="right"> <?php echo $totalExpence; ?></td>
        		</tr>
        		<tr>
        			<td valign="middle" align="left"><strong>16. Total Accretion of wealth </strong>(Total of serial 14 and 15)</td>
        			<td valign="middle" align="right"><?php echo $totalAccretion_16; ?></td>
        		</tr>
        		<tr>
        			<td valign="top" align="left"><strong>17. Sources of Fund :</strong><br>
        				&nbsp;&nbsp;&nbsp;&nbsp;(i) Shown Return Income<br>
        				&nbsp;&nbsp;&nbsp;&nbsp;(ii) Tax exempted/Tax free Income<br>
        				&nbsp;&nbsp;&nbsp;&nbsp;(iii) Other receipts </td>
        				<td valign="top" align="left"><br>
        					<?php echo $totalIncome = $this->totalIncome(Yii::app()->user->CPIId); ?>
        					<br>
        					<?php echo @$totalTaxWaiver->NetTaxWaiver; ?>
        					<br>
        					<?php //$total_other_receipt = (double) AssetsController::sum_of_particular_field($asset_model, "OtherAssetsReceipt", "assets_other_receipts"); ?>
        					<?php
$TotalOtherReceipts = (@$asset_model->OtherAssetsReceiptFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_other_receipts') : @$asset_model->OtherAssetsReceiptTotal;
echo $TotalOtherReceipts;
?>
        					<?php //echo @$total_other_receipt; ?><br>
        				</td>
        			</tr>
        			<?php
$OtherAssetsReceiptList = AssetsOtherReceipts::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
if (!empty($OtherAssetsReceiptList)) {
	echo "<tr><td style='padding-left:10%; font-size:13px;'>";
	foreach ($OtherAssetsReceiptList as $value) {
		echo $value->Description . "<br/>";
	}
	echo '</td></tr>';
}
?>
        			<tr>
        				<td valign="top" align="right"><strong>Total source of Fund =</strong></td>
        				<td valign="top" align="right"><strong><?php echo ($totalIncome+@$totalTaxWaiver->NetTaxWaiver+@$TotalOtherReceipts); ?></strong></td>
        			</tr>
        			<tr>
        				<td valign="middle" align="left"><strong>18. Difference</strong> (Between serial 16 and 17)</td>
        				<td valign="middle" align="left"><?php echo ($totalAccretion_16 - ($totalIncome+@$totalTaxWaiver->NetTaxWaiver+@$TotalOtherReceipts)); ?></td>
        			</tr>
        		</tbody></table>
        	</td>
        </tr>
        <tr>
        	<td valign="top" align="center">&nbsp;</td>
        </tr>
        <tr>
        	<td valign="top" align="left">I solemnly declare that to the best of my knowledge and belief the information given in the IT-10B is correct and complete.</td>
        </tr>
        <tr>
        	<td valign="top" align="center"><br><br><br></td>
        </tr>
        <tr>
        	<td valign="top" align="right">
        		<?php echo @$personal_info_model->Name; ?><br>
        		Name &amp; signature  of the Assessee<br>Date: <?php echo date('d-m-Y'); ?>

        	</td>
        </tr>
        <tr>
        	<td valign="top" align="left"><br><br></td>
        </tr>
        <tr>
        	<td valign="top" align="left">
        		<strong><em>* Assets and liabilities of self, spouse (if  she/he is not an assessee), minor children and dependant(s) to be shown in the above statements.</em></strong>
        	</td>
        </tr>
        <tr>
        	<td valign="top" align="left">&nbsp;</td>
        </tr>
        <tr>
        	<td valign="top" align="left">
        		<strong><em>* If needed, please use separate sheet.</em></strong>
        	</td>
        </tr>
        <tr>
        	<td valign="top" align="left"><br><br><br></td>
        </tr>

        <tr>
        	<td valign="top" align="center">&nbsp;</td>
        </tr>
        <tr>
        	<td valign="top" align="center">&nbsp;</td>
        </tr>

        <tr>
        	<td valign="top" align="center">&nbsp;</td>
        </tr>
        <tr>
        	<td valign="top" align="center">&nbsp;</td>
        </tr>
        <tr>
        	<td valign="top" align="center">&nbsp;</td>
        </tr>
        <tr>
        	<td valign="top" align="center">&nbsp;</td>
        </tr>

    </tbody>
</table>

<!-- #####################Seventh Page Start############################# -->

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td valign="top" align="right"><strong><em>Form No. IT-10BB</em></strong></td>
		</tr>
		<tr>
			<td valign="top" align="center"><strong>FORM</strong></td>
		</tr>
		<tr>
			<td valign="top" align="left">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="left"><strong>Statement under section 75(2)(d)(i) and section 80 of the Income Tax Ordinance, 1984 (XXXVI of 1984) regarding particulars of life style</strong></td>
		</tr>
		<tr>
			<td valign="top" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" align="center">
				<table width="100%" cellspacing="0" cellpadding="0" border="0">
					<tbody><tr>
						<td width="60%" valign="middle" align="left" style="font-size: 12px;"><strong>Name of the Assessee:</strong> <?php echo @$personal_info_model->Name; ?></td>
						<td width="40%" valign="middle" align="right">
							<table width="100%" cellspacing="0" cellpadding="0" border="0">
								<tbody><tr>
									<td width="15%" valign="middle" align="left"><strong>TIN: </strong></td>
									<td width="85%" valign="middle" align="right">
										<table width="290" cellspacing="0" cellpadding="2" border="1"><tbody><tr>
											<td valign="middle" align="center"><?php echo @$etin[0]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[1]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[2]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[3]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[4]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[5]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[6]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[7]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[8]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[9]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[10]; ?></td>
											<td valign="middle" align="center"><?php echo @$etin[11]; ?></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
		</tbody></table>
	</td>
</tr>
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
<tr>
	<td valign="top" align="center">
		<table width="100%" cellspacing="0" cellpadding="2" border="1">
			<tbody><tr>
				<td width="11%" valign="top" align="center"><strong>Serial No.</strong></td>
				<td width="45%" valign="top" align="center"><strong>Particulars of Expenditure</strong></td>
				<td width="18%" valign="top" align="center"><strong>Amount of </strong></td>
				<td width="26%" valign="top" align="center"><strong>Comments </strong></td>
			</tr>
			<tr>
				<td valign="middle" align="center">1</td>
				<td valign="middle" align="left">Personal and fooding expenses</td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">2</td>
				<td valign="middle" align="left">Tax paid including deduction at source of the last financial year</td>
				<td valign="middle" align="right"><?php echo ($TotalTaxPaid > 0) ? $TotalTaxPaid : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">3</td>
				<td valign="middle" align="left">Accommodation expenses </td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">4</td>
				<td valign="middle" align="left">Transport expenses </td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">5</td>
				<td valign="middle" align="left">Electricity Bill for residence</td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">6</td>
				<td valign="middle" align="left">Wasa Bill for residence</td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">7</td>
				<td valign="middle" align="left">Gas Bill for residence</td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">8</td>
				<td valign="middle" align="left">Telephone Bill for residence</td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">9</td>
				<td valign="middle" align="left">Education expenses for children</td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">10</td>
				<td valign="middle" align="left">Personal expenses for Foreign travel </td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">11</td>
				<td valign="middle" align="left">Festival and other special expenses, if any <br> + M. A.</td>
				<td valign="middle" align="right"><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") : ''; ?></td>
				<td valign="middle" align="left"></td>
			</tr>
			<tr>
				<td valign="middle" align="center">&nbsp;</td>
				<td valign="middle" align="left">Total Expenditure </td>
				<td valign="middle" align="right"><?php echo $totalExpence; ?></td>
				<td valign="middle" align="left">&nbsp;</td>
			</tr>
		</tbody></table>
	</td>
</tr>
<tr>
	<td valign="top" height="40" align="left"></td>
</tr>
<tr>
	<td valign="top" align="left">I solemnly declare that to the best of my knowledge and belief the information given in the IT-10BB is correct and complete.</td>
</tr>
<tr>
	<td valign="top" align="right"><br><br><br></td>
</tr>
<tr>
	<td valign="top" align="right"><?php echo @$personal_info_model->Name; ?><br>
		Name &amp; signature  of the Assessee<br>Date: <?php echo date('d-m-Y'); ?>
	</td>
</tr>
<tr>
	<td valign="top" align="left"><strong><em>*If needed, please use separate sheet.</em></strong></td>
</tr>
<!--   <tr>
    <td valign="top" align="center"><br><br></td>
</tr> -->
<tr>
	<td valign="top" align="left"><img border="0" src="<?php echo Yii::app()->baseUrl ?>/img/sizers.gif"> .................................................................................................................................................................</td>
</tr>
<!--   <tr>
    <td valign="top" align="center">&nbsp;</td>
</tr> -->
<tr>
	<td valign="top" align="center"><u><strong>Acknowledgement Receipt of Income Tax Return</strong></u></td>
</tr>
  <!-- <tr>
    <td valign="top" align="center"><br><br></td>
</tr> -->
<tr>
	<td valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tbody><tr>
			<td width="70%" valign="middle" align="left"><strong>Name of the Assessee:</strong> <?php echo @$personal_info_model->Name; ?></td>
			<td width="30%" valign="middle" align="right">Assessment Year: <?php echo $this->taxYear(); ?></td>
		</tr>
	</tbody></table>
</td>
</tr>
<tr>
	<td valign="top" align="center">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tbody><tr>
				<td width="10%" valign="middle" align="left">UTIN/TIN: </td>
				<td width="40%" valign="middle" align="left">
					<table width="290" cellspacing="0" cellpadding="2" border="1"><tbody><tr>
						<td valign="middle" align="center"><?php echo @$etin[0]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[1]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[2]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[3]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[4]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[5]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[6]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[7]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[8]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[9]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[10]; ?></td>
						<td valign="middle" align="center"><?php echo @$etin[11]; ?></td>
					</tr>
				</tbody>
			</table>



		</td>
		<td width="20%" valign="middle" align="right">Circle: <u><?php echo @$personal_info_model->TaxesCircle; ?></u></td>
		<td width="30%" valign="middle" align="right">Taxes Zone: <u><?php echo @$personal_info_model->TaxesZone; ?></u></td>
	</tr>
</tbody></table>
</td>
</tr>
<!-- <tr>
  <td valign="top" align="center"><br><br><br></td>
</tr> -->
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>

<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>

<tr>
	<td valign="top" align="center">&nbsp;</td>
</tr>
</tbody>
</table>

<!-- #####################Eighth Page Start############################# -->

<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td valign="top" align="center"><strong><u>Instructions to fill up the Return Form</u></strong></td>
		</tr>
<!--                   <tr>
                    <td valign="top" align="center">&nbsp;</td>
                </tr> -->
                <tr>
                	<td>
                		<table cellspacing="0" cellpadding="8" border="1">
                			<tbody><tr>
                				<td valign="top" align="left">
                					<strong><u>Instructions:</u></strong><br>
                					1. This return of income shall be signed and verified by the individual assessee or person as prescribed u/s 75 of the Income Tax Ordinance, 1984.<br>
                					2. <u>Enclose where applicable:</u><br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(a) Salary statement for salary income; Bank statement for interest; Certificate for interest on savings instruments; Rent agreement, receipts of municipal tax and land revenue, statement of house property loan interest, insurance premium for house property income; Statement of professional income as per IT Rule-8; Copy of assessment/ income statement and balance sheet for partnership income; Documents of capital gain; Dividend warrant for dividend income; Statement of other income; Documents in support of investments in savings certificates, LIP, DPS, Zakat, stock/share etc.<br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(b) Statement of income and expenditure; Manufacturing A/C, Trading and Profit &amp; Loss A/C and Balance sheet;<br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(c) Depreciation chart claiming depreciation as per THIRD SCHEDULE of the Income Tax Ordinance, 1984;<br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(d) Computation of income according to Income tax Law;
                					<br>
                					3. <u>Enclose separate statement for:</u><br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(a) Any income of the spouse of the assessee (if she/he is not an assessee), minor children and dependant; <br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(b) Tax exempted/tax free income.<br>
                					4. Fulfillment of the conditions laid down in rule-38 is mandatory for submission of a return under "Self Assessment".<br>
                					5. Documents furnished to support the declaration should be signed by the assessee or his/her authorized representative.<br>
                					6. The assesse shall submit his/her photograph with return after every five year.<br>
                					7. <u>Furnish the following information:</u><br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(a) Name, address and TIN of the partners if the assessee is a firm;<br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(b) Name of firm, address and TIN if the assessee is a partner;<br>
                					&nbsp;&nbsp;&nbsp;&nbsp;(c) Name of the company, address and TIN if the assessee is a director.<br>
                					8. Assets and liabilities of self, spouse (if she/he is not an assessee), minor children and dependant(s) to be shown in the IT-10B.<br>
                					9. Signature is mandatory for all the assessee or his/her authorized representative. For individual, signature is also mandatory in I.T-10B and I.T-10BB.<br>
                					10. If needed, please use separate sheet.
                				</td>
                			</tr>
                		</tbody></table>
                	</td>
                </tr>
                <tr>
                	<td valign="top" align="center">&nbsp;</td>
                </tr>
                <tr>
                	<td valign="top" align="left"><img border="0" src="<?php echo Yii::app()->baseUrl ?>/img/sizers.gif"> .................................................................................................................................................................</td>
                </tr>
                <tr>
                	<td valign="top" align="center">
                		<table width="100%" cellspacing="0" cellpadding="4" border="0">
                			<tbody><tr>
                				<td width="55%" valign="middle" align="left">&nbsp;</td>
                				<td width="45%" valign="middle" align="left">&nbsp;</td>
                			</tr>
                			<tr>
                				<td valign="middle" align="left">Total income shown in Return:  
                				<?php 
                					echo ($totalIncome = $this->totalIncome(Yii::app()->user->CPIId) + @$this->totalOutputMain('ForeignIncome')); 
                				?></td>
                				<td valign="middle" align="right">Tax paid:  <?php echo $GrandTotalPayableTax; ?></td>
                			</tr>
                			<tr>
                				<td valign="middle" align="left">Net Wealth of Assessee:  <?php echo $netWealth_12; ?></td>
                				<td valign="middle" align="left"></td>
                			</tr>
                			<tr>
                				<td valign="middle" align="left">Date of receipt of return:</td>
                				<td valign="middle" align="right">Serial No. in return register..........................</td>
                			</tr>
                			<tr>
                				<td valign="middle" align="left"><table cellspacing="0" cellpadding="0" border="0">
                					<tbody><tr>
                						<td valign="middle" align="left">Nature of Return:</td>
                						<td valign="middle" align="left">
                							<table width="250" cellspacing="4" cellpadding="2" border="0">
                								<tbody><tr>
                									<td style="border:1px #000000 solid; width:25%; text-align:center; vertical-align:middle;"><strong>Self</strong></td>
                									<td style="border:1px #000000 solid; width:45%; text-align:center; vertical-align:middle;"><strong>Universal Self</strong></td>
                									<td style="border:1px #000000 solid; width:30%; text-align:center; vertical-align:middle;"><strong>Normal</strong></td>
                								</tr>
                							</tbody></table>
                						</td>
                					</tr>
                				</tbody></table>
                			</td>
                			<td valign="middle" align="left">&nbsp;</td>
                		</tr>
<!--                       <tr>
                        <td valign="middle" align="left"><br><br></td>
                        <td valign="middle" align="left"><br><br></td>
                    </tr> -->
                    <tr>
                    	<td valign="middle" align="left"></td>
                    	<td valign="middle" align="right"><br>Signature of Receiving<br>officer with seal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
        <tr>
        	<td valign="top" align="center">&nbsp;<br><br><br></td>
        </tr>
    </tbody>
</table>

<!-- #####################Seventh Page Start############################# -->

              <!-- <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                  <td valign="top" align="left">Thank you for using this software. &copy;<?php echo $this->taxYear(); ?> www.bdtax.com.bd</td>
                </tr>

                <tr>
                  <td valign="top" align="center">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody><tr>
                      <td width="60%" valign="middle" align="left" style="font-size: 12px;"><strong>Name of the Assessee:</strong> MOHAMMAD MOAZZEM HOSSAIN</td>
                      <td width="40%" valign="middle" align="right">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                          <tbody><tr>
                            <td width="15%" valign="middle" align="left"><strong>TIN: </strong></td>
                            <td width="85%" valign="middle" align="right"></td>
                          </tr>
                        </tbody></table>
                      </td>
                    </tr>
                  </tbody></table>
                </td>
              </tr>
              <tr>
                <td valign="top" align="center">&nbsp;</td>
              </tr>
              <tr>
                <td valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tbody><tr>
                    <td width="40%" valign="middle" align="left">Circle: </td>
                    <td width="30%" valign="middle" align="left">Taxes Zone: </td>
                    <td width="30%" valign="middle" align="right">Assessment Year: <?php echo $this->taxYear(); ?></td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
            <tr>
              <td valign="top" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" align="center"><strong><u>Calculation Sheet</u></strong></td>
            </tr>
            <tr>
              <td valign="top" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" align="left"><strong>Payment of tax</strong><hr></td>
            </tr>
            <tr>
             <td valign="top" align="left">
               <table width="100%" cellspacing="0" cellpadding="2" border="1">
                 <tbody><tr>
                  <td width="55%" valign="middle" align="center"><strong>Challan/P. O.</strong></td>
                  <td width="20%" valign="middle" align="center"><strong>Date</strong></td>
                  <td width="25%" valign="middle" align="center"><strong>Amount of Taka</strong></td>
                </tr><tr>
                <td valign="middle" align="left">&nbsp;</td>
                <td valign="middle" align="left">&nbsp;</td>
                <td valign="middle" align="right">&nbsp;</td>
              </tr><tr>
              <td valign="middle" align="right">&nbsp;</td>
              <td valign="middle" align="right">Total=</td>
              <td valign="middle" align="right">&nbsp;<strong></strong></td>
            </tr></tbody></table></td>
          </tr>
          <tr>
           <td valign="top" align="left">&nbsp;</td>
         </tr><tr>
         <td valign="top" align="left"><strong>Exempted Income</strong><hr></td>
       </tr>
       <tr>
        <td valign="top" align="left">
          <table width="100%" cellspacing="0" cellpadding="2" border="1">
            <tbody><tr>
             <td width="75%" valign="middle" align="center"><strong>Details of Exemption</strong></td>
             <td width="25%" valign="middle" align="center"><strong>Amount of Taka</strong></td>
           </tr>
           <tr>
            <td valign="middle" align="left">Exempted From Salary</td>
            <td valign="middle" align="right">234,000.00</td></tr>
            <tr>
             <td valign="middle" align="right">Total Exemption=</td>
             <td valign="middle" align="right"><strong>234,000.00</strong></td>
           </tr>
         </tbody></table>
       </td>
     </tr>
     <tr>
      <td valign="top" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" align="left">MOHAMMAD MOAZZEM HOSSAIN<br>Name &amp; signature  of the Assessee<br>Date: 27-07-2015
      </td>
    </tr>
    <tr>
      <td valign="top" align="left"><hr>Thank you for using this software. &copy;<?php echo $this->taxYear(); ?> www.bdtax.com.bd</td>
    </tr>

</tbody></table> -->
