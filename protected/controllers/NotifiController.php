<?php

class NotifiController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/columnLess';
	
	
	


	public function filters()
	{
		return array('accessControl',); // perform access control for CRUD operations

	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	
  
		
	function actionsendnotificationall(){

		 

        $users = User::model()->findAll(
                    array(
                        'condition' => "uploaded_bycompany=1 AND notification_status=0 AND status=0", 
                        'order' => 'id DESC',
                        'limit' => 30,
                    )
                );
        foreach ($users as $user) {
			//try {

				$this->emailNotifications($user->id);
				 

	       
			/*}catch(Exception $e) {
				try{
    				$filename = "log-" . date("Y.m.d") . ".txt";
	    			$content = 'User id: '.$user->id.'Message: ' .$e->getMessage().'-----';
	    			$handle = @fopen("protected/runtime/Notification/" . $filename, "a+");
	    			@fwrite($handle, $content);
	    			@fclose($handle);
	    			return true;
	    		} catch ( Exception $e ) {
	      			return false;
	    		}
  				//echo 'Message: ' .$e->getMessage();
			}*/
        	//try
            //echo $user->id.'-'.$user->email;
            //echo '<br/>';
        }
    }



	
}
