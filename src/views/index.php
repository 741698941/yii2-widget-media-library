<?php
MediaLibraryAssets::register($this);
?>
<style>
    :root{
        --gray : #f6f7f8;
        --dark-gray : #ccc;
        --color-black : #444;
        --color-gray : #666;
        --color-green : #07c160;
        --color-white : #fff;
        --color-blue : #576b95;
    }

    .file-main *::-webkit-scrollbar {
        /*滚动条整体样式*/
        width : 4px;  /*高宽分别对应横竖滚动条的尺寸*/
        height: 1px;
    }
    .file-main *::-webkit-scrollbar-thumb {
        /*滚动条里面小方块*/
        border-radius   : 4px;
        background-color: skyblue;
        background-image: -webkit-linear-gradient(
                45deg,
                rgba(255, 255, 255, 0.2) 25%,
                transparent 25%,
                transparent 50%,
                rgba(255, 255, 255, 0.2) 50%,
                rgba(255, 255, 255, 0.2) 75%,
                transparent 75%,
                transparent
        );
    }
    .file-main *::-webkit-scrollbar-track {
        /*滚动条里面轨道*/
        box-shadow   : inset 0 0 5px rgba(0, 0, 0, 0.2);
        background   : #ededed;
        border-radius: 10px;
    }
    .file-main .d-flex {
        display: flex;
    }
    .file-main .w-100
    {
        width: 100%;
    }
    .file-main .h-100
    {
        height: 100%;
    }
    .file-main .m-top-15{
        margin-top: 15px;
    }
    .file-main .flex-justify-center {
        justify-content: center;
    }
    .file-main .flex-align-center {
        align-items: center;
    }
    .file-main .flex-justify-between {
        justify-content: space-between;
    }
    .file-main .flex-flow-column{
        flex-flow: column
    }
    .file-main ul, .file-main li, .file-main ol {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .file-main .hidden {
        display: none;
    }

    .file-main .btn-green {
        padding: 5px 15px;
        border-radius: 2px;
        font-size: 14px;
        cursor: pointer;
        color: var(--color-white);
        background: #07c160;
        border: 1px solid #07c160;
    }
    .file-main .btn-green:hover {
        border: 1px solid #06ad56;
        background: #06ad56;
    }

    .file-main .btn-gray {
        padding: 5px 15px;
        border-radius: 2px;
        font-size: 14px;
        cursor: pointer;
        background: var(--gray);
        border: 1px solid #e3e4e5;
        color: var(--color-gray);
    }

    .file-main .btn-gray:hover {
        border: 1px solid #efefef;
        background: #efefef;
    }

    .file-main.file-remark {
        display: none;
        z-index: 5000;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        white-space: nowrap;
        overflow: auto;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }
    .file-main.file-remark *{
        box-sizing: border-box;
    }
    .file-main.file-remark:after {
        content: " ";
        display: inline-block;
        vertical-align: middle;
        width: 0;
        height: 100%;
        overflow: hidden;
    }
    .file-main .file-box {
        position: relative;
        background: #fff;
        border: 1px solid #fff;
        border-radius: 4px;
        width: 980px;
        height: 685px;
        display: inline-block;
        text-align: left;
        vertical-align: middle;
        white-space: normal;
    }

    .file-main .file-head{
        height: 46px;
        padding: 20px 20px 0px 20px;
    }

    .file-main .file-title
    {
        font-weight: 400;
        font-size: 18px;
    }
    .file-main .icon-close {
        height: 24px;
        width: 24px;
        fill: #999;
        vertical-align: middle;
        cursor: pointer;
    }

    .file-main .file-container{
        flex: 1;
    }
    .file-main .group-list{
        border-right: 1px solid #efefef;
        width: 190px;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        display: flex;
        flex-flow: column;
        height: 555px;
        padding-bottom: 20px;
    }
    .file-main .group-list ul{
        flex: 1;
        overflow: auto;
    }

    .file-main .group-list ul, .file-main .group-list ul li{
        width: 100%;
    }
    .file-main .group-list ul li{
        height: 40px;
    }
    .file-main .group-list>ul a {
        display: inline-block;
        line-height: 40px;
        padding-left: 25px;
        width: 100%;
        height: 100%;
        font-size: 14px;
        color: var(--color-gray);
        cursor: pointer;
    }
    .file-main .group-list>ul li.selected a, .file-main .group-list>ul a:hover{
        background: var(--gray);
    }
    .file-main .add-group {
        padding-top: 10px;
        position: relative;
        font-size: 12px;
        color: var(--color-blue);
        text-decoration: none;
        cursor: pointer;
        padding-left: 25px;
    }
    .file-main .add-group-form {
        position: absolute;
        left: 40px;
        bottom:15px;
        width: 200px;
        border: 1px solid #efefef;
        border-radius: 4px;
        padding: 15px;
        display: none;
        background: #fff;
    }
    .file-main .add-group-form input {
        width: 100%;
        margin-bottom: 10px;
        border: 1px solid var(--dark-gray);
        color: var(--color-gray);
        padding: 4px;
        border-radius: 4px;
        font-size: 12px;
        outline: none;
        height: 30px;
    }
    .file-main .add-group-form button {
        width: 100%;
    }
    .file-main .add-group:hover .add-group-form {
        display: block;
        z-index: 1000;
    }

    .file-main .file-list{
        height: calc(100% - 100px);
        padding-left: 20px;
        position: relative;
        margin: 8px 0;
        overflow: auto;
        text-align: center;
        color: var(--color-gray);
    }
    .file-main .file-list.loading:before{
        content: '';
        background: url("data:image/gif;base64,R0lGODlhkAEsAff/APT6//SjvGu7+ugza/7y9Uut+PWrwnjB+vnK2Eur96HU/DSh9vLy8pPO+/Dw8P3t8avZ/OtUglGu9v74+Vu0+eIRUtXs/Tac9Nru/ejo6C+h+OtKfPzq70er+f/9/jKi+DKg+P/++prR++YqZPrS3bnf/Lzg/FeL2sDj/XC9+WiK0+v1/fOZteYRU/OUsjKg9T2k9pVSnPrc5K6m1fr+/47L+vKNrO96nrHd/mS5+ucQUzCg9uPy/eUbWmC2+lSx+UaT5uo7cTKh+rXd/UWp9zOg8+91msomazul+MpSivGBpPrW4OxdiWy7997w/v78/PWeuLbd+fWwxqnX++5pkjOh+DCi+vB9oPe6zP729+UlYecOUVuy9+grZv/7+u1ijfj8/+UQUupBdexYhbLa+eYgXTKi9oDF+1+19/Wnv/n6/+pGefz+/V59z+ISUO/4/ubl8zCi+K/a/OQSU87o/VSw99kaXfD3/O+Co+YRUcbl/vz9/zGf9OETVPeyxz6n+f76+jOi9OYuZ+YVVUCn9eASUugvabLc++MRUOdBdfe/0E2u+epQf4XI+/39++IVVecmY6bX/fv8/jag9Del+feuxfvg6OTm8/i6zf7+/uEUWfHk8ojH+/v7+Tej9uUYWPKJqPe1yTGj+/7////+/////dXV1c/Pz8zMzOXl5c3Nzdzc3N/f387OztDQ0P39/e3t7eDg4OTk5OHh4ezs7Pf39zOh9vz8/OLi4u7u7t3d3dPT097e3u/v79vb29bW1vz//9TU1Pb29uPj4/X19dra2vn5+erq6vr6+v3//uvr6/j4+Ofn59jY2MvLy9nZ2fT09NfX19LS0v/+/DGh9/3+/+MRUvv7+9HR0ebm5jGg+f7+//7+/P7//f/+/eQSUeUQUDCj9uIQUTOi+/n9/0Ko9+ETU+lOffj8/eQUUvz/+2Gw80Cq+jKf+lqq8OYST2i5+eQPUTGk99wYXfv5+u9wl+EQUrTb+zCj9PSSsPGFpjSj/H7D+YrJ+f///wAAACH/C05FVFNDQVBFMi4wAwEAAAAh/wtYTVAgRGF0YVhNUDw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkMwNzgzMkY4MzY1QTExRTdCMTM5Q0MyMTVGOTg3NENDIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkMwNzgzMkY5MzY1QTExRTdCMTM5Q0MyMTVGOTg3NENDIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QzA3ODMyRjYzNjVBMTFFN0IxMzlDQzIxNUY5ODc0Q0MiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QzA3ODMyRjczNjVBMTFFN0IxMzlDQzIxNUY5ODc0Q0MiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3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") no-repeat center;
        position: absolute;
        top: 4px;
        left: 3px;
        width: 90%;
        height: calc(100% - 100px);
    }
    .file-main .file-list .file-item {
        cursor: pointer;
        position: relative;
        float: left;
        width: 110px;
        margin: 0 15px 15px 0;
    }
    .file-main .file-list .file-item:nth-child(6n) {
        margin-right: 0;
    }
    .file-main .file-list .file-item .file-img{
        position: relative;
        display: block;
        width: 110px;
        height: 110px;
        background-size: contain;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border-radius: 2px;
        overflow: hidden;
    }
    .file-main .file-list .file-item.selected .file-img, .file-main .file-list .file-item .file-img:hover
    {
        -webkit-box-shadow: 0 0 0 2px #07c160 inset;
    }
    .file-main .file-list .file-item.selected .file-img:before
    {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(7, 193, 96, 0.2);
        opacity: .1;
    }

    .file-main .file-list .file-item .file-name{
        height: 20px;
        font-size: 12px;
        margin-top: 8px;
        display: block;
        width: auto;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        word-wrap: normal;
        font-weight: 400;
        line-height: 20px;
        text-align: center;
    }

    .file-main .file-list .file-item .file-check{
        position: absolute;
        top: 5px;
        left: 5px;
        width: 20px;
        height: 20px;
        border: 1px solid #fff;
        border-radius: 1px;
        background-color: rgba(0,0,0,.2);
    }

    .file-main .file-list .file-item.selected .file-check {
        background-color: #07c160;
    }
    .file-main .file-list .file-item.selected .file-check:before {
        content: "";
        position: absolute;
        top: 4px;
        left: 3px;
        width: 11px;
        height: 6px;
        border-left: 1px solid #efefef;
        border-bottom: 1px solid #efefef;
        transform: rotate(-45deg);
    }

    .file-main .file-button{
        border-top: 4px solid #efefef;
        height: 60px;
    }

    .file-main .upload-btn-box {
        text-align: right;
        padding-right: 20px;
        height: 43px;
    }
    .file-main .file-cancel{
        margin-left: 10px;
    }

    /*分页开始*/
    .file-main .page-box{
        display: flex;
        justify-content: end;
        padding-right: 20px;
    }
    .file-main .page {
        height: 40px;
        display: flex;
    }
    .file-main .page li{
        margin: 2px 4px;
        color: var(--color-gray);
        height: 24px;
        line-height: 24px;
    }
    .file-main .page-prev, .file-main .page-next {
        position: relative;
        width: 24px;
        height: 24px;
        border-radius: 2px;
        border: none;
        min-width: auto;
        padding: 0;
        background: var(--gray);
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--color-gray);
        cursor: pointer;
        font-size: 12px;
    }
    .file-main .current-page {
        color: var(--color-green);
    }
    .file-main .page-input {
        width: 42px;
        text-align: left;
        padding: 0 6px;
        height: 25px;
        vertical-align: middle;
        background: var(--gray);
        border: 1px solid var(--gray);
        outline: unset;
        color: var(--color-gray);
    }
    .file-main .go-page {
        background: var(--gray);
        font-size: 12px;
        padding: 5px 10px;
        color: var(--color-blue);
        cursor: pointer;
        border-radius: 2px;
    }
    .file-main .page-prev:hover, ..file-main page-next:hover, .file-main .go-page:hover
    {
        background: var(--dark-gray);
    }
    /*分页结束*/
</style>
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

    (function () {
        class mediaBase {
            constructor(){

            }
            _resetElem() {
                this.FILE_MARK = $('.file-remark');
                this.GROUP_LIST = $('.group-list ul');
                this.GROUP_ITEM = $('.group-list li');
                this.CLOSE_BTN = $('.icon-close');
                this.SURE_BTN = $('.file-sure');
                this.CANCEL_BTN = $('.file-cancel');
                this.FILE_LIST = $('.file-list');
                this.FILE_ITEM = $('.file-list .file-item');
                this.FILE_ITEM_IMG = $('.file-list .file-item .file-img');
                this.FILE_ITEM_CHECK_CLASS = 'file-check';
                this.BTN_ADD_GROUP = $('.btn-add-group');
                this.ADD_GROUP_INPUT = $('.add-group-input');
                this.UPLOAD_BTN = $('.upload-file-btn');
                this.UPLOAD_FILE_INPUT = $('.upload-file-input');
                this.PAGE_COUNT = $('.total-count');
                this.CURRENT_PAGE = $('.current-page');
                this.CURRENT_PAGE_INPUT = $('.page-input');
                this.PAGE_PREV = $('.page-prev');
                this.PAGE_NEXT = $('.page-next');
                this.PAGE_GO = $('.go-page');
            }
        }

        class mediaLibrary extends mediaBase {
            imgListUrl;
            groupListUrl;
            addGroupUrl;
            addImgUrl;
            sureCallback;
            showClass;
            cancelCallback;
            pageIndex;
            pageSize = 18;
            pageCount;
            constructor(){
                super();
            }
            //初始化
            init(options) {

                for (let key in options)
                {
                    if (this.hasOwnProperty(key))
                    {
                        this[key] = options[key]
                    }
                }
                this.bindEvent();
                this._getGroupList();
            }

            bindEvent() {
                this._resetElem()
                let that = this;
                // 绑定分组点击事件 () => {} this指向window
                this.GROUP_ITEM.off('click').on('click', that, function () {
                    that._groupClick(this);
                });

                // 绑定关闭事件
                this.CLOSE_BTN.off('click').on('click', () => {
                    this.closeBox();
                });

                // 绑定确定按钮
                this.SURE_BTN.off('click').on('click', () => {
                    this._btnSure();
                })

                // 绑定取消按钮
                this.CANCEL_BTN.off('click').on('click', () => {
                    this._btnCancel();
                })

                // 绑定图片点击事件
                this.FILE_ITEM.off('click').on('click', that, function () {
                    if (!$(this).hasClass('selected'))
                    {
                        $(this).addClass('selected');
                    }
                    else
                    {
                        $(this).removeClass('selected');
                    }
                })

                // 绑定添加分组事件
                this.BTN_ADD_GROUP.off('click').on('click', () => {
                    this._addGroup();
                })

                // 绑定上传按钮点击事件
                this.UPLOAD_BTN.off('click').on('click', () => {
                    this.UPLOAD_FILE_INPUT.click();
                })

                // 绑定上传 input 改变事件
                this.UPLOAD_FILE_INPUT.off('change').on('change', () => {
                    this._uploadFile();
                })

                // 绑定上传 input 改变事件
                this.UPLOAD_FILE_INPUT.off('change').on('change', () => {
                    this._uploadFile();
                })

                // 绑定跳转页面
                this.PAGE_GO.off('click').on('click', () => {
                    this._goPage();
                })

                // 绑定上一页
                this.PAGE_PREV.off('click').on('click', () => {
                    this._pagePrev();
                })

                // 绑定下一页
                this.PAGE_NEXT.off('click').on('click', () => {
                    this._pageNext();
                })

                // 绑定点击展示
                $('.' + this.showClass).off('click').on('click', () => {
                    this.showBox();
                })
            }

            _groupClick(e)
            {
                this.pageIndex = 1;
                $(e).addClass('selected').siblings().removeClass('selected');
                this._setImgList();
            }

            closeBox() {
                this.FILE_MARK.hide()
            }

            showBox() {
                this._clearSelected();
                this.FILE_MARK.show();
            }

            _clearSelected() {
                this.FILE_ITEM.removeClass('selected');
            }

            _btnSure() {
                this.closeBox();
                let imgList = this._getImgList();
                this.sureCallback && eval(this.sureCallback)(imgList);
            }

            _btnCancel() {
                this.closeBox();
                this.cancelCallback && eval(this.cancelCallback)();
            }

            _uploadFile() {
                let formData = new FormData(),
                    that = this;
                formData.append("file", this.UPLOAD_FILE_INPUT.get(0).files[0]);  //上传一个files对象
                formData.append("groupId", this._getCurrentGroup());
                $.ajax({
                    url : this.addImgUrl,
                    data : formData,
                    type : 'post',
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success : function (res) {
                        if (!res.success)
                        {
                            that._showMessage(res.message);
                            return;
                        }
                        that._setImgList();
                    }
                })
            }

            _getImgList() {
                let imgArr = [];
                this.FILE_ITEM.each(function (index, element) {
                    if (element && $(element).hasClass('selected'))
                    {
                        imgArr.push({id : $(element).attr('data-id'), url : $(element).attr('data-url')})
                    }
                })
                console.log(imgArr);
                return imgArr;
            }

            _setImgList() {
                this._startLoad();
                let that = this;
                that.FILE_LIST.html('');
                let condition = {
                    pageIndex : this.pageIndex,
                    pageSize : this.pageSize,
                    group : this._getCurrentGroup()
                };
                this._request(this.imgListUrl, condition, function (data) {
                    let html = '';
                    that.pageIndex = parseInt(data.pageIndex);
                    that.pageCount = parseInt(data.pageCount);
                    that._renderPage();
                    console.log(data);
                    if (data.pageCount > 0) {
                        for (let item of data.data)
                        {
                            html += `<div class="file-item" data-id="${item.id}" data-url="${item.url}">
                                    <i role="img" class="file-img"
                                       style="background-image: url(${item.url})">
                                        <span class="file-check"></span>
                                    </i>
                                    <strong class="file-name">${item.name}</strong>
                                </div>`;
                        }
                    }
                    else {
                        html = '暂无图片';
                    }
                    that._endLoad();
                    that.FILE_LIST.html(html)
                    that._resetEvent();
                }, function () {
                    that._endLoad();
                })
            }

            _getCurrentGroup() {
                return this.GROUP_LIST.find('.selected').attr('data-id') || 0;
            }

            _getGroupList() {
                let that = this;
                this._request(this.groupListUrl, null, function (data) {
                    let html = '';
                    if (data)
                    {
                        for (let index in data)
                        {
                            html += `<li data-id="${index}">
                                    <a>${data[index]}</a>
                                </li>`;
                        }
                        that.GROUP_LIST.html(html)
                        that._resetEvent();
                        that.GROUP_ITEM[0].click();
                    }
                })
            }

            _resetEvent() {
                this._resetElem();
                this.bindEvent();
            }

            _addGroup() {
                let name = this.ADD_GROUP_INPUT.val(),
                    that = this;
                if (!name || !this.addGroupUrl)
                {
                    return;
                }
                this.ADD_GROUP_INPUT.val('');
                this._request(this.addGroupUrl, {name: name}, function () {
                    that._getGroupList();
                })
            }
            _request(url, data, callback, errorCallback) {
                if (!url)
                {
                    return;
                }
                let that = this;
                try {
                    $.ajax({
                        url : url,
                        data : data,
                        type : 'post',
                        dataType : 'json',
                        success : function (res) {
                            if (!res.success)
                            {
                                that._showMessage(res.message);
                                return;
                            }
                            callback && callback(res.data);
                        },
                        error : function (mes) {
                            errorCallback && errorCallback(mes);
                        }
                    })
                } catch (e) {
                    errorCallback && errorCallback(e);
                }
            }
            _showMessage(message) {
                alert(message);
            }
            _startLoad() {
                this.FILE_LIST.addClass('loading');
            }
            _endLoad() {
                this.FILE_LIST.removeClass('loading');
            }

            _renderPage() {
                this.PAGE_COUNT.html(this.pageCount);
                this.CURRENT_PAGE.html(this.pageIndex);
                this.CURRENT_PAGE_INPUT.val(this.pageIndex);
                if (this.pageIndex <= 1)
                {
                    this.PAGE_PREV.hide();
                }
                else
                {
                    this.PAGE_PREV.show();
                }
                if (this.pageIndex >= this.pageCount)
                {
                    this.PAGE_NEXT.hide();
                }
                else
                {
                    this.PAGE_NEXT.show();
                }
            }

            _pagePrev() {
                if (this.pageIndex <= 1)
                {
                    return;
                }
                this.pageIndex--;
                this._setImgList();
            }

            _pageNext() {
                if (this.pageIndex >= this.pageCount)
                {
                    return;
                }
                this.pageIndex++;
                this._setImgList();
            }

            _goPage() {
                let inputPage = this.CURRENT_PAGE_INPUT.val();

                if (inputPage > this.pageCount)
                {
                    inputPage = this.pageCount;
                }

                if (inputPage < 1)
                {
                    inputPage = 1;
                }
                this.pageIndex = inputPage
                this._setImgList();
            }
        }
        var media = new mediaLibrary().init({
            imgListUrl : "<?=$imgListUrl?>",
            groupListUrl : "<?=$groupListUrl?>",
            addImgUrl : "<?=$imgAddUrl?>",
            addGroupUrl : "<?=$groupAddUrl?>",
            sureCallback : "<?=$sureCallback?>",
            showClass : "<?=$showClass?>",
        })
    })();

</script>

