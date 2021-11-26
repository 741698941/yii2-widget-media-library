<?php
use yuankezhan\mediaLibrary\MediaLibraryAssets;
MediaLibraryAssets::register($this);
?>

<?php foreach ($box as $item):?>
    <div class="<?=$item?>"></div>
<?php endforeach;?>

<script>
    /**
     * 所有接口返回值规定 json {success:true, data:[], message:''};
     * addImgUrl 添加图片请求链接 单张图片上传 ajax form
     * addGroupUrl 添加组请求链接  ajax post 请求  参数 {name: name}
     * imgListUrl  获取图片列表请求链接  请求参数 {group : 1, pageIndex : 1, pageSize : 18} 返回格式 json {success:true, data:[count:100, pageIndex:1, data : [{id:1, url:'http:www.xxx.com', 'name':'图片名称'}]], message:''};
     * groupListUrl 获取分组列表请求链接 json [{id:name}]
     */
    //
    //var uploadClass = new mediaLibrary().init({
    //    imgListUrl : "<?//=Url::to(['media/get-img-list'])?>//",
    //    groupListUrl : "<?//=Url::to(['media/group-list'])?>//",
    //    addImgUrl : "<?//=Url::to(['upload/upload'])?>//",
    //    addGroupUrl : "<?//=Url::to(['media/add-group'])?>//",
    //    sureCallback : "articleImg",
    //    boxClassName : "XXX"
    //});
    //uploadClass.showBox();
</script>

