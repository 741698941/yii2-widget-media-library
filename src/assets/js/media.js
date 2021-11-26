
let mediaHtml = `
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
`


class mediaBase {
    constructor(){

    }
    _resetElem(box) {
        this.FILE_MARK =                            box.find('.file-remark');
        this.GROUP_LIST =                           box.find('.group-list ul');
        this.GROUP_ITEM =                           box.find('.group-list li');
        this.CLOSE_BTN =                            box.find('.icon-close');
        this.SURE_BTN =                             box.find('.file-sure');
        this.CANCEL_BTN =                           box.find('.file-cancel');
        this.FILE_LIST =                            box.find('.file-list');
        this.FILE_ITEM =                            box.find('.file-list .file-item');
        this.FILE_ITEM_IMG =                        box.find('.file-list .file-item .file-img');
        this.BTN_ADD_GROUP =                        box.find('.btn-add-group');
        this.ADD_GROUP_INPUT =                      box.find('.add-group-input');
        this.UPLOAD_BTN =                           box.find('.upload-file-btn');
        this.UPLOAD_FILE_INPUT =                    box.find('.upload-file-input');
        this.PAGE_COUNT =                           box.find('.total-count');
        this.CURRENT_PAGE =                         box.find('.current-page');
        this.CURRENT_PAGE_INPUT =                   box.find('.page-input');
        this.PAGE_PREV =                            box.find('.page-prev');
        this.PAGE_NEXT =                            box.find('.page-next');
        this.PAGE_GO =                              box.find('.go-page');
        this.FILE_ITEM_CHECK_CLASS =                'file-check';
    }
}

class mediaLibrary extends mediaBase {
    imgListUrl;
    groupListUrl;
    addGroupUrl;
    addImgUrl;
    sureCallback;
    cancelCallback;
    pageIndex;
    pageSize = 18;
    pageCount;
    boxClassName = 'media-box';
    boxDom;
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
        this.boxDom = $('.' + this.boxClassName);
        this.addHtml();
        this.bindEvent();
        return this;
    }

    addHtml() {
        this.boxDom.html(mediaHtml);
        setTimeout(() => {
            this.bindEvent();
            this._getGroupList();
        },100)

    }

    bindEvent() {

        this._resetElem($(this.boxDom))
        let that = this;
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
        this._resetElem(this.boxDom);
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