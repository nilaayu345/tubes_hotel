<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRoomFacilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_facilities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id')->unsigned()->nullable();
            $table->bigInteger('facility_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('facility_id')
                -> references('id')
                ->on('facilities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_facilities', function (Blueprint $table) {
            $table->dropForeign(['room_id']);
            $table->dropForeign(['facility_id']);
        });

        Schema::dropIfExists('room_facilities');
    }
}
