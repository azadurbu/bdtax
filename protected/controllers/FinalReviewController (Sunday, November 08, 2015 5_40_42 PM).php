<?php

class FinalReviewController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/columnLess';
	public $defaultAction = 'finalReview';

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array('accessControl',); // perform access control for CRUD operations

	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('index', 'finalReview', 'finalPrint', 'viewPdf', 'finalPrintPDF', 'print', 'taxPrint', 'taxPdf'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
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

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/


	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Liabilities');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	public function actionFinalReview()
	{
		$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$TaxPercentAmount['10'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>10, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['15'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>15, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['20'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>20, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['25'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>25, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['30'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>30, ':data1'=>$this->taxYear()))->Amount;
		
		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		$this->render('finalReview',array(
			'personal_info_model'=>$personal_info_model,
			'income_model'=>$income_model,
			'CalculationModel'=>$CalculationModel,
			'TaxPercentAmount'=>$TaxPercentAmount,
			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model,
			)
		);
	}



	public function actionFinalPrint()
	{
		$this->layout='//layouts/print';

		$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_house_model=IncomeHouseProperties::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$TaxPercentAmount['10'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>10, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['15'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>15, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['20'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>20, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['25'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>25, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['30'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>30, ':data1'=>$this->taxYear()))->Amount;
		
		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		$this->render('finalPrint',array(
			'personal_info_model'=>$personal_info_model,
			'income_model'=>$income_model,
			'income_salaries_model'=>$income_salaries_model,
			'income_house_model'=>$income_house_model,
			'income_rebate_model'=>$income_rebate_model,
			'CalculationModel'=>$CalculationModel,
			'TaxPercentAmount'=>$TaxPercentAmount,

			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model,
			)
		);
	}


	public function actionTaxPrint($id)
	{
		$givenCPIID = $id;
		$this->layout='//layouts/print';

		$personal_info_model=$this->loadPersonalModelByCPIId($givenCPIID);

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$givenCPIID, ':data2'=>$this->taxYear()));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$givenCPIID, ':data2'=>$this->taxYear()));

		$income_house_model=IncomeHouseProperties::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$givenCPIID, ':data2'=>$this->taxYear()));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$givenCPIID, ':data2'=>$this->taxYear()));

		$TaxPercentAmount['10'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>10, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['15'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>15, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['20'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>20, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['25'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>25, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['30'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>30, ':data1'=>$this->taxYear()))->Amount;
		
		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>$givenCPIID, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>$givenCPIID, 'EntryYear' => $this->taxYear()));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>$givenCPIID, 'EntryYear' => $this->taxYear()));

		$this->render('finalPrint',array(
			'personal_info_model'=>$personal_info_model,
			'income_model'=>$income_model,
			'income_salaries_model'=>$income_salaries_model,
			'income_house_model'=>$income_house_model,
			'income_rebate_model'=>$income_rebate_model,
			'CalculationModel'=>$CalculationModel,
			'TaxPercentAmount'=>$TaxPercentAmount,

			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model,
			)
		);
	}


	public function actionViewPdf() {

		$this->layout='//layouts/print';

		$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_house_model=IncomeHouseProperties::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$TaxPercentAmount['10'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>10, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['15'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>15, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['20'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>20, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['25'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>25, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['30'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>30, ':data1'=>$this->taxYear()))->Amount;
		
		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));
		

		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
			// $mPDF1->SetFont('100');
			//$mPDF1->SetDefaultFont('serif');
			//$mPDF1->SetDefaultFontSize('3');
		$mPDF1->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$mPDF1->WriteHTML($this->render('finalPrintPDF', array(
			'personal_info_model'=>$personal_info_model,
			'income_model'=>$income_model,
			'income_salaries_model'=>$income_salaries_model,
			'income_house_model'=>$income_house_model,
			'income_rebate_model'=>$income_rebate_model,
			'CalculationModel'=>$CalculationModel,
			'TaxPercentAmount'=>$TaxPercentAmount,

			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model,
			), true));


	        # Outputs ready PDF
		$mPDF1->Output();
	}


	public function actionTaxPdf($id) {

		$this->layout='//layouts/print';

		$personal_info_model=$this->loadPersonalModelByCPIId($id);

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));

		$income_house_model=IncomeHouseProperties::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));

		$TaxPercentAmount['10'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>10, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['15'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>15, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['20'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>20, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['25'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>25, ':data1'=>$this->taxYear()))->Amount;
		$TaxPercentAmount['30'] = IncomeTaxPercentAmount::model()->find('Percent=:data AND EntryYear=:data1', array(':data'=>30, ':data1'=>$this->taxYear()))->Amount;
		
		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>$id, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>$id, 'EntryYear' => $this->taxYear()));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>$id, 'EntryYear' => $this->taxYear()));
		

		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
			// $mPDF1->SetFont('100');
			//$mPDF1->SetDefaultFont('serif');
			//$mPDF1->SetDefaultFontSize('3');
		$mPDF1->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$mPDF1->WriteHTML($this->render('finalPrintPDF', array(
			'personal_info_model'=>$personal_info_model,
			'income_model'=>$income_model,
			'income_salaries_model'=>$income_salaries_model,
			'income_house_model'=>$income_house_model,
			'income_rebate_model'=>$income_rebate_model,
			'CalculationModel'=>$CalculationModel,
			'TaxPercentAmount'=>$TaxPercentAmount,

			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model,
			), true));


	        # Outputs ready PDF
		$mPDF1->Output();
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/

	public function loadPersonalModelByCPIId($id)
	{
		$model=PersonalInformation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModel($id)
	{
		$model=Liabilities::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='liabilities-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	function totalOutput($model,$val){
		if($model === null) {
			return Yii::t("income", "Not answered yet");
		}else {
			$Confirm 	= $val.'Confirm';
			$FOrT 		= $val.'FOrT';
			$sumOf 		='SumOf'.$val;
			$Inc='Inc'.$val;

			if($model->$Confirm == "Yes") {
				if ($model->$FOrT=="Total") {
					return $val2 = $model->$val.$this->currency;
				}
				elseif($model->$FOrT == "Fraction") {
					return $val2 = $Inc::model()->find(array(  'select'=>'SUM(Cost) as '.$sumOf, 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->$sumOf.$this->currency;
				}
				else {
					return Yii::t("income", "Not answered yet");
				}
			}
			elseif($model->$Confirm == "No") {
				return Yii::t("income", "You chose No");
			}
			else {
				return Yii::t("income", "Not answered yet");
			}
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

	function sum_of_investment($assetId, $investmentType = '', $table) {
		if($investmentType == '') {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('AssetsId=:AssetsId', array(':AssetsId'=>$assetId))
			->queryRow();

			return $cost['Cost'];
		} else {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('AssetsId=:AssetsId', array(':AssetsId'=>$assetId)) 
			->andWhere	('InvestmentType=:InvestmentType', array(':InvestmentType'=>$investmentType))
			->queryRow();

			return $cost['Cost'];
		}
	}
	
	function sum_of_business($assetId, $businessType = '', $table) {
		if($businessType == '') {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('AssetsId=:AssetsId', array(':AssetsId'=>$assetId))
			->queryRow();

			return $cost['Cost'];
		} else {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('AssetsId=:AssetsId', array(':AssetsId'=>$assetId)) 
			->andWhere	('OutsideBusinessType=:OutsideBusinessType', array(':OutsideBusinessType'=>$assetId))
			->queryRow();

			return $cost['Cost'];
		}
	}

	function sum_of_motor($assetId, $table) {
		$cost = Yii::app()->db->createCommand()
		->select('SUM(MVValue) AS MVValue')
		->from($table)
		->where('AssetsId=:AssetsId', array(':AssetsId'=>$assetId))
		->queryRow();

		return $cost['MVValue'];
	}

	function actionPrint() {
		$this->render('print',[]);
	}

}
