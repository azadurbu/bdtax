<div id="language-select" class="btn-group pull-right" >
<?php 

        // Render options as links
        $lastElement = end($languages);
        foreach($languages as $key=>$lang) {
            if($key != $currentLang) {
                 echo CHtml::link('<span> &nbsp;&nbsp;<i class="fa fa-square-o"></i> '.Yii::t("lan",$lang). '</span>' , Yii::app()->baseUrl.'/index.php/language/change/lang/'.$key, array('class'=>'btn btn-danger'));                
            } else echo '<span class="btn btn-success" disabled="disabled"><b> <i class="fa fa-check-square-o"></i> '.Yii::t("lan",$lang).'</b></span>';
            if($lang != $lastElement) echo '  ';
        }
    

?>
</div>


<!-- <b>Bangla</b> | <a href="/dorkosha/index.php/language/change/lang/en" class="btn btn-primary ">English</a> -->