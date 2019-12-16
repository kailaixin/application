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



Route::prefix('good')->group(function(){
    Route::post('save','admin\GoodController@save');
    Route::post('list','admin\GoodController@list');
});

/****************************  后台管理  *******************************************************************************/
Route::get('/','admin\LoginController@login');                          // 后台登陆视图
Route::post('login_do','admin\LoginController@login_do');               // 后台登陆处理
Route::get('register','admin\LoginController@register');                // 后台注册视图
Route::post('register_do','admin\LoginController@register_do');         // 后台注册处理
Route::post('out','admin\LoginController@out');                         // 后台退出处理
Route::get('admin/index','admin\IndexController@index');                // 后台主页

Route::prefix('admin')->group(function(){
    Route::get('user/list','admin\UserController@list');                // 个人信息展示视图
    Route::get('user/edit','admin\UserController@edit');                // 修改个人信息视图
    Route::post('user/update','admin\UserController@update');           // 修改个人信息处理
    Route::get('headimg','admin\UserController@headimg');               // 更改个人信息头像视图
    Route::post('headimg_do','admin\UserController@headimg_do');        // 更改个人信息头像处理
});

Route::prefix('admin/advent')->group(function(){
    Route::get('create','admin\CategoryController@create');             // 广告添加视图
    Route::post('save','admin\CategoryController@save');                // 广告添加处理
    Route::get('list','admin\CategoryController@list');                 // 广告列表视图
    Route::post('delete','admin\CategoryController@delete');            // 广告删除处理
    Route::get('edit/{c_id}','admin\CategoryController@edit');          // 广告修改视图
    Route::post('update','admin\CategoryController@update');            // 广告修改处理
});

Route::prefix('admin/car')->group(function(){
    Route::get('create','admin\CategoryController@create');             // 购物车添加视图
    Route::post('save','admin\CategoryController@save');                // 购物车添加处理
    Route::get('list','admin\CategoryController@list');                 // 购物车列表视图
    Route::post('delete','admin\CategoryController@delete');            // 购物车删除处理
    Route::get('edit/{c_id}','admin\CategoryController@edit');          // 购物车修改视图
    Route::post('update','admin\CategoryController@update');            // 购物车修改处理
});

Route::prefix('admin/brand')->group(function(){
    Route::get('create','admin\BrandController@create');                // 品牌添加视图
    Route::post('save','admin\BrandController@save');                   // 品牌添加处理
    Route::get('list','admin\BrandController@list');                    // 品牌列表视图
    Route::post('delete','admin\BrandController@delete');               // 品牌删除处理
    Route::get('edit/{b_id}','admin\BrandController@edit');             // 品牌修改视图
    Route::post('update','admin\BrandController@update');               // 品牌修改处理
});

Route::prefix('admin/cate')->group(function(){
    Route::get('create','admin\CategoryController@create');             // 分类添加视图
    Route::post('save','admin\CategoryController@save');                // 分类添加处理
    Route::get('list','admin\CategoryController@list');                 // 分类列表视图
    Route::post('delete','admin\CategoryController@delete');            // 分类删除处理
    Route::get('edit','admin\CategoryController@edit');                 // 分类修改视图
    Route::post('update/{id}','admin\CategoryController@update');       // 分类修改处理
});

Route::prefix('admin/goods')->group(function(){
    Route::get('create','admin\NewsController@create');                 // 商品添加视图
    Route::post('save','admin\NewsController@save');                    // 商品添加处理
    Route::get('list','admin\NewsController@list');                     // 商品列表视图
    Route::post('select','admin\NewsController@select');                // 商品列表视图
    Route::post('delete','admin\NewsController@delete');                // 商品删除处理
    Route::get('edit/{id}','admin\NewsController@edit');                // 商品修改视图
    Route::post('update','admin\NewsController@update');                // 商品修改处理
});

Route::prefix('admin/order')->group(function(){
    Route::get('create','admin\NewsController@create');                 // 订单添加视图
    Route::post('save','admin\NewsController@save');                    // 订单添加处理
    Route::get('list','admin\NewsController@list');                     // 订单列表视图
    Route::post('select','admin\NewsController@select');                // 订单列表视图
    Route::post('delete','admin\NewsController@delete');                // 订单删除处理
    Route::get('edit/{id}','admin\NewsController@edit');                // 订单修改视图
    Route::post('update','admin\NewsController@update');                // 订单修改处理
});

/***************************************    RBAC    ***********************************************/
Route::prefix('admin/rbac')->group(function(){
    Route::get('r_create','admin\RbacController@r_create');              // 角色添加视图
    Route::post('r_save','admin\RbacController@r_save');                 // 角色添加处理
    Route::get('r_list','admin\RbacController@r_list');                  // 角色列表视图
    Route::post('r_delete','admin\RbacController@r_delete');             // 角色删除处理
    Route::get('r_edit/{id}','admin\RbacController@r_edit');             // 角色修改视图
    Route::post('r_update','admin\RbacController@r_update');             // 角色修改处理
});

Route::prefix('admin/rbac')->group(function(){
    Route::get('a_create','admin\RbacController@a_create');              // 权限添加视图
    Route::post('a_save','admin\RbacController@a_save');                 // 权限添加处理
    Route::get('a_list','admin\RbacController@a_list');                  // 权限列表视图
    Route::post('a_delete','admin\RbacController@a_delete');             // 权限删除处理
    Route::get('a_edit/{id}','admin\RbacController@a_edit');             // 权限修改视图
    Route::post('a_update','admin\RbacController@a_update');             // 权限修改处理
});

Route::prefix('admin/rbac')->group(function(){
    Route::get('gra_create','admin\RbacController@gra_create');          // 用户角色添加视图
    Route::post('gra_save','admin\RbacController@gra_save');             // 用户角色添加处理
    Route::get('gra_list','admin\RbacController@gra_list');              // 用户角色列表视图
    Route::get('gra_delete/{id}','admin\RbacController@gra_delete');         // 用户角色删除处理
    Route::post('gra_delete','admin\RbacController@gra_delete');         // 用户角色删除处理
    Route::get('gra_edit/{id}','admin\RbacController@gra_edit');         // 用户角色修改视图
    Route::post('gra_update','admin\RbacController@gra_update');         // 用户角色修改处理
});

Route::prefix('admin/rbac')->group(function(){
    Route::get('gra_create','admin\RbacController@gra_create');          // 角色权限添加视图
    Route::post('gra_save','admin\RbacController@gra_save');             // 角色权限添加处理
    Route::get('gra_list','admin\RbacController@gra_list');              // 角色权限列表视图
    Route::post('gra_delete','admin\RbacController@gra_delete');         // 角色权限删除处理
    Route::get('gra_edit/{id}','admin\RbacController@gra_edit');         // 角色权限修改视图
    Route::post('gra_update','admin\RbacController@gra_update');         // 角色权限修改处理
});
/**************************************************************************************************/

/**********************************************************************************************************************/
