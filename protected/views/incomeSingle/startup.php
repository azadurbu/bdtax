<div id="home-mid" class="reg-form income-dashbord">
	<div class="home_icon-box home_icon-2"></div>
	<h4><?=Yii::t("income","Income")?></h4>

	<div class="clearfix"></div>

	<p><?php //echo Yii::t("income","We need to document for this")?></p>

	<h2><a href="<?=Yii::app()->baseUrl.'/index.php/income/entry'?>"><?=Yii::t("expense","Let's get started")?></a></h2>
</div>

<script type="text/javascript">
	
	$('#incomeYes').click(function(e) {
		console.log(e);
		e.preventDefault();
		window.location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php/incomesingle/entry/';
	});
		
	$('#incomeNo').click(function(e) {
		console.log(e);
		e.preventDefault();
		window.location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php/incomesingle/entry/';
	});

</script>
