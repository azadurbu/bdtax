<?php

class GetPdfContentController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/empty';
	public $defaultAction = 'Index';
	
	
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

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/

public function loadPersonalModelByCPIId($id)
	{
		$model=PersonalInformation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
/*http://dev.bdtax.com.bd/index.php/getPdfContent/ViewPdfasdertuyjnmgndfmgbnkkjitjertierbkjbgdogbdtertnekl*/
public function actionViewPdfasdertuyjnmgndfmgbnkkjitjertierbkjbgdogbdtertnekl() {
        //echo Yii::app()->user->CPIId;
        //exit();
        
        $CPIID = $_GET['cpiid'];
        $taxYear = $_GET['taxYear'];
        $userId = $_GET['userId'];

        $allPaymentThisYear = Payments::model()->findAll(
					array(
						'condition' => "CPIId='".$CPIID."' AND user_id='".$userId."' AND payment_year='".$taxYear."' AND status = 'VALID' ", 
						'order' => 'payment_date DESC'
						)
					);

        if(!$allPaymentThisYear){

        	echo 'Invalid';
        	die();
        } 

		$personal_info_model=$this->loadPersonalModelByCPIId($CPIID);
		
		$userSelection =$this->userFromSelection($userId,$taxYear);
                        //print_r($userSelection);
                       // die();
        $theme = 'finalPrintPDF';              
        if($userSelection){
            if(isset($userSelection->type) && $userSelection->type==1){
                $theme = 'finalPrintPDFSingle';
            }
            
        }
		
	
		

		$this->layout='//layouts/empty';

		
		

		/* ************* Income Module ****************** */
		$CalculationModel = CalculationDataSource::model()->find('EntryYear=:data',array(':data'=>$taxYear ));

		$income_model=Income::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$CPIID, ':data2'=>$taxYear));

		$income_salaries_model=IncomeSalaries::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$CPIID, ':data2'=>$taxYear));

		$income_house_model=IncomeHouseProperties::model()->findAll('CPIId=:data AND EntryYear=:data2',array(':data'=>$CPIID, ':data2'=>$taxYear));
		
		$income_rebate_model=IncomeTaxRebate::model()->find('CPIId=:data AND EntryYear=:data2',array(':data'=>$CPIID, ':data2'=>$taxYear));

		$income_82c=Income82c::model()->find('CPIId=:data AND EntryYear=:data2 AND IncomeId=:data3',array(':data'=>$CPIID, ':data2'=>$taxYear, ':data3'=>@$income_model->IncomeId));

		$IncomeOtherSourceData = IncIncomeOtherSource::model()->find('IncomeId=:data', array(':data' => @$income_model->IncomeId));

		/* ************* Assets Module ****************** */
		$asset_model=Assets::model()->findbyattributes(array('CPIId'=>$CPIID, 'EntryYear' => $taxYear, 'trash' => 0));
		if(isset($asset_model->AssetsId)){
		    $asset_jewellery_model = AssetsJewelry::model()->findAllByAttributes(array('AssetsId'=>$asset_model->AssetsId));
		}else{
			$asset_jewellery_model = array();
		}
		
		$income_businesss_profession_details = IncIncomeBusinessOrProfessionDetails::model()->findAll('IncomeId=:data', array(':data' =>@$income_model->IncomeId));

		/* ************* Expence Module ****************** */
		$expence_model=Expenditure::model()->findbyattributes(array('CPIId'=>$CPIID, 'EntryYear' => $taxYear));

		/* ************* Liabilities Module ****************** */
		$liability_model=Liabilities::model()->findbyattributes(array('CPIId'=>$CPIID, 'EntryYear' => $taxYear));

		$taxAmountArray = $this->netPayableTax($CPIID,$taxYear);
		$personal_info_model->total_tax_due = $taxAmountArray['taxamount'];
		//$personal_info_model->total_tax_due = $this->netPayableTax($CPIID,$taxYear);
		$personal_info_model->save(false);


		$data82bb_info = Data82bb::model()->findByAttributes(array('userid'=>$userId, 'cpiid'=>$CPIID,'EntryYear'=>$taxYear));

		$pdfFileName = preg_replace('/\s+/', '', $personal_info_model->Name).'_'.$this->_decode($personal_info_model->ETIN).'_'.$taxYear.'_'.date('Ymd').'.pdf';
 
		$signature = $this->userCurrentSignature($userId);
		/*$userFiles = $this->getUserFiles();
        foreach ($userFiles as $files) {
        	$uF = explode('.', $files->file_path);
        	if(strtolower($uF[count($uF)-1])=='pdf'){
        		 $files->file_path;
        	}
        }*/
        $html2pdf = Yii::app()->ePdf->mpdf('P', 'A4');

		//$html2pdf->showImageErrors = true;
		$html2pdf->SetFont('100');
		$html2pdf->SetDefaultFont('Times New Roman'); 
		$html2pdf->SetDefaultFontSize('3');
		$html2pdf->setFooter('{PAGENO}');
        $pdfContent = $this->render($theme, array(
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
			'liability_model'=>$liability_model,
			'ctaxYear'=> $taxYear,
			'ccpiid' => $CPIID,
			'cuserid' => $userId
			), true);

        
//$arrycontent = explode('<!--***-->', $pdfContent);

echo $pdfContent;


}


function Asum_of_particular_field($model, $field, $table) {


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


	function Lsum_of_particular_field($model, $field, $table) {
	if($model == null) return Yii::t("liability", "Not answered yet");
	if($model->{$field."Confirm"} == "Yes") {
		if($model->{$field."FOrT"} == "Total") {
			return $model->{$field."Total"};
		}
		elseif($model->{$field."FOrT"} == "Fraction") {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('LiabilityId=:LiabilityId', array(':LiabilityId'=>$model->LiabilityId)) 
			->queryRow();
			return $cost['Cost'];
		}
		else {
			return Yii::t("liability", "Not answered yet");
		}
	}
	elseif($model->{$field."Confirm"} == "No") {
		return Yii::t("liability", "You chose No");
	}
	else {
		return Yii::t("liability", "Not answered yet");
	}
}


function Esum_of_particular_field($model, $field, $table) {
	if($model == null) return Yii::t("expense", "Not answered yet");
	if($model->{$field."Confirm"} == "Yes") {
		if($model->{$field."FOrT"} == "Total") {
			return $model->{$field."Total"};
		}
		elseif($model->{$field."FOrT"} == "Fraction") {
			$cost = Yii::app()->db->createCommand()
			->select('SUM(Cost) AS Cost')
			->from($table)
			->where('ExpenditureId=:ExpenditureId', array(':ExpenditureId'=>$model->ExpenditureId)) 
			->queryRow();
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

function sum_of_motor($assetId, $table) {
		$cost = Yii::app()->db->createCommand()
		->select('SUM(MVValue) AS MVValue')
		->from($table)
		->where('AssetsId=:AssetsId', array(':AssetsId'=>$assetId))
		->queryRow();

		return $cost['MVValue'];
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





}

	

