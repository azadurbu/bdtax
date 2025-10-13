<br />
<div class="container">
      <div class="well">

      <div class="row">
        <div class="col-lg-12" style="text-align: center;">

          <h1>Company Payment</h1>

        </div>
        
      </div>

<div class="row">
  <div class="col-lg-12">
    <?php
      if(Yii::app()->user->hasFlash('payment_success')) {
    ?>
        <br />
        <div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
        <?=Yii::app()->user->getFlash('payment_success')?></div>
    <?php
        } else if(Yii::app()->user->hasFlash('payment_error')) {
    ?>
        <br />
        <div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('payment_error')?></div>
    <?php
        }
    ?>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-lg-12">
    <?php if ( $payment != null ) : ?>
      <h4 style="color:#b90601; text-transform:uppercase; font-size:26px; font-weight:bold;"><?=Yii::t("payment", "Payment Information") ?></h4>
        <div class="table-responsive">
          <table class="table table-bordred table-striped">
            <tbody>
              <tr>
                <th>Status</th>
                <th><?=$payment->status?></th>
              </tr>
              <tr>
                <th>Transaction Date</th>
                <td><?=date("d/m/Y h:i A",strtotime($payment->tran_date))?></td>
              </tr>
              <tr>
                <th>Duration</th>
                <td><?=date("d/m/Y",strtotime($payment->payment_from))?> to <?=date("d/m/Y",strtotime($payment->payment_to))?></td>
              </tr>

              <tr>
                <th>Transaction ID</th>
                <td><?=$payment->tran_id?></td>
              </tr>
              <tr>
                <th>Amount</th>
                <td><?=$payment->amount?></td>
              </tr>
              <tr>
                <th>Currency</th>
                <td><?=$payment->currency?></td>
              </tr>
              <tr>
                <th>Card Type</th>
                <td><?=$payment->card_type?></td>
              </tr>
              <tr>
                <th>Card Issuer</th>
                <td><?=$payment->card_issuer?></td>
              </tr>
              
              <tr>
                <th>Bank Transaction ID</th>
                <td><?=$payment->bank_tran_id?></td>
              </tr>
              
              <?php if ($payment->error != "") : ?>
              <tr>
                <th>Error</th>
                <td><?=$payment->error?></td>
              </tr>
              <?php endif; ?>
              
            </tbody>

          </table>
        </div>

    <?php endif; ?>
  </div>
</div>
    
    <div class="clearfix"></div>
  
  </div>
</div>





