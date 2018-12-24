<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::post('member/getRemove','MemberController@getRemove');
    Route::post('member/getPage', 'MemberController@getPage');
    Route::post('member/getCountPage', 'MemberController@getCountPage');
    Route::get('member/index', 'MemberController@index');
    Route::get('member/toArray', 'MemberController@toArray');
    Route::get('index/index', 'IndexController@index');//首页
    Route::get('index/body', 'IndexController@body');//首页
    Route::get('index/icon', 'IndexController@icon');//首页
    Route::get('content/index', 'ContentController@index');

    Route::get('questions/index', 'QuestionsController@index');
    Route::post('questions/getQuestionsCount', 'QuestionsController@getQuestionsCount');
    Route::post('questions/getQuestionsList', 'QuestionsController@getQuestionsList');

    Route::get('theme/index', 'ThemeController@index');
    Route::post('theme/getThemeCount', 'ThemeController@getThemeCount');
    Route::post('theme/getThemeList', 'ThemeController@getThemeList');

    Route::get('idea/index', 'IdeaController@index');
    Route::post('idea/getIdeaCount', 'IdeaController@getIdeaCount');
    Route::post('idea/getIdeaList', 'IdeaController@getIdeaList');

    Route::get('feedback/index', 'FeedbackController@index');
    Route::post('feedback/getFeedbackCount', 'FeedbackController@getFeedbackCount');
    Route::post('feedback/getFeedbackList', 'FeedbackController@getFeedbackList');

    Route::get('garden/index', 'GardenController@index');
    Route::post('garden/getGardenCount', 'GardenController@getGardenCount');
    Route::post('garden/getGardenList', 'GardenController@getGardenList');
    Route::post('garden/getDeleteOne', 'GardenController@getDeleteOne');

    Route::get('topic/index', 'TopicController@index');
    Route::post('topic/getTopicCount', 'TopicController@getTopicCount');
    Route::post('topic/getTopicList', 'TopicController@getTopicList');
    Route::post('topic/getDeleteOne', 'TopicController@getDeleteOne');

    Route::get('report/index', 'ReportController@index');
    Route::post('report/getReportCount', 'ReportController@getReportCount');
    Route::post('report/getReportList', 'ReportController@getReportList');
    Route::post('report/getDeleteOne', 'ReportController@getDeleteOne');
    Route::post('report/getUpdateOne', 'ReportController@getUpdateOne');

    Route::get('consult/index', 'ConsultController@index');
    Route::post('consult/getConsultCount', 'ConsultController@getConsultCount');
    Route::post('consult/getConsultList', 'ConsultController@getConsultList');

    Route::get('inquire/index', 'InquireController@index');
    Route::post('inquire/getInquireCount', 'InquireController@getInquireCount');
    Route::post('inquire/getInquireList', 'InquireController@getInquireList');

    Route::get('overdue/index', 'OverdueController@index');
    Route::post('overdue/getOverdueCount', 'OverdueController@getOverdueCount');
    Route::post('overdue/getOverdueList', 'OverdueController@getOverdueList');

    Route::get('wallet/index', 'WalletController@index');
    Route::post('wallet/getWalletCount', 'WalletController@getWalletCount');
    Route::post('wallet/getWalletList', 'WalletController@getWalletList');
    Route::post('wallet/getUpdateOne', 'WalletController@getUpdateOne');
    Route::post('wallet/getDeleteOne', 'WalletController@getDeleteOne');
    Route::get('wallet/setwallet', 'WalletController@setwallet');
    Route::get('wallet/getSetWallet', 'WalletController@getSetWallet');

    Route::get('system/sensitivity', 'SystemController@sensitivity');
    Route::get('system/setuser', 'SystemController@setuser');
    Route::get('system/setplay', 'SystemController@setplay');//页面为空
    Route::get('system/jurisdiction', 'SystemController@jurisdiction');

    Route::get('admin/login', 'AdminController@login');
    Route::get('admin/index', 'AdminController@index');
    Route::post('admin/checkLogins', 'AdminController@checkLogins');
    Route::get('admin/logout', 'AdminController@logout');
    Route::post('admin/getAdminCount', 'AdminController@getAdminCount');
    Route::post('admin/getAdminList', 'AdminController@getAdminList');
    Route::get('admin/updateOne', 'AdminController@updateOne');
    Route::get('admin/save', 'AdminController@save');
    Route::get('admin/create', 'AdminController@create');
    Route::post('admin/createAdmin', 'AdminController@createAdmin');
    Route::post('admin/deleteOne', 'AdminController@deleteOne');

    Route::get('role/index', 'RoleController@index');
    Route::get('role/create', 'RoleController@create');
    Route::post('role/createRole', 'RoleController@createRole');
    Route::post('role/getRoleCount', 'RoleController@getRoleCount');
    Route::post('role/getRoleList', 'RoleController@getRoleList');
    Route::get('role/updateOne', 'RoleController@updateOne');
    Route::get('role/save', 'RoleController@save');
    Route::post('role/deleteOne', 'RoleController@deleteOne');

    Route::get('privilege/index', 'PrivilegeController@index');
    Route::get('privilege/create', 'PrivilegeController@create');
    Route::post('privilege/createPrivilege', 'PrivilegeController@createPrivilege');
    Route::post('privilege/getPrivilegeCount', 'PrivilegeController@getPrivilegeCount');
    Route::post('privilege/getPrivilegeList', 'PrivilegeController@getPrivilegeList');
    Route::get('privilege/updateOne', 'PrivilegeController@updateOne');
    Route::get('privilege/save', 'PrivilegeController@save');
    Route::post('privilege/deleteOne', 'PrivilegeController@deleteOne');

});


Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
    Route::post('member/login','MemberController@login');
    Route::post('member/register','MemberController@register');
    Route::get('member/chkMember','MemberController@chkMember');

    Route::get('comment/garden','CommentController@garden');
    Route::get('comment/theme','CommentController@theme');
    Route::get('comment/play','CommentController@play');
    Route::get('comment/quantity','CommentController@quantity');



});