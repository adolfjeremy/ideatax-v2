<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJpnFieldToCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->string("title_eng");
            $table->string("title_jpn");
            $table->string("slug_eng");
            $table->string("slug_jpn");
            $table->longText("jobdesc_jpn");
            $table->longText("qualification_jpn");
            $table->longText("skill_jpn");
            $table->longText("course_jpn");
            $table->string("SEO_title_jpn");
            $table->longText("description_jpn");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            //
        });
    }
}
