<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Sign',function( $table){
            $table->increments('id');
            $table->integer('F_id')->comment('社区ID');
            $table->integer('U_id')->comment('用户ID');
            $table->date('in_time')->comment('签到时间');
            $table->integer('count')->comment('签到次数')->default(1)->nullable();

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
