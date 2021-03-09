<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealMenuTable extends Migration
{
    public function up()
    {
        Schema::create('meal_menu', function (Blueprint $table) {
            $table->foreignId('meal_id')->references('id')->on('meals');
            $table->foreignId('menu_id')->references('id')->on('menus');
            // $table->foreignIdFor(Meal::class);
            // $table->foreignIdFor(Menu::class);
            $table->timestamps();
        });
    }
}
