<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('summary');
            $table->string('feature');
            $table->integer('Episode')->nullable();
            $table->unsignedInteger('completed')->default(0);
            $table->unsignedInteger('active')->default(1);
            $table->unsignedInteger('abandoned')->default(0);
            $table->unsignedInteger('deleted')->default(0);
            $table->unsignedBigInteger('rating_id');
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
        Schema::dropIfExists('series');
    }
}
