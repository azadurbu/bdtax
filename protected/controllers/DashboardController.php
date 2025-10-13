<?php

class DashboardController extends Controller {

	public $layout = '//layouts/columnLess';

	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules() {
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('index', 'taxGrid', 'changeTaxYear','userselection','saveUserSelection','saveSpecialSelection'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyAdmin")||(Yii::app()->user->role==="companyUser")',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('RemoveOldMessage'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyAdmin")||(Yii::app()->user->role==="companyUser")',
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionuserselection(){

		$this->render('userSelection');
	}
	public function actionsaveUserSelection(){
		try {
	        $identity = Yii::app()->user->id;
	        $type = $_POST['type'];
	        $taxyear = $this->taxYear();

	        $model=UserFromSelection::model()->find('user_id=:data AND tax_year=:data2',array(':data'=>$identity, ':data2'=>$this->taxYear()) );

	        if($model){

	        	$model->type = $type;
		        $model->save();

	        }else{
		        $UFS =new UserFromSelection;
		        $UFS->tax_year = $taxyear;
		        $UFS->user_id = $identity;
		        $UFS->type = $type;
		        $UFS->save();
	        }
	        $data['status'] = "1";
	        $data['type'] = $type;
	        echo json_encode($data);
        }catch(Exception $e) {
  			$data['status'] = "0";
  			echo json_encode($data);
		}
		
	}

	public function actionIndex() {

		

		$role = Yii::app()->user->role;

		$CPIId = Yii::app()->user->CPIId;

		if ($CPIId == 'companyAdmin') {
			$this->redirect(array('customers/admin'));

		} else if ($CPIId == 'superAdmin') {
			$this->redirect(array('user/admin'));

		} else {

			$fromSelection = $this->userFromSelection(Yii::app()->user->id,$this->taxYear());
			if ($this->personalInformationStatusBar() >= 93 ||(isset($fromSelection->type) && $fromSelection->type==1 && $this->personalInformationStatusBar() >= 85)) {
				//93% is to continue without ETIN

				$LinkHistory = LinkHistory::model()->find('user_id=:data', array(':data' => Yii::app()->user->id));

				if (Yii::app()->user->need_redirect == 1 && $LinkHistory != null && $role != 'companyAdmin' && $role != 'companyUser') {
					$present_link = $LinkHistory->present_link;
					$d = explode('/',  $present_link);
					if( in_array('income', $d)){
						$haveLastYearData = Income::model()->count('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->lastTaxYear() ));
						if($haveLastYearData > 0){
							$LinkHistory_present_link = $d[0].'/'.$d['1'].'/'.$d['2'].'/startup';
						}else{
							$LinkHistory_present_link = $LinkHistory->present_link;
						}
					}elseif( in_array('assets', $d) ){
						$haveLastYearDatas = Assets::model()->findAll('CPIId="'.Yii::app()->user->CPIId.'" and EntryYear="'.$this->lastTaxYear().'" order by AssetsId DESC');
						if(isset($haveLastYearDatas)){
							$LinkHistory_present_link = $d[0].'/'.$d['1'].'/'.$d['2'].'/startup';
						}else{
							$LinkHistory_present_link = $LinkHistory->present_link;
						}
					}elseif( in_array('liabilities', $d)){
						$haveLastYearDatas = Liabilities::model()->findAll('CPIId="'.Yii::app()->user->CPIId.'" and EntryYear="'.$this->lastTaxYear().'" order by LiabilityId DESC');
						if(isset($haveLastYearDatas)){
							$LinkHistory_present_link = $d[0].'/'.$d['1'].'/'.$d['2'].'/startup';
						}else{
							$LinkHistory_present_link = $LinkHistory->present_link;
						}
					}elseif( in_array('expenditure', $d)){
						$haveLastYearData = Expenditure::model()->count('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->lastTaxYear() ));
						if($haveLastYearData > 0){
							$LinkHistory_present_link = $d[0].'/'.$d['1'].'/'.$d['2'].'/startup';
						}else{
							$LinkHistory_present_link = $LinkHistory->present_link;
						}
					}else{
						$LinkHistory_present_link = $LinkHistory->present_link;
					}
					Yii::app()->user->setState('need_redirect', 0);
					$this->render('continue', array('role' => $role, 'present_link' => $LinkHistory_present_link));
				} else {
					$this->render('index', array('role' => $role));
				}

			} else {
				if(isset($fromSelection->type) && $fromSelection->type==1 ){
					$this->redirect(array('../index.php/singlepage/profile'));
				}
				$this->redirect(array('../index.php/personalInformation'));
			}
		} //if not superAdmin
	}
	protected function lastTaxYear() {

		$currentMonth = date('m');
	
		$startMonth = 7;
		$taxYear = '';
		$presentYear = date("Y",strtotime('last year'));
	
		$lastYear = ($presentYear - 1);
		$nextYear = ($presentYear + 1);
	
		if ($currentMonth < $startMonth) {
	
			$taxYear = $lastYear . "-" . $presentYear;
	
		} else {
			$taxYear = $presentYear . "-" . $nextYear;
		}
	
		return $taxYear;
	}

	public function actionTaxGrid() {
		$role = Yii::app()->user->role;

		$this->render('taxGrid', array('role' => $role));

	}

	public function actionChangeTaxYear() {
		Yii::app()->user->setState('TAX_YEAR', $_POST['tax_year']);
		return true;
	}

	public function actionRemoveOldMessage() {
		if ( isset(Yii::app()->user->role) && Yii::app()->user->role != "superAdmin" && isset(Yii::app()->user->org_id) ) {

	    	$pi = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
	    		
	    	$chat_id = $pi->UserId;
	    	$identity = Yii::app()->user->id;

	    	/*$query = "DELETE FROM `yiichat_post` WHERE `chat_id`=:chat_id AND (`post_identity`=:identity1 OR `post_identity`=:identity2)  ";
			$command = Yii::app()->db->createCommand($query);
			$command->execute([':chat_id'=>$pi->UserId, ':identity1'=>$identity, ':identity2'=>$pi->UserId]);*/

			$query = "DELETE FROM `yiichat_post` WHERE `chat_id`=:chat_id";
			$command = Yii::app()->db->createCommand($query);
			$command->execute([':chat_id'=>$pi->UserId]);


	    	if (Yii::app()->user->role == "companyAdmin" && Yii::app()->user->CPIId != "companyAdmin") {


	    	}

	    

	    	if (Yii::app()->user->role == "customers" && isset(Yii::app()->user->org_id)) {

	    	}
		}
	}

	function actionsaveSpecialSelection(){
		try {
	        $identity = Yii::app()->user->id;
	        $type = $_POST['type'];
	        $taxyear = $this->taxYear();

	        $model=UserSpecialSelection::model()->find('user_id=:data AND tax_year=:data2',array(':data'=>$identity, ':data2'=>$this->taxYear()) );

	        if($model){

	        	$model->type = $type;
		        $model->save();

	        }else{
		        $UFS =new UserSpecialSelection;
		        $UFS->tax_year = $taxyear;
		        $UFS->user_id = $identity;
		        $UFS->type = $type;
		        $UFS->save();
	        }
	        $data['status'] = "1";
	        $data['type'] = $type;
	        echo json_encode($data);
        }catch(Exception $e) {
  			$data['status'] = "0";
  			$data['error'] = $e;
  			echo json_encode($data);
		}
	}

	
}