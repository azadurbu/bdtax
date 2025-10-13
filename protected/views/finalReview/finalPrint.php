<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jspdf.debug.js"></script>
<style type="text/css">
  <!--
  body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
  }
-->
</style>
<?php
Yii::import('application.controllers.AssetsController');
Yii::import('application.controllers.ExpenditureController');
Yii::import('application.controllers.LiabilitiesController');
?>
<div id="fromHTMLtestdiv">
  <table width="1000" border="0" style="margin:auto; margin-top:50px;">
    <tr>
      <td>
        <table width="1000" border="0">
          <tr>
            <td width="950" style="text-align:center;">FORM OF RETUN OF INCOME UNDER THE INCOME TAX<br />
              ORDINANCE, 1984 (XXXVI OF 1984)</td>
              <td width="50" style="text-align:center">IT-11GA</td>
            </tr>
            <tr>
              <td>
                <div style="border:1px solid; text-align:center; width:500px;padding:15px 0; margin:15px auto;"> FOR INDIVIDUAL AND OTHER TAXPAYERS<br /><span style="font-size:12px;">(OTHER THAN COMPANY)	</span></div>
              </td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table width="100%" border="0"  style="margin-top:30px;">
            <tr>
              <td width="75%" style="vertical-align:top;">
               <table width="100%" border="0">
                <tr>
                  <td><div style="border:1px solid; padding:10px; width:50%;"> Be a Respectable Taxpayer
                    Submit return in due time
                    Avoid penalty
                  </div></td>
                </tr>
                <tr>
                  <td><table border="0" cellspacing="0" cellpadding="0" width="591">
                    <tr>
                      <td width="231" colspan="9" valign="bottom"><p align="center">Put the tick (√) mark wherever applicable </p></td>
                      <td width="17" valign="bottom"><p>&nbsp;</p></td>
                      <td width="28" valign="bottom"><p>&nbsp;</p></td>
                      <td width="28" valign="bottom"><p>&nbsp;</p></td>
                      <td width="3" valign="bottom"><p>&nbsp;</p></td>
                      <td width="25" valign="bottom"><p>&nbsp;</p></td>
                      <td width="8" valign="bottom"><p>&nbsp;</p></td>
                    </tr>
                    <tr>
                      <td width="7" valign="bottom"><p>&nbsp;</p></td>
                      <td width="17" valign="bottom"><p>&nbsp;</p></td>
                      <td width="49" valign="bottom"><p><strong>Self</strong> </p></td>
                      <td width="8" valign="bottom"><p>&nbsp;</p></td>
                      <td width="8" valign="bottom"><p>&nbsp;</p></td>
                      <td width="155" valign="bottom">
                        <ol>
                          <li><strong>Universal Self</strong> </li>
                        </ol>
                      </td>
                      <td width="10" valign="bottom"><p>&nbsp;</p></td>
                      <td width="2" valign="bottom"><p>&nbsp;</p></td>
                      <td width="14" valign="bottom"><p>&nbsp;</p></td>
                      <td width="76" colspan="4" valign="bottom"><p><strong>Normal</strong> </p></td>
                      <td width="33" colspan="2" valign="bottom"><p>&nbsp;</p></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </td>
            <td width="25%" >
              <div style="border:1px solid; padding:10px; text-align:center">
                <p>Photograph of<br />
                  the Assessee</p>
                  <p>[to be attested on<br />
                  </p>
                  <p>the photograph]</p>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
         <!-- Name access-->

         <table width="100%" border="0">
          <tr>
            <td style="padding:10px">1.	Name of the Assessee:		<?php echo @$personal_info_model->Name; ?> </td>
          </tr>
          <tr>
            <td style="padding:10px">2.	National ID No (if any) : ............................................................................................................. </td>
          </tr>
          <tr >
            <td style="padding:10px">
              <table width="100%" border="0">
                <tr>
                  <td width="14%" valign="top">3. UTIN (if any):</td>
                  <td width="7%" style="border:1px solid;">&nbsp;</td>
                  <td width="7%" style="border:1px solid;">&nbsp;</td>
                  <td width="7%" style="border:1px solid;">&nbsp;</td>
                  <td width="7%" style="text-align:center;border:1px solid;">-</td>
                  <td width="7%" style="border:1px solid;">&nbsp;</td>
                  <td width="7%" style="border:1px solid;">&nbsp;</td>
                  <td width="7%" style="border:1px solid;">&nbsp;</td>
                  <td width="7%" style="text-align:center;border:1px solid;">-</td>
                  <td width="7%" style="border:1px solid;" >&nbsp;</td>
                  <td width="7%"style="border:1px solid;">&nbsp;</td>
                  <td width="7%" style="border:1px solid;">&nbsp;</td>
                  <td width="9%" style="border:1px solid;">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <?php $etin = str_split(@$personal_info_model->ETIN); ?>
            <td style="padding:10px">
              <table width="100%" border="0">
                <tr>
                  <td width="14%" valign="top">4. Tin:</td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[0]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[1]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[2]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[3]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[4]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[5]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[6]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[7]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[8]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[9]; ?></td>
                  <td width="7%" style="border:1px solid;"><?php echo @$etin[10]; ?></td>
                  <td width="9%" style="border:1px solid;"><?php echo @$etin[11]; ?></td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="padding:10px">
              <table width="100%" border="0">
                <tr>
                  <td>5. (a) Circle: <?php echo @$personal_info_model->TaxZoneCircle->CircleName; ?> </td>
                  <td>(b) Taxes Zone: <?php echo @$personal_info_model->TaxZoneCircle->ZoneName; ?></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:10px">
              <table width="100%" border="0">
                <tr>
                  <td>6.	Assessment Year: <?php echo $this->taxYear(); ?></td>
                  <td> 7. Residential Status: <?php echo (@$personal_info_model->ResidentialStatus == 'Y') ? 'Resident':'Non-resident'; ?></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:10px">8.	Status: Individual</td>
          </tr>
          <tr>
            <td style="padding:10px">9.	Name of the employer/business (where applicable): <?php echo @$personal_info_model->EmployerName?></td>
          </tr>
          <tr>
            <td style="padding:10px">10.	Wife/Husband's Name (if assessee, please mention TIN): <?php echo @$personal_info_model->SpouseName?></td>
          </tr>
          <tr>
            <td style="padding:10px">11.	Father's Name: <?php echo @$personal_info_model->FathersName?></td>
          </tr>
          <tr>
            <td style="padding:10px">12.	Mother’s Name:  <?php echo @$personal_info_model->MothersName?></td>
          </tr>
          <tr>
            <td height="103" style="padding:10px">
              <table width="100%" border="0">
                <tr>
                  <td width="28%" valign="top">13.	Date of Birth (in case of individual) :</td>
                  <td width="72%">
                    <?php
                    $dob = $personal_info_model->DOB;
                    $dateList = explode('-', $dob);
                    $year = str_split($dateList[0]);
                    $month = str_split($dateList[1]);
                    $day = str_split($dateList[2]);
                    ?>
                    <table width="100%" border="0">
                      <tr>
                        <td width="8%" style="border:1px solid"><?php echo @$day[0]?></td>
                        <td width="8%" style="border:1px solid"><?php echo @$day[1]?></td>
                        <td width="8%" style="background:#ddd;border:1px solid"><?php echo @$month[0]?></td>
                        <td width="8%" style="background:#ddd;border:1px solid"><?php echo @$month[1]?></td>
                        <td width="8%" style="border:1px solid"><?php echo @$year[0]?></td>
                        <td width="8%" style="border:1px solid"><?php echo @$year[1]?></td>
                        <td width="8%" style="border:1px solid"><?php echo @$year[2]?></td>
                        <td width="8%" style="border:1px solid"><?php echo @$year[3]?></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align:center">Day</td>
                        <td colspan="2" style="text-align:center">Month</td>
                        <td colspan="4" style="text-align:center">year</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:10px">
              <table width="100%" border="0" >
                <tr>
                  <td width="12%" rowspan="2" style="vertical-align:top;padding:10px 0;">14.	Address:</td>
                  <td width="88%" style="padding:10px;">(a)	Present: <?php echo @$personal_info_model->PresentAddress?></td>
                </tr>
                <tr>
                  <td style="padding:10px;"> (b)Permanent:  
                    <?php
                    if($personal_info_model->AddressSame == '1')
                      echo @$personal_info_model->PresentAddress;
                    else
                      echo @$personal_info_model->PermanentAddress;
                    ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:10px">15.	Telephone: Office/Business <?php echo @$personal_info_model->PhoneBusiness?>	Residential:	<?php echo @$personal_info_model->PhoneResidential?> </td>
          </tr>
          <tr>
            <td style="padding:10px">16.	VAT Registration Number (if any): .......................................................................................... </td>
          </tr>
          <tr>
            <td style="padding:10px">&nbsp;</td>
          </tr>
          <tr>
            <td style="padding:10px">
              <div style="padding-bottom:10px;border-bottom:1px solid;text-align:center; font-size:24px; width:50%; margin:auto">Statement of income of the Assessee</div>
            </td>
          </tr>
        </table>

      </td>
    </tr>
    <tr>
      <td><br />
        Statement of income during the income year ended on : <?php echo $this->taxYear(); ?></td>
      </tr>
      <tr>
        <td style="padding-top:25px;">
          <?php
          $totalIncomeSalaries = IncomeSalaries::model()->find(array(  'select'=>' SUM(NetTaxableIncome) as SumTaxableIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$income_model->IncomeId) ) );
          $totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array(  'select'=>' SUM(NetIncome) as SumRentalIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$income_model->IncomeId) ) );
          $totalIncomeShareProfit = IncomeShareProfit::model()->find(array(  'select'=>' SUM(NetValueOfShare) as SumValueOfShare', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$income_model->IncomeId) ) );

          $IncomeOtherSourceData = IncomeOtherSource::model()->find('IncomeId=:data', array(':data'=>@$income_model->IncomeId) );
          $TotalIncomeOtherSource = (@$IncomeOtherSourceData->InterestIncome +@$IncomeOtherSourceData->DividendIncome +@$IncomeOtherSourceData->WinningsIncome +@$IncomeOtherSourceData->OthersIncome );
          
          ?>  

          <?php 
          $IncomeTaxRebateData =  IncomeTaxRebate::model()->find('IncomeId=:data', array(':data'=>@$income_model->IncomeId) ); 

          $TotalIncomeTaxRebate = (@$IncomeTaxRebateData->LifeInsurancePremium +@$IncomeTaxRebateData->DeferredAnnuity +@$IncomeTaxRebateData->ProvidentFund + @$IncomeTaxRebateData->SCECProvidentFund + @$IncomeTaxRebateData->SuperAnnuationFund + @$IncomeTaxRebateData->InvestInStockOrShare + @$IncomeTaxRebateData->DepositPensionScheme + @$IncomeTaxRebateData->BenevolentFund + @$IncomeTaxRebateData->ZakatFund + @$IncomeTaxRebateData->Others );

          ?>
          <table width="100%" border="1" cellspacing="0">
            <tr>
              <td width="9%" style="padding:10px;"><div align="center">Serial no.</div></td>
              <td width="68%" style="padding:10px;"><div align="center">Heads of Income </div></td>
              <td width="23%" style="padding:10px;"><div align="center">Amount in Taka</div></td>
            </tr>
            <tr>
              <td style=" padding:5px;"><div align="center">1</div></td>
              <td style="padding:5px;">Salaries : u/s 21 (as per schedule 1) </td>
              <td style="padding:5px;"><?php echo ($totalIncomeSalaries->SumTaxableIncome == NULL) ? "" : $totalIncomeSalaries->SumTaxableIncome .$this->currency; ?></td>
            </tr>
            <tr >
              <td style="padding:5px;"><div align="center">2</div></td>
              <td style="padding:5px;">Interest on Securities : u/s 22 </td>
              <td style="padding:5px;"><?php echo (@$income_model->InterestOnSecurities == NULL) ? "" : $income_model->InterestOnSecurities .$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">3</div></td>
              <td style="padding:5px;">Income from house property : u/s 24 (as per schedule 2) </td>
              <td style="padding:5px;"><?php echo ($totalIncomeHouseProperties->SumRentalIncome == NULL) ? "" : $totalIncomeHouseProperties->SumRentalIncome.$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">4</div></td>
              <td style="padding:5px;">Agricultural income : u/s 26 </td>
              <td style="padding:5px;"><?php echo (@$income_model->IncomeAgriculture == NULL) ? "" : $income_model->IncomeAgriculture .$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">5</div></td>
              <td style="padding:5px;">Income from business or profession : u/s 28</td>
              <td style="padding:5px;"><?php echo (@$income_model->IncomeBusinessOrProfession == NULL) ? "" : $income_model->IncomeBusinessOrProfession .$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">6</div></td>
              <td style="padding:5px;">Share of profit in a firm :</td>
              <td style="padding:5px;"><?php echo ($totalIncomeShareProfit->SumValueOfShare == NULL) ? "" : $totalIncomeShareProfit->SumValueOfShare.$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">7</div></td>
              <td style="padding:5px;">Income of the spouse or minor child as applicable : u/s 43(4)</td>
              <td style="padding:5px;"><?php echo (@$income_model->IncomeSpouseOrChild == NULL) ? "" : $income_model->IncomeSpouseOrChild .$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">8</div></td>
              <td style="padding:5px;">Capital Gains : u/s 31 </td>
              <td style="padding:5px;"><?php echo (@$income_model->IncomeCapitalGains == NULL) ? "" : $income_model->IncomeCapitalGains.$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">9</div></td>
              <td style="padding:5px;">Income from other source : u/s 33</td>
              <td style="padding:5px;"><?php echo ($TotalIncomeOtherSource == NULL) ? "" : $TotalIncomeOtherSource.$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">10</div></td>
              <td style="padding:5px;">Total (serial no. 1 to 9)</td>
              <td style="padding:5px;"><?php echo  $totalIncome = $this->totalIncome(Yii::app()->user->CPIId).$this->currency;?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">11</div></td>
              <td style="padding:5px;">Foreign Income: </td>
              <td style="padding:5px;"><?php echo (@$income_model->ForeignIncome == NULL) ? "" : $income_model->ForeignIncome.$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">12</div></td>
              <td style="padding:5px;">Total income (serial no. 10 and 11) </td>
              <td style="padding:5px;"><?php echo  $totalIncome = $this->totalIncome(Yii::app()->user->CPIId).$this->currency;?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">13</div></td>
              <td style="padding:5px;">Tax leviable on total income </td>
              <td style="padding:5px;"><?php echo $payAbleTax = $this->payableTax(Yii::app()->user->CPIId).$this->currency;  ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">14</div></td>
              <td style="padding:5px;">Tax rebate: u/s 44(2)(b)(as per schedule 3)</td>
              <td style="padding:5px;"><?php echo ($TotalIncomeTaxRebate == NULL) ? "" : ($TotalIncomeTaxRebate*($CalculationModel->TaxRebatePercent/100)).$this->currency; ?></td>
            </tr>
            <tr>
              <td style="padding:5px;"><div align="center">15</div></td>
              <td style="padding:5px;">Tax payable (difference between serial no. 13 and 14)</td>
              <td style="padding:5px;">
                <?php
                $GrandTotalPayableTax = ($payAbleTax-($TotalIncomeTaxRebate*($CalculationModel->TaxRebatePercent/100)));  

                if($GrandTotalPayableTax <=0){
                  $CPIInfo = $this->loadCPIInfo(Yii::app()->user->CPIId);

                  if ($CPIInfo!=null) {
                    

                    if ( $CPIInfo->AreaOfResidence == 1){
                      $GrandTotalPayableTax =3000;
                    } elseif ( $CPIInfo->AreaOfResidence == 2){

                      $GrandTotalPayableTax =2000;
                    } elseif ( $CPIInfo->AreaOfResidence == 1){

                      $GrandTotalPayableTax =1000;
                    }
                  }

                }

                echo ($GrandTotalPayableTax >0)? $GrandTotalPayableTax.$this->currency : '00'.$this->currency;

                ?>
              </td>
            </tr>
            <tr>
              <td style="vertical-align:top;padding:5px;"><div align="center">16</div></td>
              <td style="padding:5px;">Tax Payments: <br />
                (a)  Tax deducted/collected at source <br />
                (Please attach supporting documents/statement)	Tk .<?php echo ($GrandTotalPayableTax >0) ? $GrandTotalPayableTax.$this->currency : '00';
                ?> <br />
                (b)  Advance tax u/s 64/68 (Please attach challan ) Tk .<?php echo (@$income_model->IncomeTaxInAdvance == NULL) ? "" : $income_model->IncomeTaxInAdvance; ?>	<br />
                (c)  Tax paid on the basis of this return (u/s 74) <br />
                (Please attach challan/pay order/bank draft/cheque)Tk .<?php echo (@$income_model->IncomeTaxDeductedAtSource == NULL) ? "" : $income_model->IncomeTaxDeductedAtSource; ?> <br />
                (d)  Adjustment of Tax Refund (if any)	Tk .<?php echo (@$income_model->AdjustmentTaxRefund == NULL) ? "" : $income_model->AdjustmentTaxRefund; ?><br />
                Total of (a), (b), (c) and (d)</td>
                <td style="padding:5px;"><?php echo $GrandTotalPayableTax.$this->currency; ?></td>
              </tr>
              <tr>
                <td style="padding:5px;"><div align="center">17</div></td>
                <td style="padding:5px;">Difference between serial no. 15 and 16 (if any)</td>
                <td style="padding:5px;">Tk. <?php echo '00'; ?></td>
              </tr>
              <tr>
                <td style="padding:5px;" ><div align="center">18</div></td>
                <td style="padding:5px;">Tax exempted and Tax free income</td>
                <td style="padding:5px;">Tk. <?php echo ($TotalIncomeTaxRebate == NULL) ? "" : ($TotalIncomeTaxRebate*($CalculationModel->TaxRebatePercent/100)); ?></td>
              </tr>
              <tr>
                <td style="padding:5px;" ><div align="center">19</div></td>
                <td style="padding:5px;">Income Tax paid in the last assessment year</td>
                <td style="padding:5px;">Tk. <?php echo $GrandTotalPayableTax; ?></td>
              </tr>

              <tr>
                <td colspan="3" style="padding:5px;" >
                  <table width="100%" border="0">
                    <tr>
                      <td colspan="2" style="font-style:italic;font-size:16px; font-weight:bold;">*If needed, please use separate sheet. </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="font-size:20px; text-align:center; text-decoration:underline; padding-bottom:15px;">Verification</td>
                    </tr>
                    <tr>
                      <td colspan="2">I  <?php echo @$personal_info_model->Name; ?>	father/husband  <?php echo @$personal_info_model->FathersName?> 
                        UTIN/TIN: <?php echo @$personal_info_model->ETIN; ?>	solemnly declare that to the best of my knowledge and  
                        belief the information given in this return and statements and documents annexed herewith is correct and complete.<br /></td>
                      </tr>
                      <tr>
                        <td width="66%"><p>Place: Dhaka</p>
                          <p>Date : <?php echo date('d/m/Y'); ?></p></td>
                          <td width="34%">
                            <p>Signature</p>
                            <p></p>
                            <p>(Name in block letters) Designation and</p>
                            <p>Seal (for other than individual)</p></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>
                 <table width="100%" border="0">
                  <tr>
                    <td colspan="4"><div style="padding-bottom:10px;border-bottom:1px solid;text-align:center; font-size:20px; width:50%; margin:auto">SCHEDULES SHOWING DETAILS OF INCOME </div></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="vertical-align:top; padding-top:50px; width: 50%;">Name of the Assessee: <?php echo @$personal_info_model->Name; ?>	</td>
                    <td colspan="2"  style="vertical-align:top; padding-top:50px; width: 50%;">
                      <table width="100%" border="0">
                        <tr>
                          <td width="14%" valign="top">TIN: </td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[0]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[1]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[2]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[3]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[4]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[5]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[6]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[7]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[8]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[9]; ?></td>
                          <td width="7%" style="border:1px solid;"><?php echo @$etin[10]; ?></td>
                          <td width="9%" style="border:1px solid;"><?php echo @$etin[11]; ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                </table>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:25px;">
                  <tr>
                    <td width="28%" style="text-align:center; margin-top:20px;">Pay &amp; Allowance </td>
                    <td width="22%" style="text-align:center">Amount of<br />
                      Income<br />
                      (Tk.)</td>
                      <td width="21%" style="text-align:center">Amount of<br />
                        exempted income<br />
                        (Tk.)<br /></td>
                        <td width="29%" style="text-align:center"> Net taxable<br />
                          income<br />
                          (Tk.)<br /></td>
                        </tr>
                        <tr>
                          <td style="padding:10px; border:1px solid">Basic pay</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->BasicPay; ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->BasicPay; ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px; border:1px solid">Special pay</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->SpecialPay; ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->SpecialPay; ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px; border:1px solid">Dearness allowance </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->DearnessAllowance ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->DearnessAllowance ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px; border:1px solid">Conveyance allowance </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->ConveyanceAllowance_1 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->ConveyanceAllowance_2 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->ConveyanceAllowance ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">House rent allowance </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->HouseRentAllowance_1 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->HouseRentAllowance_2 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->HouseRentAllowance ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Medical allowance </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->MedicalAllowance_1 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->MedicalAllowance_2 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->MedicalAllowance ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px; border:1px solid">Servant allowance</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->ServantAllowance ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->ServantAllowance ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Leave allowance </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->LeaveAllowance ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->LeaveAllowance ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Honorarium / Reward/ Fee </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->HonorariumOrReward ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->HonorariumOrReward ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Overtime allowance </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->OvertimeAllowance ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->OvertimeAllowance ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Bonus / Ex-gratia</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->Bonus ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->Bonus ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Other allowances </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->OtherAllowances ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->OtherAllowances ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Employer’s contribution to Recognized Provident Fund</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->EmployersContributionProvidentFund ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->EmployersContributionProvidentFund ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Interest accrued on Recognized Provident Fund </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->InterestAccruedProvidentFund_1 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->InterestAccruedProvidentFund_2 ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->InterestAccruedProvidentFund ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Deemed income for transport facility </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->DeemedIncomeTransport ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->DeemedIncomeTransport ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Deemed income for <br/>freefurnished/unfurnished accommodation </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->DeemedFreeAccommodation ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->DeemedFreeAccommodation ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Other, if any (give detail)</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->Others ?></td>
                          <td style="padding:10px; border:1px solid">0</td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->Others ?></td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border:1px solid">Net taxable income from salary </td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->NetSalaryIncome ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->NetTaxWaiver ?></td>
                          <td style="padding:10px; border:1px solid"><?php echo @$income_salaries_model->NetTaxableIncome ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table width="100%" border="0">
                        <tr>
                          <td colspan="4"><div style="padding-bottom:10px;border-bottom:1px solid;text-align:center; font-size:20px; width:50%; margin:30px auto 0 auto">Schedule-2 (House Property income) </div></td>
                        </tr>
                      </table>

                      <table width="100%" border="1" cellpadding="0" cellspacing="0" style="margin-top:25px;">
                        <tr>
                          <td width="28%" style="text-align:center; margin-top:20px; border:1px solid">Location and
                            <br />
                            description of property</td>
                            <td width="22%" style="text-align:center;">Particulars</td>
                            <td width="21%" style="text-align:center">          Tk.<br /></td>
                            <td width="29%" style="text-align:center">          Tk.<br /></td>
                          </tr>
                          <tr>
                            <td rowspan="11" style="padding:10px;">&nbsp;</td>
                            <td style="padding:10px;" colspan="2">1. Annual rental income </td>
                            <td style="padding:10px;"><?php echo @$income_house_model->AnnualRentalIncome ?></td>
                          </tr>
                          <tr>
                            <td colspan="3" style="padding:10px;">2. Claimed Expenses : </td>
                          </tr>
                          <tr>
                            <td style="padding:10px;">Repair, Collection, etc.</td>
                            <td style="padding:10px;">&nbsp;</td>
                            <td style="padding:10px;"><?php echo @$income_house_model->Repair ?></td>
                          </tr>
                          <tr>
                            <td style="padding:10px;">Municipal or Local Tax </td>
                            <td style="padding:10px;">&nbsp;</td>
                            <td style="padding:10px;"><?php echo @$income_house_model->MunicipalOrLocalTax ?></td>
                          </tr>
                          <tr>
                            <td style="padding:10px;">Land Revenue</td>
                            <td style="padding:10px;">&nbsp;</td>
                            <td style="padding:10px;"><?php echo @$income_house_model->LandRevenue ?></td>
                          </tr>
                          <tr>
                            <td style="padding:10px;">Interest on Loan/Mortgage/Capital <br />
                              Charge</td>
                              <td style="padding:10px;">&nbsp;</td>
                              <td style="padding:10px;"><?php echo @$income_house_model->LoanInterestOrMorgageOrCapitalCrg ?></td>
                            </tr>
                            <tr>
                              <td style="padding:10px;">Insurance Premium</td>
                              <td style="padding:10px;">&nbsp;</td>
                              <td style="padding:10px;"><?php echo @$income_house_model->InsurancePremium ?></td>
                            </tr>
                            <tr>
                              <td style="padding:10px;">Vacancy Allowance</td>
                              <td style="padding:10px;">&nbsp;</td>
                              <td style="padding:10px;"><?php echo @$income_house_model->VacancyAllowence ?></td>
                            </tr>
                            <tr>
                              <td style="padding:10px;">Other, if any </td>
                              <td style="padding:10px;">&nbsp;</td>
                              <td style="padding:10px;"><?php echo @$income_house_model->Others ?></td>
                            </tr>
                            <tr>
                              <td colspan="2" style="padding:10px;"><div align="center">Total = </div></td>
                              <td style="padding:10px;"><?php echo @$income_house_model->ClaimedExpensesTotal ?></td>
                            </tr>
                            <tr>
                              <td colspan="2" style="padding:10px;">3. Net income ( difference between item 1 and	2)</td>
                              <td style="padding:10px;"><?php echo @$income_house_model->NetIncome ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <table width="100%" border="0">
                            <tr>
                              <td colspan="4"><div style="padding-bottom:10px;border-bottom:1px solid;text-align:center; font-size:20px; width:50%; margin:30px auto 0 auto">Schedule-3 (Investment tax credit)</div></td>
                            </tr>
                            <tr>
                              <td colspan="4" style="text-align:center;">(Section 44(2)(b) read with part ‘B’ of Sixth Schedule)</td>
                            </tr>
                            <tr>
                              <td colspan="4">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid;">
                                  <tr>
                                    <td width="72%" style="padding:10px;">1.	Life insurance premium </td>
                                    <td width="28%" style="padding:10px;">Tk. <?php echo @$income_rebate_model->LifeInsurancePremium ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">2.	Contribution to deferred annuity</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->DeferredAnnuity ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">3.	Contribution to Provident Fund to which Provident Fund Act, 1925 applies</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->ProvidentFund ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">4.	Self contribution and employer’s contribution to Recognized Provident Fund </td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->SCECProvidentFund ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">5.	Contribution to Super Annuation Fund</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->SuperAnnuationFund ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">6.	Investment in approved debenture or debenture stock, Stock or Shares</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->InvestInStockOrShare ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">7.	Contribution to deposit pension scheme</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->DepositPensionScheme ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">8.	Contribution to Benevolent Fund and Group Insurance premium</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->BenevolentFund ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">9.	Contribution to Zakat Fund</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->ZakatFund ?></td>
                                  </tr>
                                  <tr>
                                    <td style="padding:10px;">10. Others, if any ( give details )</td>
                                    <td style="padding:10px;">Tk. <?php echo @$income_rebate_model->Others ?></td>
                                  </tr>
                                  <tr>
                                    <td style="text-align:center;">Total:</td>
                                    <td style="padding:10px;">Tk. <?php echo (@$income_rebate_model->LifeInsurancePremium + @$income_rebate_model->DeferredAnnuity + @$income_rebate_model->ProvidentFund + @$income_rebate_model->SCECProvidentFund + @$income_rebate_model->SuperAnnuationFund + @$income_rebate_model->InvestInStockOrShare + @$income_rebate_model->DepositPensionScheme + @$income_rebate_model->BenevolentFund + @$income_rebate_model->ZakatFund + @$income_rebate_model->Others); ?></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" style="font-style:italic;font-size:16px; font-weight:bold; vertical-align:top">*Please attach certificates/documents of investment. </td>
                            </tr>
                            <tr>
                              <td colspan="4"><div style="padding-bottom:10px;border-bottom:1px solid;text-align:center; font-size:20px; width:25%; margin:30px auto 0 auto">List of documents furnished</div></td>
                            </tr>
                            <tr>
                              <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="4">
                                <table width="100%" cellspacing="0" cellpadding="0" border="1" bordercolor="#000000">
                                  <tr>
                                    <td width="53%" style="height:100px;padding-left:20px;">1.</td>
                                    <td width="47%" style="height:100px;padding-left:20px;">6.</td>
                                  </tr>
                                  <tr>
                                    <td style="height:100px;padding-left:20px;">2.</td>
                                    <td style="height:100px;padding-left:20px;">7.</td>
                                  </tr>
                                  <tr>
                                    <td style="height:100px;padding-left:20px;">3.</td>
                                    <td style="height:100px;padding-left:20px;">8.</td>
                                  </tr>
                                  <tr>
                                    <td style="height:100px;padding-left:20px;">4.</td>
                                    <td style="height:100px;padding-left:20px;">9.</td>
                                  </tr>
                                  <tr>
                                    <td style="height:100px;padding-left:20px;">5.</td>
                                    <td style="height:100px;padding-left:20px;">10.</td>
                                  </tr>

                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="4"><span style="font-style:italic;font-size:16px; font-weight:bold; vertical-align:top">*Incomplete return is not acceptable. </span></td>
                            </tr>
                            <tr>
                              <td colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="4">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td style="text-align:right">IT-10B</td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <table width="100%" border="0">
                                        <tr>
                                          <td colspan="4">Statement of Assets and Liabilities (as on .........................................	)</td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="vertical-align:top; padding-top:50px; width: 50%;">Name of the Assessee: <?php echo @$personal_info_model->Name; ?> </td>
                                          <td colspan="2"  style="vertical-align:top; padding-top:50px; width: 50%;">
                                            <table width="100%" border="0">
                                              <tr>
                                                <td width="14%" valign="top">TIN:</td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[0]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[1]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[2]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[3]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[4]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[5]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[6]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[7]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[8]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[9]; ?></td>
                                                <td width="7%" style="border:1px solid;"><?php echo @$etin[10]; ?></td>
                                                <td width="9%" style="border:1px solid;"><?php echo @$etin[11]; ?></td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td colspan="2">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="71%">1. (a) Business Capital (Closing balance)</td>
                                                <td width="29%">Tk. <?php echo (AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") > 0) ? AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital"):''; ?></td>
                                              </tr>
                                              <tr>
                                                <td><b>&nbsp; (b) Directors Shareholdings in Limited Companies (at cost)</b>
                                                </td>
                                                <td>Tk. <?php echo (AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") > 0) ? AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list"):''; ?></td>
                                              </tr>
                                              <?php
                                              $shareholdingCompanyList = AssetsShareholdingCompanyList::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
                                              if(!empty($shareholdingCompanyList)) {
                                                ?>
                                                <tr>
                                                  <td colspan="2">
                                                    <table class="table">
                                                      <thead>
                                                        <tr>
                                                          <th>Company Name</th>
                                                          <th>Number of Shares</th>
                                                          <th>Each Share Cost</th>
                                                          <th>Company Asset Value</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>

                                                        <?php
                                                        foreach ($shareholdingCompanyList as $value) {
                                                          echo "<tr>";
                                                          echo "<td>".$value->CompanyName."</td>";
                                                          echo "<td>".$value->NumberOfShares."</td>";
                                                          echo "<td>".$value->EachShareCost."</td>";
                                                          echo "<td>".$value->CompanyAssetValue."</td>";
                                                          echo '</tr>';
                                                        }
                                                        ?>
                                                      </tbody>
                                                    </table>
                                                  </td>
                                                </tr>
                                                <?php } ?>
                                              </table>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="71%"><p>2.  Non-Agricultural Property (at cost with legal expenses ) : </p>
                                              <p>Land/House property (Description and location of property)</p>
                                            </td>
                                            <td width="29%">Tk. <?php echo (AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") > 0) ? AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property"):''; ?>
                                            </td>
                                          </tr>
                                          <?php
                                          $NonAgriculturePropertyList = AssetsNonAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
                                          if(!empty($NonAgriculturePropertyList)) {
                                            ?>
                                            <tr>
                                              <td colspan="2">
                                                <table class="table">
                                                  <thead>
                                                    <tr>
                                                      <th>Property Description</th>
                                                      <th>Property Value</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php
                                                    foreach ($NonAgriculturePropertyList as $value) {
                                                      echo "<tr>";
                                                      echo "<td>".$value->Description."</td>";
                                                      echo "<td>".$value->Cost."</td>";
                                                      echo '</tr>';
                                                    }
                                                    ?>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                              <td>
                                                <p>3.  Agricultural Property (at cost with legal expenses ) : </p>
                                                <p>Land (Total land and location of land property)</p>
                                              </td>
                                              <td>Tk. <?php echo (AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") > 0) ? AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property"):''; ?>
                                              </td>
                                            </tr>
                                            <?php
                                            $AgriculturePropertyList = AssetsAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
                                            if(!empty($AgriculturePropertyList)) {
                                              ?>
                                              <tr>
                                                <td colspan="2">
                                                  <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th>Property Description</th>
                                                        <th>Property Value</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php
                                                      foreach ($AgriculturePropertyList as $value) {
                                                        echo "<tr>";
                                                        echo "<td>".$value->Description."</td>";
                                                        echo "<td>".$value->Cost."</td>";
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
                                            <tr>
                                              <td colspan="2">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td width="71%">4.  Investments:</td>
                                                    <td width="29%" style="padding:10px;">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding:10px;">(a) Shares/Debentures</td>
                                                    <td style="padding:10px;">Tk. <?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Shares/Debentures', 'assets_investment'):@$asset_model->InvestShareDebenturesTotal;?></td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding:10px;">(b)	Saving Certificate/Unit Certificate/Bond </td>
                                                    <td style="padding:10px;">Tk. <?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Saving Certificate/Unit Certificate/Bond', 'assets_investment'):@$asset_model->InvestSavingUnitCertBondTotal;?></td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding:10px;">(c)	Prize bond/Savings Scheme</td>
                                                    <td style="padding:10px;">Tk. <?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Prize Bond/Saving Scheme', 'assets_investment'):@$asset_model->InvestPrizeBondSavingsSchemeTotal;?></td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding:10px;">(d)	Loans given </td>
                                                    <td style="padding:10px;">Tk. <?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Loans Given', 'assets_investment'):@$asset_model->InvestLoansGivenTotal;?></td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding:10px;">(e)	Other Investment</td>
                                                    <td style="padding:10px;">Tk. <?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, 'Other Investment', 'assets_investment'):@$asset_model->InvestOtherTotal;?></td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding:10px;text-align:right;">Total =</td>
                                                    <td style="padding:10px;">Tk. <?php echo (@$asset_model->InvestmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_investment'):(@$asset_model->InvestShareDebenturesTotal + @$asset_model->InvestSavingUnitCertBondTotal + @$asset_model->InvestPrizeBondSavingsSchemeTotal + @$asset_model->InvestLoansGivenTotal + @$asset_model->InvestOtherTotal);?></td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td style="padding:10px 0;">5.	Motor Vehicles (at cost) :<br />
                                                Type of motor vehicle and Registration </td>
                                                <td><span style="padding:10px;"> Tk. <?php echo (@$asset_model->MotorVehicleFOrT == 'Fraction') ? $this->sum_of_motor(@$asset_model->AssetsId, 'assets_motor_vehicles'):@$asset_model->MotorVehicleTotal;?></span></td>
                                              </tr>
                                              <tr>
                                                <td style="padding:10px 0;">6.	Jewellery (quantity and cost) :		</td>
                                                <td>Tk. <?php echo (@$asset_model->JewelryFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_jewelry'):@$asset_model->JewelryTotal;?></td>
                                              </tr>
                                              <tr>
                                                <td style="padding:10px 0;">7.	Furniture (at cost) : </td>
                                                <td>Tk. <?php echo (@$asset_model->FurnitureFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_furniture'):@$asset_model->FurnitureTotal;?></td>
                                              </tr>
                                              <tr>
                                                <td >8.	Electronic Equipment (at cost) :</td>
                                                <td>Tk. <?php echo (@$asset_model->ElectronicEquipmentFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_electronic_equipment'):@$asset_model->ElectronicEquipmentTotal;?></td>
                                              </tr>
                                              <tr>
                                                <td colspan="2">
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                      <td width="71%">9.	Cash Asset Outside Business:</td>
                                                      <td width="29%" style="padding:10px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;">(a) Cash in hand</td>
                                                      <td style="padding:10px;">Tk. <?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash on hand', 'assets_outside_business'):@$asset_model->OutsideBusinessCashInHandTotal;?></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;">(b) Cash at bank</td>
                                                      <td style="padding:10px;">Tk. <?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Cash at Bank', 'assets_outside_business'):@$asset_model->OutsideBusinessCashAtBankTotal;?></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;">(c) Other deposits</td>
                                                      <td style="padding:10px;">Tk. <?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, 'Other Deposits', 'assets_outside_business'):@$asset_model->OutsideBusinessOtherdepositsTotal;?></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;text-align:right;">Total =</td>
                                                      <td style="padding:10px;">Tk. <?php echo (@$asset_model->OutsideBusinessFOrT == 'Fraction') ? $this->sum_of_business(@$asset_model->AssetsId, '', 'assets_outside_business'):(@$asset_model->OutsideBusinessCashInHandTotal + @$asset_model->OutsideBusinessCashAtBankTotal + @$asset_model->OutsideBusinessOtherdepositsTotal);?></td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style="padding:10px 0;">
                                                  10. Any other assets  <br />
                                                  (With details)
                                                </td>
                                                <td>
                                                  Tk. <?php echo (@$asset_model->AnyOtherAssetsFOrT == 'Fraction') ? $this->sum_of_investment(@$asset_model->AssetsId, '', 'assets_any_other'):@$asset_model->AnyOtherAssetsTotal;?> 
                                                </td>
                                              </tr>
                                              <?php
                                              $AnyOtherAssetsList = AssetsAnyOther::model()->findAllByAttributes(array('AssetsId' => @$asset_model->AssetsId));
                                              if(!empty($AnyOtherAssetsList)) {
                                                ?>
                                                <tr>
                                                  <td style="padding:10px 0;" colspan="2">
                                                    <table class="table">
                                                      <thead>
                                                        <tr>
                                                          <th>Asset Description</th>
                                                          <th>Asset Value</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                        foreach ($AnyOtherAssetsList as $value) {
                                                          echo "<tr>";
                                                          echo "<td>".$value->Description."</td>";
                                                          echo "<td>".$value->Cost."</td>";
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
                                              $totalAssets =  (double) AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") +
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
                                                <td style="text-align:right; padding:10px;">Total Assets</td>
                                                <td> Tk. <?php echo $totalAssets; ?></td>
                                              </tr>
                                              <tr>
                                                <td colspan="2">
                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                      <td width="71%" style="padding:10px 0;">11.	Less Liabilities: </td>
                                                      <td width="29%" style="padding:10px;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;">(a)	Mortgages secured on property or land</td>
                                                      <td style="padding:10px;">Tk. <?php echo (LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property") > 0) ? LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property"):''; ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;">(b)	Unsecured loans </td>
                                                      <td style="padding:10px;">Tk. <?php echo (LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans") > 0) ? LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans"):''; ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;">(c)	Bank loan</td>
                                                      <td style="padding:10px;">Tk. <?php echo (LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans") > 0) ? LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans"):''; ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px;">(d)	Others </td>
                                                      <td style="padding:10px;">Tk. <?php echo (LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan") > 0) ? LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan"):''; ?></td>
                                                    </tr>
                                                    <?php
                                                    $totalLiabilities = (double) LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property") +
                                                    (double) LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans") +
                                                    (double) LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans") +
                                                    (double) LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan");

                                                    $totalLiabilities = round($totalLiabilities, 2);
                                                    ?>
                                                    <tr>
                                                      <td style="padding:10px;text-align:right;">Total Liabilities =</td>
                                                      <td style="padding:10px;">Tk. <?php echo $totalLiabilities; ?></td>
                                                    </tr>
                                                  </table></td>
                                                </tr>
                                                <tr>
                                                  <td style="padding:10px 0;">12.	Net wealth as on last date of this income year <br />
                                                    (Difference between total assets and total liabilities)</td>
                                                    <td>Tk. 
                                                      <?php 
                                                      echo $netWealth = ($totalAssets - $totalLiabilities);
                                                      ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding:10px 0;">13.	Net wealth as on last date of previous income year</td>
                                                    <td>Tk. ........... </td>
                                                  </tr>
                                                  <?php
                                                  if(@$expence_model->TotalTaxPaidLastYearConfirm == "Yes") {
                                                    $TotalTaxPaid = $expence_model->TotalTaxPaidLastYear;
                                                  }
                                                  elseif(@$expence_model->TotalTaxPaidLastYearConfirm == "No") {
                                                    $TotalTaxPaid = Yii::t("expense", "You chose No");
                                                  }
                                                  else {
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

                                                  $totalExpence = @$expence_model->TotalExpenditure;

                                                  $totalTaxExempted = $TotalIncomeTaxRebate*($CalculationModel->TaxRebatePercent/100);

                                                  $totalAccretion = $totalExpence + $totalTaxExempted;

                                                  $accretionWealth = $totalAccretion - $totalExpence;

                                                  ?>
                                                  <tr>
                                                    <td style="padding:10px 0;">14.	Accretion in wealth (Difference between serial no. 12 and 13)</td>
                                                    <td><?php echo $netWealth; ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td width="71%">15. (a) Family Expenditure: (Total expenditure as per Form IT 10 BB)</td>
                                                          <td width="29%"><?php echo $totalExpence; ?></td>
                                                        </tr>
                                                        <tr>
                                                          <td><p>(b) Number of dependant children of the family: </p></td>
                                                          <td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td >
                                                            <table width="30%" border="0" cellspacing="0" cellpadding="0"  style="padding-left:25px;">
                                                              <tr>
                                                                <td width="50%" style="padding:10px;border:1px solid;">&nbsp;</td>
                                                                <td width="50%" style="padding:10px;border:1px solid;">&nbsp;</td>
                                                              </tr>
                                                              <tr>
                                                                <td  align="center">Adult </td>
                                                                <td align="center">Child</td>
                                                              </tr>
                                                            </table>                     
                                                            <p>&nbsp;</p>
                                                          </td>
                                                          <td>&nbsp;</td>
                                                        </tr>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td style="padding: 0px;">16.	Total Accretion of wealth (Total of serial	14 and 15)</td>
                                                    <td>Tk. <?php echo $totalAccretion; ?> </td>
                                                  </tr>

                                                  <tr>
                                                    <td colspan="2" style="padding: 0px;">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td width="71%">17.	Sources of Fund :</td>
                                                          <td width="29%" style="padding:10px;">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td style="padding:10px;">(i) Shown Return Income </td>
                                                          <td style="padding:10px;">Tk. 
                                                            <?php echo  $totalIncome = $this->totalIncome(Yii::app()->user->CPIId);?>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td style="padding:10px;">(ii) Tax exempted/Tax free Income</td>
                                                          <td style="padding:10px;">Tk. 
                                                            <?php echo $totalTaxExempted; ?>
                                                          </td>
                                                        </tr>
                                                        <tr>
                                                          <td style="padding:10px;">(iii) Other receipts </td>
                                                          <td style="padding:10px;">Tk. ...........</td>
                                                        </tr>
                                                        <tr>
                                                          <td style="padding:10px;text-align:right;">Total source of Fund =</td>
                                                          <td style="padding:10px;">Tk. <?php echo  $totalAccretion;?></td>
                                                        </tr>
                                                      </table></td>
                                                    </tr>

                                                    <tr>
                                                      <td>18.	Difference (Between serial	16 and 17)</td>
                                                      <td>Tk. <?php echo  ($totalAccretion - $totalAccretion);?> </td>
                                                    </tr>

                                                  </table></td>
                                                </tr>

                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td colspan="4"><p>I solemnly declare that to the best of my knowledge  and belief the information given in the IT-10B is correct and complete. </p></td>
                                            </tr>
                                            <tr>
                                              <td colspan="4" ><p>Name &amp; signature of the  Assessee </p>
                                                <p>Date .............................................. </p></td>
                                              </tr>
                                              <tr>
                                                <td colspan="4"><span style="font-style:italic;font-size:16px; font-weight:bold; vertical-align:top">*IAssets and liabilities of self, spouse (if she/he is not an assessee), minor children and dependant(s) to be shown in the above statements. <br />
                                                  *If needed, please use separate sheet.</span></td>
                                                </tr>
                                              </table>
                                            </td>
                                          </tr>
                                          <tr>
                                           <td>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td>
                                                  <table width="100%" border="0" style="padding-top:30px;">
                                                    <tr>
                                                      <td colspan="4" align="right">Form No. IT-10BB</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="4" align="center" style="font-size:20px; font-weight:bold">FORM</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="4" align="center">Statement under section 75(2)(d)(i) and section 80 of the Income Tax Ordinance, 1984 (XXXVI of 1984) regarding particulars of life style</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2" style="vertical-align:top; padding-top:50px; width: 50%;">Name of the Assessee: <?php echo @$personal_info_model->Name; ?> </td>
                                                      <td colspan="2"  style="vertical-align:top; padding-top:50px; width: 50%;">
                                                        <table width="100%" border="0">
                                                          <tr>
                                                            <td width="14%" valign="top">TIN:</td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[0]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[1]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[2]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[3]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[4]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[5]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[6]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[7]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[8]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[9]; ?></td>
                                                            <td width="7%" style="border:1px solid;"><?php echo @$etin[10]; ?></td>
                                                            <td width="9%" style="border:1px solid;"><?php echo @$etin[11]; ?></td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </table></td>
                                                </tr>
                                                <tr>
                                                  <td><table width="100%" border="1" cellspacing="0" cellpadding="0" >
                                                    <tr>
                                                      <td width="9%" style="padding:10px; text-align:center">Serial No.</td>
                                                      <td width="55%" style="padding:10px; text-align:center">Particulars of Expenditure</td>
                                                      <td width="18%" style="padding:10px; text-align:center">Amount of Tk. </td>
                                                      <td width="18%" style="padding:10px; text-align:center">Comments No. </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">1</td>
                                                      <td style="padding:10px;">Personal and fooding expenses</td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">2</td>
                                                      <td style="padding:10px;">Tax paid including deduction at source of the last financial year	</td>
                                                      <td style="padding:10px;">Tk. <?php echo ($TotalTaxPaid > 0) ? $TotalTaxPaid:'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">3</td>
                                                      <td style="padding:10px;">Accommodation expenses </td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">4</td>
                                                      <td style="padding:10px;">Transport expenses</td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">5</td>
                                                      <td style="padding:10px;">Electricity Bill for residence </td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">6</td>
                                                      <td style="padding:10px;">Wasa Bill for residence </td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">7</td>
                                                      <td style="padding:10px;">Gas Bill for residence </td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">8</td>
                                                      <td style="padding:10px;">Telephone Bill for residence</td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">9</td>
                                                      <td style="padding:10px;">Education expenses for children </td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">10</td>
                                                      <td style="padding:10px;">Personal expenses for Foreign travel </td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">11</td>
                                                      <td style="padding:10px;">Festival and other special expenses, if any</td>
                                                      <td style="padding:10px;">Tk. <?php echo (ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") > 0) ? ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special"):'';?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="padding:10px; text-align:center">&nbsp;</td>
                                                      <td style="padding:10px;">Total Expenditure</td>
                                                      <td style="padding:10px;">Tk. <?php echo $totalExpence; ?></td>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                  </table></td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                      <td colspan="3" style="padding:10px; text-align:center;">I solemnly declare that to the best of my knowledge and belief the information given in the</td>
                                                    </tr>
                                                    <tr>
                                                      <td width="27%"><p>IT-10BB is  correct and complete. </p>
                                                        <p>&nbsp;</p>
                                                        <p>&nbsp;</p>
                                                        <p><strong><em>*If needed, please use separate  sheet.</em></strong> </p></td>
                                                        <td width="46%">&nbsp;</td>
                                                        <td width="27%"><p>Name and  signature of the Assessee </p>
                                                          <p>Date  .................... </p></td>
                                                        </tr>
                                                      </table></td>
                                                    </tr>
                                                  </table>

                                                </td>
                                              </tr>

                                              <tr>
                                               <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td>
                                                   <table width="100%" border="0" style="padding-top:30px;">
                                                    <tr>
                                                      <td colspan="3" align="right">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" align="center" style="font-size:20px; font-weight:bold"><div style="padding-bottom:10px;border-bottom:1px solid;text-align:center; font-size:20px; width:70%; margin:30px auto 0 auto"> Acknowledgement Receipt of Income Tax Return Name of the Assessee: </div></td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" align="center">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td width="65%" style="vertical-align:top; padding-top:50px;">Name of the Assessee:  <?php echo @$personal_info_model->Name; ?></td>
                                                      <td width="35%"  style="vertical-align:top; padding-top:50px;">Assessment Year: <?php echo $this->taxYear(); ?></td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" style="vertical-align:top; padding-top:50px;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td width="38%">
                                                              <table width="100%" border="0">
                                                                <tr>
                                                                  <td width="30%" style="text-align:left;padding-left:10px"> 
                                                                    <table width="100%" border="0">
                                                                      <tr>
                                                                        <td width="14%" valign="top">UTIN/TIN:</td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[0]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[1]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[2]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[3]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[4]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[5]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[6]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[7]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[8]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[9]; ?></td>
                                                                        <td width="7%" style="border:1px solid;"><?php echo @$etin[10]; ?></td>
                                                                        <td width="9%" style="border:1px solid;"><?php echo @$etin[11]; ?></td>
                                                                      </tr>
                                                                    </table>
                                                                  </td>
                                                                </tr>
                                                              </table>
                                                            </td>
                                                            <td width="27%" style="padding-left:10px;">Circle: <?php echo @$personal_info_model->TaxZoneCircle->CircleName; ?></td>
                                                            <td width="35%" style="padding-left:10px;">Taxes Zone: <?php echo @$personal_info_model->TaxZoneCircle->ZoneName; ?></td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td><div style="padding-bottom:10px;border-bottom:1px solid;text-align:center; font-size:20px; width:40%; margin:30px auto 0 auto"> Instructions to fill up the Return Form</div></td>
                                              </tr>
                                              <tr>
                                                <td><p>Instructions:</p>
                                                  <p>(1)	This return of income shall be signed and verified by the individual assessee or person as prescribed u/s 75 of the Income Tax Ordinance, 1984. </p>
                                                  <p>(2)	Enclose where applicable: <br />
                                                    (a)	Salary statement for salary income; Bank statement for interest; Certificate for interest on savings instruments; Rent agreement, receipts of municipal tax and land revenue, statement of house property loan interest, insurance premium for house property income; Statement of professional income as per IT Rule-8; Copy of assessment/ income statement and balance sheet for partnership income; Documents of capital gain; Dividend warrant for dividend income; Statement of other income; Documents in support of investments in savings certificates, LIP, DPS, Zakat, stock/share etc. </p>
                                                    <p>(b)	Statement of income and expenditure; Manufacturing A/C, Trading and Profit &amp; Loss A/C and Balance sheet; </p>
                                                    <p>(c)	Depreciation chart claiming depreciation as per THIRD SCHEDULE of the Income Tax Ordinance, 1984; <br />
                                                      (d)	Computation of income according to Income tax Law; </p>
                                                      <p>(3)	Enclose separate statement for: </p>
                                                      <p>(a)	Any income of the spouse of the assessee (if she/he is not an assessee), minor children and dependant; <br />
                                                        (b)	Tax exempted / tax free income. </p>
                                                        <p>(4)	Fulfillment of the conditions laid down in rule-38 is mandatory for submission of a return under &quot;Self Assessment&quot;. </p>
                                                        <p>(5)	Documents furnished to support the declaration should be signed by the assessee or his/her authorized representative. </p>
                                                        <p>(6)	The assesse shall submit his/her photograph with return after every five year. </p>
                                                        <p>(7)	Furnish the following information: </p>
                                                        <p>(a)	Name, address and TIN of the partners if the assessee is a firm; <br />
                                                          (b)	Name of firm, address and TIN if the assessee is a partner; <br />
                                                          (c)	Name of the company, address and TIN if the assessee is a director. </p>
                                                          <p>(8)	Assets and liabilities of self, spouse (if she/he is not an assessee), minor children and dependant(s) to be shown in the IT-10B. <br />
                                                            (9)	Signature is mandatory for all the assessee or his/her authorized representative. For individual, <br />
                                                            signature is also mandatory in I.T-10B and I.T-10BB. (10) If needed, please use separate sheet.<br />
                                                          </p></td>
                                                        </tr>
                                                        <tr>
                                                          <td>
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="53%" style="padding:10px;">Total income shown in  Return: Tk. <?php echo  $totalIncome;?></td>
                                                                <td width="47%" style="padding:10px;">Tax paid: Tk. <?php echo $GrandTotalPayableTax; ?></td>
                                                              </tr>
                                                              <tr>
                                                                <td style="padding:10px;">Net Wealth of Assessee:		Tk. <?php echo $netWealth; ?></td>
                                                                <td>&nbsp;</td>
                                                              </tr>
                                                              <tr>
                                                                <td style="padding:10px;">Date of receipt of return: ............................................. </td>
                                                                <td style="padding:10px;">Serial No. in return register .......................</td>
                                                              </tr>
                                                              <tr>
                                                                <td colspan="2">
                                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                      <td width="14%" style="padding:10px;">Nature of Return :</td>
                                                                      <td width="11%" style="padding:10px;"><div style="border:1px solid" align="center">Self</div></td>
                                                                      <td width="12%" style="padding:10px;"><div style="border:1px solid">
                                                                        <div align="center">Universal Self</div>
                                                                      </div></td>
                                                                      <td width="12%"><div style="border:1px solid">
                                                                        <div align="center">Normal</div>
                                                                      </div></td>
                                                                      <td width="51%">&nbsp;</td>
                                                                    </tr>
                                                                  </table>
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td>&nbsp;</td>
                                                                <td style="text-align:right"><p>Signature of Receiving </p>
                                                                  <p>Officer with seal </p></td>
                                                                </tr>
                                                              </table>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </div>
                                                <a href="javascript:demoFromHTML()">Generate PDF</a>
                                                <script>
                                                  function demoFromHTML() {
                                                    var pdf = new jsPDF('p', 'pt', 'a4')
                                                    , source = $('#fromHTMLtestdiv')[0]
                                                    , specialElementHandlers = {
                                                      '#bypassme': function(element, renderer){
                                                        return true
                                                      }
                                                    }

                                                    margins = {
                                                      top: 80,
                                                      bottom: 60,
                                                      left: 40,
                                                      width: 522
                                                    };
                                                    pdf.fromHTML(
                                                      source
                                                      , margins.left 
                                                      , margins.top 
                                                      , {
                                                        'width': margins.width 
                                                        , 'elementHandlers': specialElementHandlers
                                                      },
                                                      function (dispose) {
                                                        pdf.save('Test.pdf');
                                                      },
                                                      margins
                                                      )
                                                  }
                                                </script>