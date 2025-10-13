<?php

class VoucherController extends Controller
{

	public $layout='//layouts/columnLess';
	public $defaultAction = 'index';

	
	
	public function filters()
	{
		return array('accessControl',); // perform access control for CRUD operations
	}

	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('redeem'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="customers" || Yii::app()->user->role==="companyAdmin" || Yii::app()->user->role==="companyUser")',
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),

			);
	}



	public function actionRedeem()
	{
		$this->layout='//layouts/empty';

		if ( isset($_POST['code']) && $_POST['code'] != "" ) {

/* ##################### VALIDATE PREVIOUS ACTIVE VOUCHER	##################### */		
			if ( Yii::app()->user->role === "customers" ) {
				$v = Vouchers::model()->count(
						array(
							'condition' => "user_id='".Yii::app()->user->id."' AND is_used='No' ", 
							'order' => 'created_at DESC'
							)
					);
			}
			else if ( Yii::app()->user->role === "companyAdmin" || Yii::app()->user->role === "companyUser") {
				$v = Vouchers::model()->count(
						array(
							'condition' => "org_id='".$_POST['id']."' AND is_used='No' ", 
							'order' => 'created_at DESC'
							)
					);
			}
			
			if ($v > 0) {
				die(json_encode([
							"status" => "failed", 
							"msg" => "You already have an active gift voucher. You can not use multiple gift voucher at a time." 
							]) 
				);
			}
/* ##################### END OF VALIDATE PREVIOUS ACTIVE VOUCHER ##################### */			
/* ##################### VALIDATE VOUCHER	##################### */
			$validate = $this->_sendCURLRequest($_POST['code'], "validate");
			if ($validate['valid'] == false) {
				die(json_encode([
								"status" => "failed", 
								"msg" => $validate['reason'] 
								]) 
					);
			}
			else {
				//IN FUTURE PUT METADATA VALIDATION
			}
/* ##################### END OF VALIDATE VOUCHER	##################### */
			
			$response = $this->_sendCURLRequest($_POST['code'], "redemption");

			if ( isset($response['code']) ) {
				die(json_encode([
								"status" => "failed", 
								"msg" => $response['message'] 
								]) 
					);
			}
			else if ( isset($response['result']) && $response['result'] != "SUCCESS" ) {
				die(json_encode([
								"status" => "failed", 
								"msg" => $response['message'] 
								]) 
					);
			}

			$successMsg = "Your voucher code has been redeemed successfully. "; 

			$vouchers = new Vouchers;
			
			$vouchers->voucher_code = $response['voucher']['code'];
			$vouchers->discount_type = $response['voucher']['discount']['type'];
			$vouchers->response_data = json_encode($response);
			$vouchers->is_used = "No";
			$vouchers->created_at = date("Y-m-d H:i:s");
			$vouchers->updated_at = date("Y-m-d H:i:s");

			if ($response['voucher']['discount']['type'] == "PERCENT") {
				$vouchers->discount_value = $response['voucher']['discount']['percent_off'];
				$successMsg .= "You will get " . $response['voucher']['discount']['percent_off'] . "% off in your next payment.";
			}
			else if ($response['voucher']['discount']['type'] == "AMOUNT") {
				$vouchers->discount_value = $response['voucher']['discount']['amount_off'] / 100;
				$successMsg .= "You will get " . $vouchers->discount_value . " Tk. off in your next payment.";
			}
			else {
				die(json_encode([
								"status" => "failed", 
								"msg" => "Wrong discount type: " . $response['voucher']['discount']['type'] 
								]) 
					);
			}

			if ( Yii::app()->user->role === "customers" ) {
				$vouchers->user_id = Yii::app()->user->id;
				$vouchers->save(false);

				die(json_encode([
								"status" => "success", 
								"msg" => $successMsg 
								]) 
					);
			}
			else if ( Yii::app()->user->role === "companyAdmin" || Yii::app()->user->role === "companyUser") {
				$vouchers->org_id = $_POST['id'];
				$vouchers->save(false);

				die(json_encode([
								"status" => "success", 
								"msg" => $successMsg 
								]) 
					);
			}
		}
		else {
			echo json_encode(["status" => "failed", "msg" => "Voucher code is required."]);
		}
	}

	public function _sendCURLRequest($code, $task) {

		if ($task == "validate") {
			$url = Yii::app()->params['voucherifyURL'] . "vouchers/" . $code . "/validate";
		}
		else if ($task == "redemption") {
			$url = Yii::app()->params['voucherifyURL'] . "vouchers/" . $code . "/redemption";
		}

		$curl = curl_init($url);

        curl_setopt($curl, CURLOPT_POST, 1 );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, 
					        [
					            "X-App-Id: " . Yii::app()->params['AppId'], 
					            "X-App-Token: " . Yii::app()->params['AppToken'], 
					            "Content-type: application/json"
					        ]);

		
		if(Yii::app()->params['verifySSL'] == false) {
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		} else {
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);		
		}
		

        $response = curl_exec($curl );

        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if($code == 200 && !( curl_errno($curl))) {
            curl_close( $curl);
            return json_decode($response, true);

        } else {
            curl_close( $curl);
            return json_decode($response, true);
        }
	}

	

}
