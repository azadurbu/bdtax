<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/payment-page.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<div id="home-mid" class="reg-form income-dashbord">
  <div class="home_icon-box home_icon-payment"></div>
    
  <div class="clearfix"></div>

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

<br />
    <div class="row">
      <div class="col-lg-12" style="text-align: center;">
        <?php if ( $payment == null || (isset($payment->status) && $payment->status != "VALID") ) : ?>
         
        <div class="table-responsive plan-submit plan-submit3">
         <table class="price-table-style border2 payment-page">

        
          <tfoot>
          
            <tr>
                <td>
                  <i class="fa fa-check circle" aria-hidden="true"></i>
                  <span> 
                    <?=Yii::t('payment',"Service Charge:")?> 
                    <b>
                      Premier <?=$serviceCharge?> <?=$this->currency?> 
                    </b> 
                  </span>
                </td>
            </tr>
            <?php if ($voucher == null) : ?>
              <td>
                  
                  <div class="row">
                      <div class="col-lg-12">
                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t('payment',"Please enter your gift voucher code to get discount (If Any)")?></span>
                      </div>
                      
                  </div>
                  <div class="row" style="margin-left: 10px; padding-top: 5px;">
                      <div class="col-lg-3">
                          <input type="text" id="giftVoucherCode" class="form-control"> 
                      </div>
                      <div class="col-lg-9">
                          <button type="button" class="btn btn-success btn-large" onClick="submitVoucherCode('null')"> <?=Yii::t("payment","Redeem")?> </button>
                      </div>
                  </div>
              </td>
            <?php endif; ?>
            <?php if ($discount_text != "") :  ?>
            <tr>
                <td>
                  <i class="fa fa-check circle" aria-hidden="true"></i>
                  <span> 
                    <?=Yii::t('payment',"Discount:")?> 
                    <b><?=$discount_text?></b> 
                  </span>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td>
                  <i class="fa fa-check circle" aria-hidden="true"></i>
                  <span> 
                    <?=Yii::t('payment',"VAT:")?> 
                    <b>
                      <?=$tax?>%
                    </b> 
                  </span>
                </td>
            </tr>
            
            <tr>
                <td><i class="fa fa-check circle" aria-hidden="true"></i><span> <?=Yii::t('payment',"Please select your payment method below")?> (<b><?=Yii::t('payment',"Total Price:")?>
               
                    <?=$total_with_discount_tax?>
                    <?=$this->currency?></b>) </span></td>
              </tr>
            <tr>

            <tr>
                <td style="padding-left: 12px;">
                  <label class="checkbox-inline">
                    <input value="1" name="t_and_c" id="t_and_c" type="checkbox"> By clicking the button, you agree to our <a data-target="#agreeModal" data-toggle="modal" href="#">Terms and Conditions</a>
                  </label>
                </td>
            </tr>
            
            <tr>
              <td>
<!-- THIS IS ONLY FOR MOBILE PAYMENT -->      
                <?php 
                  foreach ($options as $keys => $values) : 
                    if ($keys == "mobile") :
                ?>
                    
                    <div class="payment-methode" id="<?=$keys?>">
                     <h4><?=ucfirst($keys)?></h4>
                               
                    <?php foreach ($values as $key => $value) : ?>    
                      <div class="payment-methode-wrapping">
                        <?=$value['link']?></br>
                        <p style="text-align:center"><?=$value['name']?></p>
                      </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    </div>
                <?php 
                    endif;
                  endforeach; 
                ?>
  <!-- THIS IS WITHOUT MOBILE PAYMENT -->              
                <?php 
                  foreach ($options as $keys => $values) : 
                    if ($keys != "mobile") :
                ?>
                    
                    <div class="payment-methode" id="<?=$keys?>">
        					   <h4><?=ucfirst($keys)?></h4>
                               
        						<?php foreach ($values as $key => $value) : ?>    
        						  <div class="payment-methode-wrapping">
        							  <?=$value['link']?></br>
        							  <p style="text-align:center"><?=$value['name']?></p>
        						  </div>
        						<?php endforeach; ?>
								    <div class="clearfix"></div>
				            </div>
                <?php 
                    endif;
                  endforeach; 
                ?>
                

              </td>
            </tr>

          </tfoot>

          </table>
        </div>
      <?php endif; ?>

      <?php if ( $payment != null ) : ?>
        <h4 style="color:#b90601; text-transform:uppercase; font-size:26px; font-weight:bold;"><?=Yii::t("payment", "Current Payment Status") ?></h4>
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
                  <th>Tax Year</th>
                  <td><?=$payment->payment_year?></td>
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
      <div class="clearfix"></div>
    </div>


</div>


<script type="text/javascript">

  $(document).ready(function() {
    $('.payment-methode-wrapping a').attr('onclick','stopMoving(this)');
    $('.payment-methode-wrapping a').click(function (e) {
        e.preventDefault();
    });

  });

  function stopMoving(d) {
    if ( $("#t_and_c").prop('checked') == true ) {
      window.location.href = d.href;
    }
    else {
      bootbox.alert("Please accept Terms and Conditions to proceed.");
    }
  }
  
  function submitVoucherCode(id) {
    $('#loading').css('display','block');
    $("#showPaymentLink").html("");
    $.ajax({
      url : "<?=Yii::app()->baseUrl.'/index.php/Voucher/redeem'?>",
      type : "POST",
      dataType : "json",
      cache : false,
      data : { 
        'id': id,
        'code': $("#giftVoucherCode").val()
      },
      success : function(data) {
        if (data.status == "success") {
          bootbox.alert(data.msg, function(){
            location.reload(true); 
          });
        }
        else {
          bootbox.alert(data.msg);
        }
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        bootbox.alert("Internal problem has been occurred. Please try again.");
        $('#loading').css('display','none');
      },
      complete : function()
      {
        $('#loading').css('display','none');
      }
    });
  }
</script>




