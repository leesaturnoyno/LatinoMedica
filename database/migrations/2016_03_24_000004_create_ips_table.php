<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ips', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->timestamps();
            $table->bigInteger('city_id')->unsigned()->nullable()->index();
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('set null');
            $table->bigInteger('state_id')->unsigned()->nullable()->index();
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('set null');
            $table->bigInteger('country_id')->unsigned()->nullable()->index();
            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('set null');
            $table->string('host');
            $table->string('ip');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('user_agent');
            $table->integer('timezone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ips');
    }
}
