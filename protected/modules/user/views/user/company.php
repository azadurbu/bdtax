<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/accept_bttn_css.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<style>
.price-table-style .circle {
	display:block;
	float:left;
	margin-top: 2px;
}
.price-table-style .table-title-txt {
	display: block;
    float: left;
    width: 90%;
    padding-left: 5px;
}
</style>
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
<?php 
    $planTrial = CompanyPlan::model()->find(array('condition' => "plan='Trial'"));
    $planSmall = CompanyPlan::model()->find(array('condition' => "plan='Small'"));
    $planMedium = CompanyPlan::model()->find(array('condition' => "plan='Medium'"));
    $planEnterprise = CompanyPlan::model()->find(array('condition' => "plan='Enterprise'"));
?>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/input_mask.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#RegistrationForm_mobile").mask("99999999999");
        //$("#RegistrationForm_mobile").mask("(999) 999-9999");
        //var phoneNumber1 =phoneNumber.replace('(', "").replace(')', "").replace('-', "").replace(' ', "");
    });
</script>
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
            <div class="logo"></div>

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title-responsive text-center" style="color:gray"><?php echo Yii::t('user', "Select the plan that is best for your Company"); ?></h2>
                </div>
            </div>
            <br />

            <div class="row">

                <div class="col-xs-12">
                    <div class="table-responsive company-plan">
                        <table class="price-table-style border2">

                            <colgroup></colgroup>
                            <colgroup></colgroup>
                            <colgroup></colgroup>
                            <colgroup></colgroup>
                            <colgroup></colgroup>

                            <thead>
                            <tr class="most-popular-row">
                                <td>&nbsp;</td>
                                <td class="most-popular-row-border-hide">&nbsp;</td>
                                <td class="most-popular-row-border-hide">&nbsp;</td>
                                <!-- <td class="image-bottom most-popular-row-border-hide">
                                    <img src="<?php echo Yii::app()->baseUrl ?>/images/most-popular-pic.png">
                                </td> -->
                                <td class="most-popular-row-border-hide">&nbsp;</td>
                            </tr>

                            <tr>
                                <th style="font-size: 16px; color: #444; font-weight: bold;"><?=Yii::t('user',"Are you an individual taxpayer")?>?   <a href="<?=Yii::app()->baseUrl.'/index.php/user/registration/registerindividual'?>"><?=Yii::t('user',"Click here")?></a></th>
                                <th>
                                    <h2><?=Yii::t('user',"LITE")?></h2>
                                </th>
                                <th>
                                    <h2><?=Yii::t('user',"BASIC")?></h2>
                                </th>
                                <th>
                                    <h2><?=Yii::t('user',"PRO")?></h2>
                                </th>
                                <th>
                                    <h2><?=Yii::t('user',"ENTERPRISE")?></h2>
                                </th>
                            </tr>

                            <tr class="price-table-style-price">
                                <td class="border-bottom-compare"><?=Yii::t('user',"Compare our product features and benefits")?> <br/>
                                    </td>
                                <td>
                                    <p><?=$planTrial->price?> <span> <?=Yii::t('user',"BDT")?>/<?=Yii::t('user',"YEAR")?> </span></p>
                                </td>
                                <td>
                                    <p><?=$planSmall->price?> <span> <?=Yii::t('user',"BDT")?>/<?=Yii::t('user',"YEAR")?> </span></p>
                                </td>
                                <td>
                                    <p><?=$planMedium->price?> <span> <?=Yii::t('user',"BDT")?>/<?=Yii::t('user',"YEAR")?></span></p>
                                </td>
                                <td>
                                    <p><?=$planEnterprise->price?> <span> <?=Yii::t('user',"BDT")?>/<?=Yii::t('user',"YEAR")?></span></p>
                                </td>
                            </tr>

                            <tr class="start-for-free">
                                <td>&nbsp; </td>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?></a>
                                </td>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?></a>
                                </td>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?></a>
                                </td>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?></a>
                                </td>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span> <?=$planTrial->trial_period?> <?=Yii::t('user',"Days Free Trial")?>  </span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span> <?=Yii::t('user',"Easily manage and prepare your clients taxes")?> </span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span> <?=Yii::t('user',"Manage client's tax related documents securely online and access them anytime and from anywhere")?> </span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span> <?=Yii::t('user',"Contact your clients via private and secure chat")?> </span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span><?=Yii::t('user',"Unlimited company tax professionals")?></span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span><?=Yii::t('user',"Individual client dashboard and management")?></span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span> <?=Yii::t('user',"Track tax preparation progress by client")?> </span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span> <?=Yii::t('user',"Transfer clients between tax professionals")?> </span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>

                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span><?=Yii::t('user',"Reduce client tax preparation time by 80%")?> </span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>

                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span> <?=Yii::t('user',"Upload client tax related documents, no paper")?></span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>

                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"> <span><?=Yii::t('user',"Bank-level data encryption and protection")?></span></div></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span><?=$planTrial->max_number_of_users?> <?=Yii::t('user',"Client tax preparations")?></span> </div> </th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span><?=$planSmall->max_number_of_users?> <?=Yii::t('user',"Client tax preparations")?></span> </div> </th>
                                <td>&nbsp;</td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span><?=$planMedium->max_number_of_users?> <?=Yii::t('user',"Client tax preparations")?></span> </div></th>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <div class="table-title-txt"><span><?=$planEnterprise->max_number_of_users?> <?=Yii::t('user',"Client tax preparations")?></span></div> </th>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                            </tr>
                           
                            </tbody>

                            <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a>
                                    <!-- <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a> -->
                                </td>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a>
                                    <!-- <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a> -->
                                </td>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a>
                                    <!-- <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a> -->
                                </td>
                                <td>
                                    <a href="<?=Yii::app()->request->baseUrl?>/index.php/user/registration/company"  id="plan-b"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a>
                                    <!-- <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a> -->
                                </td>
                            </tr>

                            
                            </tfoot>

                        </table>



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


            </div>

        </div>
    <?php endif;?>
    <!--#########################################------------------------#######################################-->


    <style>




        /* Use a wide full screen for small screens like tablets. */
        @media (min-width: 768px) and (max-width:992px) {
            .container {
                width: initial;
                padding-left: 2em;
                padding-right: 2em;
            }
        }
		 @media (min-width: 320px) and (max-width:480px) {
           .price-table-style .table-title-txt {
				width: 80%;
			}
        }

        /* --- Plans ---------------------------- */

        .my_planHeader {
            text-align: center;
            color: white;
            padding-top:0.2em;
            padding-bottom:0.2em;
        }
        .my_planTitle {
            font-size:2em;
            font-weight: bold;
        }
        .my_planPrice {
            font-size:1.4em;
            font-weight: bold;
        }
        .my_planDuration {
            margin-top: -0.6em;
        }

        @media (max-width: 768px) {
            .my_planTitle {
                font-size:small;
            }
        }

        /* --- Features ------------------------- */

        .my_feature {
            line-height:2.8em;
        }

        @media (max-width: 768px) {
            .my_feature {
                text-align: center
            }
        }

        .my_featureRow {
            /*margin-top: 0.1em;*/
            /*margin-bottom: 0.1em;*/
            border: 0.1em solid lightgray;
            border-bottom: none;
            color:gray;
        }

        .my_featureRow_last {
            /*margin-top: 0.1em;*/
            /*margin-bottom: 0.1em;*/
            border: 0.1em solid lightgray;
            color:gray;
        }

        /* --- Plan 1 --------------------------- */
        .my_plan1 {
            background: rgb(224,234,242);
        }

        .my_planHeader.my_plan1 a {
            background: rgb(72, 109, 139);
            color:white;
        }

        .my_planHeader.my_plan1 {
            background: rgb(105, 153, 193);
            border-bottom: thick solid rgb(72, 109, 139);
        }

        /* --- Plan 2 --------------------------- */
        .my_plan2 {
            background: #F4F4F4;
            border-left: 2px solid #fcece1;
        }

        .my_planHeader.my_plan2 a {
            background: rgb(108, 131, 62);
            color:white;
        }

        .my_planHeader.my_plan2 {
            background: rgb(134, 162, 77);
            border-bottom: thick solid rgb(108, 131, 62);
        }

        /* --- Plan 3 --------------------------- */
        .my_plan3 {
            background: #F4F4F4;
            border-left: 2px solid #fcece1;
        }

        .my_planHeader.my_plan3 a {
            background: rgb(199, 127, 40);
            color:white;
        }

        .my_planHeader.my_plan3 {
            background: rgb(253, 161, 49);
            border-bottom: thick solid rgb(199, 127, 40);
        }




        .my_planFeature {
            text-align: center;
            font-size: 2em;
        }

        .my_planFeature i.my_check {
            color: #4cae4c;
            font-size: 17px;

        }

        .panel {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            margin-bottom: 0px;
        }

        <!--
        /* Font Definitions */

        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-parent:"";
            margin-top:0in;
            margin-right:0in;
            margin-bottom:10.0pt;
            margin-left:0in;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}

        p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:10.0pt;
            margin-left:.5in;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-type:export-only;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:0in;
            margin-left:.5in;
            margin-bottom:.0001pt;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-type:export-only;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:0in;
            margin-left:.5in;
            margin-bottom:.0001pt;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-type:export-only;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:10.0pt;
            margin-left:.5in;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        span.Heading2Char
        {mso-style-name:"Heading 2 Char";
            mso-style-priority:9;
            mso-style-unhide:no;
            mso-style-locked:yes;
            mso-style-link:"Heading 2";
            mso-ansi-font-size:18.0pt;
            mso-bidi-font-size:18.0pt;
            font-family:"Times New Roman","serif";
            mso-ascii-font-family:"Times New Roman";
            mso-fareast-font-family:"Times New Roman";
            mso-hansi-font-family:"Times New Roman";
            mso-bidi-font-family:"Times New Roman";
            font-weight:bold;}
        span.Heading3Char
        {mso-style-name:"Heading 3 Char";
            mso-style-priority:9;
            mso-style-unhide:no;
            mso-style-locked:yes;
            mso-style-link:"Heading 3";
            mso-ansi-font-size:13.5pt;
            mso-bidi-font-size:13.5pt;
            font-family:"Times New Roman","serif";
            mso-ascii-font-family:"Times New Roman";
            mso-fareast-font-family:"Times New Roman";
            mso-hansi-font-family:"Times New Roman";
            mso-bidi-font-family:"Times New Roman";
            font-weight:bold;}
        span.Heading4Char
        {mso-style-name:"Heading 4 Char";
            mso-style-priority:9;
            mso-style-unhide:no;
            mso-style-locked:yes;
            mso-style-link:"Heading 4";
            mso-ansi-font-size:12.0pt;
            mso-bidi-font-size:12.0pt;
            font-family:"Times New Roman","serif";
            mso-ascii-font-family:"Times New Roman";
            mso-fareast-font-family:"Times New Roman";
            mso-hansi-font-family:"Times New Roman";
            mso-bidi-font-family:"Times New Roman";
            font-weight:bold;}
        span.underline
        {mso-style-name:underline;
            mso-style-unhide:no;}
        span.correction
        {mso-style-name:correction;
            mso-style-unhide:no;}
        .MsoChpDefault
        {mso-style-type:export-only;
            mso-default-props:yes;
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        .MsoPapDefault
        {mso-style-type:export-only;
            margin-bottom:10.0pt;
            line-height:115%;}
        @page Section1
        {size:8.5in 11.0in;
            margin:1.0in 1.0in 1.0in 1.0in;
            mso-header-margin:.5in;
            mso-footer-margin:.5in;
            mso-paper-source:0;}
        div.Section1
        {page:Section1;}
        /* List Definitions */


        @list l5:level4 lfo8
        {mso-level-start-at:0;
            mso-level-number-format:arabic;
            mso-level-numbering:continue;
            mso-level-text:"%4\.";
            mso-level-tab-stop:2.0in;
            mso-level-number-position:left;
            text-indent:-.25in;}
        ol
        {margin-bottom:0in;}
        ul
        {margin-bottom:0in;}
        -->
    </style>




