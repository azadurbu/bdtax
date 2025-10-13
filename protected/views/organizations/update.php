<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>

<?php
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Organizations','url'=>array('index')),
	array('label'=>'Create Organizations','url'=>array('create')),
	array('label'=>'View Organizations','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Organizations','url'=>array('admin')),
	);
	?>
	<div class="row">
		<div class="container nav-tabs-sticky-pi margin_bottom">
		<div role="tabpanel" id="liabilities_tab">
	
		<ul class="nav nav-tabs" role="tablist" id="myTab">
			<li role="presentation" class="active"  >
				<a href="#tab_1" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"><?=Yii::t("org_profile", "Organization Profile")?></a>
			</li>
			<li role="presentation">
				<a href="#tab_2" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"><?=Yii::t("org_profile", "Payment")?></a>
			</li>
			<?php if (Yii::app()->user->role == 'superAdmin') : ?>
				<li role="presentation">
					<a href="#tab_3" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>">Generate Payment Link</a>
				</li>
			<?php endif; ?>
			<!--
			<li role="presentation">
				<a href="#tab_4" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"><?=Yii::t('user', "Gift Voucher")?></a>
			</li>
			-->
			
		</ul>

		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_1">
				<?php echo $this->renderPartial('_form',array(
												'model'=>$model, 
												'trial' => $trial,
									            'small' => $small,
									            'medium' => $medium,
									            'enterprise' => $enterprise,
									            'paymentMethods' => $paymentMethods,
	
									        )); ?>
			</div>
			<div role="tabpanel" class="tab-pane" id="tab_2">
				<div class="row">
				    <div class="col-lg-12" style="padding-top: 6px;">
				        <div class="table-responsive payment-status">
				            <table class="table table-bordred table-striped">
				                <thead>
				                    <tr>
				                        <th>Status</th>
				                        <th>Transaction Date</th>
				                        <th>Duration</th>
				                        <th>Transaction ID</th>
				                        <th>Amount</th>
				                        <th>Card Type</th>
				                        <th>Card Issuer</th>
				                        <th>Bank Transaction ID</th>
				                        <th>Error</th>
				                       
				                      
				                          
				                    </tr>
				                </thead>
				                <tbody>

				                <?php 
				                    if ( !isset($payments) ) $payments = [];
				                    
				                    foreach ($payments as $key => $payment) {
				                ?>
				                    <tr>
				                        <th><?=$payment->status?></th>
				                        <td><?=date("d/m/Y h:i A",strtotime($payment->tran_date))?></td>
				                        <td><?=date("d/m/Y",strtotime($payment->payment_from))?> to <?=date("d/m/Y",strtotime($payment->payment_to))?></td>
				                        <td><?=$payment->tran_id?></td>
				                        <td><?=$payment->amount?></td>
				                        <td><?=$payment->card_type?></td>
				                        <td><?=$payment->card_issuer?></td>
				                        <td><?=$payment->bank_tran_id?></td>
				                        <td><?=($payment->error != "") ? $payment->error : "&nbsp;" ?></td>
				                        
				                    </tr>
				                <?php
				                    } 
				                ?>
				                </tbody>
				            </table>
				        </div>
				    </div>
				    
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="tab_3">
				<?php if (Yii::app()->user->role == 'superAdmin') : ?>
				<br />
				<div class="well">
					<div class="row">
						<div class="col-md-12" style="text-align: center;">
							
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<select id="org_plan" class="form-control">
										<option value="" selected="selected">Please Select Plan</option>
										<option value="Small">
											<?=$small->plan . " - " . $small->price . " ". $this->currency?>
										</option>
										<option value="Medium"><?=$medium->plan . " - " . $medium->price . " ". $this->currency?></option>
										<option value="Enterprise"><?=$enterprise->plan . " - " . $enterprise->price . " ". $this->currency?></option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="col-md-4"></div>
							</div>
							<div class="clearfix"></div> 
							
							<div class="row" id="other_payment" style="display: none;">
								<br>
								<div class="col-md-4"></div>
								<div class="col-md-2">
									<input id="price_amount" class="form-control" placeholder="Price Amount" type="text">
								</div>
								<div class="col-md-2">
									<input id="grand_total" class="form-control" placeholder="Gtand Total" type="text" readonly="">
								</div>
								<div class="col-md-4"></div>
							</div>

							<div class="clearfix"></div> 
							
							<div class="row">
								<br>
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<input id="cus_email" class="form-control" placeholder="Customer Email" type="email">
								</div>
								<div class="col-md-4"></div>
							</div>

							

							<div class="clearfix"></div> <br>
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-2">
									<input id="start_date" class="form-control" placeholder="Start Date" type="text">
								</div>
								<div class="col-md-2">
									<input id="end_date" class="form-control" placeholder="End Date" type="text">
								</div>
								<div class="col-md-4">
									<input id="discount_percent" value="<?=$discount_percent?>" type="hidden">
									<input id="discount_flat" value="<?=$discount_flat?>" type="hidden">
									<input id="tax" value="<?=$tax?>" type="hidden">
								</div>
							</div>
							<br>

							<button class="btn btn-success btn-lg" onclick="generatePaymentLink(<?=$model->id?>)">Generate Payment Link</button>
							<div class="row">
								<div class="col-md-12" style="word-wrap: break-word;">
									<div id="showPaymentLink"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
			</div>

			<!-- ################# gift Voucher START ################ -->
            <!--
            <div role="tabpanel" class="tab-pane" id="tab_4">
				<div class="container">
                    <div class="row">
                        <div class="col-lg-12 center">
                            <h2><?=Yii::t("payment","Gift Voucher")?>&nbsp;&nbsp;</h2>
                        </div>
                    </div>
    
                    <?php if ($voucher != null) : ?>
                    <div class="row">
                        <div class="col-lg-6">
    
                            <div class="table-responsive payment-status">
                                <table class="table table-bordred table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Voucher Code</th>
                                            <td><?=$voucher->voucher_code?></td>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <td>
                                                <?php
                                                    if ($voucher->discount_type == "PERCENT")
                                                        echo $voucher->discount_value . "%";
                                                    else 
                                                        echo $voucher->discount_value . " Tk.";
    
                                                ?>
                                            </td>
                                        </tr>
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="row">
                            <div class="col-lg-4">
                                <?php if (Yii::app()->user->role == 'superAdmin') : ?>
                                    <p><?=Yii::t("payment","No voucher code found")?></p>
                                <?php else : ?>
                                <p><?=Yii::t("payment","Please enter your gift voucher code")?></p>
                                <input type="text" id="giftVoucherCode" class="form-control"> 
                                <br>
                                <button type="button" class="btn btn-success btn-large" onClick="submitVoucherCode(<?=$model->id?>)"> <?=Yii::t("user","Redeem")?> </button>
                            
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            -->
            <!-- ################# gift Voucher ENDS ################ -->
		</div>

	</div>
	</div>
	</div>






<?php if (Yii::app()->user->role == 'superAdmin') : ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#start_date,#end_date').datepicker({
        	format: 'dd-mm-yyyy',
        	autoclose: true,
    	}).on('changeDate', function() {
           
        });

    	$("#org_plan").change(function() {
    		if ( $(this).val() == "Other" ) {
    			$("#other_payment").show();
    		}
    		else {
    			$("#other_payment").hide();
    			$("#price_amount,#grand_total").val("");
    		}
    	});

    	$("#price_amount").keyup(function() {

    		var price = ( isNaN(parseFloat( $(this).val() )) ? 0 : parseFloat( $(this).val() )) ;
    		price = Math.abs(price);

    		var tax = ( isNaN(parseFloat( $("#tax").val() )) ? 0 : parseFloat( $("#tax").val() )) ;
    		var grand_total = 0;

    		if ( $("#discount_percent").val() != "" ) {
    			var dp = ( isNaN(parseFloat( $("#discount_percent").val() )) ? 0 : parseFloat( $("#discount_percent").val() )) ;
    			grand_total = price - (price * dp / 100);
    		}

    		else if ( $("#discount_flat").val() != "" ) {
    			var df = ( isNaN(parseFloat( $("#discount_flat").val() )) ? 0 : parseFloat( $("#discount_flat").val() )) ;
    			grand_total = price - df;
    		}
    		else {
    			grand_total = price;
    		}

    		grand_total = grand_total + (tax * grand_total / 100);

    		$("#grand_total").val(grand_total.toFixed(2));
    		

    	});

	});
	function generatePaymentLink(id) {
		$('#loading').css('display','block');
		$("#showPaymentLink").html("");
		$.ajax({
			url : "<?=Yii::app()->baseUrl.'/index.php/Organizations/generatePaymentLink'?>",
			type : "POST",
			dataType : "json",
			cache : false,
			data : { 
				'id': id,
				'org_plan': $("#org_plan").val(),
				'start_date': $("#start_date").val(),
				'end_date': $("#end_date").val(),
				'grand_total': $("#grand_total").val(),
				'cus_email': $("#cus_email").val()
			},
			success : function(data) {
				if (data.status != "success") {
					$("#showPaymentLink").html('<div style="color:red;">' + data.msg + '</div>');
				}
				else {
					$("#showPaymentLink").html(data.msg);
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

<?php endif ?>

<script type="text/javascript">
	
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