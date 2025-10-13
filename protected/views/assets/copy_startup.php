<div id="home-mid" class="reg-form income-dashbord">
	<div class="home_icon-box home_icon-3"></div>
	<h4><?=Yii::t("assets", "Assets")?></h4>

	<div class="clearfix"></div>

	<div style="text-align: center;" id="copyDiv">
		<h1 style='position: relative; color: #b90601;'>Copy From Last Year</h1>
		<img src="<?=Yii::app()->baseUrl.'/images/progress-copy.gif'?>" alt="progress" style="margin-top: -30px;width: 30%;">
	</div>
	<div id="copyReview" style="display:none;">
		<h1  style="text-align: center; color: #b90601;">Completed</h1>
		<h2><a href="<?=Yii::app()->baseUrl.'/index.php/assets/entry'?>"><?=Yii::t("common", "Let's review")?></a></h2>
	</div>
	<br><br><br><br><br><br><br>
	<script>
		$( document ).ready(function(){

			setTimeout(function() {
				$('#copyDiv').hide();
				$('#copyReview').show();
			}, 3500);
		});
	</script>
</div>