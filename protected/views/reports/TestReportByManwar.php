<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.battatech.excelexport.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/daterangepicker/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/daterangepicker/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/daterangepicker/bootstrap-datepicker.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/date_range_custom.css?v=<?=$this->v?>" />


<div id="home-mid" class="reg-form income-dashbord sticky-min-height3">
    <input type="hidden" class="form-control" value="<?php if(isset($dataRangeForm)) {echo $dataRangeForm;}?>"  id="HiddenField1" name="HiddenField1">
    <input type="hidden" class="form-control" value="<?php if(isset($dataRangeForm)) {echo $dataRangeTo;}?>"  id="HiddenField2" name="HiddenField2">

    <div class="row">
        <div class="col-lg-10" style="padding-top: 6px;">
            <form class="form-inline" action="TestReportByManwar" method="post">
<!--                <div class="form-group">
                    <label for="exampleInputName2">User Search Limit</label>
                    <input type="text" class="form-control custom_input" id="search_limit" name="search_limit">

                </div>-->




                <div class="form-group datepickerSearch">
                    <input type="text" class="form-control" value="<?=$dataRangeForm?>"  id="date_range_form" name="date_range_form" required="" placeholder="Date From">
                </div>

                <div class="form-group datepickerSearch">
                    <input type="text" class="form-control" value="<?=$dataRangeTo?>"  id="date_range_to" name="date_range_to" required="" placeholder="Date To">
                </div>
                
                <div class="form-group">
                    <?php echo CHtml::dropDownList('percentComplete', $percentComplete, 
                    [
                        "0-100" => "All",
                        "0-24" => "0-24% Completion",
                        "25-49" => "25-49% Completion",
                        "50-74" => "50-74% Completion",
                        "75-99" => "75-99% Completion",
                        "100-100" => "100% Completion",
                    ], array('class' => 'form-control')); ?>
                </div>
         
         
                <div class="checkbox form-group" style="padding-left: 15px; padding-right: 15px;">
                    <label>
                        <input name="hasPaid" type="checkbox" <?=($hasPaid)? "checked" : ""?> >  Paid User
                    </label>
                    &nbsp;&nbsp;
                    <label>
                        <input name="showTaxOwed" type="checkbox" <?=($showTaxOwed)? "checked" : ""?> >  Show Tax Owed
                    </label>
                </div>

                
          
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </form>

        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <a class="btn btn-success  pull-right" id="ExportToExcel" type="button">Excel</a>
            </div>
        </div>

    </div>


	<div class="row">
	    <div class="col-lg-12" style="padding-top: 6px;">
	    <div class="pull-right">
            <b>Total Row:</b> <?=count($data)?>
        </div>

	        <div class="table-responsive payment-status">
	            <table class="table table-bordred table-striped" id="ReportTable">
	                <thead>
	                    <tr>
	                        <th>User Email</th>
                            <th>Phone</th>
	                        <th>Completed Percent</th>
	                        <th>Payment</th>
                            <th>Tax Owed</th>
	                    </tr>
	                </thead>
	                <tbody>

                    <?php
                    if($isSubmit=='1')
                    {
                        if(empty($data))
                        {

                            print' <tr class="no-data"><td colspan="6"><h3> Sorry No Tax Owed  Data Available </h3></td></tr>';

                        }
                        else
                        {
                           ?>

                            <?php 
                                foreach ($data as $key => $value) : 
                            ?>
                            <tr>
                                <td><?=$value['email']?></td>
                                <td><?=$value['mobile']?></td>
                                <td><?=$value['completed_percent']?></td>
                                <td><?=$value['payment']?></td>
                                <td><?=$value['tax_owed']?></td>
                            </tr>
                            <?php endforeach; ?>



                            <?php
                        }
                    }
                    ?>

	                	
	                </tbody>
	            </table>
	        </div>
	    </div>
	    
	</div>

</div>

<script type="text/javascript">

	$(document).ready(function() {
		$("#ExportToExcel").click(function () {
	        var uri = $("#ReportTable").btechco_excelexport({
	            containerid: "ReportTable", 
	            datatype: $datatype.Table,
	            returnUri: true
	        });

	        $(this).attr('download', 'user_tax_owed_and_completed_percent_' + dateFormat(new Date(), "MM-DD-YYYY")+'.xls') // set file name (you want to put formatted date here)
	               .attr('href', uri)                     // data to download
	               .attr('target', '_blank')              // open in new window (optional)
	        ;
	    });
	});

	function dateFormat(date, format) {
	    format = format.replace("DD", (date.getDate() < 10 ? '0' : '') + date.getDate());
	    format = format.replace("MM", (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1));
	    format = format.replace("YYYY", date.getFullYear());
	    return format;
	}

</script>

<script type="text/javascript">
    $(function() {

        $('.datepickerSearch input').datepicker({
            autoclose: true,
            todayHighlight: true
        });


        $('#reportrange_from').click(function(event){
            $("#date_range_form").datepicker({
                singleDatePicker: true,
                showDropdowns: true
            }).focus();

        });


        $('#reportrange_to').click(function(event){
            $("#date_range_to").datepicker({
                singleDatePicker: true,
                showDropdowns: true
            }).focus();

        });
        if ($('#HiddenField1').val() != "" || $('#HiddenField1').val() != null)
        {
            $('#date_range_form').val($('#HiddenField1').val());

        }
        if ($('#HiddenField1').val() != "" || $('#HiddenField1').val() != null)
        {
            $('#date_range_to').val($('#HiddenField2').val());

        }
    });
</script>