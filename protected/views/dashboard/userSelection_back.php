<div id="" class="user-selection-page">
	     <h2>Let's check which NBR tax return form you are eligible to fill in (IT GA 2016 OR IT GHA 2020)</h2>
		 <h3>Please answer the following questions before we start preparing your tax return:</h3>
         <input type="hidden" id="min-income">
         <input type="hidden" id="min-wealth">
         <input type="hidden" id="car-motor">
         <input type="hidden" id="house-property">
         <ol>
            <li>
                <ul>
                        <li class="first">1. Do you have taxable income less than 4 lac BDT?</li>
                        <li class="last">
                          <div class="btn-group btn-group-lg">
                            <button data-id="1" type="button" class="btn btn-default btn1" onclick="openFromData()">YES</button>
                            <button data-id="2" type="button" class="btn btn-big btn-default btn1">NO</button>
                          </div>
                        </li>
                </ul> 
            <li>
                    <ul>
                         <li class="first">2. Do you have gross wealth less than 40 lac BDT?</li>
                         <li class="last">
                            <div class="btn-group btn-group-lg">
                            <button data-id="1" type="button" class="btn btn-default btn2" onclick="openFromData()">YES</button>
                            <button data-id="2" type="button" class="btn btn-big btn-default btn2">NO</button>
                            </div>
                         </li>
                    </ul>
            <li>
                    <ul>
                          <li class="first">3. Do you have any motor car (jeep or microbus)?</li>
                          <li class="last">

                            <div class="btn-group btn-group-lg">
                            <button data-id="1" type="button" class="btn btn-default btn3" onclick="openFromData()">YES</button>
                            <button data-id="2" type="button" class="btn btn-big btn-default btn3">NO</button>
                             </div>
                          </li>
                    </ul>
            </li>
            <li>
                    <ul>
                        <li class="first">4. Do you own/invest any house property or apartment in the city corporation area</li>
                        <li class="last">
                          <div class="btn-group btn-group-lg">
                            <button data-id="1" type="button" class="btn btn-default btn4" onclick="openFromData()">YES</button>
                            <button data-id="2" type="button" class="btn btn-big btn-default btn4">NO</button>
                          </div>
                          </li>
                    </ul>
            </li>
         </ol>

         <div class="clearfix align-center">
             <button class="btn btn-success btn-large btn-selection-save"><?php echo Yii::t('p_info', "Next"); ?></button>
         </div>

</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="AcknowledgementSlip" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><p style="font-size: 20px;color:#000;"><strong>Form Selection Confirmation</strong></p></h4>
                    </div>
                    
                    <div class="modal-body">
                        
                    </div>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-primary modal-ok" type="Submit">Ok</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <input type="hidden" id="from-type">

        <style>
            
            .user-selection-page h3{
                color: #469646;
                text-align: left;
                font-family: 'Raleway-Regular';
                margin-left:26px;

              }
              .user-selection-page h2{
                color: #000 !important;
                text-align: center;
                font-family: 'Raleway-Regular';
                padding-top: 50px;
                font-size: 26px;
              }
            .user-selection-page ol{width: 90%;margin-top:50px;margin-left:-10px;}
            .user-selection-page ol li{height: 50px;list-style-type: none;}
            .user-selection-page ul li{list-style-type: none;display: inline-block;font-size: 20px;font-weight: 700;}
            .user-selection-page ul li.first{padding-top: 5px;}
            .user-selection-page ul li.last{float: right}
            .user-selection-page button{ margin:0px !important; }

            .align-center{text-align: center;margin-bottom: 250px;}
            .btn-large{width: 25%;font-size: 22px;}
            .btn-lg, .btn-group-lg>.btn{font-size: 11px;font-weight: bold;}
        </style>

        <script type="text/javascript">
            
            var baseUrl = '<?php echo Yii::app()->request->baseUrl; ?>';
            var success_message ="<?php echo Yii::t('p_info', "Congratulations! according to  your answers, you are eligible for the one page Tax Return form, IT GHA 2020. Are you sure you would like to continue?"); ?>";
            var fail_message="<?php echo Yii::t('p_info', "According to your answers you are NOT eligible for the one page form, IT GHA 2020, we are redirecting you to the regular from, IT GHA 2016 now. Are you sure?"); ?>";
        </script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/user_selection/user_selection.js"></script>