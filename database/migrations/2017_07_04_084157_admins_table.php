<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Admins',function( $table){
            $table->increments('id');
            $table->string('username',100)->comment('用户名');
            $table->string('password',100)->comment('密码');
            $table->integer('status')->comment('1:激活 2:禁用')->default(1)->nullable();
            $table->timestamp('created_at')->comment('创建时间')->nullable();
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
