<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Roberts\Meals\Models\Meal;
use Roberts\Meals\Models\Menu;

class CreateMealMenuTable extends Migration
{
    public function up()
    {
        Schema::create('meal_menu', function (Blueprint $table) {
            $table->foreignIdFor(Meal::class);
            $table->foreignIdFor(Menu::class);
            $table->timestamps();
        });
    }
}
