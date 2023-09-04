<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaTagToTaxUpdateCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tax_update_categories', function (Blueprint $table) {
            $table->string('seo_title_eng');
            $table->string('seo_title');
            $table->longText('description_eng');
            $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tax_update_categories', function (Blueprint $table) {
            //
        });
    }
}
