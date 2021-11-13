<?php

namespace yuankezhan\mediaLibrary;
use yii\web\AssetBundle;


class MediaLibraryAssets extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = __DIR__ . '/assets';
    public $cssOptions = ['position' => \yii\web\View::POS_BEGIN];
    public $jsOptions = ['position' => \yii\web\View::POS_BEGIN];
    /**
     * {@inheritdoc}
     */
    public $css = [
        'css/main.css',
//        'css/iconfont.css',
    ];
    /**
     * {@inheritdoc}
     */
    public $js = [
        'js/jquery.js',
        'js/iconfont.js',
        'js/media.js',
    ];
}