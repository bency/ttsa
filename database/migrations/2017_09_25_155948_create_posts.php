<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_posts', function (Blueprint $table) {
            $table->string('id');
            $table->text('message')->nullable();
            $table->bigInteger('from_id');
            $table->text('permalink_url')->nullable();
            $table->text('link')->nullable();
            $table->string('type')->default('');
            $table->text('picture')->nullable();
            $table->integer('like_count')->default(0);
            $table->timestamp('created_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facebook_posts');
    }
}
