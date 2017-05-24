<?php
namespace h8every1\requirejsview\assets;


use yii\web\AssetBundle;

class DomReady extends AssetBundle
{

    public $sourcePath = '@bower/requirejs-domready';
    public $js = [
        'domReady' => [
            'domReady',
        ]
    ];

}