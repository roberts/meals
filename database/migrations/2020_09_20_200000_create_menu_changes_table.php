<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuChangesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->references('id')->on('menus')->nullable();
            $table->foreignId('next_menu_id')->references('id')->on('menus')->nullable();
            $table->foreignId('ondeck_menu_id')->references('id')->on('menus')->nullable();
            // $table->foreignIdFor(Menu::class)->nullable();
            // $table->foreignIdFor(Menu::class, 'next_menu_id')->nullable();
            // $table->foreignIdFor(Menu::class, 'ondeck_menu_id')->nullable();
            $table->dateTime('change_at'); // Thursdays at midnight
            $table->timestamps();
        });
    }
}
