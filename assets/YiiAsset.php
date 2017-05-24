<?php
namespace h8every1\requirejsview\assets;


use yii\web\AssetBundle;

class YiiAsset extends AssetBundle
{
    public $sourcePath = '@yii/assets';
    public $js = [
        'yii' => [
            'yii.js',
            'deps' => ['jquery'],
            'exports' => 'yii',
        ],
    ];
}