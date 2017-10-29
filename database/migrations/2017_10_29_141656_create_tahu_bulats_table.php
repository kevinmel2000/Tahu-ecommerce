<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTahuBulatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahu_bulats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('judul_tahu');
            $table->string('imagePath');
            $table->text('deskripsi');
            $table->integer('user_id');
            $table->integer('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tahu_bulats');
    }
}
