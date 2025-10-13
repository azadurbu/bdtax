<?php
/*$this->breadcrumbs=array(
	(Yii::t('user','Administration'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(Yii::t('user','Update')),
);*/
$this->menu=array(
    array('label'=>Yii::t('user','Create User'), 'url'=>array('create')),
    array('label'=>Yii::t('user','View User'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>Yii::t('user','Manage Users'), 'url'=>array('admin')),
    array('label'=>Yii::t('user','List User'), 'url'=>array('/user')),
);
?>

<!-- <h1><?php echo  Yii::t('user','Update User')." ".$model->id; ?></h1> -->
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

<?php

	$_SESSION['cpid'] = Yii::app()->user->CPIId;

    echo $this->renderPartial('_form', array('model'=>$model,'changePass'=> $changePass, 'payments'=> $payments, 'voucher' => $voucher, 'docModel' => $docModel, 'docs' => $docs,'userdocs' => $userdocs,'userack'=>$userack));

?>

<script>
function downloadPDF(CPIId) {
	var url = window.location.origin + "<?=Yii::app()->baseUrl;?>" + "/index.php/finalReview/viewOldPdf/tax_year/"+$("#tax_year").val();
	window.open(url);
}


</script>

<script type="text/javascript">
	
$(document).ready(function() {
	var url = document.location.toString();
	if (url.match('#')) {
	    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
	} //add a suffix
});
	

	function submitVoucherCode(id) {
		$('#loading').css('display','block');
		$("#showPaymentLink").html("");
		$.ajax({
			url : "<?=$this->createAbsoluteUrl('/Voucher/redeem')?>",
			type : "POST",
			dataType : "json",
			cache : false,
			data : { 
				'id': id,
				'code': $("#giftVoucherCode").val()
			},
			success : function(data) {
				if (data.status == "success") {
					bootbox.alert(data.msg, function(){
						location.reload(true); 
					});
				}
				else {
					bootbox.alert(data.msg);
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				bootbox.alert("Internal problem has been occurred. Please try again.");
				$('#loading').css('display','none');
			},
			complete : function()
			{
				$('#loading').css('display','none');
			}
		});
	}
</script>