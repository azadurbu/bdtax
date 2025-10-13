<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet" type="text/css" />
<?php
$this->breadcrumbs = array(
//    UserModule::t('Administration') => array('/user'),
  UserModule::t('User'),
  );

$this->menu = array(
  array('label' => UserModule::t('Create User'), 'url' => array('create')),
  array('label' => UserModule::t('Manage Users'), 'url' => array('admin')),
  array('label' => UserModule::t('List User'), 'url' => array('/user')),
  );


//echo $test->company;
  ?>
<?php
  if(Yii::app()->user->hasFlash('success')) {
?>
    <div class="flash_alert"><div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
    <?=Yii::app()->user->getFlash('success')?></div></div>
<?php
    } else if(Yii::app()->user->hasFlash('error')) {
?>
    <div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('error')?></div></div>
<?php
    }
?>

  <div class="panel panel-success filterable">
    <div class="panel-heading">

      <div class="row">
        <div class="col-lg-6">
          <h3 class="panel-title"><strong><?php echo Yii::t('user','Manage Users'); ?></strong></h3>
        </div>
        <div class="col-lg-6">
          
          <?php
          echo CHtml::link(Yii::t('user','Add User'), array('/user/admin/create'), array('class' => 'btn btn-success pull-right'));
          ?>
        </div>
      </div>
    </div>
<div class="common-padding admin-dasbord-input sticky-min-height2">
	<div>
      <?php $form=$this->beginWidget('CActiveForm', array(
          'id'=>'page-form',
          'enableAjaxValidation'=>true,
      )); ?>
	  </br>
      <b style="padding-left: 13px;"><?=Yii::t('common', "From")?> : </b>
      <?php
      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
          'name'=>'from_date',  // name of post parameter
          'value'=>isset(Yii::app()->request->cookies['from_date']) ? Yii::app()->request->cookies['from_date']->value : '',  // value comes from cookie after submittion
          'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'yy-mm-dd',
          ),
          'htmlOptions'=>array(

          ),

      ));
      ?>
      <b><?=Yii::t('common', "To")?> : </b>
      <?php
      // var_dump(Yii::app()->request->cookies['from_date']->value);

      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
          'name'=>'to_date',
          'value'=>isset(Yii::app()->request->cookies['to_date']) ? Yii::app()->request->cookies['to_date']->value : '',
          'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'yy-mm-dd',

          ),
          'htmlOptions'=>array(

          ),
      ));
      ?>
      <?php echo CHtml::submitButton(Yii::t('common', "Go"), array('class' => 'btn btn-success btn-xl')); ?>


      <?php $this->endWidget(); ?>

	</div>

    <?php
    $this->widget('bootstrap.widgets.TbExtendedGridView', array(
      'id'=>'user-grid',
      'dataProvider'=>$model->search(),
      'filter'=>$model,
                    // 'htmlOptions'=>array('class'=>'test'),
      'columns'=>array(
        'first_name',
        'last_name',
        array(
          'name'=>'create_at',
          'type'=>'raw',
          'visible' => '(Yii::app()->user->role=="superAdmin")',
          'value'=>@$data->create_at,
        ),
        array(
          'name'=>'email',
          'type'=>'raw',
          'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
        ),
        array(
          'name'=>'Role',
          'value'=>'CHtml::encode(@$data->userRole->role)'
        ),
        array(
          'class' => 'bootstrap.widgets.TbToggleColumn',
          'toggleAction' => 'admin/toggle',
          'name' => 'status',
          'htmlOptions'=>array('title'=>'Active / Inactive'),
          'header' => Yii::t('user','Active / Inactive'),
          'filter'=>CHtml::dropDownList('User[status]', $model->status, array("1" => "Active", "0" => "Inactive"), array('empty'=>'Select','class'=>'form-control')),
          ),
        array(
          'class' => 'bootstrap.widgets.TbButtonColumn',            
          'template' => '{resend} {update} {delete}',
          'buttons' => array(

            'resend' => array(
              'label' => 'Resend Activation Email',
              'icon' => 'fa fa-paper-plane fa-lg',
              // 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
              'url' => 'Yii::app()->createUrl("user/admin/sendActivationEmailAgain/id/".$data->id)',
              ),


            'delete' => array(
              'label' => 'Delete',
              'icon' => 'fa fa-remove fa-lg',
              // 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
              'url' => 'Yii::app()->createUrl("user/admin/delete/id/".$data->id)',
              ),

          //
            ),
          ),

        ),
        )); ?>


<?php 

    /*$this->widget('bootstrap.widgets.TbExtendedGridView', array(
      'id'=>'user-grid',
      'dataProvider'=>$deletedModel->deletedSearch(),
      'filter'=>$deletedModel,
                    // 'htmlOptions'=>array('class'=>'test'),
      'columns'=>array(
        'first_name',
        'last_name',
        array(
          'name'=>'email',
          'type'=>'raw',
          'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
          ),
        array(
          'name'=>'Role',
          'value'=>'CHtml::encode(@$data->userRole->role)'),
        array(
          'class' => 'bootstrap.widgets.TbButtonColumn',            
          'template' => '{update} {delete}',
          'buttons' => array(

        'delete' => array(
          'label' => 'Delete',
          'icon' => 'fa fa-remove fa-lg',
                            // 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
          'url' => 'Yii::app()->createUrl("user/admin/hardDelete/id/".$data->id)',
          ),
  
          //
            ),
          ),

        ),
        ));*/ ?>


		

      </div>
      <!-- /Grid row -->

      <div class="data-container" style="margin-top:30px;">

        <div class="pull-right ">

          <input type='hidden' id='current_page' />
          <input type='hidden' id='show_per_page' />

          <div class="pagination"></div>

        </div>

      </div>

    </div>
</div>
    <!-- /Right (content) side -->
  </div>

  <script type="text/javascript">
    //$('.summary').hide();
  </script>

  <style type="text/css">
    .grid-view {
      padding-top: 5px !important;
    }

    a {
      color: #5cb85c;
      text-decoration: none;
    }
  </style>
