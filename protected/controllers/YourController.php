<?php

class YourController extends Controller
{
    public $defaultAction = 'shop';

    public function actionShop($name) {
        $this->layout = '/layouts/column1';

//        $id=$_GET['id'];
        $id=$name;


        $model_shop = Shops::model()->find('shop_name=:data', array(':data' => $id));

        $model = Product::model()->findAll('shop_id=:data', array(':data' => $model_shop->id));
        $model_market = AdminMarket::model()->find('id=:data', array(':data' => $model_shop->market_id));
        $category = AdminProductType::model()->findAll( );
        $shops = Shops::model()->findAll( );


        $this->render('shop_view',array(
            'model'=>$model,
            'category'=>$category,
            'modelShop'=>$model_shop,
            'modelMarket'=>$model_market,
            'shops'=>$shops,
            'shopName'=>$name,
            ));

    }

    public function actionMinVsMax($shopName, $min=null, $max=null) {
//        $this->layout = '/layouts/column2_frontend';
        $this->layout = '/layouts/column1';
        $shopId=$shopName;

        if ($min=='undefined'|| empty($min)) { $min=0;}
        if ($max=='undefined'|| empty($max)) { $max=0;}
        if ($shopId=='undefined'|| empty($max)) { $shopId='';}

        $criteria= new CDbCriteria();
        $criteria->addSearchCondition('shop_id',$shopId);
        $criteria->addCondition('product_price >= '.$min);
        $criteria->addCondition('product_price <= '.$max);

        $criteria->order = 'product_name ASC';

        $model = Product::model()->findAll( $criteria );     // works!

        
        $category = AdminProductType::model()->findAll( );
        $shops = Shops::model()->findAll( );

        $model_shop = Shops::model()->find('id=:data', array(':data' => $shopId));
        $model_market = AdminMarket::model()->find('id=:data', array(':data' => $model_shop->market_id));

        $this->render('shop_view',array(
            'model'=>$model,
            'category'=>$category,
            'shops'=>$shops,            
            'modelShop'=>$model_shop,            
            'modelMarket'=>$model_market,
            'shopId'=>$shopId,
            'min'=>$min,
            'max'=>$max,
            ));



    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}