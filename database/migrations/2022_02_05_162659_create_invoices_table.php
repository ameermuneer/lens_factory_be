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
            $table->integer('lens_type_id') ;
            $table->string('customer')->nullable() ;

            $table->float('rx', 8, 2)->unsigned(false);
            $table->float('ry', 8, 2)->unsigned(false)->nullable();
            $table->integer('rz');
            $table->integer('rb');

            $table->float('lx', 8, 2)->unsigned(false);
            $table->float('lx', 8, 2)->unsigned(false)->nullable();
            $table->integer('lb');
            $table->integer('lb');

            $table->float('add1', 8, 2)->unsigned(false)->nullable();
            $table->float('add2', 8, 2)->unsigned(false)->nullable();

            $table->float('r_bigger', 8, 2)->unsigned(false)->nullable();
            $table->float('r_smaller', 8, 2)->unsigned(false)->nullable();
            $table->float('l_bigger', 8, 2)->unsigned(false)->nullable();
            $table->float('l_smaller', 8, 2)->unsigned(false)->nullable();
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
