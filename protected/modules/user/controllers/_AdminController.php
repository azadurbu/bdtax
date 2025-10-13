<?php

class AdminController extends Controller {

    public $defaultAction = 'admin';
    public $layout = '//layouts/columnLess';
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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'hardDelete', 'unDelete', 'create_user', 'update', 'view', 'toggle'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="companyAdmin")',
                ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")||(Yii::app()->user->role==="customers")',
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



    /**
     * Manages all models.
     */
    public function actionAdmin() {

       $model = new User('search');
       $deletedModel = new User('deletedSearch');

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User'])){
            $model->attributes = $_GET['User'];
        }

        $this->render('index', array(
            'model' => $model,
            'deletedModel' => $deletedModel,
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

        $role = Yii::app()->user->role;

        // if ($role != 'superAdmin') {
        //     $this->layout = '//layouts/column2';
        // }

        $model = new User;
        //$profile=new Profile;
        // $this->performAjaxValidation(array($model));
        //var_dump($_POST['User']);
        //print_r($t);
        //echo $uPost['first_name'];
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];

            if ($model->validate()) {

                $post_data = $_POST['User'];
                // $model->first_name = $post_data['first_name'];
                // $model->last_name = $post_data['last_name'];
                // $model->email = $post_data['email'];
                $generated_password = $this->generatePassword(8);
                $model->password = Yii::app()->controller->module->encrypting($generated_password);
                $model->activkey = Yii::app()->controller->module->encrypting(microtime() . $generated_password);
                $model->role_id = $post_data['role_id'];
                $model->status = 0;
                if($post_data['role_id']!=1){
                    $model->org_id = Yii::app()->user->org_id;
                }

                if ($model->save(false)) {

                    $activation_url = $this->createAbsoluteUrl('/user/activation/activation', array("activkey" => $model->activkey, "email" => $model->email));
                    UserModule::sendMail($model->email, UserModule::t("Welcome to {site_name}", array('{site_name}' => Yii::app()->name)), UserModule::t("Welcome to {site_name}. Please click on the link below to activate your account.<br/> {activation_url}<br>Password: {password}", array('{activation_url}' => $activation_url, '{password}' => $generated_password, '{site_name}' => Yii::app()->name)));

                }
                $user_id = $model->id;

                if ( (Yii::app()->user->role=="companyAdmin")||(Yii::app()->user->role=="superAdmin") ) {

                    $this->redirect(array('../user/admin'));
                } else {
                    $this->redirect(array('../dashboard'));

                    // $this->redirect(array('../userProfile/update', 'id' => $model->id));
                }
            }//if validate
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
            if($model['role_id']=='2'){
                $uPost['role_id'] = $model['role_id'];
            }
           

            if ($model->validate()) {
                $old_password = User::model()->notsafe()->findByPk($model->id);
                if ($old_password->password != $model->password) {
                    $model->password = Yii::app()->controller->module->encrypting($model->password);
                    $model->activkey = Yii::app()->controller->module->encrypting(microtime() . $model->password);

                    $model->role_id = $uPost['role_id'];
                }
                $model->save();
                Yii::app()->user->setFlash('success', Yii::t('user', 'Successfully Saved'));
               
               if ( (Yii::app()->user->role=="companyAdmin") || (Yii::app()->user->role=="superAdmin") ) {

                    $this->redirect(array('../user/admin'));
                } else {
                    $this->redirect(array('../dashboard'));

                    // $this->redirect(array('../userProfile/update', 'id' => $model->id));
                }
            } //else $profile->validate();
        }



        $this->render('update', array(
            'model' => $model,
            ));

    }


    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionHardDelete() {
        // if (!(Yii::app()->request->isPostRequest)) {
            // we only allow deletion via POST request
            $model = $this->loadModel();
            $model->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            // if (!isset($_POST['ajax']))
                $this->redirect(array('/user/admin'));
       /* }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');*/

    }

        public function actionDelete() {

        $model = $this->loadModel();

        $model->trash=1;
        $model->save(false);

        $this->redirect(array('/user/admin'));

    }

        public function actionUnDelete() {

        $model = $this->loadModel();

        $model->trash=0;
        $model->save(false);

        $this->redirect(array('/user/admin'));

    }

    public function actionToggle($id) {
      // $model = Organizations::model()->findByPk($id);
      $model = $this->loadModel($id);

      if ($model->status==1) {
      $model->status = 0;
      } else {
      $model->status = 1;

      }

      $model->save(false);

      if ($model === null)
        throw new CHttpException(404, 'The requested page does not exist.');
      // return $model;

    //   return array(
    //     'toggle' => array(
    //         'class'=>'bootstrap.actions.TbToggleAction',
    //         'modelName' => 'Organizations',
    //     )
    // );

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
            if (isset($_GET['id'])){
                $role = Yii::app()->user->role;

                if($role=='superAdmin') {
                    $this->_model = User::model()->notsafe()->findbyPk($_GET['id']);
                } else if($role=='companyAdmin') {
                    $org_id = Yii::app()->user->org_id;
                    $this->_model = User::model()->notsafe()->find('id=:data AND org_id=:data1', array(':data'=>$_GET['id'], ':data1'=>$org_id) );
                    if ($this->_model === null){
                        throw new CHttpException(404, 'you are requesting some unauthorize access');
                    }
                } else if(Yii::app()->user->id==$_GET['id']){
                    $this->_model = User::model()->notsafe()->findbyPk($_GET['id']);
                }
            }else if ($this->_model === null){
                throw new CHttpException(404, 'The requested page does not exist.');
            }
        }
        return $this->_model;
    }


    function generatePassword($length) {
        $lowercase = "qwertyuiopasdfghjklzxcvbnm";
        $uppercase = "ASDFGHJKLZXCVBNMQWERTYUIOP";
        $numbers = "1234567890";
        $specialcharacters = "@#";
        $randomCode = "";
        mt_srand(crc32(microtime()));
        $max = strlen($lowercase) - 1;
        for ($x = 0; $x < abs($length / 3); $x++) {
            $randomCode .= $lowercase{mt_rand(0, $max)};
        } $max = strlen($uppercase) - 1;
        for ($x = 0; $x < abs($length / 3); $x++) {
            $randomCode .= $uppercase{mt_rand(0, $max)};
        } $max = strlen($specialcharacters) - 1;
        for ($x = 0; $x < abs($length / 3); $x++) {
            $randomCode .= $specialcharacters{mt_rand(0, $max)};
        } $max = strlen($numbers) - 1;
        for ($x = 0; $x < abs($length / 3); $x++) {
            $randomCode .= $numbers{mt_rand(0, $max)};
        } return str_shuffle($randomCode);
    }




}