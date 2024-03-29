<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateQueriesTableFixPhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('queries')->truncate();

        Schema::table('queries', function (Blueprint $table) {
            $table->string('phone', 15)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('queries', function (Blueprint $table) {
            $table->integer('phone')->change();
        });
    }
}
