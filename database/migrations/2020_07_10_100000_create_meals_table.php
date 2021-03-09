<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('title')->unique();
            $table->string('name')->unique(); // Internal Reference Only

            $table->unsignedInteger('price'); // In cents.
            $table->foreignIdFor(app('image'))->nullable();
            $table->foreignIdFor(app('image'), 'package_image_id')->nullable();
            $table->text('description')->nullable();
            $table->text('display_ingredients')->nullable(); // Ingredient list for display on the website
            $table->integer('servings');
            $table->integer('serving_size')->nullable(); // always in ounces
            $table->string('recipal')->nullable(); // ID on ReciPal.com for API

            // Nutritional Facts from ReciPal
            $table->integer('calories')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('saturated_fat')->nullable();
            $table->integer('trans_fat')->nullable();
            $table->integer('cholesterol')->nullable();
            $table->integer('sodium')->nullable();
            $table->integer('carbs')->nullable();
            $table->integer('fiber')->nullable();
            $table->integer('sugars')->nullable();
            $table->integer('added_sugars')->nullable();
            $table->integer('protein')->nullable();

            $table->foreignIdFor(app('user'), 'creator_id');
            $table->foreignIdFor(app('user'), 'updater_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
