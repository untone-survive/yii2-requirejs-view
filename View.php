<?php
namespace h8every1\requirejsview;

use yii\base\InvalidConfigException;

/**
 * Class View
 *
 * Adds ability to register RequireJS modules inside view files
 *
 * @package h8every1\requirejsview
 *
 * @property string|array $mainJsUrl URL of main.js file with list of all modules available for require.js
 */
class View extends \yii\web\View
{

    public $mainJsUrl;
    private $requireJSModules = [];

    public function init()
    {
        parent::init();
        if (!$this->mainJsUrl) {
            throw new InvalidConfigException('You must provide path to main.js file with list of all RequireJS modules');
        }
    }

    /**
     * Get all registered RequireJS Modules
     *
     * @return array
     */
    public function getModules()
    {
        return $this->requireJSModules;
    }

    /**
     *
     * Get string with list of modules for inserting inside <script> tag
     *
     * @return string
     */
    public function getModulesList()
    {
        return json_encode($this->getModules());
    }

    /**
     * Register single RequireJS module into view
     *
     * @param $moduleName
     *
     * @internal param array $requireJSModules
     */
    public function addModule($moduleName)
    {
        if ( ! array_key_exists($moduleName, $this->getModules())) {
            $this->requireJSModules[$moduleName] = $moduleName;
        }
    }

    /**
     * Register list of modules in view
     *
     * @param array $modules
     */
    public function addModules($modules = [])
    {
        foreach ($modules as $module) {
            $this->addModule($module);
        }
    }

    /**
     * Remove module form registered modules list
     *
     * @param $moduleName
     */
    public function removeModule($moduleName)
    {
        if (array_key_exists($moduleName, $this->getModules())) {
            unset($this->requireJSModules[$moduleName]);
        }
    }

    /**
     * Remove list of modules from registered modules list
     *
     * @param array $modules
     */
    public function removeModules($modules = [])
    {
        foreach ($modules as $module) {
            $this->removeModule($module);
        }
    }

    /**
     * @inheritdoc
     */
    public function endBody()
    {

        $assetBundle = $this->registerAssetBundle('h8every1\requirejsview\RequireJSAsset');

        $assetBundle->jsOptions = [
            'data-main'    => \yii\helpers\Url::to($this->mainJsUrl, true),
            'data-modules' => $this->getModulesList(),
            'position'     => self::POS_END,
        ];

        parent::endBody();
    }
}