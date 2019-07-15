<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>冈本之家后台管理</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/static/Admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/static/Admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/static/Admin/css/style.css">
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
              <form class="pt-3" action="/adminlogin" method="post">
                 @if(session('success'))

                        {{session('success')}}

                    @endif
                    @if(session("error"))

                        {{session("error")}}

                    @endif
                <div class="form-group">
                  <input type="name" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="name">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  {{csrf_field()}}
                  <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="登录" />

                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
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
