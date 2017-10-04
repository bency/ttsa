<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDateFormat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facebook_posts', function ($table) {
            $table->bigInteger('created_at')->change();
            $table->bigInteger('updated_at')->change();
            $table->bigInteger('created_time')->nullable()->change();
        });
        Schema::table('facebook_comments', function ($table) {
            $table->bigInteger('created_at')->change();
            $table->bigInteger('updated_at')->change();
            $table->bigInteger('created_time')->default(null)->nullable()->change();
        });
        Schema::table('users', function ($table) {
            $table->bigInteger('created_at')->change();
            $table->bigInteger('updated_at')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facebook_posts', function ($table) {
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->change();
            $table->timestamp('created_time')->change();
        });
        Schema::table('facebook_comments', function ($table) {
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->change();
            $table->timestamp('created_time')->change();
        });
        Schema::table('users', function ($table) {
            $table->timestamp('created_at')->change();
            $table->timestamp('updated_at')->change();
        });
    }
}
