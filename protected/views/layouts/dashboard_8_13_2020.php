<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">

  <meta name="keywords" content="Bangladesh online tax calculator, bd online tax calculator, tax calculator bd, income tax calculator Bangladesh, income tax calculator bd, tax calculator, income tax calculator, bdtax, income tax Bangladesh, tax calculator Bangladesh, income tax bd">

  <meta name="description" content="BDTax.com.bd is the first online tax preparation, processing, and submission software in Bangladesh! It's super easy to use and manage, get started today!">
  <meta name="author" content="DK Technology Ltd.">
  
  <!-- <meta name="google-site-verification" content="tZq2NNepFAdbPPSB8TH70r_Zt97HpXAWrFqS1_1eQxQ" /> -->
  
  <title>BDTax - First Online Tax Software in Bangladesh!</title>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.stickytabs.js"></script>

  <script>
    $(function() {
      $('.nav-tabs-sticky').stickyTabs();
    });



  </script>
  <!--toogle menu-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <script>
    $(function() {
      var pull    = $('#pull');
      menu    = $('nav ul');
      menuHeight  = menu.height();

      $(pull).on('click', function(e) {
       e.preventDefault();
       menu.slideToggle();
     });

      $(window).resize(function(){
       var w = $(window).width();
       if(w > 320 && menu.is(':hidden')) {
        menu.removeAttr('style');
      }
    });
    });
  </script>
  
<!-- TruConversion for bdtax.com.bd -->
<script type="text/javascript">
    
    var _tip = _tip || [];
    (function(d,s,id){
        var js, tjs = d.getElementsByTagName(s)[0];
        if(d.getElementById(id)) { return; }
        js = d.createElement(s); js.id = id;
        js.async = true;
        js.src = d.location.protocol + '//app.truconversion.com/ti-js/4100/956d3.js';
        tjs.parentNode.insertBefore(js, tjs);
    }(document, 'script', 'ti-js'));
    
</script>

<script type="text/javascript">

  var _kmq = _kmq || [];
  var _kmk = _kmk || '04743b12c4d8836f1eee437ccaa6654c3c423dda';
  function _kms(u){
    setTimeout(function(){
      var d = document, f = d.getElementsByTagName('script')[0],
      s = d.createElement('script');
      s.type = 'text/javascript'; s.async = true; s.src = u;
      f.parentNode.insertBefore(s, f);
    }, 1);
  }
  _kms('//i.kissmetrics.com/i.js');
  _kms('//scripts.kissmetrics.com/' + _kmk + '.2.js');

</script>
<!-- <script type="text/javascript" src="https://s3.amazonaws.com/assets.freshdesk.com/widget/freshwidget.js"></script> -->
<script type="text/javascript">
  //FreshWidget.init("", {"queryString": "&widgetType=popup&captcha=yes&formTitle=Ask+a+Question", "utf8": "✓", "widgetType": "popup", "buttonType": "text", "buttonText": "<?php echo Yii::t('common', "Ask a Question"); ?>", "buttonColor": "white", "buttonBg": "#006063", "alignment": "4", "offset": "50%", "formHeight": "500px", "captcha": "yes", "url": "https://bdtax.freshdesk.com"} );
</script>


<script>
$(function(){
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 85) {
            $('.dashbord-menu').addClass('stickytop');
        }
        else {
            $('.dashbord-menu').removeClass('stickytop');
        }
    });
});

</script>
<style type="text/css">
  .flash_alert {
    position: fixed !important;
    bottom: 0 !important;
    left: 30% !important;
    width: 40% !important;
    margin: 0px 20px 0px 0px !important;
    z-index: 100000;
}
.stickytop {
    position:fixed;
    top:0;
    width: 100%; 
	z-index:9999;
}

</style>

<?php if (Yii::app()->user->role == "customers" && !isset(Yii::app()->user->org_id) ) : ?>
<script>   

  (function(d, w, c) { w.ChatraID = 'tSt3hgnALKaspzCWF'; var s = d.createElement('script'); w[c] = w[c] || function() { (w[c].q = w[c].q || []).push(arguments); }; s.async = true; s.src = (d.location.protocol === 'https:' ? 'https:': 'http:') + '//call.chatra.io/chatra.js'; if (d.head) d.head.appendChild(s); })(document, window, 'Chatra');   

  window.median_org_id = 'c34ce563-ee10-4112-8e80-1a3a97ca8142'; (function () { var t = document.createElement("script"); t.type = "text/javascript", t.async = !0, t.src = ("https:" === document.location.protocol ? "https://" : "http://") + "js.hellomedian.com/v1/mdn-screenshare.js"; var e = document.getElementsByTagName("script")[0]; e.parentNode.insertBefore(t, e) })(); 

</script>
<?php endif; ?> 

</head>

<body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- <div id="fb-root"></div> -->

  <!-- header-section-starts -->
  <?php //$ctrlName = Yii::app()->controller->id; ?>
  <?php $ctrlName = Yii::app()->getController()->getId();?>
  <?php $actionName = Yii::app()->controller->action->id;?>
  <div class="header">
    <div class="container">
     <div class="social">
      <div class="col-md-4 pull-left">
        <div class="logo">
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/bdtaxlogo.png" alt="" /></a>
          <!-- <span style=""><code>Beta</code></span> -->
        </div><div class="clearfix"></div>
      </div>

      <div class="col-lg-8">
        <?php if ((@$ctrlName[1] != 'login') && (Yii::app()->user->name == 'Guest')) {?>
          <?php echo CHtml::link(Yii::app()->getModule('user')->t("Login"), Yii::app()->getModule('user')->loginUrl, array('class' => 'btn btn-success')); ?>
          <?php } elseif ((Yii::app()->user->name != 'Guest')) {
           ?>
           
          <div class=" pull-right login-dropdown">
            <div class="btn-group">
              <a href="javascript::" class="btn btn-success"><i class="fa fa-user"></i> <?php echo Yii::app()->user->name; ?></a>
              <a href="javascript::" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </a>
              <ul class="dropdown-menu" role="menu">
             
              <?php if ($ctrlName == "organizations" && $actionName == "create") { ?>

              <?php } else { ?> 
                  <li>
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user/admin/update/id/<?php echo Yii::app()->user->id; ?>">
                    <?php echo Yii::t("dashboard", "My Account"); ?>
                    </a>
                  </li>
                  <li class="divider"></li>
              <?php } ?>
              

              <?php if (isset(Yii::app()->user->org_id) && (Yii::app()->user->CPIId == 'companyAdmin')): ?>
                <?php if(Yii::app()->user->role == 'companyAdmin'){ ?>
                  <li <?php echo ($ctrlName == 'organizations') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="Organization Profile" href="<?=Yii::app()->baseUrl;?>/index.php/organizations/update/id/<?=Yii::app()->user->org_id;?>"><?php echo Yii::t('dashboard', "Organization Profile"); ?></a></li>
                  <?php } ?>
                <?php endif?>

                


                <li><?php echo CHtml::link(Yii::t("dashboard", "Sign Out"), Yii::app()->getModule('user')->logoutUrl, array('class' => '')); ?></li>
              </ul>
            </div>
          </div>
          <?php if (Yii::app()->user->role == "customers") : ?>
          <div class=" pull-right login-dropdown" style="margin-right: 20px;">
            <?php //$this->widget('application.components.widgets.LanguageSelector');?>
            
            <h5>Need Help? Email: <b>support@bdtax.com.bd</b></h5>
          
          </div>
          <?php endif; ?>

          <?php if (isset(Yii::app()->user->CPIId) && (Yii::app()->user->CPIId != 'companyAdmin') && (Yii::app()->user->CPIId != 'superAdmin')): ?>

          <?php if ((Yii::app()->user->role == "companyAdmin") || (Yii::app()->user->role == "companyUser")): ?>
             <div class="exit-session-wrapper">
              <div class="exit-session login-dropdown">
                <div class="client-name-wrapper">

                  <p class="pull-left"><strong class="pull-left;">Name: </strong>
					<?php
                      $payerName = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
                      echo $payerName->Name;
                      ?>
                  </p>
                  
                  <a class="btn-success btn btn-xs" style="padding:10px;" title="Client Downloads" href="<?=Yii::app()->baseUrl;?>/index.php/downloadPdf">Client Downloads</a>
                  <a class="btn-danger btn btn-xs" style="padding:10px;" title="Exit Session" href="<?=Yii::app()->baseUrl;?>/index.php/customers/exitSystem">Exit Session</a>
                </div>
                <div class="clearfix"></div>
              </div>
             </div>
            <?php endif?>

          <?php endif?>
          <?php }
          ?>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <!-- <li><?php //echo CHtml::link("Link test", Yii::app()->request->baseUrl.'/index.php/income/linkTest' , array('class'=>'btn btn-success')); ?></li> -->


  <div class="content dashbord-menu sticky-menu">
   <div class="container">
    <div class="col-md-12">
     <div class="header-left">
      <nav class="navbar navbar-default menu_1">
       <div class="container-fluid">
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
       <ul class="nav navbar-nav menu">
         <?php if (isset(Yii::app()->user->CPIId) && (Yii::app()->user->CPIId != 'companyAdmin') && (Yii::app()->user->CPIId != 'superAdmin')): ?>

          <li <?php echo ($ctrlName == 'dashboard') ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Home'), Yii::app()->baseUrl . "/index.php/dashboard", array('class' => '')); ?></li>
          <li <?php echo ($ctrlName == 'personalInformation') ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Personal Information'), Yii::app()->baseUrl . "/index.php/personalInformation", array('class' => '')); ?></li>
          
          <?php 
            if ($this->personalInformationStatusBar() >= 93) : 
            //93% is to continue without ETIN
          ?>

            <li <?php echo (($ctrlName == 'income') || ($ctrlName == 'incomeSalaries') || ($ctrlName == 'incomeHouseProperties') || ($ctrlName == 'incomeTaxRebate')) ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Income'), Yii::app()->baseUrl . "/index.php/income/startup", array('class' => '')); ?></li>
            <li <?php echo ($ctrlName == 'assets') ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Assets'), Yii::app()->baseUrl . "/index.php/assets", array('class' => '')); ?></li>
            <li <?php echo ($ctrlName == 'liabilities') ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Liabilities'), Yii::app()->baseUrl . "/index.php/liabilities", array('class' => '')); ?></li>
            <li <?php echo ($ctrlName == 'expenditure') ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Expenses'), Yii::app()->baseUrl . "/index.php/expenditure", array('class' => '')); ?></li>
            <li <?php echo ($this->action->id == 'finalReview' || $this->action->id == 'finalPrint') ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Final Review'), Yii::app()->baseUrl . "/index.php/finalReview", array('class' => '')); ?></li>
            <li <?php echo ($this->action->id == 'print') ? ' class="active"' : ''; ?>><?php echo CHtml::link(Yii::t('dashboard', 'Download'), Yii::app()->baseUrl . "/index.php/finalReview/print", array('class' => '')); ?></li>
            
            
          <?php endif?><!-- Recomendation field check -->

        <?php endif?>

        <?php if (isset(Yii::app()->user->CPIId) && isset(Yii::app()->user->org_id) && (Yii::app()->user->CPIId == 'companyAdmin')): ?>
          
          <li <?php echo ($ctrlName == 'customers' && $actionName == "dashboard") ? ' class="dropdown active"' : 'dropdown'; ?> ><a title=" Dashboard' " href="<?=Yii::app()->baseUrl;?>/index.php/customers/dashboard"><?php echo Yii::t('dashboard', "Dashboard") ?></a></li>
          
          <li <?php echo ($ctrlName == 'customers' && $actionName == "admin") ? ' class="dropdown active"' : 'dropdown'; ?> ><a title=" My Clients' " href="<?=Yii::app()->baseUrl;?>/index.php/customers/admin"><?php echo Yii::t('dashboard', "My Clients") ?></a></li>

          

        <?php endif?>

        <?php if (isset(Yii::app()->user->org_id) && (Yii::app()->user->role == "companyAdmin") && (Yii::app()->user->CPIId == "companyAdmin")): ?>
          <li <?php echo (@Yii::app()->controller->module->id == 'user') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="My Users" href="<?=Yii::app()->baseUrl;?>/index.php/user/admin"><?php echo Yii::t('dashboard', "My Users") ?></a></li>
        <?php endif?>

        <?php if (isset(Yii::app()->user->CPIId) && (Yii::app()->user->CPIId == 'superAdmin')): ?>
          <li <?php echo (@Yii::app()->controller->module->id == 'user') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="My Users" href="<?=Yii::app()->baseUrl;?>/index.php/user/admin"><?php echo Yii::t('dashboard', "Individuals") ?></a></li>

          <li <?php echo ($ctrlName == 'organizations') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="Organization Grid" href="<?=Yii::app()->baseUrl;?>/index.php/organizations/admin"><?php echo Yii::t('dashboard', "Companies") ?></a></li>

          <li <?php echo (($ctrlName == 'admin') && ($actionName == 'index')) ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="Admin" href="<?=Yii::app()->baseUrl;?>/index.php/admin"><?php echo Yii::t('dashboard', "Admin") ?></a></li>

          <li <?php echo ($ctrlName == 'usersStatistic' || $ctrlName=='reports') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="Reports" href="<?=Yii::app()->baseUrl;?>/index.php/UsersStatistic"><?php echo Yii::t('dashboard', "Reports") ?></a></li>

          <li <?php echo ($ctrlName == 'plan') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="Users Plan" href="<?=Yii::app()->baseUrl;?>/index.php/Plan"><?php echo Yii::t('dashboard', "Plan") ?></a></li>

          <li <?php echo ($ctrlName == 'pay') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="Users Pay" href="<?=Yii::app()->baseUrl;?>/index.php/Pay"><?php echo Yii::t('dashboard', "Payment") ?></a></li>

          <li <?php echo ($ctrlName == 'useractivitylog') ? ' class="dropdown active"' : 'dropdown'; ?> ><a title="User Activity Log Grid" href="<?=Yii::app()->baseUrl;?>/index.php/UserActivityLog"><?php echo Yii::t('dashboard', "User Activity Log") ?></a></li>
        <?php endif?>

      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>
<div class="trial-modal-wrapper">
<?php if (isset(Yii::app()->user->CPIId) && (Yii::app()->user->CPIId == 'companyAdmin') && (Yii::app()->user->CPIId != 'companyUser')): ?>
  <div class="pull-right current-plan">
  	 <p><?=Yii::t("user", "Current Plan")?>: <?=Yii::app()->user->org_plan?></p>
  </div>
<?php endif; ?>

<div class="open-trial-modal-btn pull-right" style="display: <?=($this->showTrialEndModal)? 'block' : 'none'?>">
<!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Upgrade</button>
</div>

</div>
<?php if (isset(Yii::app()->user->CPIId) && (Yii::app()->user->CPIId != 'companyAdmin') && (Yii::app()->user->CPIId != 'superAdmin')): ?>
  <div class="fx-nav-2">
    <div class="fixed-dialog-top">
      <strong><?php echo Yii::t('dashboard', 'Tax Year') ?></strong>
      <p>
        <?php
          echo @$this->taxYear();
          //echo CHtml::dropDownList('tax_year', $this->taxYear(), CHtml::listData(TaxYears::model()->findAll(), 'tax_year', 'tax_year'), array('class' => '','onchange' => 'changeTaxYear(this.value)'));
        ?> 
      </p>
    </div>
    <!-- <div class="fixed-dialog-bottom">
      <strong><?php //echo Yii::t('dashboard', 'Total Tax Liability') ?></strong>
      <p><?php //echo round($this->netPayableTax(Yii::app()->user->CPIId)) . " " . $this->currency; ?></p>
    </div> -->
    <div class="fixed-dialog-bottom">
      <strong><?php echo Yii::t('dashboard', 'Tax Owed') ?></strong>
      <p><?php echo number_format(round($this->outsandtingTaxLiability())) . " " . $this->currency; ?></p>
    </div>

  </div>
<?php endif?>
</div>
</div>

</div>
</div>
<!--TAX YEAR-->
<?php if ((Yii::app()->user->name != 'Guest') && (Yii::app()->user->CPIId != 'companyAdmin') && (Yii::app()->user->CPIId != 'superAdmin')) {
  ?>

  <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
  <div id="content" class="dashbord-bg" style="padding: 0px; ff">
    <div class="container">

    <!-- FLASH MESSAGE -->
      <?php if ($ctrlName == "dashboard" && $actionName == "index"): ?>

      <div style="margin-top: 10px; margin-bottom: 10px;" class="alert alert-danger alert-dismissible" role="alert">
          <?php 
             //echo Yii::t('dashboard',"<b>Important Notice -</b> BDTax.com.bd has been updated according to the Finance Act of 2019. Now you can prepare your 2019-2020 tax return using our system.");

            echo Yii::t('dashboard',"<b>Important Notice -</b> BDTax.com.bd is going through upgradation according to the Finance Act of 2020. We will notify once the upgradation is complete. Then you can prepare your 2020-2021 tax return using our system.");
          ?>
      </div>
      <?php endif; ?>
    <!-- END - FLASH MESSAGE -->

    <?php if ($ctrlName != "admin" && $ctrlName != "downloadPdf" && $actionName != "update"): ?>
    <div class="registration" style="padding: 5px; background: #ccc; border: 1px solid #d9d9d9; margin-top: 17px;">
      <div class="dashboard-box">
        <h4 style="margin: 0px; padding: 0px;"><?php echo Yii::t('user', 'Progress on Tax Preparation'); ?></h4>
        <div class="progress" style="margin: 5px ;">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$this->completedPercent()?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->completedPercent()?>%;">
            <b><?php

             echo (($this->personalInformationStatusBar() + $this->incomeStatusBar() + $this->expenseStatusBar() + $this->assetsStatusBar() + $this->liabilityStatusBar()) / 5);
             ?>%</b>
           </div>
         </div>
       </div>
     </div>
    <?php endif; ?>

     </div>
   </div>
   <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

   <?php }
   ?>
   <!--END TAX YEAR-->
   <div id="content" class="dashbord-bg">
     <div class="container">
      <?php
        if(Yii::app()->user->hasFlash('success')) {
      ?>
          <div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5><?=Yii::app()->user->getFlash('success')?></div>
      <?php
        }
      ?>
      
    </div>
      <?php /*if ( isset(Yii::app()->user->CPIId)&&(Yii::app()->user->CPIId!='companyAdmin')&&(Yii::app()->user->CPIId!='superAdmin') ):  ?>

<div class="fixed-dialog hidden-xs">
<div class="fixed-dialog-top">
<strong>Year</strong>
<p><?=$this->taxYear()?></p>
</div>
<div class="fixed-dialog-bottom">
<strong>Tax</strong>
<p><?php  echo round( $this->netPayableTax(Yii::app()->user->CPIId) )." ".$this->currency; ?></p>
</div>
<?php if ( (Yii::app()->user->role=="companyAdmin")||(Yii::app()->user->role=="companyUser") ):  ?>
<div class="fixed-dialog-bottom">

<strong>Name:</strong> <br />
<?php
$payerName = personalInformation::model()->findByPk( Yii::app()->user->CPIId );
echo $payerName->Name;
?>
<br /><a class="btn-danger badge" style="padding:10px;" title="Exit Session" href="<?= Yii::app()->baseUrl; ?>/index.php/customers/exitSystem">Exit Session</a>
</div>
<?php endif ?>

</div>

<?php endif */?>
<?php //} ?>








<!--CONTENT AREA-->
<?php echo $content; ?>
<!--/CONTENT AREA-->
</div>

<div class="clearfix"></div>


   <div class="footer-bottm">
    
     <div class="container">
      
      <div class="col-md-2">
       <a style="text-align: center;" href="#" onClick="window.open('https://www.sitelock.com/verify.php?site=bdtax.com.bd','SiteLock','width=600,height=600,left=160,top=170');" ><img class="img-responsive" alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/bdtax.com.bd" /></a>
     </div>
     <div class="col-md-3">
       
      </div>
     <div class="col-md-7">

       <span class="pull-right" style="padding-top: 15px;">
        <a href="<?=Yii::app()->request->baseUrl?>/index.php"><?php echo Yii::t('user', "Home"); ?></a>&nbsp; | &nbsp;
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/page?view=about"><?php echo Yii::t('user', "About"); ?></a> &nbsp; | &nbsp;
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/contact"><?php echo Yii::t('user', "Contact Us"); ?></a>&nbsp; | &nbsp;
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/page?view=audit"><?php echo Yii::t('user', "Audit"); ?></a> &nbsp; | &nbsp;
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/page?view=partners"><?php echo Yii::t('user', "Partners"); ?></a> &nbsp; | &nbsp;
        <a id="agreement" data-target="#agreeModal" data-toggle="modal" href="#"><?php echo Yii::t('user', "Terms and Conditions"); ?></a> &nbsp; <!-- | &nbsp; -->
        <!-- <a href="https://bdtax.freshdesk.com/support/home" target="_blank"><?php echo Yii::t('user', "Support"); ?></a> -->
        <br class="clearfix" />
        <p style="padding-top: 5px; padding-right: 10px; text-align: right;" >
        <?php echo Yii::t('user', "&copy; ".date("Y")." bdtax.com.bd All Rights Reserved.") ?></p>
      </span> 
      
     
   </div>
 </div>

</div>



<!-- #####################TERMS&CONDITION############### %%%%%%%%%%%%%%%%%%%%%START%%%%%%%%%%%%%%% -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="agreeModal" class="modal fade bootstrap-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 id="myModalLabel" class="modal-title">License agreement</h4>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
           <div class=Section1>

            <p class=MsoNormal align=center style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
            auto;margin-left:.25in;text-align:center;line-height:normal;mso-outline-level:
            2'><b><u><span style='font-size:18.0pt;font-family:"Times New Roman","serif";
            mso-fareast-font-family:"Times New Roman"'>BDTAX TERMS AND CONDITIONS<o:p></o:p></span></u></b></p>

            <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
            text-align:justify;line-height:normal'><span style='font-size:12.0pt;
            font-family:"Times New Roman","serif";mso-fareast-font-family:"Times New Roman"'>Thank
            you for selecting the Software offered by BDTax.Please review these license
            terms (&quot;Agreement&quot;) thoroughly. This Agreement is a legal electronic agreement
            between you and BDTax.<o:p></o:p></span></p>

            <p class=MsoListParagraphCxSpFirst style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
            auto;margin-left:.25in;mso-add-space:auto;text-align:justify;text-indent:-.25in;
            line-height:normal;mso-list:l11 level1 lfo13'><![if !supportLists]><span
            style='font-size:12.0pt;font-family:"Courier New";mso-fareast-font-family:"Courier New"'><span
            style='mso-list:Ignore'>o<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;
          </span></span></span><![endif]><b><span style='font-size:13.5pt;font-family:
          "Times New Roman","serif";mso-fareast-font-family:"Times New Roman"'>AGREEMENT</span></b><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'><o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;margin-left:.25in;mso-add-space:auto;text-align:justify;line-height:normal'><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'><o:p>&nbsp;</o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>This Agreement, including additional terms below and any
          content, updates, and new releases (collectively, the “Software”), is the
          entire agreement between you and BDTax and replaces all prior understandings,
          communications and agreements, oral or written, regarding its subject matter.
          If any court of law, having the jurisdiction, rules that any part of this
          Agreement is invalid, that section will be removed without affecting the
          remainder of the Agreement. <o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;line-height:normal'><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'><o:p>&nbsp;</o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;margin-left:.25in;mso-add-space:auto;text-align:justify;text-indent:-.25in;
          line-height:normal;mso-outline-level:3;mso-list:l11 level1 lfo13'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>LICENSE GRANT AND RESTRICTIONS<o:p></o:p></span></b></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;margin-left:.25in;mso-add-space:auto;text-align:justify;line-height:normal;
          mso-outline-level:3'><b><span style='font-size:13.5pt;font-family:"Times New Roman","serif";
          mso-fareast-font-family:"Times New Roman"'><o:p>&nbsp;</o:p></span></b></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>The Software is protected by copyright, trade secret, and
          other intellectual property laws. You are only granted certain limited rights
          to use the Software and BDTax reserves all other rights in the Software not
          granted to you in writing herein. <o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>You acknowledge and agree that the Software is licensed, not
          sold. You agree not to use, nor permit any third party to use reproduce,
          duplicate, modify, copy, deconstruct, reverse-engineer, sell, trade, or resell
          the Software.<o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpLast style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>You acknowledge and agree to not attempt unauthorized access
          to any other BDTax systems that are not part of the Software.<o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l7 level2 lfo9'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>YOUR PRIVACY AND PERSONAL INFORMATION<o:p></o:p></span></b></p>

          <p class=MsoListParagraphCxSpFirst style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>At BDTax we place the highest importance on respecting and
          protecting the privacy of our customers. Our most important asset is our
          relationship with you. We want you to feel comfortable and confident when using
          our products and services and with entrusting your personal and tax return
          information to us.<span style='mso-spacerun:yes'>  </span><o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpLast style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax will not share your personal or tax information with
          any other individual, company, or other organization unless obligated by law. <o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l7 level2 lfo9'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>CONTENT<o:p></o:p></span></b></p>

          <p class=MsoListParagraphCxSpFirst style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>You are responsible for all materials (&quot;Content&quot;)
          uploaded, posted, or stored through your use of the Software. You are
          responsible for lost or unrecoverable Content. BDTax is not responsible for the
          Content or data you provide through your use of the Software.<o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>You agree that BDTax may use your feedback, suggestions, or
          ideas in any way, including in future modifications of the Software, other
          products or services, advertising or marketing materials. <o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpLast style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax may, but has no obligation to, monitor content on the Software.
          We may disclose any information necessary to satisfy our legal obligations,
          protect BDTax or its customers, or operate the Software properly. <o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l0 level2 lfo10'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>ADDITIONAL TERMS<o:p></o:p></span></b></p>

          <p class=MsoListParagraphCxSpFirst style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>You may be offered other services, products, or promotions
          by BDTax (&quot;BDTax Services&quot;).Additional terms and conditions and fees
          may apply. <o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax may be required by law to send you communications
          about the Software. You agree that BDTax may send these communications to you
          via email or by posting them on our websites. <o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>You are responsible for securely managing your password(s)
          for access to the Software and to contact BDTax if you become aware of any
          unauthorized access to your account. <o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpLast style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>The Software may periodically be updated with tools,
          utilities, improvements or general updates to improve the Software. You agree
          to receive these updates.<o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l0 level2 lfo10'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>DISCLAIMER OF WARRANTIES<o:p></o:p></span></b></p>

          <p class=MsoListParagraphCxSpFirst style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>Your use of the Software and content is entirely at your own
          risk except as described in this agreement. The Software is provided &quot;as
          is.&quot; BDTax and its affiliates and suppliers do not warrant that the Software
          is secure, free from bugs, viruses, interruption, errors, theft, or
          destruction.<o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpMiddle style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax is an automated income tax calculator that follows the
          Income Tax Ordinance of 1984. BDTax is not liable for any issues that arise due
          to tax miscalculation. We are highly confident in the tax accuracy of our
          product because it has been reviewed for accuracy by many tax lawyers and
          accountants, but this is ultimately still a beta product and is being tested
          and improved by our team and third party contributors continuously.<o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpLast style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax, its affiliates and suppliers disclaim any
          representations or warranties that your use of the Software will satisfy or
          ensure compliance with any legal obligations or laws or regulations.<o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l0 level2 lfo10'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>LIMITATION OF LIABILITY AND INDEMNITY<o:p></o:p></span></b></p>

          <p class=MsoListParagraphCxSpFirst style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>Subject to applicable law, BDTax, their authorities are not
          liable for any types of damages. The above limitations apply even if BDTax and
          its affiliates and suppliers have been advised of the possibility of such
          damages. <o:p></o:p></span></p>

          <p class=MsoListParagraphCxSpLast style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax reserves the right, in its sole discretion and at its
          own expense, to assume the exclusive defense and control of any claims. You
          agree to reasonably cooperate as requested by BDTax in the defense of any claims.
          <o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l0 level2 lfo10'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>CHANGES<o:p></o:p></span></b></p>

          <p class=MsoListParagraph style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list .5in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax reserves the right to change this Agreement at any
          time, and the changes will be effective when posted on our website for the Software
          or when we notify you by other means. We may also change or discontinue the Software,
          in whole or in part. Your continued use of the Software indicates your
          agreement to the changes. <o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l0 level2 lfo10'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>TERMINATION<o:p></o:p></span></b></p>

          <p class=MsoListParagraph style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax may immediately, in its sole discretion, and without
          notice, terminate the Software if you fail to comply with this Agreement or if
          you no longer agree to receive electronic communications. Upon termination you
          must immediately stop using and delete or destroy all copies of the Software.<o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l0 level2 lfo10'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>GOVERNING LAW<o:p></o:p></span></b></p>

          <p class=MsoListParagraph style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax follows the Bangladesh income tax law. This Ordinance
          may be called the</span><a
          href="http://bdlaws.minlaw.gov.bd/pdf_part.php?id=672" target="_blank"><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman";color:windowtext;text-decoration:none;text-underline:none'>
          Income-tax Ordinance</span></a><span style='font-size:12.0pt;font-family:"Times New Roman","serif";
          mso-fareast-font-family:"Times New Roman"'>, 1984.<o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l0 level2 lfo10'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>DISPUTES<o:p></o:p></span></b></p>

          <p class=MsoListParagraph style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>Any dispute or claim relating in any way to the BDTax
          Software or this agreement will be resolved by discussion.<o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-outline-level:3;mso-list:l12 level2 lfo11'><![if !supportLists]><span
          style='font-size:13.5pt;font-family:"Courier New";mso-fareast-font-family:"Courier New";
          mso-bidi-font-weight:bold'><span style='mso-list:Ignore'>o<span
          style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span></span><![endif]><b><span
          style='font-size:13.5pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTAX SERVICES<o:p></o:p></span></b></p>

          <p class=MsoListParagraph style='mso-margin-top-alt:auto;mso-margin-bottom-alt:
          auto;mso-add-space:auto;text-align:justify;text-indent:-.25in;line-height:normal;
          mso-list:l4 level4 lfo14;tab-stops:list 1.0in'><![if !supportLists]><span
          style='font-size:10.0pt;mso-bidi-font-size:12.0pt;font-family:Wingdings;
          mso-fareast-font-family:Wingdings;mso-bidi-font-family:Wingdings'><span
          style='mso-list:Ignore'>§<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span><![endif]><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>BDTax may provide the following or additional Services. You
          are responsible for providing, at your expense, any access to the Internet and
          any required equipment. BDTax may at any time change or discontinue any aspect,
          availability or feature of the Services.<o:p></o:p></span></p>

          <p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
          text-align:justify;line-height:normal'><a name="_GoBack"></a><b><u><span
          style='font-size:12.0pt;font-family:"Times New Roman","serif";mso-fareast-font-family:
          "Times New Roman"'>Prepared on: October 15, 2015</span></u></b><b
          style='mso-bidi-font-weight:normal'><u><span style='font-size:12.0pt;
          font-family:"Times New Roman","serif";mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></u></b></p>

        </div>

      </div>
    </div>

  </div>

  <div class="modal-footer">

  </div>

</div>
</div>
</div>

<!-- #####################TERMS&CONDITION############### %%%%%%%%%%%%%%%%%%%%%END--%%%%%%%%%%%%%%% -->
<input type="hidden" value="<?=Yii::app()->request->baseUrl?>" id= "BASE_URL">
<!-- ##################### CHAT STARTED  ############### -->
<div id="chat_window" style="display: none;"></div>

<?php 

  if ( isset(Yii::app()->user->role) && Yii::app()->user->role != "superAdmin" && isset(Yii::app()->user->org_id) ) {
    if ((Yii::app()->user->role == "companyAdmin" || Yii::app()->user->role == "companyUser") && Yii::app()->user->CPIId != "companyAdmin") {
     
      $pi = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);

        if (isset($pi->UserId)) {
          echo "<button type='button' class='btn btn-success' id='cht_btn'>Start Chat</button>";

          $this->widget('YiiChatWidget',array(
              'chat_id'=>$pi->UserId,                   // a chat identificator
              'identity'=>Yii::app()->user->id,                      // the user, Yii::app()->user->id ?
              'selector'=>'#chat_window',                // were it will be inserted
              'minPostLen'=>2,                    // min and
              'maxPostLen'=>150,                   // max string size for post
              'model'=>new ChatHandler(),    // the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
              'data'=>'any data',                 // data passed to the handler
              // success and error handlers, both optionals.
              'onSuccess'=>new CJavaScriptExpression(
                  "function(code, text, post_id) {  }"),
              'onError'=>new CJavaScriptExpression(
                  "function(errorcode, info){  }"),
          ));
        }  
        
    }
    if (Yii::app()->user->role == "customers" && isset(Yii::app()->user->org_id)) {

      

      $pi = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);

        if (isset($pi->UserId)) { 
          echo "<button type='button' class='btn btn-success' id='cht_btn'>Start Chat</button>";
          $this->widget('YiiChatWidget',array(
              'chat_id'=>$pi->UserId,                   // a chat identificator
              'identity'=>Yii::app()->user->id,                      // the user, Yii::app()->user->id ?
              'selector'=>'#chat_window',                // were it will be inserted
              'minPostLen'=>2,                    // min and
              'maxPostLen'=>150,                   // max string size for post
              'model'=>new ChatHandler(),    // the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
              'data'=>'any data',                 // data passed to the handler
              // success and error handlers, both optionals.
              'onSuccess'=>new CJavaScriptExpression(
                  "function(code, text, post_id) {  }"),
              'onError'=>new CJavaScriptExpression(
                  "function(errorcode, info){  }"),
          ));
        }
    }
  }
  
?>
<!-- ##################### CHAT ENDS  ############### -->


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js?v=<?=$this->v?>"></script>

<script>
  var mn = $('.fixed-dialog');
  mns = 'main-nav-scrolled';
  hdr = $('#contant').height();
  $(window).scroll(function () {
    if ($(this).scrollTop() > hdr) {
      mn.addClass(mns);
    } else {
      mn.removeClass(mns);
    }
  });
  function changeTaxYear (val) {
    $.ajax({
      url : "<?=Yii::app()->baseUrl?>/index.php/dashboard/changeTaxYear",
      type : "POST",
      data : {
        tax_year : val
      },
      success : function(data) {
        location.reload(true);
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        bootbox.alert("Internal problem has been occurred. Please try again.");
      }
    });
  }
  $(document).ready(function() {
    $('.flash_alert').delay(5000).fadeOut( "slow", function() {

    });
  });
</script>

</body>
</html>