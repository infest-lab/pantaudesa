<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class AngularAsset extends AssetBundle
    {
        public $sourcePath = '@bower/angular';
        public $js = [
            'angular.min.js',
        ];
        public $jsOptions = [
		    'position' => \yii\web\View::POS_HEAD
		];
    }