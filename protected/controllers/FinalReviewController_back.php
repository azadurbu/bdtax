<?php

class FinalReviewController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/columnLess';
	public $defaultAction = 'finalReview';
	
	public $client_id= '498036518249-qae1j6s3pap96ncdre77km4l20mo38vb.apps.googleusercontent.com';
	public $client_secret='63VNZ4KHeiW6r9THE6lw6Mvr';
	public $redirect_uri='https://bdtax.com.bd/index.php/finalReview/googleRedirect';
	//public $redirect_uri='http://dev.bdtax.com.bd/index.php/finalReview/googleRedirect';
	//public $redirect_uri='http://localhost/bdtax/index.php/finalReview/googleRedirect';
	public $max_results = 500;

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
				'actions' => array('index', 'finalReview', 'finalPrint', 'viewPdf', 'finalPrintPDF', 'print', 'taxPrint', 'taxPdf', 'googleRedirect','func82bb'),
				'users' => array('@'),
				'expression' => '(Yii::app()->user->role==="superAdmin")||(Yii::app()->user->role==="customers")||(Yii::app()->user->role==="companyUser")||(Yii::app()->user->role==="companyAdmin")',
				),
			array('allow', 
				'actions' => array('GeneratePdfBDTAXg1g7B2Gn0oT2x0EUrN8g6bPKAtBNKv8r2NFiEfCjf7rRa4fTaBlrBDTAX'),
				'users' => array('*')
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
			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model,
			)
		);
	}


	public function actionViewPdf() {

		$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);
		if ($personal_info_model->ETIN == "") {
			Yii::app()->user->setFlash('error', "Please enter your E-TIN in personal section in order to Download PDF form.");
			$this->redirect(array('print'));
		}
	
		if (Yii::app()->user->role === "customers") {

			if ( isset(Yii::app()->user->org_id) ) {

				$org = Organizations::model()->findByPk(Yii::app()->user->org_id);

				if ( $org->org_plan == "Trial" ) {
					Yii::app()->user->setFlash('error', "The company is in trial period. The company needs to upgrade plan to download the PDF.");
					$this->redirect(array('print'));
				}
			}
			else {
				$role = Role::model()->find('role=:data',array(':data'=> Yii::app()->user->role));
				$payment = Payments::model()->findAll(
					array(
						'condition' => "role_id='".$role->id."' AND CPIId='".Yii::app()->user->CPIId."' AND user_id='".Yii::app()->user->id."' AND payment_year='".$this->taxYear()."' AND status = 'VALID' AND payment_year = '".$this->taxYear()."'" , 
						'order' => 'payment_date DESC'
					)
				);
				$amount = 0;
				foreach($payment as $d){
					$amount += $d->amount;
				}
				if(round($this->TaxLeviableOnTotalIncome(Yii::app()->user->CPIId)) > 0 && round($amount) < 799){
					$this->redirect(array('/payment'));
				}elseif(round($this->TaxLeviableOnTotalIncome(Yii::app()->user->CPIId)) <= 0 && round($amount) < 399){
					$this->redirect(array('/payment'));
				}
				// $payment = Payments::model()->find(
				// 	array(
				// 		'condition' => "role_id='".$role->id."' AND CPIId='".Yii::app()->user->CPIId."' AND user_id='".Yii::app()->user->id."' AND payment_year='".$this->taxYear()."' AND status = 'VALID' ", 
				// 		'order' => 'payment_date DESC'
				// 		)
				// 	);
				// if ($payment == null) {
				// 	//Yii::app()->user->setFlash('payment_error', "You have to complete the payment to download PDF");
				// 	$this->redirect(array('/payment'));
				// }
			}
			
		}
		if (Yii::app()->user->role === "companyAdmin" || Yii::app()->user->role === "companyUser") {
			
			if (Yii::app()->user->org_plan == "Trial") {
				Yii::app()->user->setFlash('error', "You are in the trial period. Please choose a plan to download the PDF.");
				$this->redirect(array('print'));
			}
		}

		$this->layout='//layouts/print';

		
		

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_house_model=IncomeHouseProperties::model()->findAll('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_82c=Income82c::model()->find('CPIId=:data AND EntryYear=:data2 AND IncomeId=:data3',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear(), ':data3'=>@$income_model->IncomeId));

		$IncomeOtherSourceData = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$income_model->IncomeId));

		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));
		
		$asset_jewellery_model = AssetsJewelry::model()->findAllByAttributes(array('AssetsId'=>$asset_model->AssetsId));
		
		$income_businesss_profession_details = IncIncomeBusinessOrProfessionDetails::model()->findAll('IncomeId=:data', array(':data' =>@$income_model->IncomeId));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		// var_dump(Yii::app()->user->CPIId);die;

		// $model = new PersonalInformation;
		$personal_info_model->total_tax_due = $this->netPayableTax(Yii::app()->user->CPIId);
		$personal_info_model->save(false);


		$data82bb_info = Data82bb::model()->findByAttributes(array('userid'=>Yii::app()->user->id, 'cpiid'=>Yii::app()->user->CPIId));

		$pdfFileName = preg_replace('/\s+/', '', $personal_info_model->Name).'_'.$this->_decode($personal_info_model->ETIN).'_'.$this->taxYear().'_'.date('Ymd').'.pdf';
 // $html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en');
        // $html2pdf->WriteHTML($this->renderPartial('index', array(), true));
        // $html2pdf->Output();		

		$html2pdf = Yii::app()->ePdf->mpdf('P', 'A4');
		//$html2pdf->showImageErrors = true;
		$html2pdf->SetFont('100');
		$html2pdf->SetDefaultFont('Times New Roman'); 
		$html2pdf->SetDefaultFontSize('3');
		$html2pdf->setFooter('{PAGENO}');
		
		// $html2pdf->SetTitle($pdfFileName);

		// $html2pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$signature = $this->userCurrentSignature();

		$html2pdf->WriteHTML($this->render('finalPrintPDF', array(
			'personal_info_model'=>$personal_info_model,
			'income_model'=>$income_model,
			'income_salaries_model'=>$income_salaries_model,
			'income_house_model'=>$income_house_model,
			'income_rebate_model'=>$income_rebate_model,
			'income_businesss_profession_details'=>$income_businesss_profession_details,
			'income_82c'=>$income_82c,
			'data82bb_info'=>$data82bb_info,
			'CalculationModel'=>$CalculationModel,
			'asset_jewellery_model'=>$asset_jewellery_model,
			//'TaxPercentAmount'=>$TaxPercentAmount,
			'html2pdf'=>$html2pdf,
			'signature'=>$signature,
			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model
			), true));


	        # Outputs ready PDF
		$html2pdf->Output($pdfFileName, 'I');
		$this->saveUserPdfStatistic();
	}

/*
	public function actionViewPdf() {

		$this->layout='//layouts/print';

		$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);

		// ************* Income Module ****************** //
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

		// ************* Assets Module ****************** //
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		// ************* Expence Module ****************** //
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		// ************* Liabilities Module ****************** //
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

*/
	public function actionTaxPdf($id) {
		die("Tax Pdf");
		$this->layout='//layouts/print';

		$personal_info_model=$this->loadPersonalModelByCPIId($id);

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));

		$income_house_model=IncomeHouseProperties::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$id, ':data2'=>$this->taxYear()));

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
			->andWhere	('OutsideBusinessType=:OutsideBusinessType', array(':OutsideBusinessType'=>$businessType))
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
		$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);
		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));
		
		$GrandTotalPayableTax = round($this->netPayableTax(Yii::app()->user->CPIId));
		$tds = @$this->totalOutputInNumber($income_model, 'IncomeTaxDeductedAtSource') + @$income_model->Income82cTdsTotal;

		$totalAdjustment = ($GrandTotalPayableTax - (@$tds + @$this->totalOutputInNumber($income_model, 'IncomeTaxInAdvance') + @$income_model->AdjustmentTaxRefund));

		// var_dump($totalAdjustment);die;

		if ($totalAdjustment < 0) $totalAdjustment = 0;
		
// ##########################    REFER TO A FRIEND FROM GMAIL ##########################
		// ##########################  FROM SUBMIT ##########################
		if (isset($_POST['referFriendSubmit'])) {
			if (isset($_POST['email_address']) && count($_POST['email_address'] > 0)) {
				foreach ($_POST['email_address'] as $email) {
					$this->createEmail(trim($email));
				}
				Yii::app()->user->setFlash('success', Yii::t("assets","An email with refer link has been sent to your friend(s)."));
				$this->redirect(array('print'));
			}
			else {
				Yii::app()->user->setFlash('error', Yii::t("assets","You did not select any email address."));
				$this->redirect(array('print'));
			}
			
		}
		// ########################## END OF FROM SUBMIT ##########################
		$referEmails = NULL;
		if (isset($_SESSION['google_code']) && $_SESSION['google_code'] != "")
		{
			$auth_code = $_SESSION['google_code'];
			unset($_SESSION['google_code']);
			$fields=array(
				'code'=>  urlencode($auth_code),
				'client_id'=>  urlencode($this->client_id),
				'client_secret'=>  urlencode($this->client_secret),
				'redirect_uri'=>  urlencode($this->redirect_uri),
				'grant_type'=>  urlencode('authorization_code')
				);
			$post = '';
			foreach($fields as $key=>$value) { $post .= $key.'='.$value.'&'; }
			$post = rtrim($post,'&');
			
			$curl = curl_init();
			curl_setopt($curl,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token');
			curl_setopt($curl,CURLOPT_POST,5);
			curl_setopt($curl,CURLOPT_POSTFIELDS,$post);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,TRUE);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,FALSE);
			$result = curl_exec($curl);
			curl_close($curl);
			
			$response =  json_decode($result);
			if (isset($response->error)) {
				Yii::app()->user->setFlash('error', Yii::t("assets", "'" .$response->error."' error occurs from Google. " . $response->error_description));
				//$referEmails = [];
				$this->redirect(array('print'));
			} else {
				$accesstoken = $response->access_token;
				
				
				
				$url = 'https://www.google.com/m8/feeds/contacts/default/full?v=3.0&max-results='.$this->max_results.'&oauth_token='.$accesstoken;
				$xmlresponse =  $this->curl_file_get_contents($url);
				
				if((strlen(stristr($xmlresponse,'Authorization required'))>0) && (strlen(stristr($xmlresponse,'Error '))>0)) //At times you get Authorization error from Google.
				{
					Yii::app()->user->setFlash('error', Yii::t("assets","Authorization error from Google. Failed to sent invitation."));
					//$referEmails = [];
					$this->redirect(array('print'));
				}
				else {
					$xml =  new SimpleXMLElement($xmlresponse);
					$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
					$referEmails = $xml->xpath('//gd:email');
				}
			}
			
			
		}
		else {
			$referEmails = [];
		}
// ##########################   END - REFER TO A FRIEND FROM GMAIL ##########################

		

		//PAYMENT CHECK
		$openInNewTab = true;
		if (Yii::app()->user->role === "customers") {
			if ( isset(Yii::app()->user->org_id) ) {

				$org = Organizations::model()->findByPk(Yii::app()->user->org_id);

				if ( $org->org_plan == "Trial" ) {
					$openInNewTab = false;
				}
			}
			else {
				$role = Role::model()->find('role=:data',array(':data'=> Yii::app()->user->role));
				$payment = Payments::model()->findAll(
					array(
						'condition' => "role_id='".$role->id."' AND CPIId='".Yii::app()->user->CPIId."' AND user_id='".Yii::app()->user->id."' AND payment_year='".$this->taxYear()."' AND status = 'VALID' ", 
						'order' => 'payment_date DESC'
						)
					);
				if ($payment != null) {
					$amount = 0;
					foreach($payment as $d){
						$amount += $d->amount;
					}
					if(round($this->TaxLeviableOnTotalIncome(Yii::app()->user->CPIId)) > 0 && round($amount) < 799){
						$openInNewTab = false;
					}elseif(round($this->TaxLeviableOnTotalIncome(Yii::app()->user->CPIId)) <= 0 && round($amount) < 399){
						$openInNewTab = false;
					}
				}else{
					$openInNewTab = false;
				}
			}
			
		}
		//END OF PAYMENT CHECK
		//$userPayId = $this->getUserPayId();
	

		$userPlan = $this->userCurrentPlan();


		$userStatistic = UsersStatistic::model()->find('CPIId=:data1', array(':data1'=>Yii::app()->user->CPIId));
		$data82bb = Data82bb::model()->findByAttributes(array('userid'=>Yii::app()->user->id, 'cpiid'=>Yii::app()->user->CPIId));
		$this->render('print',array('totalAdjustment'=>$totalAdjustment, 'personal_info_model'=>$personal_info_model, 'referEmails' => $referEmails, 'openInNewTab' => $openInNewTab, 'userStatistic' => $userStatistic, 'data82bb' => $data82bb,'UserPlan'=>$userPlan));
	}

	function actionGoogleRedirect() { 
		if (isset($_GET["code"]) && $_GET["code"] != "")
		{
			$_SESSION['google_code'] = $_GET["code"];
			echo "<script>window.opener.location.reload(); window.close();</script>";
		}
		else {
			echo "<script>window.opener.location.reload(); window.close();</script>";
		}
	}

	
	public function curl_file_get_contents($url)
	{
		$curl = curl_init();
		$userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';

		curl_setopt($curl,CURLOPT_URL,$url);	//The URL to fetch. This can also be set when initializing a session with curl_init().
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);	//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);	//The number of seconds to wait while trying to connect.	
		
		curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);	//The contents of the "User-Agent: " header to be used in a HTTP request.
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);	//To follow any "Location: " header that the server sends as part of the HTTP header.
		curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);	//To automatically set the Referer: field in requests where it follows a Location: redirect.
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);	//The maximum number of seconds to allow cURL functions to execute.
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);	//To stop cURL from verifying the peer's certificate.
		
		$contents = curl_exec($curl);
		curl_close($curl);
		return $contents;
	}
	
	public function createEmail($email) {
		$mailBody= '<div id=":fz" class="a3s" style="overflow: hidden;">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> 
			<tbody> <tr> <td>
				<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#f8f8f8" width="600"> 
					<tbody>
						<tr> <td align="center" style="color:#ffffff;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;padding:20px 0;background-color:#FFF" valign="middle"> <img src="https://bdtax.com.bd/img/logo.png" class="CToWUd"></td> </tr> 
						<tr> <td height="20">&nbsp;</td> </tr> 
						<tr> 
							<td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;"> 
								<p>
									Hello! I just prepared my income tax return with BDTax. It\'s accurate, secure, affordable, and super easy to use. You should try it too by visiting <a href="https://bdtax.com.bd/" target="_blank">www.bdtax.com.bd</a>, it\'s free to start!
								</p>
							</td> 
							<tr> 
								<td align="center" style="color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif;font-size:13px;padding:0 20px" valign="middle">
									If you need any help to login or have any questions, please email us at <a href="mailto:support@bdtax.com.bd" style="color:#009307" target="_blank">support@bdtax.com.bd</a>
								</td> 
							</tr>
							<tr> <td style="padding: 15px; text-align: justify; text-justify: inter-word; color:#444444;font-family:Open Sans,Arial,Helvetica,sans-serif; font-size:14px;">&nbsp;</td> </tr>
						</tbody> 
					</table> </td> </tr> 
				</tbody>
			</table> 
		</div>';

		UserModule::sendMail($email, "Your friend, " . Yii::app()->user->first_name . " " . Yii::app()->user->last_name . " wants you to try bdtax.com.bd.", $mailBody);
		
	}

	
// Test url http://localhost/bdtax_latest/index.php/finalReview/GeneratePdfBDTAXg1g7B2Gn0oT2x0EUrN8g6bPKAtBNKv8r2NFiEfCjf7rRa4fTaBlrBDTAX?start=1&end=10&year=2017-2018&replace=no
	public function actionGeneratePdfBDTAXg1g7B2Gn0oT2x0EUrN8g6bPKAtBNKv8r2NFiEfCjf7rRa4fTaBlrBDTAX() {
		
		if ( !isset($_GET['start']) || !isset($_GET['end']) || !isset($_GET['year']) || !isset($_GET['replace']) ) {
			die("Parameters are missing");
		}
		ini_set('max_execution_time', 180000);

		$start = $_GET['start'];
		$end = $_GET['end'];
		$year = $_GET['year'];

		$pi = Yii::app()->db->createCommand()
		->selectDistinct('personal_information.CPIId')
		->from('personal_information')
		->join('payments','payments.CPIId = personal_information.CPIId AND payments.payment_year = "'.$year.'" AND payments.status ="VALID"')
		->where('personal_information.CPIId >= :start', array(':start'=>$start))
		->andWhere('personal_information.CPIId <= :end', array(':end'=>$end))
		->order('personal_information.CPIId')
		->queryAll();

		foreach ($pi as $key => $value) {
			
###############################################################################	
			Yii::app()->user->setState('CPIId', $value['CPIId']);
			Yii::app()->user->setState('TAX_YEAR', $year);

			if ( $this->personalInformationStatusBar() < 100) continue;

			$dir = "downloaded-pdf/" . Yii::app()->user->TAX_YEAR;
			$fileName = $dir . "/" . Yii::app()->user->CPIId . "_" . Yii::app()->user->TAX_YEAR . ".pdf";
			if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			if (file_exists($fileName) && $_GET['replace'] == "no") {
				echo "<pre>";
				print_r($fileName . " - skipped. already exists. <br>");
				echo "</pre>";
				continue;
			}
			if (file_exists($fileName) && $_GET['replace'] == "yes") { 
				@unlink($fileName);
			}

###############################################################################

		$this->layout='//layouts/print';

		$personal_info_model=$this->loadPersonalModelByCPIId(Yii::app()->user->CPIId);

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$this->taxYear() ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_house_model=IncomeHouseProperties::model()->findAll('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear()));

		$income_82c=Income82c::model()->find('CPIId=:data AND EntryYear=:data2 AND IncomeId=:data3',array(':data'=>Yii::app()->user->CPIId, ':data2'=>$this->taxYear(), ':data3'=>@$income_model->IncomeId));

		$IncomeOtherSourceData = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$income_model->IncomeId));

		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear(), 'trash' => 0));

		$income_businesss_profession_details = IncIncomeBusinessOrProfessionDetails::model()->findAll('IncomeId=:data', array(':data' =>@$income_model->IncomeId));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));


		// var_dump(Yii::app()->user->CPIId);die;

		// $model = new PersonalInformation;
		$personal_info_model->total_tax_due = $this->netPayableTax(Yii::app()->user->CPIId);
		$personal_info_model->save(false);

		

 // $html2pdf = Yii::app()->ePdf->HTML2PDF('P','A4','en');
        // $html2pdf->WriteHTML($this->renderPartial('index', array(), true));
        // $html2pdf->Output();		

		$html2pdf = Yii::app()->ePdf->mpdf('P', 'A4');
		//$html2pdf->showImageErrors = true;
		$html2pdf->SetFont('100');
		$html2pdf->SetDefaultFont('Times New Roman'); 
		$html2pdf->SetDefaultFontSize('3');
		$html2pdf->setFooter('{PAGENO}');

		// $html2pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$html2pdf->WriteHTML($this->render('finalPrintPDF', array(
			'personal_info_model'=>$personal_info_model,
			'income_model'=>$income_model,
			'income_salaries_model'=>$income_salaries_model,
			'income_house_model'=>$income_house_model,
			'income_rebate_model'=>$income_rebate_model,
			'income_businesss_profession_details'=>$income_businesss_profession_details,
			'income_82c'=>$income_82c,
			'CalculationModel'=>$CalculationModel,
			//'TaxPercentAmount'=>$TaxPercentAmount,
			'html2pdf'=>$html2pdf,

			'asset_model'=>$asset_model,
			'expence_model'=>$expence_model,
			'liability_model'=>$liability_model,
			), true));

			
	        # Outputs ready PDF
			$html2pdf->Output($fileName, 'F');
			echo "<pre>";
			print_r($fileName . " - completed <br>");
			echo "</pre>";
			
		}
		
	}

	/*function actionDownloadPDF() { 
		header("Content-type:application/pdf");

		$email = explode("@", Yii::app()->user->email);
		
		$newFile = urlencode($email[0]."_".$_GET['year']."_".date("M-d-y").".pdf");
		
		header("Content-Disposition:attachment;filename=".$newFile);
		$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];

		$fileName = Yii::app()->user->CPIId . "_" . $_GET['year'] . ".pdf";
		$file = $root . Yii::app()->baseUrl . "/downloaded-pdf/" . $_GET['year'] . "/" . $fileName;
		readfile($file);
		flush();
	}*/
	function actionfunc82bb($check){
		$model = Data82bb::model()->findByAttributes(array('userid'=>Yii::app()->user->id, 'cpiid'=>Yii::app()->user->CPIId, 'EntryYear' => $this->taxYear()));

		if($model == null){
			$model=new Data82bb;
			$model->userid = Yii::app()->user->id;
			$model->cpiid = Yii::app()->user->CPIId;
			$model->EntryYear = $this->taxYear();
			$model->checked = $check;
		}else{
			$model->checked = $check;
		}	
		$model->save(false);
	}
}
