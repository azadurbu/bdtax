<?php
/**
 * class FacebookController
 * @author Igor Ivanović
 * Used to controll facebook login system 
 */
class FacebookController extends Controller
{

    public $hash='md5';

    /**
     * This method authenticate logged in facebook user 
     * @param type $id string(int)
     * @param type $name string
     * @param type $surname string
     * @param type $username string
     * @param type $email string
     * @param type $session string
     */
    public function actionLogin( $id = null , $name = null , $surname = null, $username = null, $email = null, $session = null )
    {
        if( !Yii::app()->request->isAjaxRequest )
        {
            echo json_encode(array('error'=>'this is not ajax request'));
            die();
        } 
        else 
        {
            if( empty($email) )
            {
                echo json_encode(array('error'=>'email is not provided'));
                die();
            }

            if( $session == Yii::app()->session->sessionID )
            {

                $user = User::prepareUserForAuthorisation( $email );
                

                if( $user === null ) 
                {

                    $generated_password = $this->generatePassword(8);


                    $user                   = new User();
                    $user->email           = $email;    
                    $user->first_name       = $name;
                    $user->last_name        = $surname;
                    $user->status         = 1;
                    $user->role_id         = 2;
                    // $user->password = Yii::app()->getModule('user')->encrypting($generated_password);
                    $user->password = $generated_password;
                    $user->facebook_account   = 1;
                    $user->activkey   = $id;
                    $user->save(false);


                }
                

                $identity = new UserIdentity( $user->email , $user->password );
                $identity->FBAuthenticate();

                if( (Yii::app()->user->role=='companyAdmin') || (Yii::app()->user->role=='companyUser') )
                {
                    echo json_encode(array('error'=>'The email you are trying to login with is registered as an organizational user in bdtax.com.bd. Currently we ONLY allow individual users to login through Facebook.'));
                    die();
                }
/*
                    echo "<pre>";
                    print_r($identity);
                    print_r($user->password);
                    print_r($this->encrypting($user->password));
                    echo "</pre>";
                    echo 'success';
                    die();*/

                    if($identity->errorCode === UserIdentity::ERROR_NONE) 
                    {

                        Yii::app()->user->setState('FBSession', $session);


                        $pinfo_data=PersonalInformation::model()->find('UserId=:data',  array('data' => Yii::app()->user->id) );



                        if (!isset($pinfo_data->ETIN) || $pinfo_data->ETIN==0) {
                            $this->lastViset();
                            $redirect=$this->createUrl('personalInformation/entry#etin');
                        } else {
                            $this->lastViset();
                            $redirect=$this->createUrl('dashboard/index');
                        }

                        Yii::app()->user->login($identity, NULL);
                        echo json_encode( array( 'error'=>0, 'redirect'=> $redirect ) );
                    } 
                    else 
                    {
                       // echo json_encode(array('error'=>'user not logged in'));
                        echo json_encode(array('error'=>$identity->errorCode));

                        die();
                    }
                }
                else
                {
                    echo json_encode(array('error'=>'session id is not the same'));
                    die();
                }
            }
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

        function encrypting($string="") {
            $hash = Yii::app()->getModule('user')->hash;
            if ($hash=="md5")
                return md5($string);
            if ($hash=="sha1")
                return sha1($string);
            else
                return hash($hash,$string);
        }



        private function lastViset() {
            $lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
            if ($lastVisit!=null) {

                $lastVisit->lastvisit = time();
                $lastVisit->save();
            }


        }





    }