<div id="home-mid" class="reg-form income-dashbord">
	<h2>Update Individual Plan</h2>
	
	<?=CHtml::link("View", Yii::app()->baseUrl."/index.php/individualPlan" , array('class'=>'btn btn-default', 'type' => 'button'))?>

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
	                        <th>Price</th>
	                        <th>Update Date</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	
	                    <tr>
	                        <td><?=$premier->plan?></td>
	                        <td>
	                        	<?php echo $form->hiddenField( $premier, 'id', array('class' => 'form-control', 'value' => $premier->id, 'readonly' => "readonly", 'name' => $premier->plan, 'required' => 'required')); ?>

	                        	<div class="col-lg-6">
									<?php echo $form->numberField( $premier, 'price', array('class' => 'form-control', 'name' => 'price_'.$premier->id, 'required' => 'required')); ?>
								</div>
								<div class="col-lg-6">
									<?=$this->currency?>
								</div></td>
	                        
	                        <td><?=date("d/m/Y h:i A", strtotime($premier->updated_at))?></td>
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