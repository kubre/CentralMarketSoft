<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('shop_name');
            $table->date('dob');
            $table->date('shop_do');
            
            $table->string('seed_lic');
            $table->date('seed_exp');
            
            $table->string('fert_lic');
            $table->date('fert_exp');
            
            $table->string('pest_lic');
            $table->date('pest_exp');
            
            $table->string('shop_act');
            $table->date('shop_exp');
            
            $table->string('gst');
            $table->string('aadhar');
            $table->string('pan');
            
            $table->integer('user_id');
            
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
        Schema::dropIfExists('shops');
    }
}
