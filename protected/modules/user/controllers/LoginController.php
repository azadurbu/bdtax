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

                    // var_dump(Yii::app()->user->id);die;

                    $userlog=new UserActivityLog;
                    $userlog->name=Yii::app()->user->first_name;
                    $userlog->email=Yii::app()->user->email;
                    $userlog->ip_address=$this->get_client_ip();
                    $userlog->activity_type='Login';
                    $userlog->activity_time=date('Y-m-d H:i:s');
                    $userlog->user_id=Yii::app()->user->id;
                    $userlog->CPIId=(is_numeric(Yii::app()->user->CPIId))?Yii::app()->user->CPIId:'';
                    $userlog->save();

                    if (Yii::app()->user->role == 'superAdmin')  {
                        $this->redirect($this->createUrl('../user/admin'));
                    }  else if(Yii::app()->user->role == 'customers') {
                        //$this->redirect($this->createUrl('../dashboard'));


                        $pinfo_data=PersonalInformation::model()->find('UserId=:data',  array('data' => $user_id) );
                        $taxYear = $this->taxYear();
                        $userSelection =$this->userFromSelection($user_id,$taxYear);
                        //print_r($userSelection);
                       // die();

                        $plan = $this->userCurrentPlan();
                            if(isset($plan->plan_id) &&($plan->plan_id==10||$plan->plan_id==11||$plan->plan_id==12)){
                                $this->redirect($this->createUrl('../userFile'));
                            }
                        
                        if($userSelection){
                            if(isset($userSelection->type) && $userSelection->type==1){
                                $this->lastViset();
                                $this->redirect($this->createUrl('../singlepage/profile'));
                            }
                            
                        }else{


                            //die('Selcted for onepgae 10');

                            $this->lastViset();
                            $this->redirect($this->createUrl('../dashboard/userselection'));

                        }

                        

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


                        //$this->redirect( $this->createUrl('../customers/admin') );
                        $this->redirect( $this->createUrl('../customers/dashboard') );

                    }

                //$this->redirect(Yii::app()->user->returnUrl);

                } else if(Yii::app()->user->role == 'companyUser') {

                   //$this->redirect( $this->createUrl('../customers/admin') );
                   $this->redirect( $this->createUrl('../customers/dashboard') );
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