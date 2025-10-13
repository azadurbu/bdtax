<div id="home-mid" class="reg-form income-dashbord">

<?=CHtml::link("Back", Yii::app()->baseUrl."/index.php/allIndPayments", array('class'=>'btn btn-default', 'type' => 'button'))?>

<?=CHtml::link("Update", Yii::app()->baseUrl."/index.php/user/admin/update/id/".$model->UserId , array('class'=>'btn btn-default', 'type' => 'button'))?>


<h1>Individual #<?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CPIId',
		'Name',
		'email',
		'payment_year',
		'payment_date',
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
	                        <th>Tax Year</th>
	                        <th>Transaction Date</th>
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
	                        <th><?=$payment->payment_year?></th>
	                        <td><?=date("d/m/Y h:i A",strtotime($payment->tran_date))?></td>
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
