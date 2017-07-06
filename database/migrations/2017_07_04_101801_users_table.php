<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Users',function( $table){
            $table->increments('UserID');
            $table->string('UserName',30)->comment('用户名');
            $table->string('UserPass',255)->comment('密码');
            $table->string('UserIcon',255)->comment('头像')->nullable()->default();
            $table->char('UserPhone', 11)->comment('用户手机号')->unique();
            $table->integer('UserSex')->comment('1:男 2:女 3:保密')->default(3)->nullable();
            $table->date('UserBirthday')->comment('用户生日')->nullable();
            $table->string('UserEmail',50)->comment('邮箱')->nullable();
            $table->integer('UserPoint')->comment('默认积分0')->default(0)->nullable();
            $table->integer('UserShutup')->comment('1-激活 2-禁言')->default(1)->nullable();
            $table->integer('UserBarOwner')->comment('1-用户 2-吧主')->default(1)->nullable();
            $table->integer('UserPostNum')->comment('发帖数量')->nullable();
            $table->integer('UserCommunity')->comment('关注社区个数')->nullable();
            $table->string('UserSigned',255)->comment('个性签名')->nullable();
            $table->timestamp('created_at')->comment('注册时间')->nullable();
            $table->timestamp('updated_at')->comment('更新时间')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
