<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DashboardAddUserFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->dropColumn(['name']);

            $table->integer('location_id')->default(0)->after('remember_token');
            $table->integer('role_id')->default(1)->after('location_id');
            $table->boolean('status')->default(1)->after('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->string('name');
            $table->dropColumn('location_id');
            $table->dropColumn('role_id');
            $table->dropColumn('status');
        });
    }
}
