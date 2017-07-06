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


//访问首页
Route::any('/', 'Home\LevelController@level');


//访问个人中心
Route::get('/recommend/show', 'Home\LevelController@show');

//访问个人中心
Route::get('personal', 'Home\UserController@personList');


//访问分类社区
Route::get('classify', 'Admin\QqtzController@showList');

//访问热贴
Route::get('hot', 'Home\HotController@show');

//前台签到
Route::get('checkIn', 'Home\MarkController@checkIn');

//前台用户注册
Route::get('register', 'Home\UserController@registerForm');
Route::post('doRegister', 'Home\UserController@doregForm');

//前台登录
Route::get('login', 'Home\UserController@loginForm');
Route::get('checkPass', 'Home\UserController@checkPass');

//前台退出
Route::get('logout', 'Home\UserController@logout');

//验证手机是否存在
Route::get('/checkPhone', 'Home\UserController@checkPhone');

//验证图形验证码
Route::get('/checkCode', 'Home\UserController@checkCode');

//发送短信验证码
Route::get('/sendSms', 'Home\UserController@sendSms');

//验证手机验证码
Route::get('checkSms', 'Home\UserController@checkSms');

//前台编辑个人信息
Route::post('user_edit', 'Home\UserController@userEdit');

//前台上传头像
Route::post('user_icon', 'Home\UserController@uploadImg');

//后台登录
Route::get('admin/login', 'Admin\AdminController@loginForm');
Route::post('admin/doLogin', 'Admin\AdminController@doLogin');

//后台退出
Route::get('admin/logout', 'Admin\AdminController@logout');

//后台管理员页面
Route::get('admin/admin', 'Admin\AdminController@admin');

//后台添加管理员
Route::get('admin/add_admin', 'Admin\AdminController@add');
Route::post('admin/doAdd', 'Admin\AdminController@doAdd');

//后台编辑管理员
Route::get('admin/edit_admin/{id}', 'Admin\AdminController@edit');
Route::post('admin/doEdit', 'Admin\AdminController@doEdit');

//后台添加角色
Route::any('admin/attach_role/{admin_id}', 'Admin\AdminController@attachRole');

//后台删除管理员
Route::get('admin/dele_admin/{id}', 'Admin\AdminController@dele');

//后台用户管理
Route::get('admin/users', 'Home\UserController@usersList');

//后台改变用户状态
Route::get('admin/change_status/{id}', 'Home\UserController@changeStatus');

//后台显示用户详细信息
Route::get('admin/detail_user/{id}', 'Home\UserController@showUser');

//后台删除用户
Route::get('admin/dele_user/{id}', 'Home\UserController@deleUser');

//访问后台登录
Route::get('admin1', function () {

    return view('Admin/index');
});

//访问后台社区分类
Route::get('community_classify', 'Admin\QqtzController@listShow');

//访问后台社区分类添加
Route::get('add_community', 'Admin\QqtzController@add');
Route::post('checkAdd', 'Admin\QqtzController@checkAdd');

//访问后台社区分类编辑
Route::get('edit_community/{id}', 'Admin\QqtzController@edit');
Route::post('checkEdit', 'Admin\QqtzController@checkEdit');

//删除后台社区分类
Route::get('dele_community/{id}', 'Admin\QqtzController@dele');

//访问后台社区列表
Route::get('subcommunity/{id?}/{name?}', 'Admin\SubController@listShow');

//后台全部社区排名列表
Route::get('list_subcommunity', 'Admin\SubController@subcommunityList');

//添加后台社区
Route::get('add_subcommunity/{id}', 'Admin\SubController@add');
Route::post('addSub', 'Admin\SubController@checkAdd');

//编辑后台社区
Route::get('edit_subcommunity/{id}/{cid}/{cname}', 'Admin\SubController@edit');
Route::post('editSub', 'Admin\SubController@editSub');

//删除后台社区
Route::get('del_subcommunity/{id}/{cid}/{cname}', 'Admin\SubController@dele');

//后台权限管理
Route::get('admin/list_permission', 'Admin\PermissionController@permissionList');
Route::any('admin/add_permission', 'Admin\PermissionController@permissionAdd')->middleware('rbac');
Route::any('admin/edit_permission/{permission_id}', 'Admin\PermissionController@permissionEdit');
Route::get('admin/dele_permission/{permission_id}', 'Admin\PermissionController@permissionDele');

//后台角色管理
Route::get('admin/list_role', 'Admin\RoleController@roleList');
Route::any('admin/add_role', 'Admin\RoleController@roleAdd');
Route::any('admin/edit_role/{role_id}', 'Admin\RoleController@roleEdit');
Route::get('admin/dele_role/{role_id}', 'Admin\RoleController@roleDele');
Route::any('admin/attach_permission/{role_id}', 'Admin\RoleController@attachPermission');

//后台幻灯片管理
Route::get('admin/list_slideshow', 'Admin\SlideController@slideList');
Route::any('admin/add_slideshow', 'Admin\SlideController@slideAdd');
Route::any('admin/edit_slideshow/{id}', 'Admin\SlideController@slideEdit');
Route::get('admin/dele_slideshow/{id}', 'Admin\SlideController@slideDele');



//访问 创建帖子
Route::post('/home/message/store','Home\MessageController@store');

//访问 社区帖子
Route::get('/home/message/{id}','Home\MessageController@show');

//访问 访问回复帖子
Route::get('/home/Answer/{id}&{fname}','Home\AnswerController@show');

//访问 添加回复帖子内容
Route::get('/home/reply/add','Home\AnswerController@add');

//访问 添加回复子帖子
Route::get('/home/revertant/add','Home\RevertantController@add');

//访问 查看回复贴子
Route::get('/home/revertant/show','Home\RevertantController@show');

//访问 添加关注
Route::get('/home/attention/add','Home\AttentionController@add');

//访问 取消关注
Route::get('/home/attention/del','Home\AttentionController@del');

//访问 天气
Route::get('/weather','Home\WeatherController@weather');

//访问 签到
Route::get('/home/sign/add','Home\SignController@add');





//访问 后台通知
Route::get('/admin/inform','Admin\informController@show');

Route::get('/admin/inform/alter','Admin\informController@alter');


Route::get('/admin/inform/add1',function () {

    return view('Admin/inform_add');
});
//访问 添加通知
Route::post('/admin/inform/add','Admin\informController@add');


//访问 找回密码资料
Route::get('/home/find','Home\FindController@find');

//访问 修改密码资料
Route::post('/home/find/up','Home\FindController@up');

//访问 找回页面
Route::get('/home/find/show',function () {

    return view('Home/find');
});
