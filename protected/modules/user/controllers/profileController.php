<?php

class ProfileController extends Controller {

    public $defaultAction = 'admin';
    public $layout = '//layouts/column3';
    private $_model;
    private $_data;

    /**
     * @return array action filters
     */
    public function filters() {
        return CMap::mergeArray(parent::filters(), array(
            'accessControl', // perform access control for CRUD operations
        ));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'delete_profile', 'create_user', 'update', 'update_profile', 'view', 'profile'),
                'users' => UserModule::getAdmins(),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

//    /**
//     * Manages all models.
//     */
//    public function actionAdmin() {
//        //$model=new User('search');
//        //$euid=Yii::app()->user->id;
//        //$data=User::model()->findbyPk($euid);
//        //$company=$data->company;
//        //if(isset($_GET['User']))
//        //$model->attributes=$_GET['User'];
//        //$company=Yii::app()->user->company;
//
//        $this->render('index', array(
//            'model' => User::model()->findAll(),
//        ));
//    }

    public function actionAdmin() {
        //$model=new User('search');
        //$euid=Yii::app()->user->id;
        //$data=User::model()->findbyPk($euid);
        //$company=$data->company;

        $org_id = Yii::app()->user->org_id;


        $this->render('index_profile', array(
            'model' => User::model()->findAll('org_id=:org_id', array(':org_id' => $org_id)),
        ));
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $model = $this->loadModel();
        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;
        //$profile=new Profile;
        $this->performAjaxValidation(array($model));
        //var_dump($_POST['User']);
        //print_r($t);
        //echo $uPost['first_name'];
        if (isset($_POST['User'])) {
            $euid = Yii::app()->user->id;


            //$udata=User::model()->findbyPk($euid);

            $org_id = Yii::app()->user->org_id;

            $uPost = $_POST['User'];

            $model->attributes = $_POST['User'];
            $model->activkey = Yii::app()->controller->module->encrypting(microtime() . $model->password);
            //$profile->attributes=$_POST['Profile'];
            //$profile->user_id=0;
            if ($model->validate()) {
                $model->password = Yii::app()->controller->module->encrypting($model->password);

                $model->status = ((Yii::app()->controller->module->activeAfterRegister) ? User::STATUS_ACTIVE : User::STATUS_NOACTIVE);



                $model->zip_code = $uPost['zip_code'];
                $model->height = $uPost['height'];
                $model->weight = $uPost['weight'];
                $model->activity_level = $uPost['activity_level'];
                $model->allergies = $uPost['allergies'];
                $model->role = $uPost['role'];
                $model->superuser = 1;
                $model->status = 1;
                $model->org_id = $org_id;


                //if we need to activate this user through activation user
                //$model->status=((Yii::app()->controller->module->activeAfterRegister)?User::STATUS_ACTIVE:User::STATUS_NOACTIVE);

                if ($model->save()) {

                    $nutrient_id = $_POST['nutrient_id'];


                    foreach ($nutrient_id as $n_id) {

                        $model_nutrient = new UsersNutrient;
                        $model_nutrient->user_id = $model->id;
                        $model_nutrient->nutrient_id = $n_id;
                        $model_nutrient->save(false);
                    }


                    //if we need to activate this user through activation user
                    //$activation_url = $this->createAbsoluteUrl('/user/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));
                    //UserModule::sendMail($model->email,Yii::t('user',"Welcome to {site_name}",array('{site_name}'=>Yii::app()->name)),Yii::t('user',"Welcome to realgembuyinggroup.com. Please click on the link below to activate your account.<br/> {activation_url}",array('{activation_url}'=>$activation_url)));
                }
                $this->redirect(array('view', 'id' => $model->id));
            } //else $profile->validate();
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();


        $this->performAjaxValidation(array($model));
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $uPost = $_POST['User'];

            if ($model->validate()) {
                $old_password = User::model()->notsafe()->findByPk($model->id);

                          $model->zip_code = $uPost['zip_code'];
                    $model->gender = $uPost['gender'];
                    $model->role = $uPost['role'];
                    $model->height = $uPost['height'];
                    $model->weight = $uPost['weight'];
                    $model->activity_level = $uPost['activity_level'];
                    $model->allergies = $uPost['allergies'];

                if ($old_password->password != $model->password) {
                    $model->password = Yii::app()->controller->module->encrypting($model->password);
                    $model->activkey = Yii::app()->controller->module->encrypting(microtime() . $model->password);

//
//                    $model->zip_code = $uPost['zip_code'];
//                    $model->gender = $uPost['gender'];
//                    $model->role = $uPost['role'];
//                    $model->height = $uPost['height'];
//                    $model->weight = $uPost['weight'];
//                    $model->activity_level = $uPost['activity_level'];
//                    $model->allergies = $uPost['allergies'];


                }
                $model->save();

                $this->redirect(array('view', 'id' => $model->id));
            } //else $profile->validate();
        }


        $role = Yii::app()->user->role;

        $nutrient = $this->loadNutrientModel($model->id);

        if (!empty($nutrient)) {

            $nutrient_list = $this->loadNutrientList(array('n_id1' => $nutrient[0], 'n_id2' => $nutrient[1]));
        }

        if (isset($nutrient_list)) {





            $this->render('update', array(
                'model' => $model,
                'nutrient_list' => $nutrient_list,
            ));
        } else {

            $this->render('update', array(
                'model' => $model,
            ));
        }
    }



    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate_profile() {
        $model = $this->loadModel();


        $this->performAjaxValidation(array($model));
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $uPost = $_POST['User'];

                                $model->zip_code = $uPost['zip_code'];
                    $model->gender = $uPost['gender'];
                    $model->role = $uPost['role'];
                    $model->height = $uPost['height'];
                    $model->weight = $uPost['weight'];
                    $model->activity_level = $uPost['activity_level'];
                    $model->allergies = $uPost['allergies'];

            if ($model->validate()) {
                $old_password = User::model()->notsafe()->findByPk($model->id);
                if ($old_password->password != $model->password) {
                    $model->password = Yii::app()->controller->module->encrypting($model->password);
                    $model->activkey = Yii::app()->controller->module->encrypting(microtime() . $model->password);


                    $model->zip_code = $uPost['zip_code'];
                    $model->gender = $uPost['gender'];
                    $model->role = $uPost['role'];
                    $model->height = $uPost['height'];
                    $model->weight = $uPost['weight'];
                    $model->activity_level = $uPost['activity_level'];
                    $model->allergies = $uPost['allergies'];
                    $model->save();
                }
                $model->save();

                $this->redirect(array('admin'));
            } //else $profile->validate();
        }


        $role = Yii::app()->user->role;

        $nutrient = $this->loadNutrientModel($model->id);

        if (!empty($nutrient)) {

            $nutrient_list = $this->loadNutrientList(array('n_id1' => $nutrient[0], 'n_id2' => $nutrient[1]));
        }

        if (isset($nutrient_list)) {


            $this->render('update_profile', array(
                'model' => $model,
                'nutrient_list' => $nutrient_list,
            ));
        } else {

            $this->render('update_profile', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete() {
        if (!(Yii::app()->request->isPostRequest)) {
            // we only allow deletion via POST request
            $model = $this->loadModel();

            $model->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_POST['ajax']))
                $this->redirect(array('/user/profile'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = User::model()->notsafe()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    public function loadNutrientModel($id) {

        if (isset($id)) {
            $this->_data = Yii::app()->db->createCommand()
                            ->select('nutrient_id')
                            ->from('users_nutrient')
                            ->where('user_id=:user_id', array(':user_id' => $id))
                            //->andWhere('age_min<=:age_min', array(':age_min'=>$age))
                            //->andWhere('age_max>=:age_max', array(':age_max'=>$age))
                            ->queryAll();
        }
        if ($this->_data === null)
            throw new CHttpException(404, 'The requested page does not exist.');

        return $this->_data;
    }

    public function loadNutrientList($n_id) {

        //print_r($n_id);

        $this->_data = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('nutrient_range')
                        ->where('id=:id1 or id=:id2', array(':id1' => $n_id['n_id1']['nutrient_id'], ':id2' => $n_id['n_id2']['nutrient_id']))
                        ->queryAll();

        if ($this->_data === null)
            throw new CHttpException(404, 'The requested page does not exist.');

        return $this->_data;
    }

}