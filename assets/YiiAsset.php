<?php
namespace h8every1\requirejsview\assets;

class YiiAsset extends RequireJsAssetBundle
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