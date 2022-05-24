<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTaxUpdateCategoriesIdFieldToCustomerQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_questions', function (Blueprint $table) {
            $table->integer('tax_update_categories_id');
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
            $table->integer('tax_update_categories_id');
        });
    }
}
