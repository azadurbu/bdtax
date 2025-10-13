<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php if (isset($this->breadcrumbs)): ?>
    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,                    
                        ));
                        ?><!-- breadcrumbs -->
<?php endif ?>

	<?php echo $content; ?>

<?php $this->endContent(); ?>