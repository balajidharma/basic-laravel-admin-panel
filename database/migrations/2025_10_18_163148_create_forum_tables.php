<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('forum.table_names');

        Schema::create($tableNames['threads'], function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->morphs('author');
            $table->smallInteger('status')->default(0);
            $table->unsignedInteger('comment_count')->default(0);
            $table->unsignedInteger('view_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
