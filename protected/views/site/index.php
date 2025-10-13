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
<script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });
});
</script>

<style>
	video::-webkit-media-controls-fullscreen-button, video::-webkit-media-controls-play-button, video::-webkit-media-controls-pausebutton {
    display: none;
}
audio::-webkit-media-controls-timeline,
video::-webkit-media-controls-timeline {
    display: none;
}


</style>
<script type="text/javascript">

    function vidplay() {
       var video = document.getElementById("Video1");
       var button = document.getElementById("play");
       if (video.paused) {
          video.play();
          button.textContent = "||";
       } else {
          video.pause();
          button.textContent = ">";
       }
    }

    function restart() {
        var video = document.getElementById("Video1");
        video.currentTime = 0;
    }

    function skip(value) {
        var video = document.getElementById("Video1");
        video.currentTime += value;
    }      
</script>

<!-- GAS END-->
<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div class="banner">


	<div class="container">
     <div class="row">
    
<!-- FLASH MESSAGE -->
	<!-- <div style="margin-top: 10px; margin-bottom: 10px;" class="alert alert-danger alert-dismissible" role="alert">
	    	<?=Yii::t('dashboard',"<b>Important Notice -</b> bdtax.com.bd is currently only available to do tax calculation for Tax Year 2015 - 2016 which coincides with Income Year 2014 - 2015. We are actively working with our tax advisors in order to apply the new tax law changes for Tax Year 2016 - 2017 which coincides with Income Year 2015 - 2016. As soon as we are finished we will notify our users and provide them with the option to calculate tax returns for Tax Year 2016 - 2017.")?>
	    </div> -->
<!-- END - FLASH MESSAGE -->

		<?php
		  if(Yii::app()->user->hasFlash('contact')) {
		?>
		    <div style="margin-top: 10px; margin-bottom: 10px;" class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5><?=Yii::app()->user->getFlash('contact')?></div>
		<?php
		  }
		?>
		
       <!--Slider Start--> 
              <div class="col-lg-8">
                <!--   <div class="user"><img src="<?php //echo Yii::app()->request->baseUrl; ?>/img/girl.jpg" class="img-responsive"></div>-->
                 
               <section class="jk-slider">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                 
              <div class="carousel-inner">
              
                <div class="item active">
                <div class="hero">
                </div>
                  <div class="overlay"></div>
                     <video id="example_video_1"
                        class="video-js vjs-default-skin" 
                        controls 
                        loop
                        autoplay
                        muted 
                        preload="none" width="100%" height="422"
                        poster="<?php echo Yii::app()->request->baseUrl; ?>/video/bdtax-promo.jpg?v=<?=$this->v?>"
                        data-setup="{   }">
                        <source src="<?php echo Yii::app()->request->baseUrl; ?>/video/bdtax-promo-small-video.mp4?v=<?=$this->v?>" type='video/mp4' />
                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that supports HTML5 video</a></p>
                      </video>
                </div>
          
              </div>
 
            </div>
                
            </section>  
              
              </div>
                
                
       <!--Slider End--> 
        
        
        
		<div class="col-lg-4">
			
			<?php if ((@$ctrlName[1] != 'login') && (Yii::app()->user->name == 'Guest')) {?>

				<form method="post" action="<?php echo Yii::app()->baseUrl; ?>/index.php/user/login" onsubmit="trimInput()">
					<h2><?php echo Yii::t('user', "Sign in"); ?></h2>
					<div class="form-group">
						<label for="exampleInputEmail1"><?php echo Yii::t('user', "Email address"); ?></label>
						<input class="form-control"  id="exampleInputEmail1" type="email" name="UserLogin[email]" placeholder="<?php echo Yii::t('user', "Email address...."); ?>" />
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1"><?php echo Yii::t('user', "password"); ?></label>
						<input class="form-control" id="exampleInputPassword1" type="password" name="UserLogin[password]" placeholder="<?php echo Yii::t('user', "Password...."); ?>" autocomplete="off" />
					</div>

					<div class="checkbox hm-forgot">
						<label>
							<input type="checkbox"><?php echo Yii::t('user', "Remember me"); ?>
							<span class="pull-right">
							<?php echo CHtml::link(Yii::t('user', "Forgot your password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
							</span>
                            <div class="clear-fix"></div>
						</label>
					</div>

					<div class="clear-fix"></div>
					<div class="hm-login-rt-bttn">
                        <div class="col-lg-6 row">
                            <input id="saveForm" class="btn btn-success btn_style" type="submit" name="submit" value="<?php echo Yii::t('user', "Sign in"); ?>" style="width:100%;" />
                        </div>
                        <div class="col-lg-6 row pull-right">
                                <?php echo CHtml::link(Yii::t('user', "Register Now"), Yii::app()->getModule('user')->registrationUrl, array('class' => 'btn btn-success', "style" => "color:#fff !important; width:100%; margin: auto;")); ?>
                        </div>
                    </div>
                    <div class="clear-fix"></div>
				</form>
				<?php }
?>
				<div class="clearfix"></div>
				<div class="span3" style=""><?php $this->widget('application.widgets.facebook.Facebook', array('appId' => '1507786019440453'));?></div>
				<div class="cash-logo hide">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/bcash.png">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/dbbl-icon.png">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/mastercard.png">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/visa_icon.png">
				</div>
			</div>
		</div>
        </div>
        
	</div>
	<!-- bennare-section-ends -->

	<div class="ready"><!-- redy-start -->
        <div class="container">
            <div class="col-lg-7">
                <h1 class="ready_to"><?php echo Yii::t('user', "Ready to start your tax return?"); ?></h1>
            </div>
            <div class="col-lg-5">
                <div class="start_for" ><button id="startForFree" type="button" class="btn-primary btn-lg active"><?php echo Yii::t('user', "Start For Free"); ?></button></div>
            </div>
        </div>
	</div>
    
    <!-- Award logo section -->    
    <div class="awardlogo-wrapper"> 
    	<div class="container">
            <div class="col-lg-3">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/start_award_logo_new.png" class="center-block">
            </div>
            <div class="col-lg-3">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/Champion_final3.png" class="center-block">
            </div>
            <div class="col-lg-3">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_aptica2.png" class="center-block">
            </div>
            <div class="col-lg-3">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/bangladesh_copyright_logo2.png" class="center-block" >
            </div>
        </div>
    </div>
    
    <!-- Testimonial Section -->
    
    <div class="container testimonial-wrapper">
    <h1>Client Testimonials</h1>
    <div class="row">
         <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
            	<div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Montakim Ahmed.jpg" alt="">
                    </div>
                    <p class="description">
						I spent some time and went through the entire process of duplicating my own tax return using your website and I was hugely impressed. I am a Chartered Accountant and I run my own BPO firm in Dhaka and I feel your product has a great potential!!
                    <div class="testimonial-profile">
                        <h3 class="title">Montakim Ahmed, FCCA, ACA</h3>
                    </div>
                </div>
            
                <div class="testimonial">
                    <div class="pic">
                          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Masud Hasan.jpg" alt="">
                    </div>
                    <p class="description">
                       Welcome bdtax.com.bd.

Honestly, we should give you lot of credit and appreciation as you are providing excellent services in the complicated online tax return process. Interestingly, you have made this time consuming tough tasks very easy and your software is also very user friendly.

Last but not least, the bdtax.com.bd is a pioneer in its area of service and contributes a lot to our economy. I hope their bright future and lot of success stories in coming days.
                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">Masud Hasan</h3>
                    </div>
                </div>
 
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Minhaz Ahmed.jpg" alt="">
                    </div>
                    <p class="description">

 The money you pay through taxes goes to many places. Tax money helps to ensure the roads you travel on are safe and well-maintained. This is a great initiative for our country, because of this new site we will able to pay proper tax without any hassle. Thanks BD tax for making our life very simpler and easier.

                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">Minhaz Ahmed</h3>
                    </div>
                </div>
 
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Muntasir Ahmed.jpg" alt="">
                    </div>
                    <p class="description">
                       Thank you for making my life easier. For the first time, I have submitted my taxes without any extra money and hassle. Appreciate your great initiative to introduce such service in Bangladesh.

                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">Muntasir Ahmed</h3>
                    </div>
                </div>
                                
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Rana Chowdhury.jpg" alt="">
                    </div>
                    <p class="description">
                      The future is here. Tax filing made easy for everybody.
                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">Rana Chowdhury</h3>
                    </div>
                </div>
                
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Mahbub Hasan Shohag.jpg" alt="">
                    </div>
                    <p class="description">
						Very useful and effective. Thanks a lot for excellent webpage.
                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">Mahboob Hasan Shohag</h3>
                    </div>
                </div>
                
                
                
                
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<!-- Chang URLs to wherever Video.js files will be hosted -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/video/video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/video/video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "<?php echo Yii::app()->request->baseUrl; ?>/video/video-js.swf";
  </script>
<script type="text/javascript">
    function trimInput(){
        var email = document.getElementById("exampleInputEmail1").value;
        // console.log(email);
        var trimmedEmail = email.trim();

        document.getElementById("exampleInputEmail1").value = trimmedEmail;

    }
</script>
    
    
    

