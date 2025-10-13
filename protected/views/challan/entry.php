        <!-- FLASH MESSAGE -->
<!-- script src="https://code.jquery.com/jquery-1.12.4.js"></script -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "<?php echo Yii::app()->baseUrl;?>/images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
    
    $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy");
   
   });
  </script>
  <style type="text/css">
  	.ui-datepicker-trigger{width: 25px;margin-top: 5px;margin-left: 5px}
  </style>
<div class="flash_alert">
  <?php if(Yii::app()->user->hasFlash('alert_success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo Yii::app()->user->getFlash('alert_success');?>
    </div>
  <?php endif; ?>
</div>
		<div class="dashboard-box income-dashbord " style="padding: 10px;">
			<h2><?php echo Yii::t("assets","BANK & CHALLAN"); ?></h2>
			<form method="post" action="<?php echo Yii::app()->baseUrl."/index.php/Challan/SaveInfo";?>">
			<table style="margin-left: 15%;width: 70%;">
				<tr>
					<td>
						<h4><?php echo Yii::t("assets","Challan Type."); ?></h4>
						<select required class="form-control" name="Challan_type">
							<option value="">Select</option>
							<option value="1">Tax With Return</option>
							<option value="2">Pay Order</option>
							<option value="3">Others</option>

						</select>
					</td>
					<td>
						<h4><?php echo Yii::t("assets","Bank Name."); ?></h4>
						<input  required maxlength="255" type="text" class="form-control" name="bank_name"></td>
					<td>
						<h4><?php echo Yii::t("assets","Challan No."); ?></h4>
						<input  required type="text" class="form-control" name="Challan_no"></td>
					<td>
						<h4><?php echo Yii::t("assets","Date"); ?></h4>
						
						<input required  readonly type="text" class="form-control date-calendar" data-date="" id="datepicker" value="<?php echo date('Y-m-d');?>" name="Challan_date"></td>
				</tr>

			</table>

			<br>
			<br>
			<p style="text-align: center;">
				<button class="btn btn-success btn-lg" onclick="save_income('IncomeOtherSource', 's_9')" type="submit" ><?= Yii::t("income","Store") ?></button>
			</p>

			<?php if($listChallan): ?>
				<table style="margin-left: 15%;width: 70%;margin-top:30px;" class="table table-bordered">
					<tr>
						<td><strong><?php echo Yii::t("assets","Challan Type."); ?></strong></td>
						<td><strong><?php echo Yii::t("assets","Bank Name."); ?></strong></td>
						<td><strong><?php echo Yii::t("assets","Challan No."); ?></strong></td>
						<td><strong><?php echo Yii::t("assets","Challan Date."); ?></strong></td>
						<td><strong><?php echo Yii::t("assets","Action."); ?></strong></td>
					</tr>
				  <?php foreach ($listChallan as $challan) {?>
				  	<tr>
				  		<td>
				  			<?php if($challan->challan_type==1){
				  				echo "Tax With Return";
				  			}elseif($challan->challan_type==2){
				  				echo "Pay Order";
				  			}else{
				  				echo "Others";

				  			}?>
				  			
				  		</td>
				  		<td>
				  			<?php echo $challan->bank_name; ?>
				  		</td>
				  		<td>
				  			<?php echo $challan->challan_no; ?>
				  		</td>
				  		
				  		<td>
				  			<?php echo $challan->challan_date; ?>
				  		</td>
				  		<td>
				  			<a class="btn btn-success" onclick="return confirmDelete()" href="<?php echo Yii::app()->baseUrl.'/index.php/Challan/DeleteData/id/'.$challan->id;?>"><i class="fa fa-trash-o"></i> <?php echo Yii::t("income","Delete"); ?></a>
				  		</td>
				  	</tr>
				  <?php } ?>
                </table>
			<?php endif; ?>

			</form>

			<div class="login-button input-group">
				<div class="back pull-left">
					<a class="btn btn-success for-clr" style="height: 39px;" href="<?php echo Yii::app()->baseUrl.'/index.php/assetsSingle/entry';?>"    > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
				</div>
				<div class="back pull-right">
					<a class="btn btn-success for-clr" style="height: 39px;" href="<?php echo Yii::app()->baseUrl.'/index.php/finalReview/print';?>"     ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
				</div>
				<div class="clearfix"></div>

			</div>
		</div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
		<script type="text/javascript">
			function confirmDelete(id) {
				var r = confirm("Confirm Delete!");
				if (r == true) {
				  return true;
				} else {
				  return false;
				}
			}
			$(".date-calendar").on("change", function() {
			    this.setAttribute(
			        "data-date",
			        moment(this.value, "YYYY-MM-DD")
			        .format( this.getAttribute("data-date-format") )
			    )
			}).trigger("change")
		</script>
		<style type="text/css">
			.date-calendar {
			    float: left;
			    width: 80%;
			    
			}

			
		</style>
