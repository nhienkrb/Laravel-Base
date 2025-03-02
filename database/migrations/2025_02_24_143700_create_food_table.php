<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the category table first
        // if (!Schema::hasTable('category') && !Schema::hasTable('food')) {
            Schema::create('category', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });
            
        // }

        // Create the food table after the category table
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('price');
            $table->integer('quality');
            $table->timestamps();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')
                                        ->on('category')
                                        ->onDelete('cascade')
                                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
        Schema::dropIfExists('category');
    }
};