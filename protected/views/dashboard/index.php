
    <div class="maindashbord">
        <div id="home-mid" class="sticky-min-height2">
            <?php $fromSelection = $this->userFromSelection(Yii::app()->user->id,$this->taxYear()); 
                
             if(isset($fromSelection->type) && $fromSelection->type==2){
                 

                
            ?>
            <a href="<?php echo Yii::app()->baseUrl.'/index.php/personalInformation'; ?>">
                <div class="col-lg-4 home-mid-border view view-sixth">
                    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
                    <div class="progress" style="margin:5px;">
                        <div class="<?=($this->personalInformationStatusBar() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->personalInformationStatusBar();?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->personalInformationStatusBar();?>%;">
                            <b><?=$this->personalInformationStatusBar();  ?>%</b>
                        </div>
                    </div>
                    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

                <div class='home_icon-box home_icon-1'></div><h4><?php echo Yii::t('dashboard','Personal Information') ?></h4>

                <div class="mask">
                    <p></p>
                </div>

            </div>
        </a>

        <a href="<?php echo Yii::app()->baseUrl.'/index.php/income'; ?>">
            <div class="col-lg-4 home-mid-border view view-sixth">
                <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
                <div class="progress" style="margin:5px;">
                  <div class="<?=($this->incomeStatusBar() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->incomeStatusBar();?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->incomeStatusBar();?>%;">
                    <b><?=$this->incomeStatusBar(); ?>%</b>
                </div>
            </div>
            <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
            <div class='home_icon-box home_icon-2'></div><h4><?php echo Yii::t('dashboard','Income') ?></h4>
            <div class="mask">
                <p></p>
            </div>
        </div>
    </a>

    <a href="<?php echo Yii::app()->baseUrl.'/index.php/assets'; ?>">
        <div class="col-lg-4 home-mid-border view view-sixth">
            <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
            <div class="progress" style="margin:5px;">
              <div class="<?=($this->assetsStatusBar() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->assetsStatusBar()?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->assetsStatusBar()?>%;">
                <b><?=$this->assetsStatusBar()?>%</b>
            </div>
        </div>
        <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <div class='home_icon-box home_icon-3'></div><h4><?php echo Yii::t('dashboard','Assets') ?></h4>
        <div class="mask">
            <p></p>
        </div>
    </div>
    </a>

    

<div class="clearfix"></div>
<div class="dashbord-devider"></div>

    <a href="<?php echo Yii::app()->baseUrl.'/index.php/expenditure'; ?>">
        <div class="col-lg-4 home-mid-border home-mid-border-last view view-sixth">
            <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
            <div class="progress" style="margin:5px;">
              <div class="<?=($this->expenseStatusBar() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->expenseStatusBar()?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->expenseStatusBar()?>%;">
                <b><?=$this->expenseStatusBar()?>%</b>
            </div>
        </div>
        <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <div class='home_icon-box home_icon-4'></div><h4><?php echo Yii::t('dashboard','Expenses') ?> </h4>
        <div class="mask">
            <p></p>
        </div>
    </div>
</a>

<a href="<?php echo Yii::app()->baseUrl.'/index.php/liabilities'; ?>">
    <div class="col-lg-4 home-mid-border view view-sixth">
        <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <div class="progress" style="margin:5px;">
          <div class="<?=($this->liabilityStatusBar() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->liabilityStatusBar()?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->liabilityStatusBar()?>%;">
            <b><?=$this->liabilityStatusBar()?>%</b>
        </div>
    </div>
    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
    <div class='home_icon-box home_icon-5'></div><h4><?php echo Yii::t('dashboard','Liabilities') ?></h4>
    <div class="mask">
        <p></p>
    </div>
</div> 
</a>

<a href="<?php echo Yii::app()->baseUrl.'/index.php/finalReview'; ?>">
    <div class="col-lg-4 home-mid-border home-mid-border-last view view-sixth">
        <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <div class="" style="margin:5px;">
          <!-- <div class="<?=($this->expenseStatusBar() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 79%;"> -->
          <!-- <b>79%</b> -->
          <!-- </div> -->
      </div>
      <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
      <div class="home_icon-box home_icon-6" style="margin-top: 20px;"></div>
      <h4><?php echo Yii::t('dashboard','Final Review') ?></h4>
      <div class="mask">
        <p></p>
    </div>
</div>
</a>
<?php }

if(isset($fromSelection->type) && $fromSelection->type==1){ ?>
            <a href="<?php echo Yii::app()->baseUrl.'/index.php/singlepage/profile'; ?>">
                <div class="col-lg-4 home-mid-border view view-sixth">
                    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
                    <div class="progress" style="margin:5px;">
                        <div class="<?=($this->personalInformationStatusBarSingle() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->personalInformationStatusBarSingle();?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->personalInformationStatusBarSingle();?>%;">
                            <b><?=$this->personalInformationStatusBarSingle();  ?>%</b>
                        </div>
                    </div>
                    <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

                <div class='home_icon-box home_icon-1'></div><h4><?php echo Yii::t('dashboard','Personal Information') ?></h4>

                <div class="mask">
                    <p></p>
                </div>

            </div>
        </a>

        <a href="<?php echo Yii::app()->baseUrl.'/index.php/incomeSingle/entry'; ?>">
            <div class="col-lg-4 home-mid-border view view-sixth">
                <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
                <div class="progress" style="margin:5px;">
                  <div class="<?=($this->incomeStatusBarSingle() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->incomeStatusBarSingle();?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->incomeStatusBarSingle();?>%;">
                    <b><?=$this->incomeStatusBarSingle(); ?>%</b>
                </div>
            </div>
            <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
            <div class='home_icon-box home_icon-2'></div><h4><?php echo Yii::t('dashboard','Income') ?></h4>
            <div class="mask">
                <p></p>
            </div>
        </div>
    </a>

    <a href="<?php echo Yii::app()->baseUrl.'/index.php/assetsSingle/entry'; ?>">
        <div class="col-lg-4 home-mid-border view view-sixth">
            <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
            <div class="progress" style="margin:5px;">
              <div class="<?=($this->assetsStatusBarSingle() == 100) ? 'progress-bar progress-bar-success' : 'progress-bar progress-bar-danger'?>" role="progressbar" aria-valuenow="<?=$this->assetsStatusBarSingle()?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?=$this->assetsStatusBarSingle()?>%;">
                <b><?=$this->assetsStatusBarSingle()?>%</b>
            </div>
        </div>
        <!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <div class='home_icon-box home_icon-3'></div><h4><?php echo Yii::t('dashboard','Assets & Liabilities') ?></h4>
        <div class="mask">
            <p></p>
        </div>
    </div>
    </a>

    
<?php } ?>
<div class="clearfix"></div>
</div>
</div>
