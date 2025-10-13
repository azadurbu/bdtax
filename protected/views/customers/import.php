<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/input_mask.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#User_mobile").mask("99999999999");

    });

</script>

<script type="text/javascript">
function onlyAlphabets(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  // if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
  if ((charCode >= 65 && charCode<=90) || (charCode>=97 && charCode<=122) || charCode==32 || charCode==08){
      return true;
  }
 return false;

}


</script>
<!-- Dialog show event handler -->

<script type="text/javascript">

    function delete_user_account() {

        bootbox.confirm({
            message: "If you delete your account, all your data will be lost and can not be recovered. Are you sure you want to delete your account?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {

                    $('#loading').css('display','block');
                    if(result)
                    {
                        $.ajax({
                            url : "<?=Yii::app()->createUrl("user/admin/destroy/",array("id"=>Yii::app()->user->id))?>",
                            type : "POST",
                            dataType : "json",
                            cache : false,
                            success : function(data) {
                                location.reload();
                            },
                            error : function(XMLHttpRequest, textStatus, errorThrown) {
                                location.reload();
                            },
                            complete : function()
                            {
                                $('#loading').css('display','none');
                            }
                        });
                    }



            }
        });

    }




</script>

<div class="nav-tabs-sticky-pi margin_bottom common-padding sticky-min-height3">


    <div role="tabpanel" id="liabilities_tab">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="myTab">
           
            <li role="presentation" class="active"  id="profileTab"><a href="#profile" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"><?=Yii::t('user', "Import Employee")?></a></li>
            
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            
           
        <div class="form-cantainer">
         
            <h2>Upload Employee</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Import" value="1">
            <div class="form-group">
                <label for="exampleFormControlFile1">Choose input file (Csv Only)</label>
                <input type="file" name="file" class="form-control" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Upload</button>
            </div>
            </form>
        </div>