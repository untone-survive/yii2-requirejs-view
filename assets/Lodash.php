<?php
namespace h8every1\requirejsview\assets;

class Lodash extends RequireJsAssetBundle
{

    public $sourcePath = '@bower/lodash';
    public $js = [
        'lodash' => [
            'lodash.min.js',
        ]
    ];

}