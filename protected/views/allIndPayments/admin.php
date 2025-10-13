<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<div class="individual_payments_total">
    <div id="home-mid" class="reg-form income-dashbord sticky-min-height3">
    
    <?php
    
    
    Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $('#all-ind-payments-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
        return false;
    });
    ");
    ?>
    <div class="individual_payments_wrapper">
        <h1 class="pull-left">Individual Payments</h1>
        <div class="clearfix"></div>
        <?php
            $form=$this->beginWidget('CActiveForm', array(
                      'id'=>'page-form',
                      'enableAjaxValidation'=>true,
                  ));
            echo 'Filter by Year ';
            $select = isset(Yii::app()->request->cookies['ind_pay_filter_year']) ? Yii::app()->request->cookies['ind_pay_filter_year']->value : date('Y');
            $year = array (
                    ''=>'All years data',
                  
                    '2016'=>'2016',
                    
                    '2017'=>'2017',
                    '2018'=>'2018',
                    '2019'=>'2019',
                );
            $year[''] ='All years data';
            for($i=2016;$i<=date('Y');$i++){
		$year[$i] = $i;
            }

            $yearAttribute  = array('id'=>'filter_year','onchange'=>'this.form.submit()');
            echo CHtml::dropDownList('filter_year', $select, $year,$yearAttribute);
            $this->endWidget();
        ?>
        <div class="col-md-6">
            <div class="text-danger pull-right"><b>Taxable(Regular): <?php echo $plan_summary[0]['total'];?></b></div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>Taxable(Regular + Review): <?php echo $plan_summary[1]['total'];?></b> </div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>Taxable(Regular + Review + Submission): <?php echo $plan_summary[2]['total'];?></b> </div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>Single(Regular): <?php echo $plan_summary[3]['total'];?></b> </div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>Single(Regular + Review): <?php echo $plan_summary[4]['total'];?></b> </div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>Single(Regular + Review + Submission): <?php echo $plan_summary[5]['total'];?></b> </div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>ZeroTax(Regular): <?php echo $plan_summary[6]['total'];?></b> </div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>ZeroTax(Regular + Review): <?php echo $plan_summary[7]['total'];?></b> </div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>ZeroTax(Regular + Review + Submission): <?php echo $plan_summary[8]['total'];?></b> </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6">
            <div class="text-danger pull-right"><b>Actual Distinct User Count: </b> <?php echo sprintf($actualPaidUser); ?></div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>Total Payment: </b> <?php echo sprintf('%0.2f', $amount); ?></div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>Store Payment: </b><?php echo sprintf('%0.2f', $stored_amount); ?></div>
            <div class="clearfix"></div>
            <div class="text-danger pull-right"><b>SSL Commission: </b><?php echo sprintf('%0.2f', ($amount - $stored_amount)); ?></div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    
    
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id'=>'all-ind-payments-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
    
        'columns'=>array(
            
            'Name',
            'email',
            'payment_year',
            'payment_date',
            'tran_id',
            'amount',
            'discount_value',
            'discount_type',
            'store_amount',
    
    
            
            array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view}',
                    'buttons' => array(
                        'view' => array(
                            'label' => 'View',
                            'url' => 'Yii::app()->createUrl("allIndPayments/view/id/".$data->CPIId)'
                        ),				
                    ),
                ),
            ),
        
    )); ?>
    
    </div>
 </div>