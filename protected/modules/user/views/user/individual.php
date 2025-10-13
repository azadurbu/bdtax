
<!-- GAS START-->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function()
        { (i[r].q=i[r].q||[]).push(arguments)}

        ,i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68998551-1', 'auto');
    ga('send', 'pageview');

</script>

<!-- GAS END-->

<?php $this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', "Registration");?>
<!--<div class="row" >-->
<?php
/* $this->breadcrumbs=array(
Yii::t('user',"Registration"),
); */

// Yii::app()->language='bn';
?>

<title><?=$this->pageTitle;?></title>


<div class="content-wrapper">


    <!--#########################################------------------------#######################################-->

    <?php if (Yii::app()->user->hasFlash('registration')): ?>

        <div class="login">
            <div class="logo"></div>
            <div style='padding: 20px; text-align: center; font-size: 15px; display: block; margin: 20px 0px 150px;' class='label label-success '>
                <?php echo Yii::app()->user->getFlash('registration'); ?>
            </div>



        </div>
    <?php else: ?>
        <div class="container plan-selection">
            
        <?php  
        $Plans = array();
        foreach ($individualPlan as $plan) {
            $Plans[$plan['id']][] = $plan['plan'];
            $Plans[$plan['id']][] = $plan['price'];
        }

        ?>
            <!-- New Html -->
            
    <div class="project-plan">
    <div class="container compare-tab" role="tabpanel">
        <h2 class="text-center mt-3"><?=Yii::t("user", "Compare Individual BDTAX Plan") ?></h2>
            <ul class="nav nav-tabs mt-2 mb-3" role="tablist">
                <li><a class="nav-item nav-link active" id="nav-zero-tax" data-toggle="tab" href="#zero-tax" role="tab" aria-controls="zero-tax" aria-selected="true"><?=Yii::t("user", "One Page Form (IT-GHA 2020)");?></a></li>
                <li><a class="nav-item nav-link" id="nav-taxable" data-toggle="tab" href="#taxable" role="tab" aria-controls="taxable" aria-selected="false"><?=Yii::t("user", "Multiple Page Form (IT-11 GA 2016)");?></a></li>
            </ul>
    
        <div class="wrapper-tab-content">
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active in" id="zero-tax" role="tabpanel" >

                <div class="wrapper-tab-inner-content">
                    <div class="card-deck mb-3 text-center">
                        <div class="card col-sm-3 box-shadow basic-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[3][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Prepare tax return, download & submit it by yourself.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[3][1]);?></h1>
                            
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your return by quick & easy step-by-step process.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Receive 100% accurate & automatic tax calculation.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get unlimited data revisions & unlimited PDF (tax return file) downloads.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get easy download & print.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit tax return at your local NBR office.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            
                                <h4 ><?=Yii::t("user", "Other Value Added Services");?> </h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get answers 24/7 from our online BDTAX specialists team.");?><span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Work on your tax return anytime you want.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Bank-level data encryption & protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            </div>
                          </div>
                        </div>
                        
                        <div class="card col-sm-3 box-shadow plus-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[6][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Prepare tax return, review return with our expert tax consultant, download & submit return by yourself.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[6][1]);?></h1>
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your return by quick & easy step-by-step process.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Receive 100% accurate & automatic tax calculation.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get unlimited data revisions & unlimited PDF (tax return file) downloads.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Review tax return by BDTax tax specialists.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get easy download & print.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit tax return at your local NBR office.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            
                                <h4 ><?=Yii::t("user", "Other Value Added Services");?></h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get answers 24/7 from our online BDTAX specialists team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Work on your tax return anytime you want.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Bank-level data encryption & protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="card col-sm-3 box-shadow premium-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[7][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Prepare tax return, review return with our expert tax consultant, submit return by BDTax team.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[7][1]);?> </h1>
                            
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your return by quick & easy step-by-step process.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Receive 100% accurate & automatic tax calculation.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get unlimited data revisions & unlimited PDF (tax return file) downloads.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Review tax return by BDTax tax specialists.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit your tax return file by BDTax team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Received your acknowledgement slip via email/courier.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            
                                <h4><?=Yii::t("user", "Other Value Added Services");?></h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get 24/7 support from our online BDTax specialists.");?><span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Work on your tax return anytime you want.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Bank-level data encryption & protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="card col-sm-3 box-shadow basic-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[11][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Your Tax Data Input, Prepare Return, Review, and Submission will be completed by BDTax Team.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[11][1]);?></h1>
                            
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your total tax return process by BDTax Team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Tax Data inputted by BDTax Team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit your tax return file by BDTax team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Received your acknowledgement slip via email/courier.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get your tax return PDF file.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            
                                <h4 ><?=Yii::t("user", "Other Value Added Services");?> </h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get answers 24/7 from our online BDTAX specialists team.");?><span>
                                        <p style="clear:both"></p>
                                    </li>
                                   
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Bank-level data encryption & protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="taxable" role="tabpanel">
            
                    <div class="wrapper-tab-inner-content">
                    <div class="card-deck mb-3 text-center">
                        <div class="card col-sm-3 box-shadow basic-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[1][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Prepare tax return, download & submit return by yourself.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[1][1]);?></h1>
                            <p><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[2][1]);?> (<?=Yii::t("user", "Zero Tax");?>)</p>
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper-taxable">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your return by quick & easy step-by-step process.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Receive 100% accurate & automatic tax calculation.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Maximize tax deductions and credits.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Check the amount of tax you have to pay.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get unlimited data revisions & unlimited PDF (tax return file) downloads.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get easy download & print.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit return & pay at local NBR office or bank.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                </ul>
                                <h4 ><?=Yii::t("user", "Other Value Added Services");?> </h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get 24/7 support from our online BDTax specialists.");?><span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Work on your tax return anytime you want.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Receive bank-level data encryption and protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="card col-sm-3 box-shadow plus-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[4][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Prepare tax return, review return with our expert tax consultant, download & submit return by yourself.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[4][1]);?></h1>
                            <p><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[8][1]);?> (<?=Yii::t("user", "Zero Tax");?>)</p>
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper-taxable">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your return by quick & easy step-by-step process.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Receive 100% accurate & automatic tax calculation.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Maximize tax deductions and credits.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Check the amount of tax you have to pay.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get unlimited data revisions & unlimited PDF (tax return file) downloads.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Review your return by BDTax tax specialists.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get easy download & print.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit return & pay at local NBR office or bank.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                                <h4 ><?=Yii::t("user", "Other Value Added Services");?></h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get 24/7 support from our online BDTax specialists.");?><span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Work on your tax return anytime you want.");?>
    </span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?>
    </span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Receive bank-level data encryption and protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="card col-sm-3 box-shadow premium-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[5][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Prepare tax return, review return with our expert tax consultant, submit return by BDTax team.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[5][1]);?></h1>
                            <p><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[9][1]);?> (<?=Yii::t("user", "Zero Tax");?>)</p>
                           
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper-taxable">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your return by quick & easy step-by-step process.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Receive 100% accurate & automatic tax calculation.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Maximize tax deductions and credits.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Check the amount of tax you have to pay.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get unlimited data revisions & unlimited PDF (tax return file) downloads.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Review your return by BDTax tax specialists.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit your tax return file by BDTax team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Receive your tax submission acknowledgement slip via email/courier.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                </ul>
                                <h4><?=Yii::t("user", "Other Value Added Services");?> </h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get 24/7 support from our online BDTax specialists.");?><span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Work on your tax return anytime you want.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?>
    </span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Receive bank-level data encryption and protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                </ul>
                            </div>  
                          </div>
                        </div>

                                                <div class="card col-sm-3 box-shadow basic-wrapper">
                          <div class="card-header">
                            <h4 class="my-0 font-weight-normal"><?=Yii::t("user", $Plans[10][0]);?></h4>
                          </div>
                          <div class="card-body">
                            <p class="card-preparation"><?=Yii::t("user", "Your Tax Data Input, Prepare Return, Review, and Submission will be completed by BDTax Team.");?></p>
                            <h1 class="card-title pricing-card-title"><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[10][1]);?></h1>
                            <p><?=Yii::t("user", "BDT");?> <?=Yii::t("user", $Plans[12][1]);?> (<?=Yii::t("user", "Zero Tax");?>)</p>
                            <a type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/registration/individual" class="btn btn-lg btn-block btn-danger bttn-size"><?=Yii::t("user", "Start for Free");?></a>
                            <div class="box-padd">
                                <ul class="list-unstyled mt-3 mb-4 list-upper-taxable">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Complete your total tax return process by BDTax Team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i>
                                        <span><?=Yii::t("user", "Tax Data inputted by BDTax Team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Submit your tax return file by BDTax team.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Received your acknowledgement slip via email/courier.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get your tax return PDF file.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    
                                    
                                </ul>
                                <h4 ><?=Yii::t("user", "Other Value Added Services");?> </h4>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Get 24/7 support from our online BDTax specialists.");?><span>
                                        <p style="clear:both"></p>
                                    </li>
                                   
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Store your return related documents securely.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check circle" aria-hidden="true"></i><span><?=Yii::t("user", "Receive bank-level data encryption and protection.");?></span>
                                        <p style="clear:both"></p>
                                    </li>
                                </ul>
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
            
            </div>
        </div>

        </div>
    
    </div>

    </div>

            <!-- New Html End -->  
					
                        	<div class="col-xs-12">
                            	<div class="we-accept"> 
                                 <p><?=Yii::t('user',"We Accept")?></p>
                                 <ul>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/visa.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/master.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/amex.png" /></li>   
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/bkash.png" /></li>

                                 </ul>
                                 </div>
                            </div>
			


        </div>

    </div>


            

    <?php endif;?>
    <!--#########################################------------------------#######################################-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/accept_bttn_css.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>

.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}


.h4, h4 {
        font-size: 22px;
    font-weight: 700;
    text-align: center;
}
.project-plan{font-size: 14px;}

@media (min-width: 768px) {
  .project-plan {
    font-size: 16px;
  }
}

.pricing-header {
  max-width: 700px;
}

.card-deck .card {
  min-width: 220px;
}


.compare-tab{
    text-align: center;
    position: relative;
    z-index: 1;
}

.compare-tab .nav-tabs{
    display: inline-block;
    border: 1px solid #cdcdcd;
    background: #f9f9f9;
    border-radius: 50px;
    text-align: center;
    /*padding: 0 20px;*/
}
.compare-tab .nav-tabs li{
    float: none;
    display: inline-block;
    position: relative;
}
.compare-tab .nav-tabs li:after{
    content: "";
    /*width: 1px;*/
    height: 40px;
    background: #c4c4c4;
    position: absolute;
    top: 0;
    right: 0;
    font-size: 20px;
    /*transform: rotate(15deg) translateY(-50%);*/
}
.compare-tab .nav-tabs li:last-child:after{
    width: 0;
    height: 0;
}
.compare-tab .nav-tabs li a{
    font-size: 16px;
    font-weight: 700;
    color: #999;
    border: none;
}
.compare-tab .nav-tabs li a:hover{
    background: transparent;
    color: #b90601;
    border: none;
}
.compare-tab .nav-tabs li a.active{
    color: #b90601;
    background:none;
}
.compare-tab .nav-tabs li.active a,
.compare-tab .nav-tabs li.active a:focus,
.compare-tab .nav-tabs li.active a:hover{
    border: none;
    background: none;
    color: #ae1b56;
}
.compare-tab .tab-content{
    font-size: 14px;
    color: #686868;
    line-height: 25px;
    text-align: left;
    padding: 5px 20px;
}
.compare-tab .compare-tab-content h3{
    font-size: 22px;
    color: #232323;
}
.list-unstyled li{
    text-align:left;
    font-size:18px;
}
.list-unstyled li i{
    float: left;
    margin-top: 6px;
    padding-right: 10px;
    font-size: 20px;
    color:#18a815;
}
.list-unstyled li span{
    float: left;
    display: block;
    width: 85%;
}
.basic-wrapper, .plus-wrapper, .premium-wrapper
{
    border:none;
}
.basic-wrapper .card-body, .plus-wrapper .card-body, .premium-wrapper .card-body
{
    padding:0px;
}
#zero-tax .box-padd, #taxable .box-padd{
    padding: 1.25rem;
    border: 1px solid rgba(0,0,0,.125);
    background:#e6f1e6;
    margin-top:10px;
}
#zero-tax .box-padd{
    height:1050px;
}
#taxable .box-padd{

    height:1170px;
}
.compare-tab .basic-wrapper .card-header{
    /*background-color: rgb(0,103,2);
    color:#fff;*/
}
.compare-tab .plus-wrapper .card-header{
    /*background-color: rgb(185,6,1);
    color:#fff;*/
}
.compare-tab .premium-wrapper .card-header{
    /*background-color: rgb(22,168,21);
    color:#fff;*/
}
.compare-tab .card-body p{
    font-size:20px;
    margin-bottom: 1rem;
}
.compare-tab .nav-tabs li:nth-child(1) a.active {
    color: #fff;
    background: #16a815;
    border-radius: 50px 0px 0px 50px;
    -moz-border-radius: 50px 0px 0px 50px;
    -webkit-border-radius: 50px 0px 0px 50px;
    border: 0px solid #000000;
}
.compare-tab .nav-tabs li:nth-child(2) a.active {
    color: #fff;
    background: #16a815;
    border-radius: 0px 50px 50px 0px;
    -moz-border-radius: 0px 50px 50px 0px;
    -webkit-border-radius: 0px 50px 50px 0px;
    border: 0px solid #000000;
}
.compare-tab .card-preparation{
    min-height:100px;
    padding-top:20px;
    height: 150px;
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
}
.card-header h4{text-transform: uppercase;}

.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

.mt-3, .my-3 {
    margin-top: 1rem!important;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
}

.list-upper {
    height: 585px;
}

.list-upper-taxable {
    height: 705px;
}

@media only screen and (max-width: 5000px) and (min-width:1000px){

    .compare-tab .bttn-size{
        width:200px;
        margin:10px auto;
    }
}

@media only screen and (max-width: 1005px) and (min-width:600px){

    .compare-tab .card-deck .card {
        min-width: 90%!important;
    }
    #zero-tax .box-padd{
        height:550px;
    }

    #taxable .box-padd{

        height:630px;
    }
    .compare-tab .list-unstyled li {
        clear: both;
    }
}
@media only screen and (max-width: 599px) and (min-width:480px){

    .compare-tab .card-deck .card {
        min-width: 90%!important;
    }
    #zero-tax .box-padd{
        height:630px;
    }

    #taxable .box-padd{

        height:630px;
    }
    .compare-tab .list-unstyled li {
        clear: both;
    }
    
}
@media only screen and (max-width: 479px) and (min-width:320px){

    .compare-tab .nav-tabs {
        border-radius: 0; 
    }
    .compare-tab .nav-tabs li a.active{
        border-radius:0!important;
    }
}
@media only screen and (max-width: 359px) and (min-width:320px){

    .list-unstyled li i {
        padding-right: 8px;
    }
    #zero-tax .box-padd{
        height:850px;
    }

    #taxable .box-padd{

        height:950px;
    }
}

@media only screen and (max-width: 1150px) and (min-width:1005px){
   #zero-tax .box-padd{
    height:850px;
    }
    
    #taxable .box-padd{

        height:950px;
    }
}

@media only screen and (max-width: 1059px) and (min-width:1006px){
   .compare-tab .card-preparation {
        min-height: 120px!important;
    }
}

@media only screen and (max-width: 480px){
    .compare-tab:before{
        width: 0;
        height: 0;
    }
    .compare-tab .nav-tabs{ padding: 0; }
    .compare-tab .nav-tabs li{
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #e9e9e9;
    }
    .compare-tab .nav-tabs li:last-child{
        border-bottom: none;
    }
    .compare-tab .nav-tabs li:after{
        width: 0;
        height: 0;
    }
}
        
    </style>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script data-cfasync="false">
(function(W,i,s,e,P,o,p){W['WisePopsObject']=P;W[P]=W[P]||function(){(W[P].q=W[P].q||[]).push(arguments)},W[P].l=1*new Date();o=i.createElement(s),p=i.getElementsByTagName(s)[0];o.defer=1;o.src=e;p.parentNode.insertBefore(o,p)})(window,document,'script','//loader.wisepops.com/get-loader.js?v=1&site=cgTnXD4nkT','wisepops');
</script>



