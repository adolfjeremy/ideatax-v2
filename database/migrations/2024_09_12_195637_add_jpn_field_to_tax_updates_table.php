<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJpnFieldToTaxUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tax_updates', function (Blueprint $table) {
            $table->string("title_jpn");
            $table->string("slug_jpn");
            $table->longText("body_jpn");
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
        Schema::table('tax_updates', function (Blueprint $table) {
            //
        });
    }
}
