<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('jobdesc')->nullable();
            $table->longText('jobdesc_eng')->nullable();
            $table->longText('qualification')->nullable();
            $table->longText('qualification_eng')->nullable();
            $table->longText('skill')->nullable();
            $table->longText('skill_eng')->nullable();
            $table->longText('course')->nullable();
            $table->longText('course_eng')->nullable();
            $table->string('seo_title_eng')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('description_eng')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
}
