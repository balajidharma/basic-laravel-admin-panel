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
        Schema::create('category_products', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->integer('count')->nullable();
            $table->string('image')->nullable();
            $table->dateTime('deactivated_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category_products')
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
        Schema::dropIfExists('category_products');
        Schema::dropIfExists('products');
    }
};
