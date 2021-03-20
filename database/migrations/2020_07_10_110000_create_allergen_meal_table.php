<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Roberts\Meals\Models\Allergen;
use Roberts\Meals\Models\Meal;

class CreateAllergenMealTable extends Migration
{
    public function up()
    {
        Schema::create('allergen_meal', function (Blueprint $table) {
            $table->foreignIdFor(Allergen::class);
            $table->foreignIdFor(Meal::class);
            $table->timestamps();
        });
    }
}
