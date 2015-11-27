<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapLocationSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('map_location_sites')) {
            Schema::create('map_location_sites', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('location_id')->unsigned();
                $table->string('name', 50);
                $table->string('en_name', 50);
                $table->decimal('lat', 9, 6);
                $table->decimal('lng', 9, 6);
                $table->text('image');
                $table->text('video');
                $table->text('description');
                $table->text('en_description');
                $table->text('properties');
                $table->timestamps();
            });
            Schema::table('map_location_sites', function (Blueprint $table) {
                $table->foreign('location_id')->references('id')->on('map_locations');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('map_location_sites');
    }
}
