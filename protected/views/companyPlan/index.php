<div id="home-mid" class="reg-form income-dashbord sticky-min-height3">
	<h2>Company Plan</h2>
	
	<?=CHtml::link("Update", Yii::app()->baseUrl."/index.php/companyPlan/update" , array('class'=>'btn btn-default', 'type' => 'button'))?>

	<div class="row">
	    <div class="col-lg-12" style="padding-top: 6px;">
	        <div class="table-responsive payment-status">
	            <table class="table table-bordred table-striped">
	                <thead>
	                    <tr>
	                        <th>Plan</th>
	                        <th>Trial Period</th>
	                        <th>Price</th>
	                        <th>Maximum Number of Tax Return</th>
	                        <th>Update Date</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<tr>
	                        <td><?=$trial->plan?></td>
	                        <td><?=$trial->trial_period?> Days</td>
	                        <td>Free</td>
	                        <td><?=$trial->max_number_of_users?></td>
	                        <td><?=date("d/m/Y h:i A", strtotime($trial->updated_at))?></td>
	                    </tr>
	                    <tr>
	                        <td><?=$small->plan?></td>
	                        <td>N/A</td>
	                        <td><?=$small->price?> <?=$this->currency?></td>
	                        <td><?=$small->max_number_of_users?></td>
	                        <td><?=date("d/m/Y h:i A", strtotime($small->updated_at))?></td>
	                    </tr>
	                    <tr>
	                        <td><?=$medium->plan?></td>
	                        <td>N/A</td>
	                        <td><?=$medium->price?> <?=$this->currency?></td>
	                        <td><?=$medium->max_number_of_users?></td>
	                        <td><?=date("d/m/Y h:i A", strtotime($medium->updated_at))?></td>
	                    </tr>
	                    <tr>
	                        <td><?=$enterprise->plan?></td>
	                        <td>N/A</td>
	                        <td><?=$enterprise->price?> <?=$this->currency?></td>
	                        <td><?=$enterprise->max_number_of_users?></td>
	                        <td><?=date("d/m/Y h:i A", strtotime($enterprise->updated_at))?></td>
	                    </tr>
	                
	                </tbody>
	            </table>
	        </div>
	    </div>
	    
	</div>

<?php //echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>