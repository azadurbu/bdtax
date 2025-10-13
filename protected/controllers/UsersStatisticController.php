<?php

class UsersStatisticController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/columnLess';
	// public $defaultAction = 'filter';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','PdfStatistic','CompletionStatistic','admin','delete', 'filter','update'),
				'users'=>array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionPdfStatistic()
	{
		if(isset($_POST) && !empty($_POST))
		{
			
			$start_year = $_POST['start_year'];
			//$end_year = $_POST['end_year'];

			$sql = "SELECT DATE_FORMAT(`pdf_print_date`, '%M') As Month, DATE_FORMAT(`pdf_print_date`, '%Y') As Year, COUNT(*) As count FROM users_statistic WHERE DATE_FORMAT(`pdf_print_date`, '%Y') = '$start_year' AND `pdf_print_count`!=0 AND `pdf_print_date` IS NOT NULL GROUP BY DATE_FORMAT(`pdf_print_date`, '%c') ORDER BY users_statistic.`pdf_print_date` ASC";


			$queryResult = Yii::app()->db->createCommand($sql)->queryAll();


			$this->render('view',array(

				'queryResult'=>$queryResult,
				'statistic_type'=>'pdf',
			));
		} else {
			$this->redirect(Yii::app()->getHomeUrl().'/usersStatistic');
		}
	}


	public function actionCompletionStatistic(){
		if(isset($_POST) && !empty($_POST))
		{
			
			$start_year = $_POST['start_year'];
			//$end_year = $_POST['end_year'];

			$sql = "SELECT DATE_FORMAT(progress_percent_date,'%M') As Month, DATE_FORMAT(progress_percent_date,'%Y') As Year, COUNT(*) As count FROM users_statistic WHERE DATE_FORMAT(progress_percent_date,'%Y') = '$start_year' AND progress_percent>=100 GROUP BY DATE_FORMAT(progress_percent_date,'%c') ORDER BY progress_percent_date  ASC";


			$queryResult = Yii::app()->db->createCommand($sql)->queryAll();


			$this->render('view',array(

				'queryResult'=>$queryResult,
				'statistic_type'=>'completion'
			));
		} else {
			$this->redirect(Yii::app()->getHomeUrl().'/usersStatistic');
		}
	}


	public function actionIndex()
	{
		$model=new UsersStatistic;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$month = ['1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'];

		// $year_value = date('Y') - 5;

		// for ($i=0; $i <= 10 ; $i++) {
		// 	$year[$year_value] = $year_value;
		// 	$year_value += 1;
		// }

		// var_dump($year);die;


		
		$sql = "SELECT DATE_FORMAT(`progress_percent_date`, '%Y') As Year FROM users_statistic GROUP BY DATE_FORMAT(`progress_percent_date`, '%Y') ORDER BY users_statistic.`progress_percent_date` ASC";


		$queryResult = Yii::app()->db->createCommand($sql)->queryAll();

		for ($i=0; $i < sizeOf($queryResult) ; $i++) {
			$year[$queryResult[$i]['Year']] = $queryResult[$i]['Year'];
		}


		$this->render('create',array(
				'model'=>$model,
				'month'=>$month,
				'year'=>$year,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new UsersStatistic('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UsersStatistic']))
			$model->attributes=$_GET['UsersStatistic'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UsersStatistic the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UsersStatistic::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UsersStatistic $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-statistic-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
