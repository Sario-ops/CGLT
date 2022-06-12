<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-bootstrap4' => 
  array (
    'name' => 'yiisoft/yii2-bootstrap4',
    'version' => '2.0.10.0',
    'alias' => 
    array (
      '@yii/bootstrap4' => $vendorDir . '/yiisoft/yii2-bootstrap4/src',
    ),
  ),
  'yiisoft/yii2-debug' => 
  array (
    'name' => 'yiisoft/yii2-debug',
    'version' => '2.1.19.0',
    'alias' => 
    array (
      '@yii/debug' => $vendorDir . '/yiisoft/yii2-debug/src',
    ),
  ),
  'yiisoft/yii2-faker' => 
  array (
    'name' => 'yiisoft/yii2-faker',
    'version' => '2.0.5.0',
    'alias' => 
    array (
      '@yii/faker' => $vendorDir . '/yiisoft/yii2-faker/src',
    ),
  ),
  'yiisoft/yii2-gii' => 
  array (
    'name' => 'yiisoft/yii2-gii',
    'version' => '2.2.4.0',
    'alias' => 
    array (
      '@yii/gii' => $vendorDir . '/yiisoft/yii2-gii/src',
    ),
  ),
  'yiisoft/yii2-swiftmailer' => 
  array (
    'name' => 'yiisoft/yii2-swiftmailer',
    'version' => '2.1.3.0',
    'alias' => 
    array (
      '@yii/swiftmailer' => $vendorDir . '/yiisoft/yii2-swiftmailer/src',
    ),
  ),
  'newerton/yii2-dynamicform' => 
  array (
    'name' => 'newerton/yii2-dynamicform',
    'version' => '2.0.2.0',
    'alias' => 
    array (
      '@wbraganca/dynamicform' => $vendorDir . '/newerton/yii2-dynamicform',
    ),
  ),
  'webzop/yii2-notifications' => 
  array (
    'name' => 'webzop/yii2-notifications',
    'version' => '0.2.0.0',
    'alias' => 
    array (
      '@webzop/notifications' => $vendorDir . '/webzop/yii2-notifications',
    ),
    'bootstrap' => 'webzop\\notifications\\Bootstrap',
  ),
);
