<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('title')->unique();
            $table->string('short_title')->nullable();
            $table->boolean('a_la_carte')->default(false); // For sub a-la-carte categories
            $table->unsignedTinyInteger('priority'); // Default 10 and used to order categories on menu page
            $table->foreignId('image_id')->nullable()->references('id')->on('images');

            $table->foreignId('creator_id')->references('id')->on('users');
            $table->foreignId('updater_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
