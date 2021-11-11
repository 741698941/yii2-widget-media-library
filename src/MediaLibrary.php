<?php

namespace kartik\mediaLibrary;

use kartik\base\Widget;

class MediaLibrary extends Widget
{
    /**
     * @var string $showClass
     * 点击展示媒体库的类名
     */
    public $showClass;

    /**
     * @var string $imgListUrl
     * 图片列表请求链接
     */
    public $imgListUrl;

    /**
     * @var string $imgAddUrl
     * 添加图片请求链接
     */
    public $imgAddUrl;

    /**
     * @var string $groupListUrl
     * 图片分组列表请求链接
     */
    public $groupListUrl;

    /**
     * @var string $groupAddUrl
     * 添加分组请求链接
     */
    public $groupAddUrl;


    /**
     * @var string $sureCallback
     * 选择确定后的js回调方法名
     */
    public $sureCallback;

    public function run()
    {
        return $this->render('index', [
            'imgListUrl' => $this->imgListUrl,
            'imgAddUrl' => $this->imgAddUrl,
            'groupListUrl' => $this->groupListUrl,
            'groupAddUrl' => $this->groupAddUrl,
            'sureCallback' => $this->sureCallback,
            'showClass' => $this->showClass,
        ]);
    }
}