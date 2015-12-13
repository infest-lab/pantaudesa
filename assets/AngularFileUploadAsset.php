<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class AngularFileUploadAsset extends AssetBundle
{
    public $sourcePath = '@bower/angular-file-upload/dist';
    public $js = [
        'angular-file-upload.min.js',
    ];
    public $jsOptions = [
	    'position' => \yii\web\View::POS_HEAD
	];
	public $depends = [
    	'app\assets\AngularAsset',
    ];
}