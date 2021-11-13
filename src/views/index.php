<?php
use yuankezhan\mediaLibrary\MediaLibraryAssets;
MediaLibraryAssets::register($this);
?>
<div class="file-remark file-main">
    <div class="file-box">
        <div class="w-100 h-100 d-flex flex-flow-column">
            <div class="file-head d-flex flex-justify-between w-100 ">
                <span class="file-title">选择文件</span>
                <svg class="icon icon-close" aria-hidden="true">
                    <use xlink:href="#icon-close"></use>
                </svg>
            </div>
            <div class="file-container d-flex m-top-15">
                <div class="group-list">
                    <ul></ul>
                    <a class="add-group">
                        新建分组
                        <div class="add-group-form">
                            <input class="add-group-input" placeholder="请输入组名"/>
                            <button type="button" class="btn-add-group btn-green">
                                确定
                            </button>
                        </div>
                    </a>
                </div>
                <div class="w-100">
                    <div class="upload-btn-box w-100">
                        <input type="file" class="upload-file-input hidden" accept="image/png, image/jpeg">
                        <button class="upload-file-btn btn-gray" type="button">上传文件</button>
                    </div>
                    <div class="file-list"></div>
                    <div class="page-box">
                        <ul class="page">
                            <li class="page-prev">
                                <svg t="1636188279972" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3037" width="48" height="48"><path d="M384 512L731.733333 202.666667c17.066667-14.933333 19.2-42.666667 4.266667-59.733334-14.933333-17.066667-42.666667-19.2-59.733333-4.266666l-384 341.333333c-10.666667 8.533333-14.933333 19.2-14.933334 32s4.266667 23.466667 14.933334 32l384 341.333333c8.533333 6.4 19.2 10.666667 27.733333 10.666667 12.8 0 23.466667-4.266667 32-14.933333 14.933333-17.066667 14.933333-44.8-4.266667-59.733334L384 512z" p-id="3038"></path></svg>
                            </li>
                            <li><span class="current-page"></span> / <span class="total-count"></span></li>
                            <li class="page-next">
                                <svg t="1636188361358" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3184" width="48" height="48"><path d="M731.733333 480l-384-341.333333c-17.066667-14.933333-44.8-14.933333-59.733333 4.266666-14.933333 17.066667-14.933333 44.8 4.266667 59.733334L640 512 292.266667 821.333333c-17.066667 14.933333-19.2 42.666667-4.266667 59.733334 8.533333 8.533333 19.2 14.933333 32 14.933333 10.666667 0 19.2-4.266667 27.733333-10.666667l384-341.333333c8.533333-8.533333 14.933333-19.2 14.933334-32s-4.266667-23.466667-14.933334-32z" p-id="3185"></path></svg>
                            </li>
                            <li>
                                <input class="page-input" value="">
                            </li>
                            <li>
                                <a class="go-page">
                                    跳转
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="file-button d-flex flex-justify-center flex-align-center">
                <button class="file-sure btn-green" type="button">确定</button>
                <button class="file-cancel btn-gray" type="button">取消</button>
            </div>
        </div>
    </div>
</div>

<script>
    /**
     * 所有接口返回值规定 json {success:true, data:[], message:''};
     * addImgUrl 添加图片请求链接 单张图片上传 ajax form
     * addGroupUrl 添加组请求链接  ajax post 请求  参数 {name: name}
     * imgListUrl  获取图片列表请求链接  请求参数 {group : 1, pageIndex : 1, pageSize : 18} 返回格式 json {success:true, data:[count:100, pageIndex:1, data : [{id:1, url:'http:www.xxx.com', 'name':'图片名称'}]], message:''};
     * groupListUrl 获取分组列表请求链接 json [{id:name}]
     */

    var media = new mediaLibrary().init({
        imgListUrl : "<?=$imgListUrl?>",
        groupListUrl : "<?=$groupListUrl?>",
        addImgUrl : "<?=$imgAddUrl?>",
        addGroupUrl : "<?=$groupAddUrl?>",
        sureCallback : "<?=$sureCallback?>",
        showClass : "<?=$showClass?>",
    })

</script>

