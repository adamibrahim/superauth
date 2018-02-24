<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('confirmed')->default(false)->after('password')->comment('0=not confirmed, 1=confirmed');
            $table->string('confirm_token')->nullable()->after('confirmed');
            $table->boolean('active')->default(true)->after('confirm_token')->comment('0=Inactive, 1=Active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array('confirmed', 'confirm_token', 'active'));
        });
    }
}
