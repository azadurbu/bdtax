<?php $PInfo = $this->loadCPIInfo(Yii::app()->user->CPIId); 
       $dhakaCity = $this->isDhakaZone($PInfo);
?>
<div class="col-lg-12">
<h3 style="color:#000;padding-bottom: 20px;">Now you can upgrade your service plan any time by selecting the upgraded plan below.</h2>
</div>

<div <?php if($plan_id!=10&&$plan_id!=11&&$plan_id!=12){ ?> class="col-lg-6" <?php }else{?>  class="col-lg-12" <?php } ?>">
  
    <div class="panel panel-default payment-details">

      <div class="panel-heading">
        <h3 class="panel-title text-left"> <?=Yii::t("payment","Payment Details")?> </h3>
      </div>
      <div class="panel-body">
      
        <table class="price-table-style payment-page ">
      <tbody>
        
        
        <?php
         //echo  ;
        $i=1;
        foreach($individualPlanlist as $indvplist){?>
          <?php 
            if($indvplist->id==5 || $indvplist->id==7){
             //continue;
            }
          ?>
          <?php if($indvplist->id>$plan_id){?>

          <tr>
          
            <td class="plan-checkbox-container">

              <?php if($dhakaCity==0 && ($indvplist->id==5||$indvplist->id==7||$indvplist->id==9 ||$indvplist->id==10||$indvplist->id==11||$indvplist->id==12)){?>
                  <input disabled class="user_plan_box" value="<?php echo $indvplist->id;?>" type="checkbox" name="user_plan">
              <?php }else{ ?>
              <input <?php if($i==1){ echo 'checked';} ?> class="user_plan_box" value="<?php echo $indvplist->id;?>" type="checkbox" name="user_plan">
              <?php } ?>
              </td><td class="plan-text"><?=Yii::t("user",$indvplist->plan)?>
              <?php if($indvplist->description){?>
                <span class="plan-highlighter1">(<?php if($dhakaCity==0 && ($indvplist->id==5||$indvplist->id==7||$indvplist->id==9 ||$indvplist->id==10||$indvplist->id==11||$indvplist->id==12 )){ echo Yii::t("user","Dhaka City Only");}else{ echo Yii::t("user",$indvplist->description);}?>)</span>
              <?php } ?>
            </td>
          
            
            <td class="plan-text"><?php echo $indvplist->price;?> <?=$this->currency?></td>
          </tr>
        <?php $i++;}else{ ?>
            <tr>
          
            <td class="plan-checkbox-container">

              
              <input disabled class="user_plan_box" value="<?php echo $indvplist->id;?>" type="checkbox" name="">
              
              </td><td class="plan-text"><?=Yii::t("user",$indvplist->plan)?>
              <?php if($indvplist->description){?>
                <span class="plan-highlighter1">(<?=Yii::t("user",$indvplist->description)?>)</span>
              <?php } ?>
            </td>
          
            
            <td class="plan-text"><?php if($indvplist->id==$plan_id){ echo '<strong>Paid</strong> (';} ?><?php echo $indvplist->price;?> <?=$this->currency?><?php if($indvplist->id==$plan_id){ echo ')';} ?></td>
          </tr>
        <?php } ?>
        <?php
        
         } ?>
        
        
        
        <!-- temporary commented -->
        
        <tr>
           <td class="plan-checkbox-container"></td>
            <td class="text-left-payment">
              <span> <?=Yii::t('payment',"")?> <?=Yii::t('payment',"Due Fee:")?></span>
            </td>
            <td class="text-left-payment">
              <b><span class="payment-due-container"><?php echo $due_amount;?></span><?=$this->currency?>
              </b>
            </td>
        </tr>
 
      </tbody>
    </table>
      </div>
    </div>
  </div>
<?php if($plan_id!=10&&$plan_id!=11&&$plan_id!=12): ?>
<div class="col-lg-6">
    
    <div class="panel panel-default payment-details">
      <div class="panel-heading">
        <h3 class="panel-title"><?=Yii::t("payment", "Payment Method (Click on your payment button below)") ?></h3></h3>
        
      </div>
      <div class="panel-body">
        <div class="lock-icon"><i class="fa fa-lock"></i></div>   
        <label class="checkbox-inline">
        <input value="1" name="t_and_c" id="t_and_c" type="checkbox"> <?=Yii::t("payment", "By checking this box you agree to our") ?> <a data-target="#agreeModal" data-toggle="modal" href="#">Terms and Conditions</a>
      </label>
      <div class="clearfix"></div>
      <div id="payment-method-list">
<?php 
        foreach ($options as $keys => $values) : 
          if ($keys == "mobile") :
      ?>
        
                     
          <?php foreach ($values as $key => $value) : ?>    
            <?php if (in_array(strtolower($value['name']), ["bkash"])) : ?>
            
            <div class="payment-methode-wrapping">
              <?=$value['link']?></br>
              <p style="text-align:center"><?=$value['name']?></p>
            </div>

            <?php endif; ?>
    
          <?php endforeach; ?>
 
      <?php 
          endif;
        endforeach; 
      ?>
      
<!-- THIS IS WITHOUT MOBILE PAYMENT -->              
      <?php 
        foreach ($options as $keys => $values) : 
          if ($keys != "mobile") :
      ?>
        
                     
          <?php foreach ($values as $key => $value) : ?>    
            <?php if (in_array(strtolower($value['name']), ["visa", "master", "amex"])) : ?>
            
            <div class="payment-methode-wrapping">
              <?=$value['link']?></br>
              <p style="text-align:center"><?=$value['name']?></p>
            </div>

            <?php endif; ?>
    
          <?php endforeach; ?>
          <div class="clearfix"></div>
 
      <?php 
          endif;
        endforeach; 
      ?>
    </div>
    </div>
  </div>
</div>
<?php endif ?>
<style type="text/css">
  .payment-methode-wrapping{margin: 4px;}
</style>
