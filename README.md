Yii2 RequireJS-powered View
===========================
Yii2 View class with ability to register RequireJS modules

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist h8every1/yii2-requirejs-view "*"
```

or add

```
"h8every1/yii2-requirejs-view": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Changing the `View` class site-wide
-----

You can use View class site-wide by editing your `config/main.php`:

```php
 'components' => [
    ...
    'view'=> [
        'class'=> 'h8every1\requirejsview\View',
        'mainJsUrl'=> '@web/js/requirejs/main.js',
    ],
    ...
 ],

```

The only option that you MUST provide is `mainJsUrl`, wihich is URL of a `main.js` which holds the config of RequireJS's modules. (Read more about `main.js` at  [RequireJS documentation](http://requirejs.org/docs/api.html#data-main))

`mainJsUrl` is passed to `\yii\helpers\Url::to()`, so it can be either `string` or an `array` that points to URL of `main.js` file. You can use aliases `'@web/js/requirejs/main.js'`

After that all your view files will be instances of `h8every1\requirejsview\View` not `yii\web\View`.

Changing the `View` class in single controller
----

Add call to the `View` constructor inside `init` function of your controller like this:

```php
class SiteController extends Controller
{
    public function init()
    {
        parent::init();
        $this->view = new \h8every1\requirejsview\View(['mainJsUrl' => '@web/js/requirejs/main.js']);
    }
    ...
}
```


Changing the `View` class for a single action of a `Controller`
----

.. is same as changing the view for the whole controller, except that you add the line inside your action like this:

```php
class SiteController extends Controller
{
    ...
    
    public function actionIndex()
    {
        $this->view = new \h8every1\requirejsview\View(['mainJsUrl' => '@web/js/requirejs/main.js']);

        return $this->render('index');
    }
    
    ...
}
```

Adding and removing RequireJS modules in view files
----

Inside your view file you can call either `$this->addModule($moduleName)` or `$this->addModules($arrayOfModuleNames)` 

The former accepts `string` with a single module name, the latter accepts `array` of strings. Each one should be a registered RequireJS module.

If you register `View` class site-wide, you can even register modules in layouts and partials rendered via `$this->render()`


You can remove registered modules via `$this->removeModule($moduleName)` or `$this->removeModules($arrayOfModuleNames)`

This can be useful if you want to replace module loaded in your main view file with another module inside of sub-view file.

Example:

`views/site/index.php`
```php
<?php

/* @var $this h8every1\requirejsview\View */


$this->title = 'My Yii Application';
$this->addModules(['app','map']);
echo $this->render('partial');
?>
```

`views/site/partial.php`
```php
<?php
/* @var $this h8every1\requirejsview\View */

$this->removeModule('map');
$this->addModule('gmaps');

?>
```


Known issues
---
You cannot remove modules registered in layout file, because Yii applies layout on the last step of content rendering, after all dynamic content has been generated and all RequireJS modules registered and removed.