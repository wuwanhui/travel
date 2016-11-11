<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::any('/install', 'Common\InstallController@index');


/**
 * 管理后台
 */
Route::group(['prefix' => 'manage', 'middleware' => 'auth', 'namespace' => 'Manage'], function () {


    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    /**
     * Demo演示
     */
    Route::group(['prefix' => 'demo'], function () {
        Route::get('/', 'DemoController@index');
        Route::get('/create', 'DemoController@getCreate');
        Route::post('/create', 'DemoController@postCreate');
        Route::get('/edit/{id}', 'DemoController@getEdit');
        Route::post('/edit/{id}', 'DemoController@postEdit');
        Route::get('/detail/{id}', 'DemoController@getDetail');
        Route::get('/delete/{id}', 'DemoController@getDelete');

    });

    /**
     * 企业管理
     */
    Route::group(['prefix' => 'enterprise', 'middleware' => 'auth:manage', 'namespace' => 'Enterprise'], function () {
        Route::get('/', 'EnterpriseController@index');
        Route::any('/create', 'EnterpriseController@create');
        Route::any('/edit/{id}', 'EnterpriseController@edit');
        Route::get('/delete', 'EnterpriseController@delete');

        /**
         * 企业用户
         */
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index');
            Route::any('/create', 'UserController@create');
            Route::any('/edit/{id}', 'UserController@edit');
            Route::get('/delete', 'UserController@delete');

        });
    });


    /**
     * 供应商
     */
    Route::group(['prefix' => 'supplier', 'middleware' => 'auth:manage', 'namespace' => 'Supplier'], function () {
        Route::get('/', 'SupplierController@index');
        Route::any('/create', 'SupplierController@create');
        Route::any('/edit/{id}', 'SupplierController@edit');
        Route::get('/delete', 'SupplierController@delete');


        /**
         * 资源管理
         */
        Route::group(['prefix' => 'resource'], function () {
            Route::get('/', 'ResourceController@index');
            Route::any('/create', 'ResourceController@create');
            Route::any('/edit/{id}', 'ResourceController@edit');
            Route::get('/detail/{id}', 'ResourceController@detail');
            Route::get('/delete', 'ResourceController@delete');

            /**
             * 签名
             */
            Route::group(['prefix' => 'signature'], function () {
                Route::get('/', 'SignatureController@index');
                Route::any('/create/{id}', 'SignatureController@create');
                Route::any('/edit/{id}', 'SignatureController@edit');
                Route::get('/detail/{id}', 'SignatureController@detail');
                Route::get('/delete/{id}', 'SignatureController@delete');


            });
            /**
             * 模板
             */
            Route::group(['prefix' => 'template'], function () {
                Route::get('/', 'TemplateController@index');
                Route::any('/create/{id}', 'TemplateController@create');
                Route::any('/edit/{id}', 'TemplateController@edit');
                Route::get('/detail/{id}', 'TemplateController@detail');
                Route::get('/delete/{id}', 'TemplateController@delete');


            });
        });


    });

    /**
     * 发送记录
     */
    Route::group(['prefix' => 'record', 'middleware' => 'auth:manage', 'namespace' => 'Record'], function () {
        Route::get('/', 'RecordController@index');
        Route::any('/create', 'RecordController@create');
        Route::any('/create/{id}', 'RecordController@createByid');
        Route::any('/edit/{id}', 'RecordController@edit');
        Route::get('/delete', 'RecordController@delete');
        Route::post('/template', 'RecordController@template');
        Route::get('/detail/{id}', 'RecordController@detail');


        /**
         * 发送模板
         */
        Route::group(['prefix' => 'template'], function () {
            Route::get('/', 'TemplateController@index');
            Route::any('/create', 'TemplateController@create');
            Route::any('/edit/{id}', 'TemplateController@edit');
            Route::get('/delete/{id}', 'TemplateController@delete');


        });


        /**
         * 回执报告
         */
        Route::group(['prefix' => 'receive'], function () {
            Route::get('/', 'ReceiveController@index');
            Route::get('/update', 'ReceiveController@update');
            Route::get('/detail/{id}', 'ReceiveController@detail');
            Route::get('/delete/{id}', 'ReceiveController@delete');

        });
    });

    /**
     * 通讯录
     */
    Route::group(['prefix' => 'directorie', 'middleware' => 'auth:manage', 'namespace' => 'Directorie'], function () {
        Route::get('/', 'DirectorieController@index');
        Route::any('/create', 'DirectorieController@create');
        Route::any('/edit/{id}', 'DirectorieController@edit');
        Route::get('/delete', 'DirectorieController@delete');
        Route::get('/detail/{id}', 'DirectorieController@detail');


    });


    /**
     * 财务中心
     */
    Route::group(['prefix' => 'finance', 'middleware' => 'auth:manage', 'namespace' => 'Finance'], function () {
        Route::get('/', 'HomeController@index');


        /**
         * 支付记录
         */
        Route::group(['prefix' => 'recharge'], function () {
            Route::get('/', 'RechargeController@index');
            Route::any('/create', 'RechargeController@create');
            Route::any('/transfer', 'RechargeController@transfer');
            Route::any('/edit/{id}', 'RechargeController@edit');
            Route::get('/detail/{id}', 'RechargeController@detail');
            Route::get('/delete', 'RechargeController@delete');

        });


        /**
         * 充值记录
         */
        Route::group(['prefix' => 'quantity'], function () {
            Route::get('/', 'QuantityController@index');
            Route::any('/create', 'QuantityController@create');
            Route::any('/edit/{id}', 'QuantityController@edit');
            Route::get('/detail/{id}', 'QuantityController@detail');
            Route::get('/delete', 'QuantityController@delete');
            Route::any('/transfer', 'QuantityController@transfer');


        });

        /**
         * 发票申请
         */
        Route::group(['prefix' => 'invoice'], function () {
            Route::get('/', 'InvoiceController@index');
            Route::any('/create', 'InvoiceController@create');
            Route::any('/edit/{id}', 'InvoiceController@edit');
            Route::get('/detail/{id}', 'InvoiceController@detail');
            Route::get('/delete', 'InvoiceController@delete');


        });

        /**
         * 微信支付
         */
        Route::group(['prefix' => 'pay'], function () {
            Route::get('/', 'WeixinPayController@index');
            Route::any('/create', 'WeixinPayController@create');
            Route::any('/edit/{id}', 'WeixinPayController@edit');
            Route::get('/detail/{id}', 'WeixinPayController@detail');
            Route::get('/delete', 'WeixinPayController@delete');


        });
    });

    /**
     * 系统配置
     */
    Route::group(['prefix' => 'system', 'middleware' => 'auth:manage', 'namespace' => 'System'], function () {
        Route::get('/', 'HomeController@index');


        /**
         * 参数设置
         */
        Route::group(['prefix' => 'config'], function () {
            Route::any('/', 'ConfigController@index');
            Route::any('/create', 'ConfigController@create');
            Route::any('/transfer', 'ConfigController@transfer');
            Route::any('/edit/{id}', 'ConfigController@edit');
            Route::get('/detail/{id}', 'ConfigController@detail');
            Route::get('/delete', 'ConfigController@delete');

        });
        /**
         * 企业用户
         */
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'UserController@index');
            Route::any('/create', 'UserController@create');
            Route::any('/edit/{id}', 'UserController@edit');
            Route::get('/delete', 'UserController@delete');

        });

    });

});
