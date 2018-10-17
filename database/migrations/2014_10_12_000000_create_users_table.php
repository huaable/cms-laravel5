<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            //账号名称
            $table->string('name');
            //登陆邮箱
            $table->string('email')->unique();
            $table->string('password');
            //手机号
            $table->string('mobile')->default("");
            //描述
            $table->string('description')->default("");
            //用户类型/实体/个人
            $table->string('type')->default("");
            //头像
            $table->string('avatar')->default("");
            //微信账号
            $table->string('weixin')->default("");
            //个人／订阅号／服务号／企业号二维码
            $table->string('weixin_qrcode')->default("");
            //微博地址
            $table->string('weibo')->default("");
            $table->string('website')->default("");
            //打赏二维码
            $table->string('pay_qrcode')->default("");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
