<!-- Modal -->
<div class="modal fade" id="exportBusiness" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header my_modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">
        <?php echo CHtml::activeLabelEx($model3, 'ExportBusiness', array( 'class'=> ' control-label', 'for' => 'inputMask', 'style' => 'color:#555555;')); ?> &nbsp;&nbsp;
        </h3>
      </div>
      <div class="modal-body">
        <form id='business_or_profession' method="post" action="<?php echo Yii::app()->baseUrl; ?>/index.php/Income/SaveFrcOfBusinessOrProfession">
            <input value='' type="hidden" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_Type" name="IncIncomeBusinessOrProfessionDetails[Type]">
            <table class="table table-bordred table-striped">
              <thead>
                  <th>
                      <?=Yii::t( 'income', "Descriptions")?>
                  </th>
                  <th>
                      <?=Yii::t( 'income', "Details")?>
                  </th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'BusinessOrProfessionName', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <textarea autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_BusinessOrProfessionName" name="IncIncomeBusinessOrProfessionDetails[BusinessOrProfessionName]"><?php echo @$model4->BusinessOrProfessionName ?></textarea>
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'Address', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                         <textarea autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_Address" name="IncIncomeBusinessOrProfessionDetails[Address]"><?php echo @$model4->Address ?></textarea>
                      </div>
                  </td>
                </tr>


              </tbody>
            </table>
            
            <h4><?=Yii::t( 'income', "Summary Of Income")?></h4>
            <table class="table table-bordred table-striped">
        		<thead>
        		    <th>
        		        <?=Yii::t( 'income', "Sources")?>
        		    </th>
        		    <th>
        		        <?=Yii::t( 'income', "Amount (BDT)")?>
        		    </th>
        		</thead>
        		<tbody>
        		   	<tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'Sales', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->Sales ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_Sales" name="IncIncomeBusinessOrProfessionDetails[Sales]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'GrossProfit', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->GrossProfit ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_GrossProfit" name="IncIncomeBusinessOrProfessionDetails[GrossProfit]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'OtherExpense', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->OtherExpense ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_OtherExpense" name="IncIncomeBusinessOrProfessionDetails[OtherExpense]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'NetProfit', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->NetProfit ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_NetProfit" name="IncIncomeBusinessOrProfessionDetails[NetProfit]" onkeyup="calculation()" readonly>
                      </div>
                  </td>
                </tr>

        		</tbody>
            </table>

            <h4><?=Yii::t( 'income', "Summary Of Balance Sheet")?></h4>
            <table class="table table-bordred table-striped">
            <thead>
                <th>
                    <?=Yii::t( 'income', "Sources")?>
                </th>
                <th>
                    <?=Yii::t( 'income', "Amount (BDT)")?>
                </th>
            </thead>
            <tbody>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'CashInHandOrBank', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->CashInHandOrBank ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_CashInHandOrBank" name="IncIncomeBusinessOrProfessionDetails[CashInHandOrBank]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'Inventories', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->Inventories ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_Inventories" name="IncIncomeBusinessOrProfessionDetails[Inventories]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'FixedAssets', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->FixedAssets ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_FixedAssets" name="IncIncomeBusinessOrProfessionDetails[FixedAssets]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'OtherAssets', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->OtherAssets ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_OtherAssets" name="IncIncomeBusinessOrProfessionDetails[OtherAssets]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'TotalAssets', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->TotalAssets ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_TotalAssets" name="IncIncomeBusinessOrProfessionDetails[TotalAssets]" onkeyup="calculation()" readonly>
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'OpeningCapital', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->OpeningCapital ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_OpeningCapital" name="IncIncomeBusinessOrProfessionDetails[OpeningCapital]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'NetProfit', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->NetProfit ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_NetProfitBalanceSheet" name="" onkeyup="calculation()" readonly>
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'WithdrawlsInIncomeYear', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->WithdrawlsInIncomeYear ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_WithdrawlsInIncomeYear" name="IncIncomeBusinessOrProfessionDetails[WithdrawlsInIncomeYear]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'ClosingCapital', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->ClosingCapital ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_ClosingCapital" name="IncIncomeBusinessOrProfessionDetails[ClosingCapital]" onkeyup="calculation()" readonly>
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'Liabilities', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->Liabilities ?>" type="text" autocomplete="off" class="form-control number-only" id="IncIncomeBusinessOrProfessionDetails_Liabilities" name="IncIncomeBusinessOrProfessionDetails[Liabilities]" onkeyup="calculation()">
                      </div>
                  </td>
                </tr>

                <tr>
                  <td>
                    <?php echo CHtml::activeLabelEx($model4, 'TotalCapitalLiabilities', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                  </td>
                  <td>
                    <div class="form-group">
                        <input value="<?php echo @$model4->TotalCapitalLiabilities ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfessionDetails_TotalCapitalLiabilities" name="IncIncomeBusinessOrProfessionDetails[TotalCapitalLiabilities]" onkeyup="calculation()" readonly>
                      </div>
                  </td>
                </tr>

            </tbody>
            </table>

            <table class="table table-bordred table-striped">
            <thead>
                <th>
                    <?=Yii::t( 'income', "Amount of Income (BDT)")?>
                </th>
                <th>
                    <?=Yii::t( 'income', "Net taxable income (BDT)")?>
                </th>
            </thead>
            <tbody>
                <tr>
                  <td>
                    <div class="form-group">
                        <input value="" type="text" autocomplete="off"  class="form-control" id="temp_Amount" name="temp_Amount" readonly>
                      </div>
                  </td>
                  <td>
                      <div class="form-group">
                        <input value="" type="text" autocomplete="off" class="form-control" id="temp_NetTaxable" name="temp_NetTaxable" readonly>
                      </div>
                  </td>
                </tr>
            </tbody>
            </table>
            <label style="text-align: left">
              Is your business income exempted from Income Tax under sixth schedule of Income Tax Ordinance 1984?
              <?php
              // if($model4->BusinessIncomeExempted == 'Yes'){
              //   echo '<input type="checkbox" id="IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted" name="IncIncomeBusinessOrProfessionDetails[BusinessIncomeExempted]" checked onClick="calculation()">';
              // }else{
              // }
                echo '<input type="checkbox" id="IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted" name="IncIncomeBusinessOrProfessionDetails[BusinessIncomeExempted]" onClick="calculation()">';
              ?>
            </label>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t( 'income', "Close")?></button>
        <button type="button" class="btn btn-success" onclick="save_IncomeBusinessOrProfession_fraction_single('IncomeBusinessOrProfessionId',  'IncIncomeBusinessOrProfession', 'IncomeBusinessOrProfession')"><?=Yii::t( 'income', "Store")?></button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  function calculation() {

    var Type = $('#IncIncomeBusinessOrProfessionDetails_Type').val();

    var Sales = Number($('#IncIncomeBusinessOrProfessionDetails_Sales').val());
    var GrossProfit = Number($('#IncIncomeBusinessOrProfessionDetails_GrossProfit').val());
    var OtherExpense = Number($('#IncIncomeBusinessOrProfessionDetails_OtherExpense').val());
    var NetProfit = GrossProfit - OtherExpense;

    var CashInHandOrBank = Number($('#IncIncomeBusinessOrProfessionDetails_CashInHandOrBank').val());
    var Inventories = Number($('#IncIncomeBusinessOrProfessionDetails_Inventories').val());
    var FixedAssets = Number($('#IncIncomeBusinessOrProfessionDetails_FixedAssets').val());
    var OtherAssets = Number($('#IncIncomeBusinessOrProfessionDetails_OtherAssets').val());
    var TotalAssets = CashInHandOrBank + Inventories + FixedAssets + OtherAssets;

    var OpeningCapital = Number($('#IncIncomeBusinessOrProfessionDetails_OpeningCapital').val());
    var WithdrawlsInIncomeYear = Number($('#IncIncomeBusinessOrProfessionDetails_WithdrawlsInIncomeYear').val());
    var ClosingCapital = OpeningCapital + NetProfit - WithdrawlsInIncomeYear;

    var Liabilities = Number($('#IncIncomeBusinessOrProfessionDetails_Liabilities').val());
    var TotalCapitalLiabilities = ClosingCapital + Liabilities;


    $('#IncIncomeBusinessOrProfessionDetails_NetProfit').val(NetProfit);
    $('#IncIncomeBusinessOrProfessionDetails_NetProfitBalanceSheet').val(NetProfit);
    $('#IncIncomeBusinessOrProfessionDetails_TotalAssets').val(TotalAssets);
    $('#IncIncomeBusinessOrProfessionDetails_ClosingCapital').val(ClosingCapital);
    $('#IncIncomeBusinessOrProfessionDetails_TotalCapitalLiabilities').val(TotalCapitalLiabilities);
    $('#temp_Amount').val(NetProfit);

    // console.log($('#businessIncomeExempted').is(":checked"));

    // if(Type =='ExportBusiness'){
    //   this.calExportBusiness(NetProfit);
    // }
    // if(Type =='HandCraftedMaterials'){
    //   this.calHandCraftedMaterials(NetProfit);
    // }
    // if(Type =='BusinessOfSoftwareDevelopment'){
    //   this.calBusinessOfSoftwareDevelopment(NetProfit);
    // }
    // if(Type =='NTTN'){
    //   this.calNTTN(NetProfit);
    // }
    // if(Type =='ITES'){
    //   this.calITES(NetProfit);
    // }
    // if(Type =='PoultryFarm'){
    //   this.calPoultryFarm(NetProfit);
    // }
    // if(Type =='SmallMediumEnterprise'){
    //   this.calSmallMediumEnterprise(NetProfit);
    // }
    // if(Type =='Others'){
    //   this.calOthersBusiness(NetProfit);
    // }
    if(Type =='IncomeFromBusiness1'){
      this.calIncomeFromBusiness1(NetProfit,$('#IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted').is(":checked"));
    }
    if(Type =='IncomeFromBusiness2'){
      this.calIncomeFromBusiness2(NetProfit,$('#IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted').is(":checked"));
    }
    if(Type =='IncomeFromBusiness3'){
      this.calIncomeFromBusiness3(NetProfit,$('#IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted').is(":checked"));
    }

  }
$('input').on('input', function() {
  this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
});
  //  $('.number-only').keypress(function(eve) {
  //   if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
  //     eve.preventDefault();
  //   }
       
  // // this part is when left part of number is deleted and leaves a . in the leftmost position. For example, 33.25, then 33 is deleted
  //  $('.number-only').keyup(function(eve) {
  //   if($(this).val().indexOf('.') == 0) {    $(this).val($(this).val().substring(1));
  //   }
  //  });
  // });

</script>