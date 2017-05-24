<?php
/**
 * ExampleAsset.php
 * Created by h8every1 on 25.05.2017 4:26
 *
 * Example AssetBundle that shows how you can create complex $js array.
 */

namespace h8every1\requirejsview\assets;


class ExampleAsset extends RequireJsAssetBundle
{
    public $basePath = '@webroot/scripts';
    public $baseUrl = '@web/scripts';

    public $js = [];

    public function init()
    {
        parent::init();

        // prefer minified versions of JS files on live site
        $min = YII_ENV_DEV ? '' : '.min';


        $this->js = [
            'app'         => [
                'app' . $min . '.js'
            ],
            'cart'        => [
                'cart' . $min . '.js',
                'deps' => ['jquery'],
            ],
            'image-popup' => [
                'image-popup' . $min . '.js'
            ],
        ];


    }
}