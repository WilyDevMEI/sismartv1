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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('number_po');
            $table->date('date_deal');
            $table->unsignedBigInteger('konsumen_id');
            $table->string('topic');
            $table->string('pic');
            $table->text('result');
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
        Schema::dropIfExists('deals');
    }
};
