<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/dashboard'); ?>

<?php
$data = $this->getUniqueId();

$ctrlName = explode('/', $data);

// echo "<pre>";
// print_r($ctrlName); 
?>

<div class="container">
    <div class="registration">
        <div class="dashboard-box">
            <?php echo $content; ?>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<?php $this->endContent(); ?>

