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
            <form class="form-inline" action="userProgressReport" method="post">
<!--                <div class="form-group">
                    <label for="exampleInputName2">User Search Limit</label>
                    <input type="text" class="form-control custom_input" id="search_limit" name="search_limit">

                </div>-->
<!-- 
                <div class="form-group monthSearch">
                    <label>Month</label>
                     <?php
                     $monthList = [
                        "" => "Select a month",
                        "1" => "January",
                        "2" => "February",
                        "3" => "March",
                        "4" => "April",
                        "5" => "May",
                        "6" => "June",
                        "7" => "July",
                        "8" => "August",
                        "9" => "September",
                        "10" => "October",
                        "11" => "November",
                        "12" => "December",
                    ];
                     //echo CHtml::dropDownList('monthFrom', $monthFrom, $monthList, array('class' => 'form-control', 'required'=>'required'));
                    ?>
                </div> -->

                <div class="form-group datepickerSearch">
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;Year</label>
                    <?php 
                    // $yearList = [
                    //     "" => "Select a year",
                    //     "2016" => "2016",
                    //     "2017" => "2017",
                    //     "2018" => "2018",
                    // ];
                    echo CHtml::dropDownList('yearFrom', $yearFrom, $yearList, array('class' => 'form-control','required'=>'required'));
                    ?>
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
            <!-- <b>Total Row:</b> <?=count($data)?> -->
        </div>
            <div class="table-responsive payment-status">
	            <table class="table table-bordred table-striped" id="ReportTable">
	                <thead>
                        <?php 
                        if($isSubmit == '1'){
                        ?>
                        <tr>
                            <!-- <th width="10%">Month</th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('newUser')">New User</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('activeUser')">Active</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('inActiveUser')">InActive</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_0')">0% - 24% Completion</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_25')">25% - 49% Completion</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_50')">50% - 74% Completion</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_75')">75% - 99% Completion</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_100')">100% Completion</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('pdf_count')">PDF Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('amount')">Total Payment</a></th> -->
                            <th width="10%">Month</th>
                            <th>New User</th>
                            <th>Active</th>
                            <th>InActive</th>
                            <th>0% - 24% Completion</th>
                            <th>25% - 49% Completion</th>
                            <th>50% - 74% Completion</th>
                            <th>75% - 99% Completion</th>
                            <th>100% Completion</th>
                            <th>PDF Download</th>
                            <th>Total Payment</th>
                        </tr>
                        <?php
                        }else{
                        ?>
	                    <tr>
                            <th width="10%">Month</th>
	                        <th>New User</th>
                            <th>Active</th>
	                        <th>InActive</th>
                            <th>0% - 24% Completion</th>
                            <th>25% - 49% Completion</th>
                            <th>50% - 74% Completion</th>
                            <th>75% - 99% Completion</th>
	                        <th>100% Completion</th>
                            <th>PDF Download</th>
                            <th>Total Payment</th>
	                    </tr>
                        <?php 
                        }
                        ?>
	                </thead>
                    <tbody id ='downloadBar' style="display: none;">
                        <th>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="newUser_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="activeUser_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="inActiveUser_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="percent_0_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="percent_25_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="percent_50_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="percent_75_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="percent_100_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="pdf_count_btn" href="#" type="button">Download</a></td>
                            <td><a class="btn btn-success  pull-right downloadExcel" style="display: none;" id="amount_btn" href="#" type="button">Download</a></td>
                        </th>
                    </tbody>
	                <tbody>

                    <?php
                    if($isSubmit=='1')
                    {
                    ?>
                        <!-- <tr>
                            <th width="10%"></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('newUser')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('activeUser')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('inActiveUser')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_0')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_25')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_50')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_75')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('percent_100')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('pdf_count')">Download</a></th>
                            <th><a class="excelDownload" href="#" onclick="downloadDataColumn('amount')">Download</a></th>
                        </tr> -->
                    <?php
                        if(empty($monthData))
                        {

                            print' <tr class="no-data"><td colspan="6"><h3> Sorry No User Progress  Data Available </h3></td></tr>';

                        }
                        else
                        {
                           ?>

                            <?php  
                            $month_count=1;
                            foreach ($monthData as $key => $value) {
                                // var_dump($value);
                                // $cur_month = explode('-',$value['reportForDate']);

                                // if($month_count != $cur_month[1]){
                                //     $month_count = $cur_month[1];
                                // }
                                if($value!=False){
                            ?>
                                <tr>
                                    <td id="expandRow_<?=$key?>"><a href="#"><?= date("F",strtotime($yearFrom.'-'.$key))?></a></td>
                                    <td><?=$value['newUser']?></td>
                                    <td><?=$value['userActive']?></td>
                                    <td><?=$value['userInActive']?></td>
                                    <td><?=$value['per_0']?></td>
                                    <td><?=$value['per_25']?></td>
                                    <td><?=$value['per_50']?></td>
                                    <td><?=$value['per_75']?></td>
                                    <td><?=$value['per_100']?></td>
                                    <td><?=$value['pdfCount']?></td>
                                    <td><?=$value['payment']?></td>
                                </tr>
                                <tr class="DetailReport_<?=$key?>" style="display: none;">
                                    <th width="10%">Date</th>
                                    <th>New User</th>
                                    <th>Active</th>
                                    <th>InActive</th>
                                    <th>0% - 24% Completion</th>
                                    <th>25% - 49% Completion</th>
                                    <th>50% - 74% Completion</th>
                                    <th>75% - 99% Completion</th>
                                    <th>100% Completion</th>
                                    <th>PDF Download</th>
                                    <th>Total Payment</th>
                                </tr>
                                <?php 
                                foreach ($totalData as $subkey => $value) : 
                                    // $e = explode('-', $reportForDate);
                                    // var_dump($e);die;
                                    // var_dump(explode('-', $value['reportForDate'][0]));
                                    if(explode('-', $value['reportForDate'])[1] == $key):
                                ?>
                                <tr class="DetailReport_<?=$key?>" style="display: none;">
                                    <td><?=$value['reportForDate']?></td>
                                    <td><?=$value['newUser']?></td>
                                    <td><?=$value['userActive']?></td>
                                    <td><?=$value['userInActive']?></td>
                                    <td><?=$value['per_0']?></td>
                                    <td><?=$value['per_25']?></td>
                                    <td><?=$value['per_50']?></td>
                                    <td><?=$value['per_75']?></td>
                                    <td><?=$value['per_100']?></td>
                                    <td><?=$value['pdfCount']?></td>
                                    <td><?=$value['payment']?></td>
                                </tr>
                                <?php 
                                endif;
                                endforeach; 
                                ?>
                            <?php
                                } 
                            }
                        }
                    }
                    ?>
                        
                    </tbody>
                </table>
	        </div>
	    </div>
	    
	</div>
    <div class="hide">
        
        <table class="table table-bordred table-striped" id="downloadDetailExcel">
            <thead>
                <tr>
                    <th width="10%">Date</th>
                    <th>First Namer</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody id="detailtbody">
                
            </tbody>
        </table>

    </div>

</div>

<script type="text/javascript">

	$(document).ready(function() {
		$("#ExportToExcel").click(function () {
            $('.DetailReport_1, .DetailReport_2, .DetailReport_3, .DetailReport_4, .DetailReport_5, .DetailReport_6, .DetailReport_7, .DetailReport_8, .DetailReport_9, .DetailReport_10, .DetailReport_11, .DetailReport_12').show().delay(1000);
	        var uri = $("#ReportTable").btechco_excelexport({
	            containerid: "ReportTable", 
	            datatype: $datatype.Table,
	            returnUri: true
	        });

	        $(this).attr('download', 'user_progress_report_' + dateFormat(new Date(), "MM-DD-YYYY")+'.xls') // set file name (you want to put formatted date here)
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
    $('#expandRow_1').click(function(){
        $('.DetailReport_1').slideToggle("slow");
    })
    $('#expandRow_2').click(function(){
        $('.DetailReport_2').slideToggle("slow");
    })
    $('#expandRow_3').click(function(){
        $('.DetailReport_3').slideToggle("slow");
    })
    $('#expandRow_4').click(function(){
        $('.DetailReport_4').slideToggle("slow");
    })
    $('#expandRow_5').click(function(){
        $('.DetailReport_5').slideToggle("slow");
    })
    $('#expandRow_6').click(function(){
        $('.DetailReport_6').slideToggle("slow");
    })
    $('#expandRow_7').click(function(){
        $('.DetailReport_7').slideToggle("slow");
    })
    $('#expandRow_8').click(function(){
        $('.DetailReport_8').slideToggle("slow");
    })
    $('#expandRow_9').click(function(){
        $('.DetailReport_9').slideToggle("slow");
    })
    $('#expandRow_10').click(function(){
        $('.DetailReport_10').slideToggle("slow");
    })
    $('#expandRow_11').click(function(){
        $('.DetailReport_11').slideToggle("slow");
    })
    $('#expandRow_12').click(function(){
        $('.DetailReport_12').slideToggle("slow");
    })
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
<script type="text/javascript">
    function downloadDataColumn(colName){
        var baseUrl = '<?php echo Yii::app()->baseUrl; ?>';
        $.ajax({
            url : baseUrl+"/index.php/reports/userProgressReportColumnData",
            type : "POST",
            dataType : "json",
            cache : false,
            data : {
                colName     : colName,
                monthFrom     : $("#monthFrom").val(),
                yearFrom     : $("#yearFrom").val(),
            },
            success: function(data){
                $('#detailtbody').empty();
                // $('#downloadBar').empty();
                // console.log(data);
                $.each((data), function(index, value){
                    // console.log(value);
                    if(value.mobile == null)
                        value.mobile ="";
                    $('#downloadDetailExcel > tbody:last').append('<tr><td>' + value.UserCreated + '</td><td>' + value.first_name + '</td><td>' + value.last_name + '</td><td>' + value.email + '</td><td>' + value.mobile + '</td></th>');
                });
                //var downloadbutton = '<a class="btn btn-success  pull-right" id="downloadExcel" href="" type="button">Download</a>';
                $('#downloadBar').show();
                if(colName=='newUser'){
                    // document.getElementById('#newUser_download').style.display = "block";
                    $('.downloadExcel').hide();
                    $('#newUser_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td>' + downloadbutton + '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></th>');
                }
                else if(colName=='activeUser'){
                    $('.downloadExcel').hide();
                    $('#activeUser_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td>' + downloadbutton + '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></th>');
                }
                else if(colName=='inActiveUser'){
                    $('.downloadExcel').hide();
                    $('#inActiveUser_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td>' + downloadbutton + '</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></th>');
                }
                else if(colName=='percent_0'){
                    $('.downloadExcel').hide();
                    $('#percent_0_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td></td><td>' + downloadbutton + '</td><td></td><td></td><td></td><td></td><td></td><td></td></th>');
                }
                else if(colName=='percent_25'){
                    $('.downloadExcel').hide();
                    $('#percent_25_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td></td><td></td><td>' + downloadbutton + '</td><td></td><td></td><td></td><td></td><td></td></th>');
                }
                else if(colName=='percent_50'){
                    $('.downloadExcel').hide();
                    $('#percent_50_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>' + downloadbutton + '</td><td></td><td></td><td></td><td></td></th>');
                }
                else if(colName=='percent_75'){
                    $('.downloadExcel').hide();
                    $('#percent_75_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>' + downloadbutton + '</td><td></td><td></td><td></td></th>');
                }
                else if(colName=='percent_100'){
                    $('.downloadExcel').hide();
                    $('#percent_100_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>' + downloadbutton + '</td><td></td><td></td></th>');
                }
                else if(colName=='pdf_count'){
                    $('.downloadExcel').hide();
                    $('#pdf_count_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>' + downloadbutton + '</td><td></td></th>');
                }
                else if(colName=='amount'){
                    $('.downloadExcel').hide();
                    $('#amount_btn').show();
                    // $('#downloadBar').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>' + downloadbutton + '</td></th>');
                }

            }
        })
    }

    $(document).ready(function() {
        $(".downloadExcel").click(function () {
            var uri = $("#downloadDetailExcel").btechco_excelexport({
                containerid: "downloadDetailExcel", 
                datatype: $datatype.Table,
                returnUri: true
            });
            $(this).attr('download', 'user_progress_report_' + dateFormat(new Date(), "MM-DD-YYYY")+'.xls') // set file name (you want to put formatted date here)
                   .attr('href', uri)                     // data to download
                   .attr('target', '_blank')              // open in new window (optional)
            ;
        });
    });
</script>