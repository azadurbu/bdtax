<?php

class LanguageController extends Controller
{
	public function actionChange($lang)
	{

if(isset($lang)) {
			Yii::app()->language = $lang;
			Yii::app()->user->setState('language', $lang); 
			$cookie = new CHttpCookie('language', $lang);
        $cookie->expire = time() + (60*60*24*365); // (1 year)
        Yii::app()->request->cookies['language'] = $cookie; 
    }
    else if (Yii::app()->user->hasState('language'))
    	Yii::app()->language = Yii::app()->user->getState('language');
    else if(isset(Yii::app()->request->cookies['language']))
    	Yii::app()->language = Yii::app()->request->cookies['language']->value;

    // $this->redirect( Yii::app()->request->getUrl() );

    $direction = Yii::app()->request->urlReferrer;

    $this->redirect( $direction );

		// $this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}