<?php

class IndividualPlanController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/columnLess';
    public $defaultAction = 'index';
    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('index', 'update'),
                    'users' => array('@'),
                    'expression' => '(Yii::app()->user->role == "superAdmin")',
                    ),
                array('deny', // deny all users
                    'users' => array('*'),
                    ),
                );
    }
    
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionIndex()
    {
        $premier = IndividualPlan::model()->find(array('condition' => "plan='Premier'"));

        $this->render('index', array(
            'premier' => $premier
        ));
    }
    
    
    public function actionUpdate()
    {
        
        if ( isset($_POST['Premier']) ) {
            
            $model = new IndividualPlan;

            $model->updateByPk($_POST['Premier'], array(
                'price' => $_POST['price_'.$_POST['Premier']],
                'updated_at' => date("Y-m-d H:i:s")
            ));
            
            //if ($model->save())
                $this->redirect(array(
                    'index'
                ));
            }
        $premier = IndividualPlan::model()->find(array('condition' => "plan='Premier'"));

        $this->render('update', array(
            'premier' => $premier
        ));
    }
    
}
