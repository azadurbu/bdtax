<?php

class AssetsSingleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/columnLess';
	public $defaultAction = 'startup';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('entry','update', 'saveInfo', 'createShareholder', 'deleteShareholder', 'createNonAgricultureProperty', 'deleteNonAgricultureProperty', 'saveInvesrments', 'createMotorVehicle', 'deleteMotorVehicle', 'saveFurniture', 'saveJewellery', 'saveElectronicEquipment', 'saveOutsideBusiness', 'createAnyOtherAsset', 'deleteAnyOtherAsset', 'review', 'startup', 'createAgricultureProperty', 'deleteAgricultureProperty', 'setNo', 'saveInfo', 'saveFractionInfo', 'getDataForEdit', 'deleteData', 'deleteParticularFieldData', 'deleteInvestFieldData', 'saveInvestFractionInfo', 'deleteOutsideBusinessFieldData', 'saveOursideBusinessFractionInfo','saveAll'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionReview()
	{


		$model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));


		$this->render('review',array(
			'model'=>$model
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionStartup()
	{
		$model = $this->loadModelByCPIIdYear(Yii::app()->user->CPIId, $this->taxYear());
		if($model == null)
		{
			$this->render('startup');
		}
		else
		{
			$this->redirect(array('entry'));
		}

		
	}

	public function actionEntry()
	{
		//$model=new Assets;
		$model2 = new AssetsBusinessCapital;
		$model3 = new AssetsShareholdingCompanyList;
		$model4 = new AssetsNonAgricultureProperty;
		$model5 = new AssetsAgricultureProperty;
		$model6 = new AssetsInvestment;
		$model7 = new AssetsMotorVehicles;
		$model8 = new AssetsFurniture;
		$model9 = new AssetsJewelry;
		$model10 = new AssetsElectronicEquipment;
		$model11 = new AssetsOutsideBusiness;
		$model12 = new AssetsAnyOther;
		$model13 = new AssetsOtherReceipts;

		$model22 = new LiaMortgagesOnProperty;
		$model33 = new LiaUnsecuredLoans;
		$model44 = new LiaBankLoans;
		$model55 = new LiaOthersLoan;

		$AssetsInv = Liabilities::model()->find('CPIId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		$modelL = Liabilities::model()->find('CPIId=:data AND EntryYear=:data1', array(':data'=>Yii::app()->user->CPIId, ':data1'=>$this->taxYear()));
		if($modelL == null)
		{
				$modelL=new Liabilities;
				$_POST['Liabilities']['CPIId'] = Yii::app()->user->CPIId;
				$_POST['Liabilities']['CerateAt'] = date("Y-m-d H:i:s");
				$_POST['Liabilities']['EntryYear'] = $this->taxYear();
				$modelL->attributes=$_POST['Liabilities'];
				$modelL->save();
		}


		$model = $this->loadModelByCPIIdYear(Yii::app()->user->CPIId, $this->taxYear());
		if($model == null)
		{
			$model=new Assets;
			$asset['Assets']['CPIId'] = Yii::app()->user->CPIId;
			$asset['Assets']['CerateAt'] = date("Y-m-d H:i:s");
			$asset['Assets']['EntryYear'] = $this->taxYear();
			$model->attributes=$asset['Assets'];
			$model->save();
		}


		$this->render('entry',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
			'model4'=>$model4,
			'model5'=>$model5,
			'model6'=>$model6,
			'model7'=>$model7,
			'model8'=>$model8,
			'model9'=>$model9,
			'model10'=>$model10,
			'model11'=>$model11,
			'model12'=>$model12,
			'model13'=>$model13,
			'model22'=>$model22,
			'model33'=>$model33,
			'model44'=>$model44,
			'model55'=>$model55,
			'modelL'=>$modelL,
			
		));
	}
	public function ActionSetNo() {
		$model2=new Assets;
		$model2->updateByPk($_POST['AssetsId'], array(
		    $_POST['field']."Confirm" => "No",
		    $_POST['field']."FOrT" => null,
		    $_POST['field']."Total" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		$data['status'] = "success";
		$data['msg'] = Yii::t("common","Successfully Set to No");
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Set to No"));
		echo json_encode($data);
	}
	public function actionSaveInfo()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";

			die(json_encode($data));
		}
		else
		{
			if($_POST['value'] == "" || !is_numeric($_POST['value']))
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("assets","Data must be a number");
				die(json_encode($data));
			}

			$get_data=Assets::model()->findByPk($_POST['AssetsId']);
			if($get_data == null)
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("common","No data found");
				die(json_encode($data));
			}
		}

		$model=new Assets;
		
	####################### UPDATE ##########################
		
		$model->updateByPk($_POST['AssetsId'], array(
			$_POST['field_name']."Confirm" => "Yes",
		    $_POST['field_name']."FOrT" => "Total",
		    $_POST['field_name']."Total" => $_POST['value'],
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		
		
		$data['status'] = "success";
		$data['msg'] = Yii::t("common","Successfully Stored");
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		echo json_encode($data);
		
	}

	public function ActionSaveFractionInfo()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";

			die(json_encode($data));
		}
		else
		{
			if($_POST['cost'] == "" || !is_numeric($_POST['cost']) || $_POST['description'] == "")
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("assets","Description and Value are required. Value must be a number");
				die(json_encode($data));
			}

			$get_data=Assets::model()->findByPk($_POST['AssetsId']);
			if($get_data == null)
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("common","No data found");
				die(json_encode($data));
			}
		}
		if($_POST['id'] == "")
		{
			//NEW ENTRY
			$model=new $_POST['model'];
			$_POST['d']['AssetsId'] = $_POST['AssetsId'];
			$_POST['d']['Description'] = $_POST['description'];
			$_POST['d']['Cost'] = $_POST['cost'];
			$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
			$model->attributes=$_POST['d'];
			$model->save();

			$model2=new Assets;
			$model2->updateByPk($_POST['AssetsId'], array(
			    $_POST['field_name']."Confirm" => "Yes",
			    $_POST['field_name']."FOrT" => "Fraction",
			    $_POST['field_name']."Total" => null,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}
		else {
			//UPDATE
			$model=new $_POST['model'];
			$model->updateByPk($_POST['id'], array(
			    'Description' => $_POST['description'],
			    'Cost' => $_POST['cost'],
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}


		$data['status'] = "success";

		$data['msg'] = Yii::t("common","Successfully Stored");
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		echo json_encode($data);
		
	}

	public function ActionSaveInvestFractionInfo()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";

			die(json_encode($data));
		}
		else
		{
			if($_POST['Cost'] == "" || !is_numeric($_POST['Cost']) || $_POST['Description'] == "" || $_POST['InvestmentType'] == "")
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("assets","Type, Description and Value are required. Value must be a number");
				die(json_encode($data));
			}

			$get_data=Assets::model()->findByPk($_POST['AssetsId']);
			if($get_data == null)
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("common","No data found");
				die(json_encode($data));
			}
		}
		if($_POST['Id'] == "")
		{
			//NEW ENTRY
			$model=new AssetsInvestment;
			$_POST['d']['AssetsId'] = $_POST['AssetsId'];
			$_POST['d']['InvestmentType'] = $_POST['InvestmentType'];
			$_POST['d']['Description'] = $_POST['Description'];
			$_POST['d']['Cost'] = $_POST['Cost'];
			$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
			$model->attributes=$_POST['d'];
			$model->save();

			$model2=new Assets;
			$model2->updateByPk($_POST['AssetsId'], array(
			    "InvestmentConfirm" => "Yes",
			    "InvestmentFOrT" => "Fraction",
			    "InvestShareDebenturesTotal" => null,
			    "InvestSavingUnitCertBondTotal" => null,
			    "InvestPrizeBondSavingsSchemeTotal" => null,
			    "InvestLoansGivenTotal" => null,
			    "InvestOtherTotal" => null,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}
		else {
			//UPDATE
			$model=new AssetsInvestment;
			$model->updateByPk($_POST['Id'], array(
			    'InvestmentType' => $_POST['InvestmentType'],
			    'Description' => $_POST['Description'],
			    'Cost' => $_POST['Cost'],
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}

		$data['status'] = "success";

		$data['msg'] = Yii::t("common","Successfully Stored");
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		echo json_encode($data);
		
	}
	public function ActionSaveOursideBusinessFractionInfo()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";

			die(json_encode($data));
		}
		else
		{
			if($_POST['Cost'] == "" || !is_numeric($_POST['Cost']) || $_POST['Description'] == "" || $_POST['OutsideBusinessType'] == "")
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("assets","Type, Description and Value are required. Value must be a number");
				die(json_encode($data));
			}

			$get_data=Assets::model()->findByPk($_POST['AssetsId']);
			if($get_data == null)
			{
				$data['status'] = "failed";
				$data['msg'] = Yii::t("common","No data found");
				die(json_encode($data));
			}
		}
		if($_POST['Id'] == "")
		{
			//NEW ENTRY
			$model=new AssetsOutsideBusiness;
			$_POST['d']['AssetsId'] = $_POST['AssetsId'];
			$_POST['d']['OutsideBusinessType'] = $_POST['OutsideBusinessType'];
			$_POST['d']['Description'] = $_POST['Description'];
			$_POST['d']['Cost'] = $_POST['Cost'];
			$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
			$model->attributes=$_POST['d'];
			$model->save();

			$model2=new Assets;
			$model2->updateByPk($_POST['AssetsId'], array(
			    "OutsideBusinessConfirm" => "Yes",
			    "OutsideBusinessFOrT" => "Fraction",
			    "OutsideBusinessCashInHandTotal" => null,
			    "OutsideBusinessCashAtBankTotal" => null,
			    "OutsideBusinessOtherdepositsTotal" => null,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}
		else {
			//UPDATE
			$model=new AssetsOutsideBusiness;
			$model->updateByPk($_POST['Id'], array(
			    'OutsideBusinessType' => $_POST['OutsideBusinessType'],
			    'Description' => $_POST['Description'],
			    'Cost' => $_POST['Cost'],
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}

		$data['status'] = "success";

		$data['msg'] = Yii::t("common","Successfully Stored");
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		echo json_encode($data);
		
	}
	public function ActionGetDataForEdit() {
		$get_data=$_POST['model']::model()->findByPk($_POST['id']);
		echo CJSON::encode($get_data);
	}

	public function ActionDeleteData() {
		$get = $_POST['model']::model()->findByPk($_POST['id']);

		$_POST['model']::model()->findByPk($_POST['id'])->delete();

		$counter = $_POST['model']::model()->count('AssetsId=:data',array(':data'=>$get->AssetsId));

		if($counter == 0) {
			$model2=new Assets;

			if($_POST['field'] == "AssetsInvestment") {
				$model2->updateByPk($get->AssetsId, array(
				    $_POST['field']."Confirm" => null,
				    $_POST['field']."FOrT" => null,
				    "InvestShareDebenturesTotal" => null,
				    "InvestSavingUnitCertBondTotal" => null,
				    "InvestPrizeBondSavingsSchemeTotal" => null,
				    "InvestLoansGivenTotal" => null,
				    "InvestOtherTotal" => null,
				    'LastUpdateAt' => date("Y-m-d H:i:s")
				));
			}
			elseif($_POST['field'] == "AssetsOutsideBusiness") {
				$model2->updateByPk($get->AssetsId, array(
				    $_POST['field']."Confirm" => null,
				    $_POST['field']."FOrT" => null,
				    "OutsideBusinessCashInHandTotal" => null,
				    "OutsideBusinessCashAtBankTotal" => null,
				    "OutsideBusinessOtherdepositsTotal" => null,
				    'LastUpdateAt' => date("Y-m-d H:i:s")
				));
			}
			elseif($_POST['field'] == "NonAgricultureProperty"){
				$model2->updateByPk($get->AssetsId, array(
				    $_POST['field']."Confirm" => null,
    				$_POST['field']."FOrT" => null,
    				$_POST['field']."Total" => null,
    				'HousePropertyInCityCorporation' => null,
    				'LastUpdateAt' => date("Y-m-d H:i:s")
				));
			}
			elseif($_POST['field'] == "MotorVehicle"){
				$model2->updateByPk($get->AssetsId, array(
				    $_POST['field']."Confirm" => null,
    				$_POST['field']."FOrT" => null,
    				$_POST['field']."Total" => null,
    				'MultipleCar' => null,
    				'LastUpdateAt' => date("Y-m-d H:i:s")
				));
			}
			else {
				$model2->updateByPk($get->AssetsId, array(
				    $_POST['field']."Confirm" => null,
				    $_POST['field']."FOrT" => null,
				    $_POST['field']."Total" => null,
				    'LastUpdateAt' => date("Y-m-d H:i:s")
				));
			}
			
		}

		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
		echo json_encode($data);
	}

	public function ActionDeleteParticularFieldData() {
		
			$model2=new Assets;
			$model2->updateByPk($_POST['AssetsId'], array(
			    $_POST['field']."Confirm" => null,
			    $_POST['field']."FOrT" => null,
			    $_POST['field']."Total" => null,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));

		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
		echo json_encode($data);
	}

	public function ActionDeleteInvestFieldData() {
		
			$model2=new Assets;
			$model2->updateByPk($_POST['AssetsId'], array(
			    $_POST['field'] => null,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));

			$get = Assets::model()->findByPk($_POST['AssetsId']);

			if($get->InvestShareDebenturesTotal == null && $get->InvestSavingUnitCertBondTotal == null && $get->InvestPrizeBondSavingsSchemeTotal == null && $get->InvestLoansGivenTotal == null && $get->InvestOtherTotal == null) {

				$model2=new Assets;
				$model2->updateByPk($_POST['AssetsId'], array(
				    "InvestmentConfirm" => null,
				    "InvestmentFOrT" => null,
				    'LastUpdateAt' => date("Y-m-d H:i:s")
				));
			}

		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
		echo json_encode($data);
	}

	public function ActionDeleteOutsideBusinessFieldData() {
		
			$model2=new Assets;
			$model2->updateByPk($_POST['AssetsId'], array(
			    $_POST['field'] => null,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));

			$get = Assets::model()->findByPk($_POST['AssetsId']);

			if($get->OutsideBusinessCashInHandTotal == null && $get->OutsideBusinessCashAtBankTotal == null && $get->OutsideBusinessOtherdepositsTotal == null) {

				$model2=new Assets;
				$model2->updateByPk($_POST['AssetsId'], array(
				    "OutsideBusinessConfirm" => null,
				    "OutsideBusinessFOrT" => null,
				    'LastUpdateAt' => date("Y-m-d H:i:s")
				));
			}

		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Removed"));
		echo json_encode($data);
	}

	
	public function actionCreateShareholder()
	{
		$data['msg'] = "";
		if(!is_numeric($_POST['N_O_Share']) || $_POST['N_O_Share'] < 0) $data['msg'] .= "<br>Number of Shares must be a positive number";
		if(!is_numeric($_POST['E_S_Cost']) || $_POST['E_S_Cost'] < 0) $data['msg'] .= "<br>Each Share Cost must be a positive number";
		if(!is_numeric($_POST['C_A_Value']) || $_POST['C_A_Value'] < 0) $data['msg'] .= "<br>Company Asset Value must be a positive number";

		if($data['msg'] != "")
		{
			$data['status'] = "failed";
			die(json_encode($data));
		}		
		$model=new AssetsShareholdingCompanyList;
		$_POST['m']['CompanyName'] = $_POST['C_Name'];
		$_POST['m']['NumberOfShares'] = $_POST['N_O_Share'];
		$_POST['m']['EachShareCost'] = $_POST['E_S_Cost'];
		$_POST['m']['CompanyAssetValue'] = $_POST['C_A_Value'];

		$ShareholdingCompanyList = AssetsShareholdingCompanyList::model()->findAllByAttributes(array('AssetsId' => $_POST['AssetsId']));
		
		if($_POST['Id'] == "") {
			if(sizeof($ShareholdingCompanyList)>=10){
				$data['status'] = "failed";
				$data['msg'] = "You have entered the maximum number of Shareholding Assets";
				echo json_encode($data);
				break;
			}else{
				$_POST['m']['AssetsId'] = $_POST['AssetsId'];
				$_POST['m']['CerateAt'] = date("Y-m-d H:i:s");
				$model->attributes=$_POST['m'];
				$model->save();
			}

		}
		else {
			$_POST['m']['LastUpdateAt'] = date("Y-m-d H:i:s");
			$model->updateByPk($_POST['Id'], $_POST['m']);
		}

		$model2=new Assets;
		$model2->updateByPk($_POST['AssetsId'], array(
		    "ShareholdingCompanyConfirm" => "Yes",
		    "ShareholdingCompanyFOrT" => "Fraction",
		    "ShareholdingCompanyTotal" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		//$value = CJSON::encode($model);
		$data['status'] = "success";
		$data['msg'] = "Successfully Stored";
		//$data['value'] = $value;

		echo json_encode($data);
	}
	public function actionDeleteShareholder()
	{
		//AssetsShareholdingCompanyList::model()->findByPk($_POST['id'])->delete();
		AssetsShareholdingCompanyList::model()->updateByPk($_POST['id'], array(
		    'trash' => 1,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		
		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		echo json_encode($data);
	}
	public function actionCreateNonAgricultureProperty()
	{
		$data['msg'] = "";
		// if(!is_numeric($_POST['cost']) || $_POST['cost'] < 0) $data['msg'] .= "<br>Property Value must be a positive number";


		if($data['msg'] != "")
		{
			$data['status'] = "failed";
			die(json_encode($data));
		}
		
		$model=new AssetsNonAgricultureProperty;
		$_POST['m']['Type'] = $_POST['type'];
		$_POST['m']['Description'] = $_POST['description'];
		$_POST['m']['ValueStartOfIncomeYear'] = $_POST['valueStartOfYear'];
		$_POST['m']['ValueChangeDuringIncomeYear'] = $_POST['valueDuringYear'];
		$_POST['m']['Cost'] = $_POST['cost'];

		$NonAgriculturePropertyList = AssetsNonAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => $_POST['AssetsId']));
		// var_dump(sizeof($NonAgriculturePropertyList));die;
		if($_POST['Id'] == "") {
			if(sizeof($NonAgriculturePropertyList)>=10){
				$data['status'] = "failed";
				$data['msg'] = "You have entered the maximum number of Non-Agricultural Property";
				echo json_encode($data);
				break;
			}else{
				$_POST['m']['AssetsId'] = $_POST['AssetsId'];
				$_POST['m']['CerateAt'] = date("Y-m-d H:i:s");
				$model->attributes=$_POST['m'];
				$model->save();
			}
		}
		else {
			$_POST['m']['LastUpdateAt'] = date("Y-m-d H:i:s");
			$model->updateByPk($_POST['Id'], $_POST['m']);
		}

		$model2=new Assets;
		$model2->updateByPk($_POST['AssetsId'], array(
		    "NonAgriculturePropertyConfirm" => "Yes",
		    "NonAgriculturePropertyFOrT" => "Fraction",
		    "NonAgriculturePropertyTotal" => null,
		    "HousePropertyInCityCorporation" => ($_POST['housePorpertyValue']=='Yes'?$_POST['housePorpertyValue']:null),
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		// $value = CJSON::encode($model);
		$data['status'] = "success";
		$data['msg'] = "Successfully Stored";
		// $data['value'] = $value;

		echo json_encode($data);
	}
	public function actionDeleteNonAgricultureProperty()
	{
		//AssetsNonAgricultureProperty::model()->findByPk($_POST['id'])->delete();
		AssetsNonAgricultureProperty::model()->updateByPk($_POST['id'], array(
		    'trash' => 1,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		
		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		echo json_encode($data);
	}
	public function actionCreateAgricultureProperty()
	{
		$data['msg'] = "";
		//if(!is_numeric($_POST['cost']) || $_POST['cost'] < 0) $data['msg'] .= "<br>Property Value must be a positive number";

		if($data['msg'] != "")
		{
			$data['status'] = "failed";
			die(json_encode($data));
		}
		
		// $model=new AssetsAgricultureProperty;
		// $_POST['m']['AgroPropertyDescription'] = $_POST['AgroPropertyDescription'];
		// $_POST['m']['AgroPropertyValue'] = $_POST['AgroPropertyValue'];

		// $_POST['m']['AssetsId'] = $_POST['AssetsId'];
		// $_POST['m']['CPIId'] = Yii::app()->user->CPIId;
		// $_POST['m']['CerateAt'] = date("Y-m-d H:i:s");
		// $_POST['m']['EntryYear'] = $this->taxYear();
		// $model->attributes=$_POST['m'];
		// $model->save();

		// $value = CJSON::encode($model);
		// $data['status'] = "success";
		// $data['msg'] = "Successfully Stored";
		// $data['value'] = $value;

		// echo json_encode($data);


		$model=new AssetsAgricultureProperty;
		$_POST['m']['Description'] = $_POST['description'];
		$_POST['m']['ValueStartOfIncomeYear'] = $_POST['valueStartOfYear'];
		$_POST['m']['ValueChangeDuringIncomeYear'] = $_POST['valueDuringYear'];
		$_POST['m']['Cost'] = $_POST['cost'];

		$AgriculturePropertyList = AssetsAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => $_POST['AssetsId']));
		// var_dump(sizeof($NonAgriculturePropertyList));die;
		if($_POST['Id'] == "") {
			if(sizeof($AgriculturePropertyList)>=4){
				$data['status'] = "failed";
				$data['msg'] = "You have entered the maximum number of Agricultural Property";
				echo json_encode($data);
				break;
			}else{
				$_POST['m']['AssetsId'] = $_POST['AssetsId'];
				$_POST['m']['CerateAt'] = date("Y-m-d H:i:s");
				$model->attributes=$_POST['m'];
				$model->save();
			}
		}
		else {
			$_POST['m']['LastUpdateAt'] = date("Y-m-d H:i:s");
			$model->updateByPk($_POST['Id'], $_POST['m']);
		}

		$model2=new Assets;
		$model2->updateByPk($_POST['AssetsId'], array(
		    "AgriculturePropertyConfirm" => "Yes",
		    "AgriculturePropertyFOrT" => "Fraction",
		    "AgriculturePropertyTotal" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		//$value = CJSON::encode($model);
		$data['status'] = "success";
		$data['msg'] = "Successfully Stored";
		//$data['value'] = $value;

		echo json_encode($data);
	}
	public function actionDeleteAgricultureProperty()
	{
		AssetsAgricultureProperty::model()->updateByPk($_POST['id'], array(
		    'trash' => 1,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		
		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		echo json_encode($data);
	}

	public function actionSaveInvesrments()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";
			die(json_encode($data));
		}
		$model=new Assets;

		$_POST['Assets']['InvestmentConfirm'] = "Yes"; 
		$_POST['Assets']['InvestmentFOrT'] = "Total"; 
		$_POST['Assets']['LastUpdateAt'] = date("Y-m-d H:i:s"); 
	
		####################### UPDATE ##########################
		$model->updateByPk($_POST['Assets']['AssetsId'], $_POST['Assets']);
		
		
		$data['status'] = "success";
		$data['msg'] = "Successfully Stored ";
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		echo json_encode($data);
	}

	public function actionCreateMotorVehicle()
	{
		$data['msg'] = "";
		if(!is_numeric($_POST['MVValue']) || $_POST['MVValue'] < 0) $data['msg'] .= "<br>Value must be a positive number";

		if($data['msg'] != "")
		{
			$data['status'] = "failed";
			die(json_encode($data));
		}
		

		//----------------------------------------
		$model=new AssetsMotorVehicles;
		$_POST['mv']['MotorVehicleType'] = $_POST['MotorVehicleType'];
		$_POST['mv']['RegistrationNo'] = $_POST['RegistrationNo'];
		$_POST['mv']['MVDescription'] = $_POST['MVDescription'];
		$_POST['mv']['MVValue'] = $_POST['MVValue'];

		$motorVehicleList = AssetsMotorVehicles::model()->findAllByAttributes(array('AssetsId' => $_POST['AssetsId']));

		if($_POST['Id'] == "") {
			// if(sizeof($motorVehicleList)>=2){
			// 	$data['status'] = "failed";
			// 	$data['msg'] = "You have entered the maximum number of Motor Vehicle";
			// 	echo json_encode($data);
			// 	break;
			// }else{
				$_POST['mv']['AssetsId'] = $_POST['AssetsId'];
				$_POST['mv']['CerateAt'] = date("Y-m-d H:i:s");
				$model->attributes=$_POST['mv'];
				$model->save();
			// }
		}
		else {
			$_POST['mv']['LastUpdateAt'] = date("Y-m-d H:i:s");
			$model->updateByPk($_POST['Id'], $_POST['mv']);
		}

		$model2=new Assets;
		$model2->updateByPk($_POST['AssetsId'], array(
		    "MotorVehicleConfirm" => "Yes",
		    "MotorVehicleFOrT" => "Fraction",
		    "MotorVehicleTotal" => null,
		    "MultipleCar" => ($_POST['multipleCarValue']=='Yes'?$_POST['multipleCarValue']:null),
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		$data['status'] = "success";
		$data['msg'] = "Successfully Stored";
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Stored"));
		echo json_encode($data);
	}
	public function actionDeleteMotorVehicle()
	{
		//AssetsMotorVehicles::model()->findByPk($_POST['id'])->delete();
		AssetsMotorVehicles::model()->updateByPk($_POST['id'], array(
		    'trash' => 1,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		
		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		echo json_encode($data);
	}

	public function actionSaveFurniture()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";
			die(json_encode($data));
		}
		else
		{
			if(!is_numeric($_POST['FurnitureCost']))
			{
				$data['status'] = "failed";
				$data['msg'] = "Furniture Cost must be a number";
				die(json_encode($data));
			}
		}

		$model=new Assets;
		
	####################### UPDATE ##########################
		$model->updateByPk($_POST['AssetsId'], array(
		    'FurnitureDescription' => $_POST['FurnitureDescription'],
		    'FurnitureCost' => $_POST['FurnitureCost'],
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		$FC = Assets::model()->findByPk($_POST['AssetsId']);

		$msg = '<b>Furniture Description: </b>' . $FC->FurnitureDescription;
		$msg .= '<br><b>Furniture Cost: </b>' . $FC->FurnitureCost;

		$data['status'] = "success";
		$data['msg'] = "Successfully Stored <br>".$msg;
		echo json_encode($data);
	}

	public function actionSaveJewellery()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";
			die(json_encode($data));
		}
		else
		{
			if(!is_numeric($_POST['JewelleryCost']))
			{
				$data['status'] = "failed";
				$data['msg'] = "Jewellery Cost must be a number";
				die(json_encode($data));
			}
		}

		$model=new Assets;
		
	####################### UPDATE ##########################
		$model->updateByPk($_POST['AssetsId'], array(
		    'JewelleryDescription' => $_POST['JewelleryDescription'],
		    'JewelleryCost' => $_POST['JewelleryCost'],
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));



		$JC = Assets::model()->findByPk($_POST['AssetsId']);

		$msg = '<b>Jewellery Description: </b>' . $JC->JewelleryDescription;
		$msg .= '<br><b>Jewellery Cost: </b>' . $JC->JewelleryCost;

		$data['status'] = "success";
		$data['msg'] = "Successfully Stored <br>".$msg;

		echo json_encode($data);
	}

	public function actionSaveElectronicEquipment()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";
			die(json_encode($data));
		}
		else
		{
			if(!is_numeric($_POST['ElectronicEquipmentCost']))
			{
				$data['status'] = "failed";
				$data['msg'] = "Electronic Equipment Cost must be a number";
				die(json_encode($data));
			}
		}

		$model=new Assets;
		
	####################### UPDATE ##########################
		$model->updateByPk($_POST['AssetsId'], array(
		    'ElectronicEquipmentDescription' => $_POST['ElectronicEquipmentDescription'],
		    'ElectronicEquipmentCost' => $_POST['ElectronicEquipmentCost'],
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));



		$EE = Assets::model()->findByPk($_POST['AssetsId']);

		$msg = '<b>Electronic Equipment Description: </b>' . $EE->ElectronicEquipmentDescription;
		$msg .= '<br><b>Electronic Equipment Cost: </b>' . $EE->ElectronicEquipmentCost;

		$data['status'] = "success";
		$data['msg'] = "Successfully Stored <br>".$msg;
		echo json_encode($data);
	}

	public function actionSaveOutsideBusiness()
	{
		$data = [];
		if(!Yii::app()->request->isPostRequest)
		{
			$data['status'] = "failed";
			$data['msg'] = "Invalid Request";
			die(json_encode($data));
		}
		else
		{
			$msg = "";
			if($_POST['OutsideBusinessCashInHandTotal'] != "" && !is_numeric($_POST['OutsideBusinessCashInHandTotal'])) $msg .= "<br>Cash in hand must be a number";
			if($_POST['OutsideBusinessCashAtBankTotal'] != "" && !is_numeric($_POST['OutsideBusinessCashAtBankTotal'])) $msg .= "<br>Cash at bank must be a number";
			if($_POST['OutsideBusinessFundTotal'] != "" && !is_numeric($_POST['OutsideBusinessFundTotal'])) $msg .= "<br>Other Funds must be a number";
			if($_POST['OutsideBusinessOtherdepositsTotal'] != "" && !is_numeric($_POST['OutsideBusinessOtherdepositsTotal'])) $msg .= "<br>Other deposits must be a number";
		
			if($msg != "")
			{
				$data['status'] = "failed";
				$data['msg'] = "Cost must be a number";
				die(json_encode($data));
			}
		}

		$model=new Assets;
		
	####################### UPDATE ##########################
		$model->updateByPk($_POST['AssetsId'], array(
		    'OutsideBusinessConfirm' => "Yes",
		    'OutsideBusinessFOrT' => "Total",
		    'OutsideBusinessCashInHandTotal' => $_POST['OutsideBusinessCashInHandTotal'],
		    'OutsideBusinessCashAtBankTotal' => $_POST['OutsideBusinessCashAtBankTotal'],
		    'OutsideBusinessFundTotal' => $_POST['OutsideBusinessFundTotal'],
		    'OutsideBusinessOtherdepositsTotal' => $_POST['OutsideBusinessOtherdepositsTotal'],
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		$data['status'] = "success";
		$data['msg'] = "Successfully Stored";
		Yii::app()->user->setFlash('alert_success', Yii::t("assets","Successfully Stored"));
		echo json_encode($data);
	}

	public function actionCreateAnyOtherAsset()
	{
		$data['msg'] = "";
		if(!is_numeric($_POST['AnyOtherAssetValue']) || $_POST['AnyOtherAssetValue'] < 0) $data['msg'] .= "<br>Asset Value must be a positive number";


		if($data['msg'] != "")
		{
			$data['status'] = "failed";
			die(json_encode($data));
		}
		
		$model=new AssetsAnyOther;
		$_POST['oa']['AnyOtherAssetDescription'] = $_POST['AnyOtherAssetDescription'];
		$_POST['oa']['AnyOtherAssetValue'] = $_POST['AnyOtherAssetValue'];

		$_POST['oa']['AssetsId'] = $_POST['AssetsId'];
		$_POST['oa']['CPIId'] = Yii::app()->user->CPIId;
		$_POST['oa']['CerateAt'] = date("Y-m-d H:i:s");
		$_POST['oa']['EntryYear'] = $this->taxYear();
		$model->attributes=$_POST['oa'];
		$model->save();

		$value = CJSON::encode($model);
		$data['status'] = "success";
		$data['msg'] = "Successfully Saved";
		$data['value'] = $value;

		echo json_encode($data);
	}
	public function actionDeleteAnyOtherAsset()
	{
		//AssetsAnyOther::model()->findByPk($_POST['id'])->delete();
		AssetsAnyOther::model()->updateByPk($_POST['id'], array(
		    'trash' => 1,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		
		$data['status'] = "success";
		$data['msg'] = "Successfully Deleted";
		echo json_encode($data);
	}













































	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Assets']))
		{
			$model->attributes=$_POST['Assets'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->AssetsId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Assets');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Assets('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Assets']))
			$model->attributes=$_GET['Assets'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Assets the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Assets::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModelByCPIIdYear($userID, $year)
	{
		$model=Assets::model()->findbyattributes(array('CPIId'=>$userID, 'EntryYear' => $year, 'trash' => 0));
		return $model;
	}
	

	/**
	 * Performs the AJAX validation.
	 * @param Assets $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='assets-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function cal_assets($CPIId, $year)
	{
		$CompanyAssetValue = Yii::app()->db->createCommand()
		->select('SUM(CompanyAssetValue) AS CompanyAssetValue, AssetsId, CPIId, EntryYear')
		->from('assets_shareholding_company_list')
		->where('trash=0') 
		->andWhere('CPIId=:CPIId', array(':CPIId'=>$CPIId)) 
		->andWhere('EntryYear=:year', array(':year'=>$year)) 
		->group('AssetsId, CPIId, EntryYear')
		->queryRow();

		$NAgroPropertyValue = Yii::app()->db->createCommand()
		->select('SUM(NAgroPropertyValue) AS NAgroPropertyValue, AssetsId, CPIId, EntryYear')
		->from('assets_non_agriculture_property')
		->where('trash=0') 
		->andWhere('CPIId=:CPIId', array(':CPIId'=>$CPIId)) 
		->andWhere('EntryYear=:year', array(':year'=>$year)) 
		->group('AssetsId, CPIId, EntryYear')
		->queryRow();

		$AgroPropertyValue = Yii::app()->db->createCommand()
		->select('SUM(AgroPropertyValue) AS AgroPropertyValue, AssetsId, CPIId, EntryYear')
		->from('assets_agriculture_property')
		->where('trash=0') 
		->andWhere('CPIId=:CPIId', array(':CPIId'=>$CPIId)) 
		->andWhere('EntryYear=:year', array(':year'=>$year)) 
		->group('AssetsId, CPIId, EntryYear')
		->queryRow();

		$AssetInvestmentValue = Yii::app()->db->createCommand()
		->select('(IFNULL(SharesOrDebenturesValue,0) + IFNULL(SavingOrUnitCertOrBondValue,0) + IFNULL(PrizeBondOrSavingsSchemeValue,0) + IFNULL(LoansGivenValue,0) + IFNULL(OtherInvestmentValue,0)) AS AssetInvestmentTotal, AssetsId, CPIId, EntryYear, SharesOrDebenturesValue, SavingOrUnitCertOrBondValue, PrizeBondOrSavingsSchemeValue, LoansGivenValue, OtherInvestmentValue')
		->from('assets_investment')
		->where('trash=0') 
		->andWhere('CPIId=:CPIId', array(':CPIId'=>$CPIId)) 
		->andWhere('EntryYear=:year', array(':year'=>$year)) 
		->queryRow();


		$AnyOtherAssetValue = Yii::app()->db->createCommand()
		->select('SUM(AnyOtherAssetValue) AS AnyOtherAssetValue, AssetsId, CPIId, EntryYear')
		->from('assets_any_other')
		->where('trash=0') 
		->andWhere('CPIId=:CPIId', array(':CPIId'=>$CPIId)) 
		->andWhere('EntryYear=:year', array(':year'=>$year)) 
		->group('AssetsId, CPIId, EntryYear')
		->queryRow();

		$MotorVehicleValue = Yii::app()->db->createCommand()
		->select('SUM(MVValue) AS MotorVehicleValue, AssetsId, CPIId, EntryYear')
		->from('assets_motor_vehicles')
		->where('trash=0') 
		->andWhere('CPIId=:CPIId', array(':CPIId'=>$CPIId)) 
		->andWhere('EntryYear=:year', array(':year'=>$year)) 
		->group('AssetsId, CPIId, EntryYear')
		->queryRow();

		$AssetsValue = Yii::app()->db->createCommand()
		->select('BusinessCapital, JewelleryCost, FurnitureCost, ElectronicEquipmentCost, (IFNULL(CashInHand, 0) + IFNULL(CashAtBank, 0) + IFNULL(Otherdeposits,0)) AS total_cash_outside_business, AssetsId, CPIId, EntryYear')
		->from('assets')
		->where('trash=0') 
		->andWhere('CPIId=:CPIId', array(':CPIId'=>$CPIId)) 
		->andWhere('EntryYear=:year', array(':year'=>$year)) 
		->queryRow();

		$total_assets = $CompanyAssetValue['CompanyAssetValue'] +
						$NAgroPropertyValue['NAgroPropertyValue'] +
						$AgroPropertyValue['AgroPropertyValue'] + 
						$AssetInvestmentValue['AssetInvestmentTotal'] + 
						$AnyOtherAssetValue['AnyOtherAssetValue'] + 
						$MotorVehicleValue['MotorVehicleValue'] + 
						$AssetsValue['BusinessCapital'] +
						$AssetsValue['JewelleryCost'] +
						$AssetsValue['FurnitureCost'] +
						$AssetsValue['ElectronicEquipmentCost'] +
						$AssetsValue['total_cash_outside_business'];
						
		$arr = [
			'CompanyAssetValue' => $CompanyAssetValue,
			'NAgroPropertyValue' => $NAgroPropertyValue,
			'AgroPropertyValue' => $AgroPropertyValue,
			'AssetInvestmentValue' => $AssetInvestmentValue,
			'AnyOtherAssetValue' => $AnyOtherAssetValue,
			'MotorVehicleValue' => $MotorVehicleValue,
			'AssetsValue' => $AssetsValue,
			'total_assets' => $total_assets
		];
		return $arr;
	}

	function checkActiveInactive($model, $confirm, $FOrT, $model2, $total) {
	    $isAnswered = 0;
	    if($model->$confirm == null) {
	        //blank
	    }
	    elseif($model->$confirm == "No") {
	        $isAnswered = 1;
	    }
	    elseif($model->$confirm == "Yes") {
	        if($model->$FOrT == "Fraction") {
	            $counter = $model2::model()->count('AssetsId=:data',array(':data'=>$model->AssetsId));
	            if($counter > 0) $isAnswered = 1;
	        }
	        elseif($model->$FOrT == "Total") {
	            if($model->$total != null) $isAnswered = 1;
	        } 
	    }
	    return $isAnswered;
	}

	function sum_of_particular_field($model, $field, $table) {


		if($model == null) return Yii::t("expense", "Not answered yet");
		if($model->{$field."Confirm"} == "Yes") {
			if($model->{$field."FOrT"} == "Total") {
				if($field == "Investment") {
					$total = $model->InvestShareDebenturesTotal + $model->InvestSavingUnitCertBondTotal + $model->InvestPrizeBondSavingsSchemeTotal + $model->InvestLoansGivenTotal + $model->InvestOtherTotal;
					return $total;
				}
				elseif($field == "OutsideBusiness") {
					$total = $model->OutsideBusinessCashInHandTotal + $model->OutsideBusinessCashAtBankTotal + $model->OutsideBusinessFundTotal + $model->OutsideBusinessOtherdepositsTotal;
					return number_format($total,2,".","");
				}
				else {
					return $model->{$field."Total"};
				}
			}
			elseif($model->{$field."FOrT"} == "Fraction") {

				if($table == "assets_motor_vehicles") {
					$cost = Yii::app()->db->createCommand()
					->select('SUM(MVValue) AS Cost')
					->from($table)
					->where('AssetsId=:AssetsId', array(':AssetsId'=>$model->AssetsId)) 
					->queryRow();
				}
				elseif($table == "assets_shareholding_company_list") {

					$cost = Yii::app()->db->createCommand()
					->select('SUM(CompanyAssetValue) AS Cost')
					->from($table)
					->where('AssetsId=:AssetsId', array(':AssetsId'=>$model->AssetsId)) 
					->queryRow();
				}
				else {

					$cost = Yii::app()->db->createCommand()
					->select('SUM(Cost) AS Cost')
					->from($table)
					->where('AssetsId=:AssetsId', array(':AssetsId'=>$model->AssetsId)) 
					->queryRow();
				}
				
				return $cost['Cost'];
			}
			else {
				return Yii::t("expense", "Not answered yet");
			}
		}
		elseif($model->{$field."Confirm"} == "No") {
			return Yii::t("expense", "You chose No");
		}
		else {
			return Yii::t("expense", "Not answered yet");
		}
	}


	function resetAllCost(){
		$model =new AssetsAgricultureProperty;
		

		
		$AgriculturePropertyList = AssetsAgricultureProperty::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		

       
      
        $AssetsInv = AssetsInvestment::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsInvestment::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

        


		$AssetsInv = AssetsOutsideBusiness::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsOutsideBusiness::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

        


		

        

		$AssetsInv = AssetsMotorVehicles::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsMotorVehicles::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

		//----------------------------------------
		

        $model=new Assets;

        $model->updateByPk($_POST['Assets']['AssetsId'], array(
		    'ElectronicEquipmentTotal' => 0,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		$model->updateByPk($_POST['Assets']['AssetsId'], array(
		    'JewelryTotal' => 0,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		$model->updateByPk($_POST['Assets']['AssetsId'], array(
		    'FurnitureTotal' => 0,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));


		$AssetsInv = AssetsAnyOther::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsAnyOther::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

		


        LiaMortgagesOnProperty::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));
        LiaUnsecuredLoans::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));
        LiaBankLoans::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));
        LiaOthersLoan::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));
        

	}


	function actionsaveAll(){

        if(isset($_POST['Assets']['NetWealthTotal']) && $_POST['netwealthTag']){

        	$newWealth = $_POST['Assets']['NetWealthTotal'];
        	if($_POST['Assets']['NetWealthTotal']<0){
					$newWealth = 0;
		    }

		    if($newWealth>4000000){
		    	$data['status'] = "failed";
				$data['msg'] = "Your gross wealth  crossed 40 lac";
				Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your gross wealth  has crossed 40 lac BDT because of that you are not eligible for IT GHA 2020"));

				$this->redirect($this->createUrl('assetsSingle/entry'));
		    }
			
			$model2 = new Assets;
			$model2->updateByPk($_POST['Assets']['AssetsId'], array(
			    "NetWealthTotal" => $newWealth,
			    "netWealthDetail"=>0,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));


			$this->resetAllCost();

			Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Saved"));
            
			$this->redirect(Yii::app()->baseUrl.'/index.php/assetsSingle/entry');
		}


		if($_POST['total_asset_cost']>4000000){
		    	$data['status'] = "failed";
				$data['msg'] = "Your gross wealth  crossed 40 lac";
							Yii::app()->user->setFlash('alert_failed', Yii::t("assets","Your gross wealth  has crossed 40 lac BDT because of that you are not eligible for IT GHA 2020"));

				$this->redirect($this->createUrl('assetsSingle/entry'));
		}

		$model=new AssetsAgricultureProperty;
		$_POST['m']['Description'] = $_POST['agriculture_cost_desc'];
		
		$_POST['m']['Cost'] = $_POST['agriculture_cost'];

		if($_POST['agriculture_cost']<0){
			$_POST['m']['Cost'] = 0;
		}

		
		$AgriculturePropertyList = AssetsAgricultureProperty::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		// var_dump(sizeof($NonAgriculturePropertyList));die;
		
		if(sizeof($AgriculturePropertyList)>=1){
			$_POST['m']['LastUpdateAt'] = date("Y-m-d H:i:s");
		    $AgriculturePropertyList->Description=$_POST['m']['Description'];
		    $AgriculturePropertyList->Cost=($_POST['m']['Cost']>0)?$_POST['m']['Cost']:0;
		    $AgriculturePropertyList->LastUpdateAt=$_POST['m']['LastUpdateAt'];
		    $AgriculturePropertyList->save();
		}else{
			$_POST['m']['AssetsId'] = $_POST['Assets']['AssetsId'];
			$_POST['m']['CerateAt'] = date("Y-m-d H:i:s");
			$model->attributes=$_POST['m'];
			$model->save();
			
		}

       
      
        $AssetsInv = AssetsInvestment::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsInvestment::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

        $investmentdesc = $_POST['investmentdesc'];
        $investmentcost = $_POST['investmentcost'];
		
		foreach ($investmentcost as $key => $value) {
			$model=new AssetsInvestment;
			
			if($value){
				$_POST['d']['AssetsId'] = $_POST['Assets']['AssetsId'];
				if($key==1){
					$type= 'Shares/Debentures';
				}elseif($key==2){
					$type= 'Saving Certificate/Unit Certificate/Bond';
				}elseif($key==3){
					$type= 'Prize Bond/Saving Scheme';
				}elseif($key==4){
					$type= 'Loans Given';
				}else{
					$type= 'Other Investment';
				}

				$_POST['d']['InvestmentType'] = $type;
				$_POST['d']['Description'] = isset($investmentdesc[$key])?$investmentdesc[$key]:'';
				$_POST['d']['Cost'] = ($investmentcost[$key]>0)?$investmentcost[$key]:0;
				$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
				$model->attributes=$_POST['d'];
				$model->save();
		    }
		}


		$AssetsInv = AssetsOutsideBusiness::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsOutsideBusiness::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

        $cash_desc = $_POST['cash_desc'];
        $cash_cost = $_POST['cash_cost'];
		
		foreach ($cash_cost as $key => $value) {
			$model=new AssetsOutsideBusiness;
			
			if($value){
				$_POST['c']['AssetsId'] = $_POST['Assets']['AssetsId'];
				if($key==1){
					$type= 'Cash on hand';
				}elseif($key==2){
					$type= 'Cash at Bank';
				}elseif($key==3){
					$type= 'Fund';
				}else{
					$type= 'Other Deposits';
				}

				$_POST['c']['OutsideBusinessType'] = $type;
				$_POST['c']['Description'] = isset($cash_desc[$key])?$cash_desc[$key]:'';
				$_POST['c']['Cost'] = ($cash_cost[$key]>0)?$cash_cost[$key]:0;
				$_POST['c']['CerateAt'] = date("Y-m-d H:i:s");
				$model->attributes=$_POST['c'];
				$model->save();
		    }
		}


		

        

		$AssetsInv = AssetsMotorVehicles::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsMotorVehicles::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

		//----------------------------------------
		$model=new AssetsMotorVehicles;
		
		$_POST['mv']['MVDescription'] = $_POST['vechile_description'];
		$_POST['mv']['MVValue'] = ($_POST['vechile_cost']>0)?$_POST['vechile_cost']:0;
		$_POST['mv']['AssetsId'] = $_POST['Assets']['AssetsId'];
		$_POST['mv']['CerateAt'] = date("Y-m-d H:i:s");
		$model->attributes=$_POST['mv'];
		$model->save();

        $model=new Assets;

        $model->updateByPk($_POST['Assets']['AssetsId'], array(
		    'ElectronicEquipmentTotal' => ($_POST['electronic_cost']>0)?$_POST['electronic_cost']:0,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		$model->updateByPk($_POST['Assets']['AssetsId'], array(
		    'JewelryTotal' => ($_POST['jewellery_cost']>0)?$_POST['jewellery_cost']:0,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		$model->updateByPk($_POST['Assets']['AssetsId'], array(
		    'FurnitureTotal' => ($_POST['furniture_cost']>0)?$_POST['furniture_cost']:0,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));


		$AssetsInv = AssetsAnyOther::model()->find('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));

		if($AssetsInv){
			AssetsAnyOther::model()->deleteAll('AssetsId=:data', array(':data'=>@$_POST['Assets']['AssetsId']));
		}

		$model=new AssetsAnyOther;
		$_POST['oa']['Description'] = $_POST['other_asset_desc'];
		$_POST['oa']['Cost'] = ($_POST['other_asset_cost']>0)?$_POST['other_asset_cost']:0;

		$_POST['oa']['AssetsId'] = $_POST['Assets']['AssetsId'];
		
		$_POST['oa']['CerateAt'] = date("Y-m-d H:i:s");
		
		$model->attributes=$_POST['oa'];
		$model->save();

        $cost = '';
        $LiabilityId ='';
        $desc ='';


        //if($_POST['mortgages_cost']){

        	LiaMortgagesOnProperty::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));

        	$ModelName = 'LiaMortgagesOnProperty';
        	$cost = ($_POST['mortgages_cost']>0)?$_POST['mortgages_cost']:0;
        	$LiabilityId = $_POST['Liabilities']['LiabilityId'];
        	$desc = $_POST['mortgages_desc'];
        	$this->addLiability($ModelName,$LiabilityId,$desc,$cost);
        

        //if($_POST['unsecured_cost']){
        	LiaUnsecuredLoans::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));
        	$ModelName = 'LiaUnsecuredLoans';
        	$cost = ($_POST['unsecured_cost']>0)?$_POST['unsecured_cost']:0;
        	$LiabilityId = $_POST['Liabilities']['LiabilityId'];
        	$desc = $_POST['unsecured_desc'];
        	$this->addLiability($ModelName,$LiabilityId,$desc,$cost);
        //}


        //if($_POST['loan_cost']){
        	LiaBankLoans::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));
        	$ModelName = 'LiaBankLoans';
        	$cost = ($_POST['loan_cost']>0)?$_POST['loan_cost']:0;
        	$LiabilityId = $_POST['Liabilities']['LiabilityId'];
        	$desc = $_POST['loan_desc'];
        	$this->addLiability($ModelName,$LiabilityId,$desc,$cost);
        //}

        //if($_POST['Other_liab_cost']){
        	LiaOthersLoan::model()->deleteAll('LiabilityId=:data', array(':data'=>@$_POST['Liabilities']['LiabilityId']));
        	$ModelName = 'LiaOthersLoan';
        	$cost = ($_POST['Other_liab_cost']>0)?$_POST['Other_liab_cost']:0;
        	$LiabilityId = $_POST['Liabilities']['LiabilityId'];
        	$desc = $_POST['Other_liab_desc'];
        	$this->addLiability($ModelName,$LiabilityId,$desc,$cost);
        //}

        
		

		$model2=new Assets;
		$model2->updateByPk($_POST['Assets']['AssetsId'], array(
		    "MotorVehicleConfirm" => "Yes",
		    "MotorVehicleFOrT" => "Fraction",
		    "MotorVehicleTotal" => null,
		    "MultipleCar" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));
		


		
		

		$model2=new Assets;
		$model2->updateByPk($_POST['Assets']['AssetsId'], array(
		    "AgriculturePropertyConfirm" => "Yes",
		    "AgriculturePropertyFOrT" => "Fraction",
		    "AgriculturePropertyTotal" => null,
		    'LastUpdateAt' => date("Y-m-d H:i:s")
		));

		

		if(isset($_POST['total_asset_cost'])){
			//print_r($_POST);
			//die();
			//$newWealth = $_POST['total_asset_cost']-floatval($_POST['tota_liab_cost']);
			$newWealth = $_POST['total_asset_cost'];
			$model2 = new Assets;
			$model2->updateByPk($_POST['Assets']['AssetsId'], array(
			    "NetWealthTotal" => $newWealth,
			    "netWealthDetail"=>1,
			    'LastUpdateAt' => date("Y-m-d H:i:s")
			));
		}
		
		Yii::app()->user->setFlash('alert_success', Yii::t("common","Successfully Saved"));
        $this->redirect(array('/assetsSingle/entry', 'active'=>'1'));
		//$this->redirect(Yii::app()->baseUrl.'/index.php/assetsSingle/entry');

		

	}

	function addLiability($ModelName,$LiabilityId,$description,$cost){
		if($cost<0){
			$cost = 0;
		}
		$model=new $ModelName;
		$_POST['d']['LiabilityId'] = $LiabilityId;
		$_POST['d']['Description'] = $description;
		$_POST['d']['Cost'] = $cost;
		$_POST['d']['CerateAt'] = date("Y-m-d H:i:s");
		$model->attributes=$_POST['d'];
		$model->save();
	}

	
}
