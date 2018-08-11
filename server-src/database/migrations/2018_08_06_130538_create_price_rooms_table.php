<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount', 10, 2);
            $table->float('discount', 2, 2)->default(0);
            $table->string('price_from')->default('N/A');
            $table->integer('price_type')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('price_rooms');
    }
}
