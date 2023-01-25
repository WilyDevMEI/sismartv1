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
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('konsumen_id');
            $table->string('po_number')->unique();
            $table->date('date_start');
            $table->date('date_end');
            $table->string('period_partnership');
            $table->string('system_payment');
            $table->text('desc_contract');
            $table->timestamps();

            $table->foreign('konsumen_id')->references('id')->on('konsumens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
};
