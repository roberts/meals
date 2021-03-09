<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergensTable extends Migration
{
    public function up()
    {
        Schema::create('allergens', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('title')->unique();
            $table->string('contains')->nullable();
            $table->boolean('is_containable')->default(1); // If should include the contains name in that list on meals
            $table->foreignId('icon_id')->nullable()->references('id')->on('images'); // Icon for allergen
            $table->foreignId('image_id')->nullable()->references('id')->on('images'); // Cover image for allergen page
            $table->foreignId('creator_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
}
