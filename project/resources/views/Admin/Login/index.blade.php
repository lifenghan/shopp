<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/static/Admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/static/Admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/static/Admin/css/style.css">
    <link rel="stylesheet" href="/static/Admin/css/notiflix-1.3.0.min.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/static/Admin/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="/static/Admin/images/logo.svg">
                        </div>
                        <h4>你好！让我们开始吧</h4>
                        <h6 class="font-weight-light">请登录</h6>
                        <form class="pt-3" action="/adminlogin" method="post">
                            @if(session("name_error"))
                                <p class="text-danger">
                                    <i class="mdi mdi-window-close"></i>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">{{session("name_error")}}</font>
                                    </font>
                                </p>
                            @endif
                            <div class="form-group" >
                                <input type="text" name="name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="用户名">
                            </div>
                                @if(session("pwd_error"))
                                    <p class="text-danger">
                                        <i class="mdi mdi-window-close"></i>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">{{session("pwd_error")}}</font>
                                        </font>
                                    </p>
                                @endif
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="密码">
                            </div>
                            <div class="mt-3">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >登录</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/static/Admin/vendors/js/vendor.bundle.base.js"></script>
<script src="/static/Admin/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="/static/Admin/js/off-canvas.js"></script>
<script src="/static/Admin/js/misc.js"></script>
<!-- endinject -->
</body>

</html>
