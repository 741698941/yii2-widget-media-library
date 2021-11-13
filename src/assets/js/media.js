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
