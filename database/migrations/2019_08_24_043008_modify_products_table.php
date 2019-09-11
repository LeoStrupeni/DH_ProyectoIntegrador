<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name', 100);
            $table->text('description');
            $table->unsignedDecimal('price', 8, 2);
            $table->unsignedTinyInteger('graduation');
            $table->string('origin');
            $table->string('image');
            $table->unsignedSmallInteger('year');
            $table->unsignedSmallInteger('volume');

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');


        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
