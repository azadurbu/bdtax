<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
// YiiBootstrap includes all the features from its parent
// project Yii-Bootstrap, thus its gii templates

return array(
  'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
  'name' => 'bdtax.com.bd',
    // preloading 'log' component
  'preload' => array(
    'bootstrap',
    'log'
    ),
    // autoloading model and component classes
  'import' => array(
    'application.models.*',
    'application.components.*',
    'application.modules.user.*',
    'application.modules.user.models.*',
    'application.modules.user.components.*',
    'application.helpers.*'
    ),
  'modules' => array(
    'user' => array(
      'tableUsers' => 'users',
//    'tableProfiles' => 'profiles',
//    'tableProfileFields' => 'profiles_fields',
      ),
    'find' => array(
            // 'tableUsers' => 'users',
      ),
    'section' => array(
            // 'tableUsers' => 'users',
      ),
        // uncomment the following to enable the Gii tool

    'gii' => array(
      'class' => 'system.gii.GiiModule',
      'password' => 'malishmalish',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters' => array('127.0.0.1','192.168.3.18', '::1'),
      'generatorPaths' => array(
        'bootstrap.gii'
        ),
            // add additional generator path
//            'generatorPaths' => array(
//                'ext.YiiMongoDbSuite.gii'
//            ),
      ),
    ),
    // application components
  'components' => array(
//                          'session' => array(
//                              'timeout' => 20,
//                         ),
    'session' => array(
     'autoStart'=>true,  
     ),
    'user' => array(
      'class' => 'WebUser',
            // enable cookie-based authentication
      'allowAutoLogin' => true,
      'loginUrl' => array('/user/login'),
      'authTimeout' => 1800,
      ),
    'authManager' => array(
      'class' => 'RDbAuthManager',
      'connectionID' => 'db',
      'defaultRoles' => array('Authenticated', 'Guest'),
      ),
    'errorHandler' => array(
      'errorAction' => 'site/index'
      ),
    'image' => array(
      'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
      'driver' => 'GD',
            // ImageMagick setup path
      'params' => array('directory' => '/opt/local/bin'),
      ),
        // uncomment the following to enable URLs in path-format

    'urlManager' => array(
      'urlFormat' => 'path',
      'rules' => array(
        '<controller:\w+>/<id:\s+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\s+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ),
      ),
    'ePdf' => array(
      'class' => 'ext.yii-pdf.EYiiPdf',
      'params' => array(
        'mpdf' => array(
          'librarySourcePath' => 'application.vendors.mpdf.*',
          'constants' => array(
            '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
            ),
                    'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                 'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                  'mode'              => '', //  This parameter specifies the mode of the new document.
                  'format'            => 'A5', // format A4, A5, ...
                  // 'default_font_size' => 0, // Sets the default document font size in points (pt)
                  'default_font'      => 'Times New Roman', // Sets the default font-family for the new document.
                  'margin_left'       => 15, // margin_left. Sets the page margins for the new document.
                  'margin_right'      => 15, // margin_right
                  'mgt'               => 16, // margin_top
                  'mgb'               => 16, // margin_bottom
                  'mgh'               => 9, // margin_header
                  'mgf'               => 9, // margin_footer
                  'orientation'       => 'P', // landscape or portrait orientation
                  ) 
),
),
),

        // uncomment the following to use a MySQL database
'db' => array(
  'connectionString' => 'mysql:host=localhost;dbname=bdtaxcom_v1',
  'emulatePrepare' => true,
  'username' => 'root',
  'password' => '',
  'charset' => 'utf8',
  ),
'authManager'=>array(
  'class'=>'CDbAuthManager',
         'connectionID' => 'db',                  // only if necessary
         ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ), */
'errorHandler' => array(
            // use 'site/error' action to display errors
  'errorAction' => 'site/error',
  ),
'log' => array(
  'class' => 'CLogRouter',
  'routes' => array(
    array(
      'class' => 'CFileLogRoute',
      'levels' => 'error, warning',
      ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
  ),
  ),
'bootstrap' => array(
  'class' => 'ext.bootstrap.components.Bootstrap',
    // 'responsiveCss' => true,
  'responsiveCss' => FALSE,
  'fontAwesomeCss' => TRUE,
  ),
),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
'params' => array(
        // this is used in contact page
  'adminEmail' => 'info@bdtax.com.bd',
  'bccEmail' => 'info@bdtax.com.bd',
  'languages'=>array('bn'=>'Bangla', 'en'=>'English'),
  ),
);