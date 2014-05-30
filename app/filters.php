<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


Route::filter('birthday',function(){
	if (1==1) {
		return View::make('birthday');
	}
});

/**
 * customer filter
 */
Route::filter('customer' ,function()
{
	if( Auth::check() )
	{
		$temp = Auth::user();
		if( $temp->role == 2 )
		{
			return Redirect::to('/restaurant/login');//返回餐厅首页
		}
	}
	else
	{
		return Redirect::guest('login');
	}
});


Route::filter('restaurant' , function()
{
	if( Auth::check() )	//先判断是否登录
	{
		$temp = Auth::user();	
		if($temp->role == 1)	//登录的人，再判断她的身份是不是restaurant
		{
			return Redirect::to('/');	//回首页吧~
		}
	}
	else
	{
		return Redirect::guest('/restaurant/login');	//去登录吧~
	}
});

Route::filter('admin',function(){
	if( Auth::check() )
	{
		//登录了
		//再判断身份
		$role = Auth::user()->role;
		if( $role == 1 )
		{
			//如果是顾客
			return Redirect::to('/');
		}
		if( $role == 2 )
		{
			//如果是餐厅，去餐厅后台。
			return Redirect::to('restaurant/index');
		}
	}
	else
	{
		return Redirect::to('admin/login');
	}
});