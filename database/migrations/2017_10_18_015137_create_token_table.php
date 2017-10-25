<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('token');
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
            $table->bigInteger('expired_at')->nullable();
            $table->bigInteger('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facebook_tokens');
    }
}
