
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/ajax_uploader/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/js/ajax_uploader/demo/styles.css" rel="stylesheet">
<main role="main" style="padding: 15px;">

      <!-- h1>jQuery Ajax File Uploader Widget</h1>
      <p class="lead mb-4">
        A very lightweight Plugin for file uploading using ajax(async) and includes support for queues, progress tracking and drag and drop.
        This page demostrates the default basic setup/config.
      </p -->
      
      <h3>Please upload required documents that need to be submitted along with the return.</h3>
      <div class="alert fade in file-alert" ></div>
      <?php

      if(Yii::app()->user->hasFlash('alert_success')) {
      ?>
    
	    <div class="alert alert-success fade in" style="width:97%;margin-top: 8px;"><a href="#" data-dismiss="alert" class="close">×</a>
	    <?=Yii::app()->user->getFlash('alert_success')?></div>
	  <?php
	  } ?>
<?php
      $file_types = Yii::app()->db->createCommand()
    ->select('*')
    ->from('file_types')
    ->where('parent_id=:parent_id', array(':parent_id'=>0))
    ->queryAll();
    //echo '<pre/>'; print_r($users);
     if($FileType){
          $requiredtyp[1] = "Yes";
         $requiredtyp[2] = "Yes";
         $requiredtyp[3] = "Yes";
         $requiredtyp[4] = "Yes";
         $requiredtyp[5] = 'No';
         $requiredtyp[6] = "Yes";
         $requiredtyp[7] = "Yes";
         $requiredtyp[8] = "Yes";
         $requiredtyp[30] = "Yes";
     }else{
         $requiredtyp[1] = $UserIncomeStatus->IncomeSalariesConfirm;
         $requiredtyp[2] = $UserIncomeStatus->InterestOnSecuritiesConfirm;
         $requiredtyp[3] = $UserIncomeStatus->IncomeHousePropertiesConfirm;
         $requiredtyp[4] = $UserIncomeStatus->IncomeBusinessOrProfessionConfirm;
         $requiredtyp[5] = 'No';
         $requiredtyp[6] = $UserIncomeStatus->IncomeCapitalGainsConfirm;
         $requiredtyp[7] = $UserIncomeStatus->IncomeOtherSourceConfirm;
         $requiredtyp[8] = "Yes";
         $requiredtyp[30] = "Yes";
     }
     //print_r($requiredtyp);
    ?>

      <div class="row">
      	<div class="col-md-6 col-sm-12">
      		<div class="file-type-contatiner">
            <span style="font-size: 10px;font-weight: bold;">(Max file size: 8MB, File type:pdf,image)</span>
      			<select class="form-control" id="file-type" onchange="changefiletype(this.value)">
      				<option value="">Select Document Type</option>
      				<?php foreach($file_types as $type){?>
      					<?php if($requiredtyp[$type['id']]=='Yes'){?>
					    <optgroup label="<?php echo $type['title'];?>">
					     <?php $file_types_child = Yii::app()->db->createCommand()
							    ->select('*')
							    ->from('file_types')
							    ->where('parent_id=:parent_id', array(':parent_id'=>$type['id']))
							    ->queryAll();
						  ?>
						  <?php foreach($file_types_child as $type_child){?>
					      	<option value="<?php echo $type_child['id'];?>"><?php echo $type_child['title'];?></option>
					      <?php } ?>
					    </optgroup>
						<?php }?>
				    
				    <?php } ?>
				</select>
	      		
      	    </div>
      	
          
          <!-- Our markup, the important part here! -->
          <div id="drag-and-drop-zone" class="dm-uploader p-5">
            <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop files here</h3>
            <div class="btn-top"><h3>Or</h3></div>
            <div class="btn btn-success btn-block mb-5">
                <span>Open the file Browser</span>
                <input type="file" readonly="" title='Click to add Files' />

            </div>

            <div class="hover-div" onclick="clicOnHover()"></div>
          </div><!-- /uploader -->

        </div>
        <div class="col-md-6 col-sm-12">
          <form method="post" id="file-list-from" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userFile/entry">
	          <div class="card h-100">
	            <div class="card-header">
	              File List
	            </div>

	            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
	            	<?php 
                $counter = 0;
                foreach($userFiles as $files):?>
	            	<li class="media" id="uploaderFile8gqqfqavlb7">
      			        <div class="media-body mb-1">
      			          <div class="col-sm-4" style="padding-top:2px;">
      				          <p class="mb-2">
      				            <strong><?php echo $files['title'];?></strong> <!-- - Status: <span class="text-muted">Waiting</span> -->
      				          </p>
      			          </div>
      			          
      			          <div class="col-sm-6 progress mb-2">
      			            <div class="progress-bar bg- bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      			          </div>
      			          <div class="col-sm-2 file-delete-btn">
      			          	<?php if($files['current_status']=="" || $files['current_status']==1){?>
      			          	<button onclick="removeCurrentContent(this)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
      			            <?php  } else{?>
                          <a onclick="unabletoremove()" href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <?php } ?>
                        <a target="_blank" href="https://bdtax.com.bd/index.php/user/admin/downloadMyDoc/id/<?php echo $files['ufid'];?>/type/2" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        
      			          	<input type="hidden" class="added-file-type" value="<?php echo $files['file_type'];?>"><input type="hidden" value="<?php echo $files['file_path'];?>" name="userfile[<?php echo $files['file_type'];?>]"></div>
      			         
      			        </div>
			          </li>
			          <?php 
                $counter++;
                endforeach; ?>
                <?php if($counter==0){ ?>
	                 <li class="text-muted text-center empty">No files uploaded.</li>
                <?php  } ?>
	            </ul>
	          </div>
	          <div class="text-center save-button-container">
	          	<button type="button" onclick="submitFrom()" class="btn btn-success">Save</button>
	          </div>
          </form>
        </div>
      </div><!-- /file list -->

      <!-- div class="alert alert-info" role="alert">
        More setup demos on: <a href="https://danielmg.org/demo/java-script/uploader/basic">https://danielmg.org/demo/java-script/uploader/basic</a>
      </div -->


    </main> <!-- /container -->
    <div style="width:99%" id="incomeModule">
    <?php $userPlan = $this->userCurrentPlan(); 
    if($userPlan && ($userPlan->plan_id==5 || $userPlan->plan_id ==7)){
    ?>


      <div class="login-button input-group">

            
            <div class="back pull-right">
              <a class="btn btn-success for-clr"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userSignature" "><i class="fa"><span class="previous-text"><?=Yii::t("liability", "Add Your Signature") ?></span></i> <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="clearfix"></div>

        </div>

      <div class="login-button input-group">

      
      <div class="back pull-right">
        <a class="btn btn-success for-clr"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/finalReview/print" "><i class="fa"><span class="previous-text"> <?=Yii::t("liability", "Go to Submit") ?></span></i> <i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="clearfix"></div>

      </div>
      
    <?php } ?>
  <!-- div class="login-button input-group">

      
      <div class="back pull-right">
        <a class="btn btn-success for-clr"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/finalReview/print" "><i class="fa"><span class="previous-text">Download</span></i> <i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="clearfix"></div>

  </div -->
</div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ajax_uploader/dist/js/jquery.dm-uploader.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ajax_uploader/demo/demo-ui.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ajax_uploader/demo/demo-config1.js"></script>
    <!-- File item template -->
    <script type="text/html" id="files-template">
      <li class="media">
        <div class="media-body mb-1">
          <div class="col-sm-4" style="padding-top:2px;">
	          <p class="mb-2">
	            <strong>%%filename%%</strong> <!-- - Status: <span class="text-muted">Waiting</span> -->
	          </p>
          </div>
          
          <div class="col-sm-7 progress mb-2" >
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
              role="progressbar"
              style="width: 0%" 
              aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <div class="col-sm-1 file-delete-btn">
	          
          </div>
         
        </div>
      </li>
    </script>
    <style type="text/css">
      .progress{margin-bottom:0px;}
      .hover-div{width: 100%;
	    height: 100%;
	    background: transparent;
	    position: absolute;
	    top: 55px;
	    left: -10px;
	   }
	    .card {
	    position: relative;
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-orient: vertical;
	    -webkit-box-direction: normal;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    min-width: 0;
	    word-wrap: break-word;
	    background-color: #fff;
	    background-clip: border-box;
	    border: 1px solid rgba(0,0,0,.125);
	    border-radius: .25rem;
	}

	.card-header:first-child {
	    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
	}
	.card-header {
	    padding: .75rem 1.25rem;
	    margin-bottom: 0;
	    background-color: rgba(0,0,0,.03);
	    border-bottom: 1px solid rgba(0,0,0,.125);
	}
	.file-type-contatiner{padding:0px 0px 20px;}
	.dm-uploader {
    border: 0.25rem dashed #A5A5C7;
    text-align: center;
    padding: 60px;
    }

    .dm-uploader .btn {
    position: relative;
    overflow: hidden;
    margin: 0px 0 70px;
    }
    .btn-top{margin: 30px 0;}
    #files{height: 377px !important;}
    .media{padding:5px;}
    .file-delete-btn{
       padding: 0px 5px !important;
    }

    .file-delete-btn .btn{
       padding: 2px 10px !important;
    }
    .bg-success{background: #47a447;}
    .progress{padding: 0px !important;}
    .media {
      padding: 5px;
      border-bottom: 1px solid #ccc;
     }
     .file-alert{height: 25px;
    padding: 3px 10px;margin: 0px;}
     .save-button-container{margin-top: 20px;}
    </style>
    <script type="text/javascript">
      function clicOnHover(){
      	jQuery('.file-alert').addClass('alert-danger');
      	jQuery('.file-alert').html('Please select a File Type before you can upload a file.');
        //alert('Please Select File Type');
      }
      function changefiletype(val){
      	jQuery('.file-alert').removeClass('alert-danger');
      	jQuery('.file-alert').html('');
      	var tag = 0;
 		/*if(val==''){
 			jQuery('.hover-div').show();
 		}else{*/
 			$(".added-file-type" ).each(function() {
			  if($( this ).val() == val){
			  	tag = 1;
			  }
			});
			if(tag==1){
 			   jQuery('.hover-div').show();
 			   var filehtml = jQuery('#file-type').html();
 			   jQuery('#file-type').html('');
 			   jQuery('#file-type').html(filehtml);
 			   jQuery('.file-alert').addClass('alert-danger');
      	       jQuery('.file-alert').html('This type of file has already been uploaded.');
 			  
 		    }else{
               jQuery('.hover-div').hide();
               jQuery('.file-alert').removeClass('alert-danger');
      	       jQuery('.file-alert').html('');
 		    }

 		    if(val==''){
 			jQuery('.hover-div').show();
 			jQuery('.file-alert').removeClass('alert-danger');
      	    jQuery('.file-alert').html('');
 		    }
 		
      }

      function removeCurrentContent(obj){
      	$(obj).parents("li").remove();
      }

      function submitFrom(){
      	var tag = 0;
 		
 		$(".added-file-type" ).each(function() {
			  tag =1;
			  
		});
        if(tag!=1){
        	jQuery('.file-alert').addClass('alert-danger');
      	    jQuery('.file-alert').html('Please upload your files');
        	//alert('Please Upload Files');
        }else{
        	jQuery('.file-alert').removeClass('alert-danger');
      	    jQuery('.file-alert').html('');
      	    jQuery('#file-list-from').submit();
        }

      }

      function viewfileinpopup(file_path,title){
        
                     //$('#filemodal').modal('hide');
                     $('#filemodal .modal-title').html(title);
                    //$('#filemodal').modal('show');
                     //return false;
                     jQuery.ajax({
                      url: '<?php echo Yii::app()->request->baseUrl; ?>/index.php/userFile/showFile/',
                      method: 'post',
                          data: {
                             file_path : file_path,
                             
                             
                          },
                          success: function(result){
                            //alert('HI');
                            $('#filemodal').modal('show');
                            $('#filemodal .modal-body').html(result);
                          }
                      }); 
                    
                }
            
                function unabletoremove(){
                  $('#filedeletemodal').modal('show');
                }
    </script>

    
    <script type="text/html" id="debug-template">
      <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
    </script>

    <!-- Modal2 -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="filemodal" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">NBR Receipt</h4>
                    </div>
                    
                    <div class="modal-body" style="height:500px">
                        
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <!-- button class="btn btn-primary" type="Submit">Submit</button -->
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Modal2 -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="filedeletemodal" class="modal fade in">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="color: #47a447">Failed to remove</h4>
                    </div>
                    
                    <div class="modal-body">
                        We are currently reviewing your file. if you want to remove or update your file please cotacts us.
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <!-- button class="btn btn-primary" type="Submit">Submit</button -->
                    </div>
                    
                </div>
            </div>
        </div>
    <!-- Debug item template -->