<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaAndEngVerToCustomerQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_questions', function (Blueprint $table) {
            $table->string('title_eng')->nullable();
            $table->longText('question_eng')->nullable();
            $table->longText('answer_eng')->nullable();
            $table->string('seo_title_eng')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('description_eng')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_questions', function (Blueprint $table) {
            //
        });
    }
}
