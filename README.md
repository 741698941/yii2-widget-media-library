# yii2-widget-media-library

#### 介绍
yii widget 媒体库

#### 安装教程

1.  composer require yuankezhan/yii2-widget-media-library


#### 使用说明


```
<?php

use yii\helpers\Url;
use yuankezhan\mediaLibrary\MediaLibrary; ?>

<button class="showImgBox">测试</button>

<?= MediaLibrary::widget([
    'imgListUrl' => Url::to(['media/get-img-list']),
    'groupListUrl' => Url::to(['media/group-list']),
    'imgAddUrl' => Url::to(['upload/upload']),
    'groupAddUrl' => Url::to(['media/add-group']),
    'sureCallback' => 'aaa',
    'showClass' => 'showImgBox',
])?>
<script>
    let aaa = function (aa) {
        console.log(aa);
    }
</script>

```

![输入图片说明](https://images.gitee.com/uploads/images/2021/1112/171317_678964e4_782530.png "img.png")
