
<style type="text/css" media="print">
      * {
        font-family:"Times New Roman";
        font-size: 12px;
      }
      body {
        /*font-style:normal;*/
        font-weight:bold;
        font-size:12px!important;
        font-family:"Times New Roman";
      }
table td, table th{padding: 0px important;font-weight:bold;font-size:12px;}
h2{font-size: 14px;font-weight:bold;}
</style>
<?php 

$tick = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAATCAYAAACQjC21AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Rjg0RUM2OEYwM0Q5MTFFNzg3MkZBQTczQkQ4NEIyNzAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Rjg0RUM2OTAwM0Q5MTFFNzg3MkZBQTczQkQ4NEIyNzAiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpGODRFQzY4RDAzRDkxMUU3ODcyRkFBNzNCRDg0QjI3MCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpGODRFQzY4RTAzRDkxMUU3ODcyRkFBNzNCRDg0QjI3MCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pshu+FAAAADCSURBVHjaYmSgHigEYmVqGbYdiN8CsQGlBkkA8TMg/gzEbJQaZgTE/4H4EzW86Ao17BcQc1JqmDfUMBCWp9QwDyTDXCk1zArJsFpKDQOlrz9Qww5SahgHEL9AigQ+Sg08guTVCGI0TAXiABxyE5EM20usC2KgGuYAMT+SuD+SYSAsSoq3AqCa3gFxKDR9/UUyrJ6csMpDMuA3EvsNJREwHc2bIBxNaazuRTLsHjUyPhMQP4UaGECtAtMYiHeSoxEgwABxUTsgGqdwJwAAAABJRU5ErkJggg==";
$model = Income::model()->find('CPIId=:data AND EntryYear=:data2', array(':data' => $ccpiid, ':data2' => $ctaxYear));
      

$totalIncomeSalaries = IncomeSalaries::model()->find('IncomeId=:data', array(':data'=>$model->IncomeId));
$IncomeOtherSourceData = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$model->IncomeId));

$totalIncomeBusiness = $this->totalOutputInNumber($model, 'IncomeBusinessOrProfession');
$modelL = Liabilities::model()->find('CPIId=:data AND EntryYear=:data1', array(':data'=>$ccpiid, ':data1'=>$ctaxYear));
$IncomeTaxDeductedAtSourceList = IncIncomeTaxDeductedAtSource::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
        <td style="width:85%;padding: 20px;">National Board of Revenue</td>
        
        <td style="width:15%;">
          <p>IT- GHA2020</p>
        </td>
        </tr>
        
      </tbody>
</table>
<h2 style="text-align: center;">Form of Return of Income Under Income-tax Ordinance, 1984 (Ord. XXXVI of 1984)</h2>
<div style="float:left;width:77%;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td style="width:30%;padding: 10px;font-weight: normal;">Office Register No. </td>
        <td style="border: 1px solid; padding: 10px;font-weight: normal;"> Applicable for Individual Taxpayers having taxable income and gross wealthnot exceeding tk. 4,00,000/- and tk. 40,00,000/- respectively </td>
      </tr>
     </tbody>
  </table> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td style="width:30%;padding: 10px 10px"><b>1. Name: </b></td>
        <td style="border-bottom:1px solid;font-weight: normal;"><?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></td>
      </tr>
            
      <tr>
        <td  style="width:30%;padding: 10px 10px"><b>2. TIN: </b></td>
        <td  style="border-bottom:1px solid;font-weight: normal;"><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN))); ?></td>
      </tr>
    </tbody>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                  <td width="17%" style="padding: 10px 10px"><b>3. Circle: </b></td>
                  <td width="32%" style="border-bottom:1px solid;font-weight: normal;"><?php echo htmlentities(strip_tags(@$personal_info_model->TaxesCircle))?></td>
                  <td width="7%" style="padding: 10px 10px"><b>4. Zone:</b> </td>
                  <td width="10%" style="border-bottom:1px solid;font-weight: normal;padding-left: 10%"><?php echo htmlentities(strip_tags(@$personal_info_model->TaxesZone))?></td>
                </tr>
                </tbody>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                <td width="20%" style="padding: 10px 10px"><b>5. Resident: </b></td>
                <td width="6%">
                  <table width="100%" border="1" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td style="padding: 5px 5px;"><?php echo (@$personal_info_model->ResidentialStatus=='Y')?'<img border="0" width="20px" src="'.$tick.'" >':'&nbsp;&nbsp;&nbsp;&nbsp;'; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <td width="19%" style="padding: 10px 10px 10px;"><b>6. Non-resident: </b></td>
                <td width="6%"><table width="100%%" border="1" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td style="padding: 5px 5px;"><?php echo (@$personal_info_model->ResidentialStatus=='N')?'<img border="0" height="15" width="15" src="'.$tick.'" >':'&nbsp;&nbsp;&nbsp;&nbsp;'; ?></td>
                      </tr>
                    </tbody>
                  </table></td>
                <td width="30%" style="padding: 10px 10px"><b>7. Assessment Year: </b></td>
                <td width="19%" style="border-bottom: 1px solid;font-weight: normal;padding: 9px 10px">&nbsp;<?php echo strip_tags($ctaxYear);?></td>
                </tr>
               <tr>
                 <td style="padding: 10px;">&nbsp;</td>
               </tr>
              </tbody>
              </table>


</div>
<div style="float:left;width:22%; padding-left:1%;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tbody>
          <tr>
            <td align="center" style="padding: 20px; border: 1px solid">Universal Self</td>
          </tr>
          <tr>
            <td align="center" style="font-size: 5px;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="middle" style="height: 150px; border: 1px solid;">Photograph of<br>
              the Assessee</td>
          </tr>
          </tbody>
        </table>
</div>

            <div style="width:49%;float: left">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr style="">
                  <td style="border: 1px solid;padding:10px 20px; text-align: center"><b>8. Present Address and Mobile No.</b></td>
                </tr>
                <tr style="">
                  <td valign="top" style="border: 1px solid;padding-top: 10px; padding-left:10px;height: 70px;font-weight: normal;"><?php echo htmlentities(strip_tags(@$personal_info_model->PresentAddress)); ?> <?php echo htmlentities(strip_tags(@$personal_info_model->Area)); ?><br/>
                    <?php echo htmlentities(strip_tags(@$personal_info_model->Contact)); ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
            
      <div style="width:2%;float: left">&nbsp;</div>
      
      <div style="width:49%;float: left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
          <tr style="">
            <td style="border: 1px solid;padding:10px 20px; text-align: center"><b>9. Permanent Address and NID No.</b> </td>
          </tr>
          <tr style="">
            <td valign="top"  style="border: 1px solid;padding-top: 10px; padding-left:10px;height: 70px;font-weight: normal;"><?php if($personal_info_model->AddressSame==1){
                echo htmlentities(strip_tags(@$personal_info_model->PresentAddress)); echo htmlentities(strip_tags(@$personal_info_model->Area));
                 echo '<br/>';
            }else{
              echo htmlentities(strip_tags(@$personal_info_model->PermanentAddress));
              echo '<br/>';
            }?>
            <?php if($personal_info_model->NationalId){echo htmlentities(strip_tags(@$this->_decode($personal_info_model->NationalId)));}else{
                echo '<br/>&nbsp;';
            } ?>
            </td>
          </tr>
          </tbody>
              </table>
      </div>
        
       

      <?php  
          if($taxratio>1 && $hasmore){
            $TaxLeviableOnTotalIncome = $this->TempTaxLeviableOnTotalIncome($ccpiid,$ctaxYear);
          }else{

            $ActRebAmt = round($this->ActualRebateAmount($ccpiid,$ctaxYear));
            $TaxLeviableOnTotalIncome = $this->TaxLeviableOnTotalIncome($ccpiid,$ctaxYear);
            $GTotal = round(($TaxLeviableOnTotalIncome - $ActRebAmt));
            /*********Added for tax year2019-2020***********/

            $sCharge = $this->surCharge($GTotal,$ccpiid,$ctaxYear);
            $capitalg = $this->getCapitalGainTaxAmountWithin($ccpiid,$GTotal,@$income_model->IncomeId);
            $TaxLeviableOnTotalIncome += $capitalg;
            if($GTotal>0){
              $GTotal += $sCharge['surchargeAmount'];  
            }
          } 

          $ActualRebateAmount = round($this->ActualRebateAmount($ccpiid,$ctaxYear)); 
          $GrandTotalPayableTax = round( ($TaxLeviableOnTotalIncome - $ActualRebateAmount) );

          $tds = 0;
          foreach($IncomeTaxDeductedAtSourceList as $td){
              $tds +=$td->Cost;
          }

           $TDSFromSanchaypatra = 0;
            if ($IncomeOtherSourceData) {
              $TDSFromSanchaypatra = $IncomeOtherSourceData->TDSFromSanchaypatra;
            }

            //$GrandTotalPayableTax = $GrandTotalPayableTax-$tds;

            if($GrandTotalPayableTax<0){
              $GrandTotalPayableTax = 0;
            }

            if($GrandTotalPayableTax>$TDSFromSanchaypatra){
               $GrandTotalPayableTax = $GrandTotalPayableTax - $TDSFromSanchaypatra;
            }

           //$GrandTotalPayableTax = $GrandTotalPayableTax - $TDSFromSanchaypatra;

           $GrandTotalPayableTax = Max($GrandTotalPayableTax,$tds);
          //echo $ActualRebateAmount;
          ?>

        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="25%" style="padding: 10px 5px 5px;"><b>10. Taxable Income:</b></td>
            <td width="25%" style="border-bottom:1px solid;padding-top:0px;"><b>Tk <?php $totlaIncome = $this->totalIncome($ccpiid,$ctaxYear);
              echo $totlaIncome;
              //echo ($totlaIncome - @$IncomeOtherSourceData->SanchaypatraIncome); 
            ?></b></td>
            <td width="25%" style="padding: 10px 10px 5px;"><b>11. Gross Wealth:</b></td>
            <td width="25%" style="border-bottom:1px solid;padding-top:5px;"><strong>Tk <?php echo @$asset_model->NetWealthTotal;?></strong></td>
            </tr>
          </tbody>
        </table>

        <?php 
         $sourceofIncome = array();
         $sum = 0;
         if($totalIncomeSalaries->NetTaxableIncome){
          $sourceofIncome[]='Salary';
          $sum += $totalIncomeSalaries->NetTaxableIncome;
         }

         
         if(intval($totalIncomeBusiness)>0){
          $sourceofIncome[]='Business';
          $sum += $totalIncomeSalaries->NetTaxableIncome;
         }

        
         if(($IncomeOtherSourceData->SanchaypatraIncome)>0 && ($IncomeOtherSourceData->Others)>0){
           $sourceofIncome[]='Shanchayapatra & Others';
         }else{

             if(($IncomeOtherSourceData->SanchaypatraIncome)>0){
               $sourceofIncome[]='Shanchayapatra';
             }

             if(($IncomeOtherSourceData->Others)>0){
              $sourceofIncome[]='Others';
             }
         }

         ?>

        <table style="margin-top: 10px;" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="27%" style="padding: 11px 5px 9px 5px;">12. Amount of Tax: Tk <?php echo $GrandTotalPayableTax; ?></td>
            <td width="33%" style=""><b>13. Source of Income:</b><strong>
            <?php $counter = 1;
             foreach ($sourceofIncome as $si) {
             if($counter!=1){
                echo ',<br/>';
             }
             
             echo $si;
             $counter++;
            } ?></b></td>
            <?php $listChallan = UserChallan::model()->findAll('user_id=:data AND tax_year=:data1', array(':data'=>$cuserid, ':data1'=>$ctaxYear));?>
            <td width="18%" style=";"><b>14. Bank, Challan No. & Date</b></td>
            <td width="22%" style="font-size: 14px;font-weight: normal;"><?php $count = 0; foreach ($listChallan as $challan) {?>
              <?php echo $challan->bank_name.' - '.$challan->challan_no.' - '.$challan->challan_date.'<br/>'; ?>
             <?php $count++; if($count==2){ break;}
           }  ?></td>
            </tr>
          </tbody>
        </table>
        
        <div style="margin-top: 10px;border:1px solid #000;padding:1%">
        <table style="width:99%">
             <tbody>
             <tr>
               <td style="font-weight: normal;width: 18%;">15. Verification: I </td><td style="width: 23%;"> <?php echo $personal_info_model->Name;?></td>
               <td style="width: 15%;font-weight: normal;">Father/Spouse </td><td style="width: 22%;"><?php echo $personal_info_model->FathersName;?></td>
               <td style="width: 5%;font-weight: normal">TIN </td><td><?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN))); ?></td>
             </tr>
             <tr><td style="font-weight: normal" colspan="6">do solemnly declare that I am eligible for this Return form and the information given here is correct and complete. I don&rsquo;t have any motor car and an investment in house property or in apartment in any city corporation area.</td></tr>
             </tbody>
           </table>
        

        
        <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>

        
         
        <tr>
          <td style="padding: 10px 10px;">
          <?php if(isset($signature->signature)){?>
              <br/><br/><br/>
          <?php }?>
          Date: </td>
          <td width="65%">&nbsp;</td>
          <td width="15%" style="padding: 10px 10px"><?php if(isset($signature->signature)){?>
              <img style="height:50px;" src="<?php echo $signature->signature;?>" /><br/>
        <?php }?>(Signature)</td>
        </tr>
        </tbody>
       </table>

       </div>


           <h2 style="text-align: left;">Please show tax computation, name list of documents attached herewith and give brief description of
your wealth and liabilities overleaf.</h2>


<div style="border:1px solid #000;padding:1%">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="32%" style="text-align: left;padding-left:10px;">Universal Self</td>
                  <td width="33%" style="text-align: center;"><h4>Acknowledge Receipt</h4></td>
            <td width="33%" style="text-align: center;"><b>Register No.</b></td>
                  
                  </tr>
                </tbody>
              </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="60%" style="padding: 10px;font-weight: normal;">Name: <?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></td>
                  <td width="40%" style="padding: 10px;font-weight: normal;">Assessment Year: <?php echo strip_tags($ctaxYear);?></td>
                  </tr>
                </tbody>
              </table>

              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td style="padding: 10px;font-weight: normal;">TIN:<?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN))); ?></td>
                  <td>&nbsp;</td>
                  <td style="padding: 10px;font-weight: normal;">Circle: <?php echo htmlentities(strip_tags(@$personal_info_model->TaxesCircle))?></td>
                  <td style="padding: 10px;font-weight: normal;">Zone: <?php echo htmlentities(strip_tags(@$personal_info_model->TaxesZone))?></td>
                  </tr>
                </tbody>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="100px;" style="padding: 10px;"><strong>Taxable Income:</strong></td>
                  <td width="200px;" style="padding: 10px; border-bottom: 1px solid;"><strong>Tk <?php echo $this->totalIncome($ccpiid,$ctaxYear);?></strong></td>
                  <td width="100px;" style="padding: 10px 10px 10px 50px;"><strong>Gross Wealth:</strong></td>
                  <td width="200px;" style="padding: 10px; border-bottom: 1px solid"><b>Tk <?php echo @$asset_model->NetWealthTotal;?></b></td>
                  </tr>
                </tbody>
              </table>

              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                    
                      <tr>
                        <td style="height: 10px;">&nbsp;</td>
                        </tr>
                      <tr>
                        <td style="padding: 10px;font-weight: normal;">Amount of Tax: Tk <?php echo $GrandTotalPayableTax;?> </td>
                        <td style="padding: 10px;font-weight: normal;">Bank/Mobile Bank:<?php $count = 0;foreach ($listChallan as $challan) {?>
                          <?php echo $challan->bank_name.'<br/>';
                          $count++; if($count==2){ break;} }?></td>
                        <td style="padding: 10px;font-weight: normal;">Challan No:
                           <?php $count = 0; foreach ($listChallan as $challan) {?>
                            <?php echo $challan->challan_no.'<br/>';
                            $count++; if($count==2){ break;}
                          } ?> </td>
                        </tr>
                      </tbody>
              </table>

              <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
      
          <tr>
            <td width="52%" style="padding: 20px;font-weight: normal;">Date:</td>
            <td width="48%" align="right" style="padding: 10px;font-weight: normal;">Signature of the receiving <br/>officer with Seal</td>
            </tr>
          </tbody>
        </table>

</div>      

<?php if($asset_model->netWealthDetail==1 && $asset_model->NetWealthTotal>0){?>
  <style type="text/css">
    .nd-table td{padding: 10px;}
  </style>
  <pagebreak />
  <br/>

   <?php 
   $AgriculturePropertyList = AssetsAgricultureProperty::model()->find('AssetsId=:data', array(':data'=>@$asset_model->AssetsId));
   $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Shares/Debentures'));
   $motorVehicleList = AssetsMotorVehicles::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
   $total = 0;
?>
   <table style="border:1px solid;" class="nd-table" width="1000px" border="0" cellspacing="0" cellpadding="0">
     <tr>
         <td style="width: 70%">Name: <?php echo htmlentities(strip_tags(@$personal_info_model->Name)); ?></td><td>TIN: <?php echo htmlentities(strip_tags(@$this->_decode($personal_info_model->ETIN))); ?></td>
     </tr>
  </table>
  <table style="border:1px solid;margin-top:20px;" class="nd-table" width="1000px" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td width="75%">1. Agricultural Property (at cost with legal expenses) :
        <br/> 
Land (Total land and location of land property)</td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($AgriculturePropertyList->Cost)?$AgriculturePropertyList->Cost:0;
      echo isset($AgriculturePropertyList->Cost)?$AgriculturePropertyList->Cost:0;?></td>
    </tr>

    <tr>
      <td colspan="2">2. Investments:</td>
    </tr>

    <tr>
      <td style="padding-left: 30px;font-weight: normal;">a. Shares/Debentures
        </td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>

    </tr>

    <tr>
      <?php  
    
         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Saving Certificate/Unit Certificate/Bond'));?>
      <td style="padding-left: 30px;font-weight: normal;">b. Saving Certificate/Unit Certificate/Bond
        </td>
      <td style="font-weight: normal;">Tk <?php  
      $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>


    <tr>
      <?php  

         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Prize Bond/Saving Scheme'));?>
      <td style="padding-left: 30px;font-weight: normal;">c. Prize Bond/Saving Scheme
        </td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:'';?></td>
      
    </tr>


    <tr>
      <?php  

         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Loans Given'));?>

      <td style="padding-left: 30px;font-weight: normal;">d. Loans Given
        </td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>


    <tr>
      <?php  
         
         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Other Investment'));?>
      <td style="padding-left: 30px;font-weight: normal;">e. Other Investments
        </td>
      <td style="font-weight: normal;">Tk <?php
       $total += isset($Investment->Cost)?$Investment->Cost:0;
       echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>
    <tr>
      <?php 
        $MVDescr = '';
        $MVCoat = 0;
        foreach ($motorVehicleList as $mc) {
          $MVDescr = $mc->MVDescription;
          $MVCoat = $mc->MVValue;
        } ?>
      <td>3. Motor Vehicle
        </td>
      <td style="font-weight: normal;">Tk
       <?php $total += $MVCoat;
        echo $MVCoat; ?></td>
      
    </tr>
    <tr>
      <td>4. Furniture
        </td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($asset_model->FurnitureTotal)?$asset_model->FurnitureTotal:0;
      echo isset($asset_model->FurnitureTotal)?$asset_model->FurnitureTotal:0;?></td>
      
    </tr>

    <tr>
      <td>5. Jewellery
        </td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($asset_model->JewelryTotal)?$asset_model->JewelryTotal:0;
      echo isset($asset_model->JewelryTotal)?$asset_model->JewelryTotal:0;?></td>
      
    </tr>

    <tr>
      <td>6. Electronic Equipment
        </td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($asset_model->ElectronicEquipmentTotal)?$asset_model->ElectronicEquipmentTotal:0;
      echo isset($asset_model->ElectronicEquipmentTotal)?$asset_model->ElectronicEquipmentTotal:0;?></td>
      
    </tr>

    <tr>
      <td colspan="2">7. Cash Assets
        </td>
      
      
    </tr>

    <tr>
      <?php  

      $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Cash on hand'));?>
      <td style="padding-left: 30px; font-weight: normal;">a. Cash in Hand
        </td>
      <td style="font-weight: normal;">Tk <?php 
      $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>
    
    <tr>
      <?php  

         $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Cash at Bank'));?>
      <td style="padding-left: 30px;font-weight: normal;">b. Cash At Bank 
        </td>
      <td style="font-weight: normal;">Tk <?php $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>
    <tr>
      <?php  

         $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Fund'));?>
      <td style="padding-left: 30px;font-weight: normal;">c. Fund
        </td>
      <td style="font-weight: normal;">Tk <?php $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>

    <tr>
      <?php  

         $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$asset_model->AssetsId, ':data1'=>'Other Deposits'));?>
      <td style="padding-left: 30px;font-weight: normal;">d. Other Deposits
        </td>
      <td style="font-weight: normal;">Tk <?php $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>

    

    <tr>
      <?php $Investment = AssetsAnyOther::model()->find('AssetsId=:data', array(':data'=>$asset_model->AssetsId));?>
      <td>8. Other Assets
        </td>
      <td style="font-weight: normal;">Tk <?php $total += isset($Investment->Cost)?$Investment->Cost:0;
      echo isset($Investment->Cost)?$Investment->Cost:0;?></td>
      
    </tr>

    <tr>
      <td>Total Assets (Summation of 1 to 8)
        </td>
      <td>Tk <?php echo $total;?></td>
      
    </tr>


  </table>


  <table style="border:1px solid;margin-top:20px;" class="nd-table" width="1000px" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <?php  
         $total = 0;
         $total1 = 0;
         $total2 = 0;
         $total3 = 0;
         $Mortage = LiaMortgagesOnProperty::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>
      <td width="75%">1. Mortgages secured on property or land:
        </td>
      <td style="font-weight: normal;">Tk <?php echo $total = isset($Mortage->Cost)?$Mortage->Cost:0;?></td>
    </tr>
    <tr>
      <?php  

         $Mortage = LiaUnsecuredLoans::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>
      
      <td width="75%">2. Unsecured Loans
        </td>
      <td style="font-weight: normal;">Tk <?php echo $total1 = isset($Mortage->Cost)?$Mortage->Cost:0;?></td>
    </tr>
    <tr>
      <?php  

         $Mortage = LiaBankLoans::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>
      <td width="75%">3. Bank Loan
        </td>
      <td style="font-weight: normal;">Tk <?php echo $total2 = isset($Mortage->Cost)?$Mortage->Cost:0;?></td>
    </tr>
    <tr>
      <?php  

         $Mortage = LiaOthersLoan::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>
      <td width="75%">4. Other Liabilities
        </td>
      <td style="font-weight: normal;">Tk <?php echo $total3 = isset($Mortage->Cost)?$Mortage->Cost:0;?></td>
    </tr>
    <tr>
      <td>Total Liabilities (Summation of 1 to 4)
        </td>
      <td>Tk <?php echo ($total+$total1+$total2+$total3);?></td>
      
    </tr>
  </table>

<?php } ?>



