<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RevertantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Revertant',function( $table){
            $table->increments('id');
            $table->integer('T_id')->comment('子帖ID');
            $table->integer('U_id')->comment('创建用户ID');
            $table->string('details',140)->comment('回复内容');
            $table->integer('up_time')->comment('创建时间');
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
