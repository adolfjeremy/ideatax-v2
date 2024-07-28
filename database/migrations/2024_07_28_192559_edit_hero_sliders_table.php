<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditHeroSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hero_sliders', function (Blueprint $table) {
            $table->string('hero')->nullable();
            $table->string('cta')->nullable();
            $table->string('cta_eng')->nullable();
            $table->string('button')->nullable();
            $table->string('button_eng')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hero_sliders', function (Blueprint $table) {
            $table->foreignId('service_id');
            $table->string('image')->nullable();
        });
    }
}
