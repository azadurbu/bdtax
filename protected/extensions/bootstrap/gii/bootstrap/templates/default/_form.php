<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

<!-- Data block -->
<?php echo '<article class="data-block">
    <div class="data-container">
        <section class="login-rt">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>'; ?>

<?php echo '<?php $t = $form->errorSummary($model);
            if (!empty($t)): ?>
                <div class="alert alert-error fade in" style=" ">
                    <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo $form->errorSummary($model); ?></div>
            <?php endif; ?>

                <fieldset class="form-horizontal " >';
?>

<?php $cls_boot="array('class' => 'col-sm-3 control-label', 'for' => 'test', 'placeholder'=>'....', 'style' => 'color:#555555')";?>
<?php $cls_boot2="array('class' => 'form-control', 'id'=>'TestForm_textField', 'style' => 'color:#555555')";?>
<?php //$cls2="array('class' => 'help-block')";?>


<?php
foreach ($this->tableSchema->columns as $column) {
    if ($column->autoIncrement) {
        continue;
    }
?>

<?php echo '<div class="form-group">'; ?>
<?php echo "<?php echo " . $this->generateInputLabel($this->modelClass, $column, $cls_boot) . "; ?>\n"; ?>
<?php echo '<div class="col-sm-5 col-sm-9 form-inline">'; ?>
<?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column, $cls_boot2) . "; ?>\n"; ?>
<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>

<?php echo '</div>'; ?>
<?php echo '</div>'; ?>

<?php
}
?>
<div class="form-actions">
    <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>\$model->isNewRecord ? 'Create' : 'Save',
		)); ?>\n"; ?>
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

<?php echo '  </fieldset>
                            </section>
                        </div>

                    </article>
                    <!-- /Data block -->
                    <!-- /Grid controls -->'; ?>
