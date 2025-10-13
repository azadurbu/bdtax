<?php
class ChatHandler extends YiiChatDbHandlerBase {
    //
    // IMPORTANT:
    // in any time here you can use this available methods:
    //  getData(), getIdentity(), getChatId()
    //
    protected function getDb(){
        // the application database
        return Yii::app()->db;
    }
    protected function createPostUniqueId(){
        // generates a unique id. 40 char.
        return hash('sha1',$this->getChatId().time().rand(1000,9999));      
    }
    /*protected function getIdentityName(){
        // find the identity name here
        // example: 
        if (Yii::app()->user->role == "companyAdmin") {
            $org = Organizations::model()->findByPk(Yii::app()->user->org_id);
            return $org->organization_name;
        }
        if (isset(Yii::app()->user->org_id) && Yii::app()->user->role == "customers") {
            $user = Users::model()->findByPk(Yii::app()->user->id);
            return $user->first_name . " " . $user->last_name;
        }
        
        //  return $model->userFullName();
        return "jhonn doe"; 
    }*/
    protected function getIdentityName(){
        // find the identity name here
        // example: 
        $model = Users::model()->findByPk($this->getIdentity());
        return $model->userFullName();
        //return "jhonn doe"; 
    }
    protected function getDateFormatted($value){
        // format the date numeric $value
        return Yii::app()->format->formatDateTime($value);
    }
    protected function acceptMessage($message){
        // return false to reject it, elsewere return $message
        return $message;
    }
}
?>