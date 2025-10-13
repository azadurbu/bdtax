<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				),
			'yiichat'=>array('class'=>'YiiChatAction'),
			);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		if (Yii::app()->user->name == 'Guest'){
			
			
		           
			$this->render('index');
		       

		} else {
			$this->redirect($this->createUrl('dashboard/'));

		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
				"Reply-To: {$model->email}\r\n".
				"Cc: {$model->email}" . "\r\n".
				"MIME-Version: 1.0" . "\r\n".
				"Content-type:text/html;charset=UTF-8" . "\r\n";


				$mailBody= Yii::t('user','
	                <div id=":fz" class="a3s" style="overflow: hidden;">
	                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
	                        <tbody> <tr> <td>
	                           <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
	                            <tbody>
	                               <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
	                               <tr> <td height="40">&nbsp;</td> </tr> 
	                               <tr> <td style="padding-left: 15px;"> <p>Dear BDTax,</p> </td> </tr> 
	                               <tr> <td>&nbsp;</td> </tr>
	                               <tr> <td style="padding-left: 15px;">'.$model->body.'</td> </tr> 
	                               <tr> <td>&nbsp;</td> </tr>
	                             	<tr> <td style="padding-left: 15px;"><p>Sincerely</p><p>'.$model->name.'</p</td></tr> 
                                    <tr> <td height="50">&nbsp;</td> </tr>
	                            </tbody> 
	                        </table> </td> </tr> 
	                    </tbody>
	                </table> <p>&nbsp;</p>
	            </div>
	            ');
				

				mail(Yii::app()->params['contactEmail'],$subject,$mailBody, $headers);
				// mail(Yii::app()->params['adminEmail'],$subject,"Dear BDTAX , \r\n\r\n".$model->body."\r\n\r\nSincerely\r\n".$model->name, $headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the contact page
	 */
	public function actionCompactContact()
	{
		$model=new CompactContactForm;
		if(isset($_POST['CompactContactForm']))
		{
			$model->attributes=$_POST['CompactContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->name).'?=';

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
				$headers .= "From: $name <{$model->email}>" . "\r\n";
				$headers .= "Cc: {$model->email}" . "\r\n";


				// $toMail='info@evidencebasedreform.com';
    			$toMail = Yii::app()->params['contactEmail'];
				//$fromMail='sazedul.haque@nochallenge.net';

				$mailBody= Yii::t('user','
	                <div id=":fz" class="a3s" style="overflow: hidden;">
	                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
	                        <tbody> <tr> <td>
	                           <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
	                            <tbody>
	                               <tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
	                               <tr> <td height="40">&nbsp;</td> </tr> 
	                               <tr> <td style="padding-left: 15px;"> <p>Dear BDTax,</p> </td> </tr> 
	                               <tr> <td>&nbsp;</td> </tr>
	                               <tr> <td style="padding-left: 15px;">'.$model->body.'</td> </tr> 
	                               <tr> <td>&nbsp;</td> </tr>
	                             	<tr> <td style="padding-left: 15px;"><p>Sincerely</p><p>'.$model->name.'</p</td></tr> 
                                    <tr> <td height="50">&nbsp;</td> </tr>
	                            </tbody> 
	                        </table> </td> </tr> 
	                    </tbody>
	                </table> <p>&nbsp;</p>
	            </div>
	            ');

				//mail($toMail,'BDTAX- Email from '.$subject,$mailBody,$headers);
				// mail($toMail,'BDTAX- Email from '.$subject,"Dear BDTAX , \n".$model->body,$headers);
				Yii::app()->user->setFlash('contact',Yii::t('dashboard', 'Thank you for contacting us. We will respond to you as soon as possible.'));
				//$this->refresh();
			}

		}

		$this->redirect(Yii::app()->user->returnUrl);        


		// $this->render('index',array('model'=>$model));
	}	

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionUpload(){
		$model = new ShopSlider();
		$model->id = 1;
		$model->name = 'Nava image';
		$model->image_url = Yii::app()->baseUrl.'/uploads/noimage.jpg';
		if(isset($_POST)){
			$img = $_POST['image'];
			if($img != '/uploads/noimage.jpg' && $img != $model->image_url){
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$file = '/uploads/'.$model->id.'.jpg';
				$model->image_url = Yii::app()->request->hostInfo.'/'.Yii::app()->baseUrl.$file;
				file_put_contents(Yii::getPathOfAlias('webroot').$file, $data);
			}
		}
	}
}