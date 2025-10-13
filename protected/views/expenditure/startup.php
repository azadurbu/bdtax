<div id="home-mid" class="reg-form income-dashbord">
	<div class="home_icon-box home_icon-4"></div>
	<h4><?=Yii::t("expense","Expenses")?></h4>

	<div class="clearfix"></div>

	<p><?php //echo Yii::t("expense","<p>Demo Text (Information is not given)</p>")?></p>

	<!-- <h2><a href="<?=Yii::app()->baseUrl.'/index.php/expenditure/entry'?>"><?=Yii::t("common","Let's get started")?></a></h2> -->


	<?php
	$haveLastYearData = Expenditure::model()->count('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$last_tax_year ));
	
	if(isset($haveLastYearData) && $haveLastYearData == 1){?>
	<br><br><br><br><br>
	<div  style='text-align:center'>
		<div>
			<a class='btn btn-default for-clr' data-toggle="modal" data-target="#myModal1"><?=Yii::t("assets","I Will Fill Up Again")?></a> 
			<a class='btn btn-success for-clr' data-toggle="modal" data-target="#myModal2"><?=Yii::t("assets","Copy From Last Year")?></a>
		</div>
	</div>
	<br><br><br><br><br>
	<?php }else{?>
	<h2><a href="<?=Yii::app()->baseUrl.'/index.php/expenditure/entry'?>"><?=Yii::t("expense","Let's get started")?></a></h2>
	<?php } ?>
<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p style='font-size: 25px;font-weight: bold;text-align: left;'><?=Yii::t("assets","Fill Up Again Confirmation")?></p>
        </div>
        <div class="modal-body">
			<h3 style="text-align: left;"><?=Yii::t("assets","Are you sure you would like to fill up again?")?></h3>
			<div class=" pull-right">
				<a class='btn btn-success for-clr' data-dismiss="modal"><?=Yii::t("assets","No")?></a>
			</div>
			<div class="pull-right" style="margin-right: 10px;">
				<a href='<?=Yii::app()->baseUrl.'/index.php/expenditure/entry'?>' class='btn btn-success for-clr'><?=Yii::t("assets","Yes")?></a>
			</div>
			<br>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title"> -->
		  	<p style='font-size: 25px;font-weight: bold;text-align: left;'><?=Yii::t("assets","Copy Data Confirmation")?></p>
			<!-- </h4> -->
        </div>
        <div class="modal-body">
			<h3 style="text-align: left;"><?=Yii::t("assets","Are you sure you would like to Copy Data From Last Year?")?></h3>
			<div class="pull-right" style="margin-right: 10px;">
				<a class='btn btn-success for-clr' data-dismiss="modal"><?=Yii::t("assets","No")?></a>
			</div>
			<div class="pull-right" style="margin-right: 10px;">
				<a href='<?=Yii::app()->baseUrl.'/index.php/expenditure/copyLastyear'?>' class='btn btn-success for-clr'><?=Yii::t("assets","Yes")?></a>
			</div>
			<br>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>


</div>
