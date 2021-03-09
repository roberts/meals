<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientMealTable extends Migration
{
    public function up()
    {
        Schema::create('ingredient_meal', function (Blueprint $table) {
            $table->foreignId('ingredient_id')->references('id')->on('ingredients');
            $table->foreignId('meal_id')->references('id')->on('meals');
            // $table->foreignIdFor(Ingredient::class);
            // $table->foreignIdFor(Meal::class);
            $table->timestamps();
        });
    }
}
