<?php

class RegistrationController extends Controller {

    public $defaultAction = 'registerIndividual';
    public $layout = '//layouts/main-userModule';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                ),
            );
    }

      /**
         * Registration user
         */

        public function actionRegisterIndividual(){
            if ( isset(Yii::app()->user->CPIId) ) {
                $this->redirect(Yii::app()->baseUrl."/index.php");
            }
            $model = new RegistrationForm;
            $model_PI = new PersonalInformation;
            $individualplan = Yii::app()->db->createCommand( 'SELECT * FROM individual_plan' )->queryAll();
    //        $profile = new Profile;
    //        $profile->regMode = true;

            // ajax validator
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
                echo UActiveForm::validate(array($model));
                Yii::app()->end();
            }

            if (Yii::app()->user->id) {
                $this->redirect('user/view/id/' . Yii::app()->user->id);
            }else{
                $this->render('/user/individual', array('model' => $model,'individualPlan'=>$individualplan));
            }
        }


        public function actionActivateindv($id) {
            
            $user = User::model()->find('activkey=:data', array(':data'=>$id));
            if(!$user){
                die('Access Denied or Activation key Expired');
            }

            if(isset($_POST['ukey'])){
                $user = User::model()->find('activkey=:data', array(':data'=>$_POST['ukey']));
                $user->password = md5($_POST['User']['password']);
                $user->activkey = '';
                $user->status = 1;
                $user->save(false);
                $this->render('/user/activation_message',array('title'=>Yii::t('user',"User activation"),'content'=>Yii::t('user',"<div style='padding: 20px; text-align: center; font-size: 15px; margin: 50px; line-height:30px;  display:block;' class='label label-success '>Your account is activated.<br />You can sign in with your email address and password.<br />Please {{signin}}</div> ", array('{{signin}}' => CHtml::link(Yii::t('user','SignIn'), Yii::app()->controller->module->loginUrl)))));

            }else{
                $this->render('/user/activate_individuals', array('key' => $id,'model' => $user));
            }

            
        }

        public function actionIndividual() {
            
    
            if ( isset(Yii::app()->user->CPIId) ) {
                $this->redirect(Yii::app()->baseUrl."/index.php");
            }
            $model = new RegistrationForm;
            $model_PI = new PersonalInformation;
    //        $profile = new Profile;
    //        $profile->regMode = true;

            // ajax validator
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
                echo UActiveForm::validate(array($model));
                Yii::app()->end();
            }

            if (Yii::app()->user->id) {
                $this->redirect('user/view/id/' . Yii::app()->user->id);
            } else {
                if (isset($_POST['RegistrationForm'])) {
                    $model->attributes = $_POST['RegistrationForm'];
                    if ($model->validate()) {
                        $soucePassword = $model->password;
                        $model->activkey = UserModule::encrypting(microtime() . $model->password);
                        $model->password = UserModule::encrypting($model->password);
                        $model->verifyPassword = UserModule::encrypting($model->verifyPassword);
                        $model->superuser = 1;
                        
                        $model->mobile = $_POST['RegistrationForm']['mobile'];



                        $model->status = ((Yii::app()->controller->module->activeAfterRegister) ? User::STATUS_ACTIVE : User::STATUS_NOACTIVE);
                        $model->status = 1;
                        if ($model->save()) {
                            //add email to mailchimp
                            $fname = $_POST['RegistrationForm']['first_name'] . " " . $_POST['RegistrationForm']['middle_name'];
                            $lname = $_POST['RegistrationForm']['last_name'];
                            $email = $_POST['RegistrationForm']['email'];
                            $this->addMailchimpSubscriber("individual", $fname, $lname, $email);
                            //add email to mailchimp - END 



                            if ($_POST['RegistrationForm']['accountType']==3) {
                                $model->role_id = 3;
                                $model->save(false);
                            } else {

                                $model->role_id = 2;

                                $model_PI->UserId = $model->id;
                                $model_PI->Name = $fname.' '.$lname;
                                $model_PI->Email = $email;
                                $model_PI->Contact = $_POST['RegistrationForm']['mobile'];
                                $model->save(false);
                                $model_PI->save(false);

                            }


                            if (Yii::app()->controller->module->sendActivationMail) {
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
                                                    <tr> <td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;padding:0 20px" valign="middle">If you need any help in login or have any questions, please email us at <a href="mailto:support@bdtax.com.bd" style="color:#009307" target="_blank">support@bdtax.com.bd</a></td> </tr>
                                                    <tr> <td height="50">&nbsp;</td> </tr>
                                                </tbody> 
                                            </table> </td> </tr> 
                                        </tbody>
                                    </table> <p>&nbsp;</p>
                                </div>
                                ', array('{activation_url}' => $activation_url));

                                $this->sendAuthInformation($fname,$lname,$model->email,$soucePassword);

                                /*UserModule::sendMail($model->email, Yii::t('user',"Welcome to {site_name} - Please Activate Your Account", array('{site_name}' => Yii::app()->name)), $mailBody);*/

                                $CEOMailBody= '
        <div id=":fz" class="a3s" style="overflow: hidden;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
                <tbody> <tr> <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
                        <tbody>
                            <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
                            <tr> <td height="20">&nbsp;</td> </tr> 
                            <tr> 
                                <td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;"> 
    Dear ' . $_POST['RegistrationForm']['first_name'] . ',
    <br /><br />
    <p>
    As the Founder and CEO of <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> I want to be the first to say thank you for registering to the first online tax preparation software in Bangladesh.  <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> is a <i>"Digital Bangladesh Initiative"</i> and our mission is to make Bangladesh a better place through making the tax preparation process very simple and easy for everyone. <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> is the winner of <strong>Bangladesh Startup Award 2017</strong> organized by ICT Ministry and sponsored by UBER and Grameen Phone. We have also become champion in <strong>BASIS ICT National Award 2018</strong> in FinTech category and had the opportunity to represent Bangladesh in <strong>2018 APICTA Award</strong> in Guangzhou, China. 
    </p>

    <p>
    <ul>
        <li>BDTax is <b>EASY</b> - answer simple self-guided questions about your life and work. </li>
        <li>BDTax is <b>ACCURATE</b> - audited and approved by accounting firm  K. M. HASAN & CO. Chartered Accountants. </li>
        <li>BDTax is <b>SECURE</b> - we have implemented bank level security in our system.</li>
    </ul>
    </p>

    <p>
        If you do not mind, I would love to ask you one quick question: <strong>"Why did you sign up for <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a>?"</strong>
    </p>
    <p>
        I am asking because it is very important for us to know what your expectation out of <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> is.  In this way, we can ensure to make the necessary changes or provide support to exceed your expectation. Just “hit reply” and let me know.
    </p>
    <p>
        Thank you again for registering with <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a>. If you have questions or comments please visit our <a href="https://www.facebook.com/groups/bdtax.com.bd/" style="color:#009307" >Facebook</a> user group,<a href="https://twitter.com/bdtaxonline" style="color:#009307" >Twitter</a>, or our website at <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a>.  Also, please feel free to contact me directly at <a href="mailto:zulfikar.ali@bdtax.com.bd" style="color:#009307" target="_top">zulfikar.ali@bdtax.com.bd</a> with any questions.

    </p>

    <table>
        <tr>
            <td width="180">
                <p>
                <br /><br />
                Sincerely,
                <br />
                Zulfikar Ali
                <br />
                Founder and CEO
                <br />
                <a href="https://bdtax.com.bd/" style="color:#009307" target="_blank">BDTax</a>
                </p>
            </td>
            <td width="180">
                <img src="https://bdtax.com.bd/img/Champion_final3.png" height="130" alt=""/>
            </td>
            <td width="180">
                <img src="https://bdtax.com.bd/img/start_award_logo.png" height="130" alt=""/>
            </td>
        </tr>
    </table>
                                </td> 
                            </tr> 
                            
                            
                            
                                
                            </tbody> 
                        </table> </td> </tr> 
                    </tbody>
                </table> 
            </div>
        ';

                                UserModule::sendCEOMail($model->email, "Thank You For Registering With bdtax.com.bd", $CEOMailBody);
                            }


                            /* Auto redirect after registration */
                            $identity = new UserIdentity($email, $soucePassword);
                            $identity->authenticate();
                            Yii::app()->user->login($identity, 0);
                            $this->redirect(Yii::app()->request->baseUrl.'/index.php/dashboard');
                            /* auto redirect */

                            if ((Yii::app()->controller->module->loginNotActiv || (Yii::app()->controller->module->activeAfterRegister && Yii::app()->controller->module->sendActivationMail == false)) && Yii::app()->controller->module->autoLogin) {
                                $identity = new UserIdentity($model->username, $soucePassword);
                                $identity->authenticate();
                                Yii::app()->user->login($identity, 0);
                                $this->redirect(Yii::app()->controller->module->returnUrl);
                            } else {
                                if (!Yii::app()->controller->module->activeAfterRegister && !Yii::app()->controller->module->sendActivationMail) {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Contact Admin to activate your account."));
                                } elseif (Yii::app()->controller->module->activeAfterRegister && Yii::app()->controller->module->sendActivationMail == false) {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Please {{login}}.", array('{{login}}' => CHtml::link(Yii::t('user','Login'), Yii::app()->controller->module->loginUrl))));
                                } elseif (Yii::app()->controller->module->loginNotActiv) {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Please check your email or login.") . "<br>" . Yii::t('user',"If you do not receive the email in your inbox, please check your spam folder.") );
                                } else {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Please check your email.") . "<br>" . Yii::t('user',"If you do not receive the email in your inbox, please check your spam folder.") );
                                }
                                $this->refresh();
                            }
                        }
                    }
                }

                $useragent=$_SERVER['HTTP_USER_AGENT'];
                if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

                { 
                    $this->layout='//layouts/main_mobile';
                    //$this->renderPartial('index');
                    $this->render('/user/registration_individuals_mobile', array('model' => $model));
                }else{

                $this->render('/user/registration_individuals', array('model' => $model));
                }
            }
        }



         public function actionRegisterCompany(){
            if ( isset(Yii::app()->user->CPIId) ) {
                $this->redirect(Yii::app()->baseUrl."/index.php");
            }
            $model = new RegistrationForm;
            $model_PI = new PersonalInformation;
    //        $profile = new Profile;
    //        $profile->regMode = true;

            // ajax validator
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
                echo UActiveForm::validate(array($model));
                Yii::app()->end();
            }

            if (Yii::app()->user->id) {
                $this->redirect('user/view/id/' . Yii::app()->user->id);
            } else {
                $this->render('/user/company', array('model' => $model));
            }
        }

        public function actionCompany() {
            if ( isset(Yii::app()->user->CPIId) ) {
                $this->redirect(Yii::app()->baseUrl."/index.php");
            }
            $model = new RegistrationForm;
            $model_PI = new PersonalInformation;
    //        $profile = new Profile;
    //        $profile->regMode = true;

            // ajax validator
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
                echo UActiveForm::validate(array($model));
                Yii::app()->end();
            }

            if (Yii::app()->user->id) {
                $this->redirect('user/view/id/' . Yii::app()->user->id);
            } else {
                if (isset($_POST['RegistrationForm'])) {
                    $model->attributes = $_POST['RegistrationForm'];
                    if ($model->validate()) {
                        $soucePassword = $model->password;
                        $model->activkey = UserModule::encrypting(microtime() . $model->password);
                        $model->password = UserModule::encrypting($model->password);
                        $model->verifyPassword = UserModule::encrypting($model->verifyPassword);
                        $model->superuser = 1;
                        $model->mobile = $_POST['RegistrationForm']['mobile'];



                        $model->status = ((Yii::app()->controller->module->activeAfterRegister) ? User::STATUS_ACTIVE : User::STATUS_NOACTIVE);

                        if ($model->save()) {

                            //add email to mailchimp
                            $fname = $_POST['RegistrationForm']['first_name'] . " " . $_POST['RegistrationForm']['middle_name'];
                            $lname = $_POST['RegistrationForm']['last_name'];
                            $email = $_POST['RegistrationForm']['email'];
                            $this->addMailchimpSubscriber("company", $fname, $lname, $email);
                            //add email to mailchimp - END 

                            if ($_POST['RegistrationForm']['accountType']==3) {
                                $model->role_id = 3;
                                $model->save(false);
                            } else {

                                $model->role_id = 2;

                                $model_PI->UserId = $model->id;
                                $model->save(false);
                                $model_PI->save(false);
                            }


                            if (Yii::app()->controller->module->sendActivationMail) {
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

                                $CEOMailBody= '
        <div id=":fz" class="a3s" style="overflow: hidden;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
                <tbody> <tr> <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
                        <tbody>
                            <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
                            <tr> <td height="20">&nbsp;</td> </tr> 
                            <tr> 
                                <td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;"> 
    Dear ' . $_POST['RegistrationForm']['first_name'] . ',
    <br /><br />
    <p>
    As the Founder and CEO of <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> I want to be the first to say thank you for registering to the first online tax preparation software in Bangladesh.  <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> is a <i>"<i>"Digital Bangladesh Initiative"</i>"</i> and our mission is to make Bangladesh a better place through making the tax preparation process very simple and easy for everyone. <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> is the winner of <strong>Bangladesh Startup Award 2017</strong> organized by ICT Ministry and sponsored by UBER and Grameen Phone. We have also become champion in <strong>BASIS ICT National Award 2018</strong> in FinTech category and had the opportunity to represent Bangladesh in <strong>2018 APICTA Award</strong> in Guangzhou, China. 
    </p>

    <p>
    <ul>
        <li>BDTax is <b>EASY</b> - answer simple self-guided questions about your life and work. </li>
        <li>BDTax is <b>ACCURATE</b> - audited and approved by accounting firm M L H Chowdhury & Co. </li>
        <li>BDTax is <b>SECURE</b> - we have implemented bank level security in our system.</li>
    </ul>
    </p>

    <p>
        If you do not mind, I would love to ask you one quick question: <strong>"Why did you sign up for <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a>?"</strong>

    </p>
    <p>
        I am asking because it is very important for us to know what your expectation out of <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a> is.  In this way, we can ensure to make the necessary changes or provide support to exceed your expectation. Just “hit reply” and let me know.
    </p>
    <p>
        Thank you again for registering with <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a>. If you have questions or comments please visit our <a href="https://www.facebook.com/groups/bdtax.com.bd/" style="color:#009307" >Facebook</a> user group,<a href="https://twitter.com/bdtaxonline" style="color:#009307" >Twitter</a>, or our website at <a href="https://bdtax.com.bd/" style="color:#009307">BDTax.com.bd</a>.  Also, please feel free to contact me directly at <a href="mailto:zulfikar.ali@bdtax.com.bd" style="color:#009307" target="_top">zulfikar.ali@bdtax.com.bd</a> with any questions.
    </p>
    <table>
        <tr>
            <td width="180">
                <p>
                <br /><br />
                Sincerely,
                <br />
                Zulfikar Ali
                <br />
                Founder and CEO
                <br />
                <a href="https://bdtax.com.bd/" style="color:#009307" target="_blank">BDTax</a>
                </p>
            </td>
            <td width="180">
                <img src="https://bdtax.com.bd/img/Champion_final3.png" height="130" alt=""/>
            </td>
            <td width="180">
                <img src="https://bdtax.com.bd/img/start_award_logo.png" height="130" alt=""/>
            </td>
        </tr>
    </table>
    

                                </td> 
                            </tr> 
                            
                            
                            
                                
                            </tbody> 
                        </table> </td> </tr> 
                    </tbody>
                </table> 
            </div>
        ';

                                UserModule::sendCEOMail($model->email, "Thank You For Registering With bdtax.com.bd", $CEOMailBody);
                            }

                            if ((Yii::app()->controller->module->loginNotActiv || (Yii::app()->controller->module->activeAfterRegister && Yii::app()->controller->module->sendActivationMail == false)) && Yii::app()->controller->module->autoLogin) {
                                $identity = new UserIdentity($model->username, $soucePassword);
                                $identity->authenticate();
                                Yii::app()->user->login($identity, 0);
                                $this->redirect(Yii::app()->controller->module->returnUrl);
                            } else {
                                if (!Yii::app()->controller->module->activeAfterRegister && !Yii::app()->controller->module->sendActivationMail) {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Contact Admin to activate your account."));
                                } elseif (Yii::app()->controller->module->activeAfterRegister && Yii::app()->controller->module->sendActivationMail == false) {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Please {{login}}.", array('{{login}}' => CHtml::link(Yii::t('user','Login'), Yii::app()->controller->module->loginUrl))));
                                } elseif (Yii::app()->controller->module->loginNotActiv) {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Please check your email or login.") . "<br>" . Yii::t('user',"If you do not receive the email in your inbox, please check your spam folder.") );
                                } else {
                                    Yii::app()->user->setFlash('registration', Yii::t('user',"Thank you for your registration. Please check your email.") . "<br>" . Yii::t('user',"If you do not receive the email in your inbox, please check your spam folder.") );
                                }
                                $this->refresh();
                            }
                        }
                    }
                }
                $this->render('/user/registration_company', array('model' => $model));
            }
        }


        public function sendAuthInformation($fname,$lname,$email,$password){
            $pass = $this->formatthePassword($password);
            $mailBody = '<div id=":fz" class="a3s" style="overflow: hidden;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
                <tbody> <tr> <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" style="max-width:600px;width:100%;"> 
                        <tbody>
                            <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
                            <tr> <td height="20">&nbsp;</td> </tr> 
                            <tr> 
                                <td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;"> 
    Dear '.$fname.' '.$lname.',
    <br /><br />
    <div>
    <p>Please find your login information for future reference below:</p>
    <p><strong>User Name/Email Address:</strong> '.$email.'</p>
    <p><strong>Password:</strong> '.$pass.'</p>
    <p>Please go to : <a href="https://bdtax.com.bd/" style="color:#009307" target="_blank">www.bdtax.com.bd</a> to log in to our system.</p>
   
    </div>

    <h4>Thanks for choosing BDTax</h4>
    <h4>If you have any questions please email us at support@bdtax.com.bd</h4>

    <table>
        <tr>
            <td width="180">
                <p>
                <br /><br />
                Sincerely,
                <br />
                Support Team
                <br />
                Mobile: 01723808019
                <br />
                <a href="https://bdtax.com.bd/" style="color:#009307" target="_blank">www.bdtax.com.bd</a>
                </p>
            </td>
            <td width="180">
                <img src="https://bdtax.com.bd/img/Champion_final3.png" height="130" alt=""/>
            </td>
            <td width="180">
                <img src="https://bdtax.com.bd/img/start_award_logo.png" height="130" alt=""/>
            </td>
        </tr>
    </table>
                                </td> 
                            </tr> 
                            
                            
                            
                                
                            </tbody> 
                        </table> </td> </tr> 
                    </tbody>
                </table> 
            </div>';

            UserModule::sendMail($email, "Your BDTax login credential", $mailBody);
        }


    function formatthePassword($str) {
    $len = strlen($str);

    return substr($str, 0, 1).str_repeat('*', $len - 2).substr($str, $len - 1, 1);
    }





}