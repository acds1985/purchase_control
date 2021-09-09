<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user');
            $table->string('social_name');
            $table->string('alias_name');
            $table->string('document_company');
            $table->string('document_company_secondary');

              /** address */
              $table->string('zipcode')->nullable();
              $table->string('street')->nullable();
              $table->string('number')->nullable();
              $table->string('complement')->nullable();
              $table->string('neighborhood')->nullable();
              $table->string('state')->nullable();
              $table->string('city')->nullable();
              
              
            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
