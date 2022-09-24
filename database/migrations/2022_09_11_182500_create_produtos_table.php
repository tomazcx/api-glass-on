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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('description');
            $table->decimal('price');
            $table->boolean('is_sun_glass');
            $table->string('image_path');
            $table->boolean('main_page');
            $table->integer('parcels');


            $table->unsignedBigInteger('idformat');
            $table->foreign('idformat')->references('id')->on('formatos')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('idcolor');
            $table->foreign('idcolor')->references('id')->on('cores')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('idmaterial');
            $table->foreign('idmaterial')->references('id')->on('materiais')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
