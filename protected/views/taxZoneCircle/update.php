<div id="home-mid" class="reg-form income-dashbord">

	<h2>Update TaxZoneCircle <?php echo $model->TaxZoneCircleId; ?></h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</div>
<script>
$(document).ready(function() {
	getSubCat(<?=$model->TypeOfIncomeId?>, "Yes");
});
</script>