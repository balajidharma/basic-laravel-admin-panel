<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewableTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('viewable.table_names');

        Schema::create($tableNames['viewable'], function (Blueprint $table) {
            $table->id('id');
            $table->nullableMorphs('viewer');
            $table->morphs('viewable');
            $table->string('session_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('viewed_at')->useCurrent();
        });
    }
};
