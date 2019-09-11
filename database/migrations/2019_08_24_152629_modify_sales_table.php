<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('transaction_key');
            $table->text('payment_data');
            $table->dateTime('transaction_date');
            $table->unsignedDecimal('total');
            $table->string('status');

            $table->unsignedBigInteger('user_id');
        });

        Schema::table('sales', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('transaction_key');
            $table->dropColumn('payment_data');
            $table->dropColumn('transaction_date');
            $table->dropColumn('total');
            $table->dropColumn('status');
            $table->dropColumn('user_id');
        });
    }
}
