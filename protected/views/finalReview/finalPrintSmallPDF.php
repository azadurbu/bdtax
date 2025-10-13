	<style type="text/css" media="print">
    	* {
    		font-family:"Times New Roman";
    	}
    	body {
    		/*font-style:normal;*/
    		font-weight:bold;
    		font-size:13px!important;
    		font-family:"Times New Roman";
    	}
    	.page2_table1 {
    		font-weight:bold;
    		font-size:11px;
    		font-family:"Times New Roman";
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
 
 @media print
   {
@font-face {
  font-family: 'SutonnyMJ';
  src: url('fonts/SutonnyMJ.eot?#iefix') format('embedded-opentype'),  url('fonts/SutonnyMJ.woff') format('woff'), url('fonts/SutonnyMJ.ttf')  format('truetype'), url('fonts/SutonnyMJ.svg#SutonnyMJ') format('svg');
  font-weight: normal;
  font-style: normal;
}
 
</style>

<?php
$tick = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAATCAYAAACQjC21AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Rjg0RUM2OEYwM0Q5MTFFNzg3MkZBQTczQkQ4NEIyNzAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Rjg0RUM2OTAwM0Q5MTFFNzg3MkZBQTczQkQ4NEIyNzAiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGODRFQzY4RDAzRDkxMUU3ODcyRkFBNzNCRDg0QjI3MCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGODRFQzY4RTAzRDkxMUU3ODcyRkFBNzNCRDg0QjI3MCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pshu+FAAAADCSURBVHjaYmSgHigEYmVqGbYdiN8CsQGlBkkA8TMg/gzEbJQaZgTE/4H4EzW86Ao17BcQc1JqmDfUMBCWp9QwDyTDXCk1zArJsFpKDQOlrz9Qww5SahgHEL9AigQ+Sg08guTVCGI0TAXiABxyE5EM20usC2KgGuYAMT+SuD+SYSAsSoq3AqCa3gFxKDR9/UUyrJ6csMpDMuA3EvsNJREwHc2bIBxNaazuRTLsHjUyPhMQP4UaGECtAtMYiHeSoxEgwABxUTsgGqdwJwAAAABJRU5ErkJggg==";
// Yii::import('application.controllers.AssetsController');
// Yii::import('application.controllers.ExpenditureController');
// Yii::import('application.controllers.LiabilitiesController');
$shareholdingCompanyList = AssetsShareholdingCompanyList::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
$nonAgriculturePropertyList = AssetsNonAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
$AgriculturePropertyList = AssetsAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
$motorVehicleList = AssetsMotorVehicles::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
$investmentLoanGivenList = AssetsInvestment::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId,'InvestmentType'=> 'Loans Given'));
$investmentOtherInvestmentList = AssetsInvestment::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId,'InvestmentType'=> 'Other Investment'));
$unsecuredLoanList = LiaUnsecuredLoans::model()->findAllByAttributes(array('LiabilityId' => @$liability_model->LiabilityId));
// var_dump($unsecuredLoanList);die;
?>
<?php
    $cashOnHand = (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash on hand', 'assets_outside_business') : @$asset_model->OutsideBusinessCashInHandTotal;
    $cashAtBank = (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash at Bank', 'assets_outside_business') : @$asset_model->OutsideBusinessCashAtBankTotal;
    $fund = (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Fund', 'assets_outside_business') : @$asset_model->OutsideBusinessFundTotal;
    $otherDeposits = (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Other Deposits', 'assets_outside_business') : @$asset_model->OutsideBusinessOtherdepositsTotal;
    $cashFundOutsideBusines = $cashOnHand + $cashAtBank + $fund + $otherDeposits;

    $totalAssets = (double) AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") +
    (double) AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") +
    (double) AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") +
    (double) AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") +
    (double) AssetsController::sum_of_particular_field($asset_model, "Investment", "assets_investment") +
    (double) AssetsController::sum_of_particular_field($asset_model, "MotorVehicle", "assets_motor_vehicles") +
    (double) AssetsController::sum_of_particular_field($asset_model, "Jewelry", "assets_jewelry") +
    (double) AssetsController::sum_of_particular_field($asset_model, "Furniture", "assets_furniture") +
    (double) AssetsController::sum_of_particular_field($asset_model, "ElectronicEquipment", "assets_electronic_equipment") +
    // (double) AssetsController::sum_of_particular_field($asset_model, "OutsideBusiness", "assets_outside_business") +
    (double) AssetsController::sum_of_particular_field($asset_model, "AnyOtherAssets", "assets_any_other")+
    $cashFundOutsideBusines;

    $totalAssets = round($totalAssets, 2);

    $totalLiabilities = (double) LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property") +
    (double) LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans") +
    (double) LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans") +
    (double) LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan");

    $totalLiabilities = round($totalLiabilities, 2);
?>

<!---------------- START OF PAGE 1 -------------->
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:16px;">
	<tbody>
		<tr>
			<td width="22%" align="center" style="font-size:11px; padding:5px;" valign="top">
				<p style="font-size:12px;">National Board of Revenue</p>
				
		  </td>
            
		  <td width="42%" style="padding:5px;" valign="top">&nbsp;</td>
			
            
	  <td width="32%" align="right" style="padding:5px;" valign="top">
		<p style="font-weight:bold; font-size:12px;"><strong>IT- GHA2020</strong></p>
			</td>
	  </tr>
	</tbody>
</table>

<h6 style="text-align:center;"><strong>Form of Return of Income Under Income-tax Ordinance, 1984 (Ord. XXXVI of 1984)</h6>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:11px;" border="0">
	<tbody>
		<tr>
			<td colspan="2" width="76%" style="padding:5px;" valign="top">
				<p style="font-size:12px;">The following schedules shall be the integral part of this return and must be annexed to return in the following cases:</p>
			</td>
			<td rowspan="5" width="2%" style="padding:5px;" valign="top">&nbsp;</td>
			<td rowspan="5" width="20%" align="center"  valign="top" style="border:1px solid #000;padding:5px;">
				<p>Photo</p>
			</td>
		</tr>
		<tr>
			<td width="16%" style="padding:5px;" valign="top">
				<p style="font-weight:normal; font-size:12px"><em>Schedule 24A</em></p>
			</td>
			<td width="65%" style="padding:5px;" valign="top">
				<p style="font-weight:normal;font-size:12px"><em>if you have income from Salaries</em></p>
			</td>
		</tr>
		<tr>
			<td width="16%" style="padding:5px;" valign="top">
				<p style="font-weight:normal;font-size:12px"><em>Schedule 24B</em></p>
			</td>
			<td width="65%" style="padding:5px;" valign="top">
				<p style="font-weight:normal;font-size:12px"><em>if you have income from house property</em></p>
			</td>
		</tr>
		<tr>
			<td width="16%" style="padding:5px;" valign="top">
				<p style="font-weight:normal;font-size:12px"><em>Schedule 24C</em></p>
			</td>
			<td width="65%" style="padding:5px;" valign="top">
				<p style="font-weight:normal;font-size:12px"><em>if you have income from business or profession</em></p>
			</td>
		</tr>
		<tr>
			<td width="16%" style="padding:5px;" valign="top">
				<p style="font-weight:normal;font-size:12px"><em>Schedule 24D</em></p>
			</td>
			<td width="65%" style="padding:5px;" valign="top">
				<p style="font-weight:normal;font-size:12px"><em>if you claim tax rebate</em></p>
			</td>
		</tr>
	</tbody>
</table>

<h6 style="text-align:center; padding-top:20px;">PART I<br />Basic information</h6>

<table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tr>
    <td width="6%" style="border: 1px solid #000; padding:5px;" align="center" valign="top" rowspan="2">01</td>
    <td style="border: 1px solid #000; padding:5px;" rowspan="2" colspan="2" width="50%" valign="top">
    	
        <table cellspacing="0" cellpadding="0" width="100%" border="0">
          <tr>
            <td style="padding:5px;" valign="top">Assessment Year</td>
          </tr>
          <tr>
            <td>
            <?php
              $tax_year_stripe = str_split(htmlentities(strip_tags(@$this->taxYear())));
            ?>
            	<table cellspacing="0" cellpadding="0" width="100%" border="0"  style="margin-left:5px;">
                      <tr>
                        <td width="15%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">2</td>
                        <td width="15%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">0</td>
                        <td width="15%" style="border: 1px solid #000; padding:5px;" align="center" valign="top"><?php echo $tax_year_stripe[2];?></td>
                        <td width="15%" style="border: 1px solid #000; padding:5px;" align="center" valign="top"><?php echo $tax_year_stripe[3];?></td>
                        <td width="5%" align="center" style="padding:5px;" valign="top"> - </td>
                        <td width="15%" style="border: 1px solid #000; padding:5px;" align="center" valign="top"><?php echo $tax_year_stripe[7];?></td>
                        <td width="15%" style="border: 1px solid #000; padding:5px;" align="center" valign="top"><?php echo $tax_year_stripe[8];?></td>
                      </tr>
                    </table>

            </td>
          </tr>
        </table>
    </td>
    
    <td width="6%" style="border: 1px solid #000; padding:5px;" align="center" valign="top" rowspan="2">02</td>
    
    <td width="38%" style="border: 1px solid #000; padding:5px;" valign="top" colspan="2">
    	Return submitted under section 82BB? (tick one)
     </td>
   </tr>
   <tr>
		<td  style="border: 1px solid #000;" valign="top">
    		<table cellspacing="0" cellpadding="0" style="margin-left:5px">
                    <tr>
                        <td width="120" valign="top" style="height:26px;">Yes</td>
                        <td width="30" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo ($data82bb_info->checked==1 && isset($data82bb_info))?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> 
                    </tr>
          		 </table>
		</td>
           
		<td style="border: 1px solid #000;" valign="top">
        	<table cellspacing="0" cellpadding="0" style="margin-left:5px">
                    <tr>
                        <td width="120" style="height:26px;" valign="top">No</td>
                        <td width="30" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (@$data82bb_info->checked != 1 || !isset($data82bb_info))?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> 
                    </tr>
          	</table>
		</td>
  </tr>
  <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">03</td>
    <td style="padding:5px;" colspan="2" valign="top">Name of the Assessee <h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5></td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">04</td>
    <td style=" padding:5px;" valign="top">Gender (tick one)</td>
    <td style="border-right:1px solid #000; padding:5px;" valign="top">
        <table cellspacing="0" cellpadding="0" width="130" border="0">
          <tr>
            <td width="25" style="border: 1px solid #000; padding:5px;" valign="top">M</td>
            <td width="22" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (@$personal_info_model->Gender=='Male')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
            <td width="15" style="padding:5px;" valign="top" >&nbsp;</td>
            <td width="25" style="border: 1px solid #000; padding:5px;" valign="top">F</td>
            <td width="23" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (@$personal_info_model->Gender=='Female')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
          </tr>
        </table>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">
    	05 
        <p>&nbsp;</p>
    </td>
    <td style="border: 1px solid #000; padding:5px;"  valign="top" colspan="2">Twelve-digit TIN <h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></h5></td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">
    	06
        <p>&nbsp;</p>
    </td>
    <td style="border: 1px solid #000; padding:5px;" valign="top" colspan="2">Old TIN</td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">
    	07
        <p>&nbsp;</p>
    </td>
    <td style="border: 1px solid #000; padding:5px;"  valign="top" colspan="2">
    	Circle
      <h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->TaxesCircle)); ?></h5>
    </td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">
    	08
        <p>&nbsp;</p>
    </td>
    <td style="border: 1px solid #000; padding:5px;" valign="top" colspan="2">
    	Zone
        <h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->TaxesZone)); ?></h5>
    </td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">09</td>
    <td style="border: 1px solid #000; padding:5px;" valign="top" colspan="2">Resident Status (tick one)</td>
    <td colspan="3" style="border: 1px solid #000; padding:0px; margin:0px;">
    	<table cellspacing="0" cellpadding="0" width="100%">
          <tr>
            <td style="border-right: 1px solid #000;" width="220">
            	 <table cellspacing="0" cellpadding="0" style="margin-left:10px;">
                    <tr>
                        <td width="170" style="padding:5px;" valign="top">Resident</td>
                        <td width="30" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (@$personal_info_model->ResidentialStatus=='Y')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> 
                    </tr>
          		 </table>
            </td>
            <td width="180">
            
            	 <table cellspacing="0" cellpadding="0" style="margin-left:10px;">
                    <tr>
                        <td width="160" style="padding:5px;" valign="top">Non-resident</td>
                        <td width="30" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (@$personal_info_model->ResidentialStatus=='N')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> </td> 
                    </tr>
                  </table>
            
            </td>
          </tr>
        </table>

    </td>
  </tr>
   <tr>
    <td rowspan="3" align="center" valign="top" style="border: 1px solid #000; padding:5px;">10</td>
    <td colspan="5" style="border: 1px solid #000;padding:5px;" valign="top">Tick on the box(es) below if you are:</td>
  </tr>
   <tr>
     <td width="6%" valign="top" style="border: 1px solid #000; padding:5px;" align="center">10A</td>
     <td width="35%" valign="top" style="border: 1px solid #000; padding:5px;">
         <table cellspacing="0" cellpadding="0" width="196" border="0" style="margin:0 5px;">
           <tr>
             <td width="79%" style="" valign="top" >
               A gazetted war-wounded freedom fighter
             </td>
             <td width="21%" style="">
             
             	<table cellspacing="0" cellpadding="0" width="100%" border="1" style=" margin-left:15px;">
                  <tr>
                    <td style="border: 1px solid #000; padding:5px; width:30px; height:25px;"><?php echo (@$personal_info_model->FreedomFighter=='Y')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                  </tr>
                </table>

             
             </td>
           </tr>
         </table>
     </td>
     <td style="border: 1px solid #000; padding:5px;" valign="top" align="center">10B</td>
     <td colspan="2" valign="top" style="border: 1px solid #000; padding:5px;">
     <table cellspacing="0" cellpadding="0" width="196" border="0" style="margin:0 5px;">
       <tr>
         <td width="335" style="padding:5px; height:25px" valign="top"> A person with disability </td>
         <td width="30" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (@$personal_info_model->Disability=='YES')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
       </tr>
      </table>
     </td>
   </tr>
   <tr>
     <td style="border: 1px solid #000; padding:5px;" valign="top" align="center">10C</td>
     <td style="border: 1px solid #000; padding:5px;" valign="top"><table cellspacing="0" cellpadding="0" width="196" border="0" style="margin:0 5px;">
       <tr>
         <td width="79%" style="padding:5px;" valign="top">Aged 65 years or more <p>&nbsp;</p> </td>
         <td width="21%">
           <?php
            //Date of birth
            $userDob = htmlentities(strip_tags(@$personal_info_model->DOB));
             
            //Create a DateTime object using the user's date of birth.
            $dob = new DateTime($userDob);
             
            //We need to compare the user's date of birth with today's date.
            $now = new DateTime();

            //Calculate the time difference between the two dates.
            $difference = $now->diff($dob);
             
            //Get the difference in years, as we are looking for the user's age.
            $age = $difference->y;
           ?>
         		<table cellspacing="0" cellpadding="0" width="100%" border="1" style=" margin-left:15px;">
                  <tr>
                    <td style="border: 1px solid #000; padding:5px; width:30px; height:25px;"><?php echo (@$age>=65)?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                  </tr>
                </table>
         </td>
       </tr>
     </table></td>
     <td style="border: 1px solid #000; padding:5px;" valign="top" align="center">10D</td>
     <td colspan="2" valign="top" style="border: 1px solid #000; padding:5px;"><table cellspacing="0" cellpadding="0" width="363" border="0" style="margin:0 5px;">
       <tr>
         <td width="88%" style="padding:5px;" valign="top">
          
     A parent/legal guardian of a person

with disability</td>
         <td width="8%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (@$personal_info_model->AnyDisabledChild=='Y')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
       </tr>
      </table>
     </td>
   </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">11</td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top">
      <?php 
        $dob = $personal_info_model->DOB;
        $dateList = explode('-', $dob);
        $year = str_split($dateList[0]);
        $month = str_split($dateList[1]);
        $day = str_split($dateList[2]);
      ?>
    	<table cellspacing="0" cellpadding="0" width="238" border="0">
          <tr>
            <td colspan="11" style="padding:5px;" valign="top">Date of birth(DD-MM-YYYY)</td>
            <td style="padding:5px;" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td style="padding:5px;" valign="top">&nbsp;</td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $day[0];?></td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $day[1];?></td>
            <td style="padding:5px;" valign="top">&nbsp;</td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $month[0];?></td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $month[1];?></td>
            <td style="padding:5px;" valign="top">&nbsp;</td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $year[0];?></td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $year[1];?></td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $year[2];?></td>
            <td style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $year[3];?></td>
            <td style="padding:5px;" valign="top">&nbsp;</td>
          </tr>
		</table>
    <?php
      // $this->taxYear();
      $tax_year = explode('-', htmlentities(strip_tags(@$this->taxYear())));
      $start_income_year = $tax_year[0]-1;
      $end_income_year = $tax_year[1]-1;
    ?>

    
    </td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">12</td>
    <td style="border: 1px solid #000; padding:5px;" valign="top" colspan="2">
    <table cellspacing="0" cellpadding="0" width="300" border="0">
      <tr>
        <td colspan="5" style="padding:5px;" valign="top"><p>Income Year </p></td>
        </tr>
      <tr>
        <td width="5%" style="padding:5px;" valign="top">&nbsp;</td>
        <td width="39%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $start_income_year ?></td>
        <td width="13%" align="center" style="padding:5px;" valign="top">to</td>
        <td width="39%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $end_income_year ?></td>
        <td width="4%" style="padding:5px;" valign="top">&nbsp;</td>
      </tr>
    </table>      <p>&nbsp;</p></td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">13 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" valign="top" colspan="5"><p>If employed, employer&rsquo;s name</p><h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->EmployerName)) ?></h5></td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">14 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" valign="top" colspan="2"><p>Spouse Name</p><h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->SpouseName)) ?></h5></td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">15 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" valign="top" colspan="2">Spouse TIN (if any)<h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->SpouseETIN))) ?></h5></td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">16 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top"><p>Father&rsquo;s Name</p> <h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->FathersName)) ?></h5></td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">17 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top"><p>Mother&rsquo;s Name</p> <h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->MothersName)) ?></h5></td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">18 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top"><p>Present Address</p>
      <br>
      <h5 style="font-weight: bold">
      <?php echo htmlentities(strip_tags(@$personal_info_model->PresentAddress)); ?><br/>
      <?php echo htmlentities(strip_tags(@$personal_info_model->Area)); ?><br/>
      <?php if (@$personal_info_model->ZipCode) {echo 'Post Code: ' . htmlentities(strip_tags(@$personal_info_model->ZipCode));} else {echo "<br>";}?>
      </h5>
    </td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">19 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; height:100px; padding:5px;" colspan="2" valign="top"><p>Permanent Address</p>
      <br>
      <h5 style="font-weight: bold">
        <?php
          if(@$personal_info_model->AddressSame == "1"){
            echo htmlentities(strip_tags(@$personal_info_model->PresentAddress)).'<br/>'.htmlentities(strip_tags(@$personal_info_model->Area)).'<br/>';
            if (@$personal_info_model->ZipCode) {echo 'Post Code: ' . htmlentities(strip_tags(@$personal_info_model->ZipCode));} else {echo "<br>";}
          }else{
            echo htmlentities(strip_tags(@$personal_info_model->PermanentAddress)); 
          }
        ?>
      </h5>
    </td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">20 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top"><p>Contact Telephone</p> <h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->Contact)) ?></h5></td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">21 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top">E-mail<h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->Email)) ?></h5></td>
  </tr>
   <tr>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">22 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top">National Identification Number <h5 style="font-weight: bold"><?php if(@$personal_info_model->NationalId != 0){echo @$this->_decode($personal_info_model->NationalId);} ?></h5></td>
    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top">23 <p>&nbsp;</p></td>
    <td style="border: 1px solid #000; padding:5px;" colspan="2" valign="top"><p>Business Identification  Number(s)</p><h5 style="font-weight: bold"><?php echo htmlentities(strip_tags(@$personal_info_model->BusinessIdentificationNumber)) ?></h5></td>
  </tr>
</table>
<!---------------- END OF PAGE 1 -------------->




<style>

	@media print and (-webkit-min-device-pixel-ratio:0) {
	h1 { font-family: sans-serif; font-style:italic}
	h2 { font-family: sans-serif;font-style:italic }
	h3 { font-family: sans-serif; font-style:italic}
	.blogtitle { font-family: sans-serif; font-style:italic}
	/* Any other classes or tags that use the custom font get the
	 * same treatment */
}
</style>