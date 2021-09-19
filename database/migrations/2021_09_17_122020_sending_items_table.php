<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SendingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sending_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_sending_items_id')->nullable();
            $table->foreign("detail_sending_items_id")->references('id')->on('detail_sending_items')->nullable();
            $table->string('receiver');
            $table->string("photo");
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
        //
    }
}
