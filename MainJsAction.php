<?php
/**
 * MainJsAction.php
 * Created by h8every1 on 24.05.2017 21:33
 */

namespace h8every1\requirejsview;


use yii\base\Action;

class MainJsAction extends Action
{

    public $options = [
        'modules'=>[],
    ];


    public function run()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = \Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/javascript');

        return $this->controller->renderPartial('@vendor/h8every1/yii2-requirejs-view/view/main-js', [
            'config' => $this->generateConfig()
        ]);

    }

    private function generateConfig()
    {

        $manager = $this->controller->getView()->getAssetManager();

        $config = $paths = $shim = [];

        foreach ($this->options['modules'] as $module) {

            if (!class_exists($module)) {
                continue;
            }

            $bundle = $manager->getBundle($module);

            foreach ($bundle->js as $name => $data) {

                if (is_array($data)) {
                    $fileName = array_shift($data);

                    if (count($data)) {
                        $shim[$name] = [];

                        foreach ($data as $section => $value) {
                            $shim[$name][$section] = $value;
                        }
                    }
                } else {
                    $name = $fileName = $data;
                }


                if (substr($fileName, -3) === '.js') {
                    $fileName = substr($fileName, 0, -3);
                }
                $paths[$name] = $manager->getAssetUrl($bundle, $fileName);


            }

        }
        $config['paths'] = $paths;
        $config['shim'] = $shim;

        return json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

}