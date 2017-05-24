<?php
/* @var $this \h8every1\requirejsview\View */
/* @var $config string */

echo <<<JS
require.config({$config});

//Parse page script tag for loading required modules:
var modules = [];
var scripts = document.getElementsByTagName('script');

for (var i = 0, l = scripts.length; i < l; i++) {
    if (scripts[i].getAttribute('data-main') && scripts[i].getAttribute('data-modules')) {
        modules = scripts[i].getAttribute('data-modules').split(',');
        break;
    }
}

requirejs(modules);
JS;
