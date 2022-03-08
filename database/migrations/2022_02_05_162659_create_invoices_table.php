<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('lens_id') ;
            $table->string('customer')->nullable() ;

            $table->decimal('rx', 8, 2)->unsigned(false)->nullable();
            $table->decimal('ry', 8, 2)->unsigned(false)->nullable();
            $table->integer('rz')->nullable();
            $table->integer('rb')->nullable();

            $table->decimal('lx', 8, 2)->unsigned(false)->nullable();
            $table->decimal('ly', 8, 2)->unsigned(false)->nullable();
            $table->integer('lz')->nullable();
            $table->integer('lb')->nullable();

            $table->decimal('add1', 8, 2)->unsigned(false)->nullable();
            $table->decimal('add2', 8, 2)->unsigned(false)->nullable();

            $table->decimal('r_bigger', 8, 2)->unsigned(false)->nullable();
            $table->decimal('r_smaller', 8, 2)->unsigned(false)->nullable();
            $table->decimal('l_bigger', 8, 2)->unsigned(false)->nullable();
            $table->decimal('l_smaller', 8, 2)->unsigned(false)->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
