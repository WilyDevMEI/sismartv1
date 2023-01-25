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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('konsumen_id');
            $table->string('pic');
            $table->string('phone');
            $table->enum('category', ['Produk', 'Jasa']);
            $table->string('necessity');
            $table->string('name_necessity');
            $table->string('qty');
            $table->text('detail');
            $table->string('sales');
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
        Schema::dropIfExists('products');
    }
};
