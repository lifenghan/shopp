<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('adminname')){
             //4.用访问模块和权限列表作对比
             //获取访问模块控制器和方法名字
            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            $controllerName=$func[0];
            $actionName=$func[1];
            // echo $controllerName.":".$actionName;

            //做对比
            //获取权限信息
            $nodelist=session('nodelist');

             //判断访问控制器是否存在或者访问控制器的方法是否存在于权限类表里
            if(empty($nodelist[$controllerName]) || !in_array($actionName,$nodelist[$controllerName])){
                return redirect("/admin")->with('error',"抱歉,您没有权限访问该模块,请联系超级管理员");
            }

            return $next($request);
        }else{
            return redirect('/adminlogin');
        }
    }
}
