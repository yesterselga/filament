<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
          Schema::create('branches', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->string('street');
               $table->string('city');
               $table->string('postal_code');
               $table->string('country');
               $table->string('logo');
               $table->integer('status')->length(1);;
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
          Schema::dropIfExists('branches');
     }
};
