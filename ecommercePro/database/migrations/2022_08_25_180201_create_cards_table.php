<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id()-nulable();
            $table->string('name')->nulable();
            $table->string('email')->nulable();
            $table->string('phone')->nulable();
            $table->string('address')->nulable();
            $table->string('product_title')->nulable();
            $table->string('product_quantity')->nulable();
            $table->string('price')->nulable();
            $table->string('image')->nulable();
            $table->string('product_id')->nulable();
            $table->string('user_id')->nulable();
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
        Schema::dropIfExists('cards');
    }
};
