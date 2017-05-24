<?php
namespace h8every1\requirejsview\assets;

use yii\web\AssetBundle;

class JqueryAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery/dist';
    public $js = [
        'jquery' => ['jquery.min.js'],
    ];
}