<?php
namespace h8every1\requirejsview\assets;


use yii\web\AssetBundle;

class Angular extends AssetBundle
{

    public $sourcePath = '@bower/angular';
    public $js = [
        'angular' => [
            'angular.min.js',
            'exports' => 'angular',
        ]
    ];

}