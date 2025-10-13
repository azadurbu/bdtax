
<div class="container">
  <div role="tabpanel" class="tab-pane" id="pdf">

                <div class="row">
                    <div class="col-lg-12 center">
                        <h2><?=Yii::t("user","Download Tax Return Form")?>&nbsp;&nbsp;</h2>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2" style="padding-top: 6px;">
                        <b><?=Yii::t("user","Download PDF of")?>&nbsp;&nbsp;</b>
                    </div>
                    <div class="col-lg-2">
                        <?=CHtml::dropDownList('tax_year', $this->taxYear(), CHtml::listData(TaxYears::model()->findAll(), 'tax_year', 'tax_year'), array('class' => 'form-control'));?>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-success btn-large" onClick="downloadPDF('<?=Yii::app()->user->CPIId?>')"><?=Yii::t("user","Download")?>&nbsp;&nbsp;</button>
                    </div>
                </div>
                <br><br>

            </div>
</div>

<script>
function downloadPDF(CPIId) {
  var url = window.location.origin + "<?=Yii::app()->baseUrl;?>" + "/downloaded-pdf/download.php?year="+$("#tax_year").val();
  window.open(url);
}
</script>
