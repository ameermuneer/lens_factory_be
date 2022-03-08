<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_values', function (Blueprint $table) {
            $table->id();
            $table->integer('raw_id') ;
            $table->decimal('power', 8, 2)->unsigned(false)->nullable();
            $table->decimal('value', 8, 2)->unsigned(false)->nullable();
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
        Schema::dropIfExists('raw_values');
    }
}
