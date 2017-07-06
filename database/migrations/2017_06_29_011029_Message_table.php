<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Message',function(Blueprint $table){
            $table->increments('id');
            $table->integer('F_id')->comment('社区分类ID');
            $table->integer('U_id')->comment('创建用户ID');
            $table->string('headline',100)->comment('标题');
            $table->string('picture')->comment('封面');
            $table->integer('creation_time')->comment('创建时间');
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
