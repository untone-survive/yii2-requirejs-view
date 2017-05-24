<?php
namespace h8every1\requirejsview\assets;


use yii\web\AssetBundle;

class Lodash extends AssetBundle
{

    public $sourcePath = '@bower/lodash';
    public $js = [
        'lodash' => [
            'lodash.min.js',
        ]
    ];

}