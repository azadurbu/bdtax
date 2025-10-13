<div role="tabpanel" class="tab-pane active" id="unsecured_loans" style="text-align: center !important;">
<!-- 
##############################################################################
***************** Unsecured loans Liabilities ********************
##############################################################################
-->
<h2><?=Yii::t("liability","Unsecured loans Liabilities")?></h2>                                   
<div class="clearfix"></div>

<!-- FLASH MESSAGE -->
<div class="flash_alert">
  <?php if($flash != ""): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?=$flash?>
    </div>
  <?php endif; ?>
</div>
<!-- END - FLASH MESSAGE -->

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div id="unsecured_loans_verification" style="display: <?=($model->UnsecuredLoansConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("liability","Did you have any unsecured loan liabilities")?>? 
  </p>
  <?php
        // IF THE ANSWER IS "NO"
  if($model->UnsecuredLoansConfirm == 'No')
    echo "<br>" . Yii::t("liability","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('unsecured_loans_verification', 'unsecured_loans_fraction_or_total', 'unsecured_loans_total')" type="button" class="btn btn-big btn-success"><?=Yii::t("liability","YES")?></button>
      <button onclick="set_no('UnsecuredLoans')" type="button" class="btn btn-big btn-danger"><?=Yii::t("liability","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="unsecured_loans_fraction_or_total" style="display: <?=($model->UnsecuredLoansConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="unsecured_loans_total" style="display: <?=($model->UnsecuredLoansFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->UnsecuredLoansTotal == "") ? "" : Yii::t("liability","Current value is") . " " .$model->UnsecuredLoansTotal. ". " . Yii::t("liability","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("liability","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('unsecured_loans_total', 'unsecured_loans_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("liability","Breakdown")?></button>
  
  <!-- ENTRY FORM -->
  <p><?=Yii::t("liability","Please enter your unsecured loan liabilities")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'UnsecuredLoansTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("liability","Unsecured loans")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('UnsecuredLoans')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_liabilities('UnsecuredLoans')" type="button" >Store</button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="unsecured_loans_fraction" style="display: <?=($model->UnsecuredLoansFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="unsecured_loans_table">
    <thead>
      <tr>
        <th><?=Yii::t("liability","Description")?></th>
        <th><?=Yii::t("liability","Value")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($UnsecuredLoansList as $value) {
        echo "<tr id='UnsecuredLoans_row_".$value->Id."'>";
        echo "<td>".$value->Description."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"LiaUnsecuredLoans\", \"unsecured_loans\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"LiaUnsecuredLoans\", \"UnsecuredLoans\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="unsecured_loans_id">
            <textarea id="unsecured_loans_description" class="form-control" rows="3" placeholder="<?=Yii::t("liability","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="unsecured_loans_cost" placeholder="<?=Yii::t("liability","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->
  
  <button class="btn btn-success btn-lg" onclick="save_liabilities_fraction('unsecured_loans_id', 'unsecured_loans_description', 'unsecured_loans_cost', 'LiaUnsecuredLoans', 'UnsecuredLoans')" type="button" >Store</button>
  
  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a data-toggle="tab" href="#mortgages_on_property" onclick="next_pre('mortgages_on_property')" ><i class="fa fa-chevron-left"></i><span class="previous-text">  <?=Yii::t("liability","Previous")?> </span></a>
  </div>
  <div class="back pull-right">
   <a data-toggle="tab" href="#bank_loans" onclick="next_pre('bank_loans')" ><span class="previous-text"> <?=Yii::t("liability","Next")?> </span><i class="fa fa-chevron-right"></i></a>
  </div>
  <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>