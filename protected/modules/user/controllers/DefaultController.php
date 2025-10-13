<?php

class DefaultController extends Controller
{
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if (Yii::app()->user->name == 'Guest'){
			$this->redirect($this->createUrl('index/'));
		} else {
			$this->redirect($this->createUrl('dashboard/'));

		}
	}

}