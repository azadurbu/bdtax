<style type="text/css">

	
	
	#signatureparent {
		
		background-color:darkgrey;
		/*max-width:600px;*/
		padding:0px;
	}
	
	/*This is the div within which the signature canvas is fitted*/
	#signature {
		border: 1px solid black;
		background-color:#fff;
		margin:20px 0;
		
	}

	/* Drawing the 'gripper' for touch-enabled devices */ 
	html.touch #content {
		float:left;
		width:95%;
	}
	
	.panel-heading{background: #ddd;font-weight: bold;}
	.dashboard-box .panel{border: 1px solid #000;margin:20px 70px 70px!important;}

	 
</style>
<div class="container">
<?php
  if(Yii::app()->user->hasFlash('alert_success')) {
?>
    
    <div class="alert alert-success fade in" style="width:97%;margin-top: 8px;"><a href="#" data-dismiss="alert" class="close">×</a>
    <?=Yii::app()->user->getFlash('alert_success')?></div>
<?php
    } else if(Yii::app()->user->hasFlash('alert_fail')) {
?>
    <br />
    <div class="alert alert-danger fade in" style="width:97%;margin-top: 8px;"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('alert_fail')?></div>
<?php
    }
?>
</div>
<div>

<h4>Since you have selected our SUBMISSION service package we need to collect your signature.</h4>
<h4>Please add your signature in the signature panel below.</h4>
<div style="text-align: center;margin-bottom: 30px;">
	<?php if(isset($signature) && $signature->signature){ ?>
        <h2><?=Yii::t("liability", "Current Signature") ?></h2>
		<img style="height:100px" src="<?php echo $signature->signature;?>" />
    <h4>If you want to change your current signature, you can add a new signature and save.</h4>
	<?php } ?>

</div>

<section class="panel">
	<div>
	    <header class="panel-heading">
	        Signature Panel
	        
	        
	    </header>
    </div>
    <div class="panel-body" >       
		<div id="content">
			
			<form id="signaturefrom" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userSignature/entry">
			<div id="signatureparent">
				
				<div id="signature"></div></div>
			    <div class="" style="padding:15px 0">
				<div class="col-sm-6">
					<div id="tools" style="float:right"></div>
				</div>
				<div class="col-sm-1">
					<input type="hidden" id="user-sign" name="usersign">
					<button class="saveSig btn btn-danger " type="button">Save</button>
					
				</div>
				<div style="clear:both"></div>
				<div class="col-sm-12 text-center">
					<input type="checkbox" name="terms" value="1" /> <a id="agreement" data-target="#agreeModal" data-toggle="modal" href="#" href="#"><?=Yii::t("liability", "You must accept the Terms & Conditions.") ?></a>
				</div>
			
		    </div>

		    </form>
			
		</div>
		
	</div>
	
    
</section>
<div style="width:99%" id="incomeModule">

	<div class="login-button input-group">

			
			<div class="back pull-right">
				<a class="btn btn-success for-clr"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userFile" "><i class="fa"><span class="previous-text"> <?=Yii::t("liability", "Upload Required Documents") ?></span></i> <i class="fa fa-chevron-right"></i></a>
			</div>
			<div class="clearfix"></div>

	</div>
	<div class="login-button input-group">

			
			<div class="back pull-right">
				<a class="btn btn-success for-clr"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/finalReview/print" "><i class="fa"><span class="previous-text"> <?=Yii::t("liability", "Go to Submit") ?></span></i> <i class="fa fa-chevron-right"></i></a>
			</div>
			<div class="clearfix"></div>

	</div>

	<!--div class="login-button input-group">

			
			<div class="back pull-right">
				<a class="btn btn-success for-clr"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/finalReview/print" "><i class="fa"><span class="previous-text">Download</span></i> <i class="fa fa-chevron-right"></i></a>
			</div>
			<div class="clearfix"></div>

	</div -->
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jsignature/jquery.js"></script>
<script type="text/javascript">
jQuery.noConflict()
</script>
<script>
/*  @preserve
jQuery pub/sub plugin by Peter Higgins (dante@dojotoolkit.org)
Loosely based on Dojo publish/subscribe API, limited in scope. Rewritten blindly.
Original is (c) Dojo Foundation 2004-2010. Released under either AFL or new BSD, see:
http://dojofoundation.org/license for more information.
*/
(function($) {
	var topics = {};
	$.publish = function(topic, args) {
	    if (topics[topic]) {
	        var currentTopic = topics[topic],
	        args = args || {};
	
	        for (var i = 0, j = currentTopic.length; i < j; i++) {
	            currentTopic[i].call($, args);
	        }
	    }
	};
	$.subscribe = function(topic, callback) {
	    if (!topics[topic]) {
	        topics[topic] = [];
	    }
	    topics[topic].push(callback);
	    return {
	        "topic": topic,
	        "callback": callback
	    };
	};
	$.unsubscribe = function(handle) {
	    var topic = handle.topic;
	    if (topics[topic]) {
	        var currentTopic = topics[topic];
	
	        for (var i = 0, j = currentTopic.length; i < j; i++) {
	            if (currentTopic[i] === handle.callback) {
	                currentTopic.splice(i, 1);
	            }
	        }
	    }
	};
})(jQuery);

</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jsignature/jSignature.min.noconflict.js"></script>
<script>
(function($){

$(document).ready(function() {
	
	// This is the part where jSignature is initialized.
	var $sigdiv = $("#signature").jSignature({'UndoButton':true})
	
	// All the code below is just code driving the demo. 
	, $tools = $('#tools')
	, $extraarea = $('#displayarea')
	, pubsubprefix = 'jSignature.demo.'
	
	/*var export_plugins = $sigdiv.jSignature('listPlugins','export')
	, chops = ['<span><b>Extract signature data as: </b></span><select>','<option value="">(select export format)</option>']
	, name
	for(var i in export_plugins){
		if (export_plugins.hasOwnProperty(i)){
			name = export_plugins[i]
			chops.push('<option value="' + name + '">' + name + '</option>')
		}
	}
	chops.push('</select><span><b> or: </b></span>')*/
	
	$('.saveSig').click(function(e){
		
			var data = $sigdiv.jSignature('getData', 'image')
			//alert(e.target.value);
			$.publish(pubsubprefix + 'formatchanged')
			if (typeof data === 'string'){

				$('textarea', $tools).val(data)
			} else if($.isArray(data) && data.length === 2){
				var imagedata = data.join(',');

				$('#user-sign').val('data:'+imagedata);
				$('#signaturefrom').submit();

				
			} else {
				try {
					alert(JSON.stringify(data));
				} catch (ex) {
					
				}
			}
		
	})

	
	$('<input type="button" class="btn btn-primary" value="Reset">').bind('click', function(e){
		$sigdiv.jSignature('reset')
	}).appendTo($tools)
	
	
	
	$.subscribe(pubsubprefix + 'formatchanged', function(){
		$extraarea.html('')
	})

	
	
	$.subscribe(pubsubprefix + 'image/png;base64', function(data) {
		var i = new Image()
		i.src = 'data:' + data[0] + ',' + data[1]
		$('<span><b>As you can see, one of the problems of "image" extraction (besides not working on some old Androids, elsewhere) is that it extracts A LOT OF DATA and includes all the decoration that is not part of the signature.</b></span>').appendTo($extraarea)
		$(i).appendTo($extraarea)
	});
	
	

	
	
})

})(jQuery)
</script>
