<div id="home-mid" class="reg-form income-dashbord sticky-min-height3">
	<h2>Individual Plan</h2>
	
	<?=CHtml::link("Update", Yii::app()->baseUrl."/index.php/individualPlan/update" , array('class'=>'btn btn-default', 'type' => 'button'))?>

	<div class="row">
	    <div class="col-lg-12" style="padding-top: 6px;">
	        <div class="table-responsive payment-status">
	            <table class="table table-bordred table-striped">
	                <thead>
	                    <tr>
	                        <th>Plan</th>
	                        <th>Price</th>
	                        <th>Update Date</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	
	                    <tr>
	                        <td><?=$premier->plan?></td>
	                        <td><?=$premier->price?> <?=$this->currency?></td>
	                        <td><?=date("d/m/Y h:i A", strtotime($premier->updated_at))?></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
	    </div>
	    
	</div>

<?php //echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>