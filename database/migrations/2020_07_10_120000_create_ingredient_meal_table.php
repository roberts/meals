<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Roberts\Meals\Models\Ingredient;
use Roberts\Meals\Models\Meal;

class CreateIngredientMealTable extends Migration
{
    public function up()
    {
        Schema::create('ingredient_meal', function (Blueprint $table) {
            $table->foreignIdFor(Ingredient::class);
            $table->foreignIdFor(Meal::class);
            $table->timestamps();
        });
    }
}
