<?php
/* @var $this UsersStatisticController */
/* @var $model UsersStatistic */

// $this->breadcrumbs=array(
// 	'Users Statistics'=>array('index'),
// 	'Manage',
// );

$this->menu=array(
	array('label'=>'List UsersStatistic', 'url'=>array('index')),
	array('label'=>'Create UsersStatistic', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-statistic-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="panel panel-success filterable sticky-min-height3">
	<div class="panel-heading">

		<div class="row">
			<div class="col-lg-6">
			<?php 

			if($statistic_type=='pdf'){
				echo '<h3 class="panel-title">PDF Download Statistic Report</h3>';
			}elseif($statistic_type=='completion'){
				echo '<h3 class="panel-title">100% Tax Profile Completion Statistic</h3>';
			}
			?>
			</div>
			<div class="col-lg-6">

			</div>
		</div>
	</div>
<?php 
if($queryResult){
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Month - Year</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$total_count=0;
		foreach ($queryResult as $key => $value) { 
			$total_count += $value['count'];
			?>
			<tr>
				<td>
					<?=$value['Month']?> -
					<?=$value['Year']?>
				</td>
				<td>
					<?=$value['count']?>
				</td>
			</tr>
		<?php 
		} ?>
		<tr>
				<td>
					<?= '<strong>Total</strong>' ?> 
				</td>
				<td>
					<?= '<strong>'.$total_count.'</strong>' ?>
				</td>
			</tr>
	</tbody>
</table>
<?php 
}else{
	echo "<div class='col-lg-6'><h3> Sorry No Data Available </h3></div>";
}
?>
