<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//后台登陆
Route::resource("/adminlogin","Admin\AdminLoginController");
Route:: group(["middleware"=>"login"],function (){
    //后台模板
    Route::resource("/admin","Admin\AdminController");
    //后台用户管理
    Route::resource("/adminuser","Admin\UserController");
    //获取收货地址
    Route::get("/adminaddress/{id}","Admin\UserController@address");
   //后台管理员管理
    Route::resource("/adminusers","Admin\AdminUserController");
    //分配角色
    Route::get("/adminrole/{id}","Admin\AdminUserController@role");
//分配权限
    Route::get("/adminauth/{id}","Admin\RoleController@adminauth");
//保存权限
    Route::post("/saveauth","Admin\RoleController@saveauth");
//保存角色
    Route::post("/saverole","Admin\AdminUserController@saverole");
//角色列表
    Route::resource("/adminroles","Admin\RoleController");
//权限管理
    Route::resource("/auth","Admin\AuthController");
    //后台分类
    Route::resource("/admincates","Admin\CatesController");
    //后台商品
    Route::resource("/adminproduct","Admin\ProductController");
    //后台商品信息添加
    Route::get("/adminaddproduct/{id}","Admin\ProductController@addinfo");
    //后台商品信息添加执行
    Route::post("/admindoaddproduct/{id}","Admin\ProductController@doaddinfo");
    //商品信息删除
    Route::post("/deleteproductinfo/{id}","Admin\ProductController@deleteinfo");
    //商品参考图片
    Route::resource("/adminimgs","Admin\ImageController");
    //订单管理
    Route::resource("/adminorder","Admin\OrderController");
    //订单发货d
    Route::get("/deliver","Admin\OrderController@deliver");
    //轮播图
    Route::resource("/adminbanner","Admin\BannerController");
    //添加轮播图
    Route::get("/banneradd/{id}","Admin\BannerController@banneradd");
    //轮播图中的商品图片
    Route::get("/bannerinfo/{bid}/{pid}","Admin\BannerController@info");
    //轮播图置顶
    Route::get("/bannertop","Admin\BannerController@top");
    //轮播图置顶
    Route::get("/bannertop1","Admin\BannerController@top1");
    //轮播图取消置顶
    Route::get("/bannernotop","Admin\BannerController@notop");
    // 友情链接
    Route::resource("/adminfriends","Admin\AdminfriendsController");
    // 后台公告
    Route::resource("/adminarticle","Admin\ArticleController");
    // 广告
    Route::resource("/adminposter","Admin\PosterController");
    //后台商品评价模板
    Route::resource("/admincomment","Admin\AdminCommentController");
});

//前台登录
Route::resource("/homelogin","Home\LoginController");
//前台忘记密码
Route::get("/forget","Home\LoginController@forget");
Route::post("/doforget","Home\LoginController@doforget");
//重置密码
Route::get("/reset","Home\LoginController@reset");
Route::post("/doreset","Home\LoginController@doreset");
//前台注册
Route::resource("/homeregister","Home\RegisterController");
//手机号注册
Route::get("/checkphone","Home\RegisterController@checkphone");
//用户名检测
Route::get("/checkname","Home\RegisterController@checkname");
//邮箱验证
Route::get("/checkemail","Home\RegisterController@checkemail");
//调用短信接口
Route::get("/sendphone","Home\RegisterController@sendphone");
//检测手机验证码
Route::get("/checkcode","Home\RegisterController@checkcode");
//校验码测试
Route::get("/code","Home\RegisterController@code");
//验证校验码
Route::get("/checkcode1","Home\RegisterController@checkcode1");
//前台模板
Route::resource("/home","Home\HomeController");
Route::group(["middleware"=>"homelogin"],function (){
    //前台退出
    Route::resource("/loginout","Home\LoginController");

//前台商品类型选择
    Route::resource("/homecate","Home\CateController");
//前台类型商品模板
    Route::resource("/homecates","Home\CatesController");
    //前台商品详情模板
    Route::resource("/homeproduct","Home\ProductController");
    //前台购物车
    Route::resource("/shoppingcart","Home\ShoppingCartController");
    //前台订单
    Route::resource("/order","Home\OrderController");
    //订单页面
    Route::get("/order/info/{data}/{detail}","Home\OrderController@info");
    //订单地址选择
    Route::get("/orderaddress","Home\OrderController@address");
    //提交地点
    Route::post("/addorder","Home\OrderController@add");
    //调用支付宝
    Route::get("/pays","Home\OrderController@zhifu");
    //支付宝支付成功跳转页面
    Route::get("/yes","Home\OrderController@yes");
    // 前台公告
    Route::resource("/art","Home\ArticleController");
    // 友情链接
    Route::resource("/friends","Home\FriendsController");
    //个人中心->用户信息
    Route::resource("/personal","Home\PersonalController");
//个人中心收货地址
    Route::resource("/personaladdress","Home\PersonalAddressController");
//获取个人中心收货地址的城市联动
    Route::any("/address","Home\AddressController@address");
//ajax设置默认地址
    Route::get("/change","Home\AddressController@change");
//个人中心订单列表
    Route::resource("/personalorder","Home\PersonalOrderController");
//个人中心订单详情
    Route::resource("/orderinfo","Home\OrderInfoController");
    //个人中心我的评价
    Route::resource("/pj","Home\PingJiaController");
//前台商品评价模板
    Route::resource("/comment","Home\CommentController");
});


