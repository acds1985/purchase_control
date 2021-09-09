<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autorizations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client');
            $table->unsignedInteger('provider');
            $table->unsignedInteger('branch');
            $table->string('description');
            $table->double('price');
            $table->integer('status')->nullable();
            $table->string('token')->nullable();
            $table->string('authorized_by')->nullable();
            $table->date('authorized_in')->nullable();

            $table->timestamps();

            $table->foreign('client')->references('id')->on('clients');
            $table->foreign('provider')->references('id')->on('providers');
            $table->foreign('branch')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autorizations');
    }
}
