<?php
ini_set("memory_limit", "-1");
set_time_limit (7200);
ini_set('max_execution_time', 7200);

class UpdateEtinController extends Controller
{
    public function actionChangeTin()
    {
        die();
        $sql = "SELECT CPIId FROM `personal_information` ORDER BY `CPIId`  ASC";
        $connection=Yii::app()->db;
        $command=$connection->createCommand($sql);
        $rows = $command->queryAll();

        foreach ($rows as $key => $value)
        {
           /* $modelUpdate=PersonalInformation::model()->findByPk($value['CPIId']);
            echo "<pre>CPIId=" . $value['CPIId'] . " = "; print_r(strlen($modelUpdate->ETIN)); echo "</pre>";*/
            $modelUpdate=PersonalInformation::model()->findByPk($value['CPIId']);
            if($modelUpdate->ETIN != null && $modelUpdate->ETIN != "" && strlen($modelUpdate->ETIN) < 20){
                $modelUpdate->ETIN = $this->_encode($modelUpdate->ETIN);
                // $modelUpdate->ETIN = $this->_decode($modelUpdate->ETIN);
            }
            if($modelUpdate->SpouseETIN != null && $modelUpdate->SpouseETIN != "" && strlen($modelUpdate->SpouseETIN) < 20){
                $modelUpdate->SpouseETIN = $this->_encode($modelUpdate->SpouseETIN);
                // $modelUpdate->SpouseETIN = $this->_decode($modelUpdate->SpouseETIN);
            }
            $modelUpdate->save(false);
            unset($modelUpdate);


        }
        
    }

}
