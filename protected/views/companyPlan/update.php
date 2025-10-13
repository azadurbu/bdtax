<div id="home-mid" class="reg-form income-dashbord">
	<h2>Update Company Plan</h2>
	
	<?=CHtml::link("View", Yii::app()->baseUrl."/index.php/companyPlan" , array('class'=>'btn btn-default', 'type' => 'button'))?>

	<div class="row">
	    <div class="col-lg-12">
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
				'id'=>'plan-form',
				'enableAjaxValidation'=>false,
			)); ?>

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
	                        <td>
	                        	<?php echo $form->hiddenField( $trial, 'id', array('class' => 'form-control', 'value' => $trial->id, 'readonly' => "readonly", 'name' => $trial->plan, 'required' => 'required')); ?>

								<div class="col-lg-6">
									<?php echo $form->numberField( $trial, 'trial_period', array('class' => 'form-control', 'name' => "trial_period_".$trial->id, 'required' => 'required')); ?>
								</div>
								<div class="col-lg-6">
									Days
								</div>
	                        </td>
	                        <td>Free</td>
	                        <td>
	                        	<?php echo $form->numberField( $trial, 'max_number_of_users', array('class' => 'form-control', 'name' => "max_number_of_users_".$trial->id, 'required' => 'required')); ?>
	                        </td>
	                        <td><?=date("d/m/Y h:i A", strtotime($trial->updated_at))?></td>
	                    </tr>
	                    <tr>
	                        <td><?=$small->plan?></td>
	                        <td>N/A</td>
	                        <td>
	                        	<?php echo $form->hiddenField( $small, 'id', array('class' => 'form-control', 'value' => $small->id, 'readonly' => "readonly", 'name' => $small->plan, 'required' => 'required')); ?>

	                        	<div class="col-lg-6">
									<?php echo $form->numberField( $small, 'price', array('class' => 'form-control', 'name' => 'price_'.$small->id, 'required' => 'required')); ?>
								</div>
								<div class="col-lg-6">
									<?=$this->currency?>
								</div></td>
	                        <td>
	                        	<?php echo $form->numberField( $small, 'max_number_of_users', array('class' => 'form-control', 'name' => "max_number_of_users_".$small->id, 'required' => 'required')); ?>
	                        </td>
	                        <td><?=date("d/m/Y h:i A", strtotime($small->updated_at))?></td>
	                    </tr>
	                    <tr>
	                        <td><?=$medium->plan?></td>
	                        <td>N/A</td>
	                        <td>
	                        	<?php echo $form->hiddenField( $medium, 'id', array('class' => 'form-control', 'value' => $medium->id, 'readonly' => "readonly", 'name' => $medium->plan, 'required' => 'required')); ?>

	                        	<div class="col-lg-6">
									<?php echo $form->numberField( $medium, 'price', array('class' => 'form-control', 'name'=> 'price_'.$medium->id, 'required' => 'required')); ?>
								</div>
								<div class="col-lg-6">
									<?=$this->currency?>
								</div></td>
	                        <td>
	                        	<?php echo $form->numberField( $medium, 'max_number_of_users', array('class' => 'form-control', 'name' => "max_number_of_users_".$medium->id, 'required' => 'required')); ?>
	                        </td>
	                        <td><?=date("d/m/Y h:i A", strtotime($medium->updated_at))?></td>
	                    </tr>
	                    <tr>
	                        <td><?=$enterprise->plan?></td>
	                        <td>N/A</td>
	                        <td>
	                        	<?php echo $form->hiddenField( $enterprise, 'id', array('class' => 'form-control', 'value' => $enterprise->id, 'readonly' => "readonly", 'name' => $enterprise->plan, 'required' => 'required')); ?>

	                        	<div class="col-lg-6">
									<?php echo $form->numberField( $enterprise, 'price', array('class' => 'form-control', 'name' => 'price_'.$enterprise->id, 'required' => 'required')); ?>
								</div>
								<div class="col-lg-6">
									<?=$this->currency?>
								</div></td>
	                        <td>
	                        	<?php echo $form->numberField( $enterprise, 'max_number_of_users', array('class' => 'form-control', 'name' => 'max_number_of_users_'.$enterprise->id, 'required' => 'required')); ?>
	                        </td>
	                        <td><?=date("d/m/Y h:i A", strtotime($enterprise->updated_at))?></td>
	                    </tr>
	                
	                </tbody>
	            </table>
	        </div>

	        <div class="form-actions">
	            <?php $this->widget('bootstrap.widgets.TbButton', array(
	        			'buttonType'=>'submit',
	        			'type'=>'primary',
	        			'label'=>'Save',
	        		)); ?>
	        </div>

	        <?php $this->endWidget(); ?>
	    </div>
	    
	</div>

<?php //echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>