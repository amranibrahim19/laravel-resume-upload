<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDownloadpdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloadpdf', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');               
            $table->string('phone');           
            $table->string('address');       
            $table->boolean('gender');           
            $table->string('state'); 
            $table->string('file');           
            $table->string('postcode');
            $table->string('date_of_birth'); 
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
        //
    }
}
