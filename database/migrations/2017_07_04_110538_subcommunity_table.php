<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubcommunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Subcommunity',function( $table){
            $table->increments('ID');
            $table->string('SName',50)->comment('用户名')->unique();
            $table->string('SDesc',255)->comment('社区描述')->nullable();
            $table->string('SDIcon',255)->comment('社区头像')->nullable();
            $table->integer('SNum')->comment('社区成员数')->nullable()->default(0);
            $table->integer('SPost')->comment('社区发帖数')->nullable()->default(0);
            $table->integer('CID')->comment('社区分类ID')->nullable();
            $table->integer('Status')->comment('0-显示 1-隐藏')->default(0);
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
