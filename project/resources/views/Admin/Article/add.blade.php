@extends("Admin.AdminPublic.public")
@section("title","公告添加")
@section("main")
<script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/lang/zh-cn/zh-cn.js"></script>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告添加</font></font></h4>
                <form class="forms-sample" action="/adminarticle" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font></label>
                        <input type="text" name="title" class="form-control" id="exampleInputPassword4" placeholder="标题">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">图片</font></font></label>
                        <input type="file" name="thumb" class="form-control" id="exampleInputPassword4" placeholder="图片">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">描述</font></font></label>
                        <script id="editor" type="text/plain" name="descr" style="width:900px;height:250px;"></script>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">作者</font></font></label>
                        <input type="text" name="editor" class="form-control" id="exampleInputPassword4" placeholder="作者">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
                    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // 百度编辑器实例化
        var ue = UE.getEditor('editor');
    </script>
@endsection
    
            