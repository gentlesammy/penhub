<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEditorAndCoverToEpisodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episodes', function (Blueprint $table) {
            $table->unsignedInteger('coverpage')->default(0)->after('deleted');
            $table->unsignedInteger('editorchoice')->default(0)->after('deleted');
        });
    }

    /** cz
     * Reverse the migrations. cz
     * cz
     * @return void cz
     */
    public function down()
    {
        Schema::table('episodes', function (Blueprint $table) {
            $table->dropColumn('coverpage');
            $table->dropColumn('editorchoice');
        });
    }
}
