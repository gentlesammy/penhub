<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEditorAndCoverToSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('series', function (Blueprint $table) {
            //
            $table->unsignedInteger('coverpage')->default(0)->after('deleted');
            $table->unsignedInteger('editorchoice')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('series', function (Blueprint $table) {
            $table->dropColumn('coverpage');
            $table->dropColumn('editorchoice');
        });
    }
}
