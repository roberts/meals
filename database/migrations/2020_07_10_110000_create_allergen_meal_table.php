<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenMealTable extends Migration
{
    public function up()
    {
        Schema::create('allergen_meal', function (Blueprint $table) {
            $table->foreignId('allergen_id')->references('id')->on('allergens');
            $table->foreignId('meal_id')->references('id')->on('meals');
            $table->timestamps();
        });
    }
}
