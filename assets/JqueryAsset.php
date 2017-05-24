<?php
namespace h8every1\requirejsview\assets;

class JqueryAsset extends RequireJsAssetBundle
{
    public $sourcePath = '@bower/jquery/dist';
    public $js = [
        'jquery' => ['jquery.min.js'],
    ];
}