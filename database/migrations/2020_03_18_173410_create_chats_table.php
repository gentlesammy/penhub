<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sender_id');
            $table->unsignedInteger('sent_to_id');
            $table->text('subject');
            $table->longText('body');
            $table->unsignedInteger('read')->default(0);
            $table->unsignedInteger('archived')->default(0);
            $table->unsignedInteger('deleted')->default(0);

            // It's better to work with default timestamp names:
            $table->timestamps();

            // `sender_id` field referenced the `id` field of `users` table:
            $table->foreign('sender_id')
                  ->references('id')
                  ->on('users');

            // Let's add another foreign key on the same table,
            // but this time fot the `sent_to_id` field:
            $table->foreign('sent_to_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
