<?php
namespace h8every1\requirejsview\assets;


class Angular extends RequireJsAssetBundle
{

    public $sourcePath = '@bower/angular';
    public $js = [
        'angular' => [
            'angular.min.js',
            'exports' => 'angular',
        ]
    ];

}