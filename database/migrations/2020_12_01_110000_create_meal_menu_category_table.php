<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Roberts\Meals\Models\Meal;
use Roberts\Meals\Models\MealCategory;

class CreateMealMenuCategoryTable extends Migration
{

    public function up()
    {
        Schema::create('meal_menu_category', function (Blueprint $table) {
            $table->foreignIdFor(Meal::class);
            $table->foreignIdFor(MealCategory::class);
            $table->timestamps();
        });
    }
}
