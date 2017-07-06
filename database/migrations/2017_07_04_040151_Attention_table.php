<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttentionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Attention',function( $table){
            $table->increments('id');
            $table->integer('F_id')->comment('社区ID');
            $table->integer('U_id')->comment('用户ID');
            $table->string('F_name',50)->comment('社区名称');
            $table->integer('rank')->comment('社区等级')->default(1)->nullable();
            $table->integer('up_time')->comment('创建时间')->nullable();
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
