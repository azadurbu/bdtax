<?php 
public function getUrl()
{
    return Yii::app()->createUrl('post/view', array(
        'id' => $this->id,
        'title' => $this->title,
        'lang' => Yii::app()->language,
    ));
}
 ?>