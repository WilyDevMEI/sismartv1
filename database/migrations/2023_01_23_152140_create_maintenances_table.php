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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('konsumen_id');
            $table->date('date_maintenance');
            $table->string('pic_customer');
            $table->string('agenda');
            $table->string('type_maintenance');
            $table->text('issue');
            $table->text('result_maintenance');
            $table->string('pic_marketing');
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
        Schema::dropIfExists('maintenances');
    }
};
