<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');//平台名称
            $table->string('logo')->nullable();//系统Logo
            $table->string('domain')->nullable();//平台地址
            $table->string('assetsDomain')->nullable();//资源地址
            $table->string('tel');//联系电话
            $table->string('fax');//传真
            $table->string('email');//邮箱
            $table->string('qq');//QQ
            $table->string('addres');//地址

            $table->string('weixinToken');//Token
            $table->string('weixinAppID');//Appid
            $table->string('wexinAppSecret');//Secret
            $table->string('wexinAES');//AES

            $table->string('payMchId');//商户号
            $table->string('payNotifyUrl');//支付回调地址
            $table->string('payKey');//支付密钥
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('config');
    }
}
