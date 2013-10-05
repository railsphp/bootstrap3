<?php
namespace Rails\Bootstrap3;

class Initializer
{
    public function initialize()
    {
        \Rails::assets()->addPaths([
            realpath(__DIR__ . '/../../../vendor/assets/javascripts'),
            realpath(__DIR__ . '/../../../vendor/assets/stylesheets'),
            realpath(__DIR__ . '/../../../vendor/assets/fonts')
        ]);
        \Rails::assets()->addFilePatterns([
            '*.eot',
            '*.svg',
            '*.ttf',
            '*.woff',
        ]);
        \Rails\ActionView\ViewHelpers::addHelper('Rails\Bootstrap3\ViewHelper');
    }
}
