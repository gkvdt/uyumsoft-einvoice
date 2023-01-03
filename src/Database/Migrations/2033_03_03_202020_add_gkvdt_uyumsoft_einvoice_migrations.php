<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGkvdtUyumsoftEinvoiceMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ws_users', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('username');
            $table->string('password');
        });
        Schema::create('ws_partys', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('vkn');
            $table->string('party_name')->nullable();
            $table->string('street_name')->nullable();
            $table->string('city_subdivision_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('country')->nullable();
            $table->string('party_tax_scheme')->nullable();
            $table->string('first_name')->nullable();
            $table->string('family_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ws_users', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
        Schema::table('ws_partys', function (Blueprint $table) {
            $table->dropColumn('ws_user_id');
            $table->dropColumn('party_name');
            $table->dropColumn('street_name');
            $table->dropColumn('city_subdivision_name');
            $table->dropColumn('city_name');
            $table->dropColumn('country');
            $table->dropColumn('party_tax_scheme');
            $table->dropColumn('first_name');
            $table->dropColumn('family_name');
        });
    }
}
