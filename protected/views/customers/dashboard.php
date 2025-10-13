<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/client-dashbord.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

	<?php
	  if(Yii::app()->user->hasFlash('success')) {
	?>
	    <div class="flash_alert"><div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
	    <?=Yii::app()->user->getFlash('success')?></div></div>
	<?php
	    } else if(Yii::app()->user->hasFlash('error')) {
	?>
	    <div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('error')?></div></div>
	<?php
	    }
	?>

<div class="panel panel-success filterable">

	<div class="panel-heading">
		<div class="row">
			<div class="col-lg-6">
				<h3 class="panel-title"><strong><?php echo Yii::t('customers', "Dashboard") ?></strong></h3>
			</div>
		</div>
	</div>
	
	<div>
	<div class="col-lg-12 client-dashbord-space">
		<div class="row">
			<div class="col-lg-6 number-of-client">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo Yii::t('customers', "Total Number of Clients") ?></div>
					<div class="panel-body">
						<p><a href="<?=Yii::app()->baseUrl.'/index.php/customers/admin'?>"> <?=$numberOfClients?> </a></p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">
				<div class="panel  panel-default">
					<div class="panel-heading"><?php echo Yii::t('customers', "Work Progress") ?></div>
					<div class="panel-body">
						<p>
							<div id="container" style="height: 400px"></div>						
						</p>
					</div>
				</div>
			</div>	
			<div class="clearfix"></div>
		</div>
	</div>	
	<div class="col-lg-12 client-dashbord-space">
			<div class="panel  panel-default">
				<div class="panel-heading"><?php echo Yii::t('customers', "Number of Clients By User") ?></div>
				<div class="panel-body">
					<p>
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th class="number-of-client-border-right"><?php echo Yii::t('customers', "User Name") ?></th>
							  <th><?php echo Yii::t('customers', "Total Client") ?></th>

							</tr>
						  </thead>
						  <tbody>
						  <?php foreach ($numberOfClientsByUser as $key => $value) : ?>
						  	<tr>
						  	  <td class="number-of-client-border-right"><?=$value['name']?></td>
						  	  <td><?=$value['numberOfClients']?></td>
						  	</tr>
						  <?php endforeach; ?>
							
							
						  </tbody>
						</table>
					</p>
				</div>
			</div>
	</div>	
		
		
		</div>
		
	</div>

</div>




<div class="login-expired">
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h3> Thank you for using bdtax.com.bd. Your 15 days Trial period has expired. </h3>
            <h3>Please choose one of the subscription plan from below. </h3>
            <table class="table">
                              <thead>
                                <tr>
                                  <th>Plan Name</th>
                                  <th>Price</th>
                                  <th></th>
    
                                </tr>
                              </thead>
                              <tbody>
                             
                                <tr id="p_small" style="background-color: <?=( isset(Yii::app()->user->s_plan) && Yii::app()->user->s_plan == 'p_small' ) ? '#d6e9c6' : ''?>">
                                  <td>Small</td>
                                  <td>2499 BDT/MONTH</td>
                                  <td class="text-center"><button type="button" class="btn btn-success" onclick="makeSelected('p_small')">Select</button></td>
                                </tr>
                                
                                <tr id="p_medium" style="background-color: <?=( isset(Yii::app()->user->s_plan) && Yii::app()->user->s_plan == 'p_medium' ) ? '#d6e9c6' : ''?>">
                                  <td>Medium</td>
                                  <td>4499 BDT/MONTH</td>
                                  <td class="text-center"><button type="button" class="btn btn-success" onclick="makeSelected('p_medium')">Select</button></td>
                                </tr>
                                
                                <tr id="p_enterprise" style="background-color: <?=( isset(Yii::app()->user->s_plan) && Yii::app()->user->s_plan == 'p_enterprise' ) ? '#d6e9c6' : ''?>">
                                  <td>Enterprise</td>
                                  <td>5499 BDT/MONTH</td>
                                  <td class="text-center"><button type="button" class="btn btn-success" onclick="makeSelected('p_enterprise')">Select</button></td>
                                </tr>
                              </tbody>
            </table>
            
            <h5>By clicking subscribe button below, you agree to our <a id="agreement" data-target="#agreeModal" data-toggle="modal" href="#">Terms and Conditions</a>.</h5>
            <form id="subscribe-form" class="form-vertical" action="" method="post">
				<input id="s_plan" class="form-control" readonly="readonly" required="required" name="s_plan" value="" type="hidden">

            	<div class="text-center login-expired-bttn">
            		<button type="button" class="btn btn-success btn-lg" id="submitBtn">Subscribe</button>
            	</div>
            </form>

			<?php if (isset(Yii::app()->user->s_plan) && Yii::app()->user->s_plan != ""): ?>
				<div class="alert alert-success fade in" style="text-align: center; width: 90%; margin: auto;">
					Thank you. Your subscription is being processed. Our billing team will contact you within 24 hours to finalize your plan.
				</div>
			<?php endif; ?>


            
          </div>
         
        </div>
    
      </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
	var showTrialEndModal = "<?=($this->showTrialEndModal) ? 'true' : 'false'?>";
	$(document).ready(function() {

		$("#submitBtn").click(function() {
			if ($("#s_plan").val() == "") {
				bootbox.alert("Please select a plan");
			}
			else {
				$("#subscribe-form").submit();
			}
			console.log("submitBtn Clicked");
		});
		
		Highcharts.chart('container', {
									chart: {
										type: 'pie',
										options3d: {
											enabled: true,
											alpha: 45
										}
									},
									colors: ['#90ed7d', '#7cb5ec', '#e4d354', '#f45b5b',],
									title: {
										text: '<?php echo Yii::t('customers', "Clients Progress Chart") ?>'
									},
									
									plotOptions: {
										pie: {
											innerSize: 100,
											depth: 45
										}
									},
									series: [{
										name: 'Complete Clients',
										data: [
											['100%', <?=$_100_percent?>],
											['75% - 99%', <?=$_75_to_99?>],
											['50% - 74%', <?=$_50_to_74?>],
											['Under 50%', <?=$_0_to_49?>],
		
										]
									}]
									
								});
		if (showTrialEndModal == 'true') {
			setTimeout(function() {
			    $('#myModal').modal('show');
			}, 1000);
		}
	});

	function makeSelected(id) {
		console.log("id= " + id);
		$("tr").css({ 'background-color' : '', 'opacity' : '' });
		$("tr#"+id).css('background-color','#d6e9c6');
		$("#s_plan").val(id);
	}
</script>