<?php

class LoginController extends Controller {

    public $defaultAction = 'login';
    public $layout = '//layouts/main-userModule';

    /**
     * Displays the login page
     */
    public function actionLogin() {
        if (Yii::app()->user->isGuest) {
            $model = new UserLogin;
            // collect user input data
            if (isset($_POST['UserLogin'])) {
                $u_post = $_POST['UserLogin'];

                $model->attributes = $_POST['UserLogin'];
                $p = $_POST['UserLogin'];
                // validate user input and redirect to previous page if valid
                if ($model->validate()) {
                    $this->lastViset();

                    $user_id=Yii::app()->user->id;

                    if (Yii::app()->user->role == 'superAdmin')  {
                        $this->redirect($this->createUrl('../dashboard'));
                    }  else if(Yii::app()->user->role == 'customers') {
                        //$this->redirect($this->createUrl('../dashboard'));

                   
                        $pinfo_data=PersonalInformation::model()->find('UserId=:data',  array('data' => $user_id) );



                        if (!isset($pinfo_data->ETIN) || $pinfo_data->ETIN==0) {
                            $this->lastViset();
                            $this->redirect($this->createUrl('../personalInformation/entry#etin'));
                        } else {
                            $this->lastViset();
                            $this->redirect($this->createUrl('../dashboard/index'));
                        }

                    } else if(Yii::app()->user->role == 'companyAdmin') {

                         if (empty(Yii::app()->user->org_id) || (Yii::app()->user->org_id == 0)) {

                        $this->redirect($this->createUrl('../organizations/create'));

                    } else {


                        $this->redirect( $this->createUrl('../customers/admin') );

                    }

                //$this->redirect(Yii::app()->user->returnUrl);

                    }

//------------------WRONG--Password----check----Section-----------------------------------------

                } 
            }

            $this->render('/user/login', array('model' => $model,));
        } else
        //$this->redirect('user/view/id/'.Yii::app()->user->id);
        $this->redirect(Yii::app()->user->returnUrl);
    }

 
   private function lastViset() {
        $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
        if ($lastVisit!=null) {
           
        $lastVisit->lastvisit = time();
        $lastVisit->save();
        }


    }



}

?>