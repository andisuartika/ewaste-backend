<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('noHp')->after('email')->nullable();
            $table->string('alamat')->after('email')->nullable();
            $table->integer('points')->after('email')->nullable();
            $table->string('roles')->after('email')->default('NASABAH');
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
            $table->dropColumn('noHp');
            $table->dropColumn('alamat');
            $table->dropColumn('points');
            $table->dropColumn('roles');
        });
    }
}
