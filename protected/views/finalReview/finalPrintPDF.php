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

$investmentInsurancePremiumList = AssetsInvestment::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId,'InvestmentType'=> 'Insurance Premium'));
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
				<p style="font-weight:normal;font-size:12px;">www.nbr.gov.bd</p>
		  </td>
            
		  <td width="42%" style="padding:5px;" valign="top">&nbsp;</td>
			
            
	  <td width="32%" align="right" style="padding:5px;" valign="top">
		<p style="font-weight:bold; font-size:12px;"><strong>IT-11GA2016</strong></p>
			</td>
	  </tr>
	</tbody>
</table>

<h6 style="text-align:center;"><strong>RETURN OF INCOME<br />
</strong><span style="font-size:12px; font-weight:normal;">For an Individual Assessee</span></h6>
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
    <?php 
    $data82bbChecked = 1;
    if(isset($data82bb_info)){
        if($data82bb_info->checked==1){
          $data82bbChecked  =1;

        }else{
          $data82bbChecked  =0;
        }
    }?>
		<td  style="border: 1px solid #000;" valign="top">
    		<table cellspacing="0" cellpadding="0" style="margin-left:5px">
                    <tr>
                        <td width="120" valign="top" style="height:26px;">Yes</td>
                        <td width="30" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo ($data82bbChecked)?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> 
                    </tr>
          		 </table>
		</td>
           
		<td style="border: 1px solid #000;" valign="top">
        	<table cellspacing="0" cellpadding="0" style="margin-left:5px">
                    <tr>
                        <td width="120" style="height:26px;" valign="top">No</td>
                        <td width="30" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo ($data82bbChecked != 1 )?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> 
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

<pagebreak />

<!---------------- START OF PAGE 2 -------------->
<h6 style="text-align:center;"><strong><br /> 
  PART II<br />
</strong><span style="font-size:12px;">Particulars of Income and Tax</span></h6>
<?php 
  $eTin=str_split(htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN))));

?>
<?php
$totalIncomeSalaries = IncomeSalaries::model()->find(array('select' => ' SUM(NetTaxableIncome) as SumTaxableIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));
$totalTaxWaiver = IncomeSalaries::model()->find(array('select' => ' SUM(NetTaxWaiver) as NetTaxWaiver', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));
$totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array('select' => ' SUM(ShareOfIncome) as SumRentalIncome', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));
$totalIncomeShareProfit = IncomeShareProfit::model()->find(array('select' => ' SUM(NetValueOfShare) as SumValueOfShare', 'condition' => 'IncomeId=:data', 'params' => array(':data' => @$income_model->IncomeId)));

$IncomeOtherSourceData = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$income_model->IncomeId));


?>

<?php
$IncomeTaxRebateData = IncomeTaxRebate::model()->find('IncomeId=:data', array(':data' => @$income_model->IncomeId));
/*
$TotalIncomeTaxRebate = (@$IncomeTaxRebateData->LifeInsurancePremium + @$IncomeTaxRebateData->ProvidentFund + @$IncomeTaxRebateData->SCECProvidentFund + @$IncomeTaxRebateData->SuperAnnuationFund + @$IncomeTaxRebateData->InvestInStockOrShare + @$IncomeTaxRebateData->DepositPensionScheme + @$IncomeTaxRebateData->BenevolentFund + @$IncomeTaxRebateData->ZakatFund + @$IncomeTaxRebateData->Computer + @$IncomeTaxRebateData->Laptop + @$IncomeTaxRebateData->SavingsCertificates + @$IncomeTaxRebateData->BangladeshGovtTreasuryBond + @$IncomeTaxRebateData->DonationNLInstitutionFON + @$IncomeTaxRebateData->DonationCharityHospitalNBR + @$IncomeTaxRebateData->DonationOrganizationRetardPeople + @$IncomeTaxRebateData->ContributionNLInstituionLW + @$IncomeTaxRebateData->ContributionLiberationWarMuseum + @$IncomeTaxRebateData->ContributionAgaKhanDN + @$IncomeTaxRebateData->ContributionAsiaticSocietyBd + @$IncomeTaxRebateData->DonationICDDRB + @$IncomeTaxRebateData->DotationCRP + @$IncomeTaxRebateData->DonationEduInstitutionGov + @$IncomeTaxRebateData->ContributionAhsaniaMissionCancerHospital);
*/
$TotalIncomeTaxRebate = $income_model->IncomeTaxRebateTotal;

?>
<table cellspacing="0" cellpadding="0" width="100%" border="0" align="center">
  <tr>
    <td width="13%" style="padding:5px;" valign="top"><p>&nbsp;</p></td>
    <td width="5%" style="padding:5px;" valign="top">TIN:</td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[0]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[1]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[2]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[3]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[4]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[5]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[6]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[7]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[8]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[9]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[10]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[11]; ?></td>
    <td width="20%" style="padding:5px;" valign="top">&nbsp;</td>
  </tr>
</table>


<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0">
<tr>
	<td width="600" style="font-size:16px; font-weight:normal"><p>Particulars of Total Income</p></td>
    <td width="200" style="text-align:center;font-size:16px; font-weight:normal"><p>Amount(Tk)</p></td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td width="5%" align="center" style="padding:5px;font-size:13px;" valign="top">
				<p>24</p>
			</td>
			<td width="62%" style="padding:5px;font-size:13px;" valign="top">
				<p>Salaries (annex Schedule 24A)</p>
			</td>
			<td width="9%" align="center" style="padding:5px;font-size:13px;" valign="top">
				<p>S.21</p>
			</td>
			<td width="23%" style="padding:5px;font-size:13px;" valign="top">
        <?php echo ($totalIncomeSalaries->SumTaxableIncome == NULL) ? "" : $totalIncomeSalaries->SumTaxableIncome; ?>   
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>25</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Interest on securities</p>
			</td>
			<td width="9%" align="center" style="padding:5px;" valign="top">
				<p>S.22</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php echo @$this->totalOutputMain('InterestOnSecurities') +  @$IncomeOtherSourceData->SanchaypatraIncome; ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>26</p>
			</td>
			<td width="62%">
				<p>Income from house property (annex Schedule 24B)</p>
			</td>
			<td width="9%" align="center" style="padding:5px;" valign="top">
				<p>S.24</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php echo ($totalIncomeHouseProperties->SumRentalIncome == NULL) ? "" : $totalIncomeHouseProperties->SumRentalIncome; ?>   
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>27</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Agricultural income</p>
			</td>
			<td width="9%" align="center" style="padding:5px;" valign="top">
				<p>S.26</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php echo @$this->totalOutputMain('IncomeAgriculture'); ?>   
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>28</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Income from business or profession (annex Schedule 24C)</p>
			</td>
			<td width="9%" align="center" style="padding:5px;" valign="top">
				<p>S.28</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php 
            $Business82CTotal = @$income_82c->ContractorIncome_1 + @$income_82c->ClearingAndForwardingIncome_1 + @$income_82c->TravelAgentIncome_1 + @$income_82c->ImporterTaxCollection_1 + @$income_82c->KnitWovenExportIncome_1 + @$income_82c->OtherThanKnitWovenExportIncome_1;
            echo $TotalBusinessIncomeCheck = (@$this->totalOutputMain('IncomeBusinessOrProfession') + $Business82CTotal); 

          ?>   
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>29</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Capital gains</p>
			</td>
			<td width="9%" align="center" style="padding:5px;" valign="top">
				<p>S.31</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php echo (@$this->totalOutputMain('IncomeCapitalGains') + @$income_82c->PropertySaleIncome_1); ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>30</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Income from other sources</p>
			</td>
			<td width="9%" align="center" style="padding:5px;" valign="top">
				<p>S.33</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php 
          $OtherSource82CTotal = @$income_82c->RoyaltyIncome_1 + @$income_82c->SavingInstrumentInterestIncome_1 + @$income_82c->ExportCashSubsidyIncome_1 + @$income_82c->SavingAndFixedDepositInterestIncome_1 + @$income_82c->LotteryIncome_1;
          echo (@$this->totalOutputMain('IncomeOtherSource') + $OtherSource82CTotal - @$IncomeOtherSourceData->SanchaypatraIncome); 
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>31</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Share of income from firm or AOP</p>
			</td>
			<td width="9%" style="padding:5px;" valign="top">&nbsp;</td>
			<td width="23%" style="padding:5px;" valign="top"><?php echo @$this->totalOutputMain('IncomeShareProfit'); ?></td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>32</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Income of minor or spouse under section 43(4)</p>
			</td>
			<td width="9%" align="center" style="padding:5px;" valign="top">
				<p>S.43</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top"><?php echo @$this->totalOutputMain('IncomeSpouseOrChild'); ?></td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>33</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Foreign income</p>
			</td>
			<td width="9%" style="padding:5px;" valign="top">&nbsp;</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php 
          echo @$this->totalOutputMain('ForeignIncome');
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>34</p>
			</td>
			<td width="62%" style="padding:5px;" valign="top">
				<p>Total income (aggregate of 24 to 33)</p>
			</td>
			<td width="9%" style="padding:5px;" valign="top">&nbsp;</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php 
          if(!isset($ccpiid)){
           
            $ccpiid = Yii::app()->user->CPIId;
          }
          $totalIncome = $this->totalIncome($ccpiid) + @$this->totalOutputMain('ForeignIncome'); 
          echo $totalIncome;
        ?>
      </td>
		</tr>
	</tbody>
</table>
<br />
<br />
<table cellspacing="0" cellpadding="0">
<tr>
	<td width="600" style="font-size:16px; font-weight:normal"><p>Tax Computation and Payment</p></td>
    <td width="200" style="text-align:center;font-size:16px; font-weight:normal"><p>Amount(Tk)</p></td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>35</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Gross tax before tax rebate</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          $taxratio = $this->tempPayableTaxRatio($ccpiid,'');

          $hasmore = $this->getCapitalGainTaxAmountMore(@$income_model->IncomeId);
          if(!isset($ccpiid)){
           
            $ccpiid = Yii::app()->user->CPIId;
          }
          if($taxratio>1 && $hasmore){
            $TaxLeviableOnTotalIncome = $this->TempTaxLeviableOnTotalIncome($ccpiid);
          }else{

            $ActRebAmt = round($this->ActualRebateAmount($ccpiid,''));
            
            $TaxLeviableOnTotalIncome = $this->TaxLeviableOnTotalIncome($ccpiid);
          
            $GTotal = round(($TaxLeviableOnTotalIncome - $ActRebAmt));
            /*********Added for tax year2019-2020***********/

            $sCharge = $this->surCharge($GTotal,$ccpiid,'');
            $capitalg = $this->getCapitalGainTaxAmountWithin($ccpiid,$GTotal,@$income_model->IncomeId);
            $TaxLeviableOnTotalIncome += $capitalg;
            if($GTotal>0){
              $GTotal += $sCharge['surchargeAmount'];  
            }
          }

          
          echo round($TaxLeviableOnTotalIncome);
          
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>36</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Tax rebate (annex Schedule 24D)</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php 
          $ActualRebateAmount = round($this->ActualRebateAmount(Yii::app()->user->CPIId)); 
          echo $ActualRebateAmount;
        ?>   
      </td>
		</tr>
    <?php
      $GrandTotalPayableTax = round( ($TaxLeviableOnTotalIncome - $ActualRebateAmount) );
      // $surCharge = $this->surCharge($GrandTotalPayableTax);
    ?>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>37</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Net tax after tax rebate</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php echo $GrandTotalPayableTax; ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>38</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Minimum tax</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          if(!isset($ccpiid)){
           
            $ccpiid = Yii::app()->user->CPIId;
          }

           $minimumTaxValue = $this->minimumTaxValue($ccpiid);
          
           echo  $minimumTaxValue;
        ?>
      </td>
		</tr>
     <?php
      $maxValue = max($minimumTaxValue, $GrandTotalPayableTax);
      $surCharge = $this->surCharge($maxValue);
    ?>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>39</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Net wealth surcharge</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          
          echo $surCharge['surchargeAmount'];
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>40</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Interest or any other amount under the Ordinance (if any)</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>41</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Total amount payable</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          // $GrandTotalPayableTax += $surCharge['surchargeAmount'];
        /* new condiotion 2020*/
          $minusValue =0;
          if($minimumTaxValue>5000){
            $minusValue = $minimumTaxValue;
          }
          $maxValue = max($minimumTaxValue, $GrandTotalPayableTax);
          $grandTotalAmountPayable = $maxValue + $surCharge['surchargeAmount']+$minusValue;

          if($this->getCartax($ccpiid)>0 && $this->TaxWithoutCar($ccpiid) == 0){
            $grandTotalAmountPayable = $grandTotalAmountPayable  - $minimumTaxValue;
          }

          echo $grandTotalAmountPayable;
        ?>
      </td>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>42</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Tax deducted or collected at source (attach proof)</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          $tds = @$this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource') + @$income_model->Income82cTdsTotal;
          //$tds +=@$this->getallCaptialGainTds(@$income_model->IncomeId);
          echo $tds;
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>43</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Advance tax paid (attach proof)</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          echo @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance');
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>44</p>
			</td>
			<td width="71%">
				<p>Adjustment of tax refund [mention assessment year(s) of refund]</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
		  </td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php 
          echo @$income_model->AdjustmentTaxRefund;
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>45</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Amount paid with return (attach proof)</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          $total16c = ($grandTotalAmountPayable - (@$tds + @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance') + @$income_model->AdjustmentTaxRefund));
          if ($total16c < 0) $total16c = 0;
          echo $total16c;
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top" >
				<p>46</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Total amount paid and adjusted (42+43+44+45)</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php 
          // echo ($totalAdjustment > 0) ? $totalAdjustment : '';
         
          
          echo $total16 = (
            $tds+
            @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance')+
            @$total16c+
            @$income_model->AdjustmentTaxRefund
          );
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>47</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Deficit or excess (refundable) (41-46)</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          $gTAPt = ($grandTotalAmountPayable - $total16);
          if($this->getCartax($ccpiid)>$TaxLeviableOnTotalIncome &&  $gTAPt<0){
              $gTAPt = 0;
          }
          echo $gTAPt;
        ?>
      </td>
		</tr>
		<tr>
			<td width="5%" align="center" style="padding:5px;" valign="top">
				<p>48</p>
			</td>
			<td width="71%" style="padding:5px;" valign="top">
				<p>Tax exempted income</p>
			</td>
			<td width="23%" style="padding:5px;" valign="top">
        <?php
          $totalExemptedValue = $this->totalExemptedValue();
          echo $totalExemptedValue;
        ?>
      </td>
		</tr>
	</tbody>
</table>
<!---------------- END OF PAGE 2 -------------->

<pagebreak />

<!---------------- START OF PAGE 3 -------------->
<h6 style="text-align:center;"><strong><br /> 
  PART III<br />
</strong><span style="font-size:12px; font-weight:bold;">Instruction, Enclosures and Verification  </span></h6>

<table cellspacing="0" cellpadding="0" width="100%" border="0" align="center">
  <tr>
    <td width="13%" style="padding:5px;" valign="top"><p>&nbsp;</p></td>
    <td width="5%" style="padding:5px;" valign="top">TIN:</td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[0]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[1]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[2]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[3]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[4]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[5]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[6]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[7]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[8]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[9]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[10]; ?></td>
    <td width="3%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo $eTin[11]; ?></td>
    <td width="20%" >&nbsp;</td>
  </tr>
</table>
<br />

<table cellspacing="0" cellpadding="0" width="100%" border="0">
	<tbody>
		<tr>
			<td width="2%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">
				<p>49</p>		  </td>
			<td colspan="4" style="border: 1px solid #000; padding:5px;" valign="top">
				<p><b style="font-weight:bold">Instructions</strong></b>
				<p style="font-weight:normal;">1. Statement of assets, liabilities and expenses (IT-10B2016) and statement of life style expense (IT-10BB2016) must be furnished with the return unless you are exempted from furnishing such statement(s) under section 80.</p>
				<p style="font-weight:normal;">2. Proof of payments of tax, including advance tax and withholding tax and the proof of investment for tax rebate must be provided along with return.</p>
				<p style="font-weight:normal;">3. Attach account statements and other documents where applicable</p>		  </td>
		</tr>
		<tr>
			<td width="2%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">
				<p>50</p>		  </td>
		  <td colspan="4" valign="top"  style="border: 1px solid #000; padding:0 7px;" ><table cellspacing="0" cellpadding="0" width="100%" border="0">
            <tr>
              <td style="border-right:1px solid #000;">If you are a parent of a person with disability, has your spouse availed the extended tax exemption threshold? (tick one)</td>
              <td style="border-right:1px solid #000; padding:5px;" valign="top">
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tr>
                      <td width="40" valign="top">Yes</td>
                      <td style="border:1px solid #000; width:30px; height:25px;"><?php echo (@$personal_info_model->Status=='Married' && @$personal_info_model->AnyDisabledChild=='Y' && @$personal_info_model->AvailChildDisabilityExemp == 'Y')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                    </tr>
                </table>
              </td>
              <td style="padding:5px;" valign="top">
                <table cellspacing="0" cellpadding="0" width="100%" border="0">
                    <tr>
                      <td width="40" valign="top">No</td>
                      <td style="border:1px solid #000; width:30px; height:25px;"><?php echo ((@$personal_info_model->Status=='Married' && @$personal_info_model->AnyDisabledChild=='Y'  && @$personal_info_model->AvailChildDisabilityExemp == 'N'))?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                    </tr>
                </table>
              </td>
            </tr>
          </table></td>
      </tr>
		<tr>
			<td width="2%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">
				<p>51</p>		  </td>
		  <td colspan="4" valign="top"  style="border: 1px solid #000; padding:0 7px;"><table cellspacing="0" cellpadding="0" width="100%" border="0">
            <tr>
              <td style="border-right:1px solid #000;">Are you required to submit a statement of assets, liabilities and expenses (IT-10B2016) under section 80(1)? (tick one)</td>
              <td style="border-right:1px solid #000; padding:5px;" valign="top"><table cellspacing="0" cellpadding="0" width="100%" border="0">
                  <tr>
                    <td width="40" valign="top">Yes</td>
                    <!-- <td style="border:1px solid #000; width:30px; height:25px;"><?php //echo (!empty($shareholdingCompanyList) || !empty($nonAgriculturePropertyList) || !empty($AgriculturePropertyList))?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> -->
                    <td style="border:1px solid #000; width:30px; height:25px;"><?php echo ($totalAssets>4000000)?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                  </tr>
              </table></td>
              <td style="padding:5px;" valign="top"><table cellspacing="0" cellpadding="0" width="100%" border="0">
                  <tr>
                    <td width="40" valign="top">No</td>
                    <!-- <td style="border:1px solid #000; width:30px; height:25px;"><?php //echo (empty($shareholdingCompanyList) && empty($nonAgriculturePropertyList) && empty($AgriculturePropertyList))?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td> -->
                    <td style="border:1px solid #000; width:30px; height:25px;"><?php echo ($totalAssets<=4000000)?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
      </tr>
		<tr>
			<td width="2%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">
				<p>52</p>		  </td>
			<td width="29%" style="border: 1px solid #000; padding:5px;" valign="top">
			  <p>Schedules annexed</p>
				<p style="font-weight:normal;">(tick all that are applicable)</p>		  </td>
	  <td width="69%" colspan="3" valign="top" style="border: 1px solid #000; padding:5px;">
			<table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td width="10%" style="padding:5px;" valign="top">&nbsp;</td>
                    <td width="10%" style="border: 1px solid #000;padding:5px;" valign="top">24A</td>
                    <td width="10%" style="border: 1px solid #000; padding:5px;" valign="top"><?php echo (is_null($totalIncomeSalaries->SumTaxableIncome))?'&nbsp;':'<img border="0" width="20px" src="'.$tick.'" >';  ?></td>
                    <td width="10%" style="padding:5px;" valign="top">&nbsp;</td>
                    <td width="10%" style="border: 1px solid #000; padding:5px;" valign="top">24B</td>
                    <td width="10%" style="border: 1px solid #000; padding:5px;" valign="top"><?php 
                    echo (sizeof($income_house_model)>0)?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;';  ?></td>
                    <td width="10%" style="padding:5px;" valign="top">&nbsp;</td>
                    <td width="10%" style="border: 1px solid #000; padding:5px;" valign="top">24C</td>
                    <td width="10%" style="border: 1px solid #000; padding:5px;" valign="top"><?php 
                    echo ($income_model['IncomeBusinessOrProfessionConfirm']=='Yes' && $TotalBusinessIncomeCheck)?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;';  ?></td>
                    <td width="10%" style="padding:5px;" valign="top">&nbsp;</td>
                    <td width="10%" style="border: 1px solid #000; padding:5px;" valign="top">24D</td>
                    <td width="10%" style="border: 1px solid #000; padding:5px;" valign="top"><?php 
                    echo ($income_model['IncomeTaxRebateConfirm']=='Yes')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;';  ?></td>
                     <td width="5" style="padding:5px;" valign="top">&nbsp;</td>
                  </tr>
        </table>          
                </td>
	  </tr>
		<tr>
			<td width="2%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">
				<p>53</p>		  </td>
			<td width="29%" style="border: 1px solid #000;padding:5px;" valign="top">
			  <p>Statements annexed</p>
				<p style="font-weight:normal;">(tick all that are applicable)</p>		  </td>
<td colspan="3" style="border: 1px solid #000; padding:7px 10px 7px 7px;"  valign="top">
            
            	<table cellspacing="0" cellpadding="0" width="100%"  style="margin-left:18px;">
                  <tr>
                    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top" width="110">IT-10B2016</td>
                    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top"  width="30"><?php echo '<img border="0" width="20px" src="'.$tick.'" >';?></td>
                    <td  width="68">&nbsp;</td>
                    <td style="border: 1px solid #000; padding:5px;" align="center" valign="top"  width="110">IT-10BB2016</td>
                    <td style="border: 1px solid #000; padding:5px; " align="center" valign="top"  width="30"><?php echo '<img border="0" width="20px" src="'.$tick.'" >';?></td>
                  </tr>
                </table>          </td>
		</tr>
		<tr>
			<td width="2%" style="border: 1px solid #000; padding:5px;" align="center" valign="top">
				<p>54</p>		  </td>
			<td colspan="4" style="border: 1px solid #000; padding:5px;" valign="top">
				<p>Other statements, documents, etc. attached (list all)</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>		  </td>
		</tr>
	</tbody>
</table>

<h6 style="text-align:center;">Verification and signature</h6>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td rowspan="3" width="5%" style="padding:5px;" valign="top">
				<p>55</p>
			</td>
			<td colspan="2" width="94%" style="padding:5px;" valign="top">
				<p><b style="font-weight:bold">Verification</strong></b>
				<p style="font-weight:normal;">I solemnly declare that to the best of my knowledge and belief the information given in this return and statements and documents annexed or attached herewith are correct and complete.</p>
			</td>
		</tr>
		<tr>
			<td width="48%" style="padding:5px;" valign="top">
				Name<br />
                <p><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></p>
                <p>&nbsp;</p>
				
			</td>
			<td width="45%" style="padding:5px;" valign="top">
				Signature<br />
        <?php if(isset($signature->signature)){?>
              <img style="height:50px;" src="<?php echo $signature->signature;?>" />
        <?php }else{?>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
        <?php } ?>
				
			</td>
		</tr>
		<tr>
			<td width="48%" style="padding:5px;" valign="top">
				<p>Date of Signature (DD-MM-YYYY)</p>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" cellpadding="2" cellspacing="2" style="padding-top:10px;">
                  <tr>
                 
                    <td width="12%" style="border:1px solid #000; padding:5px;"  align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">2</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">0</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%" style="padding:5px;" valign="top">&nbsp;</td>
                    <td width="2%" style="padding:5px;" valign="top">&nbsp;</td>
                  </tr>
                </table>
            </td>
			<td width="45%" style="padding:5px; border:1px solid" valign="top">
				<p>Place of Signature&nbsp;</p>
        
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        
                
			</td>
		</tr>
	</tbody>
</table>

<h6 style="text-align:center;"><strong><br /> 
  For official use only<br />
</strong><span style="font-size:12px; font-weight:normal;">Return Submission Information</span></h6>
<table cellspacing="0" cellpadding="0" width="100%" >
	<tbody>
		<tr>
		  <td width="54%" style="border:1px solid #000; padding:10px;" valign="top">
			 <p>Date of Submission(DD-MM-YYYY)</p>
             <p>&nbsp;</p>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" cellpadding="2" cellspacing="2" style="padding-top:10px;">
                  <tr>
                 
                    <td width="12%" style="border:1px solid #000; padding:5px;"  align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">2</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">0</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%" style="padding:5px;" valign="top">&nbsp;</td>
                    <td width="2%" style="padding:5px;" valign="top">&nbsp;</td>
                  </tr>
                </table>
          </td>
			<td width="45%" style="border:1px solid #000;padding:10px;" valign="top">
				<p>Tax Office Entry Number</p>
                <p>&nbsp;</p>
				<table cellspacing="0" cellpadding="0" width="100%" border="0" cellpadding="2" cellspacing="2" style="padding-top:10px;">
				  <tr>
				    <td width="15%" style="border:1px solid #000; padding:5px;"  align="center" valign="top">&nbsp;</td>
                    <td width="1%">&nbsp;</td>
				    <td width="15%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
				    <td width="1%">&nbsp;</td>
				    <td width="15%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="1%">&nbsp;</td>
				    <td width="15%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
				    <td width="1%">&nbsp;</td>
				    <td width="15%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="1%">&nbsp;</td>
				    <td width="15%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="1%">&nbsp;</td>
                    <td width="1%">&nbsp;</td>

	
			      </tr>
			  </table></td>
		</tr>
	</tbody>
</table>
<!---------------- END OF PAGE 3 -------------->

<pagebreak />

<!---------------- START OF PAGE 4 -------------->
<table cellspacing="0" cellpadding="0" width="100%">
	<tbody>
		<tr>
			<td width="23%" align="center" style="font-size:11px; padding:5px;" valign="top">
				<p>National Board of Revenue</p>
				<p style="font-weight:normal;">www.nbr.gov.bd</p>
		  </td>
            
		  <td width="40%" style="padding:5px;" valign="top">&nbsp;</td>
			
            
	  <td width="32%" align="right" style="padding:5px;" valign="top">
		<p><b style="font-weight:bold;">Individual</strong></b>
		  </td>
	  </tr>
	</tbody>
</table>

<h6 style="text-align:center;"><strong>ACKNOWLEDGEMENT RECEIPT OF <br />
</strong><span>RETURN OF INCOME</span></h6>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td rowspan="2" width="50%" style="padding:10px;" valign="top">
		    <p>Assessment Year</p>
		    <table cellspacing="0" cellpadding="0" width="100%">
		      <tr>
		        <td width="45" style="border:1px solid #000; padding:5px;" valign="top">2</td>
		        <td width="45" style="border:1px solid #000; padding:5px;" valign="top">0</td>
		        <td width="45" style="border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[2];?></td>
		        <td width="45" style="border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[3];?></td>
		        <td align="center" width="45" style="padding:5px;" valign="top">-</td>
		        <td width="45" style="border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[7];?></td>
		        <td width="45" style="border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[8];?></td>
	          </tr>
		      </table>
		   </td>
			<td colspan="2" width="49%" style="border:1px solid #000;text-align:center;" valign="top">
				<p>Return under section 82BB? (tick one)</p>
			</td>
		</tr>
		<tr>
			<td width="23%" style="border:1px solid #000; padding:5px 0 5px 5px; " valign="top">
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td width="70" valign="top" style="padding:0px;">Yes</td>
                    <td width="10" valign="top">&nbsp;</td>
                    <td width="30" style="border:1px solid #000; height:25px; text-align:center" valign="top"><?php echo ($data82bb_info->checked==1 && isset($data82bb_info))?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                  </tr>
                </table>

			</td>
			<td width="23%" style="border:1px solid #000; padding:5px 0 5px 5px;" valign="top">
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td width="70" valign="top" style="padding-top:0px;">No</td>
                    <td width="10" valign="top">&nbsp;</td>
                    <td width="30" style="border:1px solid #000; height:25px; text-align:center" valign="top"><?php echo ($data82bb_info->checked != 1 || !isset($data82bb_info))?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;'; ?></td>
                  </tr>
                </table>

			</td>
		</tr>
		<tr>
			<td colspan="3" width="100%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Name of the Assessee</p>
				<p><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></p>
			</td>
		</tr>
		<tr>
			<td width="50%"  style="border:1px solid #000; padding:10px;" valign="top">
				<p>Twelve-digit TIN</p>
        <p><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN))); ?></p>
			</td>
			<td colspan="2" width="49%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Old TIN</p>
                <p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="50%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Circle</p>
        <p><?php echo htmlentities(strip_tags(@$personal_info_model->TaxesCircle))?></p>
      </td>
      <td colspan="2" width="49%" style="border:1px solid #000; padding:10px;" valign="top">
        <p>Taxes Zone</p>
        <p><?php echo htmlentities(strip_tags(@$personal_info_model->TaxesZone))?></p>
			</td>
		</tr>
		<tr>
			<td colspan="3" width="100%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Total income shown (serial 34)</p>
				<p>Tk 
          <?php 
            echo $totalIncome;
          ?>
        </p>
        <p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="50%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Amount payable (serial 41)</p>
				<p>Tk 
          <?php
            $GrandTotalPayableTax += $surCharge['surchargeAmount'];
            echo $GrandTotalPayableTax;
          ?>
        </p>
              <p>&nbsp;</p>
			</td>
			<td colspan="2" width="49%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Amount paid and adjusted (serial 46)</p>
				<p >Tk 
          <?php 
            // echo ($totalAdjustment > 0) ? $totalAdjustment : '';
            echo $total16 = (
              $tds+
              @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance')+
              @$total16c+
              @$income_model->AdjustmentTaxRefund
              -$minusValue
            );
          ?>
        </p>
        <p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="50%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Amount of net wealth shown in IT10B2016</p>
				<p>Tk <?php echo ($totalAssets - $totalLiabilities);?></p>
			</td>
			<td colspan="2" width="49%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Amount of net wealth surcharge paid</p>
				<p>Tk 
          <?php
            $GrandTotalPayableTax = round( ($TaxLeviableOnTotalIncome - $ActualRebateAmount) );
            $surCharge = $this->surCharge($GrandTotalPayableTax);
            echo $surCharge['surchargeAmount'];
          ?>
        </p>
              <p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="50%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Date of Submission(DD-MM-YYYY)</p>
                <table cellspacing="0" cellpadding="0" width="100%" border="0" cellpadding="2" cellspacing="2" style="padding-top:10px;">
                  <tr>
                 
                    <td width="12%" style="border:1px solid #000; padding:5px;"  align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">2</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">0</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="12%" style="border:1px solid #000; padding:5px;" align="center" valign="top">&nbsp;</td>
                    <td width="2%" style="padding:5px;" valign="top">&nbsp;</td>
                    <td width="2%" style="padding:5px;" valign="top">&nbsp;</td>
                  </tr>
                </table>
                
                </td>
			<td colspan="2" width="49%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Tax Office Entry Number</p>
                <p>&nbsp;</p>
			</td>
		</tr> 
		<tr>
			<td colspan="3" width="100%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Signature and seal of the official receiving the return</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="50%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Date of Signature</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
			</td>
			<td colspan="2" width="49%" style="border:1px solid #000; padding:10px;" valign="top">
				<p>Contact Number of Tax Office</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>

<!---------------- END OF PAGE 4 -------------->

<pagebreak />

<!---------------- START OF PAGE 5 -------------->

<h5 style="text-align:center">SCHEDULE 24A</h5>
<h6 style="text-align:center; font-weight:normal;">Particulars of income from Salaries</h6>
<h6 style="text-align:center;font-weight:normal;"><em>Annex this Schedule to the return of income if you have income from Salaries</em></h6>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td width="5%" style="padding:10px;border:1px solid #000;">
				<p>01</p>
			</td>
	  	  <td width="40%" style="padding:10px; border:1px solid #000;">
	    	<p>Assessment Year</p>
           	  <table cellspacing="0" cellpadding="0" width="320" border="0">
                <tr>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;">2</td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;">0</td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[2];?></td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[3];?></td>
                  <td align="center" width="14%">-</td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[7];?></td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[8];?></td>
                </tr>
              </table>
            </td>
			<td width="5%" style="padding:10px;border:1px solid #000;"><p>02</p>
			</td>
			<td width="48%" style="padding:10px;border:1px solid #000;">
				<p>TIN</p>
        <h5><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></h5>
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<?php if ($personal_info_model->GovernmentEmployee == 'Y') {

  $this->renderPartial('_incomeSalaries_public_PDF', array('income_salaries_model' => $income_salaries_model));
} else {
  $this->renderPartial('_incomeSalaries_private_PDF', array('income_salaries_model' => $income_salaries_model));
}
?>
<h5 style="padding-left:20px; font-weight:normal;">All figures of amount are in taka (Tk)</h5>

<table cellspacing="0" cellpadding="0" border="1" width="100%">
	<tr>
    	<td style="width:50%; padding:10px;">
        	Name
          <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
        	<p>&nbsp;</p>
        </td>
        <td style="width:50%; padding:10px;">
       	   Signature & Date
           <?php if(isset($signature->signature)){?>
              <img style="height:50px" src="<?php echo $signature->signature;?>" />
           <?php }else{?>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
           <?php } ?>
        </td>
    </tr>
    
</table>

<!---------------- END OF PAGE 5 -------------->

<pagebreak />

<!---------------- START OF PAGE 6 -------------->

<h5 style="text-align:center;">SCHEDULE 24B</h5>
<p style="text-align:center; font-weight:normal; font-size:13px; padding:0px;">Particulars of income from house property</p>
<p style="text-align:center; font-weight:normal; font-size:13px; padding:0px;"><em>Annex this Schedule to the return of income if you have income from house property</em></p>
<br/>
<table cellspacing="0" cellpadding="0" width="618">
	<tbody>
		<tr>
			<td width="42" style="border:1px solid #000; text-align:center;" valign="top">
				<p>01</p>
			</td>
			<td width="264" style="border:1px solid #000; padding:5px" valign="top">
				<p>Assessment Year</p>
		        <table cellspacing="0" cellpadding="0" width="320" border="0">
                  <tr>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000;" valign="top">2</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000;" valign="top">0</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[2];?></td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[3];?></td>
                    <td align="center" width="14%">-</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[7];?></td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[8];?></td>
                  </tr>
                </table>
		        <p><br />
          </p></td>
	    <td width="42" style="border:1px solid #000;text-align:center; padding:5px" valign="top">
				<p>02</p>
		</td>
        <td width="270" style="border:1px solid #000; padding:5px" valign="top">
       	  <p>TIN</p>
          <h5><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></h5>
        </td>
		</tr>
	</tbody>
</table>
<br />
<b style="font-weight:normal; padding-top:10px;">For each house property</b>
<?php
if(empty($income_house_model)){
?>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
  <tbody>
    <tr>
      <td rowspan="3" width="41" align="center" style="padding:5px;" valign="top" >
        <p>03</p>
      </td>
      <td colspan="4" width="577" style="padding:5px;" valign="top">
        <p><strong style="font-weight:bold;">Description of the house property</strong></p>
      </td>
    </tr>
    <tr>
      <td rowspan="2" width="40" style="padding:5px;" valign="top">
        <p>03A</p>
        <p>&nbsp;</p>
                <p>&nbsp;</p>

      </td>
      <td rowspan="2" width="225" style="padding:5px;" valign="top">
        <p>Address of the property
        </p>
        <br>
         <p>
           <?php echo htmlentities(strip_tags(@$income_house_model_value->AdressOfProperty)); ?>
         </p>
      </td>
      <td width="42" style="padding:5px;" valign="top">
        <p>03B</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

      </td>
      <td width="270" style="padding:5px;" valign="top">
        <p>Total area</p>
        <p><?php echo htmlentities(strip_tags(@$income_house_model_value->AreaOfProperty)); ?></p>
      </td>
    </tr>
    <tr>
      <td width="42" style="padding:5px;" valign="top">
        <p>03C</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

      </td>
      <td width="270" style="padding:5px;" valign="top">
        <p>Share of the asessee (%)</p>
        <p><?php echo htmlentities(strip_tags(@$income_house_model_value->ShareOfProperty)); ?></p>
      </td>
    </tr>
  </tbody>
</table>
<br />
<table cellspacing="0" cellpadding="0" width="100%" border="1">
  <tbody>
    <tr>
      <td colspan="3" width="480" style="padding:5px;" valign="top">
        <p>Income from house property</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p>Amount(TK)</p>
      </td>
    </tr>
    <tr>
      <td width="41" style="padding:5px;" valign="top">
        <p>04</p>
      </td>
      <td colspan="2" width="439" style="padding:5px;" valign="top">
        <p>Annual Value</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->AnnualRentalIncome ?></p>
      </td>
    </tr>
    <tr>
      <td rowspan="8" width="41" style="padding:5px;" valign="top">
        <p>05</p>
      </td>
      <td colspan="2" width="439" style="padding:5px;" valign="top">
        <p>Deductions (aggregate of 05A to 05G)</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td width="37" style="padding:5px;" valign="top">
        <p>05A</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>Repair, Collection, etc.</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->Repair ?></p>
      </td>
    </tr>
    <tr>
      <td width="37" style="padding:5px;" valign="top">
        <p>05B</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>Municipal or Local Tax</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->MunicipalOrLocalTax ?></p>
      </td>
    </tr>
    <tr>
      <td width="37" style="padding:5px;" valign="top">
        <p>05C</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>Land Revenue</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->LandRevenue ?></p>
      </td>
    </tr>
    <tr>
      <td width="37" style="padding:5px;" valign="top">
        <p>05D</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>Interest on Loan/Mortgage/Capital Charge&nbsp;&nbsp;</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->LoanInterestOrMorgageOrCapitalCrg ?></p>
      </td>
    </tr>
    <tr>
      <td width="37" style="padding:5px;" valign="top">
        <p>05E</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>Insurance Premium</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->InsurancePremium ?></p>
      </td>
    </tr>
    <tr>
      <td width="37" style="padding:5px;" valign="top">
        <p>05F</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>Vacancy Allowance</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->VacancyAllowence ?></p>
      </td>
    </tr>
    <tr>
      <td width="37" style="padding:5px;" valign="top">
        <p>05G</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>Other, if any</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->Others ?></p>
      </td>
    </tr>
    <tr>
      <td width="41" style="padding:5px;" valign="top">
        <p>06</p>
      </td>
      <td colspan="2" width="439" style="padding:5px;" valign="top">
        <p>Income from house property (04-05)</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo @$income_house_model_value->NetIncome ?></p>
      </td>
    </tr>
    <tr>
      <td width="41" style="padding:5px;" valign="top">
        <p>07</p>
      </td>
      <td colspan="2" width="439" style="padding:5px;" valign="top">
        <p>In case of partial ownership, the share of income</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p><?php echo htmlentities(strip_tags(@$income_house_model_value->ShareOfIncome)); ?></p>
      </td>
    </tr>
  </tbody>
</table>
<br />
<?php 
}else{
foreach ($income_house_model as $income_house_model_key => $income_house_model_value) { ?>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td rowspan="3" width="41" align="center" style="padding:5px;" valign="top" >
				<p>03</p>
			</td>
			<td colspan="4" width="577" style="padding:5px;" valign="top">
				<p><strong style="font-weight:bold;">Description of the house property</strong></p>
			</td>
		</tr>
		<tr>
			<td rowspan="2" width="40" style="padding:5px;" valign="top">
				<p>03A</p>
				<p>&nbsp;</p>
                <p>&nbsp;</p>

			</td>
			<td rowspan="2" width="225" style="padding:5px;" valign="top">
				<p>Address of the property
        </p>
        <br>
         <p>
           <?php echo htmlentities(strip_tags(@$income_house_model_value->AdressOfProperty)); ?>
         </p>
			</td>
			<td width="42" style="padding:5px;" valign="top">
				<p>03B</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

			</td>
			<td width="270" style="padding:5px;" valign="top">
        <p>Total area</p>
				<p><?php echo htmlentities(strip_tags(@$income_house_model_value->AreaOfProperty)); ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px;" valign="top">
				<p>03C</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

			</td>
			<td width="270" style="padding:5px;" valign="top">
        <p>Share of the asessee (%)</p>
				<p><?php echo htmlentities(strip_tags(@$income_house_model_value->ShareOfProperty)); ?></p>
			</td>
		</tr>
	</tbody>
</table>
<br />
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td colspan="3" width="480" style="padding:5px;" valign="top">
				<p>Income from house property</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p>Amount(TK)</p>
			</td>
		</tr>
		<tr>
			<td width="41" style="padding:5px;" valign="top">
				<p>04</p>
			</td>
			<td colspan="2" width="439" style="padding:5px;" valign="top">
				<p>Annual Value</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->AnnualRentalIncome ?></p>
			</td>
		</tr>
		<tr>
			<td rowspan="8" width="41" style="padding:5px;" valign="top">
				<p>05</p>
			</td>
			<td colspan="2" width="439" style="padding:5px;" valign="top">
				<p>Deductions (aggregate of 05A to 05G)</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="37" style="padding:5px;" valign="top">
				<p>05A</p>
			</td>
			<td width="402" style="padding:5px;" valign="top">
				<p>Repair, Collection, etc.</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->Repair ?></p>
			</td>
		</tr>
		<tr>
			<td width="37" style="padding:5px;" valign="top">
				<p>05B</p>
			</td>
			<td width="402" style="padding:5px;" valign="top">
				<p>Municipal or Local Tax</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->MunicipalOrLocalTax ?></p>
			</td>
		</tr>
		<tr>
			<td width="37" style="padding:5px;" valign="top">
				<p>05C</p>
			</td>
			<td width="402" style="padding:5px;" valign="top">
				<p>Land Revenue</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->LandRevenue ?></p>
			</td>
		</tr>
		<tr>
			<td width="37" style="padding:5px;" valign="top">
				<p>05D</p>
			</td>
			<td width="402" style="padding:5px;" valign="top">
				<p>Interest on Loan/Mortgage/Capital Charge&nbsp;&nbsp;</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->LoanInterestOrMorgageOrCapitalCrg ?></p>
			</td>
		</tr>
		<tr>
			<td width="37" style="padding:5px;" valign="top">
				<p>05E</p>
			</td>
			<td width="402" style="padding:5px;" valign="top">
				<p>Insurance Premium</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->InsurancePremium ?></p>
			</td>
		</tr>
		<tr>
			<td width="37" style="padding:5px;" valign="top">
				<p>05F</p>
			</td>
			<td width="402" style="padding:5px;" valign="top">
				<p>Vacancy Allowance</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->VacancyAllowence ?></p>
			</td>
		</tr>
		<tr>
			<td width="37" style="padding:5px;" valign="top">
				<p>05G</p>
			</td>
			<td width="402" style="padding:5px;" valign="top">
				<p>Other, if any</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->Others ?></p>
			</td>
		</tr>
		<tr>
			<td width="41" style="padding:5px;" valign="top">
				<p>06</p>
			</td>
			<td colspan="2" width="439" style="padding:5px;" valign="top">
				<p>Income from house property (04-05)</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo @$income_house_model_value->NetIncome ?></p>
			</td>
		</tr>
		<tr>
			<td width="41" style="padding:5px;" valign="top">
				<p>07</p>
			</td>
			<td colspan="2" width="439" style="padding:5px;" valign="top">
				<p>In case of partial ownership, the share of income</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p><?php echo htmlentities(strip_tags(@$income_house_model_value->ShareOfIncome)); ?></p>
			</td>
		</tr>
	</tbody>
</table>
<br />




<?php 
      if((sizeOf($income_house_model)-1)!=$income_house_model_key){
        echo '<pagebreak />';
      }

  // if($income_house_model_value->IncomePropertiesId != end($income_house_model)->IncomePropertiesId){
  //   echo '<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> ';
  //   }
  } 
}
?>
<p style="font-weight:normal;">Provide information if income from more than one house property</p>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td rowspan="4" width="37" style="padding:5px;" valign="top">
				<p>08</p>
			</td>
			<td colspan="2" width="443" style="padding:5px;" valign="top">
				<p>Aggregate of income of all house properties (1+2+3+- - - )</p>
				<p style="font-weight:normal;">(provide additional papers if necessary)</p>
			</td>
			<td width="138" style="padding:5px;" valign="top">
				<p>Tk <?php echo @$totalIncomeHouseProperties->SumRentalIncome; ?></p>
			</td>
		</tr>
   
    <tr>
      <td width="41" style="padding:5px;" valign="top">
        <p>1</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>(Income from house property 1)</p>
                <p>&nbsp;</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p>Tk <?php echo $income_house_model[0]->ShareOfIncome; ?></p>
      </td>
    </tr>

    <tr>
      <td width="41" style="padding:5px;" valign="top">
        <p>2</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>(Income from house property 2)</p>
                <p>&nbsp;</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p>Tk <?php echo $income_house_model[1]->ShareOfIncome; ?></p>
      </td>
    </tr>
    <tr>
      <td width="41" style="padding:5px;" valign="top">
        <p>3</p>
      </td>
      <td width="402" style="padding:5px;" valign="top">
        <p>(Income from house property 3)</p>
                <p>&nbsp;</p>
      </td>
      <td width="138" style="padding:5px;" valign="top">
        <p>Tk <?php echo $income_house_model[2]->ShareOfIncome; ?></p>
      </td>
    </tr>
		
	</tbody>
</table>
<br />
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td width="50%" style="padding:5px;" valign="top">
				<p>Name&nbsp;</p>
        <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
				<p>&nbsp;</p>

		  </td>
			<td width="50%" style="padding:5px;" valign="top">
				<p>Signature &amp; Date</p>
				<?php if(isset($signature->signature)){?>
              <img style="height:50px" src="<?php echo $signature->signature;?>" />
           <?php }else{?>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
           <?php } ?>

			</td>
		</tr>
	</tbody>
</table>

<!---------------- END OF PAGE 6 -------------->

<pagebreak />

<!---------------- START OF PAGE 7 -------------->

<?php
  // var_dump(sizeOf($income_businesss_profession_details));die;
    if(sizeOf($income_businesss_profession_details)>0){
      foreach ($income_businesss_profession_details as $key => $value) {
?>
<h5 style="text-align: center;">SCHEDULE 24C</h5>
<h6 style="text-align: center; font-weight:normal;">Summary of income from business or profession</h6>
<h6 style="text-align: center; font-weight:normal;">To be annexed to return by an assessee having income from business or profession</h6>
<p>&nbsp;</p>
<table width="618">
  <tbody>
    <tr>
      <td width="42" style="border:1px solid #000; text-align:center; padding:0 5px 7px 5px;" valign="top">
        <p>01</p>
      </td>
      <td width="264" style="border:1px solid #000; padding:5px" valign="top">
        <p>Assessment Year</p>
            <table width="320" border="0">
                  <tr>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top">2</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top">0</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[2];?></td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px" valign="top"><?php echo $tax_year_stripe[3];?></td>
                    <td align="center" width="14%" style="padding:5px;" valign="top">-</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px" valign="top"><?php echo $tax_year_stripe[7];?></td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px" valign="top"><?php echo $tax_year_stripe[8];?></td>
                  </tr>
                </table>
            <p><br />
          </p></td>
      <td width="42" style="border:1px solid #000;text-align:center; padding:0 5px 7px 5px;" valign="top">
        <p>02</p>
    </td>
        <td width="270" style="border:1px solid #000; padding:5px" valign="top">
          <p>TIN</p>
          <h5><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></h5>
        </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="100%"  border="1">
  <tbody>
    <tr>
      <td width="42" style="padding:5px;" valign="top">
        <p>03</p>
      </td>
      <td colspan="3" width="576" style="padding:5px;" valign="top">
        <p>Type of main business or profession&nbsp; : </p>
        <p><?php 

          if(@$value->Type == 'IncomeFromBusiness1'){
            echo 'Income From Business 1';
          }
          if(@$value->Type == 'IncomeFromBusiness2'){
            echo 'Income From Business 2';
          }
          if(@$value->Type == 'IncomeFromBusiness3'){
            echo 'Income From Business 3';
          }

        ?></p>
      </td>
    </tr>
    <tr>
      <td width="42" style="padding:3px;" valign="top">
        <p>04</p>
      </td>
      <td width="285" style="padding:3px;" valign="top">
        <p>Name(s) of the business or profession (as in trade licence)</p>
        <p><?php echo @$value->BusinessOrProfessionName; ?></p>
        <p>&nbsp;</p>
      </td>
      <td width="42" style="padding:3px;" valign="top">
        <p>05</p>
        <p>&nbsp;</p>
      </td>
      <td width="249" style="padding:3px;" valign="top">
        <p>Address(es)</p>
        <p><?php echo @$value->Address; ?></p>
      </td>
    </tr>
  </tbody>
</table>
<p style="font-weight:normal;">Use serial numbers if more names and addresses</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<table width="100%">
  <tbody>
    <tr>
      <td colspan="2" width="456" style="padding:3px;" valign="top">
        <p>&nbsp; Summary of Income</p>
      </td>
      <td width="162" style="padding:3px;" valign="top">
        <p>Amount(Tk)</p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>06</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Sales/ Turnover/ Receipts</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->Sales; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>07</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Gross Profit</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->GrossProfit; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>08</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>General, administrative, selling and other expenses</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->OtherExpense; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>09</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Net Profit (07-08)</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->NetProfit; ?></p>
      </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="100%">
  <tbody>
    <tr>
      <td colspan="2" width="456" style="padding:3px;" valign="top">
        <p>Summary of Balance Sheet</p>
      </td>
      <td width="162" style="padding:3px;" valign="top">
        <p>Amount(Tk)</p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>10</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Cash in hand &amp; at bank</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->CashInHandOrBank; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>11</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Inventories</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->Inventories; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>12</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Fixed assets</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->FixedAssets; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>13</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Other assets</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->OtherAssets; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>14</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Total assets(10+11+12+13)</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->TotalAssets; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>15</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Opening capital</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->OpeningCapital; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>16</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Net profit</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->NetProfit; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>17</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Withdrawals in the income year</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->WithdrawlsInIncomeYear; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>18</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Closing capital (15+16-17)</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->ClosingCapital; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>19</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Liabilities</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->Liabilities; ?></p>
      </td>
    </tr>
    <tr>
      <td width="48" style="padding:3px;border:1px solid #000" valign="top">
        <p>20</p>
      </td>
      <td width="408" style="padding:3px;border:1px solid #000" valign="top">
        <p>Total capital and liabilities(18+19)</p>
      </td>
      <td width="162" style="padding:3px;border:1px solid #000" valign="top">
        <p><?php echo @$value->TotalCapitalLiabilities; ?></p>
      </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="100%" border="1">
  <tbody>
    <tr>
      <td width="306" style="padding:3px;" valign="top">
        <p>Name&nbsp;</p>
                <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
                <p>&nbsp;</p>                
      </td>
      <td width="312" style="padding:3px;" valign="top">
        <p>Signature &amp; Date</p>
          <?php if(isset($signature->signature)){?>
              <img style="height:30px" src="<?php echo $signature->signature;?>" />
           <?php }else{?>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
           <?php } ?>
      </td>
    </tr>
  </tbody>
</table>


<?php 
  }
} else {

?>
  <h5 style="text-align: center;">SCHEDULE 24C</h5>
  <h6 style="text-align: center; font-weight:normal;">Summary of income from business or profession</h6>
  <h6 style="text-align: center; font-weight:normal;">To be annexed to return by an assessee having income from business or profession</h6>
  <p>&nbsp;</p>
  <table width="618">
    <tbody>
      <tr>
        <td width="42" style="border:1px solid #000; text-align:center; padding:0 5px 7px 5px;" valign="top">
          <p>01</p>
        </td>
        <td width="264" style="border:1px solid #000; padding:5px" valign="top">
          <p>Assessment Year</p>
              <table width="320" border="0">
                    <tr>
                      <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top">2</td>
                      <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top">0</td>
                      <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[2];?></td>
                      <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px" valign="top"><?php echo $tax_year_stripe[3];?></td>
                      <td align="center" width="14%" style="padding:5px;" valign="top">-</td>
                      <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px" valign="top"><?php echo $tax_year_stripe[7];?></td>
                      <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px" valign="top"><?php echo $tax_year_stripe[8];?></td>
                    </tr>
                  </table>
              <p><br />
            </p></td>
        <td width="42" style="border:1px solid #000;text-align:center; padding:0 5px 7px 5px;" valign="top">
          <p>02</p>
      </td>
          <td width="270" style="border:1px solid #000; padding:5px" valign="top">
            <p>TIN</p>
            <h5><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></h5>
          </td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <table width="100%"  border="1">
    <tbody>
      <tr>
        <td width="42" style="padding:5px;" valign="top">
          <p>03</p>
        </td>
        <td colspan="3" width="576" style="padding:5px;" valign="top">
          <p>Type of main business or profession&nbsp;</p>
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="42" style="padding:5px;" valign="top">
          <p>04</p>
        </td>
        <td width="285" style="padding:5px;" valign="top">
          <p>Name(s) of the business or profession (as in trade licence)</p>
          <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
          <p>&nbsp;</p>
          
        </td>
        <td width="42" style="padding:5px;" valign="top">
          <p>05</p>
          <p>&nbsp;</p>
        </td>
        <td width="249" style="padding:5px;" valign="top">
          <p>Address(es)</p>
          <p>&nbsp;</p>
        </td>
      </tr>
    </tbody>
  </table>
  <p style="font-weight:normal;">Use serial numbers if more names and addresses</p>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
  <table width="100%">
    <tbody>
      <tr>
        <td colspan="2" width="456" style="padding:5px;" valign="top">
          <p>&nbsp; Summary of Income</p>
        </td>
        <td width="162" style="padding:5px;" valign="top">
          <p>Amount(Tk)</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:5px;border:1px solid #000" valign="top">
          <p>06</p>
        </td>
        <td width="408" style="padding:5px;border:1px solid #000" valign="top">
          <p>Sales/ Turnover/ Receipts</p>
        </td>
        <td width="162" style="padding:5px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:5px;border:1px solid #000" valign="top">
          <p>07</p>
        </td>
        <td width="408" style="padding:5px;border:1px solid #000" valign="top">
          <p>Gross Profit</p>
        </td>
        <td width="162" style="padding:5px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:5px;border:1px solid #000" valign="top">
          <p>08</p>
        </td>
        <td width="408" style="padding:5px;border:1px solid #000" valign="top">
          <p>General, administrative, selling and other expenses</p>
        </td>
        <td width="162" style="padding:5px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:5px;border:1px solid #000" valign="top">
          <p>09</p>
        </td>
        <td width="408" style="padding:5px;border:1px solid #000" valign="top">
          <p>Net Profit (07-08)</p>
        </td>
        <td width="162" style="padding:5px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <table width="100%">
    <tbody>
      <tr>
        <td colspan="2" width="456" style="padding:3px;" valign="top">
          <p>Summary of Balance Sheet</p>
        </td>
        <td width="162" style="padding:3px;" valign="top">
          <p>Amount(Tk)</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>10</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Cash in hand &amp; at bank</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>11</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Inventories</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>12</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Fixed assets</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>13</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Other assets</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>14</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Total assets(10+11+12+13)</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>15</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Opening capital</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>16</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Net profit</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>17</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Withdrawals in the income year</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>18</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Closing capital (15+16-17)</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>19</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Liabilities</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
      <tr>
        <td width="48" style="padding:3px;border:1px solid #000" valign="top">
          <p>20</p>
        </td>
        <td width="408" style="padding:3px;border:1px solid #000" valign="top">
          <p>Total capital and liabilities(18+19)</p>
        </td>
        <td width="162" style="padding:3px;border:1px solid #000" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="1">
    <tbody>
      <tr>
        <td width="306" style="padding:3px;" valign="top">
          <p>Name&nbsp;</p>
                  <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
                  <p>&nbsp;</p>                
        </td>
        <td width="312" style="padding:3px;" valign="top">
          <p>Signature &amp; Date</p>
            <?php if(isset($signature->signature)){?>
              <img style="height:40px" src="<?php echo $signature->signature;?>" />
            <?php }else{?>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
           <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>


<?php } ?>

<!---------------- END OF PAGE 6 -------------->

<pagebreak />

<!---------------- START OF PAGE 7 -------------->

<!-- ---------------- -->
<!--- Schedule 24d -- -->
<!-- ---------------- -->

<h5 style="text-align: center;">SCHEDULE 24D</h5>
<p style="text-align: center; font-weight:normal;">Particulars of tax credit/rebate</p>
<p style="text-align: center; font-weight:normal;">To be annexed to return by an assessee claiming investment tax credit</p>
<p style="text-align: center; font-weight:normal;">(Attach the proof of claimed investment, contribution, etc.)</p>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" width="618">
	<tbody>
		<tr>
			<td width="42" style="border:1px solid #000; text-align:center;" valign="top">
				<p>01</p>
			</td>
			<td width="264" style="border:1px solid #000; padding:5px;" valign="top">
				<p>Assessment Year</p>
		        <table cellspacing="0" cellpadding="0" width="320" border="0">
                  <tr>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top">2</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top">0</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[2];?></td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[3];?></td>
                    <td align="center" width="14%">-</td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px" valign="top"><?php echo $tax_year_stripe[7];?></td>
                    <td align="center" width="14%" style="padding:10px; border:1px solid #000; padding:5px;" valign="top"><?php echo $tax_year_stripe[8];?></td>
                  </tr>
                </table>
		        <p><br />
          </p></td>
	    <td width="42" style="border:1px solid #000;text-align:center; padding:5px" valign="top">
				<p>02</p>
		</td>
        <td width="270" style="border:1px solid #000; padding:5px" valign="top">
       	  <p>TIN</p>
          <h5><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></h5>
        </td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" width="646">
	<tbody>
		<tr>
			<td colspan="3" width="514" style="padding:5px;" valign="top">
				<p>Particulars of rebatable investment, contribution, etc.</p>
			</td>
			<td width="132" style="padding:5px;" valign="top">
				<p>Amount(Tk)</p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>03</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Life insurance premium</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->LifeInsurancePremium ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>04</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Contribution to deposit pension scheme (not exceeding allowable limit)</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->DepositPensionScheme ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>05</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Investment in approved savings certificate</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->SavingsCertificates ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>06</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Investment in approved debenture or debenture stock, Stock or Shares</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->InvestInStockOrShare ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>07</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Contribution to provident fund to which Provident Fund&nbsp; Act, 1925 applies</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->ProvidentFund ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>08</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Self contribution and employer&rsquo;s contribution to Recognized Provident Fund</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->SCECProvidentFund ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>09</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Contribution to Super Annuation Fund</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->SuperAnnuationFund ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>10</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Contribution to Benevolent Fund and Group Insurance Premium</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->BenevolentFund ?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>11</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Contribution to Zakat Fund</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo @$income_rebate_model->ZakatFund ?></p>
			</td>
		</tr>
    <?php
      $otherRebate = @$income_rebate_model->DeferredAnnuity + @$income_rebate_model->Others + @$income_rebate_model->Computer + @$income_rebate_model->Laptop + @$income_rebate_model->DonationNLInstitutionFON + @$income_rebate_model->DonationCharityHospitalNBR + @$income_rebate_model->DonationOrganizationRetardPeople + @$income_rebate_model->ContributionNLInstituionLW + @$income_rebate_model->ContributionLiberationWarMuseum + @$income_rebate_model->ContributionAgaKhanDN + @$income_rebate_model->ContributionAsiaticSocietyBd + @$income_rebate_model->DonationICDDRB + @$income_rebate_model->DotationCRP + @$income_rebate_model->DonationEduInstitutionGov + @$income_rebate_model->ContributionAhsaniaMissionCancerHospital + @$IncomeTaxRebateData->BangladeshGovtTreasuryBond + @$IncomeTaxRebateData->MutualFund ; 
    ?>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>12</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Others, if any ( give details )</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
        <p>&nbsp;<?php //echo ($otherRebate>0)?$otherRebate:''; ?></p>
			</td>
		</tr>
    <?php if(@$income_rebate_model->Computer>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
        <p>Others(Computer)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->Computer; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->Laptop>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Laptop)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->Laptop; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->DonationNLInstitutionFON>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Donation to National Level Institution set up in the memory of Father of the Nation)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->DonationNLInstitutionFON; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->DonationCharityHospitalNBR>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Donation to a Charitable Hospital recognized by NBR)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->DonationCharityHospitalNBR; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->DonationOrganizationRetardPeople>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Donation to Organizations set up for the welfare of retarded people)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->DonationOrganizationRetardPeople; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->ContributionNLInstituionLW>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Contribution to national level institution set up in memory of Liberation war)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->ContributionNLInstituionLW; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->ContributionLiberationWarMuseum>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Contribution to Liberation war Museum)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->ContributionLiberationWarMuseum; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->ContributionAgaKhanDN>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Contribution to Aga Khan Development Network)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->ContributionAgaKhanDN; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->ContributionAsiaticSocietyBd>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Contribution to Asiatic Society,Bangladesh)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->ContributionAsiaticSocietyBd; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->DonationICDDRB>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Donation to ICDDRB)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->DonationICDDRB; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->DotationCRP>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Donation to Centre for the Rehabilitation of the Paralysed (CRP))</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->DotationCRP; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->DonationEduInstitutionGov>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Donation to Educational Institution recognized by Government)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->DonationEduInstitutionGov; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->ContributionAhsaniaMissionCancerHospital>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Contribution to Ahsania Mission Cancer Hospital)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->ContributionAhsaniaMissionCancerHospital; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->MutualFund>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Mutual Fund)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->MutualFund; ?></p>
      </td>
    </tr>
    <?php }?>
    <?php if(@$income_rebate_model->BangladeshGovtTreasuryBond>0){ ?>
    <tr>
      <td width="42" style="padding:5px; border:1px solid #000;" valign="top">
        <p></p>
      </td>
      <td colspan="2" width="472" style="padding:5px; padding-left:20px; border:1px solid #000;" valign="top">
        <p>Others (Investment in Bangladesh Govt. Treasury Bond)</p>
      </td>
      <td width="132" style="padding:5px; border:1px solid #000;" valign="top">
       <p><?php echo @$income_rebate_model->BangladeshGovtTreasuryBond; ?></p>
      </td>
    </tr>
    <?php }?>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>13</p>
			</td>
			<td colspan="2" width="472" style="padding:5px;border:1px solid #000;" valign="top">
				<p>Total allowable investment, contribution etc.</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo $TotalIncomeTaxRebate;?></p>
			</td>
		</tr>
    <?php 
      //$fixedCore=15000000;
      $fixedCore=10000000;
      $signingmoney = $this->getallSingingMoneyIncome(@$IncomeOtherSourceData->IncomeId);
      $percentageOfTotalIncome = ($totalIncome - @$this->totalOutputMain('ForeignIncome') - (@$IncomeOtherSourceData->SanchaypatraIncome+$signingmoney)) *.25;
      $eligibleRebateAmount = min($TotalIncomeTaxRebate, $percentageOfTotalIncome, $fixedCore);
      $eligibleAmount = min($TotalIncomeTaxRebate, $ActualRebateAmount, $fixedCore);
      //$eligibleAmount = $this->No15AmountOfRaxRebate($totalIncome, $eligibleRebateAmount);

    ?>
		<tr>
			<td rowspan="4" width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>14</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Eligible amount for rebate (the lesser of 14A, 14B or 14C)</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo $eligibleRebateAmount; ?></p>
			</td>
		</tr>
		<tr>
			<td width="47" style="padding:5px; border:1px solid #000;" valign="top">
				<p>14A</p>
			</td>
			<td width="425" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Total allowable investment, contribution, etc. (as in 13)</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo $TotalIncomeTaxRebate;?></p>
			</td>
		</tr>
		<tr>
			<td width="47" style="padding:5px; border:1px solid #000;" valign="top">
				<p>14B</p>
			</td>
			<td width="425" style="padding:5px; border:1px solid #000;" valign="top">
				<p>25% of the total income [excluding any income for which a tax exemption or a reduced rate is applicable under sub-section (4) of section 44 or any income from any source or sources mentioned in clause (a) of sub-section (2) of section 82C.]</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p>
          <?php
            // $ActualRebateAmount = round($this->ActualRebateAmount(Yii::app()->user->CPIId)); 
            // echo $ActualRebateAmount;
            echo $percentageOfTotalIncome;
            // var_dump($totalIncome);die;
          ?>    
        </p>
			</td>
		</tr>
		<tr>
			<td width="47" style="padding:5px; border:1px solid #000;" valign="top">
				<p>14C</p>
			</td>
			<td width="425" style="padding:5px; border:1px solid #000;" valign="top">
				<p>1 crore</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo $fixedCore;?></p>
			</td>
		</tr>
		<tr>
			<td width="42" style="padding:5px; border:1px solid #000;" valign="top">
				<p>15</p>
			</td>
			<td colspan="2" width="472" style="padding:5px; border:1px solid #000;" valign="top">
				<p>Amount of tax rebate calculated on eligible amount (Serial14) under section 44(2)(b)</p>
			</td>
			<td width="132" style="padding:5px; border:1px solid #000;" valign="top">
				<p><?php echo $eligibleAmount; ?></p>
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" width="648" border="1">
	<tbody>
		<tr>
			<td width="306" style="padding:5px;" valign="top">
				<p>Name&nbsp;</p>
                <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
				<p>&nbsp;</p>

			</td>
			<td width="342" style="padding:5px;" valign="top">
				<p>Signature &amp; Date</p>
				<?php if(isset($signature->signature)){?>
              <img style="height:50px" src="<?php echo $signature->signature;?>" />
           <?php }else{?>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
           <?php } ?>
			</td>
		</tr>
	</tbody>
</table>

<!---------------- END OF PAGE 8 -------------->

<pagebreak />

<!---------------- START OF PAGE 9 -------------->

<!-- --------------------- -->
<!--  Statement of Assets  -->
<!-- --------------------- -->

<table cellspacing="0" cellpadding="0" width="100%">
	<tbody>
		<tr>
			<td width="22%" align="center" style="font-size:11px;">
				<p>National Board of Revenue</p>
				<p style="font-weight:normal;">www.nbr.gov.bd</p>
		  </td>
            
		  <td width="46%">&nbsp;</td>
			
            
	  <td width="32%" align="right">
		<p style="font-weight:bold;"><strong>IT-10B2016</strong></p>
			</td>
	  </tr>
	</tbody>
</table>
<p>&nbsp;</p>
<p align="center" style="padding:0px;margin:0px;"><strong>STATEMENT OF ASSETS, LIABILITIES AND EXPENSES </strong></p>
<h6 align="center" style="font-weight:normal;padding:0px 0 10px 0; margin:0px;">under section 80(1)of the Income Tax Ordinance, 1984 (XXXVI of 1984)</h6>

<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<tbody>
		<tr>
			<td width="100%">
				<p style="font-weight:normal"><em>1.&nbsp;&nbsp;</em><em>Mention the amount of assets and liabilities that you have at the last date of the income year. All items shall be at cost value include legal, registration and all other related costs;</em></p>
				<p style="font-weight:normal"><em>2.&nbsp;&nbsp;</em><em>If your spouse or&nbsp; minor children and dependent(s) are not assessee, you have to include their assets and liabilities in your statement;&nbsp; </em></p>
				<p style="font-weight:normal"><em>3.&nbsp;&nbsp;</em><em>Schedule 25 is the integral part of this Statement if you have business capital or agriculture or non-agricultural property. Provide additional papers if necessary.</em></p>
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<tbody>
		<tr>
			<td width="5%" valign="top" style="text-align:center">
				<p>01</p>
				<p>&nbsp;</p>
			</td>
			 <td width="42%" style="padding:10px; border:1px solid #000;">
	    	<p>Assessment Year</p>
           	  <table cellspacing="0" cellpadding="0" width="320" border="0">
                <tr>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;">2</td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;">0</td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[2];?></td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[3];?></td>
                  <td align="center" width="14%">-</td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[7];?></td>
                  <td align="center" width="14%" style="padding:10px; border:1px solid #000;"><?php echo $tax_year_stripe[8];?></td>
                </tr>
              </table>
            </td>
			<td width="5%" style="border:1px solid #000; text-align:center" valign="top">
				<p>02</p>	
			</td>
			<td width="45%" style="padding:10px; border:1px solid #000;">
				<p>Statement as on(DD-MM-YYYY)</p>
        <?php 
        $present_date = date('d-m-y');
        $present_date_stripe = str_split(htmlentities(strip_tags(@$present_date)));
        ?>
				<table cellspacing="0" cellpadding="0" width="320" border="0">
                    <tr>
                      <td align="center" width="10%" style="padding:10px; border:1px solid #000;">3<?php //echo $present_date_stripe[0];?></td>
                      <td align="center" width="10%" style="padding:10px; border:1px solid #000;">0<?php //echo $present_date_stripe[1];?></td>
                      <td align="center" width="1%">&nbsp;</td>
                      <td align="center" width="10%" style="padding:10px; border:1px solid #000; border-right:none;">0<?php //echo $present_date_stripe[3];?></td>
                      <td align="center" width="10%" style="padding:10px; border:1px solid #000;">6<?php //echo $present_date_stripe[4];?></td>
                      <td align="center" width="1%">&nbsp;</td>
                      <td align="center" width="10%" style="padding:10px; border:1px solid #000;">2</td>
                       <td align="center" width="10%" style="padding:10px; border:1px solid #000;border-right:none;">0</td>
                      <td align="center" width="10%" style="padding:10px; border:1px solid #000;"><?php echo $present_date_stripe[6];?></td>
                      <td align="center" width="10%" style="padding:10px; border:1px solid #000;"><?php echo $present_date_stripe[7];?></td>
                    </tr>
               </table>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:10px; border:1px solid #000;" valign="top">
				<p>03</p>
			</td>
			<td width="42%" style="padding:10px; border:1px solid #000;">
				<p>Name of the Assessee</p>
                <p><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></p>
			</td>
			<td width="5%" style="padding:10px; border:1px solid #000;" valign="top">
				<p>04</p>
			</td>
			<td width="45%" style="padding:10px; border:1px solid #000;">
				<p>TIN</p>
                <p><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></p>
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<thead>
		<tr>
			<td colspan="5" width="78%" style="padding:5px;" valign="top">
				<p>Particulars</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p>Amount (Tk)</p>

			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td rowspan="3" width="5%" style="padding:5px;" valign="top">
				<p>05</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Business capital (05A+05B)</p>
			</td>
      <td width="21%" style="padding:5px;" valign="top">
				<p><?php echo ((double)(AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital"))+(double)(AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list"))) ?></p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>05A</p>
      </td>
      <td colspan="3" width="66%" style="padding:5px;" valign="top">
        <p>Business capital other than 05B</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo (AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") > 0) ? AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") : ''; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>05B</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p style="font-weight:normal">Director&rsquo;s shareholdings in limited companies <u>(as in Schedule 25)</u></p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") > 0) ? AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") : ''; ?></p>
			</td>
		</tr>
    <?php

    $nonAgro;
    $advanceNonAgro;
    if(!empty($nonAgriculturePropertyList)){
      foreach ($nonAgriculturePropertyList as $key => $value) {

        // var_dump($value);die;

            if($value->Type == 'Value'){
              // var_dump('expression');die;
              $nonAgro += $value->Cost;
            }else{
              // var_dump('expression');die;
              $advanceNonAgro += $value->Cost;
            }
          }
    }

    // var_dump($advanceNonAgro);die;
    ?>
		<tr>
			<td rowspan="2" width="5%" style="padding:5px;" valign="top">
				<p>06</p>
			</td>
			<td width="6%" style="padding:5px;" valign="top">
				<p>06A</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p style="font-weight:normal">Non-agricultural property <u>(as in Schedule 25)</u></p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p>
          <?php //echo (AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") > 0) ? AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") : ''; ?>
          <?php echo number_format($nonAgro,2); ?>
        </p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>06B</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p style="font-weight:normal">Advance made for non-agricultural property<u>(as in Schedule 25)</u></p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo number_format($advanceNonAgro,2); ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:5px;" valign="top">
				<p>07</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p style="font-weight:normal">Agricultural property <u>(as in Schedule 25</u>)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p>
          <?php echo (AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") > 0) ? AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") : ''; ?>
        </p>
			</td>
		</tr>
    <?php
      $shares = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Shares/Debentures', 'assets_investment') : @$asset_model->InvestShareDebenturesTotal;
      $bond = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Saving Certificate/Unit Certificate/Bond', 'assets_investment') : @$asset_model->InvestSavingUnitCertBondTotal;
      $prizeBond = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Prize Bond/Saving Scheme', 'assets_investment') : @$asset_model->InvestPrizeBondSavingsSchemeTotal;
      $loan = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Loans Given', 'assets_investment') : @$asset_model->InvestLoansGivenTotal;
       $other = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Other Investment', 'assets_investment') : @$asset_model->InvestOtherTotal;
      $ins_pre = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Insurance Premium', 'assets_investment') : @$asset_model->InvestOtherTotal;

      $totalFinancial = $shares+$bond + $prizeBond + $loan + $other+$ins_pre;
    ?>
		<tr>
			<td rowspan="6" width="5%" style="padding:5px;" valign="top">
				<p>08</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Financial assets value (08A+08B+08C+08D+08E)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo number_format($totalFinancial,2); ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>08A</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Share, debentures etc.</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Shares/Debentures', 'assets_investment') : @$asset_model->InvestShareDebenturesTotal; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>08B</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Savings certificate, bonds and other government securities</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Saving Certificate/Unit Certificate/Bond', 'assets_investment') : @$asset_model->InvestSavingUnitCertBondTotal; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>08C</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Fixed deposit, Term deposits and DPS</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Prize Bond/Saving Scheme', 'assets_investment') : @$asset_model->InvestPrizeBondSavingsSchemeTotal; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>08D</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p style="font-weight:normal">Loans given to others <u>(mention name and TIN)</u></p>
        <?php 
          foreach($investmentLoanGivenList as $loanGivenRow){
            echo '<p>'.$loanGivenRow->Description.'</p>';
          }

        ?>

			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Loans Given', 'assets_investment') : @$asset_model->InvestLoansGivenTotal; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>08E</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Other financial assets (give details)</p>
        <?php 
          foreach($investmentOtherInvestmentList as $otherInvestmentRow){
            echo '<p>'.$otherInvestmentRow->Description.'</p>';
          }
          foreach($investmentInsurancePremiumList as $otherInvestmentRow){
            echo '<p>'.$otherInvestmentRow->Description.'</p>';
          }

          

        ?>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php  $z_assetO = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Other Investment', 'assets_investment') : @$asset_model->InvestOtherTotal; ?>
          <?php  $z_assetO1  = (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Insurance Premium', 'assets_investment') : @$asset_model->InvestOtherTotal; 
              echo number_format(($z_assetO+$z_assetO1),2);
            ?>    
        </p>
			</td>
		</tr>
		<tr>
			<td rowspan="4" width="5%" style="padding:5px;" valign="top">
				<p>09</p>
				<p>&nbsp;</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Motor car (s) (use additional papers if more than two cars)</p>
			</td>
			<td rowspan="2" width="21%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>Sl.</p>
			</td>
			<td width="18%" style="padding:5px;" valign="top">
        <p>Brand name</p>
      </td>
      <td width="22%" style="padding:5px;" valign="top">
        <p>Engine (CC)</p>
      </td>
      <td width="25%" style="padding:5px;" valign="top">
        <p>Registration No.</p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>1</p>
      </td>
      <td width="18%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[0]->MotorVehicleType; ?></p>
      </td>
      <td width="22%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[0]->MVDescription; ?></p>
      </td>
      <td width="25%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[0]->RegistrationNo; ?></p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[0]->MVValue; ?></p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>2</p>
      </td>
      <td width="18%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[1]->MotorVehicleType; ?></p>
      </td>
      <td width="22%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[1]->MVDescription; ?></p>
      </td>
      <td width="25%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[1]->RegistrationNo; ?></p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[1]->MVValue; ?></p>
      </td>
    </tr>
    <tr>
      <td width="5%" style="padding:5px;" valign="top">
        <p>10</p>
      </td>
      <td colspan="4" width="72%" style="padding:5px;" valign="top">
        <p>Gold, diamond, gems and other items(mention quantity)
        <?php 
        $i = 0;
        foreach($asset_jewellery_model as $data){
          if($i == 0){ echo '';}else echo ', '; $i++;
          echo $data->Description;
        }
        ?>
        </p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p>
        <?php $jewelleryValue = (@$asset_model->JewelryFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_jewelry') : @$asset_model->JewelryTotal;
          if ($jewelleryValue == 0 && $jewelleryValue != null) {
            echo 'Unknown Value';
          } else {
            echo $jewelleryValue;
          }
          ?>
        </p>
      </td>
    </tr>
    <tr>
      <td width="5%" style="padding:5px;" valign="top">
        <p>11</p>
      </td>
      <td colspan="4" width="72%" style="padding:5px;" valign="top">
        <p>Furniture, equipment and electronic items</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p>
          <?php 

          $furnitureValue = (@$asset_model->FurnitureFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_furniture') : @$asset_model->FurnitureTotal;
          // if ($furnitureValue == 0 && $furnitureValue != null) {
          //   echo '';
          // } else {
          //   echo $furnitureValue;
          // }

          $electricValue = (@$asset_model->ElectronicEquipmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_electronic_equipment') : @$asset_model->ElectronicEquipmentTotal;
          // if ($electricValue == 0 && $electricValue != null) {
          //   echo '';
          // } else {
          //   echo $electricValue;
          // }

          // if(($furnitureValue != 0 && $furnitureValue == null) || ($electricValue != 0 && $electricValue == null)){
          echo number_format(($furnitureValue + $electricValue), 2, '.', '');;
          // }
          
          ?>    
        </p>
      </td>
    </tr>
    <tr>
      <td width="5%" style="padding:5px;" valign="top">
        <p>12</p>
      </td>
      <td colspan="4" width="72%" style="padding:5px;" valign="top">
        <p>Other assets of significant value</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo (@$asset_model->AnyOtherAssetsFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_any_other') : @$asset_model->AnyOtherAssetsTotal; ?></p>
      </td>
    </tr>
    
    <tr>
      <td rowspan="5" width="5%" style="padding:5px;" valign="top">
        <p>13</p>
      </td>
      <td colspan="4" width="72%" style="padding:5px;" valign="top">
        <p>Cash and fund outside business(13A+13B+13C+13D)</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo ($cashFundOutsideBusines>0)?$cashFundOutsideBusines:''; ?></p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>13A</p>
      </td>
      <td colspan="3" width="66%" style="padding:5px;" valign="top">
        <p>Notes and currencies</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash on hand', 'assets_outside_business') : @$asset_model->OutsideBusinessCashInHandTotal; ?></p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>13B</p>
      </td>
      <td colspan="3" width="66%" style="padding:5px;" valign="top">
        <p>Banks, cards and other electronic cash</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p>
          <?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash at Bank', 'assets_outside_business') : @$asset_model->OutsideBusinessCashAtBankTotal; ?>
        </p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>13C</p>
      </td> 
      <td colspan="3" width="66%" style="padding:5px;" valign="top">
        <p>Provident fund and other fund</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Fund', 'assets_outside_business') : @$asset_model->OutsideBusinessFundTotal; ?></p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>13D</p>
      </td>
      <td colspan="3" width="66%" style="padding:5px;" valign="top">
        <p>Other deposits, balance and advance (other than 08)</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Other Deposits', 'assets_outside_business') : @$asset_model->OutsideBusinessOtherdepositsTotal; ?>    
        </p>
      </td>
    </tr>
		<tr>
			<td width="5%" style="padding:5px;" valign="top">
				<p>14</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Gross wealth (aggregate of 05 to 13)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo ($totalAssets != 0) ? $totalAssets : ''; ?></p>
			</td>
		</tr>
		<tr>
			<td rowspan="4" width="5%" style="padding:5px;" valign="top">
				<p>15</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Liabilities outside business(15A+15B+15C)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo $totalLiabilities; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>15A</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Borrowings from banks and other financial institutions</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php
        $bank_borrowing = (double) LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property") + (double) LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans");
        echo $bank_borrowing;      
        ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>15B</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Unsecured loan (mention name and TIN)</p>
          <?php 
            foreach($unsecuredLoanList as $unsecuredLoanRow){
              echo '<p>'.$unsecuredLoanRow->Description.'</p>';
            }
          ?>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (double) LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans"); ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>15C</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Other loans or overdrafts</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (double) LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan"); ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:5px;" valign="top">
				<p>16</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Net wealth (14-15)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo $netWealth_12 = ($totalAssets - $totalLiabilities); ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:5px;" valign="top">
				<p>17</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Net wealth at the last date of the previous income year</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p>
          <?php
          $TotalNetWealth = (@$asset_model->NetWealthFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_other_receipts') : @$asset_model->NetWealthTotal;
          echo $TotalNetWealth;
          ?>
        </p>
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
      (double) ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "OtherTransport", "exp_other_transport") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "OtherHousehold", "exp_other_household") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "Donation", "exp_donation") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "OtherSpecial", "exp_other_special") +
      (double) ExpenditureController::sum_of_particular_field($expence_model, "Other", "exp_other");

      $totalExpence = round($totalExpence, 2);

      // $totalExpence = @$expence_model->TotalExpenditure;

      $netWealth_lastyear_13 = $TotalNetWealth;

      $accretionWealth_14 = ($netWealth_12 - $netWealth_lastyear_13);

      $totalAccretion_16 = ($totalExpence + $accretionWealth_14);

      $totalTaxCharges = ExpenditureController::sum_of_particular_field($expence_model, "TaxAtSource", "exp_tax_at_source") + ExpenditureController::sum_of_particular_field($expence_model, "SurchargeOther", "exp_surcharge_other");
      
      $totalExpenseAndTax = $totalTaxCharges + $totalExpence;
    ?>
		<tr>
			<td width="5%" style="padding:5px;" valign="top">
				<p>18</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Change in net wealth (16-17)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
        <p><?php echo number_format($accretionWealth_14, 2, '.', ''); ?></p>
			</td>
		</tr>
    <?php 
      $total_other_fund_outflow = $totalExpenseAndTax + (double) ExpenditureController::sum_of_particular_field($expence_model, "LossDeductions", "exp_loss_deductions")+ (double) ExpenditureController::sum_of_particular_field($expence_model, "GiftDonationContribution", "exp_gift_donation_contribution");
    ?>
		<tr>
			<td rowspan="4" width="5%" style="padding:5px;" valign="top">
				<p>19</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Other fund outflow during the income year (19A+19B+19C)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
        <p><?php echo number_format($total_other_fund_outflow, 2, '.', ''); ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>19A</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Annual living expenditure and tax payments (as IT-10BB2016)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
        <p><?php echo number_format($totalExpenseAndTax, 2, '.', ''); ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>19B</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Loss, deductions, expenses, etc. not mentioned in IT-10BB2016</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (double) ExpenditureController::sum_of_particular_field($expence_model, "LossDeductions", "exp_loss_deductions");?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>19C</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Gift, donation and contribution (mention name of recipient)</p>
        <p><?php echo $expence_model->GiftDonationContributionComment; ?></p>

			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo (double) ExpenditureController::sum_of_particular_field($expence_model, "GiftDonationContribution", "exp_gift_donation_contribution");?></p>
			</td>
		</tr>
    <?php $total_fund_outflow = $total_other_fund_outflow + $accretionWealth_14; ?>
		<tr>
			<td width="5%" style="padding:5px;" valign="top">
				<p>20</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Total fund outflow in the income year (18+19)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo number_format($total_fund_outflow, 2, '.', ''); ?></p>
			</td>
		</tr>
    <?php 
      
      $TotalOtherReceipts = (@$asset_model->OtherAssetsReceiptFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_other_receipts') : @$asset_model->OtherAssetsReceiptTotal;

      // $total_source_of_fund = $this->totalIncome(Yii::app()->user->CPIId) + $totalExemptedValue + $TotalOtherReceipts; //2017-10-09
      $total_source_of_fund = $totalIncome + $totalExemptedValue + $TotalOtherReceipts;
    ?>
		<tr>
			<td rowspan="4" width="5%" style="padding:5px;" valign="top">
				<p>21</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Sources of fund (21A+21B+21C)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo number_format($total_source_of_fund, 2, '.', ''); ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>21A</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Income shown in the return</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo  number_format($totalIncome, 2, '.', ''); ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>21B</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Tax exempted income and allowance</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php echo  number_format($totalExemptedValue, 2, '.', ''); ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>21C</p>
			</td>
			<td colspan="3" width="66%" style="padding:5px;" valign="top">
				<p>Other receipts and sources</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php
          echo  number_format($TotalOtherReceipts, 2, '.', '');
        ?></p>
			</td>
		</tr>
    <?php
      $shortage_of_fund = $total_source_of_fund - $total_fund_outflow
    ?>
		<tr>
			<td width="5%" style="padding:5px;" valign="top">
				<p>22</p>
			</td>
			<td colspan="4" width="72%" style="padding:5px;" valign="top">
				<p>Shortage of fund, if any (21-20)</p>
			</td>
			<td width="21%" style="padding:5px;" valign="top">
				<p><?php  
        if($shortage_of_fund<=0){
          if(abs($shortage_of_fund)==0){
              $shortage_of_fund =0;
          }
        }
        echo number_format($shortage_of_fund, 2, '.', ''); 
                  
        ?></p>
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<h5 style="text-align:center;">Verification and signature</h5>
<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<tbody>
		<tr>
			<td rowspan="2" width="6%" style="padding:5px;" valign="top">
				<p>23</p>
			</td>
			<td colspan="2" width="93%" style="padding:5px;" valign="top">
				<p style="font-weight:bold;"><strong>Verification</strong></p>
				<p style="font-weight:normal;">I solemnly declare that to the best of my knowledge and belief the information given in this statement and the schedule annexed herewith are correct and complete.</p>
			</td>
		</tr>
		<tr>
			<td width="44%" style="padding:5px;" valign="top">
				<p>Name&nbsp;</p>
        <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
				<p>&nbsp;</p>
			</td>
			<td width="48%" style="padding:5px;" valign="top">
				<p>Signature &amp; date</p>

				<?php if(isset($signature->signature)){?>
              <img style="height:50px;" src="<?php echo $signature->signature;?>" />
        <?php }else{?>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        <?php } ?>
			</td>
		</tr>
	</tbody>
</table>
<!---------------- END OF PAGE 10 -------------->

<pagebreak />

<!---------------- START OF PAGE 11 -------------->
<!-- End Page 10 -->


<!-- Start Page 11 -->
<p style="text-align:center"><strong>SCHEDULE 25</strong></p>
<p style="text-align:center; font-weight:normal;">to be annexed to the Statement of Assets, Liabilities and Expenses (IT-10B2016)</p>

<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<tbody>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>01</p>
				<p>&nbsp;</p>
			</td>
			<td width="42%" style="padding:5px;" valign="top">
				<p>Assessment Year</p>
				<p><?php echo htmlentities(strip_tags(@$this->taxYear()));?></p>
				<p>&nbsp;</p>
			</td>
			<td width="6%" style="padding:5px;" valign="top">
				<p>02</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="44%" style="padding:5px;" valign="top">
				<p>TIN</p>
				<p><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)));?></p>
				<p>&nbsp;</p>
				
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<tbody>
		<tr>
			<td rowspan="5" width="6%" style="padding:5px;" valign="top">
				<p>03</p>
			</td>
			<td colspan="2" width="58%" style="padding:5px;" valign="top">
				<p>Shareholdings in limited companies as director</p>
				<p>&nbsp;</p>
			</td>
			<td width="16%" style="padding:5px;" valign="top">
				<p>No. of shares</p>
			</td>
			<td width="18%" style="padding:5px;" valign="top"> 
				<p>Value (Tk)</p>
			</td>
		</tr>
    <?php

if (!empty($shareholdingCompanyList)){
  // var_dump($shareholdingCompanyList);die;

  // for ($i=1; $i <= sizeof($shareholdingCompanyList) ; $i++) {
  $i=1; $j=4;
    foreach ($shareholdingCompanyList as $key => $value) {
    echo 
    '<tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>'.$i.'</p>
      </td>
      <td width="51%" style="padding:5px;" valign="top">
        <p>'.$value->CompanyName.'</p>
      </td>
      <td width="16%" style="padding:5px;" valign="top">
        <p>'.$value->NumberOfShares.'</p>
      </td>
      <td width="18%" style="padding:5px;" valign="top">
        <p>'.$value->CompanyAssetValue.'</p>
      </td>
    </tr>';
    $i++;
    if($i>$j){
      break;
    }
  }
  for ($i; $i<=$j ; $i++) {
  if($i>$j){
    break;
  }else{
      echo 
      '<tr>
        <td width="6%" style="padding:5px;" valign="top">
          <p>'.$i.'</p>
        </td>
        <td width="51%" style="padding:5px;" valign="top">
          <p>&nbsp;</p>
        </td>
        <td width="16%" style="padding:5px;" valign="top">
          <p>&nbsp;</p>
        </td>
        <td width="18%" style="padding:5px;" valign="top">
          <p>&nbsp;</p>
        </td>
      </tr>';
    }
  }
}else{ 
  ?>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>1</p>
			</td>
			<td width="51%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="16%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="18%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>2</p>
			</td>
			<td width="51%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="16%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="18%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>3</p>
			</td>
			<td width="51%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="16%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="18%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;" valign="top">
				<p>4</p>
			</td>
			<td width="51%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="16%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="18%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
    <?php } ?>
	</tbody>
</table>
<p>&nbsp;</p>
<?php $jcount=5;if (!empty($nonAgriculturePropertyList)) {
         $jcount = count($nonAgriculturePropertyList)+1;
         if($jcount<5){$jcount =5;}
}
?>
<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<tbody>
		<tr>
			<td rowspan="<?php echo $jcount; ?>" width="6%" style="padding:5px;" valign="top">
				<p>04</p>
			</td>
			<td colspan="2" width="42%" style="padding:5px;" valign="top">
				<p>Non-agricultural property at cost value &nbsp;or any advance made for such property (description, location and size)</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>Value at the start of income year (Tk)</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>increased/ decreased during the income year (Tk)</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>Value at the last date of income year (Tk)</p>
			</td>
		</tr>
      <?php
        
        if (!empty($nonAgriculturePropertyList)) {
          $i=1; $j=4;
          $j = count($nonAgriculturePropertyList);
           if($j<4){$j =4;}
            foreach ($nonAgriculturePropertyList as $key => $value) {
            echo 
            '<tr>
              <td width="6%" style="padding:5px;"  valign="top">
                <p>'.$i.'</p>
              </td>
              <td width="35%" style="padding:5px;"  valign="top">
                <p>'.$value->Type.' - '.$value->Description.'</p>
              </td>
              <td width="15%" style="padding:5px;"  valign="top">
                <p>'.$value->ValueStartOfIncomeYear.'</p>
              </td>
              <td width="17%" style="padding:5px;"  valign="top">
                <p>'.$value->ValueChangeDuringIncomeYear.'</p>
              </td>
              <td width="17%" style="padding:5px;"  valign="top">
                <p>'.$value->Cost.'</p>
              </td>
            </tr>';
            $i++;
            if($i>$j){
              break;
            }
          }
          for ($i; $i<=$j ; $i++) {
          if($i>$j){
            break;
          }else{
              echo 
              '<tr>
                <td width="6%" style="padding:5px;" valign="top">
                  <p>'.$i.'</p>
                </td>
                <td width="51%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
                <td width="16%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
                <td width="18%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
                <td width="18%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
              </tr>';
            }
          }
        }else{
      ?>
		<tr>
			<td width="6%" style="padding:5px;"  valign="top">
				<p>1</p>
			</td>
			<td width="35%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;"  valign="top">
				<p>2</p>
			</td>
			<td width="35%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;"  valign="top">
				<p>3</p>
			</td>
			<td width="35%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:5px;"  valign="top">
				<p>4</p>
			</td>
			<td width="35%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
    <?php } ?>
	</tbody>
</table>
<p><strong>&nbsp;</strong></p>
<table cellspacing="0" cellpadding="0" width="101%" border="1">
  <?php 
  
  if (!empty($AgriculturePropertyList)) {
              if(count($AgriculturePropertyList)==5){
                 $rowspan = 6;
              }elseif(count($AgriculturePropertyList)==6){
                $rowspan = 7;

              }else{
                $rowspan = 5;
              }
            }
?>
	<tbody>
		<tr>
			<td rowspan="<?php echo $rowspan;?>" width="6%" style="padding:5px;" valign="top">
				<p>05</p>
			</td>
			<td colspan="2" width="42%" style="padding:5px;"  valign="top">
				<p>Agricultural property at cost value&nbsp; (description, location and size)</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>Value at the start of income year (Tk)</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>increased/ decreased during the income year (Tk)</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>Value at the last date of income year (Tk)</p>
			</td>
		</tr>
    <?php
        
        if (!empty($AgriculturePropertyList)) {
          $i=1; $j=6;
            foreach ($AgriculturePropertyList as $key => $value) {
            echo 
            '<tr>
              <td width="6%" style="padding:5px;"  valign="top">
                <p>'.$i.'</p>
              </td>
              <td width="35%" style="padding:5px;"  valign="top">
                <p>'.$value->Description.'</p>
                <p>&nbsp;</p>
              </td>
              <td width="15%" style="padding:5px;"  valign="top">
                <p>'.$value->ValueStartOfIncomeYear.'</p>
              </td>
              <td width="17%" style="padding:5px;"  valign="top">
                <p>'.$value->ValueChangeDuringIncomeYear.'</p>
              </td>
              <td width="17%" style="padding:5px;"  valign="top">
                <p>'.$value->Cost.'</p>
              </td>
            </tr>';
            $i++;
            if($i>$j){
              break;
            }
          }
          for ($i; $i<=$j ; $i++) {
          if($i>$j){
            break;
          }else{
              if($i<5){
              echo 
              '<tr>
                <td width="6%" style="padding:5px;" valign="top">
                  <p>'.$i.'</p>
                </td>
                <td width="51%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
                <td width="16%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
                <td width="18%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
                <td width="18%" style="padding:5px;" valign="top">
                  <p>&nbsp;</p>
                </td>
              </tr>';
              }
            }
          }
        }else{
      ?>
		<tr>
			<td width="4%" style="padding:5px;"  valign="top">
				<p>1</p>
			</td>
			<td width="37%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="4%" style="padding:5px;"  valign="top">
				<p>2</p>
			</td>
			<td width="37%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;"  valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="4%" style="padding:5px;"  valign="top">
				<p>3</p>
			</td>
			<td width="37%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="4%" style="padding:5px;" valign="top">
				<p>4</p>
			</td>
			<td width="37%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</td>
			<td width="15%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
			<td width="17%" style="padding:5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
    <?php } ?>
	</tbody>
</table>
<p style="font-weight:normal;">(Provide additional paper if necessary)</p>
<table cellspacing="0" cellpadding="0" width="101%" border="1">
	<tbody>
		<tr>
			<td width="48%" style="padding:5px;" valign="top">
				<p>Name</p>
				<h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
				<p>&nbsp;</p>
			</td>
			<td width="51%" style="padding:5px;" valign="top">
				<p>Signature &amp; date</p>
				<?php if(isset($signature->signature)){?>
              <img style="height:50px;" src="<?php echo $signature->signature;?>" />
        <?php }else{?>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        <?php } ?>
			</td>
		</tr>
	</tbody>
</table>
<!---------------- END OF PAGE 11 -------------->

<pagebreak />

<!---------------- START OF PAGE 12 -------------->


<!-- ---------------------------STATEMENT OF EXPENSES RELATING------------------------------------------- -->
<!-- -----------  TO LIFESTYLE -------------- -->
<!-- ---------------------------------------------------------------------- -->

<table cellspacing="0" cellpadding="0" width="100%">
	<tbody>
		<tr>
			<td width="22%" align="center" style="font-size:11px;">
				<p>National Board of Revenue</p>
				<p style="font-weight:normal;">www.nbr.gov.bd</p>
		  </td>
            
		  <td width="46%">&nbsp;</td>
			
            
	  <td width="32%" align="right">
		<p><strong>IT-10BB2016</strong></p>
			</td>
	  </tr>
	</tbody>
</table>
<p style="text-align: center; padding:0; margin:0;"><strong>STATEMENT OF EXPENSES RELATING TO LIFESTYLE </strong></p>
<h6 style="text-align: center; font-weight:normal; padding:0 0 10px 0; margin:0">under section 80(2) of the Income Tax Ordinance, 1984 (XXXVI of 1984)</h6>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td width="5%" valign="top" style="text-align:center">
				<p>01</p>
				<p>&nbsp;</p>
			</td>
			 <td width="42%" style="padding:5px; border:1px solid #000;">
	    	<p>Assessment Year</p>
           	  <table cellspacing="0" cellpadding="0" width="320" border="0">
                <tr>
                  <td align="center" width="14%" style="padding:5px; border:1px solid #000;">2</td>
                  <td align="center" width="14%" style="padding:5px; border:1px solid #000;">0</td>
                  <td align="center" width="14%" style="padding:5px; border:1px solid #000;"><?php echo $tax_year_stripe[2];?></td>
                  <td align="center" width="14%" style="padding:5px; border:1px solid #000;"><?php echo $tax_year_stripe[3];?></td>
                  <td align="center" width="14%">-</td>
                  <td align="center" width="14%" style="padding:5px; border:1px solid #000;"><?php echo $tax_year_stripe[7];?></td>
                  <td align="center" width="14%" style="padding:5px; border:1px solid #000;"><?php echo $tax_year_stripe[8];?></td>
                </tr>
              </table>
            </td>
			<td width="5%" style="border:1px solid #000; text-align:center" valign="top">
				<p>02</p>	
			</td>
			<td width="45%" style="padding:10px; border:1px solid #000;">
				<p>Statement as on(DD-MM-YYYY) </p>
				<table cellspacing="0" cellpadding="0" width="320" border="0">
                    <tr>
                      <td align="center" width="10%" style="padding:5px; border:1px solid #000;">3<?php //echo $present_date_stripe[0];?></td>
                      <td align="center" width="10%" style="padding:5px; border:1px solid #000;">0<?php //echo $present_date_stripe[1];?></td>
                      <td align="center" width="1%">&nbsp;</td>
                      <td align="center" width="10%" style="padding:5px; border:1px solid #000; border-right:none;">0<?php //echo $present_date_stripe[3];?></td>
                      <td align="center" width="10%" style="padding:5px; border:1px solid #000;">6<?php //echo $present_date_stripe[4];?></td>
                      <td align="center" width="1%">&nbsp;</td>
                      <td align="center" width="10%" style="padding:5px; border:1px solid #000;">2</td>
                       <td align="center" width="10%" style="padding:5px; border:1px solid #000;border-right:none;">0</td>
                      <td align="center" width="10%" style="padding:5px; border:1px solid #000;"><?php echo $present_date_stripe[6];?></td>
                      <td align="center" width="10%" style="padding:5px; border:1px solid #000;"><?php echo $present_date_stripe[7];?></td>
                    </tr>
               </table>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px; border:1px solid #000;text-align:center" valign="top">
				<p>03</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px; border:1px solid #000;">
				<p>Name of the Assessee</p>
                <p><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></p>
			</td>
			<td width="5%" style="padding:0 5px 7px 5px; border:1px solid #000;text-align:center" valign="top">
				<p>04</p>
			</td>
			<td width="45%" style="padding:0 5px 7px 5px; border:1px solid #000;">
				<p>TIN</p>
                <p><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN)))?></p>
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<thead>
		<tr>
			<td colspan="3" width="54%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Particulars</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Amount (Tk)</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Comment</p>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>05</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Expenses for food, clothing and other essentials</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->PersonalFoodingComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>06</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Housing expense</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->AccommodationComment; ?></p>
			</td>
		</tr>
    <?php 
      $totalTransportation = ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") + ExpenditureController::sum_of_particular_field($expence_model, "OtherTransport", "exp_other_transport");
    ?>
		<tr>
			<td rowspan="3" width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>07</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Auto and transportation expenses(07A+07B)</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo ($totalTransportation>0)?number_format($totalTransportation,2):''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>07A</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Driver&rsquo;s salary, fuel and maintenance</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->TransportComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>07B</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Other transportation</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "OtherTransport", "exp_other_transport") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "OtherTransport", "exp_other_transport") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->OtherTransportComment; ?></p>
			</td>
		</tr>
    <?php 
      $totalHousehold = ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") + ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") + ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") + ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") + ExpenditureController::sum_of_particular_field($expence_model, "OtherHousehold", "exp_other_household");
    ?>
		<tr>
			<td rowspan="5" width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>08</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Household and utility expenses (08A+08B+08C+08D)</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php 
          echo ($totalHousehold>0)?number_format($totalHousehold,2):'';
        ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>08A</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Electricity</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->ElectricityBillComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>08B</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Gas, water, sewer and garbage&nbsp;</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
        <?php
          $gas = (ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") : '';
          $wasa = (ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") : '';
          $gas_wasa_bill = (double)$gas + (double)$wasa;
        ?>
				<p><?php echo ($gas_wasa_bill>0)?number_format($gas_wasa_bill,2):''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->GasBillComment.' '.$expence_model->WasaBillComment;?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>08C</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Phone, internet, TV channels subscription</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->TelephoneBillComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>08D</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Home-support staff and other expenses</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top"> 
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "OtherHousehold", "exp_other_household") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "OtherHousehold", "exp_other_household") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->OtherHouseholdComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>09</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Children&rsquo;s education expenses</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->ChildrenEducationComment; ?></p>
			</td>
		</tr>
    <?php 
      $totalSpecialExpense = ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") + ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") + ExpenditureController::sum_of_particular_field($expence_model, "Donation", "exp_donation") + ExpenditureController::sum_of_particular_field($expence_model, "OtherSpecial", "exp_other_special");
    ?>
		<tr>
			<td rowspan="5" width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>10</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Special expenses (10A+10B+10C+10D)</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo ($totalSpecialExpense>0)?number_format($totalSpecialExpense,2):''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>10A</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Festival, party, events and gifts&nbsp;&nbsp;&nbsp;</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->FestivalOtherSpecialComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>10B</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Domestic and overseas tour, holiday, etc.&nbsp;</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->PersonalForeignTravelComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>10C</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Donation, philanthropy, etc.</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Donation", "exp_donation") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Donation", "exp_donation") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->DonationComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>10D</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Other special expenses</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "OtherSpecial", "exp_other_special") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "OtherSpecial", "exp_other_special") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->OtherSpecialComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>11</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Any other expenses</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Other", "exp_other") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Other", "exp_other") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->OtherComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>12</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Total expense relating to lifestyle(05+06+07+08+09+10+11)</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $totalExpence; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
    <?php 
      // $totalTaxCharges = ExpenditureController::sum_of_particular_field($expence_model, "TaxAtSource", "exp_tax_at_source") + ExpenditureController::sum_of_particular_field($expence_model, "SurchargeOther", "exp_surcharge_other")
    ?>
		<tr>
			<td rowspan="3" width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>13</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Payment of tax, charges, etc. (13A+13B)</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo ($totalTaxCharges>0)?number_format($totalTaxCharges,2):''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>13A</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Payment of tax at source</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "TaxAtSource", "exp_tax_at_source") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "TaxAtSource", "exp_tax_at_source") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->TaxAtSourceComment; ?></p>
			</td>
		</tr>
		<tr>
			<td width="5%" style="padding:0 5px 7px 5px;" valign="top">
				<p>13B</p>
			</td>
			<td width="42%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Payment of tax, surcharge or other amount</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo (ExpenditureController::sum_of_particular_field($expence_model, "SurchargeOther", "exp_surcharge_other") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "SurchargeOther", "exp_surcharge_other") : ''; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $expence_model->SurchargeOtherComment; ?></p>
			</td>
		</tr>
    <?php 
      // $totalExpenseAndTax = $totalTaxCharges + $totalExpence;
    ?>
		<tr>
			<td width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>14</p>
			</td>
			<td colspan="2" width="47%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Total amount of expense and tax (12+13)</p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p><?php echo $totalExpenseAndTax; ?></p>
			</td>
			<td width="22%" style="padding:0 5px 7px 5px;" valign="top">
				<p>&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>
<h5 style="text-align:center">Verification and signature</h5>
<table cellspacing="0" cellpadding="0" width="100%" border="1">
	<tbody>
		<tr>
			<td rowspan="2" width="6%" style="padding:0 5px 7px 5px;text-align:center" valign="top">
				<p>15</p>
			</td>
			<td colspan="2" width="93%" style="padding:0 5px 7px 5px;" valign="top">
				<p style="font-weight:bold;"><strong>Verification</strong></p>
				<p style="font-weight:normal;">I solemnly declare that to the best of my knowledge and belief the information given in this statement is correct and complete.</p>
			</td>
		</tr>
		<tr>
			<td width="43%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Name&nbsp;</p>
        <h5><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></h5>
				<p>&nbsp;</p>
			</td>
			<td width="49%" style="padding:0 5px 7px 5px;" valign="top">
				<p>Signature &amp; date</p>
				<?php if(isset($signature->signature)){?>
              <img style="height:50px;" src="<?php echo $signature->signature;?>" />
        <?php }else{?>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        <?php } ?>
			</td>
		</tr>
	</tbody>
</table>

<!---------------- END OF PAGE 12 -------------->

<?php
if(sizeOf($motorVehicleList)>2){
?>
<pagebreak />

<!---------------- START OF PAGE 13 -------------->

<!-- Aditional cars code added -->
<p align="center" style="padding:0px;margin:0px;"><strong>ADDITIONAL CARS</strong></p>

<p>&nbsp;</p>

<table cellspacing="0" cellpadding="0" width="101%" border="1">
  <thead>
    <tr>
      <td colspan="4" width="78%" style="padding:5px;" valign="top">
        <p>Particulars</p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p>Amount (Tk)</p>

      </td>
    </tr>
  </thead>
  <tbody>
  

    <tr>
      <td colspan="4" width="72%" style="padding:5px;" valign="top">
        <p>Motor car (s) (use additional papers if more than two cars)</p>
      </td>
      <td rowspan="2" width="21%" style="padding:5px;" valign="top">
        <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p>Sl.</p>
      </td>
      <td width="18%" style="padding:5px;" valign="top">
        <p>Brand name</p>
      </td>
      <td width="22%" style="padding:5px;" valign="top">
        <p>Engine (CC)</p>
      </td>
      <td width="25%" style="padding:5px;" valign="top">
        <p>Registration No.</p>
      </td>
    </tr>
    <?php 
      for ($i=2, $j=1; $i < sizeOf($motorVehicleList); $i++,$j++) {
    ?>
    <tr>
      <td width="6%" style="padding:5px;" valign="top">
        <p><?php echo $j; ?></p>
      </td>
      <td width="18%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[$i]->MotorVehicleType; ?></p>
      </td>
      <td width="22%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[$i]->MVDescription; ?></p>
      </td>
      <td width="25%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[$i]->RegistrationNo; ?></p>
      </td>
      <td width="21%" style="padding:5px;" valign="top">
        <p><?php echo $motorVehicleList[$i]->MVValue; ?></p>
      </td>
    </tr>
    <?php 
      } 
    ?>
  
  </tbody>
</table>
<!---------------- END OF PAGE 13 -------------->

<?php } ?>

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