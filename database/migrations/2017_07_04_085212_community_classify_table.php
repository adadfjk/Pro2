<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunityClassifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Community_classify',function( $table){
            $table->increments('ID');
            $table->string('CName',50)->comment('综合社区名');
            $table->string('CDesc',255)->comment('社区描述');
            $table->integer('CNum')->comment('子社区数量')->nullable();
            $table->integer('CStatus')->comment('0:显示 1:隐藏')->default(0)->nullable();
            $table->timestamp('created_at')->comment('创建时间')->nullable();
            $table->timestamp('updated_at')->comment('更新时间')->nullable();
    });

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
