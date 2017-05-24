<?php
/**
 * BootstrapAsset.php
 * Created by h8every1 on 25.05.2017 4:10
 */

namespace h8every1\requirejsview\assets;

class BootstrapAsset extends RequireJsAssetBundle
{
    public $sourcePath = '@bower/bootstrap/dist';
    public $js = [
        'bootstrap' => [
            'js/bootstrap.js',
            'deps' => ['jquery'],
        ],
    ];
}