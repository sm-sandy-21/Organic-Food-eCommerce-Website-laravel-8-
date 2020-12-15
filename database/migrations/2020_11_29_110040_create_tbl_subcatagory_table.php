<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubcatagoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subcatagory', function (Blueprint $table) {
            $table->increments('subcatagory_id');
            $table->string('subcatagory_name')->nullable();          
            $table->Integer('catagory_id');         
            $table->timestamps();
;
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_subcatagory');
    }
}
