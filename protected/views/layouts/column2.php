<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/dashboard'); ?>

<?php
$data = $this->getUniqueId();

$ctrlName = explode('/', $data);

// echo "<pre>";
// print_r($ctrlName); 
?>

<section>
    <div class="search-wrapper">
        <div class="container">

        </div>
    </div>
</section>
<!--CONTENT AREA-->

<div class="col-lg-12">

<!--                     <div class="btn-group btn-breadcrumb">
                        <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                        <a href="#" class="btn btn-info">Snippets</a>
                        <a href="#" class="btn btn-success">Breadcrumbs</a>
                        <a href="#" class="btn btn-warning">Rainbow</a>
                    </div> -->


<?php if (isset($this->breadcrumbs)): ?>
    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,                    
                        ));
                        ?><!-- breadcrumbs -->
<?php endif ?>




<?php  if ($ctrlName[0] == 'dashboard') { ?>




<?php  } else { ?>
    <div class="col-lg-2" style="margin-left:0px;"> <!--Left Side Bar span-->
    <!--#########################################################################search filter option-Start############################-->

    <div class="login-rt">
    <?php if (Yii::app()->user->role == 'superAdmin') { ?>
        <!-- <h2>Setting</h2> -->
    <?php } else {
        ?>
        <h1> </h1>
    <?php } ?>

    <!-- Main navigation -->
    <nav class="main-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">

    <!--Super User vip room  Start-->
    <?php if (Yii::app()->user->role == 'superAdmin') { ?>

        <?php
        if ((@$ctrlName[0] == 'dashboard') ||
            (@$ctrlName[0] == 'adminDistrict') ||
            (@$ctrlName[0] == 'adminDistrictArea') ||
            (@$ctrlName[0] == 'adminMarket') ||
            (@$ctrlName[0] == 'adminProductSubType') ||
            (@$ctrlName[0] == 'adminProductType') ||
            (@$ctrlName[0] == 'adminShopType') ||
            (@$ctrlName[0] == 'user')) {
            ?>
            <li <?php if ($ctrlName[0] == 'user') { ?> class="active" <?php } ?> >
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/admin" class="no-submenu"><span class="icon-wrench"></span>Users</a></li>
            <?php if (($ctrlName[0] == 'user') && (($this->action->Id) != 'family')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?> <!--user menu section  End-->

            <!--#########################################START----------------dashboard####################################################################################-->
            <li <?php if ($ctrlName[0] == 'dashboard') { ?> class="active" <?php } ?>>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/dashboard/admin" class="no-submenu"><span class="icon-arrow-right"></span>Brand</a></li>
            <?php if (($ctrlName[0] == 'dashboard')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <!--#########################################END----------------dashboard####################################################################################-->

            <!--#########################################START----------------adminDistrict####################################################################################-->
            <li <?php if ($ctrlName[0] == 'adminDistrict') { ?> class="active" <?php } ?>>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/adminDistrict/admin" class="no-submenu"><span class="icon-arrow-right"></span>District</a></li>
            <?php if (($ctrlName[0] == 'adminDistrict')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <!--#########################################END----------------adminDistrict####################################################################################-->

            <!--#########################################START----------------adminDistrictArea####################################################################################-->
            <li <?php if ($ctrlName[0] == 'adminDistrictArea') { ?> class="active" <?php } ?>>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/adminDistrictArea/admin" class="no-submenu"><span class="icon-arrow-right"></span>District Area</a></li>
            <?php if (($ctrlName[0] == 'adminDistrictArea')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <!--#########################################END----------------adminDistrictArea####################################################################################-->

            <!--#########################################START----------------adminMarket####################################################################################-->
            <li <?php if ($ctrlName[0] == 'adminMarket') { ?> class="active" <?php } ?>>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/adminMarket/admin" class="no-submenu"><span class="icon-arrow-right"></span>Market</a></li>
            <?php if (($ctrlName[0] == 'adminMarket')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <!--#########################################END----------------adminMarket####################################################################################-->

            <!--#########################################START----------------adminProductType####################################################################################-->
            <li <?php if ($ctrlName[0] == 'adminProductType') { ?> class="active" <?php } ?>>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/adminProductType/admin" class="no-submenu"><span class="icon-arrow-right"></span>Product Type</a></li>
            <?php if (($ctrlName[0] == 'adminProductType')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <!--#########################################END----------------adminProductType####################################################################################-->

            <!--#########################################START----------------adminProductSubType####################################################################################-->
            <li <?php if ($ctrlName[0] == 'adminProductSubType') { ?> class="active" <?php } ?>>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/adminProductSubType/admin" class="no-submenu"><span class="icon-arrow-right"></span>Product Sub Type</a></li>
            <?php if (($ctrlName[0] == 'adminProductSubType')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <!--#########################################END----------------adminProductSubType####################################################################################-->

            <!--#########################################START----------------adminShopType####################################################################################-->
            <li <?php if ($ctrlName[0] == 'adminShopType') { ?> class="active" <?php } ?>>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/adminShopType/admin" class="no-submenu"><span class="icon-arrow-right"></span>Shop Type</a></li>
            <?php if (($ctrlName[0] == 'adminShopType')) {
                ?>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
                ));
                $this->endWidget();
                ?>
                <div style="clear:both;"></div>
            <?php } ?>
            <!--#########################################END----------------adminShopType####################################################################################-->

        <?php } ?> <!--User and all admin menu section  End-->

    <?php } ?>
    <!--######################################################## superAdmin menu End##################################################################################-->

    <!--School menu in  Start-->

    <?php if (@$ctrlName[0] == 'market') { ?>
        <li <?php if ($ctrlName[0] == 'market') { ?> class="active" <?php } ?>>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/market/admin" class="no-submenu"><span class="icon-arrow-right"></span>Market</a></li>

        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => '',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
        ));
        $this->endWidget();
        ?>
        <div style="clear:both;"></div>
    <?php } ?>


    <?php if (@$ctrlName[0] == 'payment') {
        ?>
        <li <?php if ($ctrlName[0] == 'payment') { ?> class="active" <?php } ?>>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/payment" class="no-submenu"><span class="icon-arrow-right"></span>Schools</a>
        </li>

        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => 'Operations',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
        ));
        $this->endWidget();
        ?>
        <div style="clear:both;"></div>
    <?php } ?>


    <div style="clear:both;"></div>

    <?php if (@$ctrlName[0] == 'product') { ?>
        <li class="active">
            <!--<li <?php if ($ctrlName[0] == 'product') { ?> class="active" <?php } ?>>-->
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/student/admin" class="no-submenu"><span class="icon-arrow-right"></span>Product</a>
        </li>

        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => '',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'nav nav-stacked span operations '),
        ));
        $this->endWidget();
        ?>
        <div style="clear:both;"></div>
    <?php } ?>

    <?php if (@$ctrlName[0] == 'your') { ?>
<!--        <li --><?php //if ($ctrlName[0] == 'market') { ?><!-- class="active" --><?php //} ?>
<!--            <a href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/index.php/market/admin" class="no-submenu"><span class="icon-arrow-right"></span>Market</a></li>-->
<li>Testing</li>

        <div style="clear:both;"></div>
    <?php } ?>



    <div style="clear:both;"></div>



    </ul>

    </nav>
    <!-- /Main navigation -->

    </div>

    </div><!--/left-side-bar End-->
<?php } ?>

<div class="col-lg-10" style="/*margin-top: 50px;*/">



    <?php echo $content; ?>


</div>


</div>


<?php $this->endContent(); ?>

<style>
    .portlet {
        padding-left:10px;
    }
    .portlet-content a{
        padding-left:0px;
    }

        /*-------------------------------------For----Breadcrumbs---------------------------------*/



</style>


