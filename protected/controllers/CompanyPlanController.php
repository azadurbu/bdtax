<?php

class CompanyPlanController extends Controller
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
        $trial = CompanyPlan::model()->find(array('condition' => "plan='Trial'"));
        $small = CompanyPlan::model()->find(array('condition' => "plan='Small'"));
        $medium = CompanyPlan::model()->find(array('condition' => "plan='Medium'"));
        $enterprise = CompanyPlan::model()->find(array('condition' => "plan='Enterprise'"));

        $this->render('index', array(
            'trial' => $trial,
            'small' => $small,
            'medium' => $medium,
            'enterprise' => $enterprise,
        ));
    }
    
    
    public function actionUpdate()
    {
        
        if ( isset($_POST['Trial']) && isset($_POST['Small']) && isset($_POST['Medium']) && isset($_POST['Enterprise']) ) {
            
            $model = new CompanyPlan;
        
            $model->updateByPk($_POST['Trial'], array(
                'trial_period' => $_POST['trial_period_'.$_POST['Trial']],
                'max_number_of_users' => $_POST['max_number_of_users_'.$_POST['Trial']],
                'updated_at' => date("Y-m-d H:i:s")
            ));

            $model->updateByPk($_POST['Small'], array(
                'price' => $_POST['price_'.$_POST['Small']],
                'max_number_of_users' => $_POST['max_number_of_users_'.$_POST['Small']],
                'updated_at' => date("Y-m-d H:i:s")
            ));

            $model->updateByPk($_POST['Medium'], array(
                'price' => $_POST['price_'.$_POST['Medium']],
                'max_number_of_users' => $_POST['max_number_of_users_'.$_POST['Medium']],
                'updated_at' => date("Y-m-d H:i:s")
            ));

            $model->updateByPk($_POST['Enterprise'], array(
                'price' => $_POST['price_'.$_POST['Enterprise']],
                'max_number_of_users' => $_POST['max_number_of_users_'.$_POST['Enterprise']],
                'updated_at' => date("Y-m-d H:i:s")
            ));
            
            //if ($model->save())
                $this->redirect(array(
                    'index'
                ));
            }
        $trial = CompanyPlan::model()->find(array('condition' => "plan='Trial'"));
        $small = CompanyPlan::model()->find(array('condition' => "plan='Small'"));
        $medium = CompanyPlan::model()->find(array('condition' => "plan='Medium'"));
        $enterprise = CompanyPlan::model()->find(array('condition' => "plan='Enterprise'"));

        $this->render('update', array(
            'trial' => $trial,
            'small' => $small,
            'medium' => $medium,
            'enterprise' => $enterprise,
        ));
    }
    
}
