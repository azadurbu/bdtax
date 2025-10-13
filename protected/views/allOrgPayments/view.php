<div id="home-mid" class="reg-form income-dashbord">

<?=CHtml::link("Back", Yii::app()->baseUrl."/index.php/allOrgPayments", array('class'=>'btn btn-default', 'type' => 'button'))?>

<?=CHtml::link("Update", Yii::app()->baseUrl."/index.php/Organizations/update/id/".$model->org_id , array('class'=>'btn btn-default', 'type' => 'button'))?>

<h1>Organization #<?php echo $model->organization_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'org_id',
		'contact_first_name',
		'contact_last_name',
		'organization_name',
		'contact_email',
		'org_plan',
		'payment_date',
		'payment_from',
		'payment_to',
		'tran_id',
		'amount',
		'store_amount',
		'discount_type',
		'discount_value',
	),
)); ?>

	<div class="row">
	    <div class="col-lg-12" style="padding-top: 6px;">
	    <h2>Payment History</h2>
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
