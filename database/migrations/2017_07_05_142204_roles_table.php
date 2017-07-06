<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Roles',function( $table){
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->string('display_name',255)->nullable();
            $table->string('description',255)->nullable();
            $table->timestamp('created_at',255)->nullable();
            $table->timestamp('updated_at',255)->nullable();


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
