<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAutorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('autorizations', function (Blueprint $table) {
            $table->string('budget_number')->nullable();
            $table->string('payment')->nullable();
            $table->string('subject')->nullable();
            $table->string('note')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('autorizations', function (Blueprint $table) {
         
            $table->dropColumn('budget_number');
            $table->dropColumn('payment');
            $table->dropColumn('subject');
            $table->dropColumn('note');
        });
    }
}
