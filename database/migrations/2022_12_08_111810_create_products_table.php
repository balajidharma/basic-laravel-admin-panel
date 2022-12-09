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
        Schema::create('category_product', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable();
        });

        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->integer('count')->nullable();
            $table->dateTime('deactivated_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_product')
                ->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('products');
    }
};
