<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldInTaxEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tax_events', function (Blueprint $table) {
            $table->string('title_eng');
            $table->string('SEO_title');
            $table->string('SEO_title_eng');
            $table->longText('body_eng');
            $table->longText('description');
            $table->longText('description_eng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tax_events', function (Blueprint $table) {
            //
        });
    }
}
