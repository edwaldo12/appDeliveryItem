<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSendingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_sending_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('container_id')->nullable();
            $table->foreign("container_id")->references('id')->on('containers')->nullable();
            $table->foreignId('good_id');
            $table->foreign("good_id")->references('id')->on('goods');
            $table->integer('qty');
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
        Schema::dropIfExists('detail_sending_items');
    }
}
