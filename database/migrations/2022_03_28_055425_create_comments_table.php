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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // declaring foreign ids, make sure type is the same
            // which post is the comment associated with
            // this method works the same as line 28
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            // which user wrote the comment
            $table->unsignedBigInteger('user_id');
            $table->text('body');
            $table->timestamps();

            // refer to the id column on the post table, when the post is deleted, cascade and delete all the comments
            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
