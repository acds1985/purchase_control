<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->string('bank')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('agency')->nullable();
            $table->string('account')->nullable();
            $table->string('document_account')->nullable();
            $table->string('pix_key')->nullable();
            $table->string('social_name_bank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn('bank');
            $table->dropColumn('bank_code');
            $table->dropColumn('agency');
            $table->dropColumn('account');
            $table->dropColumn('document_account');
            $table->dropColumn('pix_key');
            $table->dropColumn('social_name');
        });
    }
}
