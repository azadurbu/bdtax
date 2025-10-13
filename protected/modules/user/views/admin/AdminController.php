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
                'actions' => array('admin', 'delete', 'hardDelete', 'unDelete', 'create_user', 'update', 'view', 'toggle', 'sendActivationEmailAgain'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="companyAdmin")',
                ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update','passChange','destroy'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")||(Yii::app()->user->role==="customers")',
                ),  
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('uploadMyDoc'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->role==="customers")',
                ), 
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('downloadMyDoc','deleteMyDoc'),
                'users' => array('@'),
                'expression' => '(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
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

        unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
        unset(Yii::app()->request->cookies['to_date']);


       $model = new User('search');
       $deletedModel = new User('deletedSearch');

        $model->unsetAttributes();  // clear any default values


        if(!empty($_POST))
        {
            Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
            Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
            $model->from_date = $_POST['from_date'];
            $model->to_date = $_POST['to_date'];
        }


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
        $docModel = new MyDocuments;
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


                    $mailBody= Yii::t('user','
                        <div id=":fz" class="a3s" style="overflow: hidden;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
                                <tbody> <tr> <td>
                                   <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
                                    <tbody>
                                       <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
                                       <tr> <td height="40">&nbsp;</td> </tr> 
                                       <tr> <td> <h3 style="text-align:center">Activate Your Account </h3> </td> </tr> 
                                       <tr> <td>&nbsp;</td> </tr>
                                       <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;line-height:20px;padding:0 20px" valign="middle">Please confirm your email address by clicking the activation link below.</td> </tr> 
                                       <tr> <td>&nbsp;</td> </tr>
                                       <tr> <td align="center" valign="middle"> 
                                         <div style="background-color:#f3402e;display:table;border-radius:5px;color:#ffffff;font-family:Open Sans,Arial,sans-serif;font-size:13px;text-transform:uppercase;font-weight:bold;padding:7px 12px;text-align:center;text-decoration:none;width:140px;margin:auto">

                                             <a href="{activation_url}" style="color:#ffffff;text-decoration:none" target="_blank">Click To Activate</a>
                                         </div>
                                     </td> </tr> 
                                     <tr> <td>&nbsp;</td> </tr>
                                     <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;text-transform:uppercase" valign="middle">OR Copy - Paste the link</td> </tr> 
                                     <tr> <td>&nbsp;</td> </tr>
                                     <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px" valign="middle">
                                        <a href="{activation_url}" style="color:#009307" target="_blank">{activation_url}</a></td> </tr> 
                                        <tr> <td>&nbsp;</td> </tr>
                                        <tr> <td align="center" style="color:#444444;font-size:20px" valign="middle"><strong>Password: {password}</strong></td> </tr>
                                        <tr> <td>&nbsp;</td> </tr>
                                        <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;padding:0 20px" valign="middle">If you need any help in login or have any questions, please email us at <a href="mailto:support@bdtax.com.bd" style="color:#009307" target="_blank">support@bdtax.com.bd</a></td> </tr>
                                        <tr> <td height="50">&nbsp;</td> </tr>
                                    </tbody> 
                                </table> </td> </tr> 
                            </tbody>
                        </table> <p>&nbsp;</p>
                    </div>', array('{activation_url}' => $activation_url, '{password}' => $generated_password));

                    //UserModule::sendMail($model->email, UserModule::t("Welcome to {site_name}", array('{site_name}' => Yii::app()->name)), UserModule::t($mailBody, array('{activation_url}' => $activation_url, '{password}' => $generated_password, '{site_name}' => Yii::app()->name)));

                    UserModule::sendMail($model->email, Yii::t('user',"Welcome to {site_name} - Please Activate Your Account", array('{site_name}' => Yii::app()->name)), $mailBody);

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
            'voucher'=> null,
            'docModel'=> $docModel,
            'docs'=> [],
            ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();
        $changePassword = new UserChangePassword;
        $docModel = new MyDocuments;

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
                if (!isset($_POST['User'])) {
                $model->save();
                 }
                Yii::app()->user->setFlash('success', Yii::t('user', 'Successfully Saved'));
               
               if ( (Yii::app()->user->role=="companyAdmin") || (Yii::app()->user->role=="superAdmin") ) {

                    $this->redirect(array('../user/admin'));
                } else {
                    $this->redirect(array('../dashboard'));

                    // $this->redirect(array('../userProfile/update', 'id' => $model->id));
                }
            } //else $profile->validate();
        }
        
        //echo "<pre>"; print_r($model->role_id); echo "</pre>"; die();
        //$role = Role::model()->find('role=:data',array(':data'=> Yii::app()->user->role));
        
        $payments = Payments::model()->findAll(array(
            'condition' => 'role_id = :role_id AND user_id = :user_id',
            'params' => array(':role_id' => $model->role_id, ':user_id' => $model->id),
            'order' => 'payment_date DESC'
        ));

        $voucher = Vouchers::model()->find(
                        array(
                            'condition' => "user_id='".Yii::app()->user->id."' AND is_used='No' ",
                            'order' => 'created_at DESC'
                            )
                    );

        $docs = MyDocuments::model()->findAll(
                                array(
                                    'condition' => "user_id = '".Yii::app()->user->id."' ", 
                                    'order' => 'created_at DESC'
                                    )
                            );

        $userdocs =Yii::app()->db->createCommand("SELECT *,user_files.id as fileid FROM user_files INNER JOIN orders ON (orders.id = user_files.user_payment_id) inner join file_types ON (file_types.id = user_files.file_type) Where orders.user_id = ". Yii::app()->user->id)->queryAll();

        $userack =Yii::app()->db->createCommand("SELECT * FROM user_acknowledge  Where user_id = ". Yii::app()->user->id)->queryAll();

       // print_r($userdocs);
       

        $this->render('update', array(
            'model' => $model,
            'changePass'=> $changePassword,
            'payments'=> $payments,
            'voucher'=> $voucher,
            'docModel'=> $docModel,
            'docs'=> $docs,
            'userdocs'=>$userdocs,
            'userack'=>$userack
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
            $model->delete();
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


     /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionPassChange() {
        if(isset($_POST['User']['id'])){
            $user_id = $_POST['User']['id'];
            if (Yii::app()->user->id) {

                $form2 = new UserChangePassword;
                $find = User::model()->notsafe()->findByPk($user_id);
                // var_dump($_POST['UserChangePassword']);die;
                if (isset($find)) {
                    // var_dump($_POST['UserChangePassword']);die;
                        // var_dump($form2->validate());die;
                    if (isset($_POST['UserChangePassword'])) {
                        $form2->attributes = $_POST['UserChangePassword'];
                        if ($form2->validate()) {
                            $find->password = Yii::app()->controller->module->encrypting($form2->password);
                            $find->activkey = Yii::app()->controller->module->encrypting(microtime() . $form2->password);

                            $find->save(false);

                            $userlog=new UserActivityLog;
                            $userlog->name=Yii::app()->user->first_name;
                            $userlog->email=Yii::app()->user->email;
                            $userlog->ip_address=$this->get_client_ip();
                            $userlog->activity_type='Password Changed';
                            $userlog->activity_time=date('Y-m-d H:i:s');
                            $userlog->user_id=Yii::app()->user->id;
                            $userlog->CPIId=(is_numeric(Yii::app()->user->CPIId))?Yii::app()->user->CPIId:'';
                            $userlog->pass_change_for_user = $user_id;
                            $userlog->save();

                            Yii::app()->user->setFlash('recoveryMessage', UserModule::t("New password is saved."));
                            // $this->redirect(array('../dashboard'));
                            if(Yii::app()->user->id === $user_id){
                                $this->redirect(array('../user/logout'));
                            }else{
                                $this->redirect(array('../dashboard'));
                            }
                        }
                    }
                    $this->render('changepassword', array('form' => $form2));
                }
            }
        }else{
            $this->redirect(array('../user/admin/update/id/'.Yii::app()->user->id));
        }
    }


    public function actionSendActivationEmailAgain($id) {
        $model = $this->loadModel();

        if ($model->status == 1) {
            Yii::app()->user->setFlash('error', Yii::t('user', 'The user is already activated.'));
            $this->redirect(array('/user/admin'));
        }

        $activation_url = $this->createAbsoluteUrl('/user/activation/activation', array("activkey" => $model->activkey, "email" => $model->email));

        if ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == "https" && preg_match('/http:/', $activation_url) ) {
            $activation_url = str_replace('http://', 'https://', $activation_url ); 
        }

        $mailBody= Yii::t('user','
            <div id=":fz" class="a3s" style="overflow: hidden;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
                    <tbody> <tr> <td>
                       <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
                        <tbody>
                           <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
                           <tr> <td height="40">&nbsp;</td> </tr> 
                           <tr> <td> <h3 style="text-align:center">Activate Your Account </h3> </td> </tr> 
                           <tr> <td>&nbsp;</td> </tr>
                           <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;line-height:20px;padding:0 20px" valign="middle">Please confirm your email address by clicking the activation link below.</td> </tr> 
                           <tr> <td>&nbsp;</td> </tr>
                           <tr> <td align="center" valign="middle"> 
                             <div style="background-color:#f3402e;display:table;border-radius:5px;color:#ffffff;font-family:Open Sans,Arial,sans-serif;font-size:13px;text-transform:uppercase;font-weight:bold;padding:7px 12px;text-align:center;text-decoration:none;width:140px;margin:auto">

                                 <a href="{activation_url}" style="color:#ffffff;text-decoration:none" target="_blank">Click To Activate</a>
                             </div>
                         </td> </tr> 
                         <tr> <td>&nbsp;</td> </tr>
                         <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;text-transform:uppercase" valign="middle">OR Copy - Paste the link</td> </tr> 
                         <tr> <td>&nbsp;</td> </tr>
                         <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px" valign="middle">
                            <a href="{activation_url}" style="color:#009307" target="_blank">{activation_url}</a></td> </tr> 
                            <tr> <td>&nbsp;</td> </tr>
                            <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;padding:0 20px" valign="middle">If you need any help in login or have any questions, please email us at <a href="mailto:support@bdtax.com.bd" style="color:#009307" target="_blank">support@bdtax.com.bd</a></td> </tr>
                            <tr> <td height="50">&nbsp;</td> </tr>
                        </tbody> 
                    </table> </td> </tr> 
                </tbody>
            </table> <p>&nbsp;</p>
        </div>
        ', array('{activation_url}' => $activation_url));

        UserModule::sendMail($model->email, Yii::t('user',"Welcome to {site_name} - Please Activate Your Account", array('{site_name}' => Yii::app()->name)), $mailBody);

       // Yii::app()->user->setFlash('success', Yii::t('user', 'The activation email has been sent. Activation Link: ' . $activation_url));
        Yii::app()->user->setFlash('success', Yii::t('user', 'The activation email has been sent.'));
        $this->redirect(array('/user/admin'));

    }


    public function actionDestroy($id)
    {

        $this->loadModel($id)->delete();
        Yii::app()->session->destroy();

        $this->redirect(array('/'));


    }

    public function actionUploadMyDoc() {
        
        $allowedFileTypes = [
                                "image/jpeg", 
                                "image/png", 
                                "application/pdf", 
                                "application/msword", 
                                "application/vnd.ms-excel", 
                                "application/vnd.openxmlformats-officedocument.wordprocessingml.document", 
                                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                            ];
        if (isset($_FILES['doc']['type'])) $_FILES['doc']['type'] = strtolower($_FILES['doc']['type']);

        if ( isset($_FILES['doc']['type']) && in_array($_FILES['doc']['type'], $allowedFileTypes) ) {
            

            //GENERATE FILE NAME
            $name = $_FILES["doc"]["name"];
            $ext = end((explode(".", $name)));

            $dir = "uploaded-docs/" . Yii::app()->user->CPIId;
            $fileName = $_POST['MyDocuments']['tax_year'] . "_" . Yii::app()->user->CPIId . "_" . date("d-m-Y_H-i-s") . "." . $ext;
            //GENERATE FILE NAME - ENDS

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            if ( move_uploaded_file($_FILES['doc']['tmp_name'], $dir."/".$fileName) ) {

                $model = new MyDocuments;
                $model->user_id = $_POST['user_id'];
                $model->tax_year = $_POST['MyDocuments']['tax_year'];
                $model->doc_name = $_POST['MyDocuments']['doc_name'];
                $model->notes = $_POST['MyDocuments']['notes'];
                $model->doc_type = $_FILES['doc']['type'];
                $model->file_location = $dir."/".$fileName;
                $model->created_at = date("Y-m-d H:i:s");

                if ($model->save(false)) {
                    Yii::app()->user->setFlash('success', Yii::t("doc","Successfully uploaded."));
                }
                else {
                    Yii::app()->user->setFlash('error', Yii::t("doc","Failed to upload."));
                }
            }
            else {
                Yii::app()->user->setFlash('error', Yii::t("doc","Failed to store the file."));
            }
            $url = Yii::app()->createUrl('user/admin/update/id/' . $_POST['user_id'] . "#myDocs");
            $this->redirect($url);
        }
        else {
            Yii::app()->user->setFlash('error', Yii::t("doc","Wrong file type."));
            $url = Yii::app()->createUrl('user/admin/update/id/' . $_POST['user_id'] . "#myDocs");
            $this->redirect($url);
        }
    }

    public function actionDownloadMyDoc($id,$type) {
        if($type==2){
            $userdocs =Yii::app()->db->createCommand("SELECT * FROM user_files INNER JOIN orders ON (orders.id = user_files.user_payment_id) inner join file_types ON (file_types.id = user_files.file_type) Where user_files.id = ". $id)->queryRow();
            if(!isset($userdocs['user_id'])){
                throw new CHttpException(404,'The requested page does not exist.');
            }
            $user_id = $userdocs['user_id'];
            $file = $userdocs['file_path'];
            
            $filearray = explode('.', $file);
            if(strtolower($filearray[count($filearray)-1])=='pdf'){
                $file_type = 'application/pdf';
            }else if(strtolower($filearray[count($filearray)-1])=='png'){
                $file_type = 'image/png';
            }else{
                $file_type = 'image/jpeg';
            }
        }else if($type==3){

            $userdocs = $userack =Yii::app()->db->createCommand("SELECT * FROM user_acknowledge  Where id = ". $id)->queryAll();
            if(!isset($userdocs['user_id'])){
                throw new CHttpException(404,'The requested page does not exist.');
            }
            $user_id = $userdocs['user_id'];
            $file = $userdocs['file_path'];
            
            $filearray = explode('.', $file);
            if(strtolower($filearray[count($filearray)-1])=='pdf'){
                $file_type = 'application/pdf';
            }else if(strtolower($filearray[count($filearray)-1])=='png'){
                $file_type = 'image/png';
            }else{
                $file_type = 'image/jpeg';
            }

        }else{

            $model = MyDocuments::model()->findByPk($id);

            if($model===null)
                throw new CHttpException(404,'The requested page does not exist.');
            $user_id = $model->user_id;
            $file = $model->file_location;
            $file_type = $model->doc_type;

         }

        $user = Users::model()->find(
                        array(
                            'condition' => "id= '".$user_id."' ",
                            )
                    );
        
        if ( isset(Yii::app()->user->org_id) && (Yii::app()->user->role == "companyAdmin" || Yii::app()->user->role == "companyUser") ) {
            //company user or admin
            if ( $user->org_id != Yii::app()->user->org_id ) {
                throw new CHttpException(404,'You are not authorized to download this document.');
            }
        }

        if ( Yii::app()->user->role == "customers" && $user->id != Yii::app()->user->id ) {
            throw new CHttpException(404,'You are not authorized to download this document.');
        }
        

        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
        

        if ( !file_exists($file) ) {
            echo "<script type='text/javascript'>setTimeout('window.close();', 3000);</script>";
            die("The file could not found.");
        }
        
        header("Content-type:".$file_type);
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . basename($file) . "\""); 

        readfile($file);
    }

    public function actionDeleteMyDoc($id,$type) {
        if($type==2||$type==3){
            $url = Yii::app()->createUrl('user/admin/update/id/' . $user->id . "#myDocs");
            $this->redirect($url);
        }
        $model = MyDocuments::model()->findByPk($id);

        if($model===null)
            throw new CHttpException(404,'The requested file does not exist.');

        $user = Users::model()->find(
                        array(
                            'condition' => "id= '".$model->user_id."' ",
                            )
                    );
        
        if ( isset(Yii::app()->user->org_id) && (Yii::app()->user->role == "companyAdmin" || Yii::app()->user->role == "companyUser") ) {
            //company user or admin
            if ( $user->org_id != Yii::app()->user->org_id ) {
                throw new CHttpException(404,'You are not authorized to delete this document.');
            }
        }

        if ( Yii::app()->user->role == "customers" && $user->id != Yii::app()->user->id ) {
            throw new CHttpException(404,'You are not authorized to delete this document.');
        }
        
        $model->delete();

        $url = Yii::app()->createUrl('user/admin/update/id/' . $user->id . "#myDocs");
        $this->redirect($url);
    }

}