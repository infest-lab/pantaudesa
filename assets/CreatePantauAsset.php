<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
* Management Asset Angular pada create Pantau
*/
namespace app\assets;

use yii\web\AssetBundle;

class CreatePantauAsset extends AssetBundle
{
    public $sourcePath = '@web/js/pantau/create';
    public $js = [
        'app.js',
        'controllers/WilayahController.js'
    ];
    public $depends = [
    	'app\assets\AngularAsset',
    	'app\assets\AngularFileUploadAsset'
    ];
}