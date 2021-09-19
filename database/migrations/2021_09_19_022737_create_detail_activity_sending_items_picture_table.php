<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailActivitySendingItemsPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_activity_picture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_sending_items_id')->nullable();
            $table->foreign("detail_sending_items_id")->references('id')->on('detail_sending_items')->nullable();
            $table->string('foto');
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
        Schema::dropIfExists('detail_activity_sending_items_picture');
    }
}
