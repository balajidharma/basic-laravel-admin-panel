<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('attributes.table_names');

        Schema::create($tableNames['attributes'], function (Blueprint $table) {
            $table->id('id');
            $table->string('data_type')->default('string');
            $table->string('name');
            $table->text('value')->nullable();
            $table->morphs('attributable');
            $table->integer('weight')->default(0);
            $table->timestamps();
            $table->unique(['name', 'attributable_type', 'attributable_id'], 'attributes_unique');
        });
    }
};
