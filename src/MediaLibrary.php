<?php

namespace yuankezhan\mediaLibrary;

use yii\base\Widget as YiiWidget;

class MediaLibrary extends YiiWidget
{
    /**
     * @var string $showClass
     * 点击展示媒体库的类名
     */
    public $boxClassName = ['media-box'];
    public function run()
    {
        return $this->render('index', [
            'box' => $this->boxClassName,
        ]);
    }
}