<?php
namespace h8every1\requirejsview\assets;

class DomReady extends RequireJsAssetBundle
{

    public $sourcePath = '@bower/requirejs-domready';
    public $js = [
        'domReady' => [
            'domReady',
        ]
    ];

}