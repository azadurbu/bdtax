<style>
	.bottom-date{
		font-size:18px;
		padding-top:50px;	
		}
	.bottom-signature{
		font-size:18px;
		text-align:center;
		}
	.bottom-address{
		font-size:12px;
		text-align:center;
		}
	@media (max-width: 600px) {
	 .bottom-signature, .bottom-date, .bottom-sill {
	  float: none!important;
	  text-align:center;
	}
	}
</style>
<br />
<div class="container">
	<div class="well" style="background-color: #FFF;">
    <div class="centered"><h3><?=Yii::t('partner',"PARTNERS")?></h3></div>
    <hr>	
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12">
                    <a href="http://www.mlhcbd.com" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/audit-logo.png" width="107" height="97"  alt=""/></a>
                    <p>
                        <strong><?=Yii::t('partner',"M L H Chowdhury & Co, Chartered Accountants")?></strong>
                        <br/>
                        <?=Yii::t('partner',"Website")?>: <a href="http://www.mlhcbd.com" target="_blank">www.mlhcbd.com</a>
                        <br/>
                        <?=Yii::t('partner',"M")?>: +8801799410463
                        <br/>
                        <?=Yii::t('partner',"E")?>: dhaka@mlhcbd.com
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12">
                    <a href="http://www.cloudly.io" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cloudly-logo.png" width="100%" alt="" /></a>
                    <p>
                        <strong><?=Yii::t('partner',"House# 342 (3rd Floor), Road# 25,")?><br/></strong>
                        <strong><?=Yii::t('partner',"New DOHS Mohakhali, Dhaka-1206")?></strong>
                        <br/>
                        <?=Yii::t('partner',"Website")?>: <a href="http://www.cloudly.io" target="_blank">www.cloudly.io</a>
                        <br/>
                        <?=Yii::t('partner',"M")?>: +88 02 8711116
                        <br/>
                        <?=Yii::t('partner',"E")?>: sales@cloudly.io
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12">
                    <a href="http://www.sslcommerz.com" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sslcommerz.png" width="100%" alt="" /></a>
                    <p>
                         <strong><?=Yii::t('partner',"93 New Eskaton Road, Dhaka 1000")?></strong>
                        <br/>
                        <?=Yii::t('partner',"Website")?>: <a href="http://www.sslcommerz.com" target="_blank">www.sslcommerz.com</a>
                        <br/>
                        <?=Yii::t('partner',"M")?>: +880-1988110000
                        <br/>
                        <?=Yii::t('partner',"E")?>: support@sslcommerz.com
                    </p>
                </div>
            </div>
        </div>
	<div class="clearfix"></div>
	</div>
</div>
