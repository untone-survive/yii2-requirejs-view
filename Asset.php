<?php
/**
 * RequireJSAsset.php
 * Created by h8every1 on 11.11.2016 3:23
 */

namespace h8every1\requirejsview;


use yii\web\AssetBundle;

class Asset extends AssetBundle
{

    public $sourcePath = '@vendor/h8every1/yii2-requirejs-view/js';
    public $js = [
        'require.js'
    ];
}