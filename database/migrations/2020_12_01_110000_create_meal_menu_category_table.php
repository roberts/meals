<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealMenuCategoryTable extends Migration
{

    public function up()
    {
        Schema::create('meal_menu_category', function (Blueprint $table) {
            $table->foreignId('meal_id')->index()->references('id')->on('meals');
            $table->foreignId('menu_category_id')->index()->references('id')->on('menu_categories');
            $table->timestamps();
        });
    }
}
