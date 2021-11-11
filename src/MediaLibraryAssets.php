<?php

namespace kartik\mediaLibrary;

use kartik\base\AssetBundle;

class MediaLibraryAssets extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/main']);
        $this->setupAssets('js', ['js/jquery.js', 'js/iconfont.js']);
        parent::init();
    }
}