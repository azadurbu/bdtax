<?php
/* @var $this DashboardController */

/*$this->breadcrumbs=array(
	'Dashboard',
    );*/


    ?> 

    <div class="maindashbord">
        <div id="home-mid">

            <a href="<?php echo Yii::app()->baseUrl.'/index.php/personalInformation'; ?>">
                <div class="col-lg-4 home-mid-border view view-sixth">


                <div class='home_icon-box home_icon-1'></div><h4><?php echo Yii::t('dashboard','Personal Information') ?></h4>

                    <div class="mask">
                        <p></p>
                    </div> 

                </div>
            </a>

            <a href="<?php echo Yii::app()->baseUrl.'/index.php/income'; ?>">
                <div class="col-lg-4 home-mid-border view view-sixth">

                <div class='home_icon-box home_icon-2'></div><h4><?php echo Yii::t('dashboard','Income') ?></h4>
                <div class="mask">
                    <p></p>
                </div>
            </div>
        </a>

        <a href="<?php echo Yii::app()->baseUrl.'/index.php/expenditure'; ?>">
            <div class="col-lg-4 home-mid-border home-mid-border-last view view-sixth">

            <div class='home_icon-box home_icon-4'></div><h4><?php echo Yii::t('dashboard','Expenses') ?></h4>
            <div class="mask">
                <p></p>
            </div>
        </div>
    </a>

    <div class="clearfix"></div>
    <div class="dashbord-devider"></div>

    <a href="<?php echo Yii::app()->baseUrl.'/index.php/assets'; ?>">
        <div class="col-lg-4 home-mid-border view view-sixth">

        <div class='home_icon-box home_icon-3'></div><h4><?php echo Yii::t('dashboard','Assets') ?></h4>
        <div class="mask">
            <p></p>
        </div>
    </div>
</a>

<a href="<?php echo Yii::app()->baseUrl.'/index.php/liabilities'; ?>">
    <div class="col-lg-4 home-mid-border view view-sixth">

    <div class='home_icon-box home_icon-5'></div><h4><?php echo Yii::t('dashboard','Liabilities') ?></h4>
    <div class="mask">
        <p></p>
    </div>
</div> 
</a>

<a href="<?php echo Yii::app()->baseUrl.'/index.php/dashboard'; ?>">
    <div class="col-lg-4 home-mid-border home-mid-border-last view view-sixth">

    <div class="home_icon-box home_icon-6"></div>
    <h4><?php echo Yii::t('dashboard','Final Review') ?></h4>
    <div class="mask">
        <p></p>
    </div>
</div>
</a>

<div class="clearfix"></div>
</div>
</div>
